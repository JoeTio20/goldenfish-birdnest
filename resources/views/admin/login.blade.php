@extends('layouts.app')
@section('title', __('messages.admin_panel') . ' - GOLDENFISHBIRDNEST')
@section('head')
<style>
.serif{font-family:'Cormorant Garamond',serif}
.login-input{width:100%;border:none;border-bottom:1.5px solid rgba(200,168,76,.3);padding:10px 0;font-size:14px;background:transparent;outline:none;color:#1A3D3A;box-sizing:border-box;transition:border-color .2s}
.login-input:focus{border-bottom-color:#C9A84C}
.login-label{display:block;font-size:10px;font-weight:600;letter-spacing:.18em;text-transform:uppercase;color:#4A6B6B;margin-bottom:8px}
</style>
@endsection
@section('content')

<div style="min-height:calc(100vh - 60px);background:linear-gradient(rgba(245,248,246,.86),rgba(245,248,246,.9)),url('/IMAGE/optimized/SUPER.webp');background-size:cover;background-position:center;display:flex;align-items:center;justify-content:center;padding:40px 20px">
 <div style="position:relative;width:100%;max-width:430px;background:rgba(255,255,255,.94);border:1px solid rgba(200,168,76,.18);border-radius:22px;padding:34px 32px;box-shadow:0 24px 80px rgba(13,53,53,.18);backdrop-filter:blur(12px)">
  <a href="<?php echo e(route('home')); ?>" aria-label="<?php echo e(__('messages.back_to_site')); ?>" style="position:absolute;right:16px;top:14px;width:34px;height:34px;border-radius:50%;display:flex;align-items:center;justify-content:center;color:#4A6B6B;background:rgba(13,53,53,.06);font-size:20px;text-decoration:none">&times;</a>
  <div style="text-align:center;margin-bottom:28px">
   <p class="serif" style="font-size:11px;font-weight:700;letter-spacing:.3em;text-transform:uppercase;color:#C9A84C;margin-bottom:8px"><?php echo e(__('messages.admin_panel')); ?></p>
   <h1 class="serif" style="font-size:2.2rem;font-weight:700;color:#1A3D3A;margin:0"><?php echo e(__('messages.admin_welcome')); ?></h1>
  </div>
  @if(session('error_type') === 'email')
  <div style="background:rgba(192,57,43,.06);border:1px solid rgba(192,57,43,.2);color:#c0392b;font-size:13px;padding:12px 16px;border-radius:10px;margin-bottom:20px"><?php echo e(__('messages.admin_email_not_found')); ?></div>
  @elseif(session('error_type') === 'password')
  <div style="background:rgba(192,57,43,.06);border:1px solid rgba(192,57,43,.2);color:#c0392b;font-size:13px;padding:12px 16px;border-radius:10px;margin-bottom:20px"><?php echo e(__('messages.admin_wrong_password')); ?></div>
  @endif
  <form method="POST" action="<?php echo e(route('admin.login.post')); ?>">@csrf
   <div style="margin-bottom:22px"><label class="login-label"><?php echo e(__('messages.admin_email')); ?></label><input type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="admin@example.com" required autofocus class="login-input"></div>
   <div style="margin-bottom:30px"><label class="login-label"><?php echo e(__('messages.admin_password')); ?></label><input type="password" name="password" required class="login-input"></div>
   <button type="submit" style="width:100%;padding:14px;font-size:11px;font-weight:800;letter-spacing:.18em;text-transform:uppercase;border-radius:100px;background:#0D3535;color:#fff;border:none;cursor:pointer" onmouseover="this.style.background='#C9A84C';this.style.color='#0D3535'" onmouseout="this.style.background='#0D3535';this.style.color='#fff'"><?php echo e(__('messages.admin_login')); ?></button>
  </form>
  <p style="text-align:center;font-size:11px;color:#4A6B6B;margin-top:20px;display:flex;align-items:center;justify-content:center;gap:6px"><svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg><?php echo e(__('messages.admin_secure_page')); ?></p>
 </div>
</div>

@endsection
