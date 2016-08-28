<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>TEST</title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<?php echo Asset::css('custom.css'); ?>
</head>
<body>
<header>
	<?php echo $header; ?>
</header>
<div class="container">
	<div class="starter-template">
		<?php echo $content; ?>
	</div>
</div>
<footer>
	<?php echo $footer; ?>
</footer>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</body>
</html>
