@extends('layouts.app')
@section('title','Sarang Burung Premium')
@section('head')
<style>
.marquee-wrap{overflow:hidden;white-space:nowrap;background:#0E1508;border-top:1px solid rgba(255,255,255,.05);border-bottom:1px solid rgba(255,255,255,.05);padding:12px 0}
.marquee-track{display:inline-flex;animation:marquee 26s linear infinite}
.marquee-track:hover{animation-play-state:paused}
@keyframes marquee{0%{transform:translateX(0)}100%{transform:translateX(-50%)}}
.marquee-item{display:inline-flex;align-items:center;gap:10px;padding:0 28px;font-size:10px;font-weight:600;letter-spacing:.22em;text-transform:uppercase;color:rgba(255,255,255,.35)}
.marquee-dot{width:3px;height:3px;border-radius:50%;background:#C4975A;flex-shrink:0}
.product-card{background:#fff;border-radius:12px;overflow:hidden;transition:transform .25s,box-shadow .25s;border:1px solid rgba(0,0,0,.06)}
.product-card:hover{transform:translateY(-4px);box-shadow:0 16px 36px rgba(0,0,0,.08)}
.stat-card{text-align:center;padding:32px 20px;border-right:1px solid rgba(255,255,255,.06)}
.stat-card:last-child{border-right:none}
</style>
@endsection
@section('content')

<section style="position:relative;min-height:100vh;display:flex;align-items:center;justify-content:center;overflow:hidden">
  <div style="position:absolute;inset:0;background-image:url('/IMAGE/SUPER.jpeg');background-size:cover;background-position:center;opacity:.5"></div>
  <div style="position:absolute;inset:0;background:linear-gradient(to bottom,rgba(6,12,6,.78) 0%,rgba(6,12,6,.28) 50%,rgba(6,12,6,.82) 100%)"></div>
  <div style="position:relative;z-index:2;text-align:center;padding:0 20px;max-width:680px">
    <p style="font-size:11px;font-weight:600;letter-spacing:.32em;text-transform:uppercase;color:#C4975A;margin:0 0 20px">Dari Alam untuk Kualitas</p>
    <h1 class="serif" style="font-size:clamp(2.8rem,6vw,4.5rem);line-height:1.08;color:#fff;font-weight:700;margin:0 0 24px">Kemurnian dalam<br>Setiap Sarang</h1>
    <p style="font-size:15px;color:rgba(255,255,255,.58);max-width:440px;margin:0 auto 40px;line-height:1.9">Dipanen dengan penuh kehati-hatian dari sarang walet pilihan untuk menjaga kualitas terbaik.</p>
    <div style="display:flex;align-items:center;justify-content:center;gap:14px;flex-wrap:wrap">
      <a href='{{ route('product') }}' style='display:inline-block;padding:13px 30px;font-size:11px;font-weight:600;letter-spacing:.12em;text-transform:uppercase;border-radius:100px;background:#C4975A;color:#0E1508;text-decoration:none'>Lihat Produk</a>
      <a href='{{ route('philosophy') }}' style='display:inline-block;padding:13px 30px;font-size:11px;font-weight:600;letter-spacing:.12em;text-transform:uppercase;border-radius:100px;background:rgba(255,255,255,.09);color:#fff;border:1px solid rgba(255,255,255,.18);text-decoration:none'>Filosofi Kami</a>
    </div>
  </div>
  <div style="position:absolute;bottom:36px;left:50%;transform:translateX(-50%);z-index:2"><div style="width:1px;height:48px;background:linear-gradient(to bottom,transparent,#C4975A)"></div></div>
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

<section style="background:#0E1508"><div class="max-w-5xl mx-auto"><div class="grid grid-cols-2 md:grid-cols-4">
<div class="stat-card"><p class="serif" style="font-size:2.4rem;font-weight:700;color:#C4975A;margin:0 0 4px">10+</p><p style="font-size:10px;letter-spacing:.15em;text-transform:uppercase;color:rgba(255,255,255,.28);margin:0">Tahun Pengalaman</p></div>
<div class="stat-card"><p class="serif" style="font-size:2.4rem;font-weight:700;color:#C4975A;margin:0 0 4px">50+</p><p style="font-size:10px;letter-spacing:.15em;text-transform:uppercase;color:rgba(255,255,255,.28);margin:0">Varian Produk</p></div>
<div class="stat-card"><p class="serif" style="font-size:2.4rem;font-weight:700;color:#C4975A;margin:0 0 4px">1K+</p><p style="font-size:10px;letter-spacing:.15em;text-transform:uppercase;color:rgba(255,255,255,.28);margin:0">Pelanggan Puas</p></div>
<div class="stat-card"><p class="serif" style="font-size:2.4rem;font-weight:700;color:#C4975A;margin:0 0 4px">15+</p><p style="font-size:10px;letter-spacing:.15em;text-transform:uppercase;color:rgba(255,255,255,.28);margin:0">Kota Pengiriman</p></div>
</div></div></section>

<section style="background:#FAFAF5;padding:90px 20px"><div class="max-w-6xl mx-auto">
<div class="grid grid-cols-1 md:grid-cols-2 gap-14 items-center">
<div><img src="/IMAGE/PATAH BESAR.jpeg" alt="" style="width:100%;border-radius:14px;aspect-ratio:4/5;object-fit:cover;display:block"></div>
<div>
<p style="font-size:11px;font-weight:600;letter-spacing:.25em;text-transform:uppercase;color:#C4975A;margin:0 0 16px">Tentang Kami</p>
<h2 class="serif" style="font-size:clamp(2rem,4vw,2.8rem);line-height:1.2;color:#0E1508;font-weight:700;margin:0 0 22px">Sarang Pilihan,<br>Kualitas Terjamin</h2>
<p style="font-size:14px;color:#5a5a50;line-height:1.95;margin:0 0 14px">Kami menghadirkan sarang burung walet premium yang dipanen langsung dari sumber terpercaya. Setiap produk melalui proses pembersihan ketat tanpa bahan kimia tambahan.</p>
<p style="font-size:14px;color:#5a5a50;line-height:1.95;margin:0 0 34px">Dengan pengalaman lebih dari satu dekade, kami memastikan setiap sarang yang sampai ke tangan Anda adalah yang terbaik.</p>
<a href='{{ route('philosophy') }}' style='font-size:11px;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:#0E1508;text-decoration:none;border-bottom:1.5px solid #C4975A;padding-bottom:3px'>Baca Filosofi Kami &rarr;</a>
</div></div></div></section>

<section style="background:#F4EFDF;padding:90px 20px"><div class="max-w-6xl mx-auto">
<div style="text-align:center;margin-bottom:52px"><p style="font-size:11px;font-weight:600;letter-spacing:.25em;text-transform:uppercase;color:#C4975A;margin:0 0 12px">Koleksi Kami</p>
<h2 class="serif" style="font-size:clamp(2rem,4vw,2.8rem);color:#0E1508;font-weight:700;margin:0">Produk Unggulan</h2></div>
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
@foreach($featuredProducts as $product)
<div class="product-card">
@if($product->image)
<img src='/IMAGE/{{ $product->image }}' alt='{{ $product->name }}' style='width:100%;height:190px;object-fit:cover;display:block'>
@else
<div style="width:100%;height:190px;background:#EDE5D2;display:flex;align-items:center;justify-content:center"><svg width="36" height="36" fill="none" stroke="#C4975A" stroke-width="1" viewBox="0 0 24 24" opacity=".35"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg></div>
@endif
<div style="padding:14px"><p style="font-weight:600;font-size:13px;color:#0E1508;margin:0 0 5px">{{ $product->name }}</p>
<p style="font-size:13px;font-weight:700;color:#C4975A;margin:0 0 12px">Rp {{ number_format($product->price,0,',','.') }}</p>
<a href='{{ route('product') }}' style='display:block;text-align:center;font-size:10px;font-weight:600;letter-spacing:.08em;text-transform:uppercase;padding:9px;border-radius:7px;background:#0E1508;color:#fff;text-decoration:none'>Lihat Detail</a>
</div></div>
@endforeach
</div>
<div style='text-align:center;margin-top:44px'><a href='{{ route('product') }}' style='display:inline-block;padding:13px 34px;font-size:11px;font-weight:600;letter-spacing:.15em;text-transform:uppercase;border-radius:100px;border:1.5px solid #0E1508;color:#0E1508;text-decoration:none'>Semua Produk &rarr;</a></div>
</div></section>

<section style="position:relative;min-height:380px;display:flex;align-items:center;justify-content:center;overflow:hidden">
  <div style="position:absolute;inset:0;background-image:url('/IMAGE/MANGKOK.jpeg');background-size:cover;background-position:center;opacity:.46"></div>
  <div style="position:absolute;inset:0;background:linear-gradient(135deg,rgba(6,12,6,.9),rgba(14,21,8,.75))"></div>
  <div style="position:relative;z-index:2;text-align:center;padding:0 20px;max-width:540px">
    <p style="font-size:11px;font-weight:600;letter-spacing:.32em;text-transform:uppercase;color:#C4975A;margin:0 0 16px">Pesan Sekarang</p>
    <h2 class="serif" style="font-size:clamp(1.8rem,4vw,2.8rem);color:#fff;font-weight:700;margin:0 0 26px">Rasakan Kelezatan<br>Sarang Asli</h2>
    <a href='{{ route('product') }}' style='display:inline-block;padding:13px 34px;font-size:11px;font-weight:600;letter-spacing:.12em;text-transform:uppercase;border-radius:100px;background:#C4975A;color:#0E1508;text-decoration:none'>Pesan Sekarang</a>
  </div>
</section>

@endsection
