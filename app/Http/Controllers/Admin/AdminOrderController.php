<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller {
    public function index(Request $request) {
        $search = trim((string) $request->get('search', ''));
        $orders = Order::query()
            ->when($search !== '', function ($q) use ($search) {
                $q->where('order_number', 'like', "%{$search}%")
                  ->orWhere('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('whatsapp', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(20)
            ->withQueryString();
        return view('admin.orders.index', compact('orders', 'search'));
    }
    public function show(Order $order) { return view('admin.orders.show', compact('order')); }
    public function updateStatus(Request $request, Order $order) {
        $request->validate(['status'=>'required|in:pending,dikonfirmasi,dikemas,diantar,selesai,dibatalkan']);
        $order->update(['status'=>$request->status]);
        return back()->with('success', 'Status pesanan diperbarui!');
    }
}
