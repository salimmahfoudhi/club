<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
            <?php //$user = \Illuminate\Support\Facades\Auth::user(); var_dump($user);   $id = \Illuminate\Support\Facades\Auth::id(); echo $id;?>
<?php if (Auth::check()) {  

$user = Auth::user();
$name = $user->name;
$last_name = $user->last_name;
$personal_image = $user->personal_image;
$national_identity_card = $user->national_identity_card;
			?>
	<h6 style="color:#fff;"><img src="{{ $personal_image }}" alt="{{$name }} {{$last_name }}" style="height:25px;float:left;border-radius:50%;margin-right:15px;"/>Bonjour {{$name }} {{$last_name }}</h6>     
             
<?php }else{  ?>
	<h6><i class="bi bi-box-arrow-in-right"><a href="/login"> Login&emsp;</a></i></h6>
	<h6>  <i><a href="\inscrire">S'inscrire</a></i> </h6>
<?php }  ?>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
    </div>
    <br>
    <br>


</section>

<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

        <div class="logo">
            <h1><a href="/">Clubii</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="/">Accueil</a></li>
<!-- class="active"-->

                <li><a href="/evenments">Evenements</a></li>
                <li><a href="/formations">Formations</a></li>
                <li><a  href="/etudiants">Etudiants</a></li>

                <li><a href="/clubs">Clubs</a></li>
                <li><a href="contact.html">Contact</a></li>
				<?php if (Auth::check()) {  ?>
				
<?php
$statut = 0;
$clubs = DB::table('clubs')
->where('cin_leader', $national_identity_card)
->get();
$count = count($clubs);
foreach ($clubs as $club){
			$statut     =  $club->statut;
}
 

?>

		  <li class="dropdown"><a href="#"><span>Mon compte</span> <i class="bi bi-chevron-down"></i></a> 
            <ul>
              <li><a href="/monprofil">Mon profil</a></li>
			  <li><a href="/cv">Mon CV</a></li>
			  <?php if ($statut==1){ ?>
			  <li><a href="/admin" target="_blank">Gérer votre club</a></li>
			  <?php }else{?>
			  <li><a href="/creationclub">Créer votre club</a></li>
			  <?php } ?>
			  
			   
			  <li><a href="/logout">Se déconnecter</a></li>
            </ul>
          </li>
		  <?php } ?>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
