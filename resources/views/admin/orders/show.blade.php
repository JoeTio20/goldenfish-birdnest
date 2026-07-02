@extends('admin.layout')
@section('title','Detail Order')
@section('header','Detail Pesanan')
@section('content')
<div style="display:flex;align-items:center;gap:10px;margin-bottom:24px">
  <a href="{{ route('admin.orders.index') }}" style="color:rgba(216,228,237,.35);display:flex;align-items:center">
    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 18l-6-6 6-6"/></svg>
  </a>
  <h2 class="serif" style="font-size:18px;font-weight:600;color:#fff;margin:0">Pesanan #{{ $order->id }}</h2>
</div>
@if(session('success'))
<div style="font-size:13px;padding:12px 16px;border-radius:10px;margin-bottom:16px;background:rgba(107,200,150,.08);border:1px solid rgba(107,200,150,.2);color:#6BC893">{{ session('success') }}</div>
@endif
<div style="display:grid;grid-template-columns:1fr;gap:16px;margin-bottom:20px" class="md:grid-cols-2">
<div style="background:rgba(255,255,255,.02);border:1px solid rgba(107,174,214,.1);border-radius:12px;padding:20px">
  <p style="font-size:10px;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:#6BAED6;margin:0 0 16px">Info Pelanggan</p>
  <p style="font-weight:600;color:rgba(216,228,237,.9);margin:0 0 6px">{{ $order->full_name }}</p>
  <p style="font-size:13px;color:rgba(216,228,237,.45);margin:0 0 4px">WA: {{ $order->whatsapp }}</p>
  <p style="font-size:13px;color:rgba(216,228,237,.45);margin:0 0 4px">{{ $order->address }}</p>
  <p style="font-size:13px;color:rgba(216,228,237,.45);margin:0">{{ $order->city }} {{ $order->postal_code }}</p>
</div>
<div style="background:rgba(255,255,255,.02);border:1px solid rgba(107,174,214,.1);border-radius:12px;padding:20px">
  <p style="font-size:10px;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:#6BAED6;margin:0 0 16px">Update Status</p>
  <form method="POST" action="{{ route('admin.orders.status', $order) }}">@csrf @method('PATCH')
    <select name="status" style="width:100%;padding:10px 12px;font-size:13px;border-radius:8px;margin-bottom:12px;outline:none;background:rgba(255,255,255,.05);border:1px solid rgba(107,174,214,.2);color:#D8E4ED">
      <option value="pending" {{ $order->status==='pending' ? 'selected' : '' }} style="background:#0C1928">Pending</option>
      <option value="dikonfirmasi" {{ $order->status==='dikonfirmasi' ? 'selected' : '' }} style="background:#0C1928">Dikonfirmasi</option>
      <option value="dikemas" {{ $order->status==='dikemas' ? 'selected' : '' }} style="background:#0C1928">Sedang Dikemas</option>
      <option value="diantar" {{ $order->status==='diantar' ? 'selected' : '' }} style="background:#0C1928">Sedang Diantar</option>
      <option value="selesai" {{ $order->status==='selesai' ? 'selected' : '' }} style="background:#0C1928">Selesai</option>
      <option value="dibatalkan" {{ $order->status==='dibatalkan' ? 'selected' : '' }} style="background:#0C1928">Dibatalkan</option>
    </select>
    <button type="submit" style="width:100%;padding:11px;font-size:11px;font-weight:700;letter-spacing:.15em;text-transform:uppercase;border-radius:8px;background:#6BAED6;color:#07111C;border:none;cursor:pointer">Simpan Status</button>
  </form>
  @php $steps=["pending","dikonfirmasi","dikemas","diantar","selesai"]; $idx=array_search($order->status,$steps); @endphp
  <div style="display:flex;gap:4px;margin-top:16px">
    @foreach($steps as $i=>$step)
    <div style="flex:1;height:4px;border-radius:4px;background:{{ $idx!==false&&$i<=$idx ? '#6BAED6' : 'rgba(255,255,255,.08)' }}"></div>
    @endforeach
  </div>
</div>
</div>
<div style="background:rgba(255,255,255,.02);border:1px solid rgba(107,174,214,.1);border-radius:12px;overflow:hidden">
  <div style="padding:14px 20px;border-bottom:1px solid rgba(255,255,255,.05)">
    <p style="font-size:10px;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:#6BAED6;margin:0">Item Pesanan</p>
  </div>
  <table class="data-table">
    <thead><tr><th>Produk</th><th style="text-align:center">Qty</th><th style="text-align:right">Subtotal</th></tr></thead>
    <tbody>
    @foreach($order->items as $item)
    <tr>
      <td style="color:rgba(216,228,237,.8)">{{ $item['name'] }}</td>
      <td style="text-align:center;color:rgba(216,228,237,.45)">{{ $item['qty'] }}</td>
      <td style="text-align:right;font-weight:600;color:#6BAED6">Rp {{ number_format($item['price']*$item['qty'],0,',','.') }}</td>
    </tr>
    @endforeach
    </tbody>
    <tfoot><tr style="border-top:1px solid rgba(107,174,214,.12)">
      <td colspan="2" style="padding:12px 16px;font-weight:600;color:rgba(216,228,237,.5);text-align:right">Total</td>
      <td style="padding:12px 16px;text-align:right;font-weight:700;color:#6BAED6">Rp {{ number_format($order->total,0,',','.') }}</td>
    </tr></tfoot>
  </table>
</div>
@endsection
