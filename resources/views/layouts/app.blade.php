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
{#navbar{background:#0D1B2A!important;position:sticky;top:0;z-index:100;border-bottom:1px solid rgba(255,255,255,.06)}}
{.nav-link{font-size:11px;letter-spacing:.18em;text-transform:uppercase;font-weight:500;color:rgba(255,255,255,.45)!important;text-decoration:none!important;transition:color .2s}}
{.nav-link:hover,.nav-link.active{color:#6BAED6!important}}
{#mobile-menu{display:none!important;background:#0D1B2A!important;border-top:1px solid rgba(107,174,214,.1)}}
{#mobile-menu.open{display:block!important}}
{.footer-link{font-size:11px;letter-spacing:.15em;text-transform:uppercase;font-weight:500;color:rgba(255,255,255,.4)!important;text-decoration:none!important;transition:color .2s}}
{.footer-link:hover{color:#6BAED6!important}}
{@media(max-width:767px){#nav-links{display:none!important}#hamburger{display:flex!important}#navbar-inner{padding:0 16px}}}
{@media(min-width:768px){#hamburger{display:none!important}#mobile-menu{display:none!important}}}
</style>
@yield('head')
</head>
<body>
<nav id="navbar">
  <div id="navbar-inner" class="max-w-7xl mx-auto px-5 flex items-center justify-between" style="height:58px">
    <a href="{{ route('home') }}" class="serif" style="color:#fff;font-weight:700;letter-spacing:.25em;text-transform:uppercase;font-size:15px;text-decoration:none;flex-shrink:0">Sarang Burung</a>
    <div id="nav-links" class="hidden md:flex items-center gap-8">
      <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">@lang('messages.nav_home')</a>
      <a href="{{ route('philosophy') }}" class="nav-link {{ request()->routeIs('philosophy') ? 'active' : '' }}">@lang('messages.nav_philosophy')</a>
      <a href="{{ route('product') }}" class="nav-link {{ request()->routeIs('product') ? 'active' : '' }}">@lang('messages.nav_product')</a>
    </div>
    <div class="flex items-center gap-3">
      @if(app()->getLocale() === 'id')
      <a href="{{ route('lang.switch', 'en') }}" class="hidden sm:flex items-center gap-1 text-[10px] font-semibold tracking-widest rounded-full px-3 py-1" style="border:1px solid rgba(255,255,255,.18);color:rgba(255,255,255,.45);text-decoration:none">
        <svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg>EN
      </a>
      @else
      <a href="{{ route('lang.switch', 'id') }}" class="hidden sm:flex items-center gap-1 text-[10px] font-semibold tracking-widest rounded-full px-3 py-1" style="border:1px solid rgba(255,255,255,.18);color:rgba(255,255,255,.45);text-decoration:none">
        <svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg>ID
      </a>
      @endif
      <a href="{{ route('cart.index') }}" class="relative" style="color:rgba(255,255,255,.5)">
        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4zM3 6h18M16 10a4 4 0 01-8 0"/></svg>
        @if(session('cart') && count(session('cart')))
        <span style="position:absolute;top:-6px;right:-6px;width:16px;height:16px;border-radius:50%;background:#6BAED6;color:#0D1B2A;font-size:9px;font-weight:700;display:flex;align-items:center;justify-content:center">{{ count(session('cart')) }}</span>
        @endif
      </a>
      <a href="/admin/login" style="color:rgba(255,255,255,.5)">
        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
      </a>
      <button id="hamburger" class="md:hidden flex items-center" style="background:none;border:none;color:rgba(255,255,255,.55);cursor:pointer;padding:4px" onclick="(function(){ var m=document.getElementById('mobile-menu');m.classList.toggle('open') })()">
        <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
      </button>
    </div>
  </div>
  <div id="mobile-menu" style="background:#0D1B2A;border-top:1px solid rgba(107,174,214,.1)"><div style="display:flex;flex-direction:column;padding:16px 20px;gap:16px">
    <a href="{{ route('home') }}" class="nav-link">@lang('messages.nav_home')</a>
    <a href="{{ route('philosophy') }}" class="nav-link">@lang('messages.nav_philosophy')</a>
    <a href="{{ route('product') }}" class="nav-link">@lang('messages.nav_product')</a>
    <div style="height:1px;background:rgba(255,255,255,.06)"></div>
    @if(app()->getLocale()==='id')
    <a href="{{ route('lang.switch','en') }}" class="nav-link" style="display:flex;align-items:center;gap:6px">
      <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg>EN
    </a>
    @else
    <a href="{{ route('lang.switch','id') }}" class="nav-link" style="display:flex;align-items:center;gap:6px">
      <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg>ID
    </a>
    @endif
  </div></div>
</nav>
@yield('content')
<footer style="background:#0D1B2A">
  <div style="max-width:1200px;margin:0 auto;padding:56px 20px 32px">
    <div style="display:grid;grid-template-columns:1fr;gap:40px" class="md:grid-cols-3 lg:grid-cols-4">
      <div style="grid-column:span 2" class="lg:col-span-2">
        <p class="serif" style="font-size:18px;font-weight:700;letter-spacing:.25em;text-transform:uppercase;color:#fff;margin:0 0 12px">Sarang Burung</p>
        <p style="font-size:13px;color:rgba(255,255,255,.35);line-height:1.85;max-width:300px;margin:0">@lang('messages.f_tagline')</p>
      </div>
      <div>
        <p style="font-size:10px;font-weight:700;letter-spacing:.22em;text-transform:uppercase;color:#6BAED6;margin:0 0 16px">Menu</p>
        <div style="display:flex;flex-direction:column;gap:10px">
          <a href="{{ route('home') }}" class="footer-link">@lang('messages.nav_home')</a>
          <a href="{{ route('philosophy') }}" class="footer-link">@lang('messages.nav_philosophy')</a>
          <a href="{{ route('product') }}" class="footer-link">@lang('messages.nav_product')</a>
        </div>
      </div>
      <div>
        <p style="font-size:10px;font-weight:700;letter-spacing:.22em;text-transform:uppercase;color:#6BAED6;margin:0 0 16px">Kontak</p>
        <div style="display:flex;flex-direction:column;gap:10px">
          <a href="https://wa.me/6281234567890" class="footer-link">WhatsApp</a>
          <a href="#" class="footer-link">Instagram</a>
        </div>
      </div>
    </div>
    <div style="margin-top:40px;padding-top:20px;border-top:1px solid rgba(255,255,255,.06);text-align:center">
      <p style="font-size:11px;color:rgba(255,255,255,.2)">&copy; {{ date('Y') }} Sarang Burung. All rights reserved.</p>
    </div>
  </div>
</footer>
@yield('scripts')
</body></html>
