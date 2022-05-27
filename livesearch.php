<?php
include("server.php");?>
<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="js/vendor/jquery.js"></script>
<script src="js/foundation/foundation.js"></script>
<script src="js/foundation/foundation.alert.js"></script>
</head>
<body>

<input type="text" name="search" id="search" onkeyup="search_data()">
<div id='search_table'>
<table class="table table-hover">

<tbody id="output">
<tr>
	
</tr>
</tbody>
</table>
</div>
<div class="large-3 columns">

</div>
<script>
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
	}
}

</script>


</body>
</html>
