<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
if(isset($_SESSION["user"])){
    $user = $_SESSION["user"];

}

include 'dbconnect.php';
include 'newuser.php';
include 'apiCallsData.php';
include 'signupemail.php';
include 'getRiderData.php';

if(isset($_GET['lastname'])){
    $lastname = $_GET['lastname'];
    $conn = openCon();
    $first = getFirst($conn, $lastname);
    $email = getEmail($conn, $lastname);
    $destination = getDestination($conn, $lastname);
    $description = getDescription($conn, $lastname);
    $price = getPrice($conn, $lastname);
    $title = getTitle($conn, $lastname);
}

echo "<script type='text/javascript'>";
   echo "window.paypalCheckoutReady = function () {";
       echo "paypal.checkout.setup('Your merchant id', {";
          echo " container: 'myContainer', "; //{String|HTMLElement|Array} where you want the PayPal button to reside
           echo "environment: 'sandbox'"; //or 'production' depending on your environment
      echo " });";
   echo "};";
echo "</script>";
echo "<script src='//www.paypalobjects.com/api/checkout.js' async></script>";
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Open Ride</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Background color for template --> 
    <style type="text/css"> 
        body {
        	background: #ffd699;
		padding-top: 30px;
		padding-bottom: 30px;
    }
    </style>
</head>

<body>

    <!-- Navigation -->
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
                <?php
                if(isset($user)){ 
                    $_SESSION["user"] = $user;
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.php?id=logout">Log out</a>
                    </li>
		</ul>
                    <?php
                    }
                    else{
                    ?>
                <ul class="nav navbar-nav navbar-right">
                     <li>
                        <a href="about.php">About</a>
                    </li>
                    <li>
                        <a href="signin.php">Sign In</a>
                    </li>
                    <li>
                        <a href="signup.php">Sign Up</a>
                    </li>
		</ul>
                    <?php
                    }
		    ?>
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
                <h1 class="page-header"><?php echo "$title"?>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <hr>

                <!-- OP -->
                <p><i class="fa fa-clock-o"></i> <?php echo "$first" . " $lastname"?></p>

                <hr>

                <!-- Price, Destination -->
                <p><i class="fa fa-clock-o"></i> <?php echo "$destination" . ", $price dollars"?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo "$description"?>

                <hr>

                <!-- Blog Comments -->
		<?php
	        if (isset($user)) {
	    	?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment as <?php echo "$user"?>:</h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
		<?php
	       	}    	
		?>
		<?php
	        if (!isset($user)) {
	    	?>
		<p class="lead"> Want to get on this ride? </p>
		<a class="btn btn-primary btn-lg" href="signup.php" > Sign Up Now!</a>
		<?php
	       	}    	
		?>


                <hr>

                <!-- Posted Comments -->
                    </div>
                </div>

            </div>

           

                

            </div>

        </div>
        <!-- /.row -->
	<?php
	if (isset($user)) {

        $_SESSION["user"] = $user;
        ?>
        <form id="myContainer" action="startPayment.php" method="POST">
    		<input type="hidden" name="csrf" value="<?php echo($_SESSION['csrf']);?>"/>
    		Camera:<input type="text" name="camera_amount" value=<?php echo "$price"?> readonly></input><br>
    		Tax:<input type="text" name="tax" value="5" readonly></input><br>
    		Total:<input type="text" name="total_amount" value=<?php echo "$price"?> readonly></input><br>
    		Currency:<input type="text" name="currencyCodeType" value="USD" readonly></input><br>
	</form>

	<?php
	 }    	
	?>

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
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
