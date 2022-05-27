<?php
include('server.php');
$_SESSION['username'];

?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Feedback Form</title>
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
          <div id="offCanvasRight" class="off-canvas position-right hide-for-large" data-off-canvas data-position="right">
            
            <ul class="vertical menu" data-drilldown data-parent-link="true">
                
              <li><a href="index.html">Home</a></li>
              <li class="has-dropdown">
                <a href="#">Transparency</a>
                <ul class="vertical menu">
                  <li><a href="#">Link 1</a></li>
                  <li><a href="#">Link 2</a></li>
                  <li><a href="#">Link 3</a></li>
                </ul>
              </li>
              <li><a href="#">Left Nav Button</a></li>

              <li class="active"><a href="#">Right Button Active</a></li>
              <li>
                <a href="#">Right Button Dropdown</a>
                <ul class="vertical menu">
                  <li><a href="#">1st link in dropdown</a></li>
                  <li><a href="#">2nd link in dropdown</a></li>
                  <li><a href="#">3rd link in dropdown</a></li>
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
                    <li id="govph" class="name menu-text"><h1><a href="#">G I P</a></h1></li>
                    <li><a href="profile.php">Home</a></li>
					<li><a href="registration.php">GIP Registration</a></li>
					<li><a href="beneficiaries.php">List of Beneficiaries</a></li>
					<li><a href="feedbackform.php">Feedback Form</a></li>
                    <li><a href="download_form.php">Downloadables</a></li>
                  </ul>
                </nav>

                <nav class="top-bar-right">
                  <ul class="dropdown menu" data-dropdown-menu>
                    <li>
                      <a href="index.html">Log out</a>
                      
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

