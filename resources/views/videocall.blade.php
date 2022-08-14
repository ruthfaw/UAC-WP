@extends('master')

@section('title', 'Top-Up Page')

@section('content')
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
        <a class="btn btn-prim" href="/videocall/id" role="button" style="margin-top: 30px; margin-bottom: 25px; padding: 5px 80px;">Bahasa</a>
        <a class="btn btn-prim" href="/videocall/en" role="button" style="margin-top: 30px; margin-bottom: 25px; padding: 5px 80px;">English</a>
    </div>
    <div class="container-fluid py-3 d-flex justify-content-center h-100 col-xl-8">
        <div class="card card-body text-white shadow" style="border-radius: 0.5rem;background-color:white; padding: 80px 120px;margin-top:20px;">
            <div class="mb-md-3" style="color: #141a47;;font-weight:500; font-size: 18px;">
                <h2 class="fw-bold mb-5 text-uppercase text-center">@lang('videocall.title')</h2>
                <label class="form-label">@lang('videocall.sub')</label>
                <div class="schedule" style="font-weight: 600px">
                    @if($day == 1)
                        <div class="day">@lang('videocall.time.day')</div>
                    @else
                        <div class="day">@lang('videocall.time.day2')</div>
                    @endif
                    <div class="date">@lang('videocall.time.date') : {{$date}}/{{$month}}/2022</div>
                    <div class="clock">
                        @if($clock < 10)
                            @lang('videocall.time.time') : 0{{$clock}}.00 WIB
                        @else
                            @lang('videocall.time.time') : {{$clock}}.00 WIB
                        @endif
                    </div>   
                </div>
                <label class="form-label" style="margin-top:30px">Zoom</label>
                <div class="zoom-link">
                    <a href="" style="text-decoration: none;color: #141a47;">https://us06web.zoom.us/j/8937354925?pwd=QlJacUhLVmNwZTJscTRZSXdrMDlkQT09</a>
                </div>
                <div class="notes">

                </div>
            </div>
        </div>
    </div>
@endsection