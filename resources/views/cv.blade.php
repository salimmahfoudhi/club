@extends('layouts.front')

@section('content')




    <main id="main">


	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login200">
				<form id="userdata" class="login100-form validate-form" action="/saveCv" method="POST">

                    @csrf
 

			<?php if (Auth::check()) { $user = Auth::user(); $user_id = $user->id; } ?>
			<input type="hidden" name="id_user" value="{{ $user_id }}">
 
				<div class="form-group mt-3">
					A PROPOS DE MOI : <textarea class="form-control" name="apropos" rows="5" placeholder="A PROPOS DE MOI" required="" ><?php if(isset($cv->apropos)) { echo $cv->apropos;}  ?></textarea>
				</div>
				<div class="form-group mt-3">
					MES COMPETENCES : <textarea class="form-control" name="competences" rows="5" placeholder="MES COMPETENCES" required=""><?php if(isset($cv->competences)) { echo $cv->competences;}  ?></textarea>
				</div>
				<div class="form-group mt-3">
					EDUCATION : <textarea class="form-control" name="education" rows="5" placeholder="EDUCATION" required=""><?php if(isset($cv->education)) { echo $cv->education;}  ?></textarea>
				</div>
				<div class="form-group mt-3">
					EXPERIENCE : <textarea class="form-control" name="experience" rows="5" placeholder="EXPERIENCE" required=""><?php if(isset($cv->experience)) { echo $cv->experience;}  ?></textarea>
				</div>


                   


					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
                           	<button id="save_user"  class="login100-form-btn">
                                   Enregistrer
                               </button>


                           </div>
                       </div> 
                   </form>
               </div>
           </div>
       </div>


       <div id="dropDownSelect1"></div>

   <!--===============================================================================================-->


    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
   <script>
    $(document).on('click','#save_user0',function (e){

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
