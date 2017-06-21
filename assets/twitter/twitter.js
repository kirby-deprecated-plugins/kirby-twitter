/* debug only, can be deleted */

var twitterSettings = '[twitter] number of tweets #'+showTweetAmount+' | show time #'+showTweetTime+' | show name #'+showTweetUsername+' | show avatar #'+showTweetAvatar+' | refresh timeline #'+refreshTweet;

console.log(twitterSettings);

/* define the settings, when something went wrong in the php-file */

if(typeof showTweetAmount === 'undefined'){var showTweetAmount = 2;}
if(typeof showTweetTime === 'undefined'){var showTweetTime = 1;}
if(typeof showTweetUsername === 'undefined'){var showTweetUsername = 1;}
if(typeof showTweetAvatar === 'undefined'){var showTweetAvatar = 1;}
if(typeof refreshTweet === 'undefined'){var refreshTweet = 1;}
if(typeof twitterAssetPath === 'undefined'){var twitterAssetPath = 'assets/twitter/';}

/* set to false, when you don't want to the tweet itself */

var showTweetStatus = true;

/* at default, links will made clickable */

var showTweetLinks = true;

/* read the tweets, json format, and convert them to a nice list */

jQuery(document).ready(function($)
  {
var headerHTML = '';
var loadingHTML = '<div id="loading-container"><i class="fa fa-twitter fa-spin"></i></div>';

$('#twitter-feed').html(loadingHTML);

$.getJSON(twitterAssetPath+'tweets.js',

function(feeds)
  {
var feedHTML = '';
var displayCounter = 1;

for (var i=0; i<feeds.length; i++)
  {
var tweetscreenname = feeds[i].user.name;
var tweetusername = feeds[i].user.screen_name;
var profileimage = feeds[i].user.profile_image_url_https;
var status = feeds[i].text;
var tweetid = feeds[i].id_str;

  if ((feeds[i].text.length > 1) && (displayCounter <= showTweetAmount))
    {

    if (showTweetLinks == true)
      {
    status = addlinks(status);
      }

    feedHTML += '<li id="tw_'+displayCounter+'">';

    if(showTweetAvatar)
      {
    feedHTML += '<span class="twitterPic"><a href="https://twitter.com/'+tweetusername+'" target="_blank"><img src="'+profileimage+'"images/twitter-feed-icon.png" width="42" height="42" alt="twitter icon" /></a></span>';
      }

    if(showTweetUsername)
      {
    feedHTML += '<span class="twitterName"><strong><a href="https://twitter.com/'+tweetusername+'" target="_blank">'+tweetscreenname+'</a></strong> | <a href="https://twitter.com/'+tweetusername+'" target="_blank">@'+tweetusername+'</a></span><br>';
      }

    if(showTweetStatus)
      {
    feedHTML += '<span class="twitterStatus">'+status+'</span><br>';
      }

    if(showTweetTime)
      {
    feedHTML += '<span class="twitterTime"><i class="fa fa-twitter"></i> <a href="https://twitter.com/'+tweetusername+'/status/'+tweetid+'" target="_blank">'+relative_time(feeds[i].created_at)+'</a></span><br>';
      }

    feedHTML += '</li>';
    displayCounter++;

    }

  }

/* populate the twitter-wrapper */

$('#twitter-feed').html('<ul>'+feedHTML+'</ul>');

  }).error(function(jqXHR, textStatus, errorThrown)
    {

/* debug only, can be deleted */

var error = '';

if (jqXHR.status === 0)
    {
  error = 'Connection problem. Check file path and www vs non-www in getJSON request';
    } else if (jqXHR.status == 404) {
  error = 'Requested page not found. [404]';
    } else if (jqXHR.status == 500) {
  error = 'Internal Server Error [500].';
    } else if (exception === 'parsererror') {
  error = 'Requested JSON parse failed.';
    } else if (exception === 'timeout') {
  error = 'Time out error.';
    } else if (exception === 'abort') {
  error = 'Ajax request aborted.';
    } else {
  error = 'Uncaught Error.\n' + jqXHR.responseText;
    }

  console.log('[twitter] error #' + error);
    });

/* convert plain text to anchors */

function addlinks(data)
  {
data = data.replace(/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g, function(url)
  {
return '<a href="'+url+'"  target="_blank">'+url+'</a>';
  });

data = data.replace(/\B@([_a-z0-9]+)/ig, function(reply)
  {
return '<a href="http://twitter.com/'+reply.substring(1)+'" style="font-weight:lighter;" target="_blank">'+reply.charAt(0)+reply.substring(1)+'</a>';
  });

data = data.replace(/\B#([_a-z0-9]+)/ig, function(reply)
  {
return '<a href="https://twitter.com/search?q='+reply.substring(1)+'" style="font-weight:lighter;" target="_blank">'+reply.charAt(0)+reply.substring(1)+'</a>';
  });

return data;
  }

/* create relative time of a tweet (can be localized) */

function relative_time(time_value)
  {
var values = time_value.split(" ");
time_value = values[1] + " " + values[2] + ", " + values[5] + " " + values[3];
var parsed_date = Date.parse(time_value);
var relative_to = (arguments.length > 1) ? arguments[1] : new Date();
var delta = parseInt((relative_to.getTime() - parsed_date) / 1000);
var shortdate = time_value.substr(4,2) + " " + time_value.substr(0,3);
delta = delta + (relative_to.getTimezoneOffset() * 60);

  if (delta < 60) {
    return '1m';
  } else if(delta < 120) {
    return '1m';
  } else if(delta < (60*60)) {
    return (parseInt(delta / 60)).toString() + 'm';
  } else if(delta < (120*60)) {
    return '1m';
  } else if(delta < (24*60*60)) {
    return (parseInt(delta / 3600)).toString() + 'h';
  } else if(delta < (48*60*60)) {
	return shortdate;
  } else {
    return shortdate;
  }

  }

  });
