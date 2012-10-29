<?php connectDB(); ?>

<!DOCTYPE html> <!--header-home.php-->
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>The Milton Paper<?php pagetitle(); ?></title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="/stylesheets/style.css">
<script src="javascripts/vendor/modernizr.js"></script>
</head>
<body class="<?php bodyclass(); ?>">

<div class="page-wrap">

<nav class="super-nav">
  <ul>
    <li><a href="/">Home</a></li>
    <li><a href="/subscribe.php">Subscribe</a></li>
    <li><a href="/contact.php">Contact</a></li>
    <li><a href="/about.php">About</a></li>
  </ul>
  <form class="supersearch">
    <input type="text">
    <button type="submit" class="primary">Search</button>
</nav>

<?php extrahead(); ?>