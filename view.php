<?php
include('server.php');
if(empty($_SESSION['username'])){
	header("Location: error_page.php");
}
$_SESSION['username'];
$_SESSION['userlevel'];


$ID = $_POST["ID"];
	$search = $conn->prepare("SELECT * FROM beneficiary WHERE GIP_ID= :IDFRM ");
	$search-> execute(array( ':IDFRM' => $ID));if($search)
	$user = $search->fetch();

	$search1 = $conn->prepare("SELECT * FROM absorbed WHERE GIP_ID= :ID");
	$search1->execute(array(':ID' => $_POST['ID']));
	$A_user = $search1->fetch();
	
	$search1 = $conn->prepare("SELECT * FROM readmitted WHERE RA_GIP_ID= :ID");
	$search1->execute(array(':ID' => $_POST['ID']));
	$RA_user = $search1->fetch();
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GIP Registration</title>
	<link rel="icon" href="giplogo.png">
    <link rel="stylesheet" href="css/foundation/foundation.css" />
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/footer/footer_layout.css" />
	<link rel="stylesheet" href="css/foundation-icons.css" />
    <link rel="stylesheet" href="theme.css"/>
	<style>
	body{
		
	}
	th{
		background-color: #012641;
		color:white;
	}
	tr{
		bacground-color:white;
	}
	small{
		bottom:0;
		left:0;
		top:0;
		 visibility: hidden;
	}
	.d1 {
		background-color: #012641;
		padding: 10px;
		color:white; 
	}
	
	.form-control.success input{
		border-color: #2ecc71;
	}
	
	.form-control.error input 	{
		border-color: #e74c3c;
	}
	
	.form-control.success input{
		border-color: #2ecc71;
	}
	
	<!-- Mske the error indicator invisible to the user--->
	.form-control small{
		border-color: #e74c3c;
		visibility: hidden;
	}
	
	<!-- Mske the error indicator text red--->
	.form-control.error small{ 
		color: #e74c3c;
		visibility: visible;
	}

	<!-- Mske the error indicator text --->
	.form-control.success small{
		text-color: #2ecc71;
		visibility: visible;
	}
	input {text-transform: uppercase;}
	
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
                <li class="active"><a  href="registration.php">Add Beneficiaries</a></li>
                <li><a href="beneficiaries.php">View Beneficiaries</a></li>
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
					<li class='active'><a href="beneficiaries.php">View Beneficiaries</a></li>
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
		<div class="large-12 columns">
					<nav aria-label="You are here:" role="navigation">
			  <ul class="breadcrumbs">
				<li class="active"><a href="beneficiaries.php"> &#60 Back to list of beneficiaries</a></li>
			  </ul>
			</nav>
		</div>
	</div>


	<div class="row">
		<div class="large-12 columns">
		<?php 
		if(isset($_SESSION['STATUS'])){
		 echo '
		 <div class="callout success" data-closable="slide-out-right">
			<h5>Updated successfully!</h5>
			<button class="close-button" aria-label="Dismiss alert" type="button" data-close>
			<span aria-hidden="true">&times;</span>
			</button>
		 </div>
		 
		 ';
		 unset($_SESSION['STATUS']);
		}else{
			
		}
		
		?>
		</div>
	</div>
	
	
	<div class="row">
		<div class="large-12 columns">
			<table>
				<tr>
				<th colspan="7" class="text-left" style="bacground-color: blue;">PROFILE</th>
				</tr>
				<tr>
					<td><label>Region</label><b><?php echo $user["Region"];?></b></td>
					<td><label>GIP ID No</label> <b><?php echo $user["GIP_ID"];?></b></td>
					<td><label>Birth Reference No. </label><b><?php echo $user["BReN"];?></b></td>
					<td><label>Valid ID </label><b><?php echo $user["ID"];?></b></td>
					<td><label>ID No. </label><b><?php echo $user["ID_No"];?></b></td>
					<td><label>RE-ADMITTED?</label><b><?php if($RA_user){echo "YES";}else{echo "NO";}?></b>
					<td><label>ABSORBED?</label><b><?php if($A_user){echo "YES";}else{echo "NO";}?></b>
				</tr>
			</table>
				
			<table border="1">
				<th colspan="5" class="text-left">PERSONAL DETAILS</th>
				<tr>
					<td><label>First Name </label><b><?php echo $user["First_Name"];?></b></td>
					<td><label>Middle Name </label><b><?php echo $user["Middle_Name"];?></b></td>
					<td><label>Last Name </label><b><?php echo $user["Last_Name"];?></b></td>
					<td><label>Suffix</label> <b><?php echo $user["Suffix"];?></b></td>
					<td></td>
				</tr>
			
				<tr>
					<td><label>Gender </label><b><?php echo $user["Gender"];?></b></td>
					<td><label>Civil Status </label><b><?php echo $user["Civil_Status"];?></b></td>
					<td><label>Place of Birth </label> <b><?php echo $user["Birth_Place"];?></b></td>
					<td><label>Date of Birth </label> <b><?php echo $newDate = date('F d, Y', strtotime($user["Birth_Date"]));?></b></td>
					<td></td>
				</tr>
				
				
			</table>
			<table border="1">
				<th colspan="5" class="text-left">ADDRESS</th>
				<tr>
					<td><label>Street No.</label><b><?php echo $user["Street_No"];?></b></td>
					<td><label>Barangay </label><b><?php echo $user["Barangay"];?></b></td>
					<td><label>City </label><b><?php echo $user["City"];?></b></td>
					<td><label>Province </label><b><?php echo $user["Province"];?></b></td>
					<td><label>Postal Code </label><b><?php echo $user["Postal_Code"];?></b></td>
				</tr>
			</table>
			<table border="1">
				<th colspan="5" class="text-left">CONTACT DETAILS</th>
				<tr>
					<td><label>Telephone No.</label> <b><?php echo $user["Telephone_No"];?></b></td>
					<td><label>Mobile No.</label> <b><?php echo $user["Mobile_No"];?></b></td>
					<td><label>Email Address </label> <b><?php echo $user["Email"];?></b></td>
					
				</tr>
			</table>
			<table border="1">
				<th colspan="5" class="text-left">EDUCATIONAL BACKGROUND</th>
				<tr>
					<td><label>Attainment</label> <b><?php echo $user["Attainment"];?></b></td>
					<td><label>Name of School / Training Institution</label> <b><?php echo $user["School"];?></b></td>
					<td><label>Date Graduated / School Year Last Attended</label> <b><?php echo $newDate = date('F d, Y', strtotime($user["Date_Graduated"]));;?></b></td>
					<td><label>Document Submitted </label> <b><?php echo $user["Submitted_Document"];?></b></td>
					<td></td>
				</tr>
				
			</table>

			<table border="1">
				<th colspan="5" class="text-left">CONTRACT DETAILS</th>
				<tr>
					<td><label>Place of assignment</label> <b><?php echo $user["Place_of_Assignment"];?></b></td>
					<td><label>Start Date</label> <b><?php echo $newDate = date('F d, Y', strtotime($user["Contract_Start_Date"]));?></b></td>
					<td><label>End Date</label> <b><?php echo $newDate = date('F d, Y', strtotime($user["Contract_End_Date"]));?></b></td>
					<td><label>Status of Contract</label> <b><?php echo $user["Status_of_Contract"];?></b></td>
					<td><label>Nature of Work / Assignment</label> <b><?php echo $user["Nature_of_Work"];?></b></td>
					
				</tr>
				<tr>
					<td><label>Name of Institution</label> <b><?php echo $user["Institution"];?></b></td>
					<td><label>Salary</label> <b><?php echo "&#8369 ".$user["Salary"];?></b></td>
					<td colspan="3"><label>Member of disadvantaged group of persons?</label> <b><?php echo $user["Disability"];?></b></td>
				</tr>
				
			</table>
			
			<table style="<?php if($A_user){echo "display:block";}else{ echo "display:none";}?>">
				<th colspan="5" class="text-left" style="bacground-color: blue;">ABSORB DETAILS</th>
		
				<tr>
					<td><label>Absobed Date</label><b><?php echo $A_user["AbsorbedDate"];?></b></td>
					<td><label>Position Title</label><b><?php echo $A_user["PositionTitle"];?></b></td>
					<td><label>Nature of Work</label><b><?php echo strtoupper($A_user["NatureOfWork"]);?></b></td>
					<td><label>Place of Assignment</label><b><?php echo $A_user["PlaceOfAssignment"];?></b></td>
					<td><label>Name Place of the Assignment</label><b><?php echo $A_user["NPlaceOfAssignment"];?></b></td>
				</tr>
			</table>
			
						<table style="<?php if($RA_user){echo "display:block";}else{ echo "display:none";}?>">
				<tr>
				<th colspan="5" class="text-left" style="bacground-color: blue;">RE-ADMITTED DETAILS</th>
				</tr>
				<tr>
					<td><label>Contract Start Date</label><b><?php echo $RA_user["RA_ContactStartDate"];?></b></td>
					<td><label>Contract End Date</label><b><?php echo $RA_user["RA_ContractEndDate"];?></b></td>
					<td><label>Nature of Work</label><b><?php echo strtoupper($RA_user["RA_NatureOfWork"]);?></b></td>
					<td><label>Place of Assignment</label><b><?php echo $RA_user["RA_PlaceOfAssignment"];?></b></td>
					<td colspan="3"><label>Document Submitted</label><b>
					<label><input type="checkbox" name="D1" value="Performace Evaluation Rating" <?php if($RA_user["RA_D1"] == "N/A"){}else{echo "checked";}?>>Performace Evaluation Rating</label>
								<label><input type="checkbox" name="D2" value="Certification for Skills Enhancement" <?php if($RA_user["RA_D2"] == "N/A"){}else{echo "checked";}?>>Certification for Skills Enhancement</label>
								<label><input type="checkbox" name="D3" value="Intent to Hire" <?php if($RA_user["RA_D3"] == "N/A"){}else{echo "checked";}?>>Intent to Hire</label>
					</b></td>
				</tr>
			</table>
			
			<table STYLE="<?php 
			if($_SESSION['userlevel']=="Admin"){
				echo "display:block;";
			}else if($_SESSION['userlevel']=="Encoder"){
				echo "display:none;";
			}?>">
				<th colspan="5" class="text-left">OTHERS</th>
				<tr>
					<td><label>Encoded By</label> <b><?php echo $user["Encoded_By"];?></b></td>
					<td><label>Date Encoded</label> <b><?php echo $newDate = date('F d, Y', strtotime($user["Date_Encoded"]));?></b></td>
					<td><label>Updated By</label> <b><?php echo $user["UpdatedBy"];?></b></td>
					<td><label>Date Updated</label> <b><?php if ($user["DateUpdated"] == "0000-00-00"){echo "N/A";}else{echo $user["DateUpdated"];}?></b></td>
					<td></td>
				</tr>
			</table>
		</div>
		<br>
		<br>
		<br>
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
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).foundation();
	 
	function checkUsername()
	{
		jQuery.ajax({
		url: "check_availability.php",
		data: "Applicant_BReN="+$("#Applicant_BReN").val(),
		type: "POST",
		
		success:function(data){
			$("#check-username").html(data);
		},
		error:function(){}
		});
	}
	
		function checkregionalID()
	{
		jQuery.ajax({
		url: "check_availability_regional_id.php",
		data: "Regional_ID="+$("#Regional_ID").val(),
		type: "POST",
		
		success:function(data){
			$("#check-regional-id").html(data);
		},
		error:function(){}
		});
	}
	  
	 
    </script>

	</body>
</html>