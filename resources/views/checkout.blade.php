@extends('layouts.app')
@section('title','Checkout - Sarang Burung')
@section('head')
<style>
.serif{font-family:'Cormorant Garamond',serif}
.co-label{display:block;font-size:11px;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:#4A6375;margin-bottom:7px}
.co-input{width:100%;border:none;border-bottom:1.5px solid rgba(107,174,214,.3);padding:9px 0;font-size:14px;background:transparent;outline:none;color:#1C2B3A;box-sizing:border-box;transition:border-color .2s}
.co-input:focus{border-bottom-color:#6BAED6}
.co-grid{display:grid;grid-template-columns:1fr 340px;gap:40px;align-items:start}
.co-summary{background:#fff;border:1px solid rgba(107,174,214,.2);border-radius:12px;padding:24px}
.pay-opt{display:flex;justify-content:space-between;align-items:center;border:1.5px solid rgba(107,174,214,.25);border-radius:10px;padding:14px 16px;cursor:pointer;margin-bottom:10px;transition:border-color .2s}
.pay-opt.active{border-color:#6BAED6;background:rgba(107,174,214,.04)}
@media(max-width:767px){
  .co-grid{grid-template-columns:1fr}
  .co-summary{order:-1}
}
</style>
@endsection
@section('content')

<div style="background:#F7F9FB;min-height:80vh;padding:40px 24px">
<div style="max-width:960px;margin:0 auto">
<h1 class="serif" style="font-size:2rem;font-weight:700;color:#1C2B3A;margin-bottom:6px">Checkout</h1>
<p style="font-size:12px;color:#4A6375;margin-bottom:32px">
 <a href="{{ route('cart.index') }}" style="color:#4A6375">Keranjang</a>
 <span style="margin:0 6px">&rsaquo;</span>
 <strong style="color:#1C2B3A">Informasi &amp; Pembayaran</strong>
</p>

@if($errors->any())
<div style="background:rgba(107,174,214,.08);border:1px solid rgba(107,174,214,.3);color:#1C2B3A;font-size:13px;padding:12px 16px;border-radius:10px;margin-bottom:20px">
 <ul style="margin:0;padding-left:16px">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
</div>
@endif

<form method="POST" action="{{ route('checkout.store') }}">@csrf
<div class="co-grid">

<div>
<h2 style="display:flex;align-items:center;gap:12px;font-size:16px;font-weight:600;color:#1C2B3A;margin-bottom:22px">
 <span style="width:26px;height:26px;border-radius:50%;background:#6BAED6;color:#0D1B2A;font-size:11px;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0">1</span>
 Shipping Details
</h2>

<div style="margin-bottom:16px"><label class="co-label">Nomor WhatsApp</label>
<input type="text" name="whatsapp" value="{{ old('whatsapp') }}" placeholder="+62 812..." required class="co-input"></div>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px">
 <div><label class="co-label">Nama Depan</label><input type="text" name="first_name" value="{{ old('first_name') }}" required class="co-input"></div>
 <div><label class="co-label">Nama Belakang</label><input type="text" name="last_name" value="{{ old('last_name') }}" required class="co-input"></div>
</div>

<div style="margin-bottom:16px"><label class="co-label">Alamat Pengiriman</label>
<input type="text" name="address" value="{{ old('address') }}" placeholder="Nama jalan dan nomor rumah" required class="co-input"></div>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:32px">
 <div><label class="co-label">Kota</label><input type="text" name="city" value="{{ old('city') }}" required class="co-input"></div>
 <div><label class="co-label">Kode Pos</label><input type="text" name="postal_code" value="{{ old('postal_code') }}" class="co-input"></div>
</div>

<h2 style="display:flex;align-items:center;gap:12px;font-size:16px;font-weight:600;color:#1C2B3A;margin-bottom:22px">
 <span style="width:26px;height:26px;border-radius:50%;background:#6BAED6;color:#0D1B2A;font-size:11px;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0">2</span>
 Metode Pembayaran
</h2>

<label id="lbl-midtrans" class="pay-opt active" onclick="switchPay('midtrans')">
 <div style="display:flex;align-items:center;gap:12px">
  <input type="radio" name="payment_method" value="midtrans" id="r-midtrans" checked style="accent-color:#6BAED6;width:16px;height:16px">
  <span style="font-size:14px;font-weight:500;color:#1C2B3A">Kartu / E-Wallet (Midtrans)</span>
 </div>
 <svg width="20" height="20" fill="none" stroke="#6BAED6" stroke-width="1.5" viewBox="0 0 24 24"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
</label>

<label id="lbl-transfer" class="pay-opt" onclick="switchPay('transfer')">
 <div style="display:flex;align-items:center;gap:12px">
  <input type="radio" name="payment_method" value="transfer" id="r-transfer" style="accent-color:#6BAED6;width:16px;height:16px">
  <span style="font-size:14px;font-weight:500;color:#1C2B3A">Transfer Bank Manual</span>
 </div>
 <svg width="20" height="20" fill="none" stroke="#4A6375" stroke-width="1.5" viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
</label>

<div id="bank-info" style="display:none;background:rgba(107,174,214,.06);border:1px solid rgba(107,174,214,.2);border-radius:10px;padding:16px;margin-bottom:20px">
 <p style="font-size:12px;font-weight:600;color:#1C2B3A;margin-bottom:8px">Transfer ke rekening:</p>
 <p style="font-size:13px;color:#4A6375">Bank BCA</p>
 <p style="font-size:18px;font-weight:700;color:#1C2B3A;letter-spacing:.06em;margin:4px 0">1234 5678 90</p>
 <p style="font-size:13px;color:#4A6375">a.n. Sarang Burung Walet</p>
 <p style="font-size:11px;color:#6BAED6;margin-top:8px">Konfirmasi pembayaran via WhatsApp setelah transfer.</p>
</div>

<button type="submit" style="display:inline-flex;align-items:center;gap:10px;background:#0D1B2A;color:#fff;font-size:11px;font-weight:700;letter-spacing:.15em;text-transform:uppercase;padding:16px 36px;border:none;cursor:pointer;border-radius:100px;margin-top:8px" onmouseover="this.style.background='#6BAED6';this.style.color='#0D1B2A'" onmouseout="this.style.background='#0D1B2A';this.style.color='#fff'">
 SELESAIKAN PESANAN
 <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
</button>
<p style="font-size:11px;color:#4A6375;margin-top:10px">Transaksi dienkripsi SSL yang aman.</p>
</div>

<div class="co-summary">
 <h3 class="serif" style="font-size:20px;font-weight:700;color:#1C2B3A;margin-bottom:20px;padding-bottom:12px;border-bottom:1px solid rgba(107,174,214,.15)">Ringkasan Pesanan</h3>
 @foreach($cart as $item)
 <div style="display:flex;gap:12px;align-items:center;margin-bottom:14px">
  <div style="position:relative;flex-shrink:0">
   <img src="{{ $item['thumbnail'] ?? '/IMAGE/SUPER.jpeg' }}" style="width:52px;height:52px;object-fit:cover;border-radius:8px;border:1px solid rgba(107,174,214,.15)" onerror="this.src='/IMAGE/SUPER.jpeg'">
   <span style="position:absolute;top:-6px;right:-6px;background:#6BAED6;color:#0D1B2A;font-size:10px;font-weight:700;width:18px;height:18px;border-radius:50%;display:flex;align-items:center;justify-content:center">{{ $item['qty'] }}</span>
  </div>
  <div style="flex:1;min-width:0">
   <p style="font-size:13px;font-weight:500;color:#1C2B3A;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">{{ $item['name'] }}</p>
   <p style="font-size:11px;color:#4A6375">Rp {{ number_format($item['price'],0,',','.') }}</p>
  </div>
  <p style="font-size:13px;font-weight:600;color:#1C2B3A;white-space:nowrap">Rp {{ number_format($item['price']*$item['qty'],0,',','.') }}</p>
 </div>
 @endforeach

 <div style="border-top:1px solid rgba(107,174,214,.15);padding-top:14px;margin-top:4px">
  <div style="display:flex;justify-content:space-between;font-size:13px;color:#4A6375;margin-bottom:8px"><span>Subtotal</span><span>Rp {{ number_format($total,0,',','.') }}</span></div>
  <div style="display:flex;justify-content:space-between;font-size:13px;color:#4A6375;margin-bottom:14px"><span>Ongkir</span><span style="color:#6BAED6">Dihitung kemudian</span></div>
  <div style="display:flex;justify-content:space-between;font-size:16px;font-weight:700;color:#1C2B3A;padding-top:10px;border-top:1px solid rgba(107,174,214,.15)"><span>Total</span><span>Rp {{ number_format($total,0,',','.') }}</span></div>
 </div>
</div>

</div>
</form>
</div>
</div>

@section('scripts')
<script>
function switchPay(val){
  document.getElementById('r-'+val).checked=true;
  var isTrans=val==='transfer';
  document.getElementById('bank-info').style.display=isTrans?'block':'none';
  document.getElementById('lbl-midtrans').classList.toggle('active',!isTrans);
  document.getElementById('lbl-transfer').classList.toggle('active',isTrans);
}
document.querySelectorAll('input[name="payment_method"]').forEach(function(r){
  r.addEventListener('change',function(){switchPay(this.value);});
});
</script>
@endsection
@endsection
