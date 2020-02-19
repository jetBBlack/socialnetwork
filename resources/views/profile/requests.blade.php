@extends('profile.master')

@section('content')

<div class="container">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{url('/profile')}}/{{Auth::user()->slug}}">Profile</a></li>
        <li class="breadcrumb-item"><a href="">My Request</a></li>
    </ol>
    </nav>



    <div class="row">
        @include('profile.sidebar')


        <div class="col-md-9">
            <div class="card">
                <div  style="background-color : #DEB887" class="card-header">{{Auth::user()->name}}</div>

                <div class="panel-body">
                    <div class="col-sm-12 col-md-12">
                        @foreach($FriendRequests as $fList)

                        <div class="row" style="border-bottom:1px solid #ccc; margin-bottom:15px">
                            <div class="col-md-2 pull-left">
                                <img src="{{url('../')}}/public/image/{{$fList->avatar}}"
                                width="80px" height="80px" class="img-rounded"/>
                            </div>

                            <div class="col-md-7 pull-left">
                                <h3 style="margin:0px;"><a href="{{url('/profile')}}/{{$fList->slug}}">
                                  {{ucwords($fList->name)}}</a></h3>
                                <p><i class="fa fa-globe"></i> <b>Email:</b> {{$fList->email}} </p>
                                <p><i class="fa fa-globe"></i> <b>Gender:</b> {{$fList->gender}}</p>

                            </div>

                            <div class="col-md-3 pull-right">
                           		@if (session()->has('error'))
                            		<p>
                            			{{ session('error') }}
                            		</p>
                            	
                            	@else
                                <p>
                                        <a  style="margin-top: 15px;" href="{{url('/accept')}}/{{$fList->id}}"  class="btn btn-info btn-sm">Confirm </a>

                                        <a  style="margin-top: 15px;" href="#"  class="btn btn-default btn-sm">Remove</a>

                                </p>
                               	@endif
                            </div>

                        </div>
                        @endforeach
                    </div>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection