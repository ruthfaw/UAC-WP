@extends('master')

@section('title', 'Gender')

@section('content')

    <div class="d-flex container justify-content-center flex-wrap" style="margin-top: 30px">
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