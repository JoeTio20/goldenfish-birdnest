<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){ $cart=session('cart',[]); $subtotal=array_sum(array_map(fn($i)=>$i['price']*$i['qty'],$cart)); $related=Product::where('is_active',true)->inRandomOrder()->take(4)->get(); return view('cart',compact('cart','subtotal','related')); }
    public function add(Request $request)
    {
        $product=Product::findOrFail($request->product_id);
        if (($product->stock ?? 0) <= 0) return $this->cartError($request,'Stok produk habis.');
        $cart=session('cart',[]); $id=$product->id; $current=$cart[$id]['qty'] ?? 0;
        if ($current + 1 > $product->stock) return $this->cartError($request,'Jumlah melebihi stok tersedia.');
        if(isset($cart[$id])) $cart[$id]['qty']++; else $cart[$id]=['id'=>$product->id,'name'=>$product->name,'price'=>$product->price,'image'=>$product->thumbnail,'desc'=>$product->description??'','qty'=>1];
        session(['cart'=>$cart]);
        if($request->ajax()||$request->wantsJson()) return response()->json(['success'=>true,'message'=>'Produk ditambahkan ke keranjang!','cartCount'=>$this->cartCount($cart),'productName'=>$product->name,'cart'=>$this->cartPayload($cart)]);
        return back()->with('cart_success','Produk ditambahkan ke keranjang!');
    }
    public function update(Request $request){ $cart=session('cart',[]); $id=$request->product_id; $qty=max(1,(int)$request->qty); if(isset($cart[$id])){ $product=Product::find($id); if($product) $qty=min($qty, max(1,(int)$product->stock)); $cart[$id]['qty']=$qty; } session(['cart'=>$cart]); if($request->ajax()||$request->wantsJson()) return response()->json(['success'=>true,'cartCount'=>$this->cartCount($cart),'cart'=>$this->cartPayload($cart)]); return redirect()->route('cart.index'); }
    public function remove(Request $request){ $cart=session('cart',[]); unset($cart[$request->product_id]); session(['cart'=>$cart]); if($request->ajax()||$request->wantsJson()) return response()->json(['success'=>true,'cartCount'=>$this->cartCount($cart),'cart'=>$this->cartPayload($cart)]); return redirect()->route('cart.index'); }
    public function clear(){ session()->forget('cart'); return redirect()->route('cart.index'); }

    private function cartError(Request $request, string $message){ if($request->ajax()||$request->wantsJson()) return response()->json(['success'=>false,'message'=>$message],422); return back()->with('cart_error',$message); }
    private function cartCount(array $cart): int { return array_sum(array_column($cart,'qty')); }
    private function cartPayload(array $cart): array { $subtotal=array_sum(array_map(fn($i)=>$i['price']*$i['qty'],$cart)); return ['items'=>array_values($cart),'subtotal'=>$subtotal,'subtotal_formatted'=>'Rp '.number_format($subtotal,0,',','.')]; }
}
