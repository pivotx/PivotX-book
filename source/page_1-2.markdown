# 1.2. Getting the Files & Installing 

Installing PivotX is pretty simple. The process basically consists of 
getting the zip file, extracting the files, uploading the files to the 
server and setting the file rights / permissions.  

If you have command-line access on the server, and are comfortable using 
it, the setup is even easier. If so, skip to [Using the command line][1]. 
You can also get the files [directly from SVN][2].  

<p class="note" markdown="1">**Tip:** Upgrading PivotX is identical to 
installing PivotX except that you can usually skip the file rights step. </p>

## Getting the files 

The first step of the install process is downloading the PivotX files 
from pivotx.net. You can get the latest stable version of PivotX from 
the following location: [http://pivotx.net/files/pivotx_latest.zip][3].

After downloading the file, extract it. Usually you can do this by simply 
double-clicking on the .zip file. If this doesn't work, use a tool like the free [7-zip][4] to extract the file. 

## Getting translations

If you want to use PivotX in your language, download the (compiled)
translation from the [translation download][0] page and then upload
the file to the `pivotx/langs` folder (after having uploaded the other
files to your hosting space).

The compiled translation files are named `xy.mo` where xy is the two
letter language code.

[More details about translations...][7]

## Uploading the files using FTP 

You can use any FTP-client to upload the files to your hosting space. If 
you don't have a FTP-client yet, you can use [Filezilla][5], which is 
free and very good. Some Mac users prefer [Cyberduck][6], which is also free.   

Usually, your host has provided a folder in which you can place the files 
that will be accessible from the internet with a webbrowser. This folder 
is often called 'html', 'www' or 'public_html'. If you're not sure you're 
in the right place for putting your PivotX files, check the credentials 
that your hosting provider gave you. It's usually mentioned together with 
your FTP username and password. 

In the FTP-client, log in with the hostname, username and password your 
hosting provider gave you, and upload all files from the unzipped file to 
the correct folder. Afterwards, it might look like this: 

<a href="/images/img1-2a.png" class="fancybox"><img src="/images/img1-2a.png" width="400" alt="Screenshot of uploaded files in an FTP client." /></a>

<p class="note" markdown="1">**Tip:** If you don't want your PivotX site 
as your main website, you can make a new folder on your hosting space, and 
put it there. </p>

## Using the command line 

If you have shell access to your webserver, setting up PivotX is even 
easier. Copy and paste the following commands to the command-line: 

    curl -O http://pivotx.net/files/pivotx_latest.tgz  
    tar -xvzf pivotx_latest.tgz   
    chmod -R a+w images/ pivotx/db/ pivotx/templates

If you can't use Curl, try this instead: 

    wget http://pivotx.net/files/pivotx_latest.tgz  
    tar -xvzf pivotx_latest.tgz   
    chmod -R a+w images/ pivotx/db/ pivotx/templates

And, that's it!  

## Checking out from SVN

If you'd like to get the absolute latest (and perhaps broken) version of 
PivotX, you can always do a checkout from our SVN. If you don't know how 
this works, this option probably isn't for you. ;-)

    svn co https://pivot-weblog.svn.sourceforge.net/svnroot/pivot-weblog/trunk trunk

## Setting the file rights  

Several folders need to be writable by PivotX, so they can be used to store 
files and images, and PivotX can save the settings and templates in them. This 
is sometimes called chmod'ing, where 'chmod' is short for 'change mode'. We're 
going to change the rights to '777' (which is the easiest way to ensure that 
everyone with access, including PivotX, can write to folders and files). 
Sometimes '777' is displayed as 'rwxrwxrwx'.

  
<p class="note" markdown="1">**Tip:** If your hosting provider tells you that 
chmodding to 777 is 'not safe', ask them what value you should use, so that 
both you and the user under which the webserver runs have full read- and write 
access to the files. Any half-decent hosting party has completely seperated 
spaces for each user, so there should be no risk involved with changing these 
folders to be writable. If your hosting provider has not done this, you should 
really start looking for a new one.  </p>

The following folders (and everything in them) should be chmod'ed to '777':

    images/  
    pivotx/templates/  
    pivotx/db/

Usually you won't have to set the file rights again after upgrading PivotX.

Most modern FTP clients allow you to apply the changed rights recursively. 
For example, in Cyberduck it looks like this:

<a href="/images/img1-2b.png" class="fancybox"><img src="/images/img1-2b.png" width="400" alt="Screenshot of file rights on OSX." /></a>


 [0]: http://pivotx.net/files/translations/ "http://pivotx.net/files/translations/"
 [1]: #commandline "Using the command line"
 [2]: #svn "directly from SVN"
 [3]: http://pivotx.net/files/pivotx_latest.zip "http://pivotx.net/files/pivotx_latest.zip"
 [4]: http://www.7-zip.org/ "7-zip"
 [5]: http://filezilla-project.org/ "Filezilla"
 [6]: http://cyberduck.ch/ "Cyberduck"
 [7]: /page/3-9 "More details about translations..."
