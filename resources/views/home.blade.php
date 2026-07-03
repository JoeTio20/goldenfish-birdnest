@extends('layouts.app')
@section('title','Sarang Burung Premium')
@section('head')
<style>
.marquee-wrap{overflow:hidden;white-space:nowrap;background:#0D3535;border-top:1px solid rgba(255,255,255,.05);border-bottom:1px solid rgba(255,255,255,.05);padding:12px 0}
.marquee-track{display:inline-flex;animation:marquee 26s linear infinite}
.marquee-track:hover{animation-play-state:paused}
@keyframes marquee{0%{transform:translateX(0)}100%{transform:translateX(-50%)}}
.marquee-item{display:inline-flex;align-items:center;gap:10px;padding:0 28px;font-size:10px;font-weight:600;letter-spacing:.22em;text-transform:uppercase;color:rgba(255,255,255,.35)}
.marquee-dot{width:3px;height:3px;border-radius:50%;background:#C9A84C;flex-shrink:0}
.feat-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:16px}
.feat-card{background:#fff;border-radius:12px;overflow:hidden;border:1px solid rgba(200,168,76,.15);transition:transform .25s,box-shadow .25s}
.feat-card:hover{transform:translateY(-4px);box-shadow:0 14px 32px rgba(13,53,53,.1)}
.stat-card{text-align:center;padding:32px 20px;border-right:1px solid rgba(255,255,255,.06)}
.stat-card:last-child{border-right:none}
.about-grid{display:grid;grid-template-columns:1fr 1fr;gap:56px;align-items:center}
@media(max-width:767px){.feat-grid{grid-template-columns:repeat(2,1fr)}.stat-card{border-right:none;border-bottom:1px solid rgba(255,255,255,.06)}.about-grid{grid-template-columns:1fr}}
@media(max-width:479px){.feat-grid{grid-template-columns:1fr}}
</style>
@endsection
@section('content')

<section style="position:relative;min-height:100vh;display:flex;align-items:center;justify-content:center;overflow:hidden">
 <div style="position:absolute;inset:0;background-image:url('/IMAGE/SUPER.jpeg');background-size:cover;background-position:center;opacity:.5"></div>
 <div style="position:absolute;inset:0;background:linear-gradient(to bottom,rgba(8,14,24,.78) 0%,rgba(8,14,24,.28) 50%,rgba(8,14,24,.82) 100%)"></div>
 <div style="position:relative;z-index:2;text-align:center;padding:0 24px;max-width:700px;margin:0 auto">
  <p style="font-size:14px;font-weight:600;letter-spacing:.32em;text-transform:uppercase;color:#C9A84C;margin-bottom:22px">Dari Alam untuk Kualitas</p>
  <h1 class="serif" style="font-size:clamp(2.8rem,6vw,4.5rem);line-height:1.08;color:#fff;font-weight:700;margin-bottom:24px">Kemurnian dalam<br>Setiap Sarang</h1>
  <p style="font-size:15px;color:rgba(255,255,255,.58);max-width:440px;margin:0 auto 40px;line-height:1.9">Dipanen dengan penuh kehati-hatian dari sarang walet pilihan untuk menjaga kualitas terbaik.</p>
  <div style="display:flex;align-items:center;justify-content:center;gap:14px;flex-wrap:wrap">
   <a href="{{ route('product') }}" style="display:inline-block;padding:14px 32px;font-size:11px;font-weight:600;letter-spacing:.12em;text-transform:uppercase;border-radius:100px;background:#C9A84C;color:#0D3535">@lang('messages.hero_shop')</a>
   <a href="{{ route('philosophy') }}" style="display:inline-block;padding:14px 32px;font-size:11px;font-weight:600;letter-spacing:.12em;text-transform:uppercase;border-radius:100px;background:rgba(255,255,255,.09);color:#fff;border:1px solid rgba(255,255,255,.18)">@lang('messages.hero_phil')</a>
  </div>
 </div>
 <div style="position:absolute;bottom:36px;left:50%;transform:translateX(-50%);z-index:2"><div style="width:1px;height:48px;background:linear-gradient(to bottom,transparent,#C9A84C)"></div></div>
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

<section style="background:#0D3535;padding:48px 24px">
 <div style="max-width:900px;margin:0 auto;display:grid;grid-template-columns:repeat(4,1fr);text-align:center">
 <div class="stat-card"><p class="serif" style="font-size:2.4rem;font-weight:700;color:#C9A84C;margin-bottom:4px">10+</p><p style="font-size:10px;letter-spacing:.15em;text-transform:uppercase;color:rgba(255,255,255,.28)">Tahun Pengalaman</p></div>
 <div class="stat-card"><p class="serif" style="font-size:2.4rem;font-weight:700;color:#C9A84C;margin-bottom:4px">50+</p><p style="font-size:10px;letter-spacing:.15em;text-transform:uppercase;color:rgba(255,255,255,.28)">Varian Produk</p></div>
 <div class="stat-card"><p class="serif" style="font-size:2.4rem;font-weight:700;color:#C9A84C;margin-bottom:4px">1K+</p><p style="font-size:10px;letter-spacing:.15em;text-transform:uppercase;color:rgba(255,255,255,.28)">Pelanggan Puas</p></div>
 <div class="stat-card"><p class="serif" style="font-size:2.4rem;font-weight:700;color:#C9A84C;margin-bottom:4px">15+</p><p style="font-size:10px;letter-spacing:.15em;text-transform:uppercase;color:rgba(255,255,255,.28)">Kota Pengiriman</p></div>
 </div>
</section>

<section style="background:#F5F8F6;padding:88px 24px">
 <div style="max-width:1100px;margin:0 auto">
 <div class="about-grid">
  <div>
   <p style="font-size:11px;font-weight:600;letter-spacing:.28em;text-transform:uppercase;color:#C9A84C;margin-bottom:14px">Tentang Kami</p>
   <h2 class="serif" style="font-size:clamp(1.8rem,4vw,2.8rem);color:#1A3D3A;font-weight:700;line-height:1.15;margin-bottom:22px">@lang('messages.master_title')</h2>
   <p style="font-size:14px;color:#4A6B6B;line-height:1.9;margin-bottom:14px">@lang('messages.master_p1')</p>
   <p style="font-size:14px;color:#4A6B6B;line-height:1.9;margin-bottom:28px">@lang('messages.master_p2')</p>
   <a href="{{ route('philosophy') }}" style="font-size:11px;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:#0D3535;border-bottom:1.5px solid #C9A84C;padding-bottom:3px">@lang('messages.master_link') &rarr;</a>
  </div>
  <div><img src="/IMAGE/PATAH BESAR.jpeg" alt="" style="width:100%;border-radius:14px;aspect-ratio:4/5;object-fit:cover;display:block"></div>
 </div>
 </div>
</section>

<section style="background:#EBF2EE;padding:80px 24px">
 <div style="max-width:1140px;margin:0 auto">
  <div style="text-align:center;margin-bottom:48px">
   <p style="font-size:11px;font-weight:600;letter-spacing:.28em;text-transform:uppercase;color:#C9A84C;margin-bottom:12px">@lang('messages.feat_label')</p>
   <h2 class="serif" style="font-size:clamp(1.8rem,4vw,2.6rem);color:#1A3D3A;font-weight:700;margin:0">@lang('messages.feat_title')</h2>
  </div>
  <div class="feat-grid">
  @foreach($featuredProducts as $product)
  <div class="feat-card">
   <div style="aspect-ratio:1;overflow:hidden;background:#E8F0E8">
    <img src="{{ $product->thumbnail }}" alt="{{ $product->name }}" style="width:100%;height:100%;object-fit:cover;display:block" onerror="this.src='/IMAGE/SUPER.jpeg'">
   </div>
   <div style="padding:14px 14px 16px">
    <p style="font-weight:600;font-size:13px;color:#1A3D3A;margin-bottom:4px">{{ $product->name }}</p>
    <p style="font-size:13px;font-weight:700;color:#C9A84C;margin-bottom:12px">Rp {{ number_format($product->price,0,',','.') }}</p>
    <form method="POST" action="{{ route('cart.add') }}">@csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <button type="submit" style="width:100%;font-size:10px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;padding:10px;border-radius:7px;background:#C9A84C;color:#0D3535;border:none;cursor:pointer">@lang('messages.add_cart')</button>
    </form>
   </div>
  </div>
  @endforeach
  </div>
  <div style="text-align:center;margin-top:40px">
   <a href="{{ route('product') }}" style="display:inline-block;padding:13px 34px;font-size:11px;font-weight:600;letter-spacing:.15em;text-transform:uppercase;border-radius:100px;border:1.5px solid #0D3535;color:#0D3535">@lang('messages.feat_all') &rarr;</a>
  </div>
 </div>
</section>

<section style="position:relative;min-height:400px;display:flex;align-items:center;justify-content:center;overflow:hidden">
 <div style="position:absolute;inset:0;background-image:url('/IMAGE/MANGKOK.jpeg');background-size:cover;background-position:center;opacity:.46"></div>
 <div style="position:absolute;inset:0;background:rgba(8,14,24,.72)"></div>
 <div style="position:relative;z-index:2;text-align:center;padding:0 24px;max-width:540px">
  <p style="font-size:11px;font-weight:600;letter-spacing:.32em;text-transform:uppercase;color:#C9A84C;margin-bottom:16px">Pesan Sekarang</p>
  <h2 class="serif" style="font-size:clamp(1.8rem,4vw,3rem);color:#fff;font-weight:700;margin-bottom:24px">@lang('messages.banner_title')</h2>
  <a href="{{ route('product') }}" style="display:inline-block;padding:14px 36px;font-size:11px;font-weight:600;letter-spacing:.12em;text-transform:uppercase;border-radius:100px;background:#C9A84C;color:#0D3535">@lang('messages.banner_cta')</a>
 </div>
</section>

@endsection
