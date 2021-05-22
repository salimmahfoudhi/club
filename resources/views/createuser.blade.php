@extends('layouts.front')

@section('content')




    <main id="main">


	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login200">
				<form id="userdata" class="login100-form validate-form"   >
                    @csrf


                    <div class="alert alert-success" role="alert" id="succes_msg" style="display: none">
                        Enregistré avec succès
                    </div>


                    <br>



                    <small id="national_identity_card_error" class="form-text text-danger"></small>
                   		<div class="wrap-input100 " >
                        CIN <input class="input100" type="text" name="national_identity_card" maxlength="8">
                    </div>


                    <small id="f_registration_number_error" class="form-text text-danger"></small>


                    <div class="wrap-input100 " >

                        Numéro d'inscription de la faculté
                        <input class="input100" type="text" name="f_registration_number" maxlength="8">
                    </div>

                    <small id="name_error" class="form-text text-danger"></small>
                    <div class="wrap-input100 " >
                        Nom <input class="input100" type="text" name="name" >
                        <div class="alert-message" id="nameError"></div>
                    </div>






                    <small id="last_name_error" class="form-text text-danger"></small>
                    <div class="wrap-input100 " >
                        Prenom <input class="input100" type="text" name="last_name" >
                    </div>

                    <small id="Date_of_Birth_error" class="form-text text-danger"></small>

                    <div class="wrap-input100 " >
                        date de naissance <input class="input100" type="date" name="Date_of_Birth" >
                    </div>


                    <small id="email_error" class="form-text text-danger"></small>

                                 <div class="wrap-input100 " data-validate = "Valid email is: a@b.c">
                        Email <input class="input100" type="email" name="email" >
                    </div>


                    <small id="password_error" class="form-text text-danger"></small>

                                       <div class="wrap-input100 " data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                        Mot de passe	<input class="input100" type="password" name="password">

					</div>


					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
                           	<button id="save_user"  class="login100-form-btn">
                                   S'inscrire
                               </button>


                           </div>
                       </div>




                       <div class="text-center p-t-115">
                           <span class="txt1">
                                   Vous avez de compte?
                           </span>


                           <a class="txt2" href="\login">
                               Connexion
                           </a>
                       </div>
                   </form>
               </div>
           </div>
       </div>


       <div id="dropDownSelect1"></div>

   <!--===============================================================================================-->


    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
   <script>
    $(document).on('click','#save_user',function (e){

    e.preventDefault();
        $('#f_registration_number_error').text('');
        $('#national_identity_card_error').text('');
        $('#name_error').text('');
        $('#last_name_error').text('');
        $('#Date_of_Birth_error').text('');
        $('#email_error').text('');
        $('#password_error').text('');

var formdata=new FormData ($('#userdata')[0]);
        $.ajax({
            type: 'POST',

            url: "{{route('ajax.SaveUser')}}",
            data:formdata,
            processData:false,
            contentType:false,
            cache:false,
                /*  {
                  '_token':"{{csrf_token()}}",
                'f_registration_number': $("input[name='f_registration_number']").val(),
                'national_identity_card': $("input[name='national_identity_card']").val(),

                'Date_of_Birth':$("input[name='Date_of_Birth']").val(),
                'name':$("input[name='name']").val(),
                'last_name':$("input[name='last_name']").val(),
                'email':$("input[name='email']").val(),
                'password':$("input[name='password']").val(),

    },*/
            success:function(data){




                if (data.status==true)
                   $('#succes_msg').show();




            },
            error:function (reject) {






                var response =$.parseJSON(reject.responseText);
                     $.each (response.errors, function (key, val) {
                      $("#" + key + "_error").text(val[0]);
                      });



            }
        });

    });


</script>


    </main>
@endsection
