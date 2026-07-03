<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
<title>@yield('title','Admin')</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
*{box-sizing:border-box;-webkit-tap-highlight-color:transparent}
body{background:#0C1928;font-family:'Inter',sans-serif;margin:0;color:#D8E4ED;overscroll-behavior:none}
.serif{font-family:'Cormorant Garamond',serif}
#sidebar{background:#07111C;border-right:1px solid rgba(255,255,255,.06);width:215px;min-height:100vh;flex-shrink:0}
.nav-item{display:flex;align-items:center;gap:10px;padding:9px 12px;border-radius:8px;font-size:12px;color:rgba(255,255,255,.35);text-decoration:none;transition:all .15s;margin:2px 8px}
.nav-item:hover{background:rgba(200,168,76,.08);color:#C9A84C}
.nav-item.active{background:rgba(200,168,76,.14);color:#C9A84C;font-weight:600;border-left:2px solid #C9A84C;padding-left:10px}
.nav-item svg{width:15px;height:15px;flex-shrink:0}
#bottom-nav{display:none}
@media(max-width:767px){#bottom-nav{display:flex;position:fixed;bottom:0;left:0;right:0;background:#07111C;border-top:1px solid rgba(200,168,76,.12);z-index:50;padding-bottom:env(safe-area-inset-bottom)}.bnav-item{flex:1;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:9px 4px 11px;gap:3px;text-decoration:none;color:rgba(255,255,255,.28);font-size:9px;font-weight:600;letter-spacing:.06em;text-transform:uppercase;transition:color .15s}.bnav-item.active,.bnav-item:hover{color:#C9A84C}.bnav-item svg{width:20px;height:20px}#main-content{padding-bottom:72px}#sidebar{display:none!important}#mobile-topbar{display:flex!important}}
@media(min-width:768px){#mobile-topbar{display:none}#sidebar{display:flex}}
#mobile-topbar{display:none;align-items:center;justify-content:space-between;padding:12px 16px;background:#07111C;border-bottom:1px solid rgba(255,255,255,.06);position:sticky;top:0;z-index:40}
.stat-card{background:rgba(255,255,255,.03);border:1px solid rgba(200,168,76,.12);border-radius:14px;padding:22px 20px}
.data-table{width:100%;font-size:13px;border-collapse:collapse}
.data-table th{padding:10px 16px;text-align:left;font-size:10px;letter-spacing:.18em;text-transform:uppercase;color:rgba(255,255,255,.3);border-bottom:1px solid rgba(255,255,255,.06)}
.data-table td{padding:12px 16px;border-bottom:1px solid rgba(255,255,255,.04)}
.data-table tr:hover td{background:rgba(200,168,76,.04)}
.badge{display:inline-block;padding:3px 10px;border-radius:100px;font-size:10px;font-weight:600}
</style>
</head>
<body>
<div id="mobile-topbar">
  <div class="flex items-center gap-2">
    <div class="w-7 h-7 rounded-lg flex items-center justify-center" style="background:#C9A84C"><svg width="13" height="13" fill="white" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg></div>
    <span class="serif text-[15px] font-bold text-white">Admin</span>
  </div>
  <form method="POST" action="{{ route('admin.logout') }}">@csrf<button type="submit" style="font-size:10px;font-weight:600;color:rgba(255,100,100,.8);text-transform:uppercase;letter-spacing:.1em;background:none;border:none;cursor:pointer">Logout</button></form>
</div>
<div class="flex min-h-screen">
<aside id="sidebar" class="flex-col">
  <div style="padding:20px;border-bottom:1px solid rgba(255,255,255,.06)">
    <p class="serif" style="font-size:15px;font-weight:700;color:#fff;letter-spacing:.05em;margin:0 0 3px">Admin Panel</p>
    <p style="font-size:11px;color:rgba(255,255,255,.25);margin:0">{{ session('admin_name','Admin') }} 👋</p>
  </div>
  <nav style="flex:1;padding:12px 0">
    <p style="padding:0 20px;font-size:9px;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:rgba(255,255,255,.16);margin-bottom:8px">Menu</p>
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
  <div style="padding:12px;border-top:1px solid rgba(255,255,255,.06)">
    <div style="display:flex;align-items:center;gap:10px;padding:10px 12px;border-radius:10px;background:rgba(255,255,255,.03);border:1px solid rgba(200,168,76,.1)">
      <div style="width:32px;height:32px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;background:#C9A84C;color:#07111C;flex-shrink:0">{{ substr(session('admin_name','A'),0,1) }}</div>
      <div style="min-width:0;flex:1">
        <p style="font-size:12px;font-weight:600;color:#fff;margin:0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">{{ session('admin_name','Admin') }}</p>
        <form method="POST" action="{{ route('admin.logout') }}">@csrf<button type="submit" style="font-size:10px;color:rgba(255,100,100,.7);font-weight:600;text-transform:uppercase;letter-spacing:.05em;background:none;border:none;cursor:pointer;padding:0">Logout</button></form>
      </div>
    </div>
  </div>
</aside>
<div class="flex-1 flex flex-col min-w-0" id="main-content" style="background:#0C1928">
  <header class="hidden md:flex items-center justify-between" style="padding:14px 32px;background:#07111C;border-bottom:1px solid rgba(255,255,255,.06)">
    <h1 class="serif" style="font-size:20px;font-weight:600;color:#fff;margin:0">@yield('header','Dashboard')</h1>
    <div>@yield('topbar-actions')</div>
  </header>
  <main style="flex:1;padding:24px 20px" class="md:p-8">
    <div class="md:hidden" style="margin-bottom:20px"><h1 class="serif" style="font-size:20px;font-weight:600;color:#fff;margin:0">@yield('header','Dashboard')</h1></div>
    @if(session('success'))
    <div style="display:flex;align-items:center;gap:8px;font-size:13px;padding:12px 16px;border-radius:10px;margin-bottom:20px;background:rgba(200,168,76,.08);border:1px solid rgba(200,168,76,.2);color:#C9A84C">
      <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>{{ session('success') }}
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
