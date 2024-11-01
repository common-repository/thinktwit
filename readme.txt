=== ThinkTwit ===
Contributors: stephen.pickett
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=B693F67QHAT8E
Author URI: http://www.thepicketts.org
Tags: twitter, tweet, thinktwit, hashtag, multiple, caching, ajax, shortcode, css
Requires at least: 3.2
Tested up to: 5.8
Stable tag: 1.7.1

Outputs tweets from any Twitter users, hashtag or keyword through the Widget interface. Can be called via shortcode or PHP function call and supports i18n for multiple languages


== Description ==

ThinkTwit is a highly customisable plugin that can output tweets from multiple users (something that very few other plugins can do successfully), #hashtag or keyword. It uses the Twitter Search JSON API v1.1 to access tweets which can be cached. It is very simple, yet flexible and easily customised. It can be placed on your Wordpress page simply through drag and drop on the Widgets interface or through the use of Shortcode or Output Anywhere (PHP function call). Supports i18n!

**Support:** http://www.thepicketts.org/thinktwit/ or on Twitter **@stephenpickett**

Features:
--------
 * Can be configured from Widgets settings (if displayed in sidebar)
 * Can be implemented using shortcode or Output Anywhere (PHP function call)
 * Contains default slimline CSS for integrated look and feel (can be turned off)
 * Easy to configure and customise (through settings and CSS)
 * Multiple instances can be deployed (like other widgets/plugins)
 * JavaScript is not required (unless no-caching is activated)
 * Can specify multiple usernames
 * Tweets can be filtered by #hashtag or keyword
 * You can select to filter between an AND or OR filter to either show tweets only containing specified usernames and hashtags or any of them
 * Can specify maximum number of tweets to display
 * Can specify maximum number of days back to display
 * Supports no-caching, to prevent caching of tweets by caching engines such as WP Super Cache
 * Supports cURL as a fallback method, if necessary
 * Supports optional caching of tweets and avatars
 * Cache can be manually cleared and will automatically update if the cache is empty
 * Can display the avatar of the Twitter user
 * Output can be filtered (using apply_filters)
 * Can optionally output "Follow @username" links
 * Automated cleanup process that runs periodically according to user setting
 * Internationalised using i18n meaning that if it isn't in your language it's easy to translate! See Other Notes for more details
 * Gracefully deals with Twitter errors and adds them to the PHP error log
 * Supports live updates of tweets when using no-caching (AJAX)
 
Requirements/Restrictions:
-------------------------
 * Works with Wordpress 3.2 to 5.7.2, not tested with other versions nor re-tested on older versions than most current
 * Can be installed using the widgets sidebar
 * Can also be used via shortcode or Output Anywhere (PHP function call)
 * Uses Twitter REST API v1.1 Application-only authentication and therefore requires an application key (see installation)
 
I am looking for more people to translate ThinkTwit in to other languages, if you are interested please see "Internationalisation (i18n)" 
under "Other Notes".


== Installation ==

= Obtaining a Twitter authentication key =

1. Go to https://dev.twitter.com/apps/new

1. Login using your standard Twitter credentials

1. Complete the form:

 * Name: ThinkTwit - [site name]
 * Description: ThinkTwit plugin
 * Website: [url of your website]
 * Callback URL: [url of your website]
   
1. Make a note of your "Consumer key" and "Consumer secret"

= Installing plugin =

1. Unpack the zip file and upload the `thinktwit` folder to the `/wp-content/plugins/` directory, or download through the `Plugins` menu 
in WordPress

1. Activate the plugin through the `Plugins` menu in WordPress

1. Navigate to Settings->ThinkTwit from the Wordpress Dashboard

1. Enter the "Consumer key" and "Consumer secret" obtained earlier and save your settings

Updates are automatic. Click on `Upgrade Automatically` if prompted from the admin menu. If you ever have to manually 
upgrade, simply replace the files with those from the new version.

= Configuring widget =

1. Go to `Appearance` and then `Widgets` and drag `ThinkTwit` to your sidebar

1. Fill in the options as required and then save

= Configuring shortcode =

ThinkTwit can be used in any page or post, or anywhere else configured to use shortcodes, using the following syntax:

`[thinktwit
  widget_id=0
  usernames="stephenpickett"
  hashtags="thinktwit"
  hashtag_filter=0
  username_suffix=" said: "
  limit=5
  max_days=7
  update_frequency=-1
  show_username="username"
  show_avatar=1
  show_published=1
  show_follow=1
  links_new_window=1
  no_cache=0
  live_update_freq=0
  debug=0
  time_this_happened="This happened "
  time_less_min="less than a minute ago"
  time_min="about a minute ago"
  time_more_mins=" minutes ago"
  time_1_hour="about an hour ago"
  time_2_hours="a couple of hours ago"
  time_precise_hours="about =x= hours ago"
  time_1_day="a day ago"
  time_2_days="almost 2 days ago"
  time_many_days=" days ago"
  time_no_recent="There have been no recent tweets"
 ]`

= Configuring Output Anywhere =

ThinkTwit can be called within templates and other areas where you can use PHP using the following syntax:

`<?php $args = array(
    'widget_id'          => 0,
    'usernames'          => "stephenpickett",
    'hashtags'           => "thinktwit",
    'hashtag_filter'     => 0,
    'username_suffix'    => " said: ",
    'limit'              => 5,
    'max_days'           => 7,
    'update_frequency'   => 0,
    'show_username'      => "name",
    'show_avatar'        => 1,
    'show_published'     => 1,
    'show_follow'        => 1,
    'links_new_window'   => 1,
    'no_cache'           => 0,
    'live_update_freq'   => 0,
    'debug'              => 0,
    'time_this_happened' => "This happened ",
    'time_less_min'      => "less than a minute ago",
    'time_min'           => "about a minute ago",
    'time_more_mins'     => " minutes ago",
    'time_1_hour'        => "about an hour ago",
    'time_2_hours'       => "a couple of hours ago",
    'time_precise_hours' => "about =x= hours ago",
    'time_1_day'         => "a day ago",
    'time_2_days'        => "almost 2 days ago",
    'time_many_days'     => " days ago",
    'time_no_recent'     => "There have been no recent tweets");

	echo ThinkTwit::output_anywhere($args); ?>`
	
= Shortcode/Output Anywhere Parameters =

**widget_id**: *integer* - You should give this a unique id for caching or styling.

**usernames**: *string* - The list of Twitter usernames to output tweets for.

**hashtags**: *string* - The list of hashtags to output tweets for.

**hashtag_filter**: *string* - 1 indicates that usernames AND hashtags must both exist in a tweet, 0 indicates that either can exist.

**username_suffix**: *string* - The text that should appear after a username e.g. " said: ".

**limit**: *int* - The maximum number of tweets to display.

**max_days**: *int* - The maximum age in days of the tweets to be displayed.

**update_frequency**: *int* - Minus 1 indicates live (uncached), minus 2 indicates paused, 0 indicates live (cached), and anything else 
indicates the number of hours between getting updates from Twitter.

**show_username**: *string* - None indicates no username should be shown, name indicates the user's full name should be shown and
username indicates the user's username should be shown.

**show_avatar**: *boolean* - Indicates whether the Twitter user's avatar should be displayed - 1 for true and 0 for false.

**show_published**: *boolean* - Indicates whether the time the tweet was made should be displayed e.g. "This happened a day ago" - 1 for true and 0 for false.

**show_follow**: *boolean* - Indicates whether or not to show a "Follow @username" link for each username.

**links_new_window**: *boolean* - Indicates whether links should be opened in a new window - 1 for true and 0 for false.

**no_cache**: *boolean* - Indicates whether or not to use no-caching - 1 for true and 0 for false.

**live_update_freq**: *int* - The frequency of live updates (zero for off).

