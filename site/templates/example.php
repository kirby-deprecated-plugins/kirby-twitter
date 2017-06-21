<!DOCTYPE html>

<html>

<head>
  <title>Twitter - example</title>

<!-- Please download the Font Awesome fonts from http://fortawesome.github.io/Font-Awesome/ and place them in /assets/fonts/ since they are not included in this package -->
<?php echo css(array('assets/css/font-awesome.min.css','assets/twitter/twitter.css')); ?>

</head>

<body>

<h2 class="twitter-title"><?php echo $site->twitter_title()->text();?></h2>
<?php

showTweets();

echo js(array('assets/js/jquery.js','assets/twitter/twitter.js'));

?>

</body>
</html>
