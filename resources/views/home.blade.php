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
            @foreach ($posts as $post)
            <div class="card">
                <div class="card-header row">
                    <div class="col-sm-1 text-center">
                        <img src="{{asset('template/images/avatar-1.jpg')}}" class="img-fluid rounded-circle me-2 d-block" alt="" width="50">
                    </div>
                    <div class="col-sm-8">
                        @ {{$post->user->name}} <br>
                        <small class="text-info">{{date('d/m/y', strtotime($post->created_at))}}</small>
                    </div>
                    <div class="col-sm-3 text-right">
                        @if (Auth::user()->id == $post->user->id)
                            <a href="{{url('/post/' .$post->id .'/edit')}}" class="text-secondary"><i class="ti-pencil-alt"></i></a> | <a href="#" class="text-danger"><i class="ti-trash"></i></a>
                        @endif
                    </div>
                </div>
                <div class="card-body border">
                    <p class="card-text">{{$post->tulisan}}</p>
                </div>
                <div class="card-block accordion-block">
                    <div id="accordion{{$post->id}}" role="tablist" aria-multiselectable="true">
                        <div class="accordion-panel">
                            <div class="accordion-heading d-flex justify-content-between" role="tab" id="headingOne">
                                <div class="card-title accordion-title">
                                    <a class="accordion-msg" data-toggle="collapse"
                                    data-parent="#accordion{{$post->id}}" href="#collapse{{$post->id}}"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    <span class="badge badge-primary">2 komentar</span>
                                    </a>
                                </div>
                                <a href="#" type="button" class="m-3 badge badge-info" data-toggle="modal" data-target="#staticBackdrop">2 like</a>
                            </div>
                            <div id="collapse{{$post->id}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="accordion-content accordion-desc row">
                                    <div class="col-sm-1 text-center">
                                        <img src="{{asset('template/images/avatar-1.jpg')}}" class="img-fluid rounded-circle" alt="" width="25">
                                    </div>
                                    <div class="col-sm-10 bg-light p-1 rounded">
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque officia voluptatibus ea natus eius expedita, dolores beatae amet atque dolorem reprehenderit molestias earum. Inventore velit deleniti quam illo numquam dolorum!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