**debug**: *boolean* - Indicates whether to turn on debugging mode - 1 for true and 0 for false.

**time_this_happened**: *string* - Time prefix (default: "This happened").

**time_less_min**: *string* - Time less than 1 minute (default: "less than a minute ago").

**time_min**: *string* - Time approximately 1 minute ago (default: "about a minute ago").

**time_more_mins**: *string* - Time more than 1 minute ago (default: " minutes ago").

**time_1_hour**: *string* - Time approximately 1 hour ago (default: "about an hour ago").

**time_2_hours**: *string* - Time approximately 2 hours ago (default: "a couple of hours ago").

**time_precise_hours**: *string* - Time more than 2 hours ago (default: "about =x= hours ago"). NOTE: =x= should be used to insert the number of hours.

**time_1_day**: *string* - Time approximately 1 day ago (default: "a day ago").

**time_2_days**: *string* - Time approximately 2 days ago (default: "almost 2 days ago").

**time_many_days**: *string* - Time more than 2 days ago (default: " days ago").

**time_no_recent**: *string* - Output when there are no tweets to display (default: "There have been no recent tweets").

NOTE: You can leave out any parameter to use the default, but be aware to change the unique id if you are using Output Anywhere in more than one place.


== Uninstall ==

To uninstall simply deactivate and then delete through the Plugins admin interface. All options and files will be automatically removed.


== Frequently Asked Questions ==

= When I add the widget I cannot expand the menus, what is wrong? =

There is a known issue where the ThinkTwit sub menus will not expand after you add a widget for the first time. Please simply reload the widgets
page and it will now work going forwards.

= How many tweets will be shown? =

This is determined by your settings within the widget or your custom call. The default is set to 5.

= How long back will tweets be shown for? =

If using the update frequency "Live (uncached)" ThinkTwit will show tweets that have occurred as far back as "max days" (up to the last 7 
days, due to restrictions in the Twitter API). However, any other option will utilise ThinkTwit's own cache and will therefore display anything 
within the cache (up to "max days"). The exception to this is when the "Paused" option is selected - this will retain tweets (and display those 
tweets) indefinitely (until the update frequency is changed from "Paused").

= What will happen if I haven't tweeted in the last 7 days? =

If you aren't caching tweets then a message will be shown stating: "There have been no tweets for the past 7 days", but if you are caching 
tweets then it will simply show the tweets stored in the cache, even if they are older than 7 days. This message can be customised within the
settings.

= How can I style ThinkTwit? =

ThinkTwit uses the widget API so should be styled correctly by your theme. It has some default CSS but you may, however, wish to turn this
off (in the ThinkTwit Settings) and add your own. If so you should find the following information handy:

