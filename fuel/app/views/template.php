<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>であっちんぐ</title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<?php echo Asset::css('custom.css'); ?>
	<script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
	<?php echo Asset::js('bootstrap.min.js'); ?>
</head>
<body>
<header class="header">
	<?php echo $header; ?>
</header>
<div class="container">
	<div class="starter-template">
		<?php echo $content; ?>
	</div>
</div>
<!--
<footer class="footer">
	<?php echo $footer; ?>
</footer>
-->
</body>
</html>
