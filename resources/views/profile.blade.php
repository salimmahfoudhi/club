<!-- <html>
<head>



</head>-->
@extends('layouts.front')

@section('content')


<body>

<main id="main">
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div>
                <?php //var_dump($roles); ?>
                    @foreach($etudiants as $etudiant)
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">




                                <div class="m-b-25 " >

                                    <img class="imgprofile" src="{{$etudiant['personal_image']}} "  width="100" height="100" alt=""  >
                                </div>

                                <h6 class="f-w-600">{{ $etudiant['name']  }} {{ $etudiant['last_name']  }}</h6>


                                    @foreach($roles as $role)
                                            @foreach($roleusers as $roleuser)
                                               @if($roleuser['role_id']==$role['id'])
                                        <p>   {{$role['name']}}</p>

                                                  @endif

                                    @endforeach
                                    @endforeach






                                 <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>

                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400">{{$etudiant['email']}} </h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Phone</p>
                                        <h6 class="text-muted f-w-400">{{$etudiant['phone_number']}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Date de naissance</p>
                                        <h6 class="text-muted f-w-400">{{$etudiant['Date_of_Birth']}} </h6>
                                    </div>

                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600"></h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Description </p>
                                        <h6 class="text-muted f-w-400">{{$etudiant['description']}}</h6>
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
                    @endforeach
            </div>
        </div>
    </div>
</div>


</main><!-- End #main -->
</body>

@endsection


