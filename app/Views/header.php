<!doctype html>
<html lang="en">
	<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title>Dashboard</title>
	<link rel="icon" type="image/png" href="<?=base_url();?>/favicon.png">
	
	<?php 
	/*echo "The theme ID: ".$myTheme['value'];
	echo " The theme name: ".$theme['theme_name'];
	echo " The icon color: ".$theme['icon_color'];
	*/	
		if ($theme['theme_name'] == "Default") {
			echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">';
		}
		else {
	?>
	<link href="<?=base_url();?>/themes/<?=$theme['theme_name'];?>.css" rel="stylesheet">
	<?php
		}
	?>
	
	<!--<link href="<?=base_url();?>/includes/ticker.css" rel="stylesheet">-->
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>


