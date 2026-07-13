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

        $query = Order::query()->where(function ($q) use ($number) {
            if (Schema::hasColumn('orders', 'order_number')) {
                $q->where('order_number', $number);
            }

            // Backward-compatible lookup for old orders whose order_number column is still empty.
            // Admin/customer pages display fallback numbers like GBN-YYYYMMDD-0001, where 0001 is the order ID.
            if (preg_match('/^GBN-(\d{8})-(\d{4,})$/i', $number, $matches)) {
                $date = substr($matches[1], 0, 4) . '-' . substr($matches[1], 4, 2) . '-' . substr($matches[1], 6, 2);
                $id = (int) $matches[2];
                $q->orWhere(function ($fallback) use ($date, $id) {
                    $fallback->where('id', $id)
                             ->whereDate('created_at', $date);
                    if (Schema::hasColumn('orders', 'order_number')) {
                        $fallback->where(function ($emptyNumber) {
                            $emptyNumber->whereNull('order_number')->orWhere('order_number', '');
                        });
                    }
                });
            }
        });

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
