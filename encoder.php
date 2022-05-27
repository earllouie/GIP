<?php
include('server.php');
$_SESSION['username'];
$_SESSION['region'];
$_SESSION['userlevel'];


?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Government Internship Program</title>
	<link rel="icon" href="giplogo.png">
    <link rel="stylesheet" href="css/foundation/foundation.css" />
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/footer/footer_layout.css" />
    <link rel="stylesheet" href="theme.css"/>
	

  </head>
  <body>

    <!-- <input id="tmp-link" type="hidden" data-link=""> -->

 <!-- Start of Off Canvas -->
    <div class="off-canvas-wrapper">
      <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
  
  <!-- Off Canvas Menu -->
          <div id="offCanvasLeft" class="off-canvas position-left hide-for-large" data-off-canvas data-position="left">
            
            <ul class="vertical menu" data-drilldown data-parent-link="true">
                
				<li class="active"><a <?php  
					
					if($_SESSION['userlevel']=="Encoder"){
					echo "href='encoder.php'";}else echo "href='profile.php'";
					?> ><?php 
					
					if($_SESSION['userlevel']=="Encoder"){
					echo "Dashboard";}else echo "Home";
					?></a>
				</li>
                <li><a  href="registration.php">Add Beneficiaries</a></li>
                <li><a href="beneficiaries.php">View Beneficiaries</a></li>
			    <li>
					<a href="#">Update Beneficiaries</a>
					<ul class="vertical menu">
						<li><a href="ReAdmittedForm.php">Re-admitted</a></li>
						<li><a href="AbsorbedForm.php">Absord</a></li>
					</ul>
               </li>
			   <li><a target="_blank" href="https://docs.google.com/forms/d/e/1FAIpQLSdFpkD_7TuNYT9JQj2AFP_wt63ZTfXT9uzDbEYVnRTMEkr5ZQ/viewform ">Feedback Form</a></li>
			    <?php 
					
					if($_SESSION['userlevel']=="Admin"){
					 echo "<li><a href='download_form.php'>Download Reports</a></li>";}else{};
					?>
					<li><a href="logout.php">Log out</a></li>
            </ul>
          </div>

        <div class="off-canvas-content" data-off-canvas-content>

          <div class="title-bar" data-responsive-toggle="gwt-menu" data-hide-for="large">
		  <div class="title-bar-left">
              
              <button id="me" type="button" data-open="offCanvasLeft">
			  <span class="title-bar-title">MENU</span>
                <i class="fa fa-bars" aria-hidden="true"></i>
              </button>  
            </div>
            <div class="title-bar-right">
              <a href="http://www.gov.ph"><h1 class="title-bar-title">G I P</h1></a>
            </div>
          </div>
  <!-- Sticky Top Bar navigation -->
  <div id="main-nav" class="show-for-large">
      <div data-sticky-container>
        <div class="sticky" data-sticky data-margin-top="0" style="width:100%;">

          <div class="row">
            <div class="large-12 columns">
              <div id="gwt-menu" class="top-bar">

                <nav class="top-bar-left">
                  <ul class="dropdown menu" data-dropdown-menu>
                    <li id="govph" class="name menu-text"><h1><a href="#">G I P</a></h1></li>
                    <li class="active"><a <?php  
					
					if($_SESSION['userlevel']=="Encoder"){
					echo "href='encoder.php'";}else echo "href='profile.php'";
					?> ><?php 
					
					if($_SESSION['userlevel']=="Encoder"){
					echo "Dashboard";}else echo "Home";
					?></a></li>
					<li ><a href="registration.php">Add Beneficiaries</a></li>
					<li><a href="beneficiaries.php">View Beneficiaries</a></li>
					<li><a target="_blank" href="https://docs.google.com/forms/d/e/1FAIpQLSdFpkD_7TuNYT9JQj2AFP_wt63ZTfXT9uzDbEYVnRTMEkr5ZQ/viewform ">Feedback Form</a></li>
					<li><a href="download_form.php">Download Reports</a></li>
                  </ul>
                </nav>
                <nav class="top-bar-right">
                  <ul class="dropdown menu" data-dropdown-menu>
                    <li><a data-open='exampleModal'>Log out</a></li>
					<!--href="logout.php" -->
                  </ul>
                </nav>
				</div>         
            </div>
          </div>

        </div>
      </div>  
    </div>    
<!-- top bar navigation end -->

<header class="container-masthead" style="background-color: #012641;padding: 5px;">
	<div class="row">
		<div class="large-12 columns">
		<h1 class="logo text-center ">
			<a href="#"  title="GIP" rel="home">
			<img src="img/banner.png">
			</a>
		</h1>
		</div>	
	</div>
</header>

<br>

