@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center">
            <div class="col-sm-10">
                @if (Session::get('sukses'))
                        <div class="alert alert-success alert-dismissible fade show p-3 w-25" role="alert" style="position: fixed; top: 50%; left:50%; z-index: 9999999">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>{{Session::get('sukses')}}</strong>
                        </div>
                @endif
                <div class="card">
                    <div class="card-body d-flex justify-content-between">
                        <h1 class="card-title">Home</h1>
                        <a href="{{url('post/create')}}" class="btn btn-primary"><i class="" data-feather="plus"></i></a>
                    </div>
                </div>
                @foreach ($posts as $post)

                <div class="card" id="card_{{$post->id}}">
                    <div class="card-header d-flex justify-content-between border-bottom">
                        <div class="card-title">
                            <a href="{{url('/user/'. $post->user->id) }}" style="text-decoration: none" class="text-primary">
                                @if ($post->user->profile->photo)
                                <img src="{{asset('foto/'. $post->user->profile->photo)}}" class="rounded-circle me-2" width="50px">
                                @else
                                <img src="{{asset('template/img/avatars/avatar-2.jpg')}}" class="rounded-circle me-2" width="50px">
                                @endif
                                <b>@ {{$post->user->name}}</b>
                            </a>
                        </div>
                        @if (Auth::user()->id  == $post->user_id)
                        <div class="">
                            <a href="{{url('/post/'.$post->id.'/edit')}}" class="text-primary"><i class="align-middle" data-feather="edit"></i></a>
                            <a href="{{url('post/'. $post->id)}}" class="text-danger" onclick="event.preventDefault();
                                document.getElementById('hapus').submit();"><i class="align-middle" data-feather="delete"></i>
                            </a>
                            <form id="hapus" action="{{url('post/'.$post->id)}}" method="POST" class="d-none">
                                @csrf @method("delete")
                            </form>
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
                            <a href="#" class="btn btn-sm btn-primary">{{$post->like->count()}} like</a>
                            <a href="{{url('like/'. $post->id )}}" class="btn btn-sm btn-primary">like</a>

                            <form action="{{url('comment/add/')}}" method="POST">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                    <input type="text" class="form-control" name="isi" placeholder="create comment ..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <button class="btn btn-sm btn-primary" type="submit">send</button>
                                </div>
                            </form>
                        </p>
                        <div class="collapse" id="collapse{{$post->id}}">
                            @foreach ($post->comment as $comment)
                            <div class="card card-body p-2">
                                <div class="row mb-1">
                                    <div class="col">
                                        <img src="{{asset('foto/' . $comment->user->profile->photo)}}" class="rounded-circle me-2" width="30px">
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
        $(".alert").alert();
        $("#alert").click(function (e) {
            $("#alert").hide();
        });

    </script>
@endpush
