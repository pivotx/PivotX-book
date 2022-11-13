# Appendix A: List of all Hidden Settings 

Most of PivotX's settings can be altered through the 'Configuration' screens, or through the weblogs, categories and user settings. Some options are so specific or obscure that it would not make much sense to include them. 

Below you'll find a list of the settings that you can set through the 'Advanced configuration' screen. If the key is not yet present, you can use this screen to create it.  


A list of hidden/advanced configuration options for moblogging can be found in [the moblogging chapter][1]. 

*   **allow\_html\_in\_comments** - When this is set to '1', visitors will be allowed to use all of the most common HTML tags in their comments. Scripts and 'event handler' attributes are still stripped. Nevertheless, you really shouldn't use this on any site that's publicly available on the internet. 

*   **allow\_html\_readable\_in\_comments** - When this is set to '1', the comment text will be scanned for html tags and make it readable. The b/em/i/strong tags will keep their original function.  
Side effect of this setting is that whenever a comment text contains "one < two" the part from the "<" character on wards will no longer disappear when publishing. 

*   **allow\_smarty\_in\_comments** - When this is set to '1', visitors will be allowed to use Smarty template tags in their comments, such as [[image]]. Using this option introduces great security risks, so **DO NOT** use this option on any site that's publicly available on the internet. Seriously, if you enable this option, and your site gets 0wned, don't expect anything other from us than a cold shoulder. 

*   **allow\_php\_in\_templates** - If set to '1', you will be albe to use [[php]] tags inside your templates. Do not use this, unless you're certain that no ill-willing people have access to the templates. 

*   **allow\_template\_override** - If set to '1', you can override the template, by passing it another filename on the URL, like this: example.org/?te=folder/frontpage\_template.html.

*   **allow\_edit\_for\_own\_userlevel** - By default only 'superadmin' is allowed to edit entries by users of the same level. If you set this to a certain userlevel (1 to 4), users of that level will not only be able to edit entries by users of lower levels, but also for entries by other users with the same userlevel.  
    
*   **always\_jquery** - When this is set to '1', PivotX will always include the jQuery and Thickbox headers in your pages. 

*   **always\_stripslashes** - PivotX detects if the webserver uses 'magic quotes', but on some server this test is unreliable. If the server incorrectly adds \'slashes\' to quoted text, you can set this option to '1', to force PivotX to always remove the extra slashes from your entries, pages and comments. 

*   **chmod** - Setting this, you can force PivotX to create files with a given mode. The default is "644".   
    
*   **chmod\_dir** - Setting this, you can force PivotX to create directories with a given mode. The default is "777" (as in the PHP mkdir function).  
    
*   **comment\_no\_formatting** - Normally comments are parsed, so that line-breaks are converted to <br /> tags. If you set this option to '1', the comments will be rendered without this parsing. This can be useful if you've changed the comment form into a WYSIWYG element. 

*   **comment\_truncate** - The maximum length of a comment, before it is truncates, as it is show n in the 'Moderate Comments' screen. Set to a low value like 110 to keep the overview compact, or to a large value like 1000, if you want to view the entire comment from the overview screen.   
    
*   **debug\_bottom** - Show the Debugbar at the the bottom right, if `debug` is enabled in the configuration. 

*   **debug\_cachestats** - Output the statistics from our SimpleCache object to the debug log. Reduces performance somewhat, if enabled. 

*   **default\_category** - Determines the default category for new Entries. Set to (none) to force it to no category. If you would simply empty or erase the setting, PivotX will choose a new default entry. 

*   **default\_post\_status** - Set this to 'hold', 'timed' or 'publish' to determine the default post status, when writing a new Entry or Page. 

*   **disable\_strikethrough\_in\_textile** - If set to '1', textile will not transform -this- into this.   
    
*   **dont\_add\_canonical** - If set to '1', PivotX will not add a canonical link to the <head> section of the pages.  
    
*   **dont\_check\_filerights** - If set to '1', PivotX will no longer check if all files in `images/` and `pivotx/db/` have the correct filerights. 
    
*   **dont\_recreate\_default\_entries** - If set to '0', PivotX will recreate the default/initial entries. 

*   **dont\_recreate\_default\_pages** - If set to '0', PivotX will recreate the default/initial pages. 

*   **dont\_run\_scheduler** - If set to '1', PivotX will not run the scheduler as part of the generated pages. If you do this, make sure scheduler.php is run by a crontab, to keep the cache folder from filling up. 

*   **dont\_send\_mail\_notification** - If set to '1', PivotX will not send mail notifications for new comments to commenters/registered visitors (even if they have requested it).

*   **email\_morelink\_position** - Set this to 'top' if you want the more link in your mail to be specified first. Defaults to 'bottom'.

*   **email\_start\_text** - Set this to overrule the standard start text of a notify mail (.... posted the following entry).

*   **email\_subject\_prefix** - Set this to specify your own subject prefix used in the mail(s) sent to your users.

*   **encode\_email\_addresses** - If set to '1', PivotX will encode all email addresses automatically.

*   **eventlog\_length**- Set the number of items that is kept in the Events logfile. Defaults to 200.  
    
*   **favicon** - Override the default PivotX favicon with this link/URL. Set it to '0' to disable the addition of a favicon to the rendered HTML. 

*   **failed\_logins\_limit** - The amount of 'attempts' that can be made from a single IP-address to log in. If the number of attempts exceeds this it will not be possible to login from this account, until the IP address is dropped from the list. Defaults to '8' *(added in PivotX 2.1)*

*   **failed\_logins\_timeout** - The amount (in hours) after which an automatic IP-block is dropped. Defaults to '24', exactly one day. *(added in PivotX 2.1)*

*   **feededitor\_email** - Overrules the email address of the managingEditor in the feed (normally taken from last SuperAdmin).

*   **feededitor\_name** - Overrules the name of the managingEditor in the feed (normally taken from last SuperAdmin).

*   **feed\_posts\_only** - If set to '1', PivotX will not add autodiscovery for comment feeds to the header of the generated pages, but only for the feeds of the actual Entries.  
    
*   **force\_admin\_https** - If set to '1', the admin pages of PivotX will be redirected automatically to HTTPS if people try to use HTTP. (You must ensure that your server supports HTTPS before turning on this option.) 

*   **hide\_dashboard\_quicklinks** - If set to '1', PivotX will hide the set of shortcut links on the Dashboard. 

*   **hide\_dashboard\_welcome** - If set to '1', PivotX will hide the 'Hi, welcome to ..' paragraph on the Dashboard.

*   **hide\_forumposts** - If set to '1', PivotX will hide the 'The latest Forum posts' block on the Dashboard.

*   **hide\_subtitle** - Hide the 'subtitle' fields when Editing an Entry or Page *(added in PivotX 2.2)*

*   **ignore\_modrewrite\_check** - If mod\_rewrite is enabled, PivotX checks if your `.htaccess` (or apache config) is setup properly to access pages . If you set this setting to 1, PivotX will not do this check, so you should make sure that your webserver is correctly set up to serve pages with non-crufty URLs. 

*   **ignore\_register\_globals** - Set to 1 to hide the 'This webserver has register\_globals enabled'-warning. Note that doing this will not actually solve the issue, but PivotX will just stop nagging you about it. 

*   **ignore\_safe\_mode** - Set to 1 to hide the 'This webserver has safe\_mode enabled'-warning. Note that doing this will not actually solve the issue, but PivotX will just stop nagging you about it. 

*   **ignore\_setupscript** - Set to 1 to hide the 'The PivotX installer script "pivotx-setup.php" is still present in the parent folder'-warning. Note that doing this will not actually solve the issue, but PivotX will just stop nagging you about it.

*   **jquery\_filename** - PivotX uses jQuery extensively for a lot of things, and it's always updated when a newer stable version of jQuery is released. Set this variable if you wish to force PivotX to use another version. Make sure this file exists in the 'pivotx/includes/js' folder, or you might break your PivotX install. 

*   **jquery\_plugins\_filename** - Same as above but now for the plugins file name. Make sure this file exists in the 'pivotx/includes/js' folder, or you might break your PivotX install. 

*   **jquery\_ui\_filename** - Same as above but now for the ui file name. Make sure this file exists in the 'pivotx/includes/js' folder, or you might break your PivotX install. 

*   **localised\_archive\_prefix** - Use in combination with 'Use Mod rewrite'. By default archives will be prefixed by '/archive/', but you can use this to set your own prefix for the archive links. Make sure you update your `.htaccess` file accordingly. 

*   **localised\_browse\_prefix** - Use in combination with 'Use Mod rewrite'. When browsing through entries, these pages will be prefixed by '/browse/' by default, but you can use this to set your own prefix for the browse links. Make sure you update your `.htaccess` file accordingly. 

