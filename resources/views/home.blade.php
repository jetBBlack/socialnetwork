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

                <div class="panel-header">
                    <div class="col-sm-12 col-md-12">
                     <form method="post" action="{{url('/post')}}">
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
    </div>
</div>
@endsection