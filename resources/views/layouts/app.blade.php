<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title','Sarang Burung')</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
{*{box-sizing:border-box;-webkit-tap-highlight-color:transparent}}
{body{font-family:'Inter',sans-serif;background:#F7F9FB;color:#1C2B3A;margin:0}}
{.serif{font-family:'Cormorant Garamond',serif}}
{#navbar{background:#0D1B2A;position:sticky;top:0;z-index:50;border-bottom:1px solid rgba(255,255,255,.06)}}
{.nav-link{font-size:11px;letter-spacing:.18em;text-transform:uppercase;font-weight:500;color:rgba(255,255,255,.45);text-decoration:none;transition:color .2s}}
{.nav-link:hover,.nav-link.active{color:#6BAED6}}
{#mobile-menu{display:none;background:#0D1B2A;border-top:1px solid rgba(255,255,255,.06)}}
{@media(max-width:767px){#nav-links{display:none}#hamburger{display:block}}}
{@media(min-width:768px){#hamburger{display:none}}}
</style>
@yield('head')
</head>
<body>
<nav id="navbar">
  <div class="max-w-7xl mx-auto px-5 flex items-center justify-between" style="height:60px">
    <a href="{{ route('home') }}" class="serif text-white font-bold tracking-[.25em] uppercase text-[15px]" style="text-decoration:none">Sarang Burung</a>
    <div id="nav-links" class="hidden md:flex items-center gap-8">
      <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">@lang('messages.nav_home')</a>
      <a href="{{ route('philosophy') }}" class="nav-link {{ request()->routeIs('philosophy') ? 'active' : '' }}">@lang('messages.nav_philosophy')</a>
      <a href="{{ route('product') }}" class="nav-link {{ request()->routeIs('product') ? 'active' : '' }}">@lang('messages.nav_product')</a>
    </div>
    <div class="flex items-center gap-3">
      @if(app()->getLocale() === 'id')
      <a href="{{ route('lang.switch', 'en') }}" class="hidden sm:flex items-center gap-1.5 text-[10px] font-semibold tracking-widest rounded-full px-3 py-1" style="border:1px solid rgba(255,255,255,.18);color:rgba(255,255,255,.45)">
        <svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg>EN
      </a>
      @else
      <a href="{{ route('lang.switch', 'id') }}" class="hidden sm:flex items-center gap-1.5 text-[10px] font-semibold tracking-widest rounded-full px-3 py-1" style="border:1px solid rgba(255,255,255,.18);color:rgba(255,255,255,.45)">
        <svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg>ID
      </a>
      @endif
      <a href="{{ route('cart.index') }}" class="relative" style="color:rgba(255,255,255,.5)">
        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4zM3 6h18M16 10a4 4 0 01-8 0"/></svg>
        @if(session('cart') && count(session('cart')))
        <span class="absolute -top-1.5 -right-1.5 w-4 h-4 rounded-full text-[9px] font-bold flex items-center justify-center" style="background:#6BAED6;color:#0D1B2A">{{ count(session('cart')) }}</span>
        @endif
      </a>
      <a href="/admin/login" style="color:rgba(255,255,255,.5)">
        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
      </a>
      <button id="hamburger" class="md:hidden" style="color:rgba(255,255,255,.5)" onclick="var m=document.getElementById('mobile-menu');m.style.display=m.style.display==='block'?'none':'block'">
        <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
      </button>
    </div>
  </div>
  <div id="mobile-menu"><div class="flex flex-col px-5 py-4 gap-4">
    <a href="{{ route('home') }}" class="nav-link">@lang('messages.nav_home')</a>
    <a href="{{ route('philosophy') }}" class="nav-link">@lang('messages.nav_philosophy')</a>
    <a href="{{ route('product') }}" class="nav-link">@lang('messages.nav_product')</a>
    @if(app()->getLocale()==='id')
    <a href="{{ route('lang.switch','en') }}" class="nav-link">Switch to English</a>
    @else
    <a href="{{ route('lang.switch','id') }}" class="nav-link">Ganti ke Indonesia</a>
    @endif
  </div></div>
</nav>
@yield('content')
<footer style="background:#0D1B2A;border-top:1px solid rgba(255,255,255,.05)">
  <div class="max-w-7xl mx-auto px-5 py-12">
    <div class="flex flex-col md:flex-row justify-between gap-8">
      <div><p class="serif text-white font-bold tracking-[.25em] uppercase text-lg mb-3">Sarang Burung</p>
        <p style="font-size:13px;color:rgba(255,255,255,.3);max-width:280px;line-height:1.85">@lang('messages.f_tagline')</p>
      </div>
      <div class="flex gap-14">
        <div><p style="font-size:10px;font-weight:700;letter-spacing:.2em;text-transform:uppercase;margin-bottom:16px;color:#6BAED6">Menu</p>
          <div class="flex flex-col gap-3">
            <a href="{{ route('home') }}" class="nav-link">@lang('messages.nav_home')</a>
            <a href="{{ route('philosophy') }}" class="nav-link">@lang('messages.nav_philosophy')</a>
            <a href="{{ route('product') }}" class="nav-link">@lang('messages.nav_product')</a>
          </div>
        </div>
        <div><p style="font-size:10px;font-weight:700;letter-spacing:.2em;text-transform:uppercase;margin-bottom:16px;color:#6BAED6">Kontak</p>
          <div class="flex flex-col gap-3">
            <a href="https://wa.me/6281234567890" class="nav-link">WhatsApp</a>
            <a href="#" class="nav-link">Instagram</a>
          </div>
        </div>
      </div>
    </div>
    <div style="margin-top:36px;padding-top:20px;border-top:1px solid rgba(255,255,255,.05)">
      <p style="font-size:11px;text-align:center;color:rgba(255,255,255,.18)">&copy; {{ date('Y') }} Sarang Burung Premium. All rights reserved.</p>
    </div>
  </div>
</footer>
@yield('scripts')
</body></html>
