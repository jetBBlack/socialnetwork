@extends('profile.master')

@section('content')

<div class="container">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{url('/profile')}}/{{Auth::user()->slug}}">Profile</a></li>
        <li class="breadcrumb-item"><a href="">Find Friends</a></li>
    </ol>
    </nav>



    <div class="row">
        @include('profile.sidebar')


        <div class="col-md-9">
            <div class="card">
                <div  style="background-color : #DEB887" class="card-header">{{Auth::user()->name}}</div>

                <div class="panel-body">
                    <div class="col-sm-12 col-md-12">
                        @foreach($allUsers as $uList)

                        <div class="row" style="border-bottom:1px solid #ccc; margin-bottom:15px">
                            <div class="col-md-2 pull-left">
                                <img src="{{url('../')}}/public/image/{{$uList->avatar}}"
                                width="80px" height="80px" class="img-rounded"/>
                            </div>

                            <div class="col-md-7 pull-left">
                                <h3 style="margin:0px;"><a href="{{url('/profile')}}/{{$uList->slug}}">
                                  {{ucwords($uList->name)}}</a></h3>
                                <p><i class="fa fa-globe"></i> {{$uList->city}}  - {{$uList->country}}</p>
                                <p>{{$uList->about}}</p>

                            </div>

                            <div class="col-md-3 pull-right">

                                <?php
                                $check = DB::table('friendships')
                                        ->where('user_requested', '=', $uList->id)
                                        ->where('requester', '=', Auth::user()->id)
                                        ->first();
                                if($check ==''){
                                ?>
                                   <p>
                                        <a style="margin-top: 10px;" href="{{url('/')}}/addFriend/{{$uList->id}}"
                                           class="btn btn-info btn-sm">Add to Friend</a>
                                    </p>
                                <?php } else {?>
                                    <p>Đã gửi lời mời kết bạn</p>
                                <?php }?>
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