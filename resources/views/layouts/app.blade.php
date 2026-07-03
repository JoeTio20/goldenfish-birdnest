<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title','Sarang Burung')</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
*{box-sizing:border-box;margin:0;padding:0;-webkit-tap-highlight-color:transparent}
html,body{width:100%;overflow-x:hidden}
body{font-family:'Inter',sans-serif;background:#F5F8F6;color:#1A3D3A;padding-top:60px}
.serif{font-family:'Cormorant Garamond',serif}
a{text-decoration:none}
#snav{background:#0D3535;position:fixed;top:0;left:0;right:0;width:100%;z-index:200;border-bottom:1px solid rgba(200,168,76,.1)}
#snav-inner{max-width:1200px;margin:0 auto;padding:0 24px;height:60px;display:flex;align-items:center;justify-content:space-between}
.snav-logo{color:#C9A84C;font-size:14px;font-weight:700;letter-spacing:.22em;text-transform:uppercase;font-family:'Cormorant Garamond',serif}
#snav-links{display:flex;align-items:center;gap:32px}
.snav-link{font-size:11px;letter-spacing:.18em;text-transform:uppercase;font-weight:500;color:rgba(255,255,255,.45);transition:color .2s}
.snav-link:hover,.snav-link.active{color:#C9A84C}
#snav-right{display:flex;align-items:center;gap:12px}
.snav-icon{color:rgba(255,255,255,.5);display:flex;align-items:center;line-height:0}
.snav-icon:hover{color:#C9A84C}
.lang-pill{font-size:10px;font-weight:600;letter-spacing:.15em;color:rgba(255,255,255,.45);border:1px solid rgba(255,255,255,.18);border-radius:100px;padding:4px 12px;display:flex;align-items:center;gap:5px}
.lang-pill:hover{border-color:#C9A84C;color:#C9A84C}
#hamburger{display:none;background:none;border:none;cursor:pointer;color:rgba(255,255,255,.6);padding:4px;align-items:center;justify-content:center}
#smobile-menu{display:none;background:#0D3535;border-top:1px solid rgba(200,168,76,.1)}
#smobile-menu.open{display:block}
#sfooter{background:#0D3535}
.footer-link{font-size:11px;letter-spacing:.15em;text-transform:uppercase;font-weight:500;color:rgba(255,255,255,.38)}
.footer-link:hover{color:#C9A84C}
@media(max-width:767px){#snav-links{display:none}#hamburger{display:flex}#snav-inner{padding:0 16px}}
@media(min-width:768px){#hamburger{display:none!important}#smobile-menu{display:none!important}}
@media(max-width:599px){.footer-grid{grid-template-columns:1fr!important}}
</style>
@yield('head')
</head>
<body>
<nav id="snav">
 <div id="snav-inner">
  <a href="{{ route('home') }}" class="snav-logo" style="display:flex;align-items:center;gap:10px"><img src="/IMAGE/logo.png" alt="Logo" style="height:38px;width:38px;object-fit:contain;border-radius:50%" onerror="this.style.display=none"><span>Sarang Burung</span></a>
  <div id="snav-links">
   <a href="{{ route('home') }}" class="snav-link {{ request()->routeIs('home') ? 'active' : '' }}">@lang('messages.nav_home')</a>
   <a href="{{ route('philosophy') }}" class="snav-link {{ request()->routeIs('philosophy') ? 'active' : '' }}">@lang('messages.nav_philosophy')</a>
   <a href="{{ route('product') }}" class="snav-link {{ request()->routeIs('product') ? 'active' : '' }}">@lang('messages.nav_product')</a>
  </div>
  <div id="snav-right">
   @if(app()->getLocale()==='id')
   <a href="{{ route('lang.switch','en') }}" class="lang-pill">
    <svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg>EN
   </a>
   @else
   <a href="{{ route('lang.switch','id') }}" class="lang-pill">
    <svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 014-10z"/></svg>ID
   </a>
   @endif
   <a href="{{ route('cart.index') }}" class="snav-icon" style="position:relative">
    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4zM3 6h18M16 10a4 4 0 01-8 0"/></svg>
    <span id="cart-badge" style="position:absolute;top:-5px;right:-5px;width:16px;height:16px;border-radius:50%;background:#C9A84C;color:#0D3535;font-size:9px;font-weight:700;display:{{ (session('cart')&&count(session('cart'))) ? 'flex' : 'none' }};align-items:center;justify-content:center">{{ count(session('cart',[]) ) }}</span>
   </a>
   <a href="/admin/login" class="snav-icon">
    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
   </a>
   <button id="hamburger" onclick="(function(){var m=document.getElementById('smobile-menu');m.classList.toggle('open')})()">
    <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
   </button>
  </div>
 </div>
 <div id="smobile-menu"><div style="display:flex;flex-direction:column;padding:16px 20px;gap:16px">
  <a href="{{ route('home') }}" class="snav-link">@lang('messages.nav_home')</a>
  <a href="{{ route('philosophy') }}" class="snav-link">@lang('messages.nav_philosophy')</a>
  <a href="{{ route('product') }}" class="snav-link">@lang('messages.nav_product')</a>
  <div style="height:1px;background:rgba(255,255,255,.07)"></div>
  @if(app()->getLocale()==='id')
  <a href="{{ route('lang.switch','en') }}" class="snav-link">Switch to English</a>
  @else
  <a href="{{ route('lang.switch','id') }}" class="snav-link">Ganti ke Indonesia</a>
  @endif
 </div></div>
</nav>
@yield('content')
<footer id="sfooter">
 <div style="max-width:1200px;margin:0 auto;padding:52px 24px 32px">
  <div class="footer-grid" style="display:grid;grid-template-columns:2fr 1fr 1fr;gap:40px;margin-bottom:36px">
   <div>
    <p class="serif" style="font-size:18px;font-weight:700;letter-spacing:.25em;text-transform:uppercase;color:#fff;margin-bottom:12px">Sarang Burung</p>
    <p style="font-size:13px;color:rgba(255,255,255,.35);line-height:1.85;max-width:280px">@lang('messages.f_tagline')</p>
   </div>
   <div>
    <p style="font-size:10px;font-weight:700;letter-spacing:.22em;text-transform:uppercase;color:#C9A84C;margin-bottom:16px">Menu</p>
    <div style="display:flex;flex-direction:column;gap:10px">
     <a href="{{ route('home') }}" class="footer-link">@lang('messages.nav_home')</a>
     <a href="{{ route('philosophy') }}" class="footer-link">@lang('messages.nav_philosophy')</a>
     <a href="{{ route('product') }}" class="footer-link">@lang('messages.nav_product')</a>
    </div>
   </div>
   <div>
    <p style="font-size:10px;font-weight:700;letter-spacing:.22em;text-transform:uppercase;color:#C9A84C;margin-bottom:16px">Kontak</p>
    <div style="display:flex;flex-direction:column;gap:10px">
     <a href="https://wa.me/6281234567890" class="footer-link">WhatsApp</a>
     <a href="#" class="footer-link">Instagram</a>
    </div>
   </div>
  </div>
  <div style="border-top:1px solid rgba(255,255,255,.06);padding-top:20px;text-align:center">
   <p style="font-size:11px;color:rgba(255,255,255,.2)">&copy; {{ date('Y') }} Sarang Burung. All rights reserved.</p>
  </div>
 </div>
</footer>

<style>
#cart-toast{
  position:fixed;bottom:28px;right:28px;z-index:9999;
  background:#0D3535;color:#fff;
  padding:14px 20px;border-radius:12px;
  font-size:13px;font-weight:500;
  display:flex;align-items:center;gap:10px;
  box-shadow:0 8px 32px rgba(13,53,53,.25);
  transform:translateY(80px);opacity:0;
  transition:transform .3s cubic-bezier(.34,1.56,.64,1),opacity .3s ease;
  pointer-events:none;max-width:300px;
}
#cart-toast.show{transform:translateY(0);opacity:1;pointer-events:auto}
#cart-toast svg{flex-shrink:0}
#cart-toast-close{margin-left:auto;background:none;border:none;color:rgba(255,255,255,.5);cursor:pointer;font-size:16px;line-height:1;padding:0}
#cart-toast-close:hover{color:#fff}
</style>
<div id="cart-toast">
  <svg width="18" height="18" fill="none" stroke="#C9A84C" stroke-width="2" viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
  <span id="cart-toast-msg">Ditambahkan ke keranjang!</span>
  <button id="cart-toast-close" onclick="hideToast()">&#x2715;</button>
</div>
<script>
var toastTimer;
function showToast(msg){
  var t=document.getElementById('cart-toast');
  document.getElementById('cart-toast-msg').textContent=msg;
  t.classList.add('show');
  clearTimeout(toastTimer);
  toastTimer=setTimeout(hideToast,3500);
}
function hideToast(){
  document.getElementById('cart-toast').classList.remove('show');
}
function updateCartBadge(count){
  var badges=document.querySelectorAll('#cart-badge');
  badges.forEach(function(b){
    if(count>0){b.textContent=count;b.style.display='flex';}
    else{b.style.display='none';}
  });
}
document.addEventListener('DOMContentLoaded',function(){
  document.body.addEventListener('submit',function(e){
    var form=e.target;
    if(!form.querySelector('input[name="product_id"]')) return;
    var action=form.getAttribute('action')||'';
    if(action.indexOf('/cart/add')===-1) return;
    e.preventDefault();
    var data=new FormData(form);
    fetch(action,{
      method:'POST',
      headers:{'X-Requested-With':'XMLHttpRequest','Accept':'application/json'},
      body:data
    })
    .then(function(r){return r.json();})
    .then(function(res){
              if(res.success){
        showToast(res.productName+' ditambahkan ke keranjang!');
        updateCartBadge(res.cartCount);
        var btn=form.querySelector('button[type="submit"]');
        if(btn){
          var orig=btn.textContent;
          btn.textContent='✓ Ditambahkan!';
          btn.style.setProperty('background','#16a34a','important');
          btn.style.setProperty('color','#fff','important');
          setTimeout(function(){
            btn.textContent=orig;
            btn.style.removeProperty('background');
            btn.style.removeProperty('color');
          },1800);
        }
      }
    })
    .catch(function(){
      form.submit();
    });
  });
});
</script>

@yield('scripts')
</body></html>
