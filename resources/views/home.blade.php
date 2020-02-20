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

                <div class="card-header" >
                    <div class="col-sm-12 col-md-12">
                     <form method="post" action="{{url('/post')}}" enctype="multipart/form-data">
                         @csrf
                         <div class="form-group col-md-12">
                             <label for="inputContent">Post</label>
                             <input type="text" name="content"  class="form-control" id="inputContent", placeholder="Ban dang nghi gi?">
                         </div>
                         <div class="form-group col-md-6">
                            <label for="exampleFormControlFile">Image</label>
                            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile">
                         </div>
                        <button type="submit" class="btn btn-primary">Post</button>
                     </form>
                       
                </div>
               



                </div>
            </div>
        </div>
        <div class="col-md-12 pull-left">
              <?php
                $checkPost = DB::table('posts')->join('users','users.id','=','posts.user_id')->get();
                if($checkPost){
              ?>
              <div class="card">
                    <table class="table">
                    <div class="col-sm-12 col-md-12">
                        @foreach($posts as $p)

                        <div class="row" style="border-bottom:1px solid #ccc; margin-bottom:15px">
                            <div class="col-md-2 pull-left">
                                <img src="{{url('../')}}/public/image/{{$p->avatar}}"
                                width="80px" height="80px" class="img-rounded"/>
                            </div>

                            <div class="col-md-7 pull-left">
                                <h4 style="margin:0px;"><a href="{{url('/profile')}}/{{$p->slug}}">
                                  {{ucwords($p->name)}}</a></h4>
                                <p><i class="fa fa-globe"></i> {{$p->content}}
                                <p>
                                    <img src="{{url('../')}}/public/image/post_img/{{$p->image}}"
                                    width="200px" height="200px" class="img-rounded"/>
                                </p>

                            </div>

                            <div class="col-md-3 pull-right">
                                <p>{{$p->created_at}}</p>
                              
                            </div>

                        </div>
                        @endforeach
                    </div>
                </table>
              </div>
              <?php } ?>
               
        </div>
    </div>
</div>
@endsection