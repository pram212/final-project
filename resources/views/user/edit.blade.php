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
                                @csrf
                                @method('put')
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="fullname">Fullname :</label>
                                        <input type="text" name="fullname" id="fullname" class="form-control rounded @error('fullname') is-invalid @enderror" value="{{$user->profile->fullname}}" autofocus>
                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                    </div>
                                    <div class="col">
                                        <label for="name">Username :</label>
                                        <input type="text" name="name" id="name" class="form-control rounded @error('name') is-invalid @enderror" value="{{$user->name}}">
                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}    
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="email">Email :</label>
                                        <input type="email" name="email" id="email" class="form-control rounded @error('email') is-invalid @enderror" value="{{$user->email}}">
                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                    </div>
                                    <div class="col">
                                          <label for="age">Age :</label>
                                          <input type="text" class="form-control rounded @error('age') is-invalid @enderror" name="age" id="age" value="{{$user->profile->age}}">
                                          {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="phone">Phone :</label>
                                        <input type="number" class="form-control rounded @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{$user->profile->phone}}">
                                        {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                                    </div>
                                    <div class="col">
                                        <label for="address">Address :</label>
                                        <input type="text" class="form-control rounded @error('address') is-invalid @enderror" name="address" id="address" value="{{$user->profile->address}}">
                                        {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                         <label for="province_id">Province :</label>
                                         <select class="form-control @error('province_id') is-invalid @enderror" name="province_id" id="province_id">
                                             @foreach ($province as $p)
                                                <option value="{{$p->id}}">{{$p->name}}</option>
                                             @endforeach
                                         </select>
                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                          <label for="regency_id">City :</label>
                                          <select class="form-control @error('regency_id') is-invalid @enderror" name="regency_id" id="regency_id">
                                            @foreach ($regency as $r)
                                                <option value="{{$r->id}}">{{$r->name}}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                       <div class="form-group">
                                         <label for="district_id">District :</label>
                                         <select class="form-control @error('district_id') is-invalid @enderror" name="district_id" id="district_id">
                                             @foreach ($district as $d)
                                             <option value="{{$d->id}}">{{$d->name}}</option>
                                             @endforeach
                                         </select>
                                       </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                          <label for="village_id">Village :</label>
                                          <select class="form-control @error('village_id') is-invalid @enderror" name="village_id" id="village_id">
                                              @foreach ($village as $v)
                                              <option value="{{$v->id}}">{{$v->name}}</option>
                                              @endforeach
                                          </select>
                                        </div>
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
