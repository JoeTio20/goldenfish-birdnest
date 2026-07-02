@extends('admin.layout')
@section('title','Orders')
@section('header','Daftar Pesanan')
@section('content')
<div class="flex justify-between items-center mb-6">
  <p class="text-sm" style="color:rgba(245,237,216,.4)">{{ $orders->total() }} pesanan</p>
</div>
@if(session('success'))
<div class="text-sm px-4 py-3 rounded-xl mb-4" style="background:rgba(201,168,76,.15);border:1px solid rgba(201,168,76,.3);color:#C9A84C">{{ session('success') }}</div>
@endif
<div class="rounded-2xl overflow-hidden" style="background:rgba(255,255,255,.03);border:1px solid rgba(245,237,216,.08)">
  <table class="w-full text-sm">
    <thead>
      <tr style="border-bottom:1px solid rgba(245,237,216,.07)">
        <th class="px-4 py-3 text-left text-[10px] tracking-[.2em] uppercase font-semibold" style="color:rgba(245,237,216,.3)">#</th>
        <th class="px-4 py-3 text-left text-[10px] tracking-[.2em] uppercase font-semibold" style="color:rgba(245,237,216,.3)">Pelanggan</th>
        <th class="px-4 py-3 text-left text-[10px] tracking-[.2em] uppercase font-semibold hidden md:table-cell" style="color:rgba(245,237,216,.3)">Total</th>
        <th class="px-4 py-3 text-left text-[10px] tracking-[.2em] uppercase font-semibold" style="color:rgba(245,237,216,.3)">Status</th>
        <th class="px-4 py-3 text-left text-[10px] tracking-[.2em] uppercase font-semibold hidden md:table-cell" style="color:rgba(245,237,216,.3)">Tanggal</th>
        <th class="px-4 py-3"></th>
      </tr>
    </thead>
    <tbody>
      @forelse($orders as $order)
      @php
        $statusMap = ['pending'=>['Pending','rgba(201,168,76,.15)','#C9A84C'],'dikonfirmasi'=>['Dikonfirmasi','rgba(96,165,250,.15)','#60a5fa'],'dikemas'=>['Dikemas','rgba(192,132,252,.15)','#c084fc'],'diantar'=>['Diantar','rgba(99,102,241,.15)','#818cf8'],'selesai'=>['Selesai','rgba(74,222,128,.15)','#4ade80'],'dibatalkan'=>['Dibatalkan','rgba(248,113,113,.15)','#f87171']];
        $s = $statusMap[$order->status] ?? ['Pending','rgba(201,168,76,.15)','#C9A84C'];
      @endphp
      <tr class="hover:bg-white/5 transition" style="border-bottom:1px solid rgba(245,237,216,.05)">
        <td class="px-4 py-3 font-mono text-xs" style="color:rgba(245,237,216,.3)">#{{ $order->id }}</td>
        <td class="px-4 py-3 font-medium" style="color:#F5EDD8">{{ $order->full_name }}</td>
        <td class="px-4 py-3 font-semibold hidden md:table-cell" style="color:#C9A84C">Rp {{ number_format($order->total,0,',','.') }}</td>
        <td class="px-4 py-3">
          <span class="px-2.5 py-1 rounded-full text-[10px] font-bold" style="background:{{ $s[1] }};color:{{ $s[2] }}">{{ $s[0] }}</span>
        </td>
        <td class="px-4 py-3 text-xs hidden md:table-cell" style="color:rgba(245,237,216,.3)">{{ $order->created_at->format('d M Y') }}</td>
        <td class="px-4 py-3">
          <a href="{{ route('admin.orders.show', $order) }}" class="text-xs font-semibold hover:underline" style="color:#C9A84C">Detail &rarr;</a>
        </td>
      </tr>
      @empty
      <tr><td colspan="6" class="px-4 py-12 text-center" style="color:rgba(245,237,216,.3)">Belum ada pesanan.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
<div class="mt-4">{{ $orders->links() }}</div>
@endsection
