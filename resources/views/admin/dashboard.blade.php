@extends('admin.layout')
@section('title','Dashboard')
@section('header','Dashboard')
@section('content')

@php
  $totalOrders = \App\Models\Order::count();
  $pendingOrders = \App\Models\Order::where('status','pending')->count();
@endphp

<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
  <div class="rounded-2xl p-5" style="background:rgba(200,150,90,.12);border:1px solid rgba(200,150,90,.2)">
    <p class="text-[10px] tracking-[.2em] uppercase font-semibold mb-3" style="color:#C8965A">Total Produk</p>
    <p class="text-4xl font-bold text-white mb-1">{{ $totalProducts }}</p>
    <p class="text-[11px] text-white/30">Semua produk</p>
  </div>
  <div class="rounded-2xl p-5" style="background:rgba(34,197,94,.08);border:1px solid rgba(34,197,94,.15)">
    <p class="text-[10px] tracking-[.2em] uppercase text-green-400 font-semibold mb-3">Produk Aktif</p>
    <p class="text-4xl font-bold text-white mb-1">{{ $activeProducts }}</p>
    <p class="text-[11px] text-white/30">Aktif &amp; live</p>
  </div>
  <div class="rounded-2xl p-5" style="background:rgba(99,102,241,.1);border:1px solid rgba(99,102,241,.2)">
    <p class="text-[10px] tracking-[.2em] uppercase text-indigo-400 font-semibold mb-3">Total Order</p>
    <p class="text-4xl font-bold text-white mb-1">{{ $totalOrders }}</p>
    <p class="text-[11px] text-white/30">Semua pesanan</p>
  </div>
  <div class="rounded-2xl p-5" style="background:rgba(251,191,36,.08);border:1px solid rgba(251,191,36,.15)">
    <p class="text-[10px] tracking-[.2em] uppercase text-yellow-400 font-semibold mb-3">Pending</p>
    <p class="text-4xl font-bold text-white mb-1">{{ $pendingOrders }}</p>
    <p class="text-[11px] text-white/30">Belum diproses</p>
  </div>
</div>

<div class="rounded-2xl overflow-hidden mb-6" style="background:rgba(255,255,255,.03);border:1px solid rgba(255,255,255,.07)">
  <div class="flex justify-between items-center px-6 py-4" style="border-bottom:1px solid rgba(255,255,255,.07)">
    <h3 class="font-semibold text-white text-sm">Produk Terbaru</h3>
    <a href="{{ route('admin.products.index') }}" class="text-[11px] font-semibold hover:underline tracking-widest uppercase" style="color:#C8965A">Lihat Semua &rarr;</a>
  </div>
  <table class="w-full text-sm">
    <thead>
      <tr style="border-bottom:1px solid rgba(255,255,255,.05)">
        <th class="px-6 py-3 text-left text-[10px] tracking-[.2em] uppercase text-white/30 font-semibold">Nama Produk</th>
        <th class="px-6 py-3 text-left text-[10px] tracking-[.2em] uppercase text-white/30 font-semibold">Harga</th>
        <th class="px-6 py-3 text-left text-[10px] tracking-[.2em] uppercase text-white/30 font-semibold">Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach($latestProducts as $p)
      <tr class="hover:bg-white/5 transition" style="border-bottom:1px solid rgba(255,255,255,.04)">
        <td class="px-6 py-3 text-white/80 font-medium">{{ $p->name }}</td>
        <td class="px-6 py-3 font-semibold" style="color:#C8965A">Rp {{ number_format($p->price,0,',','.') }}</td>
        <td class="px-6 py-3">
          <span class="px-2.5 py-1 rounded-full text-[10px] font-bold" style="background:{{ $p->is_active ? 'rgba(34,197,94,.12)' : 'rgba(239,68,68,.12)' }};color:{{ $p->is_active ? '#4ade80' : '#f87171' }}">
            {{ $p->is_active ? 'Aktif' : 'Nonaktif' }}
          </span>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="rounded-2xl overflow-hidden" style="background:rgba(255,255,255,.03);border:1px solid rgba(255,255,255,.07)">
  <div class="flex justify-between items-center px-6 py-4" style="border-bottom:1px solid rgba(255,255,255,.07)">
    <h3 class="font-semibold text-white text-sm">Order Terbaru</h3>
    <a href="{{ route('admin.orders.index') }}" class="text-[11px] font-semibold hover:underline tracking-widest uppercase" style="color:#C8965A">Lihat Semua &rarr;</a>
  </div>
  @php $recentOrders = \App\Models\Order::latest()->take(5)->get(); @endphp
  @forelse($recentOrders as $order)
  <div class="flex items-center justify-between px-6 py-4 hover:bg-white/5 transition" style="border-bottom:1px solid rgba(255,255,255,.04)">
    <div>
      <p class="text-white/80 text-sm font-medium">{{ $order->full_name }}</p>
      <p class="text-white/30 text-xs mt-0.5">{{ $order->created_at->diffForHumans() }}</p>
    </div>
    <div class="text-right">
      <p class="font-semibold text-sm" style="color:#C8965A">Rp {{ number_format($order->total,0,',','.') }}</p>
      <p class="text-[10px] font-bold uppercase" style="color:{{ match($order->status) {'selesai'=>'#4ade80','diantar'=>'#818cf8','dikemas'=>'#c084fc','dikonfirmasi'=>'#60a5fa','dibatalkan'=>'#f87171',default=>'#fbbf24'} }}">{{ $order->status }}</p>
    </div>
  </div>
  @empty
  <p class="px-6 py-8 text-white/30 text-sm text-center">Belum ada pesanan masuk</p>
  @endforelse
</div>

@endsection
