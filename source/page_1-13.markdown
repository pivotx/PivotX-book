# 1.13 MetaWeblog API (XML/RPC)

PivotX has a MetaWeblog API, so it supports XMLRPC MetaWeblog. XMLRPC clients
include desktop blogging clients such as WBloggar, as well as online services
such as Flickr. Currently, it is only capable of creating, modifying and deleting
posts. Administrative and media functions must be performed from PivotX's
web-based administration panel. 
  
## Usage

In your XMLRPC client, enter the URL to `metaweblog.php` (i.e.
`example.org/pivotx/metaweblog.php`) as the 'endpoint'. If your client asks for
a 'Blog ID' (or 'Site ID'), enter a case-sensitive *blog name*; use `my_weblog`
if you are using the initial/default weblog. If your XMLRPC client supports
Really Simple Discovery (RSD), i.e. Flock, just use the the front page of
your blog as the 'endpoint'. (Clients that support RSD, normally just ask for a
blog's front page/URL.) 

## Tricks

Normally all the text you post with your client is ending up in the
introduction. If you want to split the text in two so the last part ends
up in the body, just insert the word 'PIVOTX_BODY' (on a single line if you
prefer) between the two parts.

If you want to tag the entry you post, just use normal tt template tags in
the text.

## Supported Clients

This list isn't exhaustive - please notify us of any other clients that you have used
successfully. 

*   Archipelago

*   [BloGTK][1]

*   [Ecto][2]

*   [MarsEdit][3]

*   [ScribeFire][4] (Formerly known as 'Performancing for Firefox'.)

*   [WBloggar][5]

*   [Windows Live Writer][6]

*   [Flickr][7]'s blogging feature

*   [Flock][8]'s blogging feature

*   [The Journal 5][9]

## Notes

*   Posts that are sent through MetaWeblog are directly published as raw HTML
  (no processing). Most clients send raw HTML anyway so this isn't usually a
  problem. If you find your posts showing up without their formatting, you should
  be able to change this by searching for the line `$conversion_method=0` and
  changing the '0' to '1' for line breaks, '2' for textile, '3' for Markdown and
  '4' for Markdown + Smartypants.

## Known Issues

*   Administrative 'superusers' can only edit their own posts. You have to use
  the web interface if you need to edit others' posts.

 [1]: http://blogtk.sourceforge.net/ "http://blogtk.sourceforge.net/"
 [2]: http://ecto.kung-foo.tv/ "http://ecto.kung-foo.tv/"
 [3]: http://ranchero.com/marsedit/ "http://ranchero.com/marsedit/"
 [4]: http://scribefire.com/ "http://scribefire.com/"
 [5]: http://wbloggar.com/ "http://wbloggar.com/"
 [6]: http://windowslivewriter.spaces.live.com/ "http://windowslivewriter.spaces.live.com/"
 [7]: http://flickr.com/ "http://flickr.com/"
 [8]: http://flock.com/ "http://flock.com/"
 [9]: http://www.davidrm.com/thejournal/ "http://www.davidrm.com/thejournal/"
