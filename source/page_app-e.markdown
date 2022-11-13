# Appendix E: Troubleshooting PivotX

If your PivotX install isn't working properly, it can be difficult to fix, because
you might not know where to start looking. This chapter will help you determine
what might be the problem, and perhaps fix it. And if not, at least you'll have
a better understanding of what's going on, so you know where and how to ask for
help.  


## Determining if your server meets PivotX's requirements.

PivotX has modest server requirements, but there are a few requirements that have
to be met, in order to be able to run PivotX without headaches (or, it might not
run at all).   
The requirements are:  


*   PHP 5.2.0 (or higher) for PivotX 2.2.x or higher. Older versions of PivotX 
    requires PHP 4.3.0 or higher.
*   MySQL 4.1 or higher for database support (if you don't have this, you can use
    Flat Files)
*   The GD2 module for thumbnail support
*   The PCRE module
*   Ideally, safe_mode should be disabled
*   Ideally, open_basedir should be disabled 

The easiest way to find out if PivotX will work on your server, is to download
[pivotx-check.zip][1] which contains two small files. Unzip the file, and upload
the two extracted files to your webserver. Open up a browser after uploading, and
go to the `pivotx_check.php` script on your site. Dependant on what the hostname
is, and where you put the file, it might be something like
`http://www.example.org/pivotx_check.php`

  
If you have the correct URL, you'll see a screen like this:  

<a href="/images/img-app-e-1.png" class="fancybox"><img src="/images/img-app-e-1.png" width="400"
  alt="Screenshot" /></a> 

  
The script will check for the requirements of PivotX, and will tell you if PivotX
will run on your server or not. In some cases it might give a warning about
something that might not necesarily break PivotX, but might give you trouble
along the way. 

If no problems are listed, you should be able to run PivotX without any problems.
If it tells you PivotX can't run, because of some requirement that's not met, you'll
have to get it resolved, before you'll be able to run PivotX. Unfortunately, we're
not mindreaders, so we can't tell you how to act in your specific case. The items
this script checks are all server-related, so your best bet will be to ask your
webhoster. You should email them or open a support ticket. You could write
something like this:

> Dear webhoster,   
>   
> I'd like to run PivotX on my website, but there is a problem with setting it
> up. I've installed a small script on my website, that details the problem. You'll
> find it here: [put the URL of the `pivotx_check.php` script here]
>
> What goes wrong is:   
>   
> [copy-paste the error here, for your webhoster's convenience]  
>   
> Could you please help me fix these problems?  
>   
> Best regards, [your name here]  
> 

If your server does not support PHP at all, you'll see a screen like this:

<a href="/images/img-app-e-2.png" class="fancybox"><img src="/images/img-app-e-2.png" width="400"
  alt="Screenshot" /></a> 

In this case, we can't help you any further, other than suggesting you email your
webhoster, asking if they can change your current hosting plan to some other plan
that does have PHP support.

If you get a screen with a '`404 not found`' or '`403 forbidden`', you have either
made a typo in the URL, or you've placed the script in the wrong location. No two
webservers are the same, so if you do not know where to place the files so that
they're accessible on the web, please consult your webhoster.



## Dealing with Safemode


PHP has a feature called safe_mode. This 'feature' tries to deal with imminent
security breaches by crippling or simply disabling parts of PHP. Any server that
runs in safe_mode will have some problems running Pivot. It might work, it might not.. There is no way of knowing if it works on your server until you try it. If you do not know if your server is in safe_mode you can look it up in the output of your phpinfo. 

Here's what the php manual has to say about safe_mode: 

> *The PHP safe mode is an attempt to solve the shared-server security problem.
> It is architecturally incorrect to try to solve this problem at the PHP level,
> but since the alternatives at the web server and OS levels aren't very realistic,
> many people, especially ISP's, use safe mode for now.  
>   
> **This feature has been DEPRECATED as of PHP 5.3.0. Relying on this feature is
> highly discouraged.  
>   
> **- [www.php.net/features.safe-mode][6] *

Personally we detest safe_mode. Because hosting providers cripple some features
of PHP, they force us, as developers, to pull all kinds of tricks to make PivotX
work, making it potentionally *less* safe to use. 

If your server is running in safe_mode here are some tips to help PivotX to live
in peace with your server: 

1.  First of all: Email your hosting provider and ask them if they can turn off
  safe_mode for your virtual host or subdomain.. Or, lets rephrase that: Ask them
  if they want to turn it off, because they surely can, but often do not want to do so.

2.  Secondly: Consider using [PivotX Setup][2].

Some instances of `safe_mode` do not allow the creation of folders on your webserver,
or, even more silly: PivotX is not allowed to save files in folders that it was
allowed to create moments before. This will give problems after you have written
100 entries. To help this, you should make some folders in the `pivot/db/` folder
yourself: `db/standard-00100/`, `db/standard-00200/` etc., and chmod them to `755`
or `777`. This way PivotX will most likely be able to write the entries to these
new folders.

With these tips most servers can run PivotX to some degree. Many sites, with some
tweaks will be able to run PivotX flawlessly, however, if you have the choice
between a host with or without `safe_mode` turned on, always go with the host
without it. Good luck tweaking! 

## If nothing works, and you can't get into the backend

If something goes really wrong, and you just get errors, or even a 'white screen'
with no information at all, there might be a problem with an extension, but you
can't even log in to fix it. For this reason we've added the PivotX safemode
fallback. To activate this mode, place an empty file called `pivotxsafemode.txt`
in your `pivotx/` folder, and PivotX will just load the core files, allowing you
to get into the Administration area, and fix the problem. 

## Asking for help on the PivotX forum

If you encounter a problem, and you can't figure it out, you should ask for help
on the forum at [forum.pivotx.net][7] . We're a really friendly bunch, and will
gladly help you getting your problems fixed. But, in order for us to help you,
you need to provide us with as much relevant information as possible.   


1.  Describe your problem as clearly and detailed as possible. If you say
    "Uploading doesn't work", we'll have no clue as to what's happening. If you say
    "Uploading from Manage Media is broken. What I did is the following: I went to
    Manage Media, and clicked the 'upload' button. After that I selected a file
    from my computer, but instead of uploading, I got a '401 forbidden' error."  
    You'll agree with us that the latter specifies the problem much better, and helps us understand what's going on.

2.  Provide as much information about your environment as possible. What version
    of PivotX are you using? (You'll find that in the lower left corner of the
    login screen.) What type of database is your PivotX using - MySQL or flat files?
    What browser are you using? Visit [browsercheck.nl][8] if you aren't sure.
    Always provide this info, please. In addition, it might help to know how more
    about your web server and it's PHP support - see [Your Friend PHPinfo][9] below.  
    
3.  Provide screenshots of the error or broken functionality. Screenshots can
    give us a lot of relevant information. You can easily attach a screenshot to
    your post on the forum. (If you don't know how to make screenshots, see these
    instructions for [Windows PCs][10] or for [Apple Macs][11])
    
4.  Turn on PivotX debugging - visit the "`Configuration`" screen and select the
    "`Debug`" tab. Check the box next to "`Debug mode`". This will give you a link
    "`View debug logs`" in the footer of your admin pages. Paste any debug info in your post.  
    If you are logged in to your dashboard switching on debugging will also give you the
    debug bar at the right top of your web site page; click on it and see what info it gives you.
    

If you do these four things, we'll help you get up and running as soon as possible!

  
<p class="note" markdown="1">**Tip:** To rule out browser issues, try it from another computer as well, if you
have one around. You should at least try it with another browser. Your computer
came with either Internet Explorer or Safari, and [installing Firefox][12] is
pretty easy, so there's no real excuse for not trying another browser.</p>

<p class="note" markdown="1">**Tip:** If you have a firewall, cookie-eating virusscanner or some other
'internet security' program running, try disabling it (temporarily), to see if
that helps.  </p>


## Your Friend PHPinfo

Phpinfo is a little tool to inspect your PHP install. It tells you what version
is running, whether or not the ghastly `safe_mode` or the horrendous
`open_basedir-restriction` is in effect. 

Download [pivotx-check.zip][1], unzip the file, and upload the file named
`phpinfo.php` to your webserver. Open up a browser after uploading, and go to the
`phpinfo.php` script on your site. If your server does not run php, it will look
like this: 

    <?php   
    echo "version is: <b>".phpversion()."</b><br>\n";   
    echo "Lots of info: <br>\n";  
    phpinfo();   
    ?>

If, however, you get a screen like this, you have a working PHP install: 

<a href="/images/img-app-e-3.png" class="fancybox"><img src="/images/img-app-e-3.png" width="400"
  alt="Screenshot" /></a> 

Amongst other things it will tell you the version of your PHP install, the type
of server it is on, and whether or not it is running in safe_mode.

(TODO: The addition of an explanation of various phpinfo settings that affect
PivotX would be a valuable addition to this page)

 [1]: http://pivotx.net/files/misc/pivotx-check.zip "http://pivotx.net/files/misc/pivotx-check.zip"
 [2]: http://forum.pivotx.net/viewtopic.php?f=2&amp;t=27 "PivotX Setup"
 [6]: http://www.php.net/features.safe-mode "http://www.php.net/features.safe-mode"
 [7]: http://forum.pivotx.net "forum.pivotx.net"
 [8]: http://browsercheck.nl/ "browsercheck.nl"
 [9]: #Your_Friend_PHPinfo "Your Friend PHPinfo"
 [10]: http://www.iopus.com/guides/screenshot.htm "Windows PCs"
 [11]: http://www.ninisworld.com/thecorner/tutorials/osxscreenshots.html "Apple Macs"
 [12]: http://getfirefox.com "installing Firefox"
