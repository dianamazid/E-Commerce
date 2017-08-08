<?php
session_start();
if(isset($_GET['id'])){
    session_destroy();
    header('Location: about.php');
exit;
}
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
if(isset($_SESSION["user"])){
    $user = $_SESSION["user"];

}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>About Us</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Background color --> 
    <style type="text/css"> 
    	body {
		background: #ffd699;
		padding-top: 30px;
		padding-bottom: 30px;
	}
    </style>


</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">The Carpool Company</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php

                if(isset($user)){
                    echo "Logged in as " . $user;
                    $_SESSION["user"] = $user;
                ?>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                     <li>
                        <a href="about.php?id=logout">Log out</a>
                    </li>
                    <?php
                    }
                    else{
                    ?>
                     <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="signin.php">Sign In</a>
                    </li>
                    <li>
                        <a href="signup.php">Sign Up</a>
                    </li>
                    <?php
                    }?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">About Us</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">About</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Intro Content -->
        <div class="row">
            <div class="col-md-6">
                <img class="img-responsive" src="rotunda.jpg" alt="">
            </div>
            <div class="col-md-6">
		<h2>About The Carpool Company</h2> 
		<h3><i> Let's Play Pick-Up! </i></h3>  
			<div class="media">
				<div class="media-left media-top">
				<span class="glyphicon glyphicon-sunglasses" aria-hidden="true"></span>	
			</div>
			<div class="media-body">
			     <h4 class="media-heading">What we do:</h4>
				<p> 
The Carpool Company is a carpool service for UVA students to find rides to and from a selected location. This allows students without cars to find rides home during the holidays or breaks, along with rides to visit other friends at other schools. 				
				</p>
			</div>
		    	</div>

			<div class="media">
			<div class="media-left media-top">
				<span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>	
			</div>
			<div class="media-body">
			     <h4 class="media-heading">How we do it:</h4>
				<p> 
The Carpool Company contains profiles for every user so that the drivers and riders are able to rate their ride based on conversation, safeness, punctuality, etc. Drivers not only post availability for spots and the time they are leaving, but also the price they will be charging each passenger to help compensate for gas.					</p>
			</div>
		    	</div>

			<div class="media">
				<div class="media-left media-top">
				<span class="glyphicon glyphicon-sunglasses" aria-hidden="true"></span>	
			</div>
			<div class="media-body">
			     <h4 class="media-heading">Who we are:</h4>
				<p> 
Our company values honesty, integrity, and an all-around fun environment. Sign up now and become a part of reducing traffic, saving money, and making new friends!	
				</p>
			</div>
		    	</div>
		<a class="btn btn-primary btn-lg" href="signup.php" > Sign Up Now!</a>
            </div>
        </div>
        <!-- /.row -->

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
