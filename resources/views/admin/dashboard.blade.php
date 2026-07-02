@extends('admin.layout')
@section('title','Dashboard')
@section('header','Dashboard')
@php
  $totalOrders = \App\Models\Order::count();
  $pendingOrders = \App\Models\Order::where('status','pending')->count();
  $totalProducts = \App\Models\Product::count();
  $activeProducts = \App\Models\Product::where('is_active',true)->count();
  $latestProducts = \App\Models\Product::latest()->take(5)->get();
  $recentOrders = \App\Models\Order::latest()->take(5)->get();
@endphp
@section('content')

<div style="display:grid;grid-template-columns:repeat(2,1fr);gap:12px;margin-bottom:24px" class="md:grid-cols-4">
<div class="stat-card">
  <p style="font-size:10px;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:#6BAED6;margin:0 0 12px">Total Produk</p>
  <p class="serif" style="font-size:2.4rem;font-weight:700;color:#fff;margin:0 0 4px">{{ $totalProducts }}</p>
  <p style="font-size:11px;color:rgba(255,255,255,.28);margin:0">Semua produk</p>
</div>
<div class="stat-card">
  <p style="font-size:10px;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:rgba(107,174,214,.6);margin:0 0 12px">Aktif</p>
  <p class="serif" style="font-size:2.4rem;font-weight:700;color:#fff;margin:0 0 4px">{{ $activeProducts }}</p>
  <p style="font-size:11px;color:rgba(255,255,255,.28);margin:0">Live di website</p>
</div>
<div class="stat-card">
  <p style="font-size:10px;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:rgba(130,200,170,.8);margin:0 0 12px">Total Order</p>
  <p class="serif" style="font-size:2.4rem;font-weight:700;color:#fff;margin:0 0 4px">{{ $totalOrders }}</p>
  <p style="font-size:11px;color:rgba(255,255,255,.28);margin:0">Semua pesanan</p>
</div>
<div class="stat-card">
  <p style="font-size:10px;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:rgba(250,180,100,.8);margin:0 0 12px">Pending</p>
  <p class="serif" style="font-size:2.4rem;font-weight:700;color:#fff;margin:0 0 4px">{{ $pendingOrders }}</p>
  <p style="font-size:11px;color:rgba(255,255,255,.28);margin:0">Belum diproses</p>
</div>
</div>

<div style="display:grid;grid-template-columns:1fr;gap:16px" class="md:grid-cols-2">

<div style="background:rgba(255,255,255,.02);border:1px solid rgba(107,174,214,.1);border-radius:12px;overflow:hidden">
  <div style="display:flex;justify-content:space-between;align-items:center;padding:14px 20px;border-bottom:1px solid rgba(255,255,255,.05)">
    <h3 style="font-size:13px;font-weight:600;color:#fff;margin:0">Produk Terbaru</h3>
    <a href="{{ route('admin.products.index') }}" style="font-size:10px;font-weight:700;letter-spacing:.15em;text-transform:uppercase;color:#6BAED6;text-decoration:none">Lihat Semua &rarr;</a>
  </div>
  <table class="data-table">
    <thead><tr><th>Produk</th><th>Harga</th><th>Status</th></tr></thead>
    <tbody>
    @foreach($latestProducts as $p)
    <tr>
      <td style="color:rgba(216,228,237,.8);font-weight:500">{{ $p->name }}</td>
      <td style="color:#6BAED6;font-weight:600">Rp {{ number_format($p->price,0,',','.') }}</td>
      <td><span class="badge" style="{{ $p->is_active ? 'background:rgba(107,200,150,.12);color:#6BC893' : 'background:rgba(255,100,100,.1);color:rgba(255,120,120,.8)' }}">{{ $p->is_active ? 'Aktif' : 'Nonaktif' }}</span></td>
    </tr>
    @endforeach
    </tbody>
  </table>
</div>

<div style="background:rgba(255,255,255,.02);border:1px solid rgba(107,174,214,.1);border-radius:12px;overflow:hidden">
  <div style="display:flex;justify-content:space-between;align-items:center;padding:14px 20px;border-bottom:1px solid rgba(255,255,255,.05)">
    <h3 style="font-size:13px;font-weight:600;color:#fff;margin:0">Order Terbaru</h3>
    <a href="{{ route('admin.orders.index') }}" style="font-size:10px;font-weight:700;letter-spacing:.15em;text-transform:uppercase;color:#6BAED6;text-decoration:none">Lihat Semua &rarr;</a>
  </div>
  @forelse($recentOrders as $order)
  @php
    $sc = match($order->status) {
      'selesai' => ['#6BC893','rgba(107,200,150,.1)'],
      'diantar' => ['#6BAED6','rgba(107,174,214,.1)'],
      'dikemas' => ['#A78BFA','rgba(167,139,250,.1)'],
      'dikonfirmasi' => ['#93C5FD','rgba(147,197,253,.1)'],
      'dibatalkan' => ['rgba(255,120,120,.8)','rgba(255,100,100,.08)'],
      default => ['#FBBF24','rgba(251,191,36,.1)']
    };
  @endphp
  <div style="display:flex;justify-content:space-between;align-items:center;padding:12px 20px;border-bottom:1px solid rgba(255,255,255,.04)">
    <div>
      <p style="font-size:13px;font-weight:500;color:rgba(216,228,237,.85);margin:0 0 2px">{{ $order->full_name }}</p>
      <p style="font-size:11px;color:rgba(255,255,255,.28);margin:0">{{ $order->created_at->diffForHumans() }}</p>
    </div>
    <div style="text-align:right">
      <p style="font-size:13px;font-weight:600;color:#6BAED6;margin:0 0 2px">Rp {{ number_format($order->total,0,',','.') }}</p>
      <span class="badge" style="background:{{ $sc[1] }};color:{{ $sc[0] }}">{{ $order->status }}</span>
    </div>
  </div>
  @empty
  <p style="padding:40px 20px;text-align:center;color:rgba(255,255,255,.25);font-size:13px">Belum ada pesanan</p>
  @endforelse
</div>

</div>
@endsection
