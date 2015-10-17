
<!DOCTYPE html>
<html>
<head>
	   <meta charset="utf-8">
	   <title></title>
	   <meta name="viewport" content="width=device-width, initial-scale=1">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
			 
	    <!-- Load jQuery UI CSS  -->
	   <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/ui-lightness/jquery-ui.css">
	    <!-- Load jQuery JS -->
	    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
	    <!-- Load jQuery UI Main JS  -->
	   <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	   
	  <script>
	  $(function() {
	    $( "#datepicker1" ).datepicker({ dateFormat: "yy-mm-dd" }).val();
	    $( "#datepicker2" ).datepicker({ dateFormat: "yy-mm-dd" }).val();
	  });
	  </script>
</head>
<body>
	
      <nav class="navbar navbar-default ">
      	<div class="navbar-header">
	      <a class="navbar-brand" href="#">
	        <img alt="Brand" src="erelego.png" width="40" height="40" style="margin-top:0px">
	      </a>
       </div>
      	<ul class="nav nav-tabs">
		    <li class="active"><a href="">Home</a></li>
		    <li><a href="#">Menu 1</a></li>
		    <li><a href="#">Menu 2</a></li>
		    <li><a href="#">Menu 3</a></li>
		  </ul>
      </nav>
    
    <div class="container">
    	<div class="jumbotron">
		<form action="pageno.php" method="post" class="form-inline">
			<div class="form-group">
				<h3>Date <br></h3>
				From   <input type="text" name="datefrom" value="" id="datepicker1" class="form-control" >
				To <input type="text" name="dateto" value="<?php echo $today = date('Y-m-d');?>" id="datepicker2" class="form-control" >
				<input type="submit" class="btn btn-primary" name="submit">
		    </div>
	    </form>
	    <div>
    </div>
</body>
</html>
