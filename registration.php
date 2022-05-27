<?php
include('server.php');
if(empty($_SESSION['username'])){
	header("Location: error_page.php");
}
$_SESSION['username'];
$_SESSION['userlevel']

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
	input {text-transform: uppercase;}
	th{
		background-color: gray;
		color:white;
	}
	tr{
		bacground-color:white;
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
					echo "href='encoder.php'";}else echo "href='profile.php'";
					?> ><?php 
					
					if($_SESSION['userlevel']=="Encoder"){
					echo "Dashboard";}else echo "Home";
					?></a>
				</li>
                <li class="active"><a  href="registration.php">Add Beneficiaries</a></li>
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
                    <li><a <?php  
					
					if($_SESSION['userlevel']=="Encoder"){
					echo "href='encoder.php'";}else echo "href='profile.php'";
					?> ><?php 
					
					if($_SESSION['userlevel']=="Encoder"){
					echo "Dashboard";}else echo "Home";
					?></a></li>
					<li class='active'	><a href="registration.php">Add Beneficiaries</a></li>
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
	
	<form data-abide novalidate action="./process/addbeneficiaries_process.php" method="POST" id="form" class="form" onSubmit="CheckInputs()">
	
		<div class="row">
		<div class="large-12 columns">
			<h1 class="text-center">GIP Registration</h1>
			<p> - Field with asterisk  (*) are required fields</p>
			<p> - Only processed and validated GIP Beneficiaries should be encoded.</p>
		</div>
		<hr>
		
	</div>  <!-- row end -->
	
	<div class="row">
	<div class="large-12 columns">
	<?php 
	if(isset($_SESSION['STATUS'])){
	 echo '
	 <div class="callout success" data-closable="slide-out-right">
		<h5>Data inserted successfully!</h5>
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
		<div class="lage-12 columns">
			<div class="text-center" 	class="large-12 columns" style="background-color:gray;padding:10px;color:white;">
				<b>IDENTIFIERS</b>
			</div>
			
			<div class="large-2 columns">
			<label>Region
			<select name="Applicant_Region" required>
				<option value=""></option>
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
			</label >
			</div>
			<div class="large-2 columns">
			<label>GIP ID*
			<input type="text" name="Regional_ID" id="Regional_ID" onInput="checkregionalID()" required></input>
			</label>
			<label><span id="check-regional-id"></span></label>
			</div>
			<div class="large-2 columns">
			<label>Birth Reference Number*
			<input type="text"  name="Applicant_BReN" id="Applicant_BReN" onInput="checkUsername()" autocomplete="off"  required></input>
			<label><span id="check-username"></span></label>
			</label>
			

			</div>
			<div class="large-2 columns">
			<label>ID Presented*
					<select name="IDPresented" required>
					<option value=""></option>
					<option value="UMID">UMID</option>
					<option value="DRIVER'S LICENSE">DRIVER'S LICENSE</option>
					<option value="PASSPORT">PASSPORT</option>
					<option value="VOTER'S ID">VOTER'S ID</option>
					<option value="PHILIPPINE IDENTIFICATION ID(PhilID)">PHILIPPINE IDENTIFICATION ID(PhilID)</option>
					<option value="NBI CLEARANCE">NBI CLEARANCE</option>
					<option value="BIR (TIN ID)">BIR (TIN ID)</option>
					<option value="PAG-IBIG ID">PAG-IBIG ID</option>
					<option value="PERSON'S WITH DISABILITY(PWD) ID">PERSON'S WITH DISABILITY(PWD) ID</option>
					<option value="PANTAWID PAMILYA PILIPINO PROGRAM(4Ps) ID">PANTAWID PAMILYA PILIPINO PROGRAM(4Ps) ID</option>
					<option value="PHILIPPINE POSTAL ID">PHILIPPINE POSTAL ID</option>
					<option value="PHIL-HEALTH ID">PHIL-HEALTH ID</option>
					<option value="SCHOOL ID">SCHOOL ID</option>
					<option value="N/A">N/A</option>
					</select>
			</div>
			</label>
			<div class="large-2 columns">
			<label>ID Number*
				<input type="text" name="IDNumber" required></input>
			</label>
			</div>
			<div class="large-2 columns">
			</div>
		</div>
	</div>
		<div class="row">
			<div class="large-12 columns">
				<div class="text-center" class="large-12 columns" style="background-color:gray;padding:10px;color:white;">
					<b>PERSONAL INFORMATION</b>
				</div>
				<br>
				<div class="large-3 columns">
					<label>Last Name*
					<input type="text" id ="Applicant_Last_Name" name="Applicant_Last_Name" autocomplete="off" required> 
					</label>
				</div>
				<div class="large-3 columns">
					<label>First Name*
					<input type="text" id="Applicant_First_Name" name="Applicant_First_Name" autocomplete="off" required> 
					</label>
				</div>
				<div class="large-3 columns">
					<label>Middle Name*
					<input type="text" id="Applicant_Middle_Name"name="Applicant_Middle_Name" autocomplete="off" required> 
					</label>
				</div>
				<div class="large-3 columns">
					<label>Suffix(Optional)</label>
					<input type="text" id = "Applicant_Suffix_Name" name="Applicant_Suffix_Name" autocomplete="off"> 
				</div>
				<div class="large-2 columns">
					<label>Gender at Birth*
						<select id ="Applicant_Gender" name="Applicant_Gender" required>
							<option value=""></option>
							<option value="MALE">MALE</option>
							<option value="FEMALE">FEMALE</option>
						</select>
					</label>
				</div>
				<div class="large-2 columns">
					<label>Civil Status*</label>
						<select id = "Applicant_Civil_Status" name="Applicant_Civil_Status" required>
							<option value=""></option>
							<option value="SINGLE">SINGLE</option>
							<option value="MARRIED">MARRIED</option>
							<option value="WIDOW">WIDOW</option>
						</select>
				</div>
				<div class="large-2 columns">
					<label>Place of Birth*
					<input type="text" id="Applicant_Place_Of_Birth" name="Applicant_Place_Of_Birth" autocomplete="off"></input>
					</label>
				</div>
				<div class="large-2 columns">
				<label>Date of Birth*
					<input type="date" onChange="ageCalculator()" id="Applicant_Birth_Date" name="Applicant_Birth_Date"autocomplete="off" required></input>
				</label>
				</div>
				<div class="large-2 columns">
					<label>Age</label>
					<input type="number" id="Applicant_Age" name="Applicant_Age" autocomplete="off" pattern="number"></input>
				</div>
				<div class="large-2 columns">
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="large-12 columns">
				<div class="text-center" class="large-12 columns" style="background-color:gray;padding:10px;color:white;">
						<b>ADDRESS</b>
				</div>
				<div class="large-2 columns">
					<label>Street No.</label>
					<input type="text" id ="Applicant_Street_No" name="Applicant_Street_No" autocomplete="off">
				</div>
				<div class="large-2 columns">
					<label>Barangay*
					<input type="text" id ="Applicant_City" name="Applicant_Barangay" autocomplete="off" required>
					</label>
				</div>
				<div class="large-2 columns">
					<label>City*
						<input type="text" id ="Applicant_City" name="Applicant_City" autocomplete="off" required>
					</label>
				</div>
				<div class="large-2 columns">
					<label>Province*
					<input type="text" id="Applicant_Street" name="Applicant_Province" autocomplete="off" required>
					</label>
				</div>
				<div class="large-2 columns">
					<label>Postal Code
					<input type="text" id="Applicant_Postal_Code" name="Applicant_Postal_Code" autocomplete="off">
					</label>
				</div>	
				<div class="large-2 columns">
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="large-12 columns">
				<div class="text-center" 	class="large-12 columns" style="background-color:gray;padding:10px;color:white;">
				<b>CONTACT DETAILS</b>
				</div>
				<div class="large-12 colmns">
					<div class="large-3 columns">
					<label>Telephone No.</label>
					<input type="text" id="Applicant_Telephone_No" name="Applicant_Telephone_No" autocomplete="off"></input>
				</div>
				<div class="large-3 columns">
					<label>Mobile Number*
					<input type="text" id="Applicant_Mobile_No" name="Applicant_Mobile_No" autocomplete="off" required></input>
					</label>
				</div>
				<div class="large-3 columns">
					<label>Email Address*
					<input type="text" id="Applicant_Email_Address" name="Applicant_Email_Address" autocomplete="off" required></input>
					</label>
				</div>
				<div class="large-3 columns">
					
				</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<div class="text-center" 	class="large-12 columns" style="background-color:gray;padding:10px;color:white;">
				<b>EDUCATIONAL BACKGROUND</b>
				</div>
				<div class="large-3 columns">
					<label>Attainment*
						<select id="Attainment" name="Attainment" required>
							<option value=""></option>
							<option value="HIGH SCHOOL GRADUATE">HIGH SCHOOL GRADUATE</option>
							<option value="SENIOR HIGH SCHOOL GRADUATE">SENIOR HIGH SCHOOL GRADUATE</option>
							<option value="TECHNICAL VOCATIONAL GRADUATE">TECHNICAL VOCATIONAL GRADUATE</option>
							<option value="COLLEGE UNDERGRADUATE">COLLEGE UNDERGRADUATE</option>
							<option value="COLLEGE GRADUATE">COLLEGE GRADUATE</option>
						</select>
					</label>
			</div>
			
			<div class="large-3 columns">
				<label>Name of School / Training Institution*
				<input type="text" id="Applicant_School" name="Applicant_School" required></input>
				</label>
			</div>
			<div class="large-3 columns">
				<label>Date Graduated / School Year Last Attended*
				<input type="date" id="Applicant_Graduation_Date" name="Applicant_Graduation_Date" required></input>
				</label>
			</div>
			<div class="large-3 columns">
				<label>Document Submitted*
					<select id="Applicant_Submitted_Documnet" name="Applicant_Submitted_Document" required>
						<option value=""></option>
						<option value="TRANSCRIPT OF RECORD">TRANSCRIPT OF RECORD</option>
						<option value="FORM 136 / FORM 137">FORM 136 / FORM 137</option>
						<option value="DIPLOMA / CERTIFICATE OF GRADUATION">DIPLOMA / CERTIFICATE OF GRADUATION</option>
					</select>
				</label>
			</div>
			</div>
		</div>
		
		<div class="row">
			<div class="large-12 columns">
				<div class="text-center" class="large-12 columns" style="background-color:gray;padding:10px;color:white;">
				CONTRACT<br><p>Employment Details</p>
				</div>	
				<div class="large-3 columns">
					<label>Start Date*
					<input type="date" id="Contract_Start_Date" name="Contract_Start_Date" required>
					</label>
				</div>
				<div class="large-3 columns">
					<label>End Date*
					<input type="date" id="Contract_End_Date" name="Contract_End_Date" required></input>
					</label>
				</div>
				<div class="large-3 columns">
				<label>Member of disadvantaged group of persons?
				<select id="Type_of_Disability" name="Type_of_Disability" required>
					<option value="NO">NO</option>
					<option value="VICTIM OF ARMED CONFLICT">VICTIM OF ARMED CONFLICT</option>
					<option value="REBEL RETURNEE">REBEL RETURNEE</option>
					<option value="PERSON WITH DISABILITY">PERSON WITH DISABILITY</option>
					<option value="INDIGINEOUS PEOPLE">INDIGINEOUS PEOPLE</option>
				</select>
				</label>
				</div>
				<div class="large-3 columns">
					<label>Nature of Work / Assignment* 
					<input type="text" id="Applicant_Nature_Of_Word" name="Applicant_Nature_Of_Work" required></input>
					</label>
				</div>
				<div class="large-3 columns">
				<label>Place of assignment*
				<select id="Applicant_Place_Of_Assignment" name="Applicant_Place_Of_Assignment" required>
					<option value="DOLE">DOLE</option>
					<option value="OTHER NGAs/ENTITIES">OTHER NGAs/ENTITIES</option>
					<option value="PUBLIC / GOVERNMENT HOSPITAL">PUBLIC / GOVERNMENT HOSPITAL</option>
					<option value = "STATE UNIVERSITIES / PUBLIC SCHOOL / EDUCATIONAL INSTITUTION">STATE UNIVERSITIES / PUBLIC SCHOOL / EDUCATIONAL INSTITUTION</option>
					<option value="HOUSE OF REPRESENTATIVES" >HOUSE OF REPRESENTATIVES</option>
					<option value="GFIs">GFIs</option>
					<option value="LGUs">LGUs</option>
					<option value="GOCCs">GOCCs</option>
				</select>
				</label>
				</div>
				<div class="large-3 columns">
				<label>Name of Institution*
				<input type="text" id="Applicant_Institution" name="Applicant_Institution"autocomplete="off" required></input>
				</label>
				</div>
				<div class="large-3 columns">
				<label>Status of Contract*
				<select id="Applicant_Status_Of_Contract" name="Applicant_Status_Of_Contract" required>
					<option value="ON GOING">ON GOING</option>
					<option value="COMPLETED">COMPLETED</option>
					<option value="PRE-TERMINATED">PRE-TERMINATED</option>
				</select>
				</label>
				</div>
				<div class="large-3 columns">
				<label>Reason for Pre-Termination</label>
					<input type="text" id="Applicant_Reason_For_Termination" name="Applicant_Reason_For_Termination" ></input>
				</div>
				<div class="large-3 columns">
				<label>SALARY*
					<input type="number" id="Applicant_Salary" name="Applicant_Salary" required></input>
				</label>
				</div>
				<div class="large-9 columns">
				</div>
			</div>
		</div>

	<!-- This is required -->
	<div class="row">
		<div class="large-12 columns"> 
			<label><input type="checkbox" name="Self_Certification" required>CERTIFICATION: I certify that all the information given in this application are complete and accurate to the best of my knowledge. I acknowledge that I have completely read and understood the DOLE-GIP Guidelines as embodied in Administrative Order No. 1, Series of 2013</label>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="large-3 columns">
			
			<input type="hidden" name="Encoded_By" value="<?php 
			
			$getEncoderName = $conn->prepare("SELECT * FROM users WHERE UserName = :username");
			$getEncoderName->execute(array(':username'=>$_SESSION['username']));
			if($getEncoderName){
				$EncoderName = $getEncoderName->fetch();
				echo $EncoderName[3].",". $EncoderName[1]." ".$EncoderName[2];
			}
			
			?> "></input>
		</div>
		<div class="large-3 columns">
			
			<input type="hidden" value=<?php echo date("Y/m/d"); ?> name="Encoded_Date"></input>
		</div>
			<div class="large-6 columns">
			
		</div>
	</div>
	
	<div class="row">
		<div class="large-6 columns">
			<input type="submit" value="REGISTER" class="submit success button">
			</form>
		</div>
	</div>
	
	<!-- form end -->
	</form>
	
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
	
		function ageCalculator() {
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
    return document.getElementById("Applicant_Age").value = age;
    }
}
	  
	 
    </script>

	</body>
</html>
