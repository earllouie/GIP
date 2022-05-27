 <?php
include("server.php");
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>News and Highlights</title>
	<link rel="icon" href="giplogo.png">
    <link rel="stylesheet" href="css/foundation/foundation.css" />
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/footer/footer_layout.css" />
    <link rel="stylesheet" href="theme.css"/>
	<style>
	.log-in-form {
  padding: $form-spacing;
  border-radius: $global-radius;
}
	
	</style>
  </head>
  <body>

    <!-- <input id="tmp-link" type="hidden" data-link=""> -->

<!-- main -->
    <div id="main-content">

<div class="row" >
	<div class="large-6 columns" >
		<form class="log-in-form" class="text-center">
			<h4 class="text-center">Log in with you email account</h4>
			  <label>Email
				<input type="email" placeholder="somebody@example.com">
			  </label>
			  <label>Password
				<input type="password" placeholder="Password">
			  </label>
			<input id="show-password" type="checkbox"><label for="show-password">Show password</label>
			  <p><input type="submit" class="button expanded" value="Log in"></input></p>
			  <p class="text-center"><a href="#">Forgot your password?</a></p>
		</form>
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
