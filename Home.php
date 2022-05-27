 <?php
session_start();
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
   <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foundation for Sites</title>
    <link rel="stylesheet" href="./css/foundation.css">
    <link rel="stylesheet" href="./css/app.css">
    
    <link rel="stylesheet" href="./theme.css"/>
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
          <div id="offCanvasRight" class="off-canvas position-right hide-for-large" data-off-canvas data-position="right">
            
            <ul class="vertical menu" data-drilldown data-parent-link="true">
                
              <li><a href="index.html">Home</a></li>
              <li class="has-dropdown">
                <a href="#">About Us</a>
                <ul class="vertical menu">
                  <li><a href="objective.html">Objective</a></li>
                  <li><a href="DR.html" >Duties &#38 Responsibilities</a></li>
                </ul>
              </li>
			  <li><a href="contact.html">Contact Us</a></li>
             <li><a href="#">News</a></li>
            <li>
                <a href="#">Log In</a>
                <ul class="vertical menu">
                  <form action="process/login.php" method="POST" style="padding:30px;height:100px;">
							<label>Username:</label>
							<input type="text" name="username" />
							<label>Password:</label>
							<input type="password" name="password"/>
							<br>
							<input type="submit" class="button" width="auto" text="Log In"></input>
				  </form>
                </ul>
              </li>

            </ul>
          </div>

        <div class="off-canvas-content" data-off-canvas-content>

          <div class="title-bar" data-responsive-toggle="gwt-menu" data-hide-for="large">
            <div class="title-bar-left">
              <a href="http://www.gov.ph"><h1 class="title-bar-title">G I P</h1></a>
            </div>
            <div class="title-bar-right">
              <span class="title-bar-title">MENU</span>
              <button id="me" type="button" data-open="offCanvasRight">
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
                    <li id="govph" class="name menu-text"><h1><a href="http://www.gov.ph">G I P</a></h1></li>
                    <li><a href="index.html">Home</a></li>
					<li><a href="contact.html">Contact Us</a></li>
					<li><a href="#">News</a></li>
					<li>
                      <a href="#">About Us</a>
                      <ul class="vertical menu">
                        <li><a href="objective.html">Objective</a></li>
                        <li><a href="DR.html" >Duties &#38 Responsibilities</a></li>
                      </ul>
                    </li>
                  </ul>
                </nav>

                <nav class="top-bar-right">
                  <ul class="dropdown menu" data-dropdown-menu>
                    <li>
                      <a href="#">Log In</a>
                      <ul class="vertical menu">
                        <form action="process/login.php" method="POST" style="padding:30px;">
							<label>Username:</label>
							<input type="text" name="username" />
							<label>Password:</label>
							<input type="password" name="password"/>
							<br>
							<input type="submit" class="button" width="auto" text="Log In"></input>
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
		<a href="#">
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
	<br>
	<br>
	<br>
	<hr />

	<h3 class="text-center news-title" style="text-decoration: underline;"> HIGHLIGHTS</h3>
	<br>
	<br>
	<div class="row">
		<div class="large-4 medium-4 columns">
			<div class="card text-left" style="width: auto;">
				<img src="img/img1.jpg">
				<div class="card-section">
				<br>
		
				<p><strong>DOLE GIP give hopes to PWD - </strong>Mr. Greg Sabado, a beneficiary of the agency’s GIP, suffered
polio when he was an infant, resulting in imperfectly functioning
hands and legs. Though initially challenged, his condition never
stops him from pursuing his dreams, recently graduating with a
Bachelor of Science in Business Administration degree at the
University of Saint Louis Tuguegarao (USLT).</p>
				</div>
			</div>
        </div>
		<div class="large-4 medium-4 columns">
		<div class="card text-left" style="width: auto;">
				<img src="img/img2.jpg">
				<div class="card-section">
				<br>
				<p><strong>Greater heights of success - </strong>“The GIP is a huge part of what I consider success in my
public service career.” Johna Mae R. San Juan, 22, a
graduate of Bachelor of Science in Business
Administration with a major in Marketing Management,
began her career as a GIP Intern.</p>
				</div>
			</div>
        </div>
		<div class="large-4 medium-4 columns">
        <div class="card text-left" style="width: auto;">
				<img src="img/img3.jpg">
				<div class="card-section">
				<br>
				<p><strong>A journey of success of Ms. Motmot N. Dianalen - </strong>“Good attitude is the key to good opportunities” says Ms.
Motmot M. Dianalen, 25 years old, a former Government
Internship Program (GIP) beneficiary who was absorbed
by the Local Government Unit (LGU) Lutayan as a PESO
Manager and PODO designate for 1 year and 4 months
now.</p>
				</div>
			</div>
        </div>
    </div>
	  
	
  
  <br>
	<br>
	<hr />
  <h3 class="text-center news-title" style="text-decoration: underline;"> NEWS </h3>
  <br>
  <br>
  
      <div class="row">
        <div class="large-12 medium-12 columns">
          <!-- Grid Example -->
          <div class="row">
            <div class="large-12 columns">
              <div class="callout primary">
                <p><strong>You're all caught up!</strong></p>
              </div>
            </div>
          </div>
        </div>     
      </div>
	  
	  <br>
	  <br>
	  <br>



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
