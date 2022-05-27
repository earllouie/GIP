 <?php
include("server.php");
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>List of GIP Beneficiaries</title>
	<link rel="icon" href="giplogo.png">
    <link rel="stylesheet" href="css/foundation/foundation.css" />
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/footer/footer_layout.css" />
    <link rel="stylesheet" href="theme.css"/>
	<style>
	body{
		background-color: #f1f1f1;
		
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
                
            <li><a href="index.php">Home</a></li>
			<li><a href="Home_News.php">News</a></li>
			<li class="active"><a href="highlights.php">Highlights</a></li>
			<li><a href="Home_Beneficiaries.php">List of Beneficiaries</a></li>
			<li><a href="contact.html">Contact Us</a></li>
            <li><a href="Home_About_GIP.php">About Us</a></li>
            <li>
                <a>Log In</a>
				
                <ul class="vertical menu">
                        <form id="form" action="process/login.php" method="POST" style="padding:50px;">
							<input required type="text" name="username" placeholder="Username"/>	
							<input required type="password" name="password" placeholder="Password" />
							<input type="submit" class="button" width="auto" value="Log In"></input>
						</form>
                      </ul>
					  
              </li>

            </ul>
          </div>

        <div class="off-canvas-content" data-off-canvas-content>

          <div class="title-bar" data-responsive-toggle="gwt-menu" data-hide-for="large">
            <div class="title-bar-right">
              <a href="http://www.gov.ph"><h1 class="title-bar-title">G I P</h1></a>
            </div>
            <div class="title-bar-left">
              <span class="title-bar-title">MENU</span>
              <button id="me" type="button" data-open="offCanvasLeft">
                <i class="fa fa-bars" aria-hidden="true"></i>
              </button>  
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
                    <li><a href="index.php">Home</a></li>
					<li><a href="Home_News.php">News</a></li>
					<li class="active"><a href="highlights.php">Highlights</a></li>
					 <li><a href="Home_Beneficiaries.php">List of Beneficiaries</a></li>
					<li><a href="contact.html">Contact Us</a></li>
					<li><a href="Home_About_GIP.php">About Us</a></li>
                  </ul>
                </nav>

                <nav class="top-bar-right">
                  <ul class="dropdown menu" data-dropdown-menu>
                    <li>
                      <a href="/process/login.php">Log In</a>
                      <ul class="vertical menu">
                        <form id="form" action="process/login.php" method="POST" style="padding:30px;">
							<label>Username:</label>
							<input required type="text" name="username"/>
							<label>Password:</label>
							<input required type="password" name="password" />
							<input type="submit" class="button" width="auto" value="Log In"></input>
						</form>
						
                      </ul>
                    </li>
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
		
		
		


		
		<?php
		$PerPage = 10;
		 //CALCULATE TOTAL PAGES
		 $stmt = $conn-> query("SELECT COUNT(*) FROM success_story");
		 $total_results = $stmt->fetchColumn();
		 $total_pages = ceil($total_results / $PerPage);
		 
		 //CURRENT PAGE
		 $page = isset($_GET['page']) ? $_GET['page']:1;
		 $starting_limit = ($page -1) * $PerPage;
		 
		 //QUERY TO FETCH BENEFICIARIES
		   $stmt = $conn->query("SELECT * FROM success_story 
					ORDER BY upload_date ASC
					LIMIT $starting_limit,$PerPage");
		   

		//$stmt = $conn->query("SELECT * FROM news ORDER BY news_date_uploaded ASC");
		while($row = $stmt->fetch()){
		
		$string  = strip_tags($row["story_body"]);
		
		if(strlen($string) > 50){
			$stringcut = substr($string,0, 300);
			$string = substr($stringcut, 0 ,strrpos($stringcut, ' ')).'<a href="read_story.php?ttl='.$row["story_title"].'"> Read more...</a>';
		}
		echo '<div class="media-object" style="border: 2px;">
		
			<div class="media-object-section">
				<div class="thumbnail">
					 <img src="data:image/jpeg;base64,'.base64_encode( $row["img_data"] ).'" width="250" height="250"></img>
				</div>
			</div>
			<div class="media-object-section main-section" style="text-align: justify;">
				<h4>'.strtoupper($row["story_title"]).'</h4>
				<small>Author: '.$row["author"].' | Posted on: '.$row["upload_date"].'</small>
				<br>
				<input type="hidden" value="'.$row[0].'"></p>
				<p style=" text-align: justify; text-justify: inter-word;">'.$string.'</p>
			</div>
		</div>	
		
		';}
		

		?>
		
		<?php for ($page = 1; $page <= $total_pages ; $page++):?>
		<a  href='<?php echo "?page=$page"; ?>' class="links">
		<?php  echo $page; ?>
		</a>
		<?php endfor; ?>
		
		</div>
	</div>



              <script type="text/javascript" id="gwt-pst">
              (function(d, eId) {
                var js, gjs = d.getElementById(eId);
                js = d.createElement("script"); js.id = "gwt-pst-jsdk";
                js.src = "//gwhs.i.gov.ph/pst/gwtpst.js?"+new Date().getTime();
                gjs.parentNode.insertBefore(js, gjs);
              }(document, "gwt-pst"));

              var gwtpstReady = function(){
                var otherFormat = "dddd, mmmm dd, yyyy h:mm:ss TT";
                var firstPst = new gwtpstTime("pst-date", {format: otherFormat});
              }
              </script>


<!-- main end -->

<!--Standard Footer-->
<div id="footer">
	      <div class="row">

	        <div class="large-4 medium-4 columns">
	          <div class="row">
	            <div class="large-5 small-4 columns"><img src="https://www.officialgazette.gov.ph/wp-content/themes/govph/assets/images/footlogo.png"></div>
	            <div class="large-7 small-8 columns">
	              <h4>Republic of the Philippines</h4>
				  <br>
	              <p>All content is in the public domain unless otherwise stated.</p>
	              <p><a href="https://www.officialgazette.gov.ph/feedback-form/">Feedback Form</a>
	            </p></div>
	          </div>
	        </div>

	        <div class="large-6 medium-6 columns">
	          <div class="row">
	            <div class="large-5 large-offset-0 medium-5 medium-offset-0 small-8 small-offset-4 columns">
	              <h4>About GOVPH</h4>
				  <br>
	              <p>Learn more about the Philippine government, its structure, how government works and the people behind it. </p>
				  <br>
	              <ul>
	              	<li><a href="https://www.gov.ph/">GOV.PH</a></li>
	                <li><a href="https://www.officialgazette.gov.ph/">Official Gazette</a></li>
	                <li><a href="https://data.gov.ph/">Open Data Portal</a></li>
	              </ul>
	            </div>

	            <div class="large-4 large-offset-0 medium-4 medium-offset-0 small-8 small-offset-4 columns">
	              <h4>Government Links</h4>
				  <br>
	              <ul>
	                <li><a href="http://president.gov.ph/">The President</a></li>
	                <li><a href="http://op-proper.gov.ph/">Office of the President</a></li>
	                <li><a href="https://ovp.gov.ph/">Office of the Vice President</a></li>
	                <li><a href="http://senate.gov.ph/">Senate of the Philippines</a></li>
	                <li><a href="http://www.congress.gov.ph/">House of Representatives</a></li>
	                <li><a href="http://sc.judiciary.gov.ph/">Supreme Court</a></li>
	                <li><a href="http://ca.judiciary.gov.ph/">Court of Appeals</a></li>
	                <li><a href="http://sb.judiciary.gov.ph/">Sandiganbayan</a></li>
	              </ul>
	            </div>
	          </div>
	        </div>

	      </div>
        <div class="row">
          <div class="small-12 columns"><p class="text-center attribution"><span class="mobile-block">Managed by ICT Division of the  </span><a href="https://pcoo.gov.ph" target="_blank" rel="noopener noreferrer">Presidential Communications Operations Office (PCOO)</a>
</p></div>
        </div>
	    </div>

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
