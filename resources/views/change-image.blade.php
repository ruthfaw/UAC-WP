@extends('master')

@section('title', 'Visibility Setting')

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
        <a class="btn btn-prim" href="/visibility-setting/id" role="button" style="margin-top: 30px; margin-bottom: 25px; padding: 5px 80px;">Bahasa</a>
        <a class="btn btn-prim" href="/visibility-setting/en" role="button" style="margin-top: 30px; margin-bottom: 25px; padding: 5px 80px;">English</a>
    </div>
    <div class="container-fluid d-flex justify-content-center h-90 col-xl-8 gap-5">
        <div class="card card-body shadow text-white" style="border-radius: 0.5rem;background-color:white; padding: 80px 120px;margin-top:35px;">
            <div class="mb-md-3" style="color: #141a47;font-weight:500; font-size: 18px;">
                <h2 class="fw-bold mb-5 text-uppercase text-center">@lang('visibility.title')</h2>
                <div class="d-flex flex-column justify-content-between mt-4 ">
                        @if($visibility == 1)
                            <label class="form-label" for="password" style="font-size:25px;margin-bottom:30px;">@lang('visibility.true')</label>
                        @else
                            <label class="form-label" for="password" style="font-size:25px;margin-bottom:30px;">@lang('visibility.false')</label>
                        @endif
                        <a class="btn btn-prim btn-lg px-3" href="/invisible" role="button" style="margin-top:5px;color:white">@lang('visibility.invisible')</a>
                        <a class="btn btn-prim btn-lg px-3" href="/visible" role="button" style="margin-top:30px;color:white">@lang('visibility.visible')</a>
                </div>
            </div>
        </div>
    </div>
@endsection

