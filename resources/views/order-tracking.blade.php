@extends('layouts.app')
@section('title','Track Order - Goldenfish Birdnest')
@section('content')
<section style="background:#F5F8F6;min-height:70vh;padding:56px 24px">
 <div style="max-width:860px;margin:0 auto">
  <div style="text-align:center;margin-bottom:32px">
   <p style="font-size:11px;font-weight:700;letter-spacing:.28em;text-transform:uppercase;color:#C9A84C;margin-bottom:12px">ORDER TRACKING</p>
   <h1 class="serif" style="font-size:clamp(2rem,5vw,3.2rem);color:#1A3D3A;margin-bottom:10px">Cek Status Pesanan</h1>
   <p style="font-size:14px;color:#4A6B6B;line-height:1.8;max-width:520px;margin:0 auto">Masukkan nomor pesanan kamu, contoh <strong>GBN-20260713-0001</strong>. Tambahkan email/WhatsApp untuk verifikasi jika perlu.</p>
  </div>
  <form method="POST" action="<?php echo e(route('order.track.search')); ?>" style="background:#fff;border:1px solid rgba(200,168,76,.16);border-radius:18px;padding:24px;box-shadow:0 12px 34px rgba(13,53,53,.06)">@csrf
   @if($errors->any())<div style="background:#FEF2F2;border:1px solid #FCA5A5;color:#991B1B;font-size:13px;padding:12px 14px;border-radius:10px;margin-bottom:16px"> $errors->first() </div>@endif
   <div style="display:grid;grid-template-columns:1fr 1fr auto;gap:12px;align-items:end" class="track-grid">
    <div><label style="display:block;font-size:12px;color:#4A6B6B;margin-bottom:6px">Nomor Pesanan</label><input name="order_number" value="<?php echo e(old('order_number')); ?>" placeholder="GBN-YYYYMMDD-0001" required style="width:100%;padding:13px 14px;border-radius:10px;border:1px solid rgba(200,168,76,.24);outline:none;color:#1A3D3A"></div>
    <div><label style="display:block;font-size:12px;color:#4A6B6B;margin-bottom:6px">Email / WhatsApp</label><input name="contact" value="<?php echo e(old('contact')); ?>" placeholder="Opsional" style="width:100%;padding:13px 14px;border-radius:10px;border:1px solid rgba(200,168,76,.24);outline:none;color:#1A3D3A"></div>
    <button type="submit" style="padding:14px 22px;border-radius:10px;border:none;background:#0D3535;color:#fff;font-size:11px;font-weight:800;letter-spacing:.14em;text-transform:uppercase;cursor:pointer">Cek</button>
   </div>
  </form>
  @if($searched)
   @if($order)
   <div style="margin-top:24px;background:#fff;border:1px solid rgba(200,168,76,.16);border-radius:18px;padding:24px">
    <div style="display:flex;justify-content:space-between;gap:16px;flex-wrap:wrap;margin-bottom:18px"><div><p style="font-size:11px;color:#A08070;font-weight:800;letter-spacing:.16em;text-transform:uppercase;margin-bottom:6px">Nomor Pesanan</p><h2 style="color:#1A3D3A;margin:0;font-size:24px"><?php echo e($order->display_order_number); ?></h2></div><span style="align-self:flex-start;padding:8px 12px;border-radius:999px;background:rgba(201,168,76,.12);color:#0D3535;font-size:12px;font-weight:800"><?php echo e($order->display_status); ?></span></div>
    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:12px" class="track-result-grid"><div><small style="color:#4A6B6B">Nama</small><p style="font-weight:700;color:#1A3D3A"><?php echo e($order->full_name); ?></p></div><div><small style="color:#4A6B6B">Total</small><p style="font-weight:700;color:#C9A84C">Rp <?php echo e(number_format($order->total,0,',','.')); ?></p></div><div><small style="color:#4A6B6B">Tanggal</small><p style="font-weight:700;color:#1A3D3A"><?php echo e($order->created_at->format('d M Y H:i')); ?></p></div></div>
   </div>
   @else
   <div style="margin-top:24px;background:#fff;border:1px solid #FCA5A5;border-radius:18px;padding:24px;text-align:center;color:#991B1B">Pesanan tidak ditemukan. Cek lagi nomor pesanan atau hubungi WhatsApp kami.</div>
   @endif
  @endif
 </div>
</section>
<style>@media(max-width:760px){.track-grid,.track-result-grid{grid-template-columns:1fr!important}}</style>
@endsection
