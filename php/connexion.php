<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui, viewport-fit=cover"> 
    <meta name="apple-mobile-web-app-capable" content="yes">
	<link rel="icon" href="../images/favicon.png">
  
    <script src="../js/jquery-3.2.1.slim.min.js" ></script><!-- BOOTSTRAP -->
    <script src="../s/popper.min.js" ></script><!-- BOOTSTRAP -->  
    <script src="../js/bootstrap.min.js" ></script><!-- BOOTSTRAP -->
    <script src="../js/jquery-3.5.1.min.js" ></script><!-- JQUERY -->
	
	<link rel="stylesheet" href="../css/bootstrap.min.css"><!-- BOOTSTRAP -->

	
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital@0;1&display=swap" rel="stylesheet">


	<script src="../js/ea5c09adf8.js" ></script><!-- FONT AWESOME-->
    <link rel="stylesheet" href="../css/style.css" type="text/css"> 
    <link rel="stylesheet" href="../css/connexioninscri_style.css" type="text/css"> 
</head>

<body onload="increaseHeight()">
	<!-- -------------------------------------------- NAVBAR BEGIN ----------------------------------------------   -->
	<header>
		
		<div class=" shadow  mb-5  rounded">
			<nav class="fixed-top navbar navbar-expand-lg navbar-dark bg-dark row ">
				<div class="container-fluid" style="margin-left: 70px; margin-right: 70px;">
					<a class="navbar-brand" href="index.php"><img src="../images\binco.png" alt="BINCO"></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNavDropdown">
						<ul class="navbar-nav col-md-9">
							<li class="nav-item ">
								<a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Articles
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
									<a class="dropdown-item" href="articleshomme.php">Homme</a>
									<a class="dropdown-item" href="articlesfemme.php">Femme</a>
									<a class="dropdown-item" href="articlesenfant.php">Enfant</a>
								</div>
							</li>
							<li class="nav-item" >
								<a class="nav-link cont" href="#" >Contactez-Nous</a>
							</li>     			      			
						</ul>
						<ul class="col-md-3 navbar-nav" >
							<li class="nav-item" >
								<a class="nav-link" href="../inscription.html" >Inscription</a>
							</li>
							<li class="nav-item active" >
                                <a class="nav-link" href="../php/connexion.php" >Connexion</a>
							</li>   
						</ul>    	
					</div>
			</div>
			</nav>
		</div>
	</header>
<!-- -------------------------------------------- NAVBAR END ----------------------------------------------   -->
	
	
<!-- -------------------------------------------- Form BEGIN ----------------------------------------------   -->
<div class="formsection" id="formsection">
	<div class="container ">
		<div class="row">
			<div class="col-md-12 text-center nouv-title-style form-title-style" >Connectez-Vous</div> 
		</div><br>
            <div class="center text-center box-connexion shadow p-3 mb-5 bg-white rounded " id="box-connexion" style="height : 300px;">
                <div class="container">
                    <div class="space"></div>
                    
<?php 
    $con = MySQLi_connect("localhost","root","") ;
    MySQLi_select_db($con,"bincoDb") ;


    if(isset($_POST["email"])&&isset($_POST["email"]))
    {
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];


        $req = "select * from compte where email='$email' ";
        
        $res = MySQLi_query($con,$req);
        $e=mysqli_fetch_array($res);
        
        if (mysqli_num_rows($res) == 0){
            echo("<div class='alert alert-danger' id='al' >");
            echo( "Email n'existe pas");
            echo("</div>");
        }else if($e['mdp']!=$mdp){
            echo("<div class='alert alert-danger' id='al' >");
            echo( "Mot de passe incorrect");
            echo("</div>");
        }else{
            session_start();
            $_SESSION["nom"] = $e['nom'];
            $_SESSION["prenom"] = $e['prenom'];
            $_SESSION["email"] = $e['email'];
            $_SESSION["adresse"] = $e['adresse'];
            $_SESSION["mdp"] = $e['mdp'];
            $_SESSION["genre"] = $e['genre'];
            header('Location: http://localhost/p/php/index.php');
        }
    }
?>
                    
                    <form action="connexion.php" method="post" class="form-group">
                        <div class="space"></div>
                        <input type="email"  placeholder="E-mail" name="email"  class="form-control " id="mail"><br>
                        <input type="password" placeholder="Mot de passe" name="mdp" class="form-control " id="mdp"><br><br>
                        <input class="btn-submit" type="submit" value="Connexion">
                    </form>
                </div>
            </div>
	</div>
</div>
<!-- -------------------------------------------- Form END ----------------------------------------------   -->
<!-- -------------------------------------------- FOOTER BEGIN ----------------------------------------------   -->
<footer >
    <div class="topsidefooter container">
        <div class="row">
            <div  class="col-lg-4">
                <div class="footer_title">
                    Contact
                </div><br>
                <div class="subfooter" >
                    <i class="fas fa-map-marker-alt">&nbsp;</i>Stah Jeber ,<br>
                    Monastir, Tunisie<br>
                    <i class="fas fa-phone"></i> &nbsp;+216 12 345 678<br>
                    <i class="fas fa-envelope"></i> &nbsp; <u>contact@binco.com</u>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="footer_title">social</div>
                <div class="subfooter social_media row">
                    <div class="col-sm"><a href="https://example.com"><i class="fab fa-facebook-f fa-2x"></i></a></div>
                    <div class="col-sm"><a href="https://example.com"><i class="fab fa-instagram fa-2x"></i></a></div>
                    <div class="col-sm"><a href="https://example.com"><i class="fab fa-twitter fa-2x"></i></a></div>
                </div>
            </div >
            <div class="col-lg-4">
                <div class="footer_title">
                    développé par
                </div ><br>
                <div class="subfooter d-flex justify-content-center" >
                    <table >
                        <tr>
                            <td style="padding-right:15px;text-align: right;">Housssem</td>
                            <td style="padding-left:15px;text-align: left;" >Sakli</td>
                        </tr>
                        <tr>
                            <td style="padding-right:15px;text-align: right;">Ramez</td>
                            <td style="padding-left:15px;text-align: left;">Zormati</td>
                        </tr>
                        <tr>
                            <td  style="padding-right:15px;text-align: right;">Zinédine</td>
                            <td style="padding-left:15px;text-align: left;">Younsi</td>
                        </tr>
                        <tr>
                            <td  style="padding-right:15px;text-align: right;">Youssef</td>
                            <td style="padding-left:15px;text-align: left;">Jobrane</td>
                        </tr>
                    </table>
                </div>
            </div>		
        </div>
    </div>
    <div class="Copyright ">
        <span class="redcolor">B I N C O</span> <br> © Copyright 2021 
    </div>
    <a id="contactref"></a>
</footer>
<!-- -------------------------------------------- FOOTER END ----------------------------------------------   -->
<script>

    function increaseHeight()
    {
        if(document.getElementById("al").innerHTML=="Email n'existe pas"||document.getElementById("al").innerHTML=="Mot de passe incorrect")
        {
            x = parseInt(document.getElementById("box-connexion").style.height)+50;
            document.getElementById("box-connexion").style.height = x.toString()+"px";
            x = parseInt(document.getElementById("formsection").style.height)+50;
            document.getElementById("formsection").style.height = x.toString()+"px";
        }
        
    }

    $('.cont').click(function() {
        $('html,body').animate({
            scrollTop : $('#contactref').offset().top
        },1000);
    })
</script>
</body>
</html>