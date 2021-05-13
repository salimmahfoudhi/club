@extends('layouts.front')

@section('content')


    <body>

    <main id="main">
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="col-12">
        <div class="container d-flex justify-content-center">
            @foreach($clubs as $club)
            <div class="col-12">




                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class=" bg-c-lite-green user-profile">



                            <div class="card-block  text-white" style="background: url('{{$club['banner']}}') no-repeat top;min-height:400px;">



                                <div class="m-b-25" style="text-align:center;position:relative;top: 310px;">
                                    <img  src="{{$club['logo']}}" style="border-radius: 50%;border:2px solid #ccc;width:210px;">

                                </div>

                            </div>
                        </div>
                        <div class="">
                            <div class="card-block">
                                <div class="row" style="text-align: center;padding-top:50px;">
                                    <h6 class="f-w-600">{{$club['name']}}</h6>

                                    <p>Web Designer</p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                </div>
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email chef du club</p>
                                        @foreach($chefs as $chef)

                                           @if ($chef['id']==$club['cin_leader'])
                                            <h6 class="text-muted f-w-400">{{$chef['email']}}</h6>
                                            @endif

                                        @endforeach


                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Phone</p>
                                        <h6 class="text-muted f-w-400">98979989898</h6>
                                    </div>
                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Projects</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Recent</p>
                                        <h6 class="text-muted f-w-400">Sam Disuja</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Most Viewed</p>
                                        <h6 class="text-muted f-w-400">Dinoter husainm</h6>
                                    </div>
                                </div>
                                <ul class="social-link list-unstyled m-t-40 m-b-10">
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        </div>
    </div>
</div>

    </main><!-- End #main -->
    </body>

@endsection
