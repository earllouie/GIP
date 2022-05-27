 <?php
include("server.php");
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
	body{
		background-color: #f1f1f1;
		
	}
	.news{
		text-align: justify;
		text-justify: inter-word;
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
                
            <li class="active"><a href="index.php">Home</a></li>
			<li><a href="Home_News.php">News & Highlights</a></li>
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
                    <li class="active"><a href="index.php">Home</a></li>
					<li><a href="Home_News.php">News and Highlights</a></li>
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

<!-- banner full width -->
    <div id="banner" style="width:100%">
      <div class="row">
        <div class="large-12 large-12 columns">
          <div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
            <ul class="orbit-container" id="slider_full">

                <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
                <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>

              <li class="is-active orbit-slide">
                <img src="img/banner1.jpg">
                <figcaption class="orbit-caption">Welcome Interns!</figcaption>
              </li>
              <li class="orbit-slide">
                <img src="img/banner2.jpg">
                <figcaption class="orbit-caption">Your safety is our priority.</figcaption>
              </li>
              <li class="orbit-slide">
                <img src="img/banner3.jpg">
                <figcaption class="orbit-caption">Start building your career with us! Apply now!</figcaption>
              </li>
            </ul>
              <nav class="orbit-bullets">
                <button class="is-active" data-slide="0"><span class="show-for-sr"></span><span class="show-for-sr">Current Slide</span></button>
                <button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
                <button data-slide="2"><span class="show-for-sr">Third slide details.</span></button>
              </nav>
          </div>
        </div>
      </div>
    </div>
<!-- banner full width end -->   
	
	
<!-- main -->
    <div id="main-content">
	
	
	<div class="row" style="background-color: #012641;padding:20px;color: white;">
		<div class="large-12 columns">
	<br>
		<div class="column large-10">
			<div id="pst-container" style="display:block; text-align:<?php echo $pst_align; ?>;">
				<div style="font-style:Roboto; color:white;">
					<div style="font-size:1rem;"><b>Philippine Standard Time</b></div>
						<div style="font-size:0.875rem;">
							<span id="pst-date"></span>
							<span id="pst-time"></span>
						</div>
				</div>
			</div>
			<br>
		<h1>Government Internship Program (GIP)</h1>
		<p><strong>Government Internship Program or GIP</strong> is a component of KABATAAN 2000 under Executive Order(EO) no. 193 s.1993, which aims to provide opportunities and engage young workers to serve the general public in government agencies/entities projectrs and programs at the national and local level.</p>			  
		<br>
		<a href="Home_About_GIP.php">
		<p>
		Learn more about the department and program >>
		</p>
		</a>
		</div>
		
		<div class="column large-2">
			<br>
			<img src="img/giplogo.png" width="250px" height="250px"></img>
		</div>
		</div>
	</div>
	<br>
	<br>
	<br>
	
		<header class="container-masthead" style="background-color: ##fff;padding: 5px;">
	
	<h3 class="text-center news-title" style="text-decoration: underline;"> NEWS & HIGHLIGHTS </h3>
  <br>
  <br>
  
      <div class="row" >
       <div class="large-12 columns">
		
		<?php
		
		 //QUERY TO FETCH BENEFICIARIES
		   $stmt = $conn->query("SELECT * FROM news 
					ORDER BY news_date_uploaded DESC LIMIT 4");
		   

		//$stmt = $conn->query("SELECT * FROM news ORDER BY news_date_uploaded ASC");
		while($row = $stmt->fetch()){
		
		$string  = strip_tags($row["news_content"]);
		
		if(strlen($string) > 50){
			$stringcut = substr($string,0, 300);
			$string = substr($stringcut, 0 ,strrpos($stringcut, ' ')).'<a href="read_news.php?ttl='.$row["news_title"].'"> Read more...</a>';
	
		}
		echo '<div class="media-object" style="border: 2px;">
		
			<div class="media-object-section">
				<div>
					 <img src="data:image/jpeg;base64,'.base64_encode( $row["image_data"] ).'" width="250px" height="250px"></img>
				</div>
			</div>
			<div class="media-object-section main-section" style="text-align: justify;">
				<h4>'.strtoupper($row["news_title"]).'</h4>
				<small>Author: '.$row["news_author"].' | Posted on: '.$row["news_date_uploaded"].'</small>
				<br>
				<p style=" text-align: justify; text-justify: inter-word;">'.$string.'</p>
			</div>
		</div>	
		
		';}
		

		?>
		
		</div>
	</div>
	
	</header>

	
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
