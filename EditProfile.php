<?php
include('server.php');
if(empty($_SESSION['username'])){
	header("Location: error_page.php");
}
$_SESSION['username'];
$_SESSION['region'];
$_SESSION['userlevel'];

$_POST['ID'];


			$search = $conn->prepare("SELECT * FROM beneficiary WHERE GIP_ID= :ID");
			$search-> execute(array( ':ID' => $_POST['ID']));
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
    <title>Government Internship Program</title>
	<link rel="icon" href="giplogo.png">
    <link rel="stylesheet" href="css/foundation/foundation.css" />
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/footer/footer_layout.css" />
    
    <link rel="stylesheet" href="theme.css"/>
	<style>
	input {text-transform: uppercase;}
	th{
		background-color: gray;
		color:white;
	}
	tr{
		bacground-color:white;
	}
	table tr:nth-of-type(even) {
    background-color: transparent !important;
}
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
					echo "href='encoder.php'";}else {echo "href='profile.php'";}
					?> ><?php 
					
					if($_SESSION['userlevel']=="Encoder"){
					echo "Dashboard";}else echo "Home";
					?></a>
				</li>
                <li><a  href="registration.php">Add Beneficiaries</a></li>
                <li class="active"><a href="beneficiaries.php">View Beneficiaries</a></li>
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
					<li><a data-open='exampleModal'>Log out</a></li>
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
              <a href="#"><h1 class="title-bar-title">G I P</h1></a>
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

<!-- main content-->
    <div id="main-content">
<form action="./process/updatebeneficiaries.php" method="POST">
	<div class="row">
		<div class="large-12 columns">
					<nav aria-label="You are here:" role="navigation">
			  <ul class="breadcrumbs">
				<li><a href="beneficiaries.php">View</a></li>
				<li class="secondary label"><a href="#0">Update Beneficiary Profile</a></li>
			  </ul>
			</nav>
		</div>
	</div>
	<div class="row" class="text-right">
		<div class="large-3 columns" >
			<label style="<?php if($RA_user || $A_user){echo "display:none";}else{ echo "display:block";}?>"><input type="checkbox" id ="chbReAdmitted" name="chbReAdmitted" onClick="showform1()">Re-Admitted</label>
		</div>
		<div class="large-3 columns">
			<label style="<?php if($RA_user || $A_user){echo "display:none";}else{ echo "display:block";}?>"><input type="checkbox" id ="chbAbsorb" name="chbAbsorb" onClick="showform2()">Absorb</label>
		</div>
		<div class="large-6 columns">
			
		</div>
	</div>
	<div class="row">
		<div class="large-12 columns">
			<div class="text-center" 	class="large-12 columns" style="background-color:gray;padding:10px;color:white;">
				<b>PROFILE</b>
			</div>
		</div>
		<div class="large-2 columns">
			<label>Region</label>
			<input type="text" name="Region" value="<?php echo $user["Region"];?>">  
		</div>
		<div class="large-2 columns">
			<label>GIP ID No</label>
			<input type="text" ID ="Regional_ID" name="Regional_ID" value="<?php echo $user["GIP_ID"];?>" onInput="checkregionalID()" readOnly>
			<label><span id="check-regional-id"></span></label>
		</div>
		<div class="large-2 columns">
			<label>Birth Reference Number</label>
			<input type="text"  name="BReN" id="BReN" onInput="checkUsername()" autocomplete="off"  value="<?php echo $user["BReN"];?>"></input>
			<label><span id="check-username"></span></label>
		</div>
		<div class="large-4 columns">
			<label>VALID GOVERNMENT ID</label>
				<select name="ValidID">
					<option <?php if($user["ID"] == "UMID"){echo "selected='selected'";};?> value="UMID">UMID</option>
					<option <?php if($user["ID"] == "DRIVER'S LICENSE"){echo "selected='selected'";};?> value="DRIVER'S LICENSE">DRIVER'S LICENSE</option>
					<option <?php if($user["ID"] == "PASSPORT"){echo "selected='selected'";};?> value="PASSPORT">PASSPORT</option>
					<option <?php if($user["ID"] == "VOTER'S ID"){echo "selected='selected'";};?> value="VOTER'S ID">VOTER'S ID</option>
					<option <?php if($user["ID"] == "PHILIPPINE IDENTIFICATION ID(PhilID)"){echo "selected='selected'";};?> value="PHILIPPINE IDENTIFICATION ID(PhilID)">PHILIPPINE IDENTIFICATION ID(PhilID)</option>
					<option <?php if($user["ID"] == "NBI CLEARANCE"){echo "selected='selected'";};?> value="NBI CLEARANCE">NBI CLEARANCE</option>
					<option <?php if($user["ID"] == "BIR (TIN ID)"){echo "selected='selected'";};?> value="BIR (TIN ID)">BIR (TIN ID)</option>
					<option <?php if($user["ID"] == "PAG-IBIG ID"){echo "selected='selected'";};?> value="PAG-IBIG ID">PAG-IBIG ID</option>
					<option <?php if($user["ID"] == "PERSON'S WITH DISABILITY(PWD) ID"){echo "selected='selected'";};?> value="PERSON'S WITH DISABILITY(PWD) ID">PERSON'S WITH DISABILITY(PWD) ID</option>
					<option <?php if($user["ID"] == "PANTAWID PAMILYA PILIPINO PROGRAM(4Ps) ID"){echo "selected='selected'";};?> value="PANTAWID PAMILYA PILIPINO PROGRAM(4Ps) ID">PANTAWID PAMILYA PILIPINO PROGRAM(4Ps) ID</option>
					<option <?php if($user["ID"] == "PHILIPPINE POSTAL ID"){echo "selected='selected'";};?> value="PHILIPPINE POSTAL ID">PHILIPPINE POSTAL ID</option>
					<option <?php if($user["ID"] == "PHIL-HEALTH ID"){echo "selected='selected'";};?> value="PHIL-HEALTH ID">PHIL-HEALTH ID</option>
					<option <?php if($user["ID"] == "SCHOOL ID"){echo "selected='selected'";};?> value="SCHOOL ID">SCHOOL ID</option>
					<option <?php if($user["ID"] == "N/A"){echo "selected='selected'";};?> value="N/A">N/A</option>
				</select>
		</div>
		<div class="large-2 columns">
			<label>ID Number</label>
			<input type="text" name="ValidIDNo" value="<?php echo $user["ID_No"];?>"></input>
		</div>
	</div>



	<div class="row">
	
		<div class="large-12 columns">


	
	
	<!--START OF FILLED UPDATED DETAILS -->
	<div style="<?php if($RA_user){echo "display:block";}else{ echo "display:none";}?>">
	<div class="row" style="background-color:gray;padding:10px;color:white;">
		<div class="large-10 columns">
			RE-ADMITTED INFORMATION
		</div>
		<div class="large-2 columns">
		<button>DELETE RE-ADMITTED DATA</button>
		</div>
		</div>
		<div class="large-3 columns">
						<label>Contract Start Date</label>
						<input type="date" name="RA_StartDate" value="<?php echo $RA_user['RA_ContactStartDate']; ?>">
					</div>
					<div class="large-3 columns">
						<label>Contract End Date</label>
						<input type="date" name="RA_EndDate" value="<?php echo $RA_user['RA_ContractEndDate']; ?>">
					</div>
					<div class="large-3 columns">
						<label>Nature of Work/Assignment</label>
						<input type="text" name="RA_NatureofWork" value="<?php echo $RA_user['RA_NatureOfWork']; ?>">
					</div>
					<div class="large-3 columns"
					<label>*Place of assignment</label>
								<select id="Applicant_Place_Of_Assignment" name="RA_PlaceofAssignment">
									<option disabled>  </option>
									<option <?php if($RA_user["RA_PlaceOfAssignment"] == "DOLE"){echo "selected='selected'";};?> value="DOLE">DOLE</option>
									<option <?php if($RA_user["RA_PlaceOfAssignment"] == "OTHER NGAs/ENTITIES"){echo "selected='selected'";};?> value="OTHER NGAs/ENTITIES">OTHER NGAs/ENTITIES</option>
									<option <?php if($RA_user["RA_PlaceOfAssignment"] == "PUBLIC / GOVERNMENT HOSPITAL"){echo "selected='selected'";};?> value="PUBLIC / GOVERNMENT HOSPITAL">PUBLIC / GOVERNMENT HOSPITAL</option>
									<option <?php if($RA_user["RA_PlaceOfAssignment"] == "STATE UNIVERSITIES / PUBLIC SCHOOL / EDUCATIONAL INSTITUTION"){echo "selected='selected'";};?> value = "STATE UNIVERSITIES / PUBLIC SCHOOL / EDUCATIONAL INSTITUTION">STATE UNIVERSITIES / PUBLIC SCHOOL / EDUCATIONAL INSTITUTION</option>
									<option <?php if($RA_user["RA_PlaceOfAssignment"] == "HOUSE OF REPRESENTATIVES"){echo "selected='selected'";};?> value="HOUSE OF REPRESENTATIVES" >HOUSE OF REPRESENTATIVES</option>
									<option <?php if($RA_user["RA_PlaceOfAssignment"] == "GFIs"){echo "selected='selected'";};?> value="GFIs">GFIs</option>
									<option <?php if($RA_user["RA_PlaceOfAssignment"] == "LGUs"){echo "selected='selected'";};?> value="LGUs">LGUs</option>
									<option <?php if($RA_user["RA_PlaceOfAssignment"] == "GOCCs"){echo "selected='selected'";};?> value="GOCCs">GOCCs</option>
								</select>
							</div>
					<div class="row">
						<div class="large-6 columns">
								<label>Additional Requirements submitted for Re-Admission</label>
								<label><input type="checkbox" name="D1" value="Performace Evaluation Rating" <?php if($RA_user["RA_D1"] == "N/A"){}else{echo "checked";}?>>Performace Evaluation Rating</label>
								<label><input type="checkbox" name="D2" value="Certification for Skills Enhancement" <?php if($RA_user["RA_D2"] == "N/A"){}else{echo "checked";}?>>Certification for Skills Enhancement</label>
								<label><input type="checkbox" name="D3" value="Intent to Hire" <?php if($RA_user["RA_D3"] == "N/A"){}else{echo "checked";}?>>Intent to Hire</label>
						</div>
					</div>
	</div>
	
	<div style="<?php if($A_user){echo "display:block";}else{ echo "display:none";}?>">
		<div class="row" style="background-color:gray;padding:10px;color:white;">
			<div class="large-12 columns">
				ABSORBED INFORMATION
			</div>
		</div>
		<div class="row">
			<div class="large-3 columns">
			<label>Date Absorbed</label>
			<input type="date" name="RA_StartDate" value="<?php echo $A_user['AbsorbedDate'];?>">
			</div>
			<div class="large-3 columns">
			<label>Position Title</label>
			<input type="text" name="A_PositionTitle" value="<?php echo $A_user['PositionTitle'];?>">
			</div>
			<div class="large-3 columns">
			<label>Nature of Work/Assignment</label>
			<input type="text" name="A_PositionTitle" value="<?php echo $A_user['NatureOfWork'];?>">
			</div>
			<div class="large-3 columns">
			<label>Name of the Place of Assignment</label>
			<input type="text" name="A_PositionTitle" value="<?php echo $A_user['NPlaceOfAssignment'];?>">
			</div>
			<div class="large-6 columns">
				<label>*Place of assignment</label>
					<select id="Applicant_Place_Of_Assignment" name="RA_PlaceofAssignment">
						<option disabled>  </option>
						<option <?php if($A_user['PlaceOfAssignment'] == "DOLE"){echo "selected='selected'";};?> value="DOLE">DOLE</option>
						<option <?php if($A_user['PlaceOfAssignment'] == "OTHER NGAs/ENTITIES"){echo "selected='selected'";};?> value="OTHER NGAs/ENTITIES">OTHER NGAs/ENTITIES</option>
						<option <?php if($A_user['PlaceOfAssignment'] == "PUBLIC / GOVERNMENT HOSPITAL"){echo "selected='selected'";};?> value="PUBLIC / GOVERNMENT HOSPITAL">PUBLIC / GOVERNMENT HOSPITAL</option>
						<option <?php if($A_user['PlaceOfAssignment'] == "STATE UNIVERSITIES / PUBLIC SCHOOL / EDUCATIONAL INSTITUTION"){echo "selected='selected'";};?> value = "STATE UNIVERSITIES / PUBLIC SCHOOL / EDUCATIONAL INSTITUTION">STATE UNIVERSITIES / PUBLIC SCHOOL / EDUCATIONAL INSTITUTION</option>
						<option <?php if($A_user['PlaceOfAssignment'] == "HOUSE OF REPRESENTATIVES"){echo "selected='selected'";};?> value="HOUSE OF REPRESENTATIVES" >HOUSE OF REPRESENTATIVES</option>
						<option <?php if($A_user['PlaceOfAssignment'] == "GFIs"){echo "selected='selected'";};?> value="GFIs">GFIs</option>
						<option <?php if($A_user['PlaceOfAssignment'] == "LGUs"){echo "selected='selected'";};?>  value="LGUs">LGUs</option>
						<option <?php if($A_user['PlaceOfAssignment'] == "GOCCs"){echo "selected='selected'";};?> value="GOCCs">GOCCs</option>
					</select>
			</div>
			<div class="large-6 columns">
			</div>
		</div>
	</div>
	
	<!--END OF FILLED UPDATED DETAILS -->
		   
	<div id="hiddenField" style="display:none">
		<div class="row">
			<div class="large-12 columns">
				<div class="row" style="background-color:gray;padding:10px;color:white;">
					<div class="large-12 columns">
						RE-ADMITTED INFORMATION
					</div>
				</div>
				<div class="row">
					<div class="large-3 columns">
						<label>Contract Start Date</label>
						<input type="date" name="RA_StartDate">
					</div>
					<div class="large-3 columns">
						<label>Contract End Date</label>
						<input type="date" name="RA_EndDate">
					</div>
					<div class="large-3 columns">
						<label>Nature of Work/Assignment</label>
						<input type="text" name="RA_NatureofWork">
					</div>
					<div class="large-3 columns">
						<label>*Place of assignment</label>
								<select id="Applicant_Place_Of_Assignment" name="RA_PlaceofAssignment">
									<option disabled>  </option>
									<option value="DOLE">DOLE</option>
									<option value="OTHER NGAs/ENTITIES">OTHER NGAs/ENTITIES</option>
									<option value="PUBLIC / GOVERNMENT HOSPITAL">PUBLIC / GOVERNMENT HOSPITAL</option>
									<option value = "STATE UNIVERSITIES / PUBLIC SCHOOL / EDUCATIONAL INSTITUTION">STATE UNIVERSITIES / PUBLIC SCHOOL / EDUCATIONAL INSTITUTION</option>
									<option value="HOUSE OF REPRESENTATIVES" >HOUSE OF REPRESENTATIVES</option>
									<option value="GFIs">GFIs</option>
									<option value="LGUs">LGUs</option>
									<option value="GOCCs">GOCCs</option>
								</select>
					</div>
					</div>
				</div>
				<div class="row">
					<div class="large-3 columns">
							<label>Name of the Place of Assignment</label>
							<input type="text" name="RA_NameofPlaceofAssignment">
					</div>
					<div class="large-3 columns">
						<label>Additional Requirements submitted for Re-Admission</label>
						<label><input type="checkbox" name="D1" value="Performace Evaluation Rating" >Performace Evaluation Rating</label>
						<label><input type="checkbox" name="D2" value="Certification for Skills Enhancement" >Certification for Skills Enhancement</label>
						<label><input type="checkbox" name="D3" value="Intent to Hire" >Intent to Hire</label>
					</div>
					<div class="large-6 columns">
					</div>
				</div>
			</div>
		</div>
	
		<div id="hiddenField1" style="display:none">
		<div class="row">
			<div class="large-12 columns">
					
							<div class="large-12 columns"style="background-color:gray;padding:10px;color:white;">
								ABSORB INFORMATION
							</div>
						<br>
						<div class="row">
							<div class="large-3 columns">
							<label>Date Absorbed</label>
							<input type="date" name="A_DateAbsorb">
							</div>
							<div class="large-3 columns">
							<label>Position Title</label>
							<input type="text" name="A_PositionTitle">
							</div>
							<div class="large-3 columns">
							<label>Nature of Work/Assignment</label>
							<input type="text" name="A_NatureofWork">
							</div>
							<div class="large-3 columns">
							<label>*Place of assignment</label>
							<select id="Applicant_Place_Of_Assignment" name="A_PlaceofAssignment">
								<option><--Please choose an option--></option>
								<option value="DOLE">DOLE</option>
								<option value="OTHER NGAs/ENTITIES">OTHER NGAs/ENTITIES</option>
								<option value="PUBLIC / GOVERNMENT HOSPITAL">PUBLIC / GOVERNMENT HOSPITAL</option>
								<option value = "STATE UNIVERSITIES / PUBLIC SCHOOL / EDUCATIONAL INSTITUTION">STATE UNIVERSITIES / PUBLIC SCHOOL / EDUCATIONAL INSTITUTION</option>
								<option value="HOUSE OF REPRESENTATIVES" >HOUSE OF REPRESENTATIVES</option>
								<option value="GFIs">GFIs</option>
								<option value="LGUs">LGUs</option>
								<option value="GOCCs">GOCCs</option>
							</select>
							</div>
						</div>
						<div class="row">
							<div class="large-3 columns">
							<label>Name of the Place of Assignment</label>
							<input type="text" name="A_NamePlaceofAssignment">
							</div>
						</div>
			</div>
		</div>
	</div>
			<table>
				<th colspan="6" class="text-left">PERSONAL DETAILS</th>
				<tr>
					<td>
						<label>First Name </label>
						<input type="text" name="FirstName" value="<?php echo $user["First_Name"];?>">
					</td>
					<td>
						<label>Middle Name </label>
						<input type="text" name="MiddleName" value="<?php echo $user["Middle_Name"];?>">
					</td>
					<td>
						<label>Last Name </label>
						<input type="text" name="LastName" value="<?php echo $user["Last_Name"];?>">
					</td>
					<td>
						<label>Suffix</label>
						<input type="text" name="Suffix" value="<?php echo $user["Suffix"];?>">
					</td>
					<td>
								<td><label>Gender </label>
					<select name="Gender">
						<option <?php if($user["Gender"] == "MALE"){echo "selected='selected'";};?> value="MALE">MALE</option>
						<option <?php if($user["Gender"] == "FEMALE"){echo "selected='selected'";};?> value="FEMALE">FEMALE</option>
					</select>
					</td>
					</td>
				<tr>
		
					
					<td>
					<label>Civil Status </label>
					<select name="CivilStatus">
						<option <?php if($user["Civil_Status"] == "SINGLE"){echo "selected='selected'";};?> value="SINGLE">SINGLE</option>
						<option <?php if($user["Civil_Status"] == "MARRIED"){echo "selected='selected'";};?> value="MARRIED">MARRIED</option>
						<option <?php if($user["Civil_Status"] == "WIDOW"){echo "selected='selected'";};?> value="WIDOW">WIDOW</option>
					</select>
					
					
					</td>
					<td>
						<label>Place of Birth </label> 
						<input type="text" name="BirthPlace" value="<?php echo $user["Birth_Place"];?>">
					</td>
					<td>
						<label>Date of Birth </label> 
						<input type="date" onChange="ageCalculators()" id="Applicant_Birth_Date" name="BirthDate" value="<?php echo $user["Birth_Date"];?>">
					
					</td>
					<td>
						<label>Age</label> 
						<input type="number" id ="Applicant_Age" name="Age" value="<?php echo $user["Age"];?>">
					</td>
					<td>
					</td>
					
					<script>
					function ageCalculators() {
    var userinput = document.getElementById("Applicant_Birth_Date").value;
    var dob = new Date(userinput);
    if(userinput==null || userinput=='') {
      document.getElementById("message").innerHTML = "**Choose a date please!";  
      return false; 
    } else {
    
    //calculate month difference from current date in time
    var month_diff = Date.now() - dob.getTime();
    
    //convert the calculated difference in date format
    var age_dt = new Date(month_diff); 
    
    //extract year from date    
    var year = age_dt.getUTCFullYear();
    
    //now calculate the age of the user
    var age = Math.abs(year - 1970);
    
    //display the calculated age
    return document.getElementById("Applicant_Age").value= age;
    }
}
					</script>
				</tr>
			</table>
			<table border="1">
				<th colspan="5" class="text-left">ADDRESS</th>
				<tr>
					<td>
						<label>Street No.</label>
						<input type="text" name="StreetNo" value="<?php echo $user["Street_No"];?>">
					</td>
					<td>
						<label>Barangay </label>
						<input type="text" name="Barangay" value="<?php echo $user["Barangay"];?>">
					</td>
					<td>
						<label>City </label>
						<input type="text" name="City" value="<?php echo $user["City"];?>">
					</td>
					<td>
						<label>Province </label>
						<input type="text" name="Province" value="<?php echo $user["Province"];?>">
					<td>
						<label>Postal Code </label>
						<input type="text" name="PostalCode" value="<?php echo $user["Postal_Code"];?>">
				</tr>
			</table>
			<table border="1">
				<th colspan="5" class="text-left">CONTACT DETAILS</th>
				<tr>
					<td>
						<label>Telephone No.</label>
						<input type="text" name="TelephoneNo" value="<?php echo $user["Telephone_No"];?>">
					<td>
						<label>Mobile No.</label>
						<input type="text" name="MobileNo" value="<?php echo $user["Mobile_No"];?>">
					<td>
						<label>Email Address </label>
						<input type="text" name="Email" value="<?php echo $user["Email"];?>">
				</tr>
			</table>
			<table border="1">
				<th colspan="5" class="text-left">EDUCATIONAL BACKGROUND</th>
				<tr>
					<td>
						<label>Attainment</label>
						<select name="Attainment">
							<option <?php if($user["Attainment"] == "HIGH SCHOOL GRADUATE"){echo "selected='selected'";};?> value="HIGH SCHOOL GRADUATE">HIGH SCHOOL GRADUATE</option>
							<option <?php if($user["Attainment"] == "SENIOR HIGH SCHOOL GRADUATE"){echo "selected='selected'";};?>value="SENIOR HIGH SCHOOL GRADUATE">SENIOR HIGH SCHOOL GRADUATE</option>
							<option <?php if($user["Attainment"] == "TECHNICAL VOCATIONAL GRADUATE"){echo "selected='selected'";};?>value="TECHNICAL VOCATIONAL GRADUATE">TECHNICAL VOCATIONAL GRADUATE</option>
							<option <?php if($user["Attainment"] == "COLLEGE UNDERGRADUATE"){echo "selected='selected'";};?>value="COLLEGE UNDERGRADUATE">COLLEGE UNDERGRADUATE</option>
							<option <?php if($user["Attainment"] == "COLLEGE GRADUATE"){echo "selected='selected'";};?>value="COLLEGE GRADUATE">COLLEGE GRADUATE</option>
						</select>
					</td>
					<td>
						<label>School / Training Institution</label>
						<input type="text" name="School" value="<?php echo $user["School"];?>">
					</td>
					<td>
						<label>Date Graduated / Year Last Attended</label>
						<input type="date" name="DateGraduated" value="<?php echo $user["Date_Graduated"];?>">
					</td>
					<td>
						<label>Document Submitted </label>
						<select name="DocumentSubmitted">
							<option <?php if($user["Submitted_Document"] == "TRANSCRIPT OF RECORD"){echo "selected='selected'";};?> ="TRANSCRIPT OF RECORD">TRANSCRIPT OF RECORD</option>
							<option <?php if($user["Submitted_Document"] == "FORM 136 / FORM 137"){echo "selected='selected'";};?> value="FORM 136 / FORM 137">FORM 136 / FORM 137</option>
							<option <?php if($user["Submitted_Document"] == "DIPLOMA / CERTIFICATE OF GRADUATION"){echo "selected='selected'";};?> value="DIPLOMA / CERTIFICATE OF GRADUATION">DIPLOMA / CERTIFICATE OF GRADUATION</option>
						</select>
					<td></td>
				</tr>
				
			</table>
			<table border="1">
				<th colspan="5" class="text-left">CONTRACT DETAILS</th>
				<tr>
					<td>
						<label>Place of assignment</label>
						<select name="PlaceofAssignment">
							<option <?php if($user["Place_of_Assignment"] == "DOLE"){echo "selected='selected'";};?> value="DOLE">DOLE</option>
							<option <?php if($user["Place_of_Assignment"] == "OTHER NGAs/ENTITIES"){echo "selected='selected'";};?> value="OTHER NGAs/ENTITIES">OTHER NGAs/ENTITIES</option>
							<option <?php if($user["Place_of_Assignment"] == "PUBLIC / GOVERNMENT HOSPITAL"){echo "selected='selected'";};?> value="PUBLIC / GOVERNMENT HOSPITAL">PUBLIC / GOVERNMENT HOSPITAL</option>
							<option <?php if($user["Place_of_Assignment"] == "STATE UNIVERSITIES / PUBLIC SCHOOL / EDUCATIONAL INSTITUTION"){echo "selected='selected'";};?> value = "STATE UNIVERSITIES / PUBLIC SCHOOL / EDUCATIONAL INSTITUTION">STATE UNIVERSITIES / PUBLIC SCHOOL / EDUCATIONAL INSTITUTION</option>
							<option <?php if($user["Place_of_Assignment"] == "HOUSE OF REPRESENTATIVES"){echo "selected='selected'";};?> value="HOUSE OF REPRESENTATIVES" >HOUSE OF REPRESENTATIVES</option>
							<option <?php if($user["Place_of_Assignment"] == "GFIs"){echo "selected='selected'";};?> value="GFIs">GFIs</option>
							<option <?php if($user["Place_of_Assignment"] == "LGUs"){echo "selected='selected'";};?> value="LGUs">LGUs</option>
							<option <?php if($user["Place_of_Assignment"] == "GOCCs"){echo "selected='selected'";};?> value="GOCCs">GOCCs</option>
						</select>
					</td>
					<td>
						<label>Start Date</label>
						<input type="date" name="StartDate" value="<?php echo $user["Contract_Start_Date"];?>">
					</td>
					<td>
						<label>Start Date</label>
						<input type="date" name="EndDate" value="<?php echo $user["Contract_End_Date"];?>">
					</td>
					<td>
						<label>Status of Contract</label>
						<select name="StatusofContract">
							<option <?php if($user["Status_of_Contract"] == "ON GOING"){echo "selected='selected'";};?> value="ON GOING">ON GOING</option>
							<option <?php if($user["Status_of_Contract"] == "COMPLETED"){echo "selected='selected'";};?> value="COMPLETED">COMPLETED</option>
							<option <?php if($user["Status_of_Contract"] == "PRE-TERMINATED"){echo "selected='selected'";};?>value="PRE-TERMINATED">PRE-TERMINATED</option>
						</select>
					</td>
					<td>
						<label>Nature of Work / Assignment</label>
						<input type="text" name="NatureofWork" value="<?php echo $user["Nature_of_Work"];?>">
					</td>
					
				</tr>
				<tr>
					<td>
						<label>Name of Institution</label>
						<input type="text" name="NameofInstitution" value="<?php echo $user["Institution"];?>">
					</td>
					<td>
						<label>Salaray</label>
						<input type="number"name="Salary"  value="<?php echo $user["Salary"];?>">
					<td colspan="2">
						<label>Member of disadvantaged group of persons?</label>
						<select  name="MDGP">
							<option <?php if($user["Disability"] == "NO"){echo "selected='selected'";};?> value="NO">NO</option>
							<option <?php if($user["Disability"] == "VICTIM OF ARMED CONFLICT"){echo "selected='selected'";};?> value="VICTIM OF ARMED CONFLICT">VICTIM OF ARMED CONFLICT</option>
							<option <?php if($user["Disability"] == "REBEL RETURNEE"){echo "selected='selected'";};?> value="REBEL RETURNEE">REBEL RETURNEE</option>
							<option <?php if($user["Disability"] == "PERSON WITH DISABILITY"){echo "selected='selected'";};?> value="PERSON WITH DISABILITY">PERSON WITH DISABILITY</option>
							<option <?php if($user["Disability"] == "INDIGINEOUS PEOPLE"){echo "selected='selected'";};?> value="INDIGINEOUS PEOPLE">INDIGINEOUS PEOPLE</option>
						</select>
					</td>
					<td>
						<label>Reason for Pre-Termination</label>
				<input type="text" id="TerminationDetails" name="TerminationDetails" value="<?php echo $user["Details_of_Termination"];?>"></input>
					</td>
				</tr>
				
				
						<input type="hidden" name="UpdatedBy" value="<?php 
			
							$getEncoderName = $conn->prepare("SELECT * FROM users WHERE UserName = :username");
							$getEncoderName->execute(array(':username'=>$_SESSION['username']));
							if($getEncoderName){
								$EncoderName = $getEncoderName->fetch();
								echo $EncoderName[1]." ". $EncoderName[3];
							}
							
							?> ">
						<input type="hidden" name="DateUpdated" value="<?php echo date("Y-m-d");?>">;
		
			</table>

			<input type="submit" class="success button" value="UPDATE DETAILS" ></input>
		</div>
		</form>
		
	</div>
							<!-- UPDATE CONFIRMATION-->
								<div class="row"data-open='exampleModal'>
									<div class="reveal" id="exampleModal" data-reveal>
										<h5 class="text-center">Are you sure you want to update this record?</h5>
										<br>
										<div class="text-center">
										<a class="button" text="No" data-close aria-label="Close reveal">NO</a>
										<a type="submit" class="button" value="Yes">YES</a>
										</div>
									</div>
								</div>
						<!-- END UPDATE CONFIRMATION-->
