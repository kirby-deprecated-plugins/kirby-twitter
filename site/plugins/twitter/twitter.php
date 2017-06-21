<?php

/* http://www.webdevdoor.com/php/authenticating-twitter-feed-timeline-oauth */

if (!defined('KIRBY')) {
  die();
}

function showTweets()
  {
/* get kirby environment in this function */

  $kirby = kirby();
  $site = $kirby->site();

/* the file with the tweets, will be created when it's not there */

  $twitterTweetcache = c::get('twitterAssets').'tweets.js';

/* compare cache-settings against tweet-file age (in hours) */

  if(file_exists($twitterTweetcache))
    {
  $createTime = floor((time()-filemtime($twitterTweetcache))/3600);
    }
  else
    {
  $createTime = 1000;
    }

  $cacheTime = $site->twitter_cache()->int();
  $refreshTweet = ($createTime >= $cacheTime)?$refreshTweet = 1:$refreshTweet = 0;

/* update tweet.js when needed, uses oauth identification */

  if($refreshTweet)
    {
  $twitterOauth = 'site/plugins/twitter/oauth/oauth_twitter.php';

/* check if file exist from relative path */

    if(file_exists($twitterOauth))
      {
    require_once($twitterOauth);

      function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret)
        {
      $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
      return $connection;
        }

    $connection = getConnectionWithAccessToken(c::get('twittterConsumerkey'), c::get('twitterConsumersecret'), c::get('twitterAccesstoken'), c::get('twitterAccesstokensecret'));
    $tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".c::get('twitterUser')."&count=".c::get('twitterNotweets'));

/* after a successfull query to twitters-server, update the local (cache) tweets */

    file_put_contents($twitterTweetcache,json_encode($tweets));
      }

/* oAuth can not be fetched */

    else
      {
    echo '<hr><b>Error - </b> Twitter oAuth not found.<hr>';
      }
    }

/* get the settings from the panel / back-end of kirby */

  $twitter_number = $site->twitter_number()->int();
  $twitter_time = $site->twitter_time()->int() == 1?1:0;
  $twitter_name = $site->twitter_name()->int() == 1?1:0;
  $twitter_image = $site->twitter_image()->int() == 1?1:0;

  $twitterSettings = '';
  $twitterSettings .= '<script>';
  $twitterSettings .= 'var showTweetAmount = '.$twitter_number.';';
  $twitterSettings .= 'var showTweetTime = '.$twitter_time.';';
  $twitterSettings .= 'var showTweetUsername = '.$twitter_name.';';
  $twitterSettings .= 'var showTweetAvatar = '.$twitter_image.';';
  $twitterSettings .= 'var refreshTweet = '.$refreshTweet.';';
  $twitterSettings .= 'var twitterAssetPath = \''.kirby()->urls()->index().'/'.c::get('twitterAssets').'\';';
  $twitterSettings .= '</script>';

  $twitterWrapper = '<div id="twitter-feed"></div>';

/* write down the settings (for later usage) and twitter-wrapper */

  echo chr(10).$twitterSettings.$twitterWrapper.chr(10);

  }

?>
