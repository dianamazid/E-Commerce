<?php
session_start();
?>

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

	} else if ($valid=="firstname") {
		echo '<script language="javascript">';
		echo 'alert("Fill in a valid first name!")';
		echo '</script>';
	} 
	else if ($valid=="lastname") {
		echo '<script language="javascript">';
		echo 'alert("Fill in a valid last name!")';
		echo '</script>';
	}
	else if ($valid=="email") {
		echo '<script language="javascript">';
		echo 'alert("Fill in a valid email!")';
		echo '</script>';
	}
	else if ($valid=="city") {
		echo '<script language="javascript">';
		echo 'alert("Fill in a valid city!")';
		echo '</script>';
	}
	else if ($valid=="zip") {
		echo '<script language="javascript">';
		echo 'alert("Fill in a valid zipcode!")';
		echo '</script>';
	}
	else if ($complete=="firstname") {
		echo '<script language="javascript">';
		echo 'alert("Fill in first name!")';
		echo '</script>';
	}
	else if ($complete=="lastname") {
		echo '<script language="javascript">';
		echo 'alert("Fill in last name!")';
		echo '</script>';
	}
	else if ($complete=="city") {
		echo '<script language="javascript">';
		echo 'alert("Fill in city!")';
		echo '</script>';
	}
	else if ($complete=="address") {
		echo '<script language="javascript">';
		echo 'alert("Fill in address!")';
		echo '</script>';
	}
	else if ($complete=="zip") {
		echo '<script language="javascript">';
		echo 'alert("Fill in zipcode!")';
		echo '</script>';
	}
	else if ($complete=="email") {
		echo '<script language="javascript">';
		echo 'alert("Fill in email!")';
		echo '</script>';
	}
	else if($complete=="complete"){
		$_SESSION["user"] = $email;
		saveToDB($conn, $fn, $ln, $email, $pw, $addr, $city, $st, $zip);
		sendConfirmTo($email, $fn, $pw);
		echo '<script language="javascript">';
		echo 'if(confirm("You have registered, and a confirmation email has been sent to you!")) document.location = "index.php"';
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
                <a class="navbar-brand" href="index.php">The Carpool Company</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <li>
                        <a href="signin.php">Sign In</a>
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
                    <li><a href="index.php">Home</a>
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
			<input id="firstname" name="firstname" class="form-control" type="text" style="text-transform:uppercase" value ="<?php echo isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" placeholder="John" class="input-large" required="">
		      </div>
		    </div>

		    <!-- Text input-->
		    <div class="control-group">
		      <label class="control-label" for="lastname">Last Name:</label>
		      <div class="controls">
			<input id="lastname" name="lastname" class="form-control" type="text" style="text-transform:uppercase" value ="<?php echo isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" placeholder="Doe" class="input-large" required="">
		      </div>
		    </div>

		    
		    <!-- Text input-->
		    <div class="control-group">
		      <label class="control-label" for="email">Email:</label>
		      <div class="controls">
			<input id="email" name="email" class="form-control" type="text" style="text-transform:uppercase" value ="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" placeholder="user@domain.com" class="input-large" required="">
		      </div>
		    </div>
		    
		    <!-- Text input-->
		    <div class="control-group">
		      <label class="control-label" for="address">Street Address:</label>
		      <div class="controls">
			<input id="address" name="address" class="form-control" type="text" style="text-transform:uppercase" value ="<?php echo isset($_POST['address']) ? $_POST['address'] : '' ?>" placeholder="123 Main St." class="input-large" required="">
		      </div>
		    </div>


		    <!-- Text input-->
		    <div class="control-group">
		      <label class="control-label" for="city">City:</label>
		      <div class="controls">
			<input id="city" name="city" class="form-control" type="text" style="text-transform:uppercase" value ="<?php echo isset($_POST['city']) ? $_POST['city'] : '' ?>" placeholder="Charlottesville" class="input-large" required="">
		      </div>
		    </div>
	
		    <!-- Text input-->
		    <div class="control-group">
		      <label class="control-label" for="state">State:</label>
		      <div class="controls">
			<select id='state' name='state' value ="<?php echo isset($_POST['state']) ? $_POST['state'] : '' ?>">
  			<option value="ALABAMA">ALABAMA</option>
  			<option value="ALASKA">ALASKA</option>
  			<option value="ARIZONA">ARIZONA</option>
  			<option value="ARKANSAS">ARKANSAS</option>
  			<option value="CALIFORNIA">CALIFORNIA</option>
  			<option value="COLORADO">COLORADO</option>
  			<option value="CONNECTICUT">CONNECTICUT</option>
  			<option value="DELAWARE">DELAWARE</option>
  			<option value="FLORIDA">FLORIDA</option>
  			<option value="GEORGIA">GEORGIA</option>
  			<option value="HAWAII">HAWAII</option>
  			<option value="IDAHO">IDAHO</option>
  			<option value="ILLINOIS">ILLINOIS</option>
  			<option value="INDIANA">INDIANA</option>
  			<option value="IOWA">IOWA</option>
  			<option value="KANSAS">KANSAS</option>
  			<option value="KENTUCKY">KENTUCKY</option>
  			<option value="LOUISIANA">LOUISIANA</option>
  			<option value="MAINE">MAINE</option>
  			<option value="MARYLAND">MARYLAND</option>
  			<option value="MASSACHUSETTS">MASSACHUSETTS</option>
  			<option value="MICHIGAN">MICHIGAN</option>
  			<option value="MINNESOTA">MINNESOTA</option>
  			<option value="MISSISSIPPI">MISSISSIPPI</option>
  			<option value="MISSOURI">MISSOURI</option>
  			<option value="MONTANA">MONTANA</option>
  			<option value="NEBRASKA">NEBRASKA</option>
  			<option value="NEVADA">NEVADA</option>
  			<option value="NEW HAMPSHIRE">NEW HAMPSHIRE</option>
  			<option value="NEW JERSEY">NEW JERSEY</option>
  			<option value="NEW MEXICO">NEW MEXICO</option>
  			<option value="NEW YORK">NEW YORK</option>
  			<option value="NORTH CAROLINA">NORTH CAROLINA</option>
  			<option value="NORTH DAKOTA">NORTH DAKOTA</option>
  			<option value="OHIO">OHIO</option>
  			<option value="OKLAHOMA">OKLAHOMA</option>
  			<option value="OREGON">OREGON</option>
  			<option value="PENNSYLVANIA">PENNSYLVANIA</option>
  			<option value="RHODE ISLAND">RHODE ISLAND</option>
  			<option value="SOUTH CAROLINA">SOUTH CAROLINA</option>
  			<option value="SOUTH DAKOTA">SOUTH DAKOTA</option>
  			<option value="TENNESSEE">TENNESSEE</option>
  			<option value="TEXAS">TEXAS</option>
  			<option value="UTAH">UTAH</option>
  			<option value="VERMONT">VERMONT</option>
  			<option value="VIRGINIA">VIRGINIA</option>
  			<option value="WASHINGTON">WASHINGTON</option>
  			<option value="WEST VIRGINIA">WEST VIRGINIA</option>
  			<option value="WISCONSIN">WISCONSIN</option>
  			<option value="WYOMING">WYOMING</option>
			</select> 
		      </div>
		    </div>


		    <!-- Text input-->
		    <div class="control-group">
		      <label class="control-label" for="zip">ZIP Code:</label>
		      <div class="controls">
			<input id="zip" name="zip" class="form-control" type="text" value ="<?php echo isset($_POST['zip']) ? $_POST['zip'] : '' ?>" placeholder="22903" class="input-large" required="">
		      </div>
		    </div>
	
		    		    
		    <!-- Password input-->
		    <div class="control-group">
		      <label class="control-label" for="password">Password:</label>
		      <div class="controls">
			<input id="password" name="password" class="form-control" type="password" value ="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>" placeholder="********" class="input-large" required="">
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