<!-- main content end -->

<!--Standard Footer-->
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

<div><a  href="#main-nav" id="back-to-top" title="Back to Top"><i class="fa fa-arrow-circle-up fa-3x" aria-hidden="true"></i>


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
		

	 
	function checkUsername()
		{
			jQuery.ajax({
			url: "check_availability_bren.php",
			data: "BReN="+$("#BReN").val(),
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

	function onlyOne(checkbox) 
		{
		var checkboxes = document.getElementsByName('check')
		var getName = document.getElementById();
		checkboxes.forEach((item) => {
			if (item !== checkbox) item.checked = false
		})
		}
		
	function showform1()
	{
		var cb1 = document.getElementById("chbReAdmitted");
		var cb2 = document.getElementById("chbAbsorb");
		
		if(cb1.checked == true){
			$("#hiddenField").fadeIn();
		}else{
			$("#hiddenField").fadeOut();
		}
	
			cb2.checked = false;
			$("#hiddenField1").fadeOut();
	}
		function showform2()
	{
		var cb1 = document.getElementById("chbReAdmitted");
		var cb2 = document.getElementById("chbAbsorb");
		
		if(cb2.checked == true){
			$("#hiddenField1").fadeIn();
		}else{
			$("#hiddenField1").fadeOut();
		}
			cb1.checked = false;
			$("#hiddenField").fadeOut();
		
	}
			function ageCalculator() {
    var userinput = document.getElementById("Applicant_Birth_Date").value;
	
    var dob = new Date(userinput); 
    if(userinput==null || userinput=='') {
      document.getElementById("message").innerHTML = "Choose a date please!"; 
	  document.getElementById("Applicant_Birth_Date").innerHTML ="";
      return false; 
    } else {
    document.getElementById("message").innerHTML = "";
    //calculate month difference from current date in time
    var month_diff = Date.now() - dob.getTime();
    
    //convert the calculated difference in date format
    var age_dt = new Date(month_diff); 
    
    //extract year from date    
    var year = age_dt.getUTCFullYear();
    
    //now calculate the age of the user
    var age = Math.abs(year - 1970);
    
    //display the calculated age
    return document.getElementById("Applicant_Age").value =  age;
    }
}
	
    </script>
	

	</body>
</html>

