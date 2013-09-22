

--- Fusion Wordpress template ---

Theme URI: http://digitalnature.ro/projects/fusion/
Author: M. Popovici - http://digitalnature.ro/


Things you should know:
-----------------------
 - you can report any bugs or suggest improvements on the project page;
 - theme was tested on Wordpress 2.7 with Opera 9.6, FF 3, IE 6/7/8b, Chrome, Safari 3;
 - javascript quote function (comments.js) by mg12 - www.neoease.com
 - licensed under GPL, see http://www.opensource.org/licenses/gpl-license.php


Translations:
-------------
 - Croatian, v2.1 (hr_HR) by phobos, http://phobos.byethost22.com
 - German, v2.1 (de_DE) by Michael Liebwein, <michael.liebwein@googlemail.com>
 - French, v2.0 (fr_FR) by Olivier Despont, www.semageek.com
 - Danish, v2.0 (da_DK) by Hans Cz. Jørgensen <hans.c.jorgensen@gmail.com>
 - Spanish, v2.1 (es_ES) by Miguel <boletin@almendron.com>
 - Romanian, v2.2 (ro_RO) by me :)

If you wish to contribute by translating the theme please write me a email to hello@digitalnature.ro
Thanks to all contributors!



Change log:
-----------
 - 22-feb-2009: v2.2  - added Author profile page
                      - updated Spanish translation
                      - added French translation, thanks Olivier!
                      - added German translation, thanks Michael!
                      - added Croatian translation, thanks Phobos!
                      - removed "comments are closed" message on pages that have comments closed and no comments written before that.
                      - small css/image optimizations
                      - for the sake of compatibility, now loading js with wp_enqueue_script (revert to the Wordpress bundled jquery - 1.2.6)

 - 15-feb-2009: v2.1  - added support for threaded comments (instead of reply button); make sure you have threaded comments enabled in WP-Admin
                      - added optional 2nd sidebar and page templates: "page without sidebar", "3-column page", "archives" and "links" templates (to apply, see "template" attribute when editing a page)
                      - added Danish translation, thanks Hans!
                      - added post count to the default sidebar Archives block
                      - added theme option for user CSS code
                      - changed spacing unit from px to em, where possible
                      - added visitor ability to change font size (layout control)
                      - moved possible plugin content above the submit button (on the comment pages)
                      - removed 'rss subscribe' link for comments (there already is one in the footer)
                      - fixed a small bug in the tab navigation (was not extending on fluid width)
                      - some javascript improvements

 - 12-feb-2009: v2.0  - added theme option to allow sidebar position change
                      - complete localization support
                      - added Spanish translation, thanks Miguel!
                      - updated Romanian translation
                      - changed widget look and fixed spacing (removed .box style since was causing problems with some widgets)
                      - stylesheets load now with @import (so the theme degrades to simple text in older browsers like NS4, IE4...)
                      - added IE 6 fix for transparent 24bit PNGs

 - 31-jan-2009: v1.83 - support for WP-PageNavi plugin
                      - removed whitespace:no-wrap for PRE tag
                      - updated jQuery to latest version (1.3.1)

 - 29-jan 2009: v1.82 - theme language support (testing)
                      - added translation: Romanian

 - 27-jan 2009: v1.81 - replaced "tags" text with a tag graphic icon
                      - added quote/reply buttons (instead of RE/Q text), only visible when mouse over a comment & when comments are open
                      - changed comment submit input with button link (nicer, but won't work on browsers with js disabled)

 - 25-jan 2009: v1.8  - added theme options; see: WP-Admin > Appearance > Fusion options
                      - added some jQuery fx to various elements
                      - various fixes and improvements to comment pages (thanks Miguel)

 - 23-jan-2009: v1.71 - fixed bug in comments (sidebar misplaced or not showing up if comments are closed and there are 1 or more comments posted), thanks again Miguel :)

 - 23-jan-2009: v1.7  - added trackbacks; moved both comments and trackbacks into tabs, visible only if comments>0
                      - added sub-menus for tabs (if nested pages exist)
                      - added rss links for categories in the sidebar
                      - changed the search box design a little
                      - styled pagination
                      - changes to Archives page
                      - replaced some of the hardcoded messages for automatic translation
                      - added subtle border to avatars
                      - fixed some small bugs in functions.php, thanks Miguel :)

 - 17-jan-2009: v1.6  - fixed image captions in posts
                      - more margin/padding adjustments
                      - small changes to the sidebar lists

 - 14-jan-2009: v1.5  - added comment time and date (sorry I missed that)
                      - made admin comment look different than the rest
                      - made homepage tab appear only if there are posts
                      - fixed a small ie6 bug in comments

 - 10-jan-2009: v1.4  - fixed "Headers already sent..." php error; thanks Brian :)
                      - removed border and spacing from smiley images
                      - made tabs show inside the header if they don't fit horizontally (instead of hide them in the sidebar or extend below the header)

 -  6-jan-2009: v1.3  - added IE 6 support (also degrades decently in IE 5.5); thanks Marc for the "IETester" link :)
                      - fixed Archives (tags were at the top of the post)
                      - some margin/padding adjustments
                      - added "posted by [author]"

 -  4-jan-2009: v1.2  - changes to the sidebar/widget design; categories and search are now visible when widgets are used
                      - fixed small bug in sidebar categories (corectly aligned lists if text is long)
                      - added page width control (allow user to switch from fixed to fluid layout)
                      - added border+padding for images inside .post
                      - moved "tags" at the bottom of the post
                      - switched colors for "no/comments"
                      - changed reply/quote icons to text
                      - fixed some IE7 bugs in comments

 - 30-dec-2008: v1.1  - replaced logo image with heading text
                      - added custom styles for usual HTML elements, tables, lists, forms...
                      - fixed Gravatars
                      - some changes to "Archives" page layout
                      - small CSS fixes to the comments section

 - 22-dec-2008: Initial release - 1.0


