<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
<title>@yield('title','Sarang Burung')</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
*{box-sizing:border-box;-webkit-tap-highlight-color:transparent}
body{font-family:'Inter',sans-serif;background:#FAFAF5;color:#1C1C1A;margin:0}
.serif{font-family:'Cormorant Garamond',serif}
#navbar{background:#0E1508;position:sticky;top:0;z-index:50;border-bottom:1px solid rgba(255,255,255,.06)}
.nav-link{font-size:11px;letter-spacing:.18em;text-transform:uppercase;font-weight:500;color:rgba(255,255,255,.48);text-decoration:none;transition:color .2s}
.nav-link:hover,.nav-link.active{color:#C4975A}
#mobile-menu{display:none;background:#0E1508;border-top:1px solid rgba(255,255,255,.06)}
@media(max-width:767px){#nav-links{display:none}#hamburger{display:block}}
@media(min-width:768px){#hamburger{display:none}}
</style>
@yield('head')
</head>
<body>
<nav id="navbar">
  <div class="max-w-7xl mx-auto px-5 flex items-center justify-between" style="height:60px">
    <a href="{{ route('home') }}" class="serif text-white font-bold tracking-[.25em] uppercase text-[15px]" style="text-decoration:none">Sarang Burung</a>
    <div id="nav-links" class="hidden md:flex items-center gap-8">
      <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
      <a href="{{ route('philosophy') }}" class="nav-link {{ request()->routeIs('philosophy') ? 'active' : '' }}">Filosofi</a>
      <a href="{{ route('product') }}" class="nav-link {{ request()->routeIs('product') ? 'active' : '' }}">Produk</a>
    </div>
    <div class="flex items-center gap-4">
      <a href="{{ route('cart.index') }}" class="relative" style="color:rgba(255,255,255,.55)">
        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4zM3 6h18M16 10a4 4 0 01-8 0"/></svg>
        @if(session('cart') && count(session('cart')))
        <span class="absolute -top-1.5 -right-1.5 w-4 h-4 rounded-full text-[9px] font-bold flex items-center justify-center" style="background:#C4975A;color:#0E1508">{{ count(session('cart')) }}</span>
        @endif
      </a>
      <button id="hamburger" class="md:hidden" style="color:rgba(255,255,255,.55)" onclick="var m=document.getElementById('mobile-menu');m.style.display=m.style.display==='block'?'none':'block'">
        <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
      </button>
    </div>
  </div>
  <div id="mobile-menu"><div class="flex flex-col px-5 py-4 gap-4">
    <a href="{{ route('home') }}" class="nav-link">Beranda</a>
    <a href="{{ route('philosophy') }}" class="nav-link">Filosofi</a>
    <a href="{{ route('product') }}" class="nav-link">Produk</a>
  </div></div>
</nav>
@yield('content')
<footer style="background:#0E1508;border-top:1px solid rgba(255,255,255,.06)">
  <div class="max-w-7xl mx-auto px-5 py-12">
    <div class="flex flex-col md:flex-row justify-between gap-8">
      <div>
        <p class="serif text-white font-bold tracking-[.25em] uppercase text-lg mb-3">Sarang Burung</p>
        <p class="text-sm" style="color:rgba(255,255,255,.32);max-width:280px;line-height:1.85">Produk sarang burung walet premium, dipanen dengan kehati-hatian untuk menjaga kualitas terbaik.</p>
      </div>
      <div class="flex gap-16">
        <div>
          <p class="text-[10px] font-bold tracking-[.2em] uppercase mb-4" style="color:#C4975A">Menu</p>
          <div class="flex flex-col gap-3">
            <a href="{{ route('home') }}" class="nav-link">Beranda</a>
            <a href="{{ route('philosophy') }}" class="nav-link">Filosofi</a>
            <a href="{{ route('product') }}" class="nav-link">Produk</a>
          </div>
        </div>
        <div>
          <p class="text-[10px] font-bold tracking-[.2em] uppercase mb-4" style="color:#C4975A">Kontak</p>
          <div class="flex flex-col gap-3">
            <a href="https://wa.me/6281234567890" class="nav-link">WhatsApp</a>
            <a href="#" class="nav-link">Instagram</a>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-10 pt-6" style="border-top:1px solid rgba(255,255,255,.06)">
      <p class="text-[11px] text-center" style="color:rgba(255,255,255,.18)">&copy; {{ date('Y') }} Sarang Burung Premium. All rights reserved.</p>
    </div>
  </div>
</footer>
@yield('scripts')
</body></html>
