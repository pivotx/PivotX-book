<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>[[ if $title!=""]] [[$title]] - [[/if]] The PivotX Book</title>
        <link rel="stylesheet" href="/templates/reset.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="/templates/book.css" type="text/css" media="screen" />
        <script type="text/javascript" src="/script/jquery-1.4.4.min.js"></script>
        <script type="text/javascript" src="/script/SearchHighlight.js"></script>
        <script type="text/javascript" src="/script/book.js"></script>
        <script src="http://www.pivotx.net/mint/?js" type="text/javascript"></script>
        <script type="text/javascript" src="/script/fancybox/jquery.fancybox-1.3.1.js"></script>
        <link rel="stylesheet" type="text/css" href="/script/fancybox/jquery.fancybox-1.3.1.css" media="screen" />
        
    </head>
    <body>
    <a name="top" id="top"></a>
    
    <div id="wrapper">
    
        <div class="pivotx-nav">
        
            <ul>
            <li><a href="http://pivotx.net">pivotX</a></li>
            <li><a href="http://blog.pivotx.net">Blog</a></li>
            <li><a href="http://forum.pivotx.net">Support Forum</a></li>
            <li><a href="http://themes.pivotx.net">Themes</a></li>
            <li><a href="http://extensions.pivotx.net">Extensions</a></li>
            <li class="active"><a href="http://book.pivotx.net" class="active">Documentation</a></li>
            </ul>
        
<div id="searchbar">
    <form method="get" action="/search.php">
        <input type="hidden" name="action" value="SEARCH" />
        <input type="hidden" name="limit" value="10" />
        <input type="text" id="searchkeyword" class="text" onblur="if (value == '') {value='Search the PivotX book'}" onfocus=" if (value == 'Search the PivotX book') {value=''}" value="[[$keyword]]" name="keyword" />
        <button type="submit" id="searchbutton" value="go"><span>Go</span></button>
    </form>
</div>

    
        </div>
        
        <div id="header">
            <div class="bookicon"></div>
            <a href="/"><img src="/templates/images/pivotx_logo.gif" alt="" /></a>
        </div>

        <div class="breadcrumbs">
            <span><a href="/">Home</a></span>
            [[ if $title!=""]]<span>&laquo;</span><span><a href="[[$self]]">[[$title]]</a></span>[[/if]]
        </div>
        
        <div id="sidebar">
            
            [[ if $sidebar!="" ]]
          <div class="block">
              <div class="blocktitle">
                <h3>Table of Contents</h3>
                </div>
                <div class="blockcontent">
                [[ $sidebar ]]
                </div>
            </div>
            [[/if]]

          <div class="block">
              <div class="blocktitle">
                <h3>Need help?</h3>
                </div>
                <div class="blockcontent">
                    <p>PivotX has a small, but very active community. If you need help with your PivotX website, please visit <a href="http://forum.pivotx.net/">the forums.</a></p>
                </div>
            </div>
            
        </div>
        
        <div id="content">

            <div class="navigation">
                [[ if $prev ]]
                &laquo; [[$prev]] |
                [[/if]]
                [[ if $prev || $next ]]
                <a href="/">Home</a>
                [[/if]]
                [[ if $next ]]
                | [[$next]] &raquo;
                [[/if]]

            </div>


        [[ $contents ]]

            <div class="navigation" style="margin-top: 24px;">
                [[ if $prev ]]
                &laquo; [[$prev]] |
                [[/if]]
                [[ if $prev || $next ]]
                <a href="/">Home</a>
                [[/if]]
                [[ if $next ]]
                | [[$next]] &raquo;
                [[/if]]

            </div>

        </div>
        
        <div class="spacer"></div>
        
        <div id="footer" class="pivotx-nav">
        
            <ul>
            <li><a href="http://pivotx.net">pivotX</a></li>
            <li><a href="http://pivotx.net/?w=weblog">Blog</a></li>
            <li><a href="http://forum.pivotx.net">Support Forum</a></li>
            <li><a href="http://themes.pivotx.net">Themes</a></li>
            <li><a href="http://extensions.pivotx.net">Extensions</a></li>
            <li class="active"><a href="http://book.pivotx.net" class="active">Documentation</a></li>
            </ul>
        </div>
        
        </div>


<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-5740467-6");
pageTracker._trackPageview();
} catch(err) {}</script>

    
</body>
</html>
