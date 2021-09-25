@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-sm-10">
        <div class="card">
            <div class="card-body">
                <form action="{{url('/post')}}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="tulisan">Postingan Baru</label>
                      <textarea class="form-control form-control-round @error('tulisan') is-invalid @enderror" name="tulisan" id="tulisan" rows="3" data-placeholder="Tulis sesuatu...">
                      </textarea>
                      @error('tulisan')
                          <small class="text-danger">{{$message}}</small>
                      @enderror
                    </div>
                    <button class="btn btn-sm btn-primary btn-rounded">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection