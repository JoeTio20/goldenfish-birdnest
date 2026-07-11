@extends('layouts.app')
@section('title','Keranjang - Sarang Burung')
@section('head')
<style>
.serif{font-family:'Cormorant Garamond',serif}
.cart-grid{display:grid;grid-template-columns:1fr 320px;gap:24px;align-items:start}
.cart-item{background:#fff;border:1px solid rgba(200,168,76,.15);border-radius:12px;padding:16px;display:flex;gap:16px;margin-bottom:12px}
.qty-form{display:flex;align-items:center;border:1px solid rgba(200,168,76,.2);border-radius:8px;overflow:hidden}
.qty-btn{width:32px;height:32px;background:transparent;border:none;font-size:16px;cursor:pointer;color:#1A3D3A;display:flex;align-items:center;justify-content:center}
.qty-btn:hover{background:rgba(200,168,76,.1)}
.related-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:16px}
@media(max-width:767px){.cart-grid{grid-template-columns:1fr}.related-grid{grid-template-columns:repeat(2,1fr)}}
@media(max-width:399px){.related-grid{grid-template-columns:1fr}}
</style>
@endsection
@section('content')

<div style="background:#F5F8F6;min-height:80vh;padding:32px 24px">
<div style="max-width:1100px;margin:0 auto">
<p style="font-size:11px;color:#4A6B6B;margin-bottom:20px">
 <a href="{{ route('home') }}" style="color:#4A6B6B">Home</a>
 <span style="margin:0 6px">&rsaquo;</span>
 <span style="color:#1A3D3A;font-weight:500">Keranjang Belanja</span>
</p>
<h1 class="serif" style="font-size:2rem;font-weight:700;color:#1A3D3A;margin-bottom:4px">Keranjang Kamu</h1>
<p style="font-size:13px;color:#4A6B6B;margin-bottom:28px">Pilihan produk unggulan, siap dikirim.</p>
<div style="height:1px;background:rgba(200,168,76,.15);margin-bottom:28px"></div>

@if(empty($cart))
<div style="text-align:center;padding:80px 0">
 <svg width="52" height="52" fill="none" stroke="rgba(200,168,76,.5)" stroke-width="1.3" viewBox="0 0 24 24" style="margin:0 auto 20px;display:block"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/></svg>
 <h2 class="serif" style="font-size:1.8rem;font-weight:700;color:#1A3D3A;margin-bottom:8px">Keranjang kosong</h2>
 <p style="font-size:13px;color:#4A6B6B;margin-bottom:28px">Temukan produk terbaik kami.</p>
 <a href="{{ route('product') }}" style="display:inline-block;padding:13px 32px;font-size:11px;font-weight:700;letter-spacing:.15em;text-transform:uppercase;border-radius:100px;background:#0D3535;color:#fff">Lihat Produk</a>
</div>
@else
<div class="cart-grid">

<div>
@foreach($cart as $id => $item)
<div class="cart-item">
 <img loading="lazy" decoding="async" src="{{ $item['image'] ?? '/IMAGE/SUPER.jpeg' }}" style="width:88px;height:88px;object-fit:cover;border-radius:10px;border:1px solid rgba(200,168,76,.12);flex-shrink:0" onerror="this.src='/IMAGE/SUPER.jpeg'">
 <div style="flex:1;min-width:0">
  <div style="display:flex;justify-content:space-between;align-items:flex-start;gap:8px;margin-bottom:8px">
   <p class="serif" style="font-size:16px;font-weight:600;color:#1A3D3A;margin:0">{{ $item['name'] }}</p>
   <p style="font-size:14px;font-weight:700;color:#1A3D3A;white-space:nowrap;margin:0">Rp {{ number_format($item['price']*$item['qty'],0,',','.') }}</p>
  </div>
  <p style="font-size:12px;color:#4A6B6B;margin-bottom:14px">Rp {{ number_format($item['price'],0,',','.') }} / pcs</p>
  <div style="display:flex;justify-content:space-between;align-items:center">
   <form method="POST" action="{{ route('cart.update') }}" class="qty-form">@csrf
    <input type="hidden" name="product_id" value="{{ $id }}">
    <button type="submit" name="qty" value="{{ $item['qty']-1 }}" class="qty-btn">&#8722;</button>
    <span style="width:36px;text-align:center;font-size:14px;font-weight:600;color:#1A3D3A">{{ $item['qty'] }}</span>
    <button type="submit" name="qty" value="{{ $item['qty']+1 }}" class="qty-btn">&#43;</button>
   </form>
   <form method="POST" action="{{ route('cart.remove') }}">@csrf
    <input type="hidden" name="product_id" value="{{ $id }}">
    <button class="qty-btn" style="width:auto;padding:6px 12px;font-size:11px;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:#4A6B6B;border:1px solid rgba(200,168,76,.2);border-radius:8px" onmouseover="this.style.color='#c0392b';this.style.borderColor='rgba(192,57,43,.3)'" onmouseout="this.style.color='#4A6B6B';this.style.borderColor='rgba(200,168,76,.2)'">Hapus</button>
   </form>
  </div>
 </div>
</div>
@endforeach
</div>

<div style="background:#fff;border:1px solid rgba(200,168,76,.18);border-radius:12px;padding:24px;position:sticky;top:80px">
 <h3 class="serif" style="font-size:1.2rem;font-weight:700;color:#1A3D3A;margin-bottom:20px;padding-bottom:14px;border-bottom:1px solid rgba(200,168,76,.12)">Ringkasan Pesanan</h3>
 @php $subtotal = collect($cart)->sum(fn($i) => $i['price'] * $i['qty']); @endphp
 <div style="display:flex;justify-content:space-between;font-size:13px;color:#4A6B6B;margin-bottom:10px"><span>Subtotal</span><span>Rp {{ number_format($subtotal,0,',','.') }}</span></div>
 <div style="display:flex;justify-content:space-between;font-size:13px;color:#4A6B6B;margin-bottom:16px"><span>Ongkir</span><span style="color:#C9A84C">Dihitung saat checkout</span></div>
 <div style="height:1px;background:rgba(200,168,76,.12);margin-bottom:16px"></div>
 <div style="display:flex;justify-content:space-between;font-size:16px;font-weight:700;color:#1A3D3A;margin-bottom:20px"><span>Total</span><span>Rp {{ number_format($subtotal,0,',','.') }}</span></div>
 <a href="{{ route('checkout.index') }}" style="display:block;text-align:center;padding:14px;font-size:11px;font-weight:700;letter-spacing:.15em;text-transform:uppercase;border-radius:100px;background:#0D3535;color:#fff;margin-bottom:10px" onmouseover="this.style.background='#C9A84C';this.style.color='#0D3535'" onmouseout="this.style.background='#0D3535';this.style.color='#fff'">Lanjut Checkout</a>
 <a href="{{ route('product') }}" style="display:block;text-align:center;padding:13px;font-size:11px;font-weight:600;letter-spacing:.12em;text-transform:uppercase;border-radius:100px;border:1.5px solid rgba(13,53,53,.2);color:#1A3D3A">Lanjut Belanja</a>
 <p style="font-size:10px;color:#4A6B6B;text-align:center;margin-top:14px">&#x1F512; Transaksi dienkripsi SSL 256-bit</p>
</div>

</div>

@if(isset($related) && $related->count())
<div style="margin-top:56px">
 <div style="display:flex;justify-content:space-between;align-items:baseline;margin-bottom:20px">
  <h2 class="serif" style="font-size:1.6rem;font-weight:700;color:#1A3D3A">Lengkapi Pesananmu</h2>
  <a href="{{ route('product') }}" style="font-size:11px;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:#C9A84C;border-bottom:1px solid #C9A84C">Lihat Semua</a>
 </div>
 <div class="related-grid">
 @foreach($related as $p)
 <div style="background:#fff;border-radius:12px;overflow:hidden;border:1px solid rgba(200,168,76,.12)">
  <div style="aspect-ratio:1;overflow:hidden;background:#E8F0E8">
   <img loading="lazy" decoding="async" src="{{ $p->thumbnail }}" style="width:100%;height:100%;object-fit:cover" onerror="this.src='/IMAGE/SUPER.jpeg'">
  </div>
  <div style="padding:12px">
   <p style="font-size:13px;font-weight:600;color:#1A3D3A;margin-bottom:4px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">{{ $p->name }}</p>
   <p style="font-size:12px;color:#4A6B6B;margin-bottom:10px">Rp {{ number_format($p->price,0,',','.') }}</p>
   <form method="POST" action="{{ route('cart.add') }}">@csrf
   <input type="hidden" name="product_id" value="{{ $p->id }}">
   <button type="submit" style="width:100%;padding:9px;font-size:10px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;background:#C9A84C;color:#0D3535;border:none;border-radius:8px;cursor:pointer">+ Keranjang</button>
   </form>
  </div>
 </div>
 @endforeach
 </div>
</div>
@endif
@endif
</div>
</div>

@endsection
