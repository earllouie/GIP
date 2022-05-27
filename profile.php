<?php
include('server.php');
$_SESSION['username'];
$_SESSION['userlevel']


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
	

	
	<br>

		<div class="row">
	<div class="large-12 columns">


	<?php 
	if(isset($_SESSION['STATUS'])){
	 echo '
	 <div class="callout success" data-closable="slide-out-right">
		<h5>Data deleted successfully!</h5>
		<button class="close-button" aria-label="Dismiss alert" type="button" data-close>
		<span aria-hidden="true">&times;</span>
		</button>
	 </div>
	 
	 ';
	 unset($_SESSION['STATUS']);
	}
	
	else if(isset($_SESSION['STATUS_A'])){
	 echo	'
	 <div class="callout success" data-closable="slide-out-right">
		<h5>New user created successfully!</h5>
		
	 <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
		<span aria-hidden="true">&times;</span>
		</button>
	 </div>
	 ';
	 unset($_SESSION['STATUS_A']);
	}else if(isset($_SESSION['STATUS_B'])){
	 echo	'
	 <div class="callout success" data-closable="slide-out-right">
		<h5>User data updated successfully!</h5>
		
	 <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
		<span aria-hidden="true">&times;</span>
		</button>
	 </div>
	 ';
	 unset($_SESSION['STATUS_B']);
	}else{
		
	}
	
	if(isset($_SESSION['SUCCESS_SSTORY_UPLOAD_STATUS'])){
	 echo	'
	 <div class="callout alert" data-closable>
		<h5>Success story uploaded successfully!</h5>
		
	 <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
		<span aria-hidden="true">&times;</span>
		</button>
	 </div>
	 ';
	 unset($_SESSION['SUCCESS_SSTORY_UPLOAD_STATUS']);
	}else{
		
	}
	
	
	?>
	</div>
	</div>
	

	
	<div class="row">
		<ul class="accordion" data-accordion>
				  
				  <li class="accordion-item" data-accordion-item>
						<!-- Accordion tab title -->
						<a href="#" class="accordion-title">ADD NEW USER</a>

						<!-- Accordion tab content: it would start in the open state due to using the `is-active` state class. -->
						<div class="accordion-content" data-tab-content>
						
						<button class="button" data-open="Add_New_User">ADD NEW USER</button>
						<button class="button" data-open="View_All_User">VIEW ALL USER</button>
						
				  </li>
					<li class="accordion-item" data-accordion-item>
						<!-- Accordion tab title -->
						<a href="#" class="accordion-title">NEWS AND HIGHLIGHTS</a>

						<!-- Accordion tab content: it would start in the open state due to using the `is-active` state class. -->
						<div class="accordion-content" data-tab-content>
							
							<button class="button" data-open="Add_News">ADD NEWS</button>
							<button class="button"data-open="View_All_News">UPDATE NEWS</button>
							<a href="Home_News.php" target="_blank" rel="noopener noreferrer"class="button">VIEW ALL NEWS</a>
					
							
						</div>
					</li>
				  </form>
			</ul>
		</div>
		
			
		<!-- LOG OUT CONFIRMATION-->
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
	<!-- END OF LOG OUT CONFIRMATION-->
	
	<!-- ADD USER MODAL-->
	<div class="reveal" id="Add_New_User" data-reveal>
	
	
						
		<div class="row">
		<form data-abide novalidate action="adduseradmin.php" method="POST">
		<div class="large-12 columns">
								
										<label>First Name
										<input type="text" name="First_Name" autocomplete="off" required />
										</label>
									
								</div>
								<div class="large-12 columns">
									
										<label>Middle Name
										<input type="text" name="Middle_Name" autocomplete="off" required />
										</label>
									
								</div>
								<div class="large-12 columns">
									
									
										<label>Last Name
										<input type="text" name="Last_Name" autocomplete="off" required />
										</label>
									
								</div>	
								<div class="large-12 columns">
									<label>Region
										<select name="Region" required>
											<option value="" ></option>
											<option value=""></option>
											<option value="Region I">Region I</option>
											<option value="Region II">Region II</option>
											<option value="Region III">Region III</option>
											<option value="Region IV">Region IV</option>
											<option value="MIMAROPA">MIMAROPA</option>
											<option value="Region V">Region V</option>
											<option value="Region VI">Region VI</option>
											<option value="Region VII">Region VII</option>
											<option value="Region VIII">Region VIII</option>
											<option value="Region IX">Region IX</option>
											<option value="Region X">Region X</option>
											<option value="Region XI">Region XI</option>
											<option value="Region XII">Region XII</option>
											<option value="NCR">NCR</option>
											<option value="CAR">CAR</option>
											<option value="BARMM">BARMM</option>
										</select>
									</label>
								</div>
								<div class="large-12 columns">
									<label>Access Level
										<select name="Security_Level" required>
											<option value="" ></option>
											<option value="Admin">Admin</option>
											<option value="Encoder">Encoder</option>
										</select>
									</label>
								</div>
								<div class="large-12 columns">
								<label>Username
										<input type="text" name="Username" autocomplete="off" required />
								</label>
								</div>
								<div class="large-12 columns">
								<label>Password
										<input type="password" name="password" autocomplete="off" required />
								</label>
								</div>
								<div class="large-12 columns">
									<input class="button expanded" type="submit" value="ADD">
								</div>
							</div>
		</form>
								
		 <button class="close-button" data-close aria-label="Close modal" type="button">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<!-- END OFF ADD USER MODAL-->
	
	
	<!-- START OF VIEW ALL USER MODAL-->
	<div class="full reveal" id="View_All_User" data-reveal>
	
	<div class="row">
		<div class="large-12 columns">
			<label>Look For</label>
			<input type="text" name="search" id="search" onkeyup="search_data()">
		</div>
		<div class="large-12 columns">
			<table class="scroll" class="float-center" style="width:100%;">
						  <thead>
									<tr>
									<th>REGION</th>
									<th>SECURITY LEVEL</th>
									<th>FULL NAME</th>
									<th>USERNAME</th>
									<th>STATUS</th>
									<th>UPDATE</th>
									<th>DELETE</th>
							</tr>
									</thead>
						  
						  <?php
						  
						  $_POST['USER']="";
						  
						  
					$stmt = $conn->query("SELECT * FROM users");
					while ($row = $stmt->fetch()) {
						
					echo "<tbody>";
										echo "<tr>";
										
										echo "<td>". $row['Region']."</td>";
										echo "<td>". $row['AccessLevel']."</td>";
										echo "<td>". $row['FirstName']. " " . $row['MiddleName'] . ", " . $row['LastName']."</td>";
										echo "<td>". $row['UserName']."</td>";
										echo "<td>". $row['Status'] . "</td>";
										echo "<td>
										
										
										<form action='EditUserProfile.php' method='POST'>
										<input type='hidden' id='UserID' name='UserID' value='".$row['UserID']."' >
										<input type='submit' name='btnEdit' class='button' value='UPDATE'>
										</form>
										
										
										</td>";
										echo "<td><button class='alert button'>DELETE</button></td>";
										echo "</tr>";
										echo "</tbody>";
					}	
										
										
						  ?>	
			</table>
		</div>
	</div>

	
		<button class="close-button" data-close aria-label="Close modal" type="button">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<!-- END OF VIEW ALL USER MODAL-->
	
	
	<!-- ADD NEWS MODAL-->
	<div class="reveal" id="Add_News" data-reveal>
	  <form data-abide novalidate action="./process/addnews_process.php" method="POST" enctype="multipart/form-data">
								<div class="row">
									<div class="large-12 columns">
										<label>Select Image
										<input type="file" accept=".png,.gif,.jpg" name="image_data" required></input>
										</label>
									</div>
								</div>
								<div class="row">
									<div class="large-12 columns">
										<label>Image Description
										<input type="text" name="image_description" required></input>
										</label>
									</div>
								</div>
								<div class="row">
									<div class="large-12 columns">
										<label>Title
										<input type="text" name="NewsTitle" required></input>
										</label>
									</div>
								</div>
								<div class="row">
									<div class="large-12 columns">
										<label>Paragraph
										<textarea name="NewsBody" required></textarea>
										</label>
										<input type="submit" class="button" value="Add News" ></input>
									</div>
								</div>
							</form>
	  
	  
	  <button class="close-button" data-close aria-label="Close modal" type="button">
		<span aria-hidden="true">&times;</span>
	  </button>
	</div>
	<!-- END OF ADD NEWS MODAL-->
	
	<!-- VIEW ALL NEWS MODAL-->
	<div class="full reveal" id="View_All_News" data-reveal>
	  
		<div class="large-10 columns">
			<label>Search for News Title</label>
			<input type="text" name="search" id="search" onkeyup="search_data()">
		</div>
		
		
		<div class="large-10 columns">
			<div id='search_table'>
			
				<table class="scroll">
						<tr>
							
							<th rowspan="2" scope="col" class="bg-primary text-center" >NEWS ID</th>
							<th rowspan="2" scope="col" class="bg-primary text-center">NEWS TITLE</th>
							<th rowspan="2" scope="col" class="bg-primary text-center">DATE UPLOADED</th>
							<th rowspan="2" scope="col" class="bg-primary text-center">AUTHOR</th>
							<th rowspan="2" scope="col" class="bg-primary text-center">UPDATE</th>
							<th rowspan="2" scope="col" class="bg-primary text-center">DELETE</th>
						</tr>
				<tbody id="output">
				<tr>
					 <?php 
								$query = "SELECT * FROM news";
								$news = $conn->query($query)->fetchAll();
								foreach ($news as $key => $list_of_news):
								
								
								echo '<tr>';echo '<td>'.$list_of_news['newsID'].'</td>';
								echo '<td>'.$list_of_news['news_title'].'</td>';
								echo '<td>'.$list_of_news['news_date_uploaded'].'</td>';
								echo '<td>'.$list_of_news['news_author'].'</td>';
								echo "<td>
										<form action='EditNews.php' method='POST'>
										<input type='hidden' id='UserID' name='newstoupdate' value='".$list_of_news['newsID']."' >
										<input type='submit' name='btnEdit' class='button' value='UPDATE'>
										</form></td>";
								echo '<td><button class="alert button">DELETE</button></td>';
								endforeach;
							
						 ?>
				</tr>
				</tbody>
				</table>
			</div>
		</div>
		<button class="close-button" data-close aria-label="Close reveal" type="button">
			 <span aria-hidden="true">&times;</span>
		</button>
	</div>
	<!-- END OF VIEW ALL NEWS MODAL-->
	
<br>
<br>
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
