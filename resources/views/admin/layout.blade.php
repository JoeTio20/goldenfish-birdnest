<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
<title>@yield('title','Admin')</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
*{box-sizing:border-box;-webkit-tap-highlight-color:transparent;}body{background:#0D1F3C;font-family:'Inter',sans-serif;margin:0;color:#E8E0D4;overscroll-behavior:none;}.serif{font-family:'Playfair Display',serif;}#desktop-sidebar{background:#091628;border-right:1px solid rgba(255,255,255,.07);}.nav-item{display:flex;align-items:center;gap:10px;padding:10px 14px;border-radius:10px;font-size:12.5px;color:rgba(255,255,255,.45);cursor:pointer;text-decoration:none;transition:all .15s;margin:2px 8px;}.nav-item:hover{background:rgba(200,150,90,.12);color:#C8965A;}.nav-item.active{background:rgba(200,150,90,.18);color:#C8965A;border-left:2px solid #C8965A;padding-left:12px;font-weight:600;}.nav-item svg{width:16px;height:16px;flex-shrink:0;}#bottom-nav{display:none;}@media(max-width:767px){#bottom-nav{display:flex;position:fixed;bottom:0;left:0;right:0;background:#091628;border-top:1px solid rgba(255,255,255,.07);z-index:50;padding-bottom:env(safe-area-inset-bottom);}.bnav-item{flex:1;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:9px 4px 11px;gap:3px;text-decoration:none;color:rgba(255,255,255,.35);font-size:9px;font-weight:600;letter-spacing:.06em;text-transform:uppercase;transition:color .15s;}.bnav-item.active,.bnav-item:hover{color:#C8965A;}.bnav-item svg{width:20px;height:20px;}#main-content{padding-bottom:70px;}#desktop-sidebar{display:none!important;}#mobile-topbar{display:flex!important;}}@media(min-width:768px){#mobile-topbar{display:none;}#desktop-sidebar{display:flex;}}#mobile-topbar{display:none;align-items:center;justify-content:space-between;padding:12px 16px;background:#091628;border-bottom:1px solid rgba(255,255,255,.07);position:sticky;top:0;z-index:40;}.card{background:rgba(255,255,255,.04);border-radius:14px;padding:20px;border:1px solid rgba(255,255,255,.07);}
</style>
</head>
<body>

<!-- MOBILE TOP BAR -->
<div id="mobile-topbar">
  <div class="flex items-center gap-2">
    <div class="w-7 h-7 rounded-lg flex items-center justify-center" style="background:#C8965A">
      <svg width="14" height="14" fill="white" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
    </div>
    <span class="serif text-[15px] font-bold text-white">Admin Panel</span>
  </div>
  <div class="flex items-center gap-3">
    <form method="POST" action="{o} route('admin.logout') {c}">@csrf
      <button type="submit" class="flex items-center gap-1 text-[10px] font-semibold text-red-400 hover:text-red-300 tracking-widest uppercase">
        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4M16 17l5-5-5-5M21 12H9"/></svg>
        Logout
      </button>
    </form>
    <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold" style="background:#C8965A;color:#0D1F3C">
      {o} substr(auth('admin')->user()->name ?? 'A', 0, 1) {c}
    </div>
  </div>
</div>

<div class="flex min-h-screen">

<!-- DESKTOP SIDEBAR -->
<aside id="desktop-sidebar" class="hidden md:flex flex-col" style="width:230px;min-height:100vh;flex-shrink:0;">
  <div class="px-5 py-6" style="border-bottom:1px solid rgba(255,255,255,.07)">
    <div class="flex items-center gap-2.5 mb-1">
      <div class="w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0" style="background:#C8965A">
        <svg width="16" height="16" fill="white" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
      </div>
      <p class="serif text-[15px] font-bold text-white">Admin Panel</p>
    </div>
    <p class="text-[11px] text-white/30 mt-1 pl-10">Halo, {o} auth('admin')->user()->name ?? 'Admin' {c} &#128075;</p>
  </div>
  <nav class="flex-1 py-4">
    <div class="px-4 mb-2"><span class="text-[9px] font-bold tracking-[.2em] uppercase text-white/20">Menu</span></div>
    <a href="{o} route('admin.dashboard') {c}" class="nav-item {o} request()->routeIs('admin.dashboard') ? 'active' : '' {c}">
      <svg fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/></svg>
      Dashboard
    </a>
    <a href="{o} route('admin.orders.index') {c}" class="nav-item {o} request()->routeIs('admin.orders.*') ? 'active' : '' {c}">
      <svg fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
      Orders
    </a>
    <a href="{o} route('admin.products.index') {c}" class="nav-item {o} request()->routeIs('admin.products.*') ? 'active' : '' {c}">
      <svg fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
      Produk
    </a>
  </nav>
  <div class="py-4" style="border-top:1px solid rgba(255,255,255,.07)">
    <div class="flex items-center gap-3 px-4 py-3 mx-3 rounded-xl" style="background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.07)">
      <div class="w-9 h-9 rounded-full flex items-center justify-center text-sm font-bold flex-shrink-0" style="background:#C8965A;color:#0D1F3C">
        {o} substr(auth('admin')->user()->name ?? 'A', 0, 1) {c}
      </div>
      <div class="min-w-0 flex-1">
        <p class="text-[12px] font-semibold text-white truncate">{o} auth('admin')->user()->name ?? 'Admin' {c}</p>
        <form method="POST" action="{o} route('admin.logout') {c}">@csrf
          <button type="submit" class="text-[10px] text-red-400 hover:text-red-300 font-semibold uppercase tracking-wide bg-transparent border-none cursor-pointer p-0">Logout</button>
        </form>
      </div>
    </div>
  </div>
</aside>

<!-- MAIN -->
<div class="flex-1 flex flex-col min-w-0" id="main-content" style="background:#0F1E35">
  <header class="hidden md:flex items-center justify-between px-8 py-4" style="background:#091628;border-bottom:1px solid rgba(255,255,255,.07)">
    <h1 class="serif text-[20px] font-semibold text-white">@yield('header','Dashboard')</h1>
    <div class="flex items-center gap-3">@yield('topbar-actions')</div>
  </header>
  <main class="flex-1 p-4 md:p-8">
    <div class="md:hidden mb-4"><h1 class="serif text-xl font-semibold text-white">@yield('header','Dashboard')</h1></div>
    @if(session('success'))
    <div class="flex items-center gap-2 text-sm px-4 py-3 rounded-xl mb-4" style="background:rgba(34,197,94,.1);border:1px solid rgba(34,197,94,.25);color:#4ade80">
      <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
      {o} session('success') {c}
    </div>
    @endif
    @yield('content')
  </main>
</div>
</div>

<!-- MOBILE BOTTOM NAV -->
<nav id="bottom-nav">
  <a href="{o} route('admin.dashboard') {c}" class="bnav-item {o} request()->routeIs('admin.dashboard') ? 'active' : '' {c}">
    <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/></svg>
    HOME
  </a>
  <a href="{o} route('admin.orders.index') {c}" class="bnav-item {o} request()->routeIs('admin.orders.*') ? 'active' : '' {c}">
    <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
    ORDERS
  </a>
  <a href="{o} route('admin.products.index') {c}" class="bnav-item {o} request()->routeIs('admin.products.*') ? 'active' : '' {c}">
    <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
    PRODUK
  </a>
</nav>

<script>
function showToast(msg,type='success') {L}
  let t=document.getElementById('admin-toast');
  if(!t) {L} t=document.createElement('div');t.id='admin-toast';t.style.cssText='position:fixed;top:4.5rem;right:1rem;padding:.7rem 1.2rem;border-radius:8px;font-size:.8rem;z-index:9999;display:none;font-weight:500;border-left:3px solid #C8965A';document.body.appendChild(t); {R}
  t.style.background=type==='success'?'rgba(9,22,40,.97)':'rgba(220,38,38,.9)';
  t.style.color='#fff'; t.textContent=msg; t.style.display='block';
  clearTimeout(window._at); window._at=setTimeout(()=>t.style.display='none',3000);
{R}
</script>
@yield('scripts')
</body>
</html>