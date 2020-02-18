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

                   Edit my profile <br>

                   <img src="{{url('../')}}/public/image/{{Auth::user()->avatar}}" width="100px" height="100px"><br>
                   <a href="{{url('/')}}/changePhoto">Change Avatar</a>

                  

                <div class="col-sm-12 col-md-12">


                        <form action="{{url('/updateProfile')}}" method="post">
                            @csrf
                            <input type="hidden" name="_token" />

                            <div class="col-md-6">

                                <div class="input-group">
                                    <span  id="basic-addon1">City Name</span>
                                    <input type="text" class="form-control" placeholder="City Name" name="city" value="{{$data->city}}">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span  id="basic-addon1">Country Name</span>
                                    <input type="text" class="form-control" placeholder="Country Name" name="country" value="{{$data->country}}">
                                </div>


                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <span  id="basic-addon1">About</span>
                                    <textarea type="text" class="form-control" name="about">{{$data->about}}</textarea>
                                </div>

                                <br>

                                <div class="input-group">

                                    <input type="submit" class="btn btn-success pull-right" >
                                </div>
                            </div>

                        </form>






                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
