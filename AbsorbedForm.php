<?php
include('server.php');
$_SESSION['username'];
$_SESSION['userlevel'];
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Absorbed Form</title>
	<link rel="icon" href="giplogo.png">
    <link rel="stylesheet" href="css/foundation/foundation.css" />
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/footer/footer_layout.css" />
	<link rel="stylesheet" href="css/foundation-icons.css" />
    <link rel="stylesheet" href="theme.css"/>
	<style>
	
	</style>
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
			    <li class="active">
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
                    <li><a <?php  
					
					if($_SESSION['userlevel']=="Encoder"){
					echo "href='encoder.php'";}else echo "href='profile.php'";
					?> ><?php 
					
					if($_SESSION['userlevel']=="Encoder"){
					echo "Dashboard";}else echo "Home";
					?></a></li>
					<li><a href="registration.php">Add Beneficiaries</a></li>
					<li><a href="beneficiaries.php">View Beneficiaries</a></li>
					<li class="active">
						<a href="#">Update Beneficiaries</a>
							<ul class="vertical menu">
								<li><a href="ReAdmittedForm.php">Re-admitted</a></li>
								<li class="active"><a href="AbsorbedForm.php">Absorb</a></li>
							</ul>
					</li>
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
		<div class="large-3 columns">
			<h3>Search GIP ID</h3>
		</div>
		<form action="AbsorbedForm.php" method="POST" >
			<div class="large-3 columns">
					<select id="Applicant_Status_Of_Contract" name="Applicant_Status_Of_Contract">
						<option value="GIP_ID">GIP ID</option>
						<option value="First_Name">First Name</option>
						<option value="Last_Name">Last Name</option>
						<option value="Region">Region</option>
					</select>
			</div>
			
			<div class="large-3 columns">	
					<input type="text" name="look_for" autocomplete="off" required></input>
			</div>
			
			<div class="large-3 columns">
			<input type="submit" class="button small" name="search_profile"></input>
			</div>
		</form>
		<hr>
	
	</div>  <!-- row end -->
	
	
	<div class="row">
		<div class="large-6 columns">
			<?php
				if(isset($_POST["search_profile"]))
				{
					$filter = $_POST["Applicant_Status_Of_Contract"];
					$WhatToSearch = $_POST["look_for"];
					 
					$_SESSION['$WhatToSearch'] = $WhatToSearch; 
					
					
					$stmt = $conn->query("SELECT * FROM `beneficiary` WHERE `". $filter. "`  = '". $WhatToSearch ."' ");
					while($row = $stmt->fetch())
					{
						echo "<tr>";
						echo "<td>".$row[4] ."</td>";
						echo "<td>".$row[0] ."</td>";
						echo "<td>". $row[5] ." " . $row[7] ."</td>";
						echo "<td>".$row[30] ."</td>";
						echo "<td>" . $row[25] ."</td>";   
						echo "<td>" .$row[26] . "</td>";
						echo "</tr></div></div>";
						echo "<a class='button'  data-open='exampleModal'>Update</a>";
					} //END OF WHILE
				} // END OF PHP
			?>
		</div>
	</div>
	
	<div class="reveal" id="exampleModal" data-reveal>
	
	<?php
				if(isset($_POST["search_profile"]))
				{
					
					$filter = $_POST["Applicant_Status_Of_Contract"];
					$WhatToSearch = $_POST["look_for"];
					 
					 
					$stmt = $conn->query("SELECT * FROM `beneficiary` WHERE `". $filter. "`  = '". $WhatToSearch ."' ");
					while($row = $stmt->fetch())
					{
						echo "<h3 class='text-center'>ABSORBED INFORMATION</h3><br>";
						echo "<form action='absorbed_process.php' method='POST'>";
						echo "<label>Date Absorbed</label>";
						echo "<input type='date' name='Date_Absorbed'></input>";
						echo "<label>Position Tile</label>";
						echo "<input type='text' name='Position_Title'></input>";
						echo "<label>Nature Of Assignment</label>";
						echo "<input type='text' name='Nature_Of_Assignment'></input>";
						echo "<label>Place of Assignment</labe>";
						echo "<select name='Place_Of_Assignment' required>";
						echo "<option value='DOLE'>DOLE</option>";
						echo "<option value='Other NGAs/Entities'>Other NGAs/Entities</option>";
						echo "<option value='Public/Government Hospitals'>Public/Government Hospitals</option>";
						echo "<option value='State Universities (Public School or Educational Institutions'>State Universities (Public School or Educational Institutions)</option>";
						echo "<option value='House of Representatives'>House of Representatives</option>";
						echo "<option value='GFIs'>GFIs</option>";
						echo "<option value='LGUs'>LGUs</option>";
						echo "<option value='GOCCs'>GOCCs</option>";
						echo "</select>";
						echo "<label>Name Of Place of Assignment</label>";
						echo "<input type='text' name='Name_Of_Place_Of_Assignment'></input>";
						echo "<input type='submit' class='button' value='Update'></input>";
						echo "</form>";
					} //END OF WHILE
				} // END OF PHP
			?>
	
	
	<button class="close-button" data-close aria-label="Close reveal" type="button">
	<span aria-hidden="true">&times;</span>
	</button>
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