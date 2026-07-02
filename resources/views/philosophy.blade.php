@extends('layouts.app')
@section('title','Filosofi - Sarang Burung')
@section('head')
<style>
{.serif{font-family:'Cormorant Garamond',serif}}
</style>
@endsection
@section('content')

<section style="position:relative;min-height:65vh;display:flex;align-items:center;justify-content:center;overflow:hidden">
  <div style="position:absolute;inset:0;background-image:url('/IMAGE/SUPER.jpeg');background-size:cover;background-position:center;opacity:.4"></div>
  <div style="position:absolute;inset:0;background:linear-gradient(to bottom,rgba(10,18,30,.8),rgba(10,18,30,.5) 50%,rgba(10,18,30,.85))"></div>
  <div style="position:relative;z-index:2;text-align:center;padding:0 20px;max-width:600px">
    <p style="font-size:11px;font-weight:600;letter-spacing:.32em;text-transform:uppercase;color:#6BAED6;margin:0 0 20px">@lang('messages.phil_label')</p>
    <h1 class="serif" style="font-size:clamp(2.5rem,5vw,4rem);line-height:1.1;color:#fff;font-weight:700;margin:0">@lang('messages.phil_title')</h1>
  </div>
</section>

<section style="background:#F7F9FB;padding:90px 20px">
  <div class="max-w-6xl mx-auto">
    <div style="display:grid;grid-template-columns:1fr;gap:56px;align-items:center" class="md:grid-cols-2">
      <div>
        <p style="font-size:11px;font-weight:600;letter-spacing:.25em;text-transform:uppercase;color:#6BAED6;margin:0 0 16px">@lang('messages.phil_s_title')</p>
        <h2 class="serif" style="font-size:clamp(2rem,4vw,2.8rem);line-height:1.2;color:#1C2B3A;font-weight:700;margin:0 0 24px">@lang('messages.born_title')</h2>
        <p style="font-size:14px;color:#4A6375;line-height:1.95;margin:0 0 14px">@lang('messages.phil_p1')</p>
        <p style="font-size:14px;color:#4A6375;line-height:1.95;margin:0 0 14px">@lang('messages.phil_p2')</p>
        <p style="font-size:14px;color:#4A6375;line-height:1.95;margin:0">@lang('messages.phil_p3')</p>
      </div>
      <div><img src="/IMAGE/INDONMMIE.jpeg" alt="" style="width:100%;border-radius:14px;aspect-ratio:4/5;object-fit:cover;display:block"></div>
    </div>
  </div>
</section>

<section style="background:#EDF4F8;padding:80px 20px">
  <div class="max-w-5xl mx-auto">
    <div style="text-align:center;margin-bottom:56px">
      <p style="font-size:11px;font-weight:600;letter-spacing:.25em;text-transform:uppercase;color:#6BAED6;margin:0 0 12px">@lang('messages.born_title')</p>
      <h2 class="serif" style="font-size:clamp(1.8rem,3.5vw,2.5rem);color:#1C2B3A;font-weight:700;margin:0">@lang('messages.born_sub')</h2>
    </div>
    <div style="display:grid;grid-template-columns:repeat(1,1fr);gap:20px" class="md:grid-cols-3">
    <div style="background:#fff;border-radius:12px;padding:28px;border:1px solid rgba(107,174,214,.15)">
      <div style="width:44px;height:44px;border-radius:10px;background:rgba(107,174,214,.12);display:flex;align-items:center;justify-content:center;font-size:20px;margin-bottom:16px">🤝</div>
      <h3 class="serif" style="font-size:18px;font-weight:600;color:#1C2B3A;margin:0 0 10px">@lang('messages.tan_title')</h3>
      <p style="font-size:13px;color:#4A6375;line-height:1.85;margin:0">@lang('messages.tan_desc')</p>
    </div>
    <div style="background:#fff;border-radius:12px;padding:28px;border:1px solid rgba(107,174,214,.15)">
      <div style="width:44px;height:44px;border-radius:10px;background:rgba(107,174,214,.12);display:flex;align-items:center;justify-content:center;font-size:20px;margin-bottom:16px">🍃</div>
      <h3 class="serif" style="font-size:18px;font-weight:600;color:#1C2B3A;margin:0 0 10px">@lang('messages.cut_title')</h3>
      <p style="font-size:13px;color:#4A6375;line-height:1.85;margin:0">@lang('messages.cut_desc')</p>
    </div>
    <div style="background:#fff;border-radius:12px;padding:28px;border:1px solid rgba(107,174,214,.15)">
      <div style="width:44px;height:44px;border-radius:10px;background:rgba(107,174,214,.12);display:flex;align-items:center;justify-content:center;font-size:20px;margin-bottom:16px">📦</div>
      <h3 class="serif" style="font-size:18px;font-weight:600;color:#1C2B3A;margin:0 0 10px">@lang('messages.stitch_title')</h3>
      <p style="font-size:13px;color:#4A6375;line-height:1.85;margin:0">@lang('messages.stitch_desc')</p>
    </div>
    </div>
  </div>
</section>

<section style="position:relative;min-height:340px;display:flex;align-items:center;justify-content:center;overflow:hidden">
  <div style="position:absolute;inset:0;background-image:url('/IMAGE/PATAH SAMBUNG.jpeg');background-size:cover;background-position:center;opacity:.4"></div>
  <div style="position:absolute;inset:0;background:linear-gradient(135deg,rgba(8,14,24,.9),rgba(10,18,30,.78))"></div>
  <div style="position:relative;z-index:2;text-align:center;padding:0 20px;max-width:520px">
    <p style="font-size:11px;font-weight:600;letter-spacing:.3em;text-transform:uppercase;color:#6BAED6;margin:0 0 16px">@lang('messages.beauty_sub')</p>
    <h2 class="serif" style="font-size:clamp(1.8rem,3.5vw,2.8rem);color:#fff;font-weight:700;margin:0 0 24px">@lang('messages.beauty_title')</h2>
    <a href="{{ route('product') }}" style="display:inline-block;padding:13px 32px;font-size:11px;font-weight:600;letter-spacing:.12em;text-transform:uppercase;border-radius:100px;background:#6BAED6;color:#07111C;text-decoration:none">@lang('messages.nav_product')</a>
  </div>
</section>

@endsection
