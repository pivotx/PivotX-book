# 2.5 Keeping each weblog in separate directories

Let us consider an example PivotX site located at example.org. It's a news
site, that uses multiple weblogs for their news entries - "Sports",
"Entertainment", "Economy" and so on. Out of the box, PivotX will produce the
following URLs for entries in these weblogs:  

    example.org/index.php?e=X&w=sports  
    example.org/index.php?e=Y&w=entertainment  
    example.org/index.php?e=Z&w=economy

These look OK, but the following are better:

    example.org/sports/?e=X  
    example.org/entertainment/?e=Y  
    example.org/economy/?e=Z

If you agree, then follow these steps:

1.  In each weblog, set the weblog URL. ("/sports/", "/entertainment/" and "/economy/" 
for the weblogs in this example.)
2.  Create the needed directories. ("/yourwebroot/sports", "/yourwebroot/entertainment/" 
and "/yourwebroot/economy" for this example assuming PivotX is installed in "/yourwebroot/pivotx".)
3.  In each directory create a file index.php, that contains:

        <?php
        define("PIVOTX_WEBLOG","weblog_id");
        define("COMPENSATE_PATH", "../pivotx/");
        require_once("../pivotx/render.php");
        ?>

(The weblog ids in the example are of course "sports", "entertainment" and "economy".)


## For mod_rewrite users

If you use mod_rewrite/clean URLs, you need to go one step further:

1.  Copy "example.htaccess" to each weblog directory (and rename it to ".htaccess"). 
You might also have to uncomment the "RewriteBase"-line and modify it appropriately. 
(Replace "/" with "/sports/" in the ".htaccess" file in the "/yourwebroot/sports" 
directory and so on.)

The standard URLs are better when you use mod_rewrite, but you might also benefit 
from this setup. Assuming you have selected the "entry/1234" rewrite pattern, you 
normally get  

    example.org/entry/X/sports  
    example.org/entry/Y/entertainment  
    example.org/entry/Z/economy

Isn't the following better?

    example.org/sports/entry/X  
    example.org/entertainment/entry/Y  
    example.org/economy/entry/Z

