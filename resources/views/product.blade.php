@extends('layouts.app')
@section('title', __('messages.prod_title') . ' - Sarang Burung')
@section('head')
<style>
.serif{font-family:'Cormorant Garamond',serif}
.prod-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px}
.prod-card{background:#fff;border-radius:14px;overflow:hidden;border:1px solid rgba(107,174,214,.12);transition:transform .2s,box-shadow .2s;display:flex;flex-direction:column}
.prod-card:hover{transform:translateY(-4px);box-shadow:0 12px 32px rgba(13,27,42,.1)}
.prod-card-body{padding:18px 16px 20px;display:flex;flex-direction:column;flex:1}
.prod-card-spacer{flex:1}
.filter-btn{padding:8px 18px;font-size:10px;font-weight:600;letter-spacing:.15em;text-transform:uppercase;border-radius:100px;border:1.5px solid rgba(107,174,214,.3);background:transparent;color:#4A6375;cursor:pointer;text-decoration:none;transition:all .2s;display:inline-block}
.filter-btn:hover,.filter-btn.active{background:#6BAED6;border-color:#6BAED6;color:#0D1B2A}
@media(max-width:599px){.prod-grid{grid-template-columns:1fr}.filter-bar{flex-direction:column!important;align-items:flex-start!important}}
@media(min-width:600px) and (max-width:1023px){.prod-grid{grid-template-columns:repeat(2,1fr)}}
</style>
@endsection
@section('content')

<section style="background:#0D1B2A;padding:60px 24px 52px;text-align:center">
 <p style="font-size:11px;font-weight:600;letter-spacing:.3em;text-transform:uppercase;color:#6BAED6;margin-bottom:14px">Koleksi Kami</p>
 <h1 class="serif" style="font-size:clamp(2rem,5vw,3.2rem);color:#fff;font-weight:700;margin-bottom:12px">@lang('messages.prod_title')</h1>
 <p style="font-size:14px;color:rgba(255,255,255,.45);max-width:460px;margin:0 auto;line-height:1.75">@lang('messages.prod_sub')</p>
</section>

<section style="background:#F7F9FB;padding:18px 24px;border-bottom:1px solid rgba(107,174,214,.1)">
 <div style="max-width:1140px;margin:0 auto;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:12px" class="filter-bar">
  <div style="display:flex;gap:8px;flex-wrap:wrap">
  @foreach(['all'=>__('messages.filter_all'),'premium'=>'Premium','reguler'=>'Reguler'] as $cat=>$label)
  <a href="{{ route('product') }}?category={{ $cat }}&sort={{ request('sort','featured') }}"
     class="filter-btn {{ request('category','all')===$cat ? 'active' : '' }}">{{ $label }}</a>
  @endforeach
  </div>
  <div style="display:flex;align-items:center;gap:8px">
   <span style="font-size:11px;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:#4A6375">@lang('messages.sort_label')</span>
   <select onchange="location='{{ route('product') }}?category={{ request('category','all') }}&sort='+this.value" style="font-size:12px;padding:7px 12px;border-radius:8px;border:1.5px solid rgba(107,174,214,.25);background:#fff;color:#1C2B3A;outline:none;cursor:pointer">
    <option value="featured" {{ request('sort')=='featured' ? 'selected' : '' }}>@lang('messages.sort_feat')</option>
    <option value="price_asc" {{ request('sort')=='price_asc' ? 'selected' : '' }}>@lang('messages.sort_asc')</option>
    <option value="price_desc" {{ request('sort')=='price_desc' ? 'selected' : '' }}>@lang('messages.sort_desc')</option>
    <option value="newest" {{ request('sort')=='newest' ? 'selected' : '' }}>@lang('messages.sort_new')</option>
   </select>
  </div>
 </div>
</section>

<section style="background:#F7F9FB;padding:36px 24px 72px">
 <div style="max-width:1140px;margin:0 auto">
 @if(session('cart_success'))
 <div style="margin-bottom:20px;padding:12px 16px;border-radius:10px;background:rgba(107,174,214,.08);border:1px solid rgba(107,174,214,.2);color:#6BAED6;font-size:13px">{{ session('cart_success') }}</div>
 @endif
 <div class="prod-grid">
 @forelse($products as $p)
 <div class="prod-card">
  <div style="position:relative;aspect-ratio:4/3;overflow:hidden;background:#DAE8F0;flex-shrink:0">
   @if($p->badge==='limited')<span style="position:absolute;top:10px;left:10px;z-index:2;font-size:9px;font-weight:700;letter-spacing:.15em;text-transform:uppercase;padding:4px 10px;border-radius:100px;background:rgba(107,174,214,.9);color:#0D1B2A">PREMIUM</span>@endif
   @if($p->badge==='new')<span style="position:absolute;top:10px;left:10px;z-index:2;font-size:9px;font-weight:700;letter-spacing:.15em;text-transform:uppercase;padding:4px 10px;border-radius:100px;background:rgba(107,200,150,.9);color:#062912">NEW</span>@endif
   <img src="{{ $p->thumbnail }}" alt="{{ $p->name }}" style="width:100%;height:100%;object-fit:cover" onerror="this.src='/IMAGE/SUPER.jpeg'">
  </div>
  <div class="prod-card-body">
   <h3 class="serif" style="font-size:17px;font-weight:700;color:#1C2B3A;margin-bottom:4px">{{ $p->name }}</h3>
   <p style="font-size:12px;color:#4A6375;margin-bottom:8px;line-height:1.6">{{ Str::limit($p->description,65) }}</p>
   <p style="font-size:14px;font-weight:700;color:#6BAED6;margin-bottom:0">Rp {{ number_format($p->price,0,',','.') }}</p>
   <div class="prod-card-spacer"></div>
   <form method="POST" action="{{ route('cart.add') }}" style="margin-top:14px">@csrf
   <input type="hidden" name="product_id" value="{{ $p->id }}">
   <button type="submit" style="width:100%;padding:11px;font-size:10px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;background:#6BAED6;color:#0D1B2A;border:none;border-radius:8px;cursor:pointer" onmouseover="this.style.opacity=.8" onmouseout="this.style.opacity=1">@lang('messages.add_cart')</button>
   </form>
  </div>
 </div>
 @empty
 <div style="grid-column:1/-1;text-align:center;padding:80px 0;color:#4A6375;font-size:14px">Belum ada produk tersedia.</div>
 @endforelse
 </div>
 </div>
</section>

@endsection
