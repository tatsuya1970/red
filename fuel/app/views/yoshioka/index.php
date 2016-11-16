
<!--
core.html
Supersized - Fullscreen Slideshow jQuery Plugin Version 3.0
By Sam Dunn (www.buildinternet.com // www.onemightyroar.com)
Website: www.buildinternet.com/project/supersized
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>であっちんぐ。</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <link rel="stylesheet" href="/assets/css/supersized.css" type="text/css" media="screen"/>
   <script type="text/javascript" src="/assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="/aseets/js/supersized.3.0.core.js"></script>
    <script type="text/javascript">


        $(function () {
            $.fn.supersized.options = {
                startwidth: 6,
                startheight: 5,
                vertical_center: 1,
                slides: [
                    {image: '/assets/img/back.jpg'}
                ]
            }
            $('#supersized').supersized();
        });


    </script>

</head>
<body>


<div id="loading">&nbsp;</div>
<div id="content-wrapper">
    <div id="content">
      <a href="<?php echo Uri::create('search'); ?>">
                   <img src="/assets/img/title.png" class="p1">
                   </a>
<br>
        
            <p>
             <h2>

                <a href="https://itunes.apple.com/us/app/gulugulu/id991508395?mt=8"><img src="/assets/img/appstore.png" class="p0"></a>
            <p>
                  </h2>
    </div>
</div>
<div id="supersized"></div>
</body>
</html>

