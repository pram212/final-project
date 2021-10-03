@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-sm-10">
        <div class="card">

            <div class="card-header mb-0 border-bottom">
                <div class="card-title d-flex justify-content-between">
                    <h1>Updating Your Post</h1>
                    <a href="{{url('/home')}}">Go Back</a>
                </div>
            </div>

            <form action="{{url('/post')}}"  method="POST" enctype="multipart/form-data">
            @csrf @method('put')

            <div class="card-body">
                <div class="form-group">
                    <label for="tulisan" class="form-label">Tulisan</label>
                    <textarea class="form-control @error('tulisan') is-invalid @enderror" name="tulisan" id="tulisan" rows="3" autofocus>{{nl2br($post->tulisan)}}
                    </textarea>
                    @error('tulisan')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit">Update</button>
            </div>  

            </form>
        </div>
    </div>
</div>
    
@endsection