<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>QR generator</title>
	<link rel="stylesheet" href="/assets/css/bulma.min.css">
</head>

<body>
	<?php
  function print_form($f_name, $l_name, $mssv, $doses)
  {


  ?>
	<form action="qr_generator.php" method="POST">
		First name: <input type="text" name="f_name" value="<?php echo $f_name ?>" /><br />
		Last name: <b>(*)</b> <input type="text" name="l_name" value="<?php echo $l_name ?>" /><br />
		MSSV:<b>(*)</b> <input type="mssv" name="mssv" value="<?php echo $mssv ?>"> <br />
		Number of Covid 19 doses injected: <input type="number" name="doses" value="<?php echo $doses ?>"> <br />
		<input type="submit" name="submit" value="Submit" /><input type="reset" />
	</form>
	<?php
  } ?>

	<?php
  function check_form($f_name, $l_name, $mssv, $doses)
  {
	  if (!$l_name || !$mssv) {
		  echo "<h3>You are missing some required fields!</h3>";
		  print_form($f_name, $l_name, $mssv, $doses);
	  } else {
		  confirm_form($f_name, $l_name, $mssv, $doses);
	  }
  }
  ?>

	<?php
  function confirm_form($f_name, $l_name, $mssv, $doses)
  {
  ?>
	<h2>Thanks! Below is the generated qr code</h2>
	<?php
	  $str = "Name:$f_name $l_name;MSSV: $mssv; doses: $doses";
	  echo "<img src=\"https://api.qrserver.com/v1/create-qr-code/?data=$str&amp;size=100x100\"/>";
  }
  ?>

	<?php
  if (!$_POST || !$_POST["submit"]) {
  ?>
	<h3>Please enter information</h3>
	<p>Fields with a "<b>*</b>" are required</p>
	<?php
	  print_form("", "", "", "");
  } else {
	  check_form($_POST["f_name"], $_POST["l_name"], $_POST["mssv"], $_POST["doses"]);
  }
  ?>



</body>

</html>
