<!DOCTYPE html>
<html lang="en">
<head>
<?php
include 'dbconnect.php';
include 'newuser.php';
include 'signupemail.php';

if (isset($_POST["confirmsignup"])) {
	// connect to the ecomm database
	$conn = openCon();
	
	$fn 	= $_POST['firstname'];
	$ln 	= $_POST['lastname'];
	$email  = $_POST['email'];
	$pw	= $_POST['password'];
	$addr 	= $_POST['address'];
	$city 	= $_POST['city'];
	$st	= $_POST['state'];
	$zip	= $_POST['zip'];

	// check for field completeness	
	$complete=checkCompleteInput($fn, $ln, $email, $pw, $addr, $city, $st, $zip); 
	// validate user input
	$valid 	= checkValidInput($fn, $ln, $email, $city, $st, $zip);

	// check for previously created user
	$found = checkUserInput($conn, $email);

	if ($found) {
		echo '<script language="javascript">';
		echo 'alert("You have already registered!")';
		echo '</script>';

	} else if (!$valid) {
		echo '<script language="javascript">';
		echo 'alert("Fill in valid information only!")';
		echo '</script>';
	} else if($complete) {
		saveToDB($conn, $fn, $ln, $email, $pw, $addr, $city, $st, $zip);
		sendConfirmTo($email, $fn);
	} else {
		echo '<script language="javascript">';
		echo 'alert("Fill in all required blanks!")';
		echo '</script>';
	}
}
?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign Up</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                <a class="navbar-brand" href="index.html">The Carpool Company</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="about.html">About</a>

                    </li>
                    <li class="active">
                        <a href="#signup">Sign Up</a>
                    </li>
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
                <h1 class="page-header">Register for an Account</h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Registration</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
 	<form action="signup.php" method="POST" class="form-horizontal">
		<fieldset>
		<!-- Sign Up Form -->
		    <!-- Text input-->
		    <div class="control-group">
		      <label class="control-label" for="firstname">First Name:</label>
		      <div class="controls">
			<input id="firstname" name="firstname" class="form-control" type="text" placeholder="John" class="input-large" required="">
		      </div>
		    </div>

		    <!-- Text input-->
		    <div class="control-group">
		      <label class="control-label" for="lastname">Last Name:</label>
		      <div class="controls">
			<input id="lastname" name="lastname" class="form-control" type="text" placeholder="Doe" class="input-large" required="">
		      </div>
		    </div>

		    
		    <!-- Text input-->
		    <div class="control-group">
		      <label class="control-label" for="email">Email:</label>
		      <div class="controls">
			<input id="email" name="email" class="form-control" type="text" placeholder="user@domain.com" class="input-large" required="">
		      </div>
		    </div>
		    
		    <!-- Text input-->
		    <div class="control-group">
		      <label class="control-label" for="address">Street Address:</label>
		      <div class="controls">
			<input id="address" name="address" class="form-control" type="text" placeholder="123 Main St." class="input-large" required="">
		      </div>
		    </div>


		    <!-- Text input-->
		    <div class="control-group">
		      <label class="control-label" for="city">City:</label>
		      <div class="controls">
			<input id="city" name="city" class="form-control" type="text" placeholder="Charlottesville" class="input-large" required="">
		      </div>
		    </div>
	
		    <!-- Text input-->
		    <div class="control-group">
		      <label class="control-label" for="state">State:</label>
		      <div class="controls">
			<input id="state" name="state" class="form-control" type="text" placeholder="Virginia" class="input-large" required="">
		      </div>
		    </div>


		    <!-- Text input-->
		    <div class="control-group">
		      <label class="control-label" for="zip">ZIP Code:</label>
		      <div class="controls">
			<input id="zip" name="zip" class="form-control" type="text" placeholder="22903" class="input-large" required="">
		      </div>
		    </div>
	
		    		    
		    <!-- Password input-->
		    <div class="control-group">
		      <label class="control-label" for="password">Password:</label>
		      <div class="controls">
			<input id="password" name="password" class="form-control" type="password" placeholder="********" class="input-large" required="">
			<em>20 character limit.</em>
		      </div>
		    </div>
		    
		    <!-- Button -->
		    <div class="control-group">
		      <label class="control-label" for="confirmsignup"></label>
		      <div class="controls">
			<button id="confirmsignup" name="confirmsignup" class="btn btn-success">Sign Up</button>
		      </div>
		    </div>
		    </fieldset>
		    </form>
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
