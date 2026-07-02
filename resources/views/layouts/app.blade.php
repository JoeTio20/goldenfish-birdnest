<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title', 'Sarang Burung')</title>
<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = {
  theme: {
    extend: {
      colors: {
        cream: "#F9F6F0",
        "cream-dark": "#F0EAE0",
        navy: "#1B3A1F",
        charcoal: "#1A1A18",
        gold: "#C9A84C",
        "warm-gray": "#6B6B6B"
      },
      fontFamily: {
        serif: ["Playfair Display", "Georgia", "serif"],
        sans: ["Inter", "system-ui", "sans-serif"]
      }
    }
  }
}
</script>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
* { box-sizing:border-box; }
body { font-family:'Inter',sans-serif; background:#FAF7F4; color:#1A1A18; }
.nav-link { font-size:.7rem; letter-spacing:.14em; text-transform:uppercase; position:relative; transition:color .2s; }
.nav-link::after { content:''; position:absolute; bottom:-4px; left:0; right:0; height:1.5px; background:#C9A84C; transform:scaleX(0); transition:transform .25s; }
.nav-link:hover::after, .nav-link.active::after { transform:scaleX(1); }
#toast { position:fixed; bottom:2rem; right:2rem; background:#1B3A1F; color:#fff; padding:.8rem 1.4rem; border-radius:4px; font-size:.82rem; z-index:9999; display:none; border-left:3px solid #C9A84C; }
.product-img img { transition:transform .5s ease; }
.product-card:hover .product-img img { transform:scale(1.06); }
#mobile-menu { display:none; }
#mobile-menu.open { display:block; }
</style>
@yield('head')
</head>
<body>

<!-- NAVBAR -->
<header class="sticky top-0 z-50 bg-[#1B3A1F] border-b border-white/10">
  <div class="max-w-7xl mx-auto px-4 md:px-6 h-16 flex items-center justify-between">

    <!-- LEFT: Hamburger + Brand -->
    <div class="flex items-center gap-4">
      <button class="md:hidden flex flex-col gap-1.5 p-1" onclick="document.getElementById('mobile-menu').classList.toggle('open')">  
        <span class="block w-5 h-0.5 bg-white/80"></span>
        <span class="block w-5 h-0.5 bg-white/80"></span>
        <span class="block w-5 h-0.5 bg-white/80"></span>
      </button>
      <a href="{{ route('home') }}" class="font-serif text-sm font-bold tracking-[.18em] uppercase text-white">SARANG BURUNG</a>
    </div>

    <!-- CENTER: Nav desktop -->
    <nav class="hidden md:flex gap-8">
      <a href="{{ route('home') }}" class="nav-link text-white/70 hover:text-white {{ request()->routeIs('home') ? 'active text-white' : '' }}">{{ __('nav.home') }}</a>
      <a href="{{ route('philosophy') }}" class="nav-link text-white/70 hover:text-white {{ request()->routeIs('philosophy') ? 'active text-white' : '' }}">{{ __('nav.philosophy') }}</a>
      <a href="{{ route('product') }}" class="nav-link text-white/70 hover:text-white {{ request()->routeIs('product') ? 'active text-white' : '' }}">{{ __('nav.product') }}</a>
    </nav>

    <!-- RIGHT -->
    <div class="flex items-center gap-4">
      <a href="{{ route('home', ['lang'=> app()->getLocale()=='id' ? 'en' : 'id']) }}" class="hidden sm:flex items-center gap-1.5 text-[10px] font-bold tracking-widest text-white/60 hover:text-[#C9A84C] transition uppercase">
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg>
        {{ strtoupper(app()->getLocale()) }}
      </a>
      <a href="{{ route('cart.index') }}" class="relative" id="cart-icon">
        <svg class="w-5 h-5 text-white/80 hover:text-[#C9A84C] transition" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/></svg>
        @php $cartCount = collect(session('cart', []))->sum('qty'); @endphp
        @if($cartCount > 0)
        <span id="cart-badge" style="position:absolute;top:-8px;right:-8px;background:#C9A84C;color:white;font-size:10px;width:17px;height:17px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:700">{{ $cartCount }}</span>
        @endif
      </a>
      <a href="/admin/login" class="text-white/50 hover:text-white/90 transition">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
      </a>
    </div>
  </div>

  <!-- MOBILE MENU -->
  <div id="mobile-menu" class="md:hidden bg-[#0A1828] border-t border-white/10 px-6 py-6">
    <nav class="flex flex-col gap-6">
      <a href="{{ route('home') }}" class="text-sm tracking-widest uppercase text-white/80 hover:text-[#C9A84C] transition" onclick="document.getElementById('mobile-menu').classList.remove('open')">Beranda</a>
      <a href="{{ route('philosophy') }}" class="text-sm tracking-widest uppercase text-white/80 hover:text-[#C9A84C] transition" onclick="document.getElementById('mobile-menu').classList.remove('open')">Filosofi</a>
      <a href="{{ route('product') }}" class="text-sm tracking-widest uppercase text-white/80 hover:text-[#C9A84C] transition" onclick="document.getElementById('mobile-menu').classList.remove('open')">Produk</a>
      <hr class="border-white/10">
      <a href="{{ route('cart.index') }}" class="text-sm text-white/50">🛒 Keranjang</a>
    </nav>
  </div>
</header>

<div id="toast"></div>
@yield('content')

<!-- FOOTER -->
<footer class="bg-[#060D06] text-white pt-16 pb-6">
  <div class="max-w-7xl mx-auto px-4 md:px-6">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-12 pb-12 border-b border-white/10">
      <div>
        <p class="font-serif text-xl mb-4 text-white">Sarang Burung</p>
        <p class="text-sm text-white/40 leading-relaxed mb-6">{{ __('footer.tagline') }}</p>
        <div class="flex gap-3">
          <span class="w-8 h-8 rounded-full border border-white/20 flex items-center justify-center text-white/40 hover:border-[#C9A84C] hover:text-[#C9A84C] transition cursor-pointer text-xs">in</span>
          <span class="w-8 h-8 rounded-full border border-white/20 flex items-center justify-center text-white/40 hover:border-[#C9A84C] hover:text-[#C9A84C] transition cursor-pointer text-xs">ig</span>
          <span class="w-8 h-8 rounded-full border border-white/20 flex items-center justify-center text-white/40 hover:border-[#C9A84C] hover:text-[#C9A84C] transition cursor-pointer text-xs">wa</span>
        </div>
      </div>
      <div>
        <h4 class="text-[10px] tracking-[.25em] uppercase text-[#C9A84C] mb-5 font-semibold">{{ __('footer.nav_title') }}</h4>
        <ul class="space-y-3">
          <li><a href="{{ route('product') }}" class="text-sm text-white/50 hover:text-white transition">{{ __('footer.all_products') }}</a></li>
          <li><a href="{{ route('product') }}" class="text-sm text-white/50 hover:text-white transition">{{ __('footer.premium') }}</a></li>
          <li><a href="{{ route('product') }}" class="text-sm text-white/50 hover:text-white transition">{{ __('footer.best_seller') }}</a></li>
        </ul>
      </div>
      <div>
        <h4 class="text-[10px] tracking-[.25em] uppercase text-[#C9A84C] mb-5 font-semibold">{{ __('footer.info_title') }}</h4>
        <ul class="space-y-3">
          <li><a href="{{ route('philosophy') }}" class="text-sm text-white/50 hover:text-white transition">{{ __('footer.our_story') }}</a></li>
          <li><a href="#" class="text-sm text-white/50 hover:text-white transition">{{ __('footer.shipping') }}</a></li>
          <li><a href="#" class="text-sm text-white/50 hover:text-white transition">{{ __('footer.contact') }}</a></li>
          <li><a href="#" class="text-sm text-white/50 hover:text-white transition">{{ __('footer.privacy') }}</a></li>
        </ul>
      </div>
    </div>
    <div class="flex flex-col md:flex-row justify-between items-center pt-6 text-xs text-white/25 gap-2">
      <span>{{ __('footer.copyright') }}</span>
      <div class="flex gap-5">
        <span>{{ __('footer.terms') }}</span>
        <span>{{ __('footer.privacy_short') }}</span>
      </div>
    </div>
  </div>
</footer>

<script>
function showToast(msg) {
  const t = document.getElementById('toast');
  t.textContent = msg; t.style.display = 'block';
  clearTimeout(window._t); window._t = setTimeout(() => t.style.display = 'none', 3000);
}
document.addEventListener('click', e => {
  const btn = e.target.closest('.btn-add-cart');
  if (!btn) return;
  e.preventDefault();
  fetch('{{ route('cart.add') }}', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content },
    body: JSON.stringify({ product_id: btn.dataset.id, name: btn.dataset.name, price: btn.dataset.price, image: btn.dataset.image })
  }).then(r => r.json()).then(res => {
    if (!res.success) return;
    showToast(res.message || 'Ditambahkan!');
    let badge = document.getElementById('cart-badge');
    if (badge) { badge.textContent = res.count; }
    else {
      const icon = document.getElementById('cart-icon');
      badge = document.createElement('span');
      badge.id = 'cart-badge';
      badge.style.cssText = 'position:absolute;top:-8px;right:-8px;background:#C9A84C;color:white;font-size:10px;width:17px;height:17px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:700';
      badge.textContent = res.count;
      icon.style.position = 'relative';
      icon.appendChild(badge);
    }
  }).catch(() => showToast('Gagal menambahkan ke keranjang'));
});
</script>
@yield('scripts')
</body>
</html>