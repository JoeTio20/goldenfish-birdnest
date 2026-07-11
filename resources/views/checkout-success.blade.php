@extends('layouts.app')
@section('title','Pesanan Berhasil')
@section('content')
@php
$waNumber = '6281234567890';
$waText = urlencode("Halo Goldenfish Birdnest, saya ingin menanyakan status pesanan saya.\n\nNomor Pesanan: {$order->order_number}\nNama: {$order->full_name}");
@endphp
<div style="background:#FAF8F5;min-height:80vh;display:flex;align-items:center;justify-content:center;padding:60px 20px;">
  <div style="text-align:center;max-width:560px;width:100%;">
    <div style="width:64px;height:64px;background:#F0FAF0;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 20px;"><svg width="28" height="28" fill="none" stroke="#22C55E" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg></div>
    <h1 style="font-family:'Cormorant Garamond',serif;font-size:34px;color:#2C1810;margin-bottom:8px;">Pesanan Berhasil!</h1>
    <p style="font-size:13px;color:#A08070;margin-bottom:24px;">Terima kasih, <?php echo e($order->full_name); ?>. Simpan nomor pesanan ini untuk tracking via WhatsApp.</p>
    <div style="background:#fff;border:1px solid #EDE5DC;border-radius:12px;padding:22px;text-align:left;margin-bottom:24px;">
      <p style="font-size:11px;font-weight:700;color:#A08070;letter-spacing:.1em;text-transform:uppercase;margin-bottom:10px;">Nomor Pesanan</p>
      <p style="font-size:24px;font-weight:800;color:#0D3535;letter-spacing:.04em;margin-bottom:16px"><?php echo e($order->order_number ?? ('GBN-'.$order->id)); ?></p>
      <p style="font-size:13px;color:#6B5B4E;margin-bottom:6px;">Total: <strong style="color:#2C1810;">Rp <?php echo e(number_format($order->total,0,',','.')); ?></strong></p>
      <p style="font-size:13px;color:#6B5B4E;margin-bottom:14px;">Status: <strong style="color:#2C1810;"><?php echo e($order->display_status); ?></strong></p>
      <div style="border-top:1px solid #EDE5DC;padding-top:14px;margin-top:14px">
        @foreach($order->items as $item)
        <div style="display:flex;justify-content:space-between;gap:12px;font-size:13px;color:#6B5B4E;margin-bottom:6px"><span><?php echo e($item['name']); ?> x<?php echo e($item['qty']); ?></span><strong>Rp <?php echo e(number_format($item['price']*$item['qty'],0,',','.')); ?></strong></div>
        @endforeach
      </div>
      @if($order->email)<p style="font-size:12px;color:#A08070;margin-top:14px;">Detail pesanan juga dikirim ke email: <?php echo e($order->email); ?></p>@endif
    </div>
    <div style="display:flex;gap:10px;justify-content:center;flex-wrap:wrap">
      <a href="https://wa.me/<?php echo e($waNumber); ?>?text=<?php echo e($waText); ?>" target="_blank" style="display:inline-block;background:#16a34a;color:#fff;font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;padding:14px 24px;text-decoration:none;border-radius:8px;">Tanya Status via WhatsApp</a>
      <a href="<?php echo e(route('home')); ?>" style="display:inline-block;background:#2C1810;color:#fff;font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;padding:14px 24px;text-decoration:none;border-radius:8px;"><?php echo e(__('messages.back_to_home')); ?></a>
    </div>
  </div>
</div>
@endsection
