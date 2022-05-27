<?php
include('server.php');
$_SESSION['username'];
$_POST['UserID'];

$stmt = $conn->prepare('SELECT * FROM users WHERE UserID = :1');
$stmt->execute(array(':1' => $_POST['UserID']));
if($stmt){
	$user = $stmt->fetch();
}
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
					echo "href='encoder.php'";}else {echo "href='profile.php'";}
					?> ><?php 
					
					if($_SESSION['userlevel']=="Encoder"){
					echo "Dashboard";}else {echo "Home";}
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
                    <li class='active'><a  <?php  
					
					if($_SESSION['userlevel']=="Encoder"){
					echo "href='encoder.php'";}else echo "href='profile.php'";
					?> ><?php 
					
					if($_SESSION['userlevel']=="Encoder"){
					echo "Dashboard";}else echo "Home";
					?></a></li>
					<li><a href="registration.php">Add Beneficiaries</a></li>
					<li	><a href="beneficiaries.php">View Beneficiaries</a></li>
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

<header class="container-masthead" style="background-color: #012641;padding: 10px;">
	<div class="row">
		<div class="large-12 columns">
		<h1 class="logo text-center ">
			<a href="#"  title="GIP" rel="home">
			<img src="img/GIP.jpg">
			</a>
		</h1>
		</div>	
	</div>
</header>

<br>

<!-- main content-->
    <div id="main-content">
	
	
	<div class="row">
		<div class="large-12 columns">
					<nav aria-label="You are here:" role="navigation">
			  <ul class="breadcrumbs">
				<li><a href="profile.php">Home</a></li>
				<li class="secondary label"><a href="#0">Update User Profile</a></li>
			  </ul>
			</nav>
		</div>
	</div>
	
	
	<div class="row">
		<div class="large-12 columns">
		<h2>EDIT PROFILE</h2>
		</div>
	</div>
	
	
	<form action="./process/updateuser.php" method="POST">
							
							<input name="USERID" type="hidden" value="<?php echo $_POST['UserID'];?>">
							<div class="row">
								<div class="large-4 columns">
								
										<label>First Name</label>
										<input type="text" name="Updated_First_Name" autocomplete="off" value="<?php echo $user[1];?>"/>
									
									
								</div>
								<div class="large-4 columns">
									
										<label>Middle Name</label>
										<input type="text" name="Updated_Middle_Name" autocomplete="off" value="<?php echo $user[2];?>"/>
									
									
								</div>
								<div class="large-4 columns">
									
									
										<label>Last Name</label>
										<input type="text" name="Updated_Last_Name" autocomplete="off" value="<?php echo $user[3];?>"/>
									
									
								</div>
							</div>
							<div class="row">
							
								<div class="large-4 columns">
									<label>Region</label>
										<select name="UpdatedRegion">
											<option value="" ></option>
											<option <?php if($user[10]=="Region I"){echo "selected='selected'";}?> value="Region I">Region I</option>
											<option <?php if($user[10]=="Region II"){echo "selected='selected'";}?>value="Region II">Region II</option>
											<option <?php if($user[10]=="Region III"){echo "selected='selected'";}?>value="Region III">Region III</option>
											<option <?php if($user[10]=="Region IV"){echo "selected='selected'";}?>value="Region IV">Region IV</option>
											<option <?php if($user[10]=="MIMAROPA"){echo "selected='selected'";}?>value="MIMAROPA">MIMAROPA</option>
											<option <?php if($user[10]=="Region V"){echo "selected='selected'";}?>value="Region V">Region V</option>
											<option <?php if($user[10]=="Region VI"){echo "selected='selected'";}?>value="Region VI">Region VI</option>
											<option <?php if($user[10]=="Region VII"){echo "selected='selected'";}?>value="Region VII">Region VII</option>
											<option <?php if($user[10]=="Region VIII"){echo "selected='selected'";}?>value="Region VIII">Region VIII</option>
											<option <?php if($user[10]=="Region IX"){echo "selected='selected'";}?>value="Region IX">Region IX</option>
											<option <?php if($user[10]=="Region X"){echo "selected='selected'";}?>value="Region X">Region X</option>
											<option <?php if($user[10]=="Region XI"){echo "selected='selected'";}?>value="Region XI">Region XI</option>
											<option <?php if($user[10]=="Region XII"){echo "selected='selected'";}?>value="Region XII">Region XII</option>
											<option <?php if($user[10]=="NCR"){echo "selected='selected'";}?>value="NCR">NCR</option>
											<option <?php if($user[10]=="CAR"){echo "selected='selected'";}?>value="CAR">CAR</option>
											<option <?php if($user[10]=="BARMM"){echo "selected='selected'";}?>value="BARMM">BARMM</option>
										</select>
								</div>
								<div class="large-4 columns">
									<label>Access Level</label>
										<select name="Updated_Security_Level">
											<option <?php if($user[9]=="Admin"){echo "selected='selected'";}?> value="Admin">Admin</option>
											<option  <?php if($user[9]=="Encoder"){echo "selected='selected'";}?> value="Encoder">Encoder</option>
										</select>
								</div>
								<div class="large-4 columns">
								</div>
								</div>
							<div class="row">
								<div class="large-4 columns">
								<label>Username</label>
										<input type="text" name="Update_Username" autocomplete="off" value="<?php echo $user[4];?>"/>
								</div>
								<div class="large-4 columns">
								<label>Password</label>
										<input type="password" name="Update_Password" autocomplete="off" value="<?php echo $user[5];?>"/>
								</div>
								<div class="large-4 columns">
								</div>
							</div>
							<div class="row">
								<div class="large-4 columns">
									<input class="success button" 	type="submit" value="UPDATE">
								</div>
								
								<div class="large-4 columns">
								
								</div>
								
								<div class="large-4 columns">
								
								</div>
							</div>
							
							</form>
<div class="reveal" id="exampleModal" data-reveal>
	<h5>Are you sure that you want to permanently delete this user?</h5>
	<br>
	
	<form action="./process/deleteuser.php" method="POST">
	<input type="hidden" name="DeleteUser" value="<?php echo  $_POST['UserID'];?>"></input>
	
	<button class="alert button" type="submit" value="YES" >YES</button>
	</form>
	<button class="success button"  value="No" data-close aria-label="Close reveal">NO</button>
	
<button class="close-button" data-close aria-label="Close reveal" type="button">
<span aria-hidden="true">&times;</span>
</button>
</div>
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
