@extends('layouts.app')

@section('title', __('messages.prod_title') . ' - Sarang Burung')

@section('head')
<style>
.serif{font-family:'Cormorant Garamond',serif}
.prod-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px}
.prod-card{background:#fff;border-radius:14px;overflow:hidden;border:1px solid rgba(200,168,76,.12);transition:transform .2s,box-shadow .2s;display:flex;flex-direction:column}
.prod-card:hover{transform:translateY(-4px);box-shadow:0 12px 32px rgba(13,53,53,.1)}
.prod-card-body{padding:18px 16px 20px;display:flex;flex-direction:column;flex:1}
.prod-card-spacer{flex:1}
.filter-btn{padding:8px 18px;font-size:10px;font-weight:600;letter-spacing:.15em;text-transform:uppercase;border-radius:100px;border:1.5px solid rgba(200,168,76,.3);background:transparent;color:#4A6B6B;cursor:pointer;text-decoration:none;transition:all .2s;display:inline-block}
.filter-btn:hover,.filter-btn.active{background:#C9A84C;border-color:#C9A84C;color:#0D3535}
@media(max-width:599px){.prod-grid{grid-template-columns:1fr}.filter-bar{flex-direction:column!important;align-items:flex-start!important}}
@media(min-width:600px) and (max-width:1023px){.prod-grid{grid-template-columns:repeat(2,1fr)}}
</style>
@endsection

@section('content')
<section style="background:#0D3535;padding:60px 24px 52px;text-align:center">
	<p style="font-size:11px;font-weight:600;letter-spacing:.3em;text-transform:uppercase;color:#C9A84C;margin-bottom:14px">@lang('messages.prod_label')</p>
	<h1 class="serif" style="font-size:clamp(2rem,5vw,3.2rem);color:#fff;font-weight:700;margin-bottom:12px">@lang('messages.prod_title')</h1>
	<p style="font-size:14px;color:rgba(255,255,255,.45);max-width:460px;margin:0 auto;line-height:1.75">@lang('messages.prod_sub')</p>
</section>

<section style="background:#F5F8F6;padding:18px 24px;border-bottom:1px solid rgba(200,168,76,.1)">
	<form method="GET" action="<?php echo e(route('product')); ?>" style="max-width:1140px;margin:0 auto;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:12px" class="filter-bar">
		<div style="display:flex;gap:8px;flex-wrap:wrap">
			@foreach(['all'=>__('messages.filter_all'),'premium'=>'Premium','reguler'=>'Reguler'] as $cat=>$label)
				<a href="<?php echo e(route('product', ['category'=>$cat,'sort'=>$sort,'search'=>$search ?? ''])); ?>" class="filter-btn <?php echo $category===$cat?'active':''; ?>"><?php echo e($label); ?></a>
			@endforeach
		</div>

		<div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap">
			<input type="hidden" name="category" value="<?php echo e($category); ?>">

			<input id="product-search-input" type="text" name="search" value="<?php echo e($search ?? ''); ?>" placeholder="Cari produk..." style="font-size:12px;padding:8px 12px;border-radius:8px;border:1.5px solid rgba(200,168,76,.25);background:#fff;color:#1A3D3A;outline:none;width:190px">

			<span style="font-size:11px;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:#4A6B6B">@lang('messages.sort_label')</span>

			<select name="sort" onchange="this.form.submit()" style="font-size:12px;padding:7px 12px;border-radius:8px;border:1.5px solid rgba(200,168,76,.25);background:#fff;color:#1A3D3A;outline:none;cursor:pointer">
				<option value="featured" <?php echo $sort==='featured'?'selected':''; ?>>@lang('messages.sort_feat')</option>
				<option value="price_asc" <?php echo $sort==='price_asc'?'selected':''; ?>>@lang('messages.sort_asc')</option>
				<option value="price_desc" <?php echo $sort==='price_desc'?'selected':''; ?>>@lang('messages.sort_desc')</option>
				<option value="newest" <?php echo $sort==='newest'?'selected':''; ?>>@lang('messages.sort_new')</option>
			</select>

			<button type="submit" style="padding:8px 14px;border-radius:8px;border:none;background:#0D3535;color:#fff;font-size:11px;font-weight:700;cursor:pointer">CARI</button>
		</div>
	</form>
</section>

<section style="background:#F5F8F6;padding:36px 24px 72px">
	<div style="max-width:1140px;margin:0 auto">
		@if(session('cart_success'))
			<div style="margin-bottom:20px;padding:12px 16px;border-radius:10px;background:rgba(200,168,76,.08);border:1px solid rgba(200,168,76,.2);color:#C9A84C;font-size:13px"><?php echo e(session('cart_success')); ?></div>
		@endif

		@if(session('cart_error'))
			<div style="margin-bottom:20px;padding:12px 16px;border-radius:10px;background:#FEF2F2;border:1px solid #FCA5A5;color:#991B1B;font-size:13px"><?php echo e(session('cart_error')); ?></div>
		@endif

		<div class="prod-grid">
			@forelse($products as $p)
				<div class="prod-card" data-product-name="<?php echo e(strtolower($p->name)); ?>" data-product-desc="<?php echo e(strtolower($p->description ?? '')); ?>">
					<div style="position:relative;aspect-ratio:4/3;overflow:hidden;background:#E8F0E8;flex-shrink:0">
						@if($p->badge==='limited')
							<span style="position:absolute;top:10px;left:10px;z-index:2;font-size:9px;font-weight:700;letter-spacing:.15em;text-transform:uppercase;padding:4px 10px;border-radius:100px;background:rgba(200,168,76,.9);color:#0D3535">PREMIUM</span>
						@endif

						@if($p->badge==='new')
							<span style="position:absolute;top:10px;left:10px;z-index:2;font-size:9px;font-weight:700;letter-spacing:.15em;text-transform:uppercase;padding:4px 10px;border-radius:100px;background:rgba(107,200,150,.9);color:#062912">NEW</span>
						@endif

						<img src="<?php echo e($p->thumbnail); ?>" alt="<?php echo e($p->name); ?>" loading="lazy" decoding="async" style="width:100%;height:100%;object-fit:cover" onerror="this.src='/IMAGE/SUPER.jpeg'">
					</div>

					<div class="prod-card-body">
						<h3 class="serif" style="font-size:17px;font-weight:700;color:#1A3D3A;margin-bottom:4px"><?php echo e($p->name); ?></h3>

						<p style="font-size:12px;color:#4A6B6B;margin-bottom:8px;line-height:1.6"><?php echo e($p->description); ?></p>

						<p style="font-size:14px;font-weight:700;color:#C9A84C;margin-bottom:4px">Rp <?php echo e(number_format($p->price,0,',','.')); ?></p>

						<p style="font-size:11px;font-weight:700;color:<?php echo e($p->stock_color); ?>;margin-bottom:8px"><?php echo e($p->stock_label); ?></p>

						<div class="prod-card-spacer"></div>

						<a href="<?php echo e(route('product.show',$p)); ?>" style="display:block;text-align:center;margin-top:12px;margin-bottom:8px;padding:10px;font-size:10px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:#0D3535;border:1px solid rgba(200,168,76,.35);border-radius:8px">LIHAT DETAIL</a>

						<form method="POST" action="<?php echo e(route('cart.add')); ?>">
							@csrf
							<input type="hidden" name="product_id" value="<?php echo e($p->id); ?>">

							<button type="submit" <?php echo $p->stock <= 0 ? 'disabled' : ''; ?> style="width:100%;padding:11px;font-size:10px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;background:<?php echo $p->stock <= 0 ? '#9ca3af' : '#C9A84C'; ?>;color:#0D3535;border:none;border-radius:8px;cursor:<?php echo $p->stock <= 0 ? 'not-allowed' : 'pointer'; ?>">
								<?php echo e($p->stock <= 0 ? 'STOK HABIS' : __('messages.add_cart')); ?>
							</button>
						</form>
					</div>
				</div>
			@empty
				<div style="grid-column:1/-1;text-align:center;padding:80px 0;color:#4A6B6B;font-size:14px">Produk tidak ditemukan.</div>
			@endforelse
		</div>
	</div>
</section>

<script>
const productSearchInput = document.getElementById('product-search-input');

if (productSearchInput) {
	productSearchInput.addEventListener('input', function () {
		const keyword = this.value.toLowerCase().trim();
		const cards = document.querySelectorAll('.prod-card');

		cards.forEach(function (card) {
			const name = card.dataset.productName || '';
			const desc = card.dataset.productDesc || '';

			const match = name.includes(keyword) || desc.includes(keyword);

			card.style.display = match ? 'flex' : 'none';
		});
	});
}
</script>
@endsection