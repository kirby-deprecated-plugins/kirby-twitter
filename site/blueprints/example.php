<?php if(!defined('KIRBY')) exit ?>

title: Twitter Example
pages: true
fields:

  title:
    label: Title
    type:  text

#########################################################################
## TWITTER
#########################################################################

  twitter_title:
    label: Title
    help: the title of this section
    type: text
    width: 1/3

  twitter_cache:
    label: Cache time
    width: 1/3
    type: select
    help: the refresh interval of a timeline
    required: yes
    default: 2
    options:
      0: realtime
      1: 1 hour
      2: 2 hours
      5: 5 hours
      6: 6 hours
      12: 12 hours
      24: 24 hours

  twitter_number:
    label: Number of tweets
    width: 1/3
    type: number
    required: yes
    default: 2
    help: number of tweets, 1 - 9 in total
    min: 1
    max: 9

  twitter_time:
    label: Timestamp
    width: 1/3
    type: checkbox
    text: Show a timestamp below a tweet?

  twitter_name:
    label: Username
    width: 1/3
    type: checkbox
    text: Show the username above a tweet?

  twitter_image:
    label: Avatar
    width: 1/3
    type: checkbox
    text: Show the avatar before a tweet?
