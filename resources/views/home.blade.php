@extends('layouts.app')

@section('content-title')
    Home
@endsection

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
        <div class="row d-flex justify-content-center">
            <div class="col-sm-10">
                @foreach ($posts as $post)
                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom">
                        <div class="card-title">
                            <a href="{{url('/user/'. $post->user->id) }}" style="text-decoration: none" class="text-primary">
                                <img src="{{asset('template/img/avatars/avatar-2.jpg')}}" class="rounded-circle me-2" width="50px">
                                <b>@ {{$post->user->name}}</b>
                            </a>
                        </div>
                        @if (Auth::user()->id  == $post->user_id)
                        <div class="">
                            <a href="{{url('/post/'.$post->id.'/edit')}}" class="btn btn-primary btn-sm">edit</a>
                            <a href="" class="btn btn-danger btn-sm">delete</a>
                        </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <p>{{nl2br($post->tulisan)}}</p>
                        <small class="text-muted">{{date('l, d M Y h:m', strtotime($post->created_at))}}</small>
                    </div>
                    @if ($post->comment->count() >= 0)

                    <div class="card-footer border-top bg-light">
                        <p>
                            <a class="btn btn-primary btn-sm" data-bs-toggle="collapse" href="#collapse{{$post->id}}" role="button" aria-expanded="false" aria-controls="collapse{{$post->id}}">
                                {{$post->comment->count()}} comments
                            </a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                add comment
                            </button>
                            <!-- Modal -->
                            
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <form action="" method="POST">
                                            @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">New Comment</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <textarea class="form-control" name="" id="" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">cancel</button>
                                            <button type="submit" class="btn btn-primary btn-sm">send</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
  
                        </p>
                        <div class="collapse" id="collapse{{$post->id}}">
                            @foreach ($post->comment as $comment)
                            <div class="card card-body p-2">
                                <div class="row mb-1">
                                    <div class="col">
                                        <img src="{{asset('template/img/avatars/avatar-2.jpg')}}" class="rounded-circle me-2" width="30px">
                                        <small>{{$comment->user->name}}</small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col ps-2" style="margin-left: 4%">
                                        {{$comment->isi}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
        
        // const accButton =  $(".accordion-header");
        // // console.log(accButton)
        // for (let i = 0; i < accButton.length; i++) {
        //     accButton[i].click(function (e) { 
        //         e.preventDefault()
        //         alert([i]);
        //     const accBody = $(".accordion-collapse");
        //         for (let j = 0; j < accBody.length; j++) {
        //             accBody[j].toggle();
        //             console.log(accBody[j]);
        //         } 
        //     });
            
        // }
    </script>
@endpush
