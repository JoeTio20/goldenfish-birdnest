@extends('layouts.app')
@section('title','Sarang Burung Premium')
@section('head')
<style>
.marquee-wrap{overflow:hidden;white-space:nowrap;background:#0D1B2A;border-top:1px solid rgba(255,255,255,.05);border-bottom:1px solid rgba(255,255,255,.05);padding:12px 0}
.marquee-track{display:inline-flex;animation:marquee 26s linear infinite}
.marquee-track:hover{animation-play-state:paused}
@keyframes marquee{0%{transform:translateX(0)}100%{transform:translateX(-50%)}}
.marquee-item{display:inline-flex;align-items:center;gap:10px;padding:0 28px;font-size:10px;font-weight:600;letter-spacing:.22em;text-transform:uppercase;color:rgba(255,255,255,.35)}
.marquee-dot{width:3px;height:3px;border-radius:50%;background:#6BAED6;flex-shrink:0}
.product-card{background:#fff;border-radius:12px;overflow:hidden;transition:transform .25s,box-shadow .25s;border:1px solid rgba(0,0,0,.06)}
.product-card:hover{transform:translateY(-4px);box-shadow:0 16px 36px rgba(0,0,0,.08)}
.stat-card{text-align:center;padding:32px 20px;border-right:1px solid rgba(255,255,255,.06)}
.stat-card:last-child{border-right:none}
</style>
@endsection
@section('content')

<section style="position:relative;min-height:100vh;display:flex;align-items:center;justify-content:center;overflow:hidden">
  <div style="position:absolute;inset:0;background-image:url('/IMAGE/SUPER.jpeg');background-size:cover;background-position:center;opacity:.5"></div>
  <div style="position:absolute;inset:0;background:linear-gradient(to bottom,rgba(8,14,24,.78) 0%,rgba(8,14,24,.28) 50%,rgba(8,14,24,.82) 100%)"></div>
  <div style="position:relative;z-index:2;text-align:center;padding:0 20px;max-width:680px">
    <p style="font-size:11px;font-weight:600;letter-spacing:.32em;text-transform:uppercase;color:#6BAED6;margin:0 0 20px">Dari Alam untuk Kualitas</p>
    <h1 class="serif" style="font-size:clamp(2.8rem,6vw,4.5rem);line-height:1.08;color:#fff;font-weight:700;margin:0 0 24px">Kemurnian dalam<br>Setiap Sarang</h1>
    <p style="font-size:15px;color:rgba(255,255,255,.58);max-width:440px;margin:0 auto 40px;line-height:1.9">Dipanen dengan penuh kehati-hatian dari sarang walet pilihan untuk menjaga kualitas terbaik.</p>
    <div style="display:flex;align-items:center;justify-content:center;gap:14px;flex-wrap:wrap">
      <a href='{{ route('product') }}' style='display:inline-block;padding:13px 30px;font-size:11px;font-weight:600;letter-spacing:.12em;text-transform:uppercase;border-radius:100px;background:#6BAED6;color:#0D1B2A;text-decoration:none'>Lihat Produk</a>
      <a href='{{ route('philosophy') }}' style='display:inline-block;padding:13px 30px;font-size:11px;font-weight:600;letter-spacing:.12em;text-transform:uppercase;border-radius:100px;background:rgba(255,255,255,.09);color:#fff;border:1px solid rgba(255,255,255,.18);text-decoration:none'>Filosofi Kami</a>
    </div>
  </div>
  <div style="position:absolute;bottom:36px;left:50%;transform:translateX(-50%);z-index:2"><div style="width:1px;height:48px;background:linear-gradient(to bottom,transparent,#6BAED6)"></div></div>
</section>

<div class="marquee-wrap"><div class="marquee-track">
@for($i=0;$i<2;$i++)
<span class="marquee-item"><span class="marquee-dot"></span>Sarang Burung Premium</span>
<span class="marquee-item"><span class="marquee-dot"></span>Kualitas Ekspor</span>
<span class="marquee-item"><span class="marquee-dot"></span>100% Natural</span>
<span class="marquee-item"><span class="marquee-dot"></span>Hygiene Certified</span>
<span class="marquee-item"><span class="marquee-dot"></span>Free Shipping 500rb+</span>
<span class="marquee-item"><span class="marquee-dot"></span>Dipanen Langsung</span>
<span class="marquee-item"><span class="marquee-dot"></span>Tanpa Bahan Pengawet</span>
<span class="marquee-item"><span class="marquee-dot"></span>Terpercaya Sejak 2015</span>
@endfor
</div></div>

<section style="background:#0D1B2A"><div class="max-w-5xl mx-auto"><style>
.feat-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:16px}
@media(max-width:767px){.feat-grid{grid-template-columns:repeat(2,1fr)}}
@media(max-width:479px){.feat-grid{grid-template-columns:1fr}}
</style>
<div class="feat-grid">
@foreach($featuredProducts as $product)
<div style="background:#fff;border-radius:12px;overflow:hidden;border:1px solid rgba(107,174,214,.12);transition:transform .2s,box-shadow .2s" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 12px 28px rgba(13,27,42,.1)'" onmouseout="this.style.transform='';this.style.boxShadow=''">
<div style="aspect-ratio:1;overflow:hidden;background:#EDF4F8">
<img src="{{ $product->thumbnail }}" alt="{{ $product->name }}" style="width:100%;height:100%;object-fit:cover;display:block" onerror="this.src='/IMAGE/SUPER.jpeg'">
</div>
<div style="padding:14px 14px 16px">
<p style="font-weight:600;font-size:13px;color:#1C2B3A;margin:0 0 4px">{{ $product->name }}</p>
<p style="font-size:13px;font-weight:700;color:#6BAED6;margin:0 0 12px">Rp {{ number_format($product->price,0,',','.') }}</p>
<form method="POST" action="{{ route('cart.add') }}">@csrf
<input type="hidden" name="product_id" value="{{ $product->id }}">
<button type="submit" style="width:100%;font-size:10px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;padding:10px;border-radius:7px;background:#6BAED6;color:#0D1B2A;border:none;cursor:pointer">Tambah ke Keranjang</button>
</form>
</div></div>
@endforeach
</div>
<div style='text-align:center;margin-top:44px'><a href='{{ route('product') }}' style='display:inline-block;padding:13px 34px;font-size:11px;font-weight:600;letter-spacing:.15em;text-transform:uppercase;border-radius:100px;border:1.5px solid #0D1B2A;color:#0D1B2A;text-decoration:none'>Semua Produk &rarr;</a></div>
</div></section>

<section style="position:relative;min-height:380px;display:flex;align-items:center;justify-content:center;overflow:hidden">
  <div style="position:absolute;inset:0;background-image:url('/IMAGE/MANGKOK.jpeg');background-size:cover;background-position:center;opacity:.46"></div>
  <div style="position:absolute;inset:0;background:linear-gradient(135deg,rgba(8,14,24,.9),rgba(10,18,28,.75))"></div>
  <div style="position:relative;z-index:2;text-align:center;padding:0 20px;max-width:540px">
    <p style="font-size:11px;font-weight:600;letter-spacing:.32em;text-transform:uppercase;color:#6BAED6;margin:0 0 16px">Pesan Sekarang</p>
    <h2 class="serif" style="font-size:clamp(1.8rem,4vw,2.8rem);color:#fff;font-weight:700;margin:0 0 26px">Rasakan Kelezatan<br>Sarang Asli</h2>
    <a href='{{ route('product') }}' style='display:inline-block;padding:13px 34px;font-size:11px;font-weight:600;letter-spacing:.12em;text-transform:uppercase;border-radius:100px;background:#6BAED6;color:#0D1B2A;text-decoration:none'>Pesan Sekarang</a>
  </div>
</section>

@endsection
