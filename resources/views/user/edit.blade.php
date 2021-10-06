@extends('layouts.app')

@section('content')

        <h1 class="h3 mb-3">Settings</h1>
        @if (Session::get('sukses'))
        <div class="row">
            <div class="col-sm-12">
                <div class="card bg-light" id="alert">
                    <div class="card-body">
                        <div class="alert alert-success alert-dismissible fade show p-3" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>{{Session::get('sukses')}}</strong> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-md-3 col-xl-2">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Profile Settings</h5>
                    </div>
                    <div class="list-group list-group-flush" role="tablist">
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account" role="tab">
                            Account
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#password" role="tab">
                            Password
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#" role="tab">
                            Privacy and safety
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#" role="tab">
                            Email notifications
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#" role="tab">
                            Web notifications
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#" role="tab">
                            Widgets
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#" role="tab">
                            Your data
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#" role="tab">
                            Delete account
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-9 col-xl-10">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="account" role="tabpanel">

                        <div class="card">
                            <div class="card-header">

                                <h5 class="card-title mb-0">Public info</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <form action="{{url('user/'. $profile->id)}}" method="POST">
                                            @csrf
                                            @method('put')
                                            <div class="mb-3">
                                                <label class="form-label" for="inputUsername">Username</label>
                                                <input type="text" class="form-control" name="name" id="inputUsername" placeholder="Username" value="{{$profile->user->name}}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="inputEmail">Email</label>
                                                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Username" value="{{$profile->user->email}}">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </form>
                                    </div>
                                    <div class="col-md-4">
                                        <form action="{{url('profile/upload'. $profile->id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="text-center">
                                                @if ($profile->photo)
                                                <img alt="{{$profile->firstname}}" src="{{asset('template/img/avatars/'. $profile->photo)}}" class="rounded-circle img-responsive mt-2" width="128" height="128" id="img-profile"/>
                                                @else
                                                <div id="profileImage" class="m-auto"></div>
                                                @endif
                                                <div class="mt-2">
                                                    <button class="btn btn-primary" id="btn-img-browse" type="submit">
                                                        <i class="fas fa-upload"></i> 
                                                        Upload
                                                    </button>
                                                </div>
                                                <small>For best results, use an image at least 128px by 128px in .jpg format</small>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Private info</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{url('profile/'. $profile->id)}}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="firstname">First name</label>
                                            <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Your First name" value="{{$profile->firstname}}">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="lastname">Last name</label>
                                            <input type="text"  name="lastname" class="form-control" id="lastname" placeholder="Your Last name" value="{{$profile->lastname}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-sm-6">
                                            <label class="form-label" for="inputAge">Age</label>
                                            <input type="number" name="age" class="form-control" id="inputAge" placeholder="example: 26" value="{{$profile->age}}">
                                        </div>
                                        <div class="mb-3 col-sm-6">
                                              <label for="gender"  class="form-label">Gender</label>
                                              <select class="form-control" name="gender" id="gender">
                                                <option value="">Choose Your Gender</option>
                                                <option @if($profile->gender == 'male') selected @endif>Male</option>
                                                <option @if($profile->gender == 'female') selected @endif>Female</option>
                                              </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-6 mb-3">
                                          <label for="address" class="form-label">Address</label>
                                          <input type="text" class="form-control" name="address" id="address" placeholder="Your Detail Address or Street"  value="{{$profile->address}}">
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label for="village" class="form-label">Village</label>
                                            <select class="form-control" name="village" id="village">
                                                <option>Choose Your Village</option>
                                                @foreach ($villages as $village)
                                                <option value="{{$village->id}}" @if($profile->village_id == $village->id) selected @endif>
                                                    {{$village->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-4">
                                            <div class="form-group">
                                              <label for="province"  class="form-label">Province</label>
                                              <select class="form-control" name="province" id="province">
                                                <option>Choose Your Province</option>
                                                @foreach ($provinces as $province)
                                                <option value="{{$province->id}}" @if($profile->province_id == $province->id) selected @endif>
                                                    {{$province->name}}
                                                </option>
                                                @endforeach
                                              </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label class="form-label" for="inputState">City</label>
                                            <select id="inputState" class="form-control" name="regency">
                                                <option selected>Choose Your City</option>
                                                @foreach ($regencies as $regency)
                                                <option value="{{$regency->id}}" @if($profile->regency_id == $regency->id) selected @endif>
                                                    {{$regency->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label for="district" class="form-label">District</label>
                                            <select class="form-control" name="district" id="district">
                                                <option>Choose Your District</option>
                                                @foreach ($districts as $district)
                                                <option value="{{$district->id}}" @if($profile->district_id == $district->id) selected @endif>
                                                    {{$district->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-sm">
                                            <label class="form-label" for="inputUsername">Bio</label>
                                            <textarea rows="2" class="form-control" name="bio" id="inputBio" placeholder="Tell something about yourself">{{$profile->bio}}</textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </form>

                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="password" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Password</h5>

                                <form>
                                    <div class="mb-3">
                                        <label class="form-label" for="inputPasswordCurrent">Current password</label>
                                        <input type="password" class="form-control" id="inputPasswordCurrent">
                                        <small><a href="#">Forgot your password?</a></small>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="inputPasswordNew">New password</label>
                                        <input type="password" class="form-control" id="inputPasswordNew">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="inputPasswordNew2">Verify password</label>
                                        <input type="password" class="form-control" id="inputPasswordNew2">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('css')
<style>
    #profileImage {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background: #512DA8;
        font-size: 35px;
        color: #fff;
        text-align: center;
        line-height: 150px;
        margin: 20px 0;
    }
</style>
@endsection

@push('script')
    <script>
        $(".alert").alert();
        $("#alert").click(function (e) { 
            $("#alert").hide();
        });

        const firstName = {!! json_encode($profile->firstname) !!};
        const lastName = {!! json_encode($profile->lastname) !!};
        const intials = firstName.charAt(0);
        const profileImage = $('#profileImage').text(intials);

    </script>
@endpush
