# 1.14 Using Apache's mod_rewrite

Apache's [mod_rewrite][1] module provides a rule-based rewriting engine to rewrite
requested URLs on the fly. This means that you will see nice (non-crufty) URLs like   

    example.org/archive/2006/02/17/title-of-an-entry

and Apache will rewrite (translate) it into the URL   

    example.org/index.php?e=123

which is in a format that PivotX knows how to parse. In other words, if `mod_rewrite`
is enabled, it allows for 

*   clean/non-crufty URLs which better describe the content of the link target  
    
*   dynamic archives by year, month and category

PivotX generates nice URLs if you turn on the 'Use mod rewrite' option in the
PivotX configuration screen. 

To use Apache mod_rewrite you need to: 

1.  rename the `example.htaccess` file to `.htaccess`. Note that the filename
    starts with a dot (on Windows this could be a problem - alternatively
    you can open the file in Notepad and save it with a new name);

2.  go to the configuration screen and turn on the 'Use mod rewrite' option in
    PivotX and choose an option that suits you;

3.  visit your PivotX website and confirm that the clean (non-crufty) URLs work.

If the clean URLs don't work it may be that your server doesn't support `mod_rewrite`.
You should check your phpinfo and search for `mod_rewrite` to see if it is enabled.

 [1]: http://httpd.apache.org/docs/2.2/mod/mod_rewrite.html "mod_rewrite"