* ThinkTwit essentially outputs tweets as a list
* The list container can be accessed using `ol.thinkTwitTweets`
* All tweets can be accessed using `ol.thinkTwitTweets li.thinkTwitTweet`
* Individual tweets can be accessed using `ol.thinkTwitTweets #tweet-n` where n is the number of the tweet
* Odd and even tweets can be accessed using `ol.thinkTwitTweets li.thinkTwitOdd` and `ol.thinkTwitTweets li.thinkTwitEven` accordingly
* The author within a tweet can be accessed using `ol.thinkTwitTweets li.thinkTwitTweet a.thinkTwitAuthor`
* The author suffix within a tweet can be accessed using `ol.thinkTwitTweets li.thinkTwitTweet a.thinkTwitSuffix`
* The content of a tweet can be accessed using `ol.thinkTwitTweets li.thinkTwitTweet a.thinkTwitContent`
* The published time within a tweet can be accessed using `ol.thinkTwitTweets li.thinkTwitTweet span.thinkTwitPublished`
* The "no tweets" message can be accessed using `ol.thinkTwitTweets li.thinkTwitNoTweets`
* The AJAX error message ("Error: Unable to display tweets") can be accessed using `p.thinkTwitError'

NOTE: Be sure to use the id to access each style in order to over-write the default CSS.

= How do I stop caching in caching engines such as WP Super Cache? =

Turn on no-caching in the widget settings.

= How does no-caching work? =

Instead of outputting HTML it outputs Javascript. The Javascript uses AJAX (via jQuery) to make a call to a method that returns the 
HTML which is then inserted in to the correct location.

= I'm using no-caching but nothing appears below the title =

Your theme is probably not setup properly. AJAX requires a location to insert the returned data from the server-side call. ThinkTwit
puts it in to the div that contains the widget. A Wordpress theme written correctly should output a unique id for each widget that is
output. Inform the developer of your theme to have the following (or something similar) in their register_sidebar function:

`'before_widget' => '<div id="%1$s" class="widget %2$s">'`

= I'm getting strange errors or no output =

You may need to clear and rebuild your cache - please use the Clear Cache button within Settings -> ThinkTwit in the Admin area, and then reload 
the page containing ThinkTwit. Otherwise please re-install - see [uninstall instructions](http://wordpress.org/extend/plugins/thinktwit/uninstallation/ "Uninstall ThinkTwit").

= How do I prevent use of nofollow tags in my URLs? =

You can apply a filter - see the following URL for an example:

http://digwp.com/2010/02/remove-nofollow-attributes-from-post-content/

= What are the options "Show when published" and "Update frequency"? =

* Show when published - indicates whether the time the tweet was made is shown e.g. "This happened 1 day ago"
* Update frequency - indicates how often Twitter should be contacted to get a list of tweets. Use this
to turn on or off caching, and to decide how often to update the cache

= Why aren't my avatar images showing? =

The `uploads/thinktwit/avatars` folder may not exist or it may not be writeable (this folder is required for caching avatars). Check that your Wordpress
installation has the write permissions to the `uploads` folder.

= How often do avatars get updated? =

Once every 24 hours (assuming a request is made in this period). This value is not currently configurable.

= Why do I constantly see the message "There have been no recent tweets"? =

It is likely that you have not entered your Twitter API credentials. Please see the Installation tab for more details and check your PHP
error log for any errors (such as incorrect authentication or rate limiting with Twitter).

= Where can I see ThinkTwit errors? =
You can look in the normal error log for your PHP setup. By default this is the error_log file within the root server of your Wordpress
installation but this may differ for each installation so if you are unsure please ask your server administrator.

= Why do I keep seeing the following error "ThinkTwit error: Twitter responded with an unexpected error - [message=Rate limit exceeded, code=88]"? =
This means that you are making too many requests to Twitter. If you are not using caching you should turn this on, and if you are already using it then
you should decrease the frequency that requests are made e.g. change update frequency from "Live (cached)" to "Hourly".

= What is live updates and how does it work? =
Live updates allow periodic updates to the user's screen every set number of seconds i.e. if this was set to 10 seconds then every 10 seconds a call would
be made to ThinkTwit to request any new Tweets. To use this feature you must have no-caching turned on.

NOTE: Even though you may be have a high frequency set this does not mean you will definitely get new tweets within that frequency. This is dependent upon
the frequency of updates that you have set in the update frequency for that widget, shortcode or your Output Anywhere call. If you are using caching then
the call will be made to the ThinkTwit cache and not Twitter itself - it is recommended that you use caching and not live calls if using live updates or
else you may find yourself blocked from Twitter.


== Internationalisation (i18n) ==

Currently the following languages are supported:

* es_ES - Spanish in Spain (many thanks to [Maria Ramos](http://www.webhostinghub.com/) for contributing)
* en_GB - English in Great Britain (default)
* sr_RS - Serbian in Serbia (many thanks to [Ogi Djuraskovic] (http://firstsiteguide.com/) for contributing)

If your language is not listed and you would like to translate in to your language please do the following:

1. Navigate to thinktwit/languages and take a copy of thinktwit.pot.
1. Open in the language editor of your choice e.g. [POedit](http://www.poedit.net/).
1. Translate each line until you've done them all.
1. Save as thinktwit-lang_COUNTRY.po e.g. thinktwit-en_GB.po - see [List of all Locales](http://www.roseindia.net/tutorials/I18N/locales-list.shtml) for more.
1. Go to [Contact](http://www.thepicketts.org/contact/) and fill in the form appropriately.
1. I will get in touch and ask that you respond with the translated file and a link to your site (if desired).


== Screenshots ==

1. screenshot-1.png shows ThinkTwit working as a widget on the the ThinkTwit development homepage showing just usernames
1. screenshot-2.png shows ThinkTwit working as a widget on the the ThinkTwit development homepage showing just hashtags
1. screenshot-3.png shows ThinkTwit working as a widget on the the ThinkTwit development homepage filtered by usernames and hashtags
1. screenshot-4.png shows ThinkTwit working via shortcode within a blog post on the the ThinkTwit development homepage
1. screenshot-5.png shows ThinkTwit working via a Output Anywhere (PHP function call) in the header of the ThinkTwit development homepage
1. screenshot-6.png shows the settings that can be configured within the widget


== Changelog ==

= 1.7.1 =
- (17 Aug 2021) Sanitised multiple inputs and escape output to remove further risk of cross site script security or injection issues and fixed an issue 
where CSS was shifting images to the left instead of just avatars - added a class "avatar" to images

= 1.7.0 =
- (03 Jul 2021) Modified logo and banner to remove risk of copyright issue, sanitised multiple inputs and outputs to remove risk of cross site script 
security or injection issues, replaced file-access and cURL with wp_remote_get(), made an improvement to calling default CSS file and now stores avatars
in the uploads directory instead of within the plugin directory

= 1.6.6 =
- (15 Dec 2018) Confirmed compatibility with Wordpress 5.0.1, fixed an error when saving settings for the first time and updated upgrade code to 
ensure that it triggers for all version older than 1.6.0

= 1.6.5 =
- (10 Dec 2015) Fixed an incompatibility with Wordpress 4.4 by renaming the Error class to ThinkTwitError

= 1.6.4 =
- (16 Aug 2015) Removed support for PHP 4 style class constructors, fixed "Reset Settings" function in the widget, added automatic live update 
functionality when using no-caching (AJAX) and fixed an issue within no-caching where the admin-ajax page was not found

= 1.6.3 =
- (07 Mar 2015) Added support for the Serbian language - many thanks to Ogi Djuraskovic of http://firstsiteguide.com for this!

= 1.6.2 =
- (16 Feb 2015) Very minor update for cURL users - fixes an issue where getting the token fails as it is not using cURL

= 1.6.1 =
- (28 Jan 2015) Change use of "<?=" to "<?php echo" for older versions of PHP that may not have "short_open_tag" turned on, fixed the uninstall
process, fixed an error when storing cache names but none have previously been stored and made a small change to the widget form to simplify
saving of widget settings, added shortcut links to the plugin page (Settings, Support and Donate), added a redirect to Settings page after
installation (or activation when consumer key or secret is missing) and added a "Paused" option to "Update frequency" to prevent the cache
from updating

= 1.6.0 =
- (26 Oct 2014) Fixed an issue with tweets not always being picked up from Twitter due to too many requests for the authentication token, fixed 
cleanup process not running, added translation to some missed areas, fixed a warning when filtering out old usernames, fixed the conversion of 
relevant Tweet content that wasn't being correctly turned in to links, updated the AJAX handler to use the recommended method (using 
admin-ajax.php), updated the Twitter Follow Button to use the new code but also used the IFRAME method to ensure it works with "Prevent Caching", 
added a Clear Cache button in the Settings, added the ability to filter usernames and hashtags using AND or OR searches, added code to load 
tweets when caching is turned on but the cache is empty, updated the Tweet object (which holds all tweets) to add some functionality and more 
clearly define the content and functions, and added logging functionality to log error messages to PHP error log

= 1.5.3 =
- (16 Apr 2014) Very minor update to Settings page where expected values not appearing throws a warning, and also updated compatibility version
in readme

= 1.5.2 =
- (29 Mar 2014) Big improvements to debugging: amended debug output to add the frequency of updates and use of no caching, put the messages in 
order of how they appear in the widget menu, now output actual menu options names and values rather than system values, and added formatting to 
aid identifying option names. Additionally, removed a potential security vulnerability that could allow an unauthorised user to write to the 
images folder and added a setting to allow the default style sheet to be turned off

= 1.5.1 =
- (09 Feb 2014) A user of another plugin (AI Twitter Feeds) that had borrowed the follow button code reported an issue that was a result of
an update to the follow button script from Twitter. This basic update simply updates the script so you should no longer get the following
error: "Uncaught ReferenceError: twttr is not defined"

= 1.5.0 =
- (25 Nov 2013) Fixed an issue preventing hashtags from working properly and added i18n internationalisation support, with Spanish the first 
language to be supported - many thanks to Maria Ramos at [webhostinghub.com](http://www.webhostinghub.com/)!

= 1.4.4 =
- (13 Nov 2013) Replaced use of split() with explode() as the former has been deprecated, allowed entering of empty usernames and hashtags, 
fixed the API call so that it doesn't search for mentions of the first username but actually searches for tweets by the first username 
and re-instated an updated version of the old avatar deletion code which runs periodically and takes account of tweets added from chosen 
hashtags

= 1.4.3 =
- (19 Oct 2013) Updated the readme.txt, and both shortcode and Output Anywhere as there were some inconsistencies in naming but also some of
the instructions were out of date and hence wrong. Should resolve any issues anyone is having with either of these or with multiple usage
on one page

= 1.4.2 =
- (14 Sep 2013) Renamed constants to prefix with ThinkTwit so that they don't interfere with constants from other plugins, changed help on
setting up Twitter app as name needs to be unique, added hashtag filtering in cache, added ability to search for hashtags without usernames 
and changed hashtag searching to be OR rather than AND

= 1.4.1 =
- (02 Jun 2013) Corrected failure to update ThinkTwit version stored in the database, made a minor addition to the new settings page that 
additionally outputs other information (version, cache names and date of last update to cache) that is stored in the settings which may be 
useful/interesting, fixed failure to limit number of tweets by specified value when showing live updates and fixed the follow button not loading
when using no-caching

= 1.4.0 =
- (25 May 2013) Updated to use Twitter REST API v1.1 - please note that after 11th June 2013 any version of ThinkTwit below 1.4.0 WILL NOT WORK
due to changes in Twitter's API. You MUST follow the instructions in Installation in order to make ThinkTwit work with this new version - please
read these before upgrading/installing!

= 1.3.11 =
- (30 Mar 2013) Modified "Live (uncached)" mode to clear out the cache so that it can be used to refresh your cache and fixed display of 
hashtags that was causing a search error in Twitter (if you are caching tweets please set to uncached to clear out the incorrect tweets and 
then you can start caching again)

= 1.3.10 =
- (14 Oct 2012) Altered the way ThinkTwit downloads avatars so that it now uses the profile image URL from the JSON output, added a check to 
ensure that tweets were actually returned from Twitter and made a change to prevent output of Follow script if Show follow links is no

= 1.3.9 =
- (13 Sep 2012) HOTFIX: Twitter have deprecated output of XML on the Twitter Search 1.0 API which itself has been deprecated which has caused
strange output resulting in italics everywhere - this update switches to JSON on the version 1.0 API to immediately fix the issue until
ThinkTwit can be re-written on the Twitter Search 1.1 API

= 1.3.8 =
- (09 Sep 2012) Minor update: added "Reset Settings" link to options and replaced settings roll up workaround with proper jQuery code

= 1.3.7 =
- (02 Sep 2012) Added the ability to filter tweets by hashtag/keyword (thanks to Martijn Pantlin for the code), improvements to data loading
when entries do not exist (rare, mostly during upgrades) and the option to show "Follow @username" links

= 1.3.6 =
- (14 Aug 2012) Removed code which was potentially incorrectly removing non-images (especially root index.php) when deleting old avatars

= 1.3.5 =
- (11 Jul 2012) Added code to delete old avatars (doesn't work if owner of avatars is different to running process), supress errors on chmod
and delete of directories and added code to remove all options on uninstallation

= 1.3.4 =
- (24 Jun 2012) Detects when Twitter displays a redirect URL when using the avatar API and downloads avatar from that URL instead, ignores
errors when trying to get the file size of an avatar or when getting tweets and checks if the avatar that is supposed to be displayed exists

= 1.3.3 =
- (02 Jun 2012) get_twitter_avatar() replaced with Twitter avatar API, added ability to cache user avatars and changed wording of TIME_1_DAY
from "about a day ago" to "yesterday"

= 1.3.2 =
- (12 Feb 2012) Added ThinkTwit versioning for making future upgrades more smooth, removed extraneous parameter when calling sort_tweets
and added settings that stores current ThinkTwit version and a list of all the cache names used

= 1.3.1 =
- (10 Nov 2011) Minor fix to resolve "file_get_contents" bug introduced in 1.3.0

= 1.3.0 =
- (25 Oct 2011) MAJOR UPDATES:
* Re-organisation of FAQ and installation instructions
* Author renamed to username in various places for consistency
* Some db names renamed for consistency
* Use of apostrophes changed for consistency
* Renamed PHP function call (thinktwit_output) to output_anywhere and altered it to use args instead of listing each parameter
* Moved shortcode and Output Anywhere functions in to ThinkTwit class
* Added more default value constants
* Introduced default stylesheet
* Fixed time output error when using no-caching
* Added no-caching to shortcodes and Output Anywhere

= 1.2.2 =
- (14 Oct 2011) Fixed incorrect PHP function call example in FAQ, fixed incorrect "Show Username" type in FAQ, fixed incorrect
boolean values in FAQ, removed silly copyright statement in comments, added link to FAQ within Plugins description to aid use 
of shortcode, fixed (intermittent) bad check of boolean for displaying avatars and function call and added limit to the maximum 
days of tweets to be output (NOTE: if upgrading and already using PHP function call please add the max_days parameter after limit 
- parameter 5)

= 1.2.1 =
- (07 Aug 2011) Added donation links and expandable menus within the widget settings

= 1.2.0 =
- (05 Aug 2011) MAJOR UPDATES:
* Massive update to the readme, including updated screenshots
* Re-write of code to make better use of object orientation and private/public functions
* More flexibility in shortcodes and output anywhere function (thinktwit_output) - including ability to use caching
* Introduced ability to alter time output text e.g. "This happened 16 minutes ago"
* Added class to style error message when using AJAX
* General readability improvements to code

= 1.1.10 =
- (05 Jun 2011) Added ability to apply your own filters and added nofollow tags to links

= 1.1.9 =
- (29 May 2011) Added ability to target individual tweets, odd and even tweets, content and author suffix and linked the avatar to the 
user's profile

= 1.1.8 =
- (28 May 2011) Added ability to include the Twitter poster's avatar

= 1.1.7 =
- (14 May 2011) Fixed cache not saving with the widgetid (meaning all instances will share the same cache), allows cache size to grow 
and shrink according to the size limit in the widget settings, only outputs cached tweets by users whose name is in the usernames list
within settings and sorted methods in to alphabetical order to aid searching of methods

= 1.1.6 =
- (13 May 2011) Fixed caching to prevent over-writing of cache and ensure it instead adds them to it (removing anything at the end if 
necessary) and added live option that uses the cache (so you can check for updates and update the cache before displaying cached tweets, 
this ensures that if Twitter is not available it will still display tweets)

= 1.1.5 =
- (22 Apr 2011) Added caching of tweets (optional) and added tweet shortcodes

= 1.1.4 =
- (09 Mar 2010) Removed some extranous code, added option to show username or Twitter name and changed list to ordered list for semantics

= 1.1.3 =
- (03 Mar 2010) Minor change where a variable was being over-written but it had no real affect and updated screenshot-2.png

= 1.1.2 =
- (03 Mar 2010) Added no-caching (to prevent ThinkTwit from being cached by caching engines), an option to use CURL to access
the Twitter API, optional debug messages, updated readme and moved development to http://www.thepicketts.org

= 1.1.1 =
- (16 Feb 2010) Removed unnecessary PHP command that was causing annoying error in widget screen (though not causing a problem) and
updated readme with new FAQ and uninstall instructions

= 1.1.0 =
- (11 Feb 2010) MAJOR UPDATES:
* Rewritten 80% of the code to correctly use widget API
* No longer need to spexify suffixes and prefixes - correctly hardcoded to use unordered lists
* Added classes for more flexible CSS changes
* Original settings page removed - all settings now made in widget NOTE: TAKE NOTE OF YOUR SETTINGS BEFORE UPDATING!
* Updated default CSS for basic use - please replace original with this and update as necessary
* No break spaces ("&nbsp;") no longer required to replace spaces in settings
* FAQ removed as there was only one question that is no longer relevant
* Updated screenshots to reflect new settings configuration

= 1.0.6 =
- (09 Feb 2010) Added temporary "no tweets in the last 7 days" notice (if no tweets are visible) until caching is implemented

= 1.0.5 =
- (09 Feb 2010) Fixed title not being saved in Settings, also added option to open links in new window and added FAQ to the readme

= 1.0.4 =
- (04 Feb 2010) Added option to change the widget title and replaced spaces with no-break spaces (&nbsp;) in default username suffix

= 1.0.3 =
- (03 Feb 2010) Removed some spaces at top of file that may be causing issues for some people

= 1.0.2 =
- (03 Feb 2010) Removed automatic deletion of database fields on deactivation and updated readme

= 1.0.1 =
- (27 Jan 2010) Fixed incorrect output of ampersands and apostrophes

= 1.0.0 =
- (21 Jan 2010) Initial Release

== Upgrade Notice ==

= 1.7.0 =
- Security update: removed risk of potential cross site script security issues should bad actors who have admin access wish to hide threats in 
your sites - highly recommend upgrading!

= 1.6.5 =
- Fixed an incompatibility with Wordpress 4.4

= 1.6.0 =
- Multiple bug fixes! Your cache will automatically be cleared on upgrade due to a database change.

= 1.4.0 =
- URGENT: Everyone MUST download this new version or ThinkTwit will cease to work COMPLETELY and FOREVER. Twitter have deprecated the v1.0 of 
their API and this upgrade fixes it. You MUST also follow the Installation instructions to get the update to work! - please read these before 
upgrading!

= 1.3.9 =
- HOTFIX: Everyone MUST download this hotfix or else ThinkTwit will gradually stop working (starting with italics all over the page) - Twitter 
have deprecated the API used in ALL previous versions of ThinkTwit. After upgrading it is recommended to switch "Update frequency" to "Live 
(Uncached)" and to reload your site before switching it back

= 1.3.6 =
- Important fix to bug potentially deleting index.php in root - highly recommend upgrading!

= 1.3.3 =
- Now supports caching of avatars!

= 1.3.0 =
- Multiple fixes - NOTE: Please follow uninstallation instructions and install fresh, update shortcodes and Output Anywhere (PHP function call)!

= 1.2.2 =
- Multiple fixes - NOTE: please add max_days value in shortcodes and PHP function calls, and set setting within widget settings

= 1.2.0 =
- Most flexible version to date with correct visibility of functions to prevent overlap with other plugins - many other updates included

= 1.1.0 =
- Correctly uses Widget API to allow multiple instantiations - many other updates included