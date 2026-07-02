@extends('admin.layout')
@section('title','Detail Order')
@section('header','Detail Pesanan')
@section('content')
<div class="flex items-center gap-3 mb-6">
  <a href="{{ route('admin.orders.index') }}" class="hover:opacity-70 transition" style="color:rgba(245,237,216,.4)">
    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 18l-6-6 6-6"/></svg>
  </a>
  <h2 class="font-semibold" style="color:#F5EDD8">Pesanan #{{ $order->id }}</h2>
</div>
@if(session('success'))
<div class="text-sm px-4 py-3 rounded-xl mb-4" style="background:rgba(74,222,128,.1);border:1px solid rgba(74,222,128,.2);color:#4ade80">{{ session('success') }}</div>
@endif
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
  <div class="rounded-2xl p-5" style="background:rgba(255,255,255,.03);border:1px solid rgba(245,237,216,.08)">
    <h3 class="text-[10px] tracking-[.2em] uppercase font-semibold mb-4" style="color:#C9A84C">Info Pelanggan</h3>
    <p class="font-semibold mb-1" style="color:#F5EDD8">{{ $order->full_name }}</p>
    <p class="text-sm mb-1" style="color:rgba(245,237,216,.5)">WA: {{ $order->whatsapp }}</p>
    <p class="text-sm mb-1" style="color:rgba(245,237,216,.5)">{{ $order->address }}</p>
    <p class="text-sm" style="color:rgba(245,237,216,.5)">{{ $order->city }} {{ $order->postal_code }}</p>
  </div>
  <div class="rounded-2xl p-5" style="background:rgba(255,255,255,.03);border:1px solid rgba(245,237,216,.08)">
    <h3 class="text-[10px] tracking-[.2em] uppercase font-semibold mb-4" style="color:#C9A84C">Update Status</h3>
    <form method="POST" action="{{ route('admin.orders.status', $order) }}">@csrf @method('PATCH')
      <select name="status" class="w-full px-3 py-2.5 text-sm rounded-xl mb-3 outline-none" style="background:rgba(255,255,255,.06);border:1px solid rgba(245,237,216,.15);color:#F5EDD8">
        @foreach(['pending'=>'Pending','dikonfirmasi'=>'Dikonfirmasi','dikemas'=>'Sedang Dikemas','diantar'=>'Sedang Diantar','selesai'=>'Selesai','dibatalkan'=>'Dibatalkan'] as $val=>$lbl)
        <option value="{{ $val }}" {{ $order->status===$val?'selected':'' }} style="background:#1B3A1F">{{ $lbl }}</option>
        @endforeach
      </select>
      <button type="submit" class="w-full py-2.5 text-xs font-bold tracking-widest uppercase rounded-xl transition" style="background:#C9A84C;color:#0F1D0F">Simpan Status</button>
    </form>
    @php $steps=['pending','dikonfirmasi','dikemas','diantar','selesai']; $idx=array_search($order->status,$steps); @endphp
    <div class="mt-5 flex gap-1">
      @foreach($steps as $i=>$step)
      <div class="flex-1 h-1.5 rounded-full" style="background:{{ $idx!==false&&$i<=$idx?'#C9A84C':'rgba(245,237,216,.1)' }}"></div>
      @endforeach
    </div>
  </div>
</div>
<div class="rounded-2xl p-5" style="background:rgba(255,255,255,.03);border:1px solid rgba(245,237,216,.08)">
  <h3 class="text-[10px] tracking-[.2em] uppercase font-semibold mb-4" style="color:#C9A84C">Item Pesanan</h3>
  <table class="w-full text-sm">
    <thead><tr style="border-bottom:1px solid rgba(245,237,216,.07)"><th class="pb-2 text-left text-[10px] uppercase tracking-widest" style="color:rgba(245,237,216,.3)">Produk</th><th class="pb-2 text-center text-[10px] uppercase tracking-widest" style="color:rgba(245,237,216,.3)">Qty</th><th class="pb-2 text-right text-[10px] uppercase tracking-widest" style="color:rgba(245,237,216,.3)">Subtotal</th></tr></thead>
    <tbody>
      @foreach($order->items as $item)
      <tr style="border-bottom:1px solid rgba(245,237,216,.05)">
        <td class="py-3" style="color:#F5EDD8">{{ $item['name'] }}</td>
        <td class="py-3 text-center" style="color:rgba(245,237,216,.5)">{{ $item['qty'] }}</td>
        <td class="py-3 text-right font-semibold" style="color:#C9A84C">Rp {{ number_format($item['price']*$item['qty'],0,',','.') }}</td>
      </tr>
      @endforeach
    </tbody>
    <tfoot><tr style="border-top:1px solid rgba(245,237,216,.1)"><td colspan="2" class="pt-3 text-right font-semibold" style="color:rgba(245,237,216,.6)">Total</td><td class="pt-3 text-right font-bold" style="color:#C9A84C">Rp {{ number_format($order->total,0,',','.') }}</td></tr></tfoot>
  </table>
</div>
@endsection
