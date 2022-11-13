# 4.1. Upgrading from Pivot 1.x

> Since PivotX is an entirely different beast than Pivot 1.x, upgrading from Pivot 
1.x will take a while to do properly. If you have minor knowledge of HTML and know 
how to use FTP, you should be fine though. If you get stuck, don't hesitate to ask 
questions on the [forum][1]. 

Besides following these instructions, you can also just set up a new PivotX install, to 
get the hang of things, and when it's configured to your liking, you can convert your 
old entries. 

> **Note:** It **IS** very important to read this entire chapter before getting started. 
You don't want to mess up your PivotX install, do you?

The conversion is divided into 5 steps. 

1.  Preparation
2.  Installing PivotX
3.  Converting your old Pivot entries and settings.
4.  Cleaning up
5.  Setting up the templates


## Step 1. Preparation

### Backing up

Make a backup of your entire web site. That way, if you make a mistake, or something goes 
wrong, you'll always have a copy of your entries, images and whatnot. It's probably 
easiest to make the backup using your FTP program. Make sure you grab at least the 
`pivot/`, `images/` and `extensions/` folders. (Other folders and files, like the
`archives/` folder and any static entries, can be rebuilt.)

### Checking your database

Optionally, check if your database is OK. You can do this be enabling
debugging and then rebuilding the index. If all entries are reported as OK,
everything is fine. Luckily, corrupted entries can most often be repaired
without any loss of data. To do this, download our [db repair tools][2]. The
zip file contains a readme.txt file, with all the details. 

### Renaming

1. Rename your Pivot folder to `pivot.old` just to make it 110% clear what is the old installation. 
2. Rename your Pivot media folder to `images.old` (if you used the default folder name `images`). 

## Step 2. Installing PivotX

Install PivotX, according to the [the (brief) instructions][3], but do not login, or set 
up the admin user just yet! Just copy the files, and set the file permissions for now.

### Some things to do/check before starting the setup:

1.  If you want to use your existing Pivot templates in PivotX (instead of starting from scratch), you must copy the contents of pivot.old/templates. PivotX supports themes, so you should make a new folder like `pivotx/templates/oldsite/`, and copy all the files into there. 
2.  If you want to keep your existing users, categories and general settings (from Pivot), copy `pivot.old/pv_cfg_settings.php` to `pivotx/pv_cfg_settings.php`. 
3.  If you want to keep your existing weblogs, copy `pivot.old/pv_cfg_weblogs.php` to `pivotx/pv_cfg_weblogs.php`.

Now you are ready to launch PivotX - visit `yourdomain.net/pivotx/` and follow the instructions to set up the first user. 

## Step 3. Converting your entries

You should now see one or two default entries and two pages. You'll need to
convert/import your old Pivot entries. Use the [import script][4] (with
`pivot.old/db` as the database dir). Put the import script in the pivotx
directory, open the script in your browser and follow the instructions.

Since PivotX uses UTF-8 as the one and only character set, you can
ask the import script to convert your entries to UTF-8 (if your entries 
aren't already stored in UTF-8). This is known to work for most (all?)
Western European character sets. 

By now you can visit your new site by clicking on the sitename right under the
PivotX logo, in the top left corner of the PivotX administration interface.
Maybe it looks a bit broken, but we're going to fix that in the next section. 

You can now delete `pivotx/pv_cfg_settings.php` and
`pivotx/pv_cfg_weblogs.php` if you chose to copy them earlier.

### For flat file database only: Rebuild indexes

If you have a flat file database you need to rebuild the entry, search and tag indexes.

To do this select the Administration > Maintenance > Rebuild options (there are several).

To rebuild your Latest comments you'll have to use the PivotX Tools extension option 
Rebuild (available on [extensions.pivotx.net][7]).

## Step 4. Cleaning up

You can now delete the `pivot.old` folder and the Pivot extension folder
(named `extensions`). In addition, you should deleted any static archives
(normally saved to the `archives/` folder) and entries created by Pivot.

You'll also probably want to preserve your old images from Pivot. This is
easiest done by removing the empty `images` folder created when installing
PivotX, and renaming `images.old` back to `images`. 

You **did** remember to make that backup, didn't you? ;-) 

## Step 5. Setting up Templates.

Now you're going to have to decide whether you're going to tweak and adapt
your old templates to use them with PivotX, or if you're going to use the
default Theme, or download a new Theme for PivotX (there will soon be themes
to choose from on [themes.pivotx.net][5]). 

Whatever you choose, start by selecting the right templates in 
Administration > Weblogs > Your weblog > Templates. Here you can select the 
templates you'd like to use for the various types of pages.

Now you'll have to check all the templates, seeing if there are things that might require fixing. 

> Note: If you're used to clicking the 'rebuild frontpage' button every time
you change a template, you can let go of that habit now. PivotX renders all
pages on the fly, so there's no need to rebuild anything. 

One thing you'll most likely bump into, is that the `[[weblog]]`-tag works
quite different now. Because we use a real template engine now, there's no
need to use hackish includes. In Pivot 1.x the subweblog tag looked something
like this: `[[subweblog:standard]]` 

Now, it might look like this:

    <!-- begin of weblog "standard" -->  
    [[ subweblog name="standard" ]]  
    [[ literal ]]  
      
    <!-- entry "[[title]]" -->  
    <div class="entry">  
    <h2> <a href="[[entrylink]]">[[title]]</a> </h2>  
      
    <p class="date">   
    [[ date format="%dayname% %day% %monthname% %year% at %hour12%:%minute% %ampm%" ]]   
    [[ editlink format="Edit" prefix=" - " ]] </p>   
      
    [[introduction]]  
    [[more]]  
      
    <p class="entryfooter">   
    <span class="meta"> [[user field=emailtonick ]] |  
    [[ singlepermalink text="&para;" title="Permanent link to entry "%title%"" ]] |  
    [[ category link=true ]] | </span>  
    <span class="comments"> [[commentlink]] </span>  
    [[tags prefix="<span class="tags">" postfix="</tags>" ]] </p>  
      
    </div>  
      
    [[ /literal ]]  
    [[ /subweblog ]]  
    <!-- end of weblog "standard" -->  
    

The `[[subweblog]]`-tag used to have only one parameter: the subweblog's name. In
the Pivot Interface you'd have to assign that to a sub-template to use for the
weblog. 

PivotX on the other hand, will just use whatever's between the `[[subweblog]]` and
`[[/subweblog]]` tags to render your weblog. Don't remove the `[[literal]]`-tags,
since they prevent PivotX from parsing the contents too early. 

More details on the `[[subweblog]]` tag can be found on the [page listing all the
tags][6]. Don't forget to show off your newly converted site on the forum, after
you're done! :-)

 [1]: http://forum.pivotx.net
 [2]: http://pivotx.net/files/misc/db-repair.zip "db repair tools"
 [3]: http://pivotx.net/#installation "the (brief) instructions"
 [4]: http://pivotx.net/files/misc/import_pivot.php.zip "import script"
 [5]: http://themes.pivotx.net
 [6]: /page/app-b/ "page listing all the tags"
 [7]: http://extensions.pivotx.net
