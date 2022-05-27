<?php
include('server.php');

$_SESSION['username'];
$_POST['newstoupdate'];

$stmt = $conn->prepare('SELECT * FROM news WHERE newsID = :1');
$stmt->execute(array(':1' => $_POST['newstoupdate']));
if($stmt){
	$news = $stmt->fetch();


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
					<li><a class="active" href="registration.php">Add Beneficiaries</a></li>
					<li><a href="beneficiaries.php">View Beneficiaries</a></li>
					<li>
						<a href="#">Update Beneficiaries</a>
							<ul class="vertical menu">
								<li><a href="ReAdmittedForm.php">Re-admitted</a></li>
								<li><a href="AbsorbedForm.php">Absord</a></li>
							</ul>
					</li>
					<li><a target="_blank" href="https://docs.google.com/forms/d/e/1FAIpQLSdFpkD_7TuNYT9JQj2AFP_wt63ZTfXT9uzDbEYVnRTMEkr5ZQ/viewform ">Feedback Form</a></li>
                    <li><a href="download_form.php">Download Reports</a></li>
                  </ul>
                </nav>
                <nav class="top-bar-right">
                  <ul class="dropdown menu" data-dropdown-menu>
                    <li>
                      <a href="logout.php">Log out</a>
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

<!-- main content-->
    <div id="main-content">
	
	
	<div class="row">
		<div class="large-12 columns">
					<nav aria-label="You are here:" role="navigation">
			  <ul class="breadcrumbs">
				<li><a href="profile.php">Home</a></li>
				<li class="secondary label"><a href="#0">Update News</a></li>
			  </ul>
			</nav>
		</div>
	</div>
	
	
	<div class="row">
	<h2>EDIT NEWS</h2>
	</div>

	<div class="row">
		<div class="large-3 columns">
			<label>Select Image
			<input type="file" accept=".png,.gif,.jpg" name="image_data" required></input>
			</label>
		</div>
		</div>
		<div class="row">
			<div class="large-6 columns">
			<label>Image Description
			<input type="text" name="image_description" value="<?php
			
			echo $news['image_description'];

			?>" required></input>
			</label>
			</div>
		</div>
		<div class="row">
			<div class="large-6 columns">
				<label>Title
				<input type="text" name="NewsTitle" value="<?php
			
			echo $news['news_title'];
		
			?>" required></input>
				</label>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
			<label>Paragraph
			<input type="text" name="NewsBody" value="<?php
			
				echo $news["news_content"];
		}
			?>" required>
			</label>
			<input type="submit" class="button" value="Add News" ></input>
			</div>
		</div>

<!-- main content end -->

<!--Standard Footer-->


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
