@extends('layouts.front')

@section('content')




    <main id="main">


	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login200">
				<form class="login100-form validate-form" enctype="multipart/form-data" action="/upateProfile" method="POST">

                    @csrf
<div class="row">
<div class="col-4">
		<div class="form-group mt-3">
					Photo : <input class="form-control" name="personal_image" type="file"  placeholder="Photo"    >
		</div>
		<img src="<?php if(isset($etudiant->personal_image)) { echo $etudiant->personal_image;}  ?>" style="width:100%;">
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

</div>
<div class="col-8">
			<?php if (Auth::check()) { $user = Auth::user(); $user_id = $user->id; } ?>
			<input type="hidden" name="id_user" value="{{ $user_id }}">
 
				<div class="form-group mt-3">
					Nom : <input class="form-control" name="name" type="text"  placeholder="Nom" required="" value="<?php if(isset($etudiant->name)) { echo $etudiant->name;}  ?>">
				</div>
				<div class="form-group mt-3">
					Prénom : <input class="form-control" name="last_name"  type="text" placeholder="Prénom" required="" value="<?php if(isset($etudiant->last_name)) { echo $etudiant->last_name;}  ?>">
				</div>
				<div class="form-group mt-3">
					E-mail : <input class="form-control" name="email"  type="email" placeholder="E-mail" required="" value="<?php if(isset($etudiant->email)) { echo $etudiant->email;}  ?>">
				</div>
				<div class="form-group mt-3">
					Mot de passe : <input class="form-control" name="password"  type="password" placeholder="Mot de passe"  >
					<p class="alert alert-success alert-block">Laissez vide si vous ne voulez pas changer le mot de passe</p>
				</div>
				<div class="form-group mt-3">
					Tél : <input class="form-control" name="phone_number"  type="text" placeholder="Tél"  value="<?php if(isset($etudiant->phone_number)) { echo $etudiant->phone_number;}  ?>">
				</div>


                   


					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
                           	<button id="save_user"  class="login100-form-btn">
                                   Enregistrer
                               </button>


                           </div>
                       </div> 
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
