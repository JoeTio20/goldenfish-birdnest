@extends('layouts.app')
@section('title','Login Admin - Sarang Burung')
@section('head')
<style>
.serif{font-family:'Cormorant Garamond',serif}
.login-input{width:100%;border:none;border-bottom:1.5px solid rgba(200,168,76,.3);padding:10px 0;font-size:14px;background:transparent;outline:none;color:#1A3D3A;box-sizing:border-box;transition:border-color .2s}
.login-input:focus{border-bottom-color:#C9A84C}
.login-label{display:block;font-size:10px;font-weight:600;letter-spacing:.18em;text-transform:uppercase;color:#4A6B6B;margin-bottom:8px}
</style>
@endsection
@section('content')

<div style="min-height:calc(100vh - 60px);background:#F5F8F6;display:flex;align-items:center;justify-content:center;padding:40px 20px">
 <div style="width:100%;max-width:400px">
  <div style="text-align:center;margin-bottom:32px">
   <p class="serif" style="font-size:11px;font-weight:600;letter-spacing:.3em;text-transform:uppercase;color:#C9A84C;margin-bottom:8px">Admin Panel</p>
   <h1 class="serif" style="font-size:2.2rem;font-weight:700;color:#1A3D3A;margin:0">Selamat Datang</h1>
  </div>

  @if(session('error_type') === 'email')
  <div style="background:rgba(192,57,43,.06);border:1px solid rgba(192,57,43,.2);color:#c0392b;font-size:13px;padding:12px 16px;border-radius:10px;margin-bottom:20px">Email tidak ditemukan.</div>
  @elseif(session('error_type') === 'password')
  <div style="background:rgba(192,57,43,.06);border:1px solid rgba(192,57,43,.2);color:#c0392b;font-size:13px;padding:12px 16px;border-radius:10px;margin-bottom:20px">Password salah. Coba lagi.</div>
  @endif

  <div style="background:#fff;border-radius:16px;border:1px solid rgba(200,168,76,.15);padding:36px 32px;box-shadow:0 4px 24px rgba(13,53,53,.05)">
  <form method="POST" action="{{ route('admin.login.post') }}">@csrf

   <div style="margin-bottom:22px">
    <label class="login-label">Email</label>
    <input type="email" name="email" value="{{ old('email') }}" placeholder="admin@example.com" required autofocus class="login-input">
   </div>

   <div style="margin-bottom:30px">
    <label class="login-label">Password</label>
    <input type="password" name="password" required class="login-input">
   </div>

   <button type="submit" style="width:100%;padding:14px;font-size:11px;font-weight:700;letter-spacing:.18em;text-transform:uppercase;border-radius:100px;background:#0D3535;color:#fff;border:none;cursor:pointer" onmouseover="this.style.background='#C9A84C';this.style.color='#0D3535'" onmouseout="this.style.background='#0D3535';this.style.color='#fff'">Masuk</button>
  </form>
  </div>

  <p style="text-align:center;font-size:11px;color:#4A6B6B;margin-top:20px;display:flex;align-items:center;justify-content:center;gap:6px">
   <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
   Halaman khusus administrator
  </p>
 </div>
</div>

@endsection
