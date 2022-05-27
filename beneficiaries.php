<?php
include('server.php');
if(empty($_SESSION['username'])){
	header("Location: error_page.php");
}
$_SESSION['username'];
$_SESSION['region'];
$_SESSION['userlevel'];


 $PerPage = 20;
 
  if($_SESSION['userlevel']=="Encoder"){
	  //QUERY TO FETCH BENEFICIARIES
	 $stmt = $conn-> query("SELECT COUNT(*) FROM beneficiary WHERE Region ='".$_SESSION['region']."'");
 }else if($_SESSION['userlevel']=="Admin"){
	 //QUERY TO FETCH BENEFICIARIES
	 $stmt = $conn-> query("SELECT COUNT(*) FROM beneficiary");
 }
 //CALCULATE TOTAL PAGES

 $total_results = $stmt->fetchColumn();
 $total_pages = ceil($total_results / $PerPage);
 
 //CURRENT PAGE
 $page = isset($_GET['page']) ? $_GET['page']:1;
 $starting_limit = ($page -1) * $PerPage;
 
 if($_SESSION['userlevel']=="Encoder"){
	  //QUERY TO FETCH BENEFICIARIES
	$query = "SELECT * FROM beneficiary WHERE Region = '".$_SESSION['region']."'LIMIT $starting_limit,$PerPage ";
 }else if($_SESSION['userlevel']=="Admin"){
	 //QUERY TO FETCH BENEFICIARIES
	$query = "SELECT * FROM beneficiary LIMIT $starting_limit,$PerPage";
 }

   
	//FETCH ALL USERS FOR CURRENT PAGE
	$users = $conn->query($query)->fetchAll();
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

	.tbl{
		background-color: transparent !important;
	}



	</style>

	

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

<!-- main content-->
    <div id="main-content">
	
	
	<div class="row">
		<div class="large-4 columns">
			<h1>List of Beneficiary</h1
			<hr/>
		</div>
		<div class="large-4 columns">
			
		</div>
		<div class="large-4 columns">
			<label>Birth Reference Number</label>
			<input type="text" name="search" id="search" onkeyup="search_data()">
		</div>
	</div>

	<div class="row">
		<div class="large-12 columns">
		<div id='search_table'>
		
		<table class="scroll">
				<tr>
					
					<th rowspan="2" scope="col" class="bg-primary text-center" >REGION</th>
					<th rowspan="2" scope="col" class="bg-primary text-center">GIP ID NO.</th>
					<th rowspan="2" scope="col" class="bg-primary text-center">FULL NAME</th>
					<th rowspan="2" scope="col" class="bg-primary text-center">GENDER</th>
					<th rowspan="2" scope="col" class="bg-primary text-center">INSTITUTION</th>
					<th rowspan="2" scope="col" class="bg-primary text-center">CONTRACT END DATE</th>
					<th rowspan="2" scope="col" class="bg-primary text-center" >VIEW</th>
					<th rowspan="2" scope="col" class="bg-primary text-center" >UPDATE</th>
				</tr>
				
				
		<tbody id="output">
		<tr>
			 <?php 
					
						foreach ($users as $key => $user):
                        echo '<tr>';echo '<td>'.$user['Region'].'</td>';
						echo '<td>'.$user['GIP_ID'].'</td>';
                        echo '<td>'.$user['First_Name'] . " " .$user['Middle_Name']."." . " ". $user['Last_Name'] .'</td>';
                        echo '<td>'.$user['Gender'].'</td>';
						echo '<td>'.$user['Institution'].'</td>';
						echo '<td>'.$user['Contract_End_Date'].'</td>';
						echo "
						
						<td class='text-center'>
						<form method='POST' action='view.php'>
						<input type='hidden' name='ID' value='".$user["GIP_ID"]."'>
						<input type='submit'type='submit' value='VIEW' class='button'></input>
						</form>
						</td>
						";
						
						echo "
						<td>
						<form method='POST' action='EditProfile.php'>
						<input type='hidden' name='ID' value='".$user['GIP_ID']."'>
						<input type='submit'type='submit' value='UPDATE	' class='button'></input>
						
						</form></td>";
                        echo '</tr>';
						endforeach;
					
                 ?>
		</tr>
		</tbody>
		</table>
		</div>
		
		
		

		</div>
			
	</div>
	
	<nav aria-label="Pagination">
	  <ul class="pagination text-center">
		<li class="pagination-previous disabled">Previous</li>
		<?php for ($page = 1; $page <= $total_pages ; $page++):?>
		<li><a  href='<?php echo "?page=$page"; ?>' ><?php  echo $page; ?></a></li>
		<?php endfor; ?>	  
		<li class="pagination-next"><a href="#" aria-label="Next page">Next</a></li>
	  </ul>
	</nav>
			
					
				
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
	
    function search_data(){
	var search=jQuery('#search').val();
	if(search!=''){
		jQuery.ajax({
			method:'POST',
			url:'livesearchdata.php',
			data: 'search='+search,
			success:function(data){
				jQuery('#search_table').html(data);
			}
		});
	}else{
		
	}
}

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
