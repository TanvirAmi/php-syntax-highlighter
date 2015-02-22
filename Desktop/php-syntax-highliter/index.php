<!doctype html>
<html>
<head>
<meata charset="utf8">
<title>PHP syntax highlight</title>
<link rel="stylesheet" type="text/css" media="screen" href="style/bootstrap.min.css" />
<style>
	.container {
    width: 520px;
    margin: 40px auto;
	}
</style>
</head>

<body>
<div class="container">
	<form role="form" action="index.php" method="post">
		<textarea class="form-control" name="code" rows="10" required></textarea>
		<center style="margin-top: 10px;">
		<input type="submit" name="submit" value="SUBMIT" class="btn btn-danger">	
		</center>
	</form>	


<?php
if(isset($_REQUEST['submit'])){
	$rawCode = $_REQUEST['code'];

	$a = substr(htmlentities($rawCode), 0,8);
	$b = substr(htmlentities($rawCode), -5);
	if($a != "&lt;?php"){
		$x = "<?php \n".$rawCode;
	}
	
	if($b != "?&gt;"){
		$x = $x."\n?>";
	}
	
	if(!isset($x)){
		$x = $rawCode;
	}
	$z = highlight_string($x, true);
}
?>
<?php if(isset($z)){?>
<div>
	<?php echo "<br/>PHP CODE: <br/>"; ?>
</div>

<div>
	<?php echo $z; ?>
</div>
<?php 
} 
?>
</div>
</body>
</html>
