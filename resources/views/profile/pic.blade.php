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
                   <hr>

                  <form action="{{url('/')}}/uploadPhoto" method="post"  enctype="multipart/form-data">
                        <input type="hidden" name="_token"  value="{{csrf_token()}}"/>
                        <input type="file" name="avatar" class="form-control"/>
                        <input type="submit" name="btn" class="btn btn-success" />
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
