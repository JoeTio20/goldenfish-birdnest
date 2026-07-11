@extends('layouts.app')
@section('title', $product->name . ' - Goldenfish Birdnest')
@section('head')
<style>.serif{font-family:'Cormorant Garamond',serif}.thumb{border:2px solid transparent}.thumb.active{border-color:#C9A84C}@media(max-width:767px){.detail-grid{grid-template-columns:1fr!important}.related-grid{grid-template-columns:1fr!important}}</style>
@endsection
@section('content')
<section style="background:#F5F8F6;padding:42px 24px 72px"><div style="max-width:1120px;margin:0 auto">
 <a href="<?php echo e(route('product')); ?>" style="font-size:12px;color:#4A6B6B;text-decoration:none">&larr; Kembali ke produk</a>
 <div class="detail-grid" style="display:grid;grid-template-columns:1.05fr .95fr;gap:38px;align-items:start;margin-top:24px">
  <div>@php $imgs = $product->images ?: [$product->thumbnail]; @endphp
   <div style="background:#E8F0E8;border-radius:18px;overflow:hidden;aspect-ratio:4/3;border:1px solid rgba(200,168,76,.12)"><img id="main-product-img" src="<?php echo e($imgs[0] ?? '/IMAGE/SUPER.jpeg'); ?>" alt="<?php echo e($product->name); ?>" style="width:100%;height:100%;object-fit:cover" onerror="this.src='/IMAGE/SUPER.jpeg'"></div>
   @if(count($imgs)>1)<div style="display:flex;gap:10px;flex-wrap:wrap;margin-top:12px">@foreach($imgs as $i=>$img)<button type="button" class="thumb <?php echo $i===0?'active':''; ?>" onclick="setMainImage(this,'<?php echo e($img); ?>')" style="width:72px;height:72px;border-radius:10px;overflow:hidden;background:#fff;padding:0;cursor:pointer"><img src="<?php echo e($img); ?>" alt="<?php echo e($product->name); ?>" style="width:100%;height:100%;object-fit:cover"></button>@endforeach</div>@endif
   @if($product->video)<video src="<?php echo e($product->video); ?>" controls style="width:100%;border-radius:14px;margin-top:16px;border:1px solid rgba(200,168,76,.12)"></video>@endif
  </div>
  <div style="background:#fff;border:1px solid rgba(200,168,76,.12);border-radius:18px;padding:28px">
   @if($product->badge)<span style="display:inline-block;font-size:10px;font-weight:800;letter-spacing:.16em;text-transform:uppercase;background:#C9A84C;color:#0D3535;padding:6px 12px;border-radius:99px;margin-bottom:14px"><?php echo e($product->badge === 'limited' ? 'PREMIUM' : strtoupper($product->badge)); ?></span>@endif
   <h1 class="serif" style="font-size:clamp(2rem,5vw,3.1rem);color:#1A3D3A;margin:0 0 10px"><?php echo e($product->name); ?></h1>
   <p style="font-size:24px;font-weight:800;color:#C9A84C;margin:0 0 16px">Rp <?php echo e(number_format($product->price,0,',','.')); ?></p>
   <p style="font-size:13px;font-weight:700;color:<?php echo e($product->stock_color); ?>;margin-bottom:18px"><?php echo e($product->stock_label); ?> @if($product->stock > 0) (<?php echo e($product->stock); ?>) @endif</p>
   <p style="font-size:14px;color:#4A6B6B;line-height:1.8;margin-bottom:24px"><?php echo e($product->description); ?></p>
   <form method="POST" action="<?php echo e(route('cart.add')); ?>">@csrf<input type="hidden" name="product_id" value="<?php echo e($product->id); ?>"><button type="submit" <?php echo $product->stock <= 0 ? 'disabled' : ''; ?> style="width:100%;padding:14px;font-size:11px;font-weight:800;letter-spacing:.14em;text-transform:uppercase;background:<?php echo $product->stock <= 0 ? '#9ca3af' : '#C9A84C'; ?>;color:#0D3535;border:none;border-radius:10px;cursor:<?php echo $product->stock <= 0 ? 'not-allowed' : 'pointer'; ?>"><?php echo e($product->stock <= 0 ? 'STOK HABIS' : __('messages.add_cart')); ?></button></form>
  </div>
 </div>
 @if($related->count())<h2 class="serif" style="font-size:28px;color:#1A3D3A;margin:48px 0 18px">Produk Terkait</h2><div class="related-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:18px">@foreach($related as $p)<a href="<?php echo e(route('product.show',$p)); ?>" style="background:#fff;border-radius:14px;overflow:hidden;border:1px solid rgba(200,168,76,.12);text-decoration:none;color:inherit"><img src="<?php echo e($p->thumbnail); ?>" style="width:100%;aspect-ratio:4/3;object-fit:cover" onerror="this.src='/IMAGE/SUPER.jpeg'"><div style="padding:14px"><b><?php echo e($p->name); ?></b><p style="color:#C9A84C;margin-top:4px">Rp <?php echo e(number_format($p->price,0,',','.')); ?></p></div></a>@endforeach</div>@endif
</div></section><script>function setMainImage(btn,src){document.getElementById('main-product-img').src=src;document.querySelectorAll('.thumb').forEach(b=>b.classList.remove('active'));btn.classList.add('active');}</script>
@endsection
