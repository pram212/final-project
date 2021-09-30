@extends('layouts.app')

@section('content')
    @if (Session::get('sukses'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>{{Session::get('sukses')}}</strong> 
        </div>
        
        <script>
          $(".alert").alert();
        </script>
    @endif
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-header border">
                    <h1>Updating Your Profile</h1>
                </div>
                <div class="card-body border">
                    <div class="d-flex justify-content-between bg-light p-4 mb-3">
                        <h4 class="text-primary">About You</h4>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{url('user/'. $user->id)}}" class="text-info">Go Back</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 text-center">
                            <img src="{{asset('template/images/avatar-1.jpg')}}" alt="" class="img-thumbnail w-75">
                        </div>
                        <div class="col-sm">
                            <form action="{{url('user/'. $user->id)}}" method="POST">
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="fullname">Fullname :</label>
                                        <input type="text" name="fullname" id="fullname" class="form-control rounded" value="{{$user->fullname}}" autofocus>
                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                    </div>
                                    <div class="col">
                                        <label for="name">Username :</label>
                                        <input type="text" name="name" id="name" class="form-control rounded" value="{{$user->name}}">
                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}    
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="email">Email :</label>
                                        <input type="email" name="email" id="email" class="form-control rounded" value="{{$user->email}}">
                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                    </div>
                                    <div class="col">
                                          <label for="age">Age :</label>
                                          <input type="text" class="form-control rounded" name="age" id="age" value="{{$user->age}}">
                                          {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="address">Street/Village :</label>
                                        <input type="text" name="address" id="address" class="form-control rounded" value="">
                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                    </div>
                                    <div class="col">
                                          <label for="">District :</label>
                                          <input type="text" class="form-control rounded" name="" id="" value="">
                                          {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="city">City :</label>
                                        <input type="text" name="city" id="city" class="form-control rounded" value="">
                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                    </div>
                                    <div class="col">
                                          <label for="">Province :</label>
                                          <input type="text" class="form-control rounded" name="" id="" value="">
                                          {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Done</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
