@extends('layouts.app')
@section('title','Filosofi - Sarang Burung')
@section('head')
<style>
{*{box-sizing:border-box}}
{.serif{font-family:'Cormorant Garamond',serif}}
{@media(max-width:767px){.phil-grid{grid-template-columns:1fr!important}.phil-pillars{grid-template-columns:1fr!important}}}
{@media(min-width:768px) and (max-width:1023px){.phil-grid{grid-template-columns:1fr 1fr!important;gap:32px!important}.phil-pillars{grid-template-columns:1fr 1fr 1fr!important}}}
</style>
@endsection
@section('content')

<section style="position:relative;height:60vh;min-height:380px;display:flex;align-items:center;justify-content:center;overflow:hidden">
  <div style="position:absolute;inset:0;background-image:url('/IMAGE/SUPER.jpeg');background-size:cover;background-position:center"></div>
  <div style="position:absolute;inset:0;background:linear-gradient(to bottom,rgba(8,16,26,.75) 0%,rgba(8,16,26,.5) 50%,rgba(8,16,26,.88) 100%)"></div>
  <div style="position:relative;z-index:2;text-align:center;padding:0 20px;max-width:640px">
    <p style="font-size:11px;font-weight:600;letter-spacing:.32em;text-transform:uppercase;color:#6BAED6;margin:0 0 18px">@lang('messages.phil_label')</p>
    <h1 class="serif" style="font-size:clamp(2.4rem,6vw,4.2rem);line-height:1.08;color:#fff;font-weight:700;margin:0">@lang('messages.phil_title')</h1>
  </div>
</section>

<section style="background:#F7F9FB;padding:80px 20px">
  <div style="max-width:1100px;margin:0 auto">
    <div class="phil-grid" style="display:grid;grid-template-columns:1fr 420px;gap:64px;align-items:center">
      <!-- LEFT: text -->
      <div>
        <p style="font-size:11px;font-weight:600;letter-spacing:.28em;text-transform:uppercase;color:#6BAED6;margin:0 0 14px">@lang('messages.phil_s_title')</p>
        <h2 class="serif" style="font-size:clamp(2rem,4vw,2.8rem);line-height:1.15;color:#1C2B3A;font-weight:700;margin:0 0 28px">@lang('messages.born_title')</h2>
        <p style="font-size:14px;color:#4A6375;line-height:1.95;margin:0 0 14px">@lang('messages.phil_p1')</p>
        <p style="font-size:14px;color:#4A6375;line-height:1.95;margin:0 0 14px">@lang('messages.phil_p2')</p>
        <p style="font-size:14px;color:#4A6375;line-height:1.95;margin:0 0 28px">@lang('messages.phil_p3')</p>
        <a href="{{ route('product') }}" style="display:inline-block;padding:12px 28px;font-size:11px;font-weight:600;letter-spacing:.12em;text-transform:uppercase;border-radius:100px;background:#6BAED6;color:#07111C;text-decoration:none">@lang('messages.nav_product')</a>
      </div>
      <!-- RIGHT: image -->
      <div style="position:relative">
        <img src="/IMAGE/INDONMMIE.jpeg" alt="" style="width:100%;border-radius:16px;aspect-ratio:3/4;object-fit:cover;display:block">
        <div style="position:absolute;bottom:-20px;left:-20px;width:120px;height:120px;border-radius:12px;overflow:hidden;border:4px solid #F7F9FB">
          <img src="/IMAGE/MANGKOK.jpeg" alt="" style="width:100%;height:100%;object-fit:cover">
        </div>
      </div>
    </div>
  </div>
</section>

