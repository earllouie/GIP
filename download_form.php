<?php
include('server.php');
$_SESSION['username'];

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
                
				<li><a <?php  
					
					if($_SESSION['userlevel']=="Encoder"){
					echo "href='encoder.php'";}else echo "href='profile.php'";
					?> ><?php 
					
					if($_SESSION['userlevel']=="Encoder"){
					echo "Dashboard";}else echo "Home";
					?></a>
				</li>
                <li><a  href="registration.php">Add Beneficiaries</a></li>
                <li><a href="beneficiaries.php">View Beneficiaries</a></li>
			   <li><a target="_blank" href="https://docs.google.com/forms/d/e/1FAIpQLSdFpkD_7TuNYT9JQj2AFP_wt63ZTfXT9uzDbEYVnRTMEkr5ZQ/viewform ">Feedback Form</a></li>
			    <?php 
					
					if($_SESSION['userlevel']=="Admin"){
					 echo "<li class='active'><a href='download_form.php'>Download Reports</a></li>";}else{};
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
                    <li><a <?php  
					
					if($_SESSION['userlevel']=="Encoder"){
					echo "href='encoder.php'";}else echo "href='profile.php'";
					?> ><?php 
					
					if($_SESSION['userlevel']=="Encoder"){
					echo "Dashboard";}else echo "Home";
					?></a></li>
					<li><a href="registration.php">Add Beneficiaries</a></li>
					<li><a href="beneficiaries.php">View Beneficiaries</a></li>
					<li><a target="_blank" href="https://docs.google.com/forms/d/e/1FAIpQLSdFpkD_7TuNYT9JQj2AFP_wt63ZTfXT9uzDbEYVnRTMEkr5ZQ/viewform ">Feedback Form</a></li>
					<li class='active'><a href="download_form.php">Download Reports</a></li>
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

<!-- main content-->
    <div id="main-content">
	<div class="row" style="height:100%">
		<div class="large-12 columns">
			<a href="export_excel.php">DOLE-GIP Form F</a><br>
			<a href="export_excel.php">DOLE-GIP  Form H</a>
		</div>
	</div>
	<div class="row">
	<div class="lage-3 columns">
		<label>Filter by Quarter</label>
		<select name="Applicant_Region">
				<option value="1">ALL</option>
				<option value="1">Quarter 1</option>
				<option value="2">Quarter 2</option>
				<option value="3">Quarter 3</option>
				<option value="4">Quarter 4</option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="lage-3 columns">
		<label>Download Records of Region</label>
		<select name="Applicant_Region">
				<option value="REGION I">ALL</option>
				<option value="REGION I">REGION I</option>
				<option value="REGION II">REGION II</option>
				<option value="REGION III">REGION III</option>
				<option value="REGION IV">REGION IV</option>
				<option value="MIMAROPA">MIMAROPA</option>
				<option value="REGION V">REGION V</option>
				<option value="REGION VI">REGION VI</option>
				<option value="REGION VII">REGION VII</option>
				<option value="REGION VIII">REGION VIII</option>
				<option value="REGION IX">REGION IX</option>
				<option value="REGION X">REGION X</option>
				<option value="REGION XI">REGION XI</option>
				<option value="REGION XII">REGION XII</option>
				<option value="NCR">NCR</option>
				<option value="CAR">CAR</option>
				<option value="BARMM">BARMM</option>
			</select>
		</div>
		<div class="lage-3 columns">
		<label>Filter by gender</label>
		<select name="Applicant_Region">
				<option value="REGION I">ALL</option>
				<option value="REGION I">MALE</option>
				<option value="REGION II">FEMALE</option>
			</select>				
		</div>
		<div class="lage-3 columns">
		<label>Filter by status of contract</label>
		<select name="Applicant_Region">
			<option value="REGION I">ALL</option>
				<option value="REGION I">COMPLETED</option>
				<option value="REGION I">ON GOING</option>
				<option value="REGION II">TERMINATED</option>
			</select>
		</div>
		<div class="lage-3 columns">
		<label>Filter by Attainment</label>
		<select name="Applicant_Region">
				<option value="REGION I">ALL</option>
				<option value="REGION I">COMPLETED</option>
				<option value="REGION I">ON GOING</option>
				<option value="REGION II">TERMINATED</option>
			</select>
		</div>
		<div class="lage-3 columns">
		<input type="submit" value="Generate Report" class="button">
		</div>
	</div>


	<!-- DELETE CONFIRMATION-->
	<div class="row">
	<div class="reveal" id="exampleModal" data-reveal>
	<h3 class="text-center">Are you sure you want to log out?</h3>
	<br>
	<div class="text-center">
	<a class="button" text="No" data-close aria-label="Close reveal">NO</a>
	<a class="button" href="logout.php" text="Yes">YES</a>
	</div>
	<button class="close-button" data-close aria-label="Close reveal" type="button">
	<span aria-hidden="true">&times;</span>
	</button>
	</div>
	</div>
	<!-- END DELETE CONFIRMATION-->
<!-- main content end -->
<!--Standard Footer-->


<div><a href="#main-nav" id="back-to-top" title="Back to Top"><i class="fa fa-arrow-circle-up fa-3x" aria-hidden="true"></i>

      </div><!-- off-canvas-content -->
    </div><!-- off-canvas-wrapper-inner -->
  </div><!-- off-canvas-wrapper -->



    <script type="text/javascript">
      (function(d, s, id) {
        var js, gjs = d.getElementById('gwt-standard-footer');

        js = d.createElement(s); js.id = id;
        js.src = "//cdn.i.gov.ph/gwt-footer/footer.js";
        gjs.parentNode.insertBefore(js, gjs);
      }(document, 'script', 'gwt-footer-jsdk'));
    </script>
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
