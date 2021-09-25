@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-header row">
                    <div class="col-sm-1 text-center">
                        <img src="{{asset('template/images/avatar-1.jpg')}}" class="img-fluid rounded-circle me-2 d-block" alt="" width="50">
                    </div>
                    <div class="col-sm-8">
                        @ {{Auth::user()->name}} <br>
                        <small class="text-info">2 minute ago</small>
                    </div>
                    <div class="col-sm-3 text-right">
                        <a href="#" class="text-secondary"><i class="ti-pencil-alt"></i></a> | <a href="#" class="text-danger"><i class="ti-trash"></i></a>
                    </div>
                </div>
                <div class="card-body border">
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
                <div class="card-block accordion-block">
                    <div id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="accordion-panel">
                            <div class="accordion-heading d-flex justify-content-between" role="tab" id="headingOne">
                                <div class="card-title accordion-title">
                                    <a class="accordion-msg" data-toggle="collapse"
                                    data-parent="#accordion" href="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    <span class="badge badge-primary">2 komentar</span>
                                    </a>
                                </div>
                                <a href="#" type="button" class="m-3 badge badge-info" data-toggle="modal" data-target="#staticBackdrop">2 like</a>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
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
    </div>
</div>
@endsection
