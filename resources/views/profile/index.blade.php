@extends('profile.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ucwords(Auth::user()->name)}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   Welcome to my profile <br>

                   <img src="{{url('../')}}/public/image/{{Auth::user()->avatar}}" width="100px" height="100px"><br>
                   <a href="{{url('/')}}/changePhoto">Change Avatar</a>

                   @foreach($userData as $uData)

                   <li >{{$uData->city}} - {{$uData->country}}</li>
                   <li >{{$uData->about}}</li>
                   @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