<!-- main -->
    <div id="main-content">
	<div class="row">
		<div class="large-12 columns">
			<h1>GIP Feedback Form</h1>
			<p>
			We would appreciate if you can openly answer the following questions in relation to your experiences as GIP beneficiary during your stay with the Agency.
			Your responses will be treated with confidentiality and will not form part of your personal life. We believe that the information is of vital importance
			and will assist us in analyzing the factors that will guide the Bureau in improving its program, policies, and systems.
			</p>
			<hr/>
		</div>
		<div class="large-6 columns">
			<label>First Name</label>
			<input type="text" name="Name"></input>
		</div>
		<div class="large-6 columns">
		</div>
	</div>
		
	<div class="row">
		<div class="large-6 columns">
			<label>Hired Date</label>
			<input type="date"></input>
		</div>
		<div class="large-6 columns">
			<label>Separation Date</label>
			<input type="date"></input>
		</div>
	</div>
	<div class="row">
		<div class="large-6 columns">
			<label>Office of Assignment</label>
			<input type="text"></input>
		</div>
		<div class="large-6 columns">
			<label>Immediate Supervisor</label>
			<input type="text"></input>
		</div>
	</div>
	<div class="row">
	<h4><strong>QUESTIONNAIRE</strong></h4>
	</div>
	<br>
	<div class="row">
		<div class="large-12 columns">
		<strong><p>1. Please indicate the kind of work that was given to you at the office or agency.</p><strong>
		<input id="checkbox1" type="checkbox"><label for="checkbox1">Clerical Work</label><br>
		<input id="checkbox2" type="checkbox"><label for="checkbox2">Administrative Work</label><br>
		<input id="checkbox3" type="checkbox"><label for="checkbox3">Technical Work</label><br>
		<input id="checkbox4" type="checkbox"><label for="checkbox4">Others</label><br>
		<input type="text" name="">
		<br>
		<br>
		</div>	
		<div class="large-12 columns">
		<p>2. What competencies have you acquired that you can present in your future employment?</p>
		<input id="checkbox5" type="checkbox"><label for="checkbox5">Communication skills</label><br>
		<input id="checkbox6" type="checkbox"><label for="checkbox6">Computer skills</label><br>
		<input id="checkbox7" type="checkbox"><label for="checkbox7">Research skills</label><br>
		<input id="checkbox8" type="checkbox"><label for="checkbox8">Interpersonal skills</label><br>
		<input id="checkbox9" type="checkbox"><label for="checkbox9">Organizational skills</label><br>
		<input id="checkbox10" type="checkbox"><label for="checkbox10">Others, please specify</label><br>
		<input type="text" name="">
		<br>
		<br>
		</div>
		<div class="large-12 columns">
		<p>3. What had been frustrating / difficult / upsetting to you during your stay at the office or  agency?</p>
        <input id="checkbox11" type="checkbox"><label for="checkbox11">Dealing with supervisors</label><br>
		<input id="checkbox12" type="checkbox"><label for="checkbox12">Work environment</label><br>
		<input id="checkbox13" type="checkbox"><label for="checkbox13">Government system</label><br>
		<input id="checkbox14" type="checkbox"><label for="checkbox14">Deeling with peers</label><br>
		<input id="checkbox15" type="checkbox"><label for="checkbox15">Delayed salary</label><br>
		<input id="checkbox16" type="checkbox"><label for="checkbox16">Volume of workload</label><br>
		<input id="checkbox17" type="checkbox"><label for="checkbox17">Additional transport expense</label>
		<br>
		<br>
		</div>
		<div class="large-12 columns">
		<p>4. How did the GIP program help you in terms of personal or professional growth</p>
        <input id="checkbox18" type="checkbox"><label for="checkbox18">Improve my communication skills</label><br>
		<input id="checkbox19" type="checkbox"><label for="checkbox19">Increase my knowledge in government proces</label><br>
		<input id="checkbox20" type="checkbox"><label for="checkbox20">Increase my confidence</label><br>
		<input id="checkbox21" type="checkbox"><label for="checkbox21">Increase my interpersonal skills</label><br>
		<input id="checkbox22" type="checkbox"><label for="checkbox22">Gave exposure in the world of work</label><br>
		<input id="checkbox23" type="checkbox"><label for="checkbox23">Provide training and experience relevant to my field of study</label><br>
		<input id="checkbox24" type="checkbox"><label for="checkbox24">Others</label>
		<input type="text" name="">
		<br>
		<br>
		</div>
		<div class="large-12 columns">
		<p>5. What are your immediate plans after your stint with the office or agency?</p>
		<input id="checkbox25" type="checkbox"><label for="checkbox25">Continue work in the government services</label><br>
		<input id="checkbox26" type="checkbox"><label for="checkbox26">Search job in the private sector</label><br>
		<input id="checkbox27" type="checkbox"><label for="checkbox27">Pursue further studies</label><br>
		<input id="checkbox28" type="checkbox"><label for="checkbox28">Others, please secify:</label><br>
		<input type="text" name=""></input>
		<br>
		<br>
		</div>
		<div class="large-12 columns">
		<p>6. What are some of your expectations which the office or agency failed to address?</p>
		<input id="checkbox29" type="checkbox"><label for="checkbox29">Non-inclusion in trainings and seminars</label><br>
		<input id="checkbox30" type="checkbox"><label for="checkbox30">Non engaged in permanent emploment by the office or agency</label><br>
		<input id="checkbox31" type="checkbox"><label for="checkbox31">Limited work experience</label><br>
		<input id="checkbox32" type="checkbox"><label for="checkbox32">Others, please specify</label><br>
		<input type="text" name="">
		<br>
		<br>
		</div>
		<div class="large-12 columns">
		<p>7. What had been good/satisfying/enjoyable to you during your stay in the assigned office?</p>
		<input id="checkbox33" type="checkbox"><label for="checkbox33">Nature of work</label><br>
		<input id="checkbox34" type="checkbox"><label for="checkbox34">Work environment</label><br>
		<input id="checkbox35" type="checkbox"><label for="checkbox35">Work experience</label><br>
		<input id="checkbox36" type="checkbox"><label for="checkbox36">Service to the gover</label><br>
		<input id="checkbox37" type="checkbox"><label for="checkbox37">Colleagues</label><br>
		<input id="checkbox38" type="checkbox"><label for="checkbox38">Others, please specify</label><br>
		<input type="text" name="">
		</div>
		<div class="large-12 columns">
		<p>
		Comments/Suggestions:</p>
		<textarea name="Comments_Suggestions"></textarea>
		<br>
		<br>
		</div>
	</div>
	
	<div class="row">
		<div class="large-6 columns">
			<input type="submit" text="Submit" class="small button">
			</form>
		</div>
	</div>
	
	<button class="button"  data-open="exampleModal">Click me for a modal</button>
	
	<div class="reveal" id="exampleModal" data-reveal>
	
	<h1>Awesome content here!</h1>
	
	<button class="close-button" data-close aria-label="Close reveal" type="button">
	<span aria-hidden="true">&times;</span>
	</button>
	</div>

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
