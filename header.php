<html>
	<head>
		<title><?php echo $pageTitle; ?></title>
		<meta charset="utf-8">
		<meta name="generator" content="MicroDocs: https://soft.rendeer.pl/MicroDocs/" />
		<link rel="stylesheet" href="<?php echo $address; ?>/md-themes/default/style.css" type="text/css">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $address; ?>/assets/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $address; ?>/assets/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $address; ?>/assets/favicon-16x16.png">
		<link rel="mask-icon" href="<?php echo $address; ?>/assets/safari-pinned-tab.svg" color="#ff4cc1">
		<meta name="msapplication-TileColor" content="#ff4cc1">
		<meta name="theme-color" content="#ffffff">
	</head>
	<body>


	<div id=mainContainer>
	<div id=index>
		<a href="<?php echo $address; ?>" alt="<?php echo $title; ?>" id=indexHeader>
<?php if ($showLogoInIndex) echo"<img src=\"$address/assets/logo.png\" id=\"logo\" alt=\"$title\" />"; ?>
<?php if ($showTitleInIndex) echo"<h1>$title</h1>"; ?>
		</a>
<?php echo $index; ?>
	</div>