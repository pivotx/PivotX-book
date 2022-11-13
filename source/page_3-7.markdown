# 3.7. Accessing PivotX data

All data in PivotX should be accessed via the global variable $PIVOTX. That
variable contains pointers to all objects/class instances that you need. The
most important are:

    $PIVOTX['config']     -> a Config instance  
    $PIVOTX['db']         -> a db instance  
    $PIVOTX['pages']      -> a Pages instance  
    $PIVOTX['users']      -> a Users instance  
    $PIVOTX['weblogs']    -> a Weblogs instance  
    $PIVOTX['categories'] -> a Categories instance  
    $PIVOTX['multisite']  -> a MultiSite instance  
    $PIVOTX['session']    -> a Session instance

Each class defines methods to fetch, update and query the associated data:

*   Config - giving access to the general configuration of the PivotX installation  
    
*   db - giving access to all entries (with comments and trackbacks) in the PivotX installation.  
    
*   Pages - giving access to all pages in the PivotX installation.  
    
*   Users - giving access to all users in the PivotX installation.  
    
*   Weblogs - giving access to all weblogs in the PivotX installation and their data/configuration.  
    
*   Categories - giving access to all categories in the PivotX installation and their settings.  
    
*   Multisite - giving access to multi-site status for the PivotX installation.  
    
*   Session - handles logging in and out and giving access to all sessions in the PivotX installation.

In addition there is

    $PIVOTX['paths']

which is an array containing all paths - file system and URLs - used/needed by PivotX.

## Class documentation

Instead of maintaining a list of all methods (in each class) and their
signature, please read the always up-to-date class documentation:

*   Config - [PHPdoc][1] / [PHPXref][2].  
    
*   db - [PHPdoc][3] / [PHPXref][4].  
    
*   Pages - [PHPdoc][5] / [PHPXref][6].  
    
*   Users - [PHPdoc][7] / [PHPXref][8].  
    
*   Weblogs - [PHPdoc][9] / [PHPXref][10].  
    
*   Categories - [PHPdoc][11] / [PHPXref][12].  
    
*   Multisite - [PHPdoc][13] / [PHPXref][14].  
    
*   Session - [PHPdoc][15] / [PHPXref][16].

Access the complete generated documentation as [PHPdoc](http://pivotx.net/dev/docs)
or [PHPXref](http://pivotx.net/dev/docsxref) (for trunk and the current stable
branch).

 [1]: http://pivotx.net/dev/docs/2.3.x/pivotx/Config.html "PHPdoc"
 [2]: http://pivotx.net/dev/docsxref/2.3.x/pivotx/objects.php.html#config "PHPXref"
 [3]: http://pivotx.net/dev/docs/2.3.x/pivotx/db.html "PHPdoc"
 [4]: http://pivotx.net/dev/docsxref/2.3.x/pivotx/modules/module_db.php.html#db "PHPXref"
 [5]: http://pivotx.net/dev/docs/2.3.x/pivotx/Pages.html "PHPdoc"
 [6]: http://pivotx.net/dev/docsxref/2.3.x/pivotx/objects.php.html#pages "PHPXref"
 [7]: http://pivotx.net/dev/docs/2.3.x/pivotx/Users.html "PHPdoc"
 [8]: http://pivotx.net/dev/docsxref/2.3.x/pivotx/objects.php.html#users "PHPXref"
 [9]: http://pivotx.net/dev/docs/2.3.x/pivotx/Weblogs.html "PHPdoc"
 [10]: http://pivotx.net/dev/docsxref/2.3.x/pivotx/objects.php.html#weblogs "PHPXref"
 [11]: http://pivotx.net/dev/docs/2.3.x/pivotx/Categories.html "PHPdoc"
 [12]: http://pivotx.net/dev/docsxref/2.3.x/pivotx/objects.php.html#categories "PHPXref"
 [13]: http://pivotx.net/dev/docs/2.3.x/pivotx/Multisite.html "PHPdoc"
 [14]: http://pivotx.net/dev/docsxref/2.3.x/pivotx/modules/module_multisite.php.html#multisite "PHPXref"
 [15]: http://pivotx.net/dev/docs/2.3.x/pivotx/Session.html "PHPdoc"
 [16]: http://pivotx.net/dev/docsxref/2.3.x/pivotx/objects.php.html#session "PHPXref"
