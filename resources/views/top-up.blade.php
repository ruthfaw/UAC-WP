@extends('master')

@section('title', 'Top-Up Page')

@section('authenticated-form')
@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@elseif (session('warning'))
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
@elseif (session('danger'))
    <div class="alert alert-danger">
        {{ session('danger') }}
    </div>
@endif
    <div class="d-flex justify-content-center gap-4">
        <a class="btn btn-prim" href="/view-purchased-avatar/id" role="button" style="margin-top: 30px; margin-bottom: 25px; padding: 5px 80px;">Bahasa</a>
        <a class="btn btn-prim" href="/view-purchased-avatar/en" role="button" style="margin-top: 30px; margin-bottom: 25px; padding: 5px 80px;">English</a>
    </div>
    <div class="container-fluid d-flex justify-content-center h-100 col-xl-8" style="margin-bottom:80px;">
        <div class="card card-body text-white shadow" style="border-radius: 0.5rem;background-color:white; padding: 80px 120px;margin-top:35px;">
            <div class="mb-md-3" style="color: #141a47;font-weight:500; font-size: 18px;">
                <h2 class="fw-bold mb-5 text-uppercase text-center">@lang('topUp.title')</h2>
                <div class="d-flex flex-column justify-content-between mt-4">
                    {{-- <a href="/topUp-process"> --}}
                        <label class="form-label" for="password" style="font-size:25px;margin-bottom:30px;color:#141a47;">@lang('topUp.amt') : {{number_format($wallet)}} @lang('topUp.coin')</label>
                        <a class="btn btn-prim btn-lg px-3" href="/topUp-process" role="button" style="color:white;">@lang('topUp.topUp_bt')</a>
                    {{-- </a> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- <div class="d-flex flex-column justify-content-between mt-4 ">
    <button class="btn btn-prim btn-outline-dark btn-lg px-3" type="submit">Register</button>
</div> --}}