@extends('master')

@section('title', 'Register Page')

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
        <a class="btn btn-prim" href="/register/id" role="button" style="margin-top: 30px; margin-bottom: 25px; padding: 5px 80px;">Bahasa</a>
        <a class="btn btn-prim" href="/register/en" role="button" style="margin-top: 30px; margin-bottom: 25px; padding: 5px 80px;">English</a>
    </div>
    <div class="container-fluid py-3 d-flex justify-content-center h-100 col-xl-8">
        <div class="card card-body text-white shadow" style="border-radius: 0.5rem;background-color:white; padding: 80px 120px">
            <form action="/register-process" method="post" class="mb-md-3" enctype="multipart/form-data" style="color:#141a47;font-weight:500; font-size: 18px;">

                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif

                @csrf
                <h2 class="fw-bold mb-5 text-uppercase text-center">@lang('regis.title')</h2>

                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="username">@lang('regis.inputTitle.username')</label>
                    <input type="name" name="username" id="username" class="form-control form px-5-control-lg" required style="background-color: #F9F5EB">
                    
                    @error('username')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="password">@lang('regis.inputTitle.password')</label>
                    <input type="password" name="password" id="password" class="form-control form px-5-control-lg" required style="background-color: #F9F5EB">
                    
                    @error('password')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="gender">@lang('regis.inputTitle.gender')</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="M" {{ old('gender')=='M' ? 'checked': '' }} style="background-color: #141a47">
                            <label class="form-check-label" for="male">@lang('regis.inputContent.male')</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="F" {{ old('gender')=='F' ? 'checked': '' }} style="background-color: #141a47">
                            <label class="form-check-label" for="female">@lang('regis.inputContent.female')</label>
                        </div>
                    </div>
                    @error('gender')
                        <div class="text-danger">
                        {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="profession">@lang('regis.inputTitle.profession')</label>
                    <input type="text" name="profession" id="profession" class="form-control form px-5-control-lg" required style="background-color: #F9F5EB">
                    
                    @error('profession')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <label class="form-label mb-3" for="field_of_work">@lang('regis.inputTitle.fow')</label>
                <div class="form-outline form-white mb-4">
                    @foreach ($field_of_works as $fow)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="fieldOfWork[{{$fow->id}}]" id="fieldOfWork[{{$fow->id}}]" value="{{$fow->id}}" style="background-color: #141a47">
                            <label class="form-check-label" for="{{$fow->id}}">{{$fow->field_name}}</label>
                        </div>
                    @endforeach
                    @error('fieldOfWork')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <label for="basic-url" class="form-label">@lang('regis.inputTitle.linkedIn')</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="linkedIn">https://www.linkedin.com/in/</span>
                    <input type="text" class="form-control" name="linkedIn" id="linkedIn" aria-describedby="basic-addon3" style="background-color: #F9F5EB">
                    @error('linkedIn')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="mobileNumber">@lang('regis.inputTitle.mobileNumber')</label>
                    <input type="number" name="mobileNumber" id="mobileNumber" class="form-control form px-5-control-lg" required style="background-color: #F9F5EB">
                    @error('mobileNumber')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="image">@lang('regis.inputTitle.userProfile')</label>
                    <input type="file" name="image" id="image" class="form-control-file">
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="labelPrice">@lang('regis.inputTitle.price')</label>
                    <div class="price">
                        IDR {{ number_format($prices) }}
                        <input type="hidden" name="price" value="{{$prices}}">
                    </div>
                </div>

                <div class="d-flex flex-column justify-content-between mt-4 ">
                    <button class="btn btn-prim btn-lg px-3" type="submit" style="color:white">@lang('regis.bt_register')</button>
                </div>
            </form>
        </div>
    </div>
@endsection
