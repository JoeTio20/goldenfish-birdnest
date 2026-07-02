@extends('layouts.app')
@section('title', 'Sarang Burung')
@section('content')

<!-- ═══ HERO FULLSCREEN ═══ -->
<section class="relative h-screen min-h-[600px] flex items-center justify-center overflow-hidden">
  <img src="/IMAGE/SUPER.jpeg" alt="Sarang Burung" class="absolute inset-0 w-full h-full object-cover scale-105" style="filter:brightness(.45)">
  <div class="absolute inset-0" style="background:linear-gradient(160deg,rgba(27,58,31,.7) 0%,rgba(0,0,0,.3) 50%,rgba(200,150,90,.15) 100%)"></div>
  <div class="relative z-10 text-center px-6 max-w-4xl mx-auto">
    <span class="inline-block text-[11px] tracking-[.35em] uppercase text-[#C9A84C] mb-6 font-semibold">Produk Premium Indonesia</span>
    <h1 class="font-serif text-5xl md:text-7xl font-normal text-white leading-tight mb-8">{{ __('home.hero_title') }}</h1>
    <p class="text-white/70 text-base md:text-lg max-w-xl mx-auto mb-10 leading-relaxed">{{ __('home.hero_sub') }}</p>
    <div class="flex gap-4 justify-center flex-wrap">
      <a href="{{ route('product') }}" class="bg-[#C9A84C] text-white text-[11px] tracking-[.18em] uppercase px-9 py-4 hover:bg-[#b07a40] transition font-semibold">{{ __('home.shop_now') }}</a>
      <a href="{{ route('philosophy') }}" class="border border-white/60 text-white text-[11px] tracking-[.18em] uppercase px-9 py-4 hover:bg-white hover:text-[#1B3A1F] transition">{{ __('home.our_story') }}</a>
    </div>
  </div>
  <!-- Scroll indicator -->
  <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-white/40">
    <span class="text-[9px] tracking-[.3em] uppercase">Scroll</span>
    <div class="w-px h-10 bg-white/30 animate-pulse"></div>
  </div>
</section>

<!-- ═══ BRAND STRIP ═══ -->
<section class="bg-[#1B3A1F] py-5 px-6">
  <div class="max-w-7xl mx-auto flex flex-wrap justify-center md:justify-between items-center gap-6 text-white/50 text-[10px] tracking-[.25em] uppercase">
    <span class="text-[#C9A84C] font-semibold">Sarang Burung Premium</span>
    <span>&#9670; Kualitas Ekspor</span>
    <span>&#9670; 100% Natural</span>
    <span>&#9670; Hygiene Certified</span>
    <span>&#9670; Free Shipping 500rb+</span>
  </div>
</section>

<!-- ═══ MASTERWORK (image kiri, text kanan) ═══ -->
<section class="bg-[#F5EFE6] py-24 px-6">
  <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
    <div class="relative">
      <div class="overflow-hidden aspect-[3/4] shadow-2xl">
        <img src="/IMAGE/MANGKOK.jpeg" alt="Produk" class="w-full h-full object-cover hover:scale-105 transition duration-700">
      </div>
      <div class="absolute -bottom-5 -right-5 w-40 h-40 border-2 border-[#C9A84C] -z-0 hidden md:block"></div>
    </div>
    <div class="relative z-10">
      <span class="block text-[10px] tracking-[.3em] uppercase text-[#C9A84C] font-semibold mb-4">Keunggulan Kami</span>
      <h2 class="font-serif text-4xl md:text-5xl font-normal text-[#1A1A18] mb-6 leading-tight">{{ __('home.masterwork_title') }}</h2>
      <div class="w-12 h-0.5 bg-[#C9A84C] mb-6"></div>
      <p class="text-[#6B6B6B] leading-relaxed mb-4 text-sm">{{ __('home.masterwork_p1') }}</p>
      <p class="text-[#6B6B6B] leading-relaxed mb-8 text-sm">{{ __('home.masterwork_p2') }}</p>
      <a href="{{ route('philosophy') }}" class="inline-flex items-center gap-3 text-[11px] font-semibold tracking-[.2em] uppercase text-[#1B3A1F] border-b border-[#C9A84C] pb-1 hover:text-[#C9A84C] transition">
        {{ __('home.read_story') }} <span class="text-[#C9A84C]">&rarr;</span>
      </a>
    </div>
  </div>
</section>

<!-- ═══ STATS ═══ -->
<section class="bg-[#1B3A1F] py-16 px-6">
  <div class="max-w-5xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
    <div><p class="font-serif text-4xl text-[#C9A84C] font-normal mb-2">10+</p><p class="text-[10px] tracking-[.2em] uppercase text-white/50">Tahun Pengalaman</p></div>
    <div><p class="font-serif text-4xl text-[#C9A84C] font-normal mb-2">50+</p><p class="text-[10px] tracking-[.2em] uppercase text-white/50">Produk Premium</p></div>
    <div><p class="font-serif text-4xl text-[#C9A84C] font-normal mb-2">1K+</p><p class="text-[10px] tracking-[.2em] uppercase text-white/50">Pelanggan Puas</p></div>
    <div><p class="font-serif text-4xl text-[#C9A84C] font-normal mb-2">15+</p><p class="text-[10px] tracking-[.2em] uppercase text-white/50">Kota Pengiriman</p></div>
  </div>
</section>

<!-- ═══ FEATURED PRODUCTS ═══ -->
<section class="bg-[#FAF7F4] py-24 px-6">
  <div class="max-w-7xl mx-auto">
    <div class="flex justify-between items-end mb-12">
      <div>
        <span class="block text-[10px] tracking-[.3em] uppercase text-[#C9A84C] font-semibold mb-3">{{ __('home.collection_label') }}</span>
        <h2 class="font-serif text-4xl font-normal text-[#1A1A18]">{{ __('home.collection_title') }}</h2>
      </div>
      <a href="{{ route('product') }}" class="hidden md:flex items-center gap-2 text-[11px] tracking-[.18em] uppercase text-[#6B6B6B] border-b border-[#C9A84C] pb-1 hover:text-[#C9A84C] transition">
        {{ __('home.view_all') }} &rarr;
      </a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
      @foreach($featured as $p)
      @php $img = is_array($p->images) ? ($p->images[0] ?? '/IMAGE/SUPER.jpeg') : '/IMAGE/SUPER.jpeg'; @endphp
      <div class="group bg-white shadow-sm hover:shadow-xl transition-shadow duration-300">
        <div class="relative overflow-hidden aspect-[4/3]">
          @if($p->badge === 'limited')
            <span class="absolute top-3 left-3 z-10 bg-[#1B3A1F] text-white text-[9px] font-bold tracking-widest uppercase px-3 py-1">Limited</span>
          @elseif($p->badge === 'new')
            <span class="absolute top-3 left-3 z-10 bg-[#C9A84C] text-white text-[9px] font-bold tracking-widest uppercase px-3 py-1">New</span>
          @endif
          <img src="{{ $img }}" alt="{{ $p->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-700" onerror="this.src='/IMAGE/SUPER.jpeg'">
        </div>
        <div class="p-5 border-t border-gray-100">
          <div class="flex justify-between items-start mb-3">
            <h3 class="font-serif text-lg text-[#1A1A18]">{{ $p->name }}</h3>
            <p class="text-sm font-semibold text-[#C9A84C] whitespace-nowrap ml-2">Rp {{ number_format($p->price,0,',','.') }}</p>
          </div>
          <button class="btn-add-cart w-full bg-[#1B3A1F] text-white text-[10px] tracking-[.15em] uppercase py-3 hover:bg-[#C9A84C] transition duration-300 font-semibold"
            data-id="{{ $p->id }}"
            data-name="{{ $p->name }}"
            data-price="{{ $p->price }}"
            data-image="{{ $img }}">
            {{ __('home.add_to_cart') }}
          </button>
        </div>
      </div>
      @endforeach
    </div>
    <div class="text-center mt-10 md:hidden">
      <a href="{{ route('product') }}" class="inline-block border border-[#1B3A1F] text-[#1B3A1F] text-[11px] tracking-widest uppercase px-8 py-3 hover:bg-[#1B3A1F] hover:text-white transition">Lihat Semua Produk</a>
    </div>
  </div>
</section>

<!-- ═══ FULLSCREEN BANNER ═══ -->
<section class="relative min-h-[500px] md:min-h-[600px] flex items-center justify-center overflow-hidden">
  <img src="/IMAGE/PATAH BESAR.jpeg" alt="" class="absolute inset-0 w-full h-full object-cover" style="filter:brightness(.35)">
  <div class="absolute inset-0" style="background:linear-gradient(to top,rgba(27,58,31,.8),transparent)"></div>
  <div class="relative z-10 text-center px-6 max-w-3xl mx-auto">
    <span class="block text-[10px] tracking-[.35em] uppercase text-[#C9A84C] font-semibold mb-5">Kualitas Terjamin</span>
    <h2 class="font-serif text-4xl md:text-6xl font-normal text-white leading-tight mb-8">{{ __('home.banner_title') }}</h2>
    <a href="{{ route('philosophy') }}" class="inline-block border border-white/70 text-white text-[11px] tracking-[.2em] uppercase px-10 py-4 hover:bg-white hover:text-[#1B3A1F] transition">{{ __('home.banner_cta') }}</a>
  </div>
</section>

@endsection
