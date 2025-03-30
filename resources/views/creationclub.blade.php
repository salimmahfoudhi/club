@extends('layouts.front')

@section('content')




    <main id="main">


	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login200">
				<form  class="login100-form validate-form" action="/savecreationclub" method="POST" enctype="multipart/form-data">

                    @csrf
 

			<?php if (Auth::check()) { $user = Auth::user(); $user_id = $user->id; } ?>
			<input type="hidden" name="id_user" value="{{ $user_id }}">
 
				<div class="form-group mt-3">
					Nom du club : <input class="form-control" name="name" placeholder="Nom du club" required="" value="<?php if(isset($club->name)) { echo $club->name;}  ?>"> 
				</div>
				<div class="form-group mt-3">
					Description : <textarea class="form-control" name="description" rows="5" placeholder="Description" required=""><?php if(isset($club->description)) { echo $club->description;}  ?></textarea>
				</div>
				<div class="form-group mt-3">
					Logo : <input class="form-control" name="logo" type="file"  placeholder="Logo"    >
					<img src="<?php if(isset($club->logo)) { echo $club->logo;}  ?>" style="height:70px;">
				</div>
				<div class="form-group mt-3">
					Banner : <input class="form-control" name="banner" type="file"  placeholder="Banner"    >
					<img src="<?php if(isset($club->banner)) { echo $club->banner;}  ?>" style="height:70px;">
				</div>
				 

				 @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
         
        @endif
    
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
                   


					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
                           	<button id="save_user"  class="login100-form-btn">
                                   Envoyer
                               </button>


                           </div>
                       </div> 
                   </form>
               </div>
           </div>
       </div>


       <div id="dropDownSelect1"></div>

   <!--===============================================================================================-->


    </main>
@endsection
