<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
<title>@yield('title','Admin') &mdash; Sarang Burung</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
*{box-sizing:border-box;-webkit-tap-highlight-color:transparent}
body{background:#0C1A0E;font-family:'Inter',sans-serif;margin:0;color:#E0D9CC;overscroll-behavior:none}
.serif{font-family:'Cormorant Garamond',serif}
#sidebar{background:#070D08;border-right:1px solid rgba(255,255,255,.06);width:215px;min-height:100vh;flex-shrink:0}
.nav-item{display:flex;align-items:center;gap:10px;padding:9px 12px;border-radius:8px;font-size:12px;color:rgba(255,255,255,.36);text-decoration:none;transition:all .15s;margin:2px 8px}
.nav-item:hover{background:rgba(196,151,90,.07);color:#C4975A}
.nav-item.active{background:rgba(196,151,90,.13);color:#C4975A;font-weight:600;border-left:2px solid #C4975A;padding-left:10px}
.nav-item svg{width:15px;height:15px;flex-shrink:0}
#bottom-nav{display:none}
@media(max-width:767px){
  #bottom-nav{display:flex;position:fixed;bottom:0;left:0;right:0;background:#070D08;border-top:1px solid rgba(255,255,255,.06);z-index:50;padding-bottom:env(safe-area-inset-bottom)}
  .bnav-item{flex:1;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:9px 4px 11px;gap:3px;text-decoration:none;color:rgba(255,255,255,.26);font-size:9px;font-weight:600;letter-spacing:.06em;text-transform:uppercase;transition:color .15s}
  .bnav-item.active,.bnav-item:hover{color:#C4975A}
  .bnav-item svg{width:20px;height:20px}
  #main-content{padding-bottom:72px}
  #sidebar{display:none!important}
  #mobile-topbar{display:flex!important}
}
@media(min-width:768px){#mobile-topbar{display:none}#sidebar{display:flex}}
#mobile-topbar{display:none;align-items:center;justify-content:space-between;padding:12px 16px;background:#070D08;border-bottom:1px solid rgba(255,255,255,.06);position:sticky;top:0;z-index:40}
</style>
</head>
<body>
<div id="mobile-topbar">
  <div class="flex items-center gap-2">
    <div class="w-7 h-7 rounded-lg flex items-center justify-center" style="background:#C4975A"><svg width="13" height="13" fill="white" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg></div>
    <span class="serif text-[15px] font-bold text-white">Admin</span>
  </div>
  <form method="POST" action="{{ route('admin.logout') }}">@csrf<button type="submit" class="text-[10px] font-semibold text-red-400 tracking-widest uppercase">Logout</button></form>
</div>
<div class="flex min-h-screen">
<aside id="sidebar" class="flex-col">
  <div class="px-5 py-5" style="border-bottom:1px solid rgba(255,255,255,.06)">
    <p class="serif text-[16px] font-bold text-white tracking-wide mb-0.5">Admin Panel</p>
    <p class="text-[11px]" style="color:rgba(255,255,255,.26)">Halo, {{ auth('admin')->user()->name ?? 'Admin' }} 👋</p>
  </div>
  <nav class="flex-1 py-3">
    <p class="px-5 text-[9px] font-bold tracking-[.2em] uppercase mb-2" style="color:rgba(255,255,255,.16)">Menu</p>
    <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
      <svg fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/></svg>Dashboard
    </a>
    <a href="{{ route('admin.orders.index') }}" class="nav-item {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
      <svg fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>Orders
    </a>
    <a href="{{ route('admin.products.index') }}" class="nav-item {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
      <svg fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>Produk
    </a>
  </nav>
  <div class="py-4" style="border-top:1px solid rgba(255,255,255,.06)">
    <div class="flex items-center gap-3 px-4 py-3 mx-3 rounded-xl" style="background:rgba(255,255,255,.025);border:1px solid rgba(255,255,255,.05)">
      <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold flex-shrink-0" style="background:#C4975A;color:#070D08">{{ substr(auth('admin')->user()->name ?? 'A', 0, 1) }}</div>
      <div class="min-w-0 flex-1">
        <p class="text-[12px] font-semibold text-white truncate">{{ auth('admin')->user()->name ?? 'Admin' }}</p>
        <form method="POST" action="{{ route('admin.logout') }}">@csrf<button type="submit" class="text-[10px] text-red-400 hover:text-red-300 font-semibold uppercase tracking-wide bg-transparent border-none cursor-pointer p-0">Logout</button></form>
      </div>
    </div>
  </div>
</aside>
<div class="flex-1 flex flex-col min-w-0" id="main-content" style="background:#0C1A0E">
  <header class="hidden md:flex items-center justify-between px-8 py-4" style="background:#070D08;border-bottom:1px solid rgba(255,255,255,.06)">
    <h1 class="serif text-[20px] font-semibold text-white">@yield('header','Dashboard')</h1>
    <div class="flex items-center gap-3">@yield('topbar-actions')</div>
  </header>
  <main class="flex-1 p-4 md:p-8">
    <div class="md:hidden mb-5"><h1 class="serif text-xl font-semibold text-white">@yield('header','Dashboard')</h1></div>
    @if(session('success'))
    <div class="flex items-center gap-2 text-sm px-4 py-3 rounded-xl mb-5" style="background:rgba(196,151,90,.08);border:1px solid rgba(196,151,90,.18);color:#C4975A">
      <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
      {{ session('success') }}
    </div>
    @endif
    @yield('content')
  </main>
</div>
</div>
<nav id="bottom-nav">
  <a href="{{ route('admin.dashboard') }}" class="bnav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
    <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/></svg>HOME
  </a>
  <a href="{{ route('admin.orders.index') }}" class="bnav-item {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
    <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>ORDERS
  </a>
  <a href="{{ route('admin.products.index') }}" class="bnav-item {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
    <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>PRODUK
  </a>
</nav>
@yield('scripts')
</body></html>
