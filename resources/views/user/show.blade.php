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
                    <h1>Hello, {{ucwords($user->name)}}</h1>
                </div>
                <div class="card-body border">
                    <div class="d-flex justify-content-between bg-light p-4 mb-3">
                        <h4 class="text-primary">About You</h4>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            @if (Auth::user()->id == $user->id)
                            <a href="{{url('/user/'.$user->id. '/edit')}}" class="btn btn-sm btn-info">Edit</a>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="{{asset('template/images/avatar-1.jpg')}}" alt="" class="img-thumbnail h-100">
                        </div>
                        <div class="col-sm">
                            <table class="table">
                                <tr>
                                    <th>Full Name</th>
                                    <td>: {{ucwords($user->profile->fullname)}}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>: {{$user->email}}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>: {{$user->profile->phone}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-body border">
                    <div class="p-4 bg-light">
                        <h4 class="text-primary">Biodata</h4>
                    </div>
                    <table class="table">
                        <tr>
                            <th>Address</th>
                            <td>: {{$user->profile->address}}</td>
                        </tr>
                        <tr>
                            <th>Village</th>
                            <td>: 
                                @if ($user->profile->village)
                                    {{ucwords($user->profile->village->name)}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>District</th>
                            <td>: 
                                @if ($user->profile->district)
                                {{ucwords($user->profile->district->name)}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td>: 
                                @if ($user->profile->regency)
                                {{ucwords($user->profile->regency->name)}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Province</th>
                            <td>: 
                                @if ($user->profile->province)
                                {{ucwords($user->profile->province->name)}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Age</th>
                            <td>: 
                                @if ($user->profile->age)
                                    {{$user->profile->age}} <small class="text-muted">years old</small></td>
                                @else
                                    -
                                @endif
                        </tr>
                        <tr>
                            
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
