@extends('profile.master')

@section('content')



<div class="container">
    <nav aria-label="breadcrumb" >
    <ol class="breadcrumb">
        <li class="breadcrumb-item" ><a href="{{url('/home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{url('/profile')}}/{{Auth::user()->slug}}">Profile</a></li>

    </ol>
    </nav>
    <div class="row">

    @include('profile.sidebar')
    @foreach($userData as $uData)

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{$uData->name}}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <h3 align="center">{{$uData->name}}</h3>
                                <img src="{{url('../')}}/public/image/{{$uData->avatar}}" width="120px" height="120px" class="fix-img" />
                                <div class="caption">

                                    <p align="center">{{$uData->city}} - {{$uData->country}}</p>
                                    @if ($uData->user_id == Auth::user()->id)
                                    <p align="center"><a href="{{url('/editProfile')}}"
                                      class="btn btn-secondary" role="button">Edit Profile</a></p>
                                      @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <h4 class=""><span class="label label-default">About</span></h4>
                            <p> {{$uData->about}} </p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
