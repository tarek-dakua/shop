<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Checkout | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<?php
include "header.php";
?>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="step-one">
				<h2 class="heading">Step1</h2>
			</div>


			<div class="register-req">
				<p>Please give proper details to easily get items at your delivered address.</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">

					</div>
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
								<form name="form1" action="" method="post" >
									<input type="text" placeholder="First Name" name="firstname" required pattern="[A-Za-z]+" title="please enter valid firstname[a-z only]" style="width:350px; background-color: #0480be">
									<input type="text" placeholder="Last Name" name="lastname" required pattern="[A-Za-z]+" title="please enter valid lastname[a-z only]" style="width:350px; background-color: #0480be">
									<input type="text" placeholder="Email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="please enter valid email address" style="width:350px; background-color: #0480be">
									<input type="text" placeholder="Resi. Address" name="resi" required style="width:350px; background-color: #0480be">
									<input type="text" placeholder="City" name="city" required pattern="[A-Za-z]+" title="please enter valid city name[a-z only]" style="width:350px; background-color: #0480be">
                                    <input type="text" placeholder="Pincode" name="pincode" required pattern="[0-9]{6}" title="please enter valid pincode[0-9 and 6 digit only]" style="width:350px; background-color: #0480be">
                                    <input type="text" placeholder="Contact Number" name="cno" required pattern="[0-9]{11}" title="please enter valid contacet number[0-9 and 11 digit only]" style="width:350px; background-color: #0480be">
                                    <input type="submit" name="submit1" value="save" style="background-color:#843534; color:white; font-weight:bold">

								</form>
							</div>

						</div>
					</div>

				</div>
			</div>
			<?php
			if(isset($_POST["submit1"]))
			{
				$link=mysqli_connect("localhost","root","");
				mysqli_select_db($link,"dakua_project");
				mysqli_query($link,"insert into checkout_address values('','$_POST[firstname]','$_POST[lastname]','$_POST[email]','$_POST[resi]','$_POST[city]','$_POST[pincode]','$_POST[cno]')");

				$res=mysqli_query($link,"select id from checkout_address order by id desc limit 1");
				while($row=mysqli_fetch_array($res))
				{
					$_SESSION["order_id"]=$row["id"];
				}

				?>
                <script type="text/javascript">
                    alert("click ok to transferring to you in payment system");
                    setTimeout(function()
                    {
                        window.location="paypal.php";
                    },400);

                </script>

			<?php


			}


			?>
	</section>
    <?php
    include "footer.php";
    ?>
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>