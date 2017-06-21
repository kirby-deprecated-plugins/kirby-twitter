# kirby-twitter

Fully integrate your tweets, with oAuth-support and several adjustable settings.

**Version 0.0.1 / October, 27th 2015**
- Intial public offering.

**Version 0.0.2 / October, 28th 2015**
- Moved all settings to config.php

**Version 0.0.3 / October, 30th 2015**
- Typo-fix between / and \ notation (Windows server <-> Linux server)

An easy way to integrate Tweets straight to your site (not within a iFrame, like a widget - but as a real part of your DOM-structure, so you can manipulate all elements).

****

For more information, including a set-up manual, please go this forum post - https://forum.getkirby.com/t/twitter-integration-with-full-control-cache-mechanism-and-oauth/2344

****

It includes oAuth-support, a caching mechanism for your tweets and a custom-panel setup (in the blueprint), where you can set your preferences;

- Number of tweets to be shown.
- The title on top of the tweets list.
- The cache time, before refreshing your timeline.
- Place / hide several elements (username, time, etc...)

See ```example.php``` for a basic setup (located in the ```templates``` folder - and don't forget to set your oAuth-tokens in ```plugins\twitter\tokens.php```

****
![Kirby Twitter](http://i.imgur.com/KqrhffI.gif "Kirby Twitter, the plugin in action'")

- the plugin in action

![Kirby Twitter](http://i.imgur.com/cz6zMdj.png "Kirby Twitter, example timeline'")

- basic example of your tweets

![Kirby Twitter](http://i.imgur.com/bkqmM2e.png "Kirby Twitter, settings in the panel")

- the settings in the panel -
