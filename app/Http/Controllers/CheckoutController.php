<?php
namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class CheckoutController extends Controller
{
    public function index(){ $cart=session('cart',[]); if(empty($cart)) return redirect()->route('cart.index'); $subtotal=array_sum(array_map(fn($i)=>$i['price']*$i['qty'],$cart)); return view('checkout',compact('cart','subtotal')); }
    private function generateOrderNumber(): string {
        if (!Schema::hasColumn('orders', 'order_number')) {
            return 'GBN-' . now()->format('Ymd') . '-0001';
        }

        $prefix = 'GBN-' . now()->format('Ymd') . '-';
        $lastNumber = Order::where('order_number', 'like', $prefix . '%')->max('order_number');
        $count = $lastNumber ? ((int) substr($lastNumber, -4)) + 1 : 1;

        do {
            $number = $prefix . str_pad((string) $count, 4, '0', STR_PAD_LEFT);
            $count++;
        } while (Order::where('order_number', $number)->exists());

        return $number;
    }
    public function store(Request $request)
    {
        $request->validate(['first_name'=>'required|string|max:100','last_name'=>'required|string|max:100','email'=>'required|email|max:150','whatsapp_country_code'=>'required|string|max:8','whatsapp'=>'required|string|max:30','address'=>'required|string','city'=>'required|string','postal_code'=>'nullable|string|max:10','payment_method'=>'required|in:transfer,midtrans']);
        $cart=session('cart',[]); if(empty($cart)) return redirect()->route('cart.index');
        foreach($cart as $item){ $product=Product::find($item['id']); if(!$product || !$product->is_active || $product->stock < $item['qty']) return redirect()->route('cart.index')->with('cart_error','Stok '.$item['name'].' tidak cukup.'); }
        $subtotal=array_sum(array_map(fn($i)=>$i['price']*$i['qty'],$cart));
        $countryCode = preg_replace('/[^0-9+]/', '', (string) $request->whatsapp_country_code);
        $localWhatsapp = preg_replace('/[^0-9]/', '', (string) $request->whatsapp);
        $fullWhatsapp = $countryCode . $localWhatsapp;
        $orderData = ['first_name'=>$request->first_name,'last_name'=>$request->last_name,'whatsapp'=>$fullWhatsapp,'address'=>$request->address,'city'=>$request->city,'postal_code'=>$request->postal_code,'total'=>$subtotal,'payment_method'=>$request->payment_method,'status'=>'pending','items'=>array_values($cart)];
        if (Schema::hasColumn('orders', 'order_number')) $orderData['order_number'] = $this->generateOrderNumber();
        if (Schema::hasColumn('orders', 'email')) $orderData['email'] = $request->email;
        $order=Order::create($orderData);
        foreach($cart as $item){ Product::where('id',$item['id'])->decrement('stock',$item['qty']); }
        $this->sendOrderEmail($order);
        session()->forget('cart'); return redirect()->route('checkout.success',$order->id);
    }
    private function sendOrderEmail(Order $order): void
    {
        if(!Schema::hasColumn('orders', 'email') || !$order->email) return;
        try{
            $lines=[]; foreach($order->items as $item){ $lines[]='- '.$item['name'].' x'.$item['qty'].' = Rp '.number_format($item['price']*$item['qty'],0,',','.'); }
            $body="Halo {$order->full_name},\n\nTerima kasih, pesanan Anda sudah kami terima.\n\nNomor Pesanan: {$order->display_order_number}\nStatus: {$order->display_status}\n\nDetail Pesanan:\n".implode("\n",$lines)."\n\nTotal: Rp ".number_format($order->total,0,',','.')."\n\nSimpan nomor pesanan ini untuk menanyakan status via WhatsApp.\n\nGoldenfish Birdnest";
            Mail::raw($body, fn($m)=>$m->to($order->email)->subject('Pesanan Goldenfish Birdnest #'.$order->display_order_number));
        }catch(\Throwable $e){ Log::warning('Order email failed: '.$e->getMessage()); }
    }
    public function success($id){ $order=Order::findOrFail($id); return view('checkout-success',compact('order')); }
}