*   **localised\_category\_prefix** - Use in combination with 'Use Mod rewrite'. By default category pages will be prefixed by '/category/', but you can use this to set your own prefix for the category links. Make sure you update your `.htaccess` file accordingly. 

*   **localised\_entry\_prefix** - Use in combination with 'Use Mod rewrite'. By default entries will be prefixed by '/entry/', but you can use this to set your own prefix for the entry links. Make sure you update your `.htaccess` file accordingly. 

*   **localised\_page\_prefix** - Use in combination with 'Use Mod rewrite'. By default pages will be prefixed by '/page/', but you can use this to set your own prefix for the page links. Make sure you update your `.htaccess` file accordingly. 

*   **localised\_search\_prefix** - Use in combination with 'Use Mod rewrite'. By default search pages will be prefixed by '/search/', but you can use this to set your own prefix for the search links. Make sure you update your `.htaccess` file accordingly. 

*   **localised\_tag\_prefix** - Use in combination with 'Use Mod rewrite'. By default tag pages will be prefixed by '/tag/', but you can use this to set your own prefix for the tag links. Make sure you update your `.htaccess` file accordingly. 

*   **localised\_visitorpage\_prefix** - Use in combination with 'Use Mod rewrite'. By default the registered visitor page(s) will be prefixed by '/visitor/', but you can use this to set your own prefix. Make sure you update your `.htaccess` file accordingly. 

*   **localised\_weblog\_prefix** - Use in combination with 'Use Mod rewrite'. By default weblogs will be prefixed by '/weblog/', but you can use this to set your own prefix for the weblog links. Make sure you update your `.htaccess` file accordingly.

*   **log\_queries** - Output all SQL queries into the debug logs, together with the queries that take relatively long. Note: This is good for examining the SQL queries that are done, but is not good for performance, obviously. 

*   **loginlog\_length** - Set the number of items that is kept in the Login logfile. Defaults to 200.  
    
*   **max\_unique\_uri\_iterations** - PivotX checks for duplicate URI's in Entries and Pages, adding a number, and checking again. If set, this value determines the maximum amount of iterations, before PivotX gives up. The default is 20.  
    
*   **media\_paging\_threshold** - If you have more than 50 items in any given folder, PivotX's media browser will show pagination buttons. You can set the media\_paging\_threshold option to raise or lower that amount. 

*   **never\_jquery** - If set to '1', PivotX will never insert the jQuery includes in the header of the rendered pages. This setting trumps 'always\_jquery'. 

*   **notifier\_url** - Provide a full link (with `http://` prefix) to an RSS feed to override the default news source that is shown on the PivotX Dashboard. 

*   **para\_weblog\_always** - If set to '1', PivotX will always add the weblog parameter(`/weblogname` or `&w=weblogname`) to the URL, even if the site has only one weblog. 

*   **para\_weblog\_never** - If set to '1', PivotX will never the weblog parameter(`/weblogname` or `&w=weblogname`) to the URL, even if the site has more than one weblog.

*   **para\_weblog\_no\_pages** - If set to '1', the weblog parameter is not added to links to pages. This way pages are not considered to be part of any weblog in particular, if you have more than one weblog.

*   **preferred\_admin\_location** - If this is set, PivotX checks the current location. If the current location is different than the preferred\_admin\_location, the user is asked to redirect to the correct location. This is useful if you're running one version of PivotX on several domains that are aliased, or via symbolic links. *(added in PivotX 2.1)*

*   **set\_request\_variables** - If set to '1', PivotX will set `[[$get]]`, `[[$post]]`, `[[$request]]`, `[[$server]]` and `[[$session]]` in the templates, with the values of `$_GET`, `$_POST`, `$_REQUEST`, `$_SERVER` and `$_SESSION` respectively.

*   **show\_only\_own\_userlevel** - Shows only the entries and pages owned by him/herself to any user with this userlevel or lower. 

*   **show\_via\_fields** - If set to '1', PivotX will show the 'via link' and 'via title' fields for the entries. These are hidden by default.  
    
*   **sort\_categories\_by\_alphabet** - Set this to '1' to override the default category sorting from 'by order' to 'by alphabet'. 

*   **sort\_pages\_by\_alphabet** - Set this to '1' to override the default page sorting from 'by order' to 'by alphabet'.

 [1]: /page/1-12/ "The Moblogging chapter"
