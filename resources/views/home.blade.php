@extends('master')

@section('title', 'Home')

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
@include('search-bar')
<div class="users">
    
    <div class="d-flex justify-content-center gap-4">
        <a class="btn btn-prim" href="/home/id" role="button" style="margin-top: 20px; margin-bottom: 25px; padding: 5px 80px;">Bahasa</a>
        <a class="btn btn-prim" href="/home/en" role="button" style="margin-top: 20px; margin-bottom: 25px; padding: 5px 80px;">English</a>
    </div>
    
   
    <div class="d-flex justify-content-center">
        <h2 class="title">@lang('home.title')</h2>
        <div class="avatar px-2 dropdown align-self-center">
            <a href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside" style="font-size:25px;text-decoration:none;color:#141a47;">
                <span class="material-symbols-outlined">filter_list</span>
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/gender-filter/1">@lang('home.male')</a></li>
                <li><a class="dropdown-item" href="/gender-filter/2">@lang('home.female')</a></li>
            </ul>
        </div>
    </div>
    <div class="d-flex container justify-content-center flex-wrap">
       @foreach ($users as $user) 
        <a href="/details/{{$user->id}}-1" style="text-decoration: none">
        <div class="card border-2" style="color: #b6b1a4;background-color:#1C3879;margin: 25px 30px;box-shadow: 8px 8px">
            <img class="card-img-top p-3" src="/profileImage/{{$user->image}}" alt="Card image cap">
            <div class="card-body text-center">
                <h4 class="card-title" style="font-size: 25px">{{ $user->username }}</h4>
                <p class="card-text" style="font-size: 18px; font-weight:600">{{ $user->profession }}</p>
                <div class="userfield">
                    @foreach($userfields as $uf)
                        <p class="card-text" style="font-size: 15px; font-style: italic; font-weight:100">
                            @if($uf->user_id == $user->id)
                                {{$uf->fieldOfWork->field_name}}
                            @endif
                        </p>
                     @endforeach
                </div>
            </div>
        </div>
        </a>
       @endforeach
    </div>
</div>
@endsection