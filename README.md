# Retweetr

## Introduction
Retweetr is a simple database-free PHP twitter bot which offers multi-account retweeting. You can retweet a single tweet across multiple accounts simultaneously within a few minutes of set-up. Twitters API guidelines (at the time of writing this: 08/02/2018) suggest that automated retweeting is permitted as long as it's not used aggressively or spammy. Automated Liking however is against the terms and thus not included in this app.

![Preview of Retweetr](https://i.imgur.com/NAWpqhW.png)

## Setup
1. Download or clone this repository onto a local or hosted web server running PHP
2. Create a twitter app from each account that you plan to retweet from at https://apps.twitter.com/
3. Open up config/accounts.php and add in a new array element for each of your apps created in the previous step
4. Visit the index.php file through a URL
5. Enter a twitter username in the input field and click "Get Tweets"
6. Choose a tweet and be patient, as random delays are put in place between each account to seem a little less automatic

## Credits
* J7mbo for the twitter/PHP api wrapper: https://github.com/J7mbo/twitter-api-php
* Bootstrap https://v4-alpha.getbootstrap.com/
* Me for the rest