<section style="background:#EDF4F8;padding:72px 20px">
  <div style="max-width:1100px;margin:0 auto">
    <div style="text-align:center;margin-bottom:48px">
      <p style="font-size:11px;font-weight:600;letter-spacing:.28em;text-transform:uppercase;color:#6BAED6;margin:0 0 12px">@lang('messages.born_title')</p>
      <h2 class="serif" style="font-size:clamp(1.6rem,3.5vw,2.4rem);color:#1C2B3A;font-weight:700;margin:0">@lang('messages.born_sub')</h2>
    </div>
    <!-- HORIZONTAL CARDS ROW -->
    <div class="phil-pillars" style="display:grid;grid-template-columns:repeat(3,1fr);gap:16px">
      <div style="background:#fff;border-radius:14px;padding:28px 24px;border:1px solid rgba(107,174,214,.15);display:flex;flex-direction:row;align-items:flex-start;gap:16px">
        <div style="width:44px;height:44px;border-radius:10px;background:rgba(107,174,214,.12);display:flex;align-items:center;justify-content:center;font-size:20px;flex-shrink:0">🤝</div>
        <div>
          <h3 class="serif" style="font-size:17px;font-weight:700;color:#1C2B3A;margin:0 0 8px">@lang('messages.tan_title')</h3>
          <p style="font-size:13px;color:#4A6375;line-height:1.8;margin:0">@lang('messages.tan_desc')</p>
        </div>
      </div>
      <div style="background:#fff;border-radius:14px;padding:28px 24px;border:1px solid rgba(107,174,214,.15);display:flex;flex-direction:row;align-items:flex-start;gap:16px">
        <div style="width:44px;height:44px;border-radius:10px;background:rgba(107,174,214,.12);display:flex;align-items:center;justify-content:center;font-size:20px;flex-shrink:0">🍃</div>
        <div>
          <h3 class="serif" style="font-size:17px;font-weight:700;color:#1C2B3A;margin:0 0 8px">@lang('messages.cut_title')</h3>
          <p style="font-size:13px;color:#4A6375;line-height:1.8;margin:0">@lang('messages.cut_desc')</p>
        </div>
      </div>
      <div style="background:#fff;border-radius:14px;padding:28px 24px;border:1px solid rgba(107,174,214,.15);display:flex;flex-direction:row;align-items:flex-start;gap:16px">
        <div style="width:44px;height:44px;border-radius:10px;background:rgba(107,174,214,.12);display:flex;align-items:center;justify-content:center;font-size:20px;flex-shrink:0">📦</div>
        <div>
          <h3 class="serif" style="font-size:17px;font-weight:700;color:#1C2B3A;margin:0 0 8px">@lang('messages.stitch_title')</h3>
          <p style="font-size:13px;color:#4A6375;line-height:1.8;margin:0">@lang('messages.stitch_desc')</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section style="position:relative;min-height:320px;display:flex;align-items:center;justify-content:center;overflow:hidden">
  <div style="position:absolute;inset:0;background-image:url('/IMAGE/PATAH SAMBUNG.jpeg');background-size:cover;background-position:center;opacity:.45"></div>
  <div style="position:absolute;inset:0;background:rgba(8,14,24,.78)"></div>
  <div style="position:relative;z-index:2;text-align:center;padding:0 20px;max-width:520px">
    <p style="font-size:11px;font-weight:600;letter-spacing:.3em;text-transform:uppercase;color:#6BAED6;margin:0 0 14px">@lang('messages.beauty_sub')</p>
    <h2 class="serif" style="font-size:clamp(1.8rem,4vw,2.8rem);color:#fff;font-weight:700;margin:0 0 24px">@lang('messages.beauty_title')</h2>
    <p style="font-size:13px;color:rgba(255,255,255,.55);line-height:1.85;margin:0 0 28px">@lang('messages.beauty_desc')</p>
    <a href="{{ route('product') }}" style="display:inline-block;padding:13px 32px;font-size:11px;font-weight:600;letter-spacing:.12em;text-transform:uppercase;border-radius:100px;background:#6BAED6;color:#07111C;text-decoration:none">@lang('messages.nav_product')</a>
  </div>
</section>

@endsection