<!-- main -->
    <div id="main-content">
	
	
	<div class="row">
	<div class="large-4 column">
	<div class="callout secondary">
	  <h1 class="text-center">
		<?php 
		
		$sql = "SELECT count(*) FROM `beneficiary` WHERE Region = ?"; 
	$result = $conn->prepare($sql); 
	$result->execute([$_SESSION['region']]); 
	$number_of_rows = $result->fetchColumn(); 
	echo $number_of_rows;
		?>
	  </h1>
	  <h5 class="text-center">BENEFICIARY</h5>
	</div>
	</div>
	<div class="large-4 column">
	<div class="callout secondary">
	  <h1 class="text-center">
		<?php 
		
		$sql = "SELECT count(*) FROM `beneficiary` WHERE Region = ? AND Gender = 'MALE'"; 
	$result = $conn->prepare($sql); 
	$result->execute([$_SESSION['region']]); 
	$number_of_rows = $result->fetchColumn(); 
	echo $number_of_rows;
		?>
	  </h1>
	  <h5 class="text-center">MALE</h5>
	</div>
	</div>
	<div class="large-4 column">
	<div class="callout secondary">
	  <h1 class="text-center">
		<?php 
		
		$sql = "SELECT count(*) FROM `beneficiary` WHERE Region = ? AND Gender = 'FEMALE'"; 
	$result = $conn->prepare($sql); 
	$result->execute([$_SESSION['region']]); 
	$number_of_rows = $result->fetchColumn(); 
	echo $number_of_rows;

		?>
	  </h1>
	  <h5 class="text-center">FEMALE</h5>
	</div>
	</div>
	</div>  
	<div class="row">
	<div class="large-4 column">
	<div class="callout secondary">
	  <h1 class="text-center">
		<?php 
		
		$sql = "SELECT count(*) FROM `beneficiary` WHERE Region = ? AND Status_of_Contract = 'COMPLETED'"; 
	$result = $conn->prepare($sql); 
	$result->execute([$_SESSION['region']]); 
	$number_of_rows = $result->fetchColumn();
 
	echo $number_of_rows;
		?>
	  </h1>
	  <h5 class="text-center">COMPLETED</h5>
	  </div>
	</div>
	<div class="large-4 column">
	<div class="callout secondary">
	  <h1 class="text-center">
		<?php 
		
		$sql = "SELECT count(*) FROM `beneficiary` WHERE Region = ? AND Status_of_Contract = 'ON GOING'"; 
	$result = $conn->prepare($sql); 
	$result->execute([$_SESSION['region']]); 
	$number_of_rows = $result->fetchColumn(); 
	echo $number_of_rows;
		?>
	  </h1>
	  <h5 class="text-center">ON GOING</h5>
	  </div>
	</div>
	<div class="large-4 columns">
			<div class="callout secondary">
			  <h1 class="text-center">
				<?php 
				$sql = "SELECT count(*) FROM `readmitted`"; 
				$result = $conn->prepare($sql); 
				//$result->execute([$_SESSION['region']]); 
				$number_of_rows = $result->fetchColumn(); 
				if($number_of_rows>0){
					echo $number_of_rows;
				}else{
					echo "0";
				}
				
				?>
			  </h1>
			  <h5 class="text-center">RE-ADMITTED</h5>
			</div>
		</div>
	</div>
	
	
	<div class="row">
		
		<div class="large-4 columns">
			<div class="callout secondary">
			  <h1 class="text-center">
				<?php 
				$sql = "SELECT count(*) FROM `reabsorbed`"; 
				$result = $conn->prepare($sql); 
				//$result->execute([$_SESSION['region']]); 
				$number_of_rows = $result->fetchColumn(); 
				if($number_of_rows>0){
					echo $number_of_rows;
				}else{
					echo "0";
				}
				?>
			  </h1>
			  <h5 class="text-center">ABSORBED</h5>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="large-6 column">
			<ul class="accordion" data-accordion>
			  <li class="accordion-item" data-accordion-item>
				<!-- Accordion tab title -->
				<a href="#" class="accordion-title">ACCOUNT PROFILE</a>

				<!-- Accordion tab content: it would start in the open state due to using the `is-active` state class. -->
				<div class="accordion-content" data-tab-content>
				  <h3 class="text-center">PROFILE</h3>
				  <label>REGION</label>
				  <input type="text">
				  <label>FIRST NAME</label>
				   <input type="text">
				  <label>MIDDLE NAME</label>
				   <input type="text">
				  <label>LAST NAME</label>
				   <input type="text">
				  <label>USERNAME</label>
				   <input type="text">
				  <label>PASSWORD</label>
				   <input type="text">
				</div>
			  </li>
		  <!-- ... -->
			</ul>
		
		</div>

	</div>
  <!-- ... -->
	
<!-- main end -->

<!--Standard Footer-->


<div><a href="#main-nav" id="back-to-top" title="Back to Top"><i class="fa fa-arrow-circle-up fa-3x" aria-hidden="true"></i>

      </div><!-- off-canvas-content -->
    </div><!-- off-canvas-wrapper-inner -->
  </div><!-- off-canvas-wrapper -->
							
<!--Standard Footer End-->

    <script src="js/foundation/vendor/jquery.js"></script>
    <script src="js/foundation/vendor/foundation.min.js"></script>
    <script src="js/foundation/vendor/what-input.js"></script>
    <script src="js/theme.js"></script>

    <script>
      $(document).foundation();
    </script>

	</body>
</html>
