<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Login V2</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login200">
				<form class="login100-form validate-form" method="POST" action="{{route('insert.user')}}">
                    @csrf
                    <a href="\"><span class="login100-form-title p-b-26">
						Bienvenue
                        </span></a>
                    <a href="\"><span class="login100-form-title p-b-48">
						<i> <img src="https://i.ibb.co/vq97771/3096988.png" width="55" height="55"></i>

                        </span></a>

                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    <br>
                    @error('f_registration_number')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                    <div class="wrap-input100 " >

                        Numéro d'inscription de la faculté
                        <input class="input100" type="text" name="f_registration_number" >
                    </div>
                    @error('name')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror    					<div class="wrap-input100 " >
                        Nom <input class="input100" type="text" name="name" >
                    </div>
                    @error('last_name')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                    <div class="wrap-input100 " >
                        Prenom <input class="input100" type="text" name="last_name" >
                    </div>
                    @error('Date_of_Birth')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror                    <div class="wrap-input100 " >
                        date de naissance <input class="input100" type="date" name="Date_of_Birth" >
                    </div>
                    @error('email')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror                    <div class="wrap-input100 " data-validate = "Valid email is: a@b.c">
                        Email <input class="input100" type="text" name="email" >
                    </div>
                    @error('password')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror                    <div class="wrap-input100 " data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                        Mot de passe	<input class="input100" type="password" name="password">

					</div>


					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
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
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
<script>
  <!--  function codeRegister() {
        var url =  '{{ route('VerificationCodeRegister') }}';
        var form = $('#forminscrit');

        $.easyAjax({
            url: url,
            type: 'POST',
            container: '#forminscrit',
            data: form.serialize()
        })
    }-->
</script>
</body>
</html>
