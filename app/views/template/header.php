<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title ?></title>
	<?php if ($controller != 'Home') : ?>
		<link rel="stylesheet" type="text/css" href="<?= base_url() . 'css/style.css' ?>">
	<?php else : ?>
		<link rel="stylesheet" type="text/css" href="<?= base_url() . 'css/stylehome.css' ?>">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<?php endif; ?>
</head>

<body>