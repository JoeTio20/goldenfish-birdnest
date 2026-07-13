<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class OrderTrackingController extends Controller
{
    public function index()
    {
        return view('order-tracking', ['order' => null, 'searched' => false]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'order_number' => 'required|string|max:40',
            'contact' => 'nullable|string|max:150',
        ]);

        $number = trim($request->order_number);
        $contact = trim((string) $request->contact);

        $query = Order::query();
        if (Schema::hasColumn('orders', 'order_number')) {
            $query->where('order_number', $number);
        } else {
            $query->whereRaw('1 = 0');
        }

        if ($contact !== '') {
            $query->where(function ($q) use ($contact) {
                $q->where('whatsapp', 'like', "%{$contact}%");
                if (Schema::hasColumn('orders', 'email')) {
                    $q->orWhere('email', 'like', "%{$contact}%");
                }
            });
        }

        $order = $query->latest()->first();
        return view('order-tracking', ['order' => $order, 'searched' => true]);
    }
}
