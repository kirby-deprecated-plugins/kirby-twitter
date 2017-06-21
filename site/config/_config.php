/* COPY / PASTE THE CONTENT OF THIS FILE AT THE END OF /site/config/config.php */

/* --------------------------------------------------
Twitter Configuration 1#3 - TOKENS

Place your tokens here...
...get them @ https://dev.twitter.com/apps/
(or search for the oauth-signature-generator).
-------------------------------------------------- */

c::set('twitterUser', 'xxxxxxxx');
c::set('twittterConsumerkey', 'xxxxxxxxxxxxxxxxxxxxxxxx');
c::set('twitterConsumersecret', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');
c::set('twitterAccesstoken', 'xxxxxxxx-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');
c::set('twitterAccesstokensecret', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');

/* --------------------------------------------------
Twitter Configuration 2#3 - QUERY MAX.

At default, 9 tweets will be queried (and saved).
If you want more tweets, change it here...
...and adjust your panels-blueprint.
-------------------------------------------------- */

c::set('twitterNotweets', '9');

/* --------------------------------------------------
Twitter Configuration 3#3 - ASSETS PATH

At default assets (optional .css and required .js)
are saved in <root/>'assets/twitter/' <- mind the /

You can change this path (with the ending 'slash').
-------------------------------------------------- */

c::set('twitterAssets', 'assets/twitter/');
