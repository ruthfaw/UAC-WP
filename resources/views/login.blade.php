@extends('master')

@section('title', 'Login Page')

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
        <a class="btn btn-prim" href="/login/id" role="button" style="margin-top: 30px; margin-bottom: 25px; padding: 5px 80px;">Bahasa</a>
        <a class="btn btn-prim" href="/login/en" role="button" style="margin-top: 30px; margin-bottom: 25px; padding: 5px 80px;">English</a>
    </div>
    <div class="container-fluid py-3 d-flex justify-content-center h-100 col-xl-8">
        <div class="card card-body text-white shadow" style="border-radius: 0.5rem;background-color:white;padding: 80px 120px">
            <form action="/login-process" method="post" class="mb-md-3" enctype="multipart/form-data" style="color: #396854;font-weight:500; font-size: 18px;">

                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif

                @csrf
                <h2 class="fw-bold mb-5 text-uppercase text-center" style="color:#141a47;">@lang('login.title')</h2>

                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="username" style="color:#141a47;">@lang('login.username')</label>
                    <input type="name" name="username" id="username" class="form-control form px-5-control-lg" required style="background-color: #F9F5EB">
                    @error('username')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="password" style="color:#141a47;">@lang('login.password')</label>
                    <input type="password" name="password" id="password" class="form-control form px-5-control-lg" required style="background-color: #F9F5EB">
                    @error('password')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-outline form-white mb-4">
                    <input type="checkbox" name="remember_me" id="remember_me" class="form-check-input" style="background-color:#141a47"
                        @if (old('remember_me'))
                            checked
                        @endif
                    >
                    <label for="remember_me" style="color:#141a47;"> @lang('login.rm')</label>
                </div>

                <div class="d-flex flex-column justify-content-between mt-4 ">
                    <button class="btn btn-prim btn-lg px-3" type="submit">@lang('login.login_bt')</button>
                </div>
            </form>

            <div class="text-center">
                <p class="mb-0">
                    <a href="/register" class="fw-bold" style="color:#141a47;">@lang('login.regis_link')</a>
                </p>
            </div>
        </div>
    </div>
@endsection