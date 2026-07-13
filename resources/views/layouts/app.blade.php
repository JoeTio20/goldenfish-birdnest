<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="icon" type="image/x-icon" href="/favicon.ico">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="apple-touch-icon" sizes="192x192" href="/favicon-192x192.png">
<title>@yield('title','Goldenfishbirdnest')</title>
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
   <div style="display:flex;gap:6px;align-items:center">
   <a href='/lang/id' class="lang-pill @if(app()->getLocale()==='id') active @endif" @if(app()->getLocale()==='id') style="border-color:#C9A84C;color:#C9A84C" @endif>ID</a>
   <a href='/lang/en' class="lang-pill @if(app()->getLocale()==='en') active @endif" @if(app()->getLocale()==='en') style="border-color:#C9A84C;color:#C9A84C" @endif>EN</a>
   <a href='/lang/zh' class="lang-pill @if(app()->getLocale()==='zh') active @endif" @if(app()->getLocale()==='zh') style="border-color:#C9A84C;color:#C9A84C" @endif>中文</a>
   </div>
   <a href="{{ route('cart.index') }}" class="snav-icon js-cart-open" style="position:relative">
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
  <a href='/lang/en' class="snav-link @if(app()->getLocale()==='id') active @endif">🇮🇩 Indonesia</a>
  <a href='/lang/id' class="snav-link @if(app()->getLocale()==='en') active @endif">🇬🇧 English</a>
  <a href='/lang/zh' class="snav-link @if(app()->getLocale()==='zh') active @endif">🇨🇳 中文</a>
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
     <a href="<?php echo e(route('order.track')); ?>" class="footer-link">Track Order</a>
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

.cart-drawer-backdrop{position:fixed;inset:0;background:rgba(0,0,0,.42);z-index:9997;opacity:0;pointer-events:none;transition:.25s ease}.cart-drawer-backdrop.open{opacity:1;pointer-events:auto}.cart-drawer{position:fixed;top:0;right:0;width:min(420px,92vw);height:100vh;background:#fff;z-index:9998;transform:translateX(105%);transition:transform .3s cubic-bezier(.2,.8,.2,1);box-shadow:-24px 0 60px rgba(0,0,0,.18);display:flex;flex-direction:column}.cart-drawer.open{transform:translateX(0)}.cart-drawer-head{padding:20px 22px;border-bottom:1px solid #EDE5DC;display:flex;justify-content:space-between;align-items:center}.cart-drawer-body{padding:18px 22px;overflow:auto;flex:1}.cart-drawer-item{display:flex;gap:12px;padding:12px 0;border-bottom:1px solid #F0E8DD}.cart-drawer-item img{width:64px;height:64px;object-fit:cover;border-radius:10px;background:#E8F0E8}.cart-drawer-foot{padding:18px 22px;border-top:1px solid #EDE5DC}.drawer-btn{width:100%;display:block;text-align:center;padding:13px;border-radius:999px;font-size:11px;font-weight:800;letter-spacing:.14em;text-transform:uppercase}.quick-modal-backdrop{position:fixed;inset:0;background:rgba(0,0,0,.52);z-index:9995;opacity:0;pointer-events:none;transition:.25s}.quick-modal-backdrop.open{opacity:1;pointer-events:auto}.quick-modal{position:fixed;top:50%;left:50%;width:min(860px,92vw);max-height:88vh;overflow:auto;background:#fff;border-radius:18px;z-index:9996;transform:translate(-50%,-46%) scale(.98);opacity:0;pointer-events:none;transition:.25s;box-shadow:0 30px 90px rgba(0,0,0,.28)}.quick-modal.open{transform:translate(-50%,-50%) scale(1);opacity:1;pointer-events:auto}.quick-grid{display:grid;grid-template-columns:1fr 1fr}.quick-img{width:100%;height:100%;min-height:420px;object-fit:cover;background:#E8F0E8}.quick-content{padding:28px}.quick-close{position:absolute;right:14px;top:12px;width:36px;height:36px;border-radius:50%;border:none;background:rgba(13,53,53,.08);cursor:pointer}@media(max-width:720px){.quick-grid{grid-template-columns:1fr}.quick-img{min-height:260px}.quick-content{padding:22px}}

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

<div id="cart-drawer-backdrop" class="cart-drawer-backdrop"></div>
<aside id="cart-drawer" class="cart-drawer" aria-hidden="true">
 <div class="cart-drawer-head"><strong class="serif" style="font-size:22px;color:#1A3D3A">Keranjang</strong><button type="button" onclick="closeCartDrawer()" style="border:none;background:transparent;font-size:24px;cursor:pointer;color:#4A6B6B">&times;</button></div>
 <div id="cart-drawer-body" class="cart-drawer-body"><div style="text-align:center;padding:50px 10px;color:#4A6B6B">Tambahkan produk untuk melihat keranjang.</div></div>
 <div class="cart-drawer-foot"><div style="display:flex;justify-content:space-between;margin-bottom:14px;color:#1A3D3A"><strong>Total</strong><strong id="cart-drawer-total">Rp 0</strong></div><a href="<?php echo e(route('checkout.index')); ?>" class="drawer-btn" style="background:#0D3535;color:#fff;margin-bottom:10px">Checkout</a><a href="<?php echo e(route('cart.index')); ?>" class="drawer-btn" style="border:1px solid rgba(13,53,53,.18);color:#0D3535">Lihat Keranjang</a></div>
</aside>
<div id="quick-modal-backdrop" class="quick-modal-backdrop"></div>
<div id="quick-modal" class="quick-modal" aria-hidden="true"><button type="button" class="quick-close" onclick="closeQuickModal()">&times;</button><div id="quick-modal-content"></div></div>

<div id="cart-toast">
  <svg width="18" height="18" fill="none" stroke="#C9A84C" stroke-width="2" viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
  <span id="cart-toast-msg"><?php echo e(__('messages.added_to_cart')); ?></span>
  <button id="cart-toast-close" onclick="hideToast()">&#x2715;</button>
</div>
<script>
var toastTimer;

function formatRupiah(n){return 'Rp '+Number(n||0).toLocaleString('id-ID');}
function renderCartDrawer(cart){var body=document.getElementById('cart-drawer-body'),total=document.getElementById('cart-drawer-total');if(!body)return;var items=(cart&&cart.items)||[];total.textContent=(cart&&cart.subtotal_formatted)||'Rp 0';if(!items.length){body.innerHTML='<div style="text-align:center;padding:50px 10px;color:#4A6B6B">Keranjang masih kosong.</div>';return;}body.innerHTML=items.map(function(i){return '<div class="cart-drawer-item"><img src="'+(i.image||'/IMAGE/SUPER.jpeg')+'"><div style="flex:1"><p style="font-weight:700;color:#1A3D3A;margin-bottom:4px">'+i.name+'</p><p style="font-size:12px;color:#4A6B6B;margin-bottom:8px">'+i.qty+' x '+formatRupiah(i.price)+'</p><form method="POST" action="<?php echo e(route('cart.remove')); ?>"><input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"><input type="hidden" name="product_id" value="'+i.id+'"><button style="border:none;background:transparent;color:#c0392b;font-size:11px;font-weight:700;cursor:pointer">HAPUS</button></form></div><strong style="color:#C9A84C;font-size:13px">'+formatRupiah(i.price*i.qty)+'</strong></div>'}).join('');}
function openCartDrawer(cart){if(cart)renderCartDrawer(cart);document.getElementById('cart-drawer').classList.add('open');document.getElementById('cart-drawer-backdrop').classList.add('open');}
function closeCartDrawer(){document.getElementById('cart-drawer').classList.remove('open');document.getElementById('cart-drawer-backdrop').classList.remove('open');}
function closeQuickModal(){document.getElementById('quick-modal').classList.remove('open');document.getElementById('quick-modal-backdrop').classList.remove('open');}
function openQuickModal(product){var html='<div class="quick-grid"><img class="quick-img" src="'+(product.thumbnail||'/IMAGE/SUPER.jpeg')+'"><div class="quick-content"><p style="font-size:10px;font-weight:800;letter-spacing:.18em;text-transform:uppercase;color:#C9A84C;margin-bottom:10px">Quick View</p><h2 class="serif" style="font-size:34px;color:#1A3D3A;margin-bottom:10px">'+product.name+'</h2><p style="font-size:22px;font-weight:800;color:#C9A84C;margin-bottom:10px">'+product.price_formatted+'</p><p style="font-size:13px;font-weight:800;color:'+product.stock_color+';margin-bottom:16px">'+product.stock_label+(product.stock>0?' ('+product.stock+')':'')+'</p><p style="font-size:14px;color:#4A6B6B;line-height:1.8;margin-bottom:22px">'+(product.description||'')+'</p><form method="POST" action="<?php echo e(route('cart.add')); ?>"><input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"><input type="hidden" name="product_id" value="'+product.id+'"><button type="submit" '+(product.stock<=0?'disabled':'')+' style="width:100%;padding:14px;border:none;border-radius:10px;background:'+(product.stock<=0?'#9ca3af':'#C9A84C')+';color:#0D3535;font-size:11px;font-weight:900;letter-spacing:.14em;text-transform:uppercase;cursor:pointer">'+(product.stock<=0?'STOK HABIS':'TAMBAH KE KERANJANG')+'</button></form><a href="'+product.detail_url+'" style="display:block;text-align:center;margin-top:12px;color:#0D3535;font-size:12px;font-weight:800">Lihat detail lengkap</a></div></div>';document.getElementById('quick-modal-content').innerHTML=html;document.getElementById('quick-modal').classList.add('open');document.getElementById('quick-modal-backdrop').classList.add('open');}

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
  var cb=document.getElementById('cart-drawer-backdrop'); if(cb) cb.addEventListener('click',closeCartDrawer);
  var qb=document.getElementById('quick-modal-backdrop'); if(qb) qb.addEventListener('click',closeQuickModal);
  document.querySelectorAll('.js-cart-open').forEach(function(a){a.addEventListener('click',function(e){e.preventDefault();openCartDrawer();});});
  document.body.addEventListener('click',function(e){var btn=e.target.closest('.js-quick-view');if(!btn)return;e.preventDefault();fetch(btn.dataset.quickUrl,{headers:{'Accept':'application/json','X-Requested-With':'XMLHttpRequest'}}).then(function(r){return r.json()}).then(openQuickModal);});
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
        showToast(res.productName+' <?php echo e(strtolower(__('messages.added_to_cart'))); ?>');
        updateCartBadge(res.cartCount); if(res.cart) openCartDrawer(res.cart);
        var btn=form.querySelector('button[type="submit"]');
        if(btn){
          var orig=btn.textContent;
          btn.textContent='<?php echo e(__('messages.added_button')); ?>';
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
