# 4.2. Importing from Wordpress 

Importing your Wordpress database into PivotX is pretty simple and straightforward. The import script will convert all your Entries, Pages, Users, Categories, Comments and Tags. 

The import process is divided into 3 steps. 

1.  Backing up Wordpress, making sure the Database is a-OK.
2.  Installing PivotX
3.  Converting your old entries and settings.

## Step 1. Backing up

Make a backup of your Wordpress install. It's always good to have a backup copy, before you're going to mess around with the Database. Make a backup of both the files (using FTP) and the Database (with a tool like PHPMyAdmin) 

## Step 2. Installing PivotX

Install PivotX, according to the (brief) instructions here: <http://pivotx.net/#installation>. Complete the setup, and verify that you have a working copy of PivotX. 

> **Tip:** If you don't have multiple databases, you can set up PivotX to use the same DB as Wordpress. It won't break your current Wordpress setup. 
## Step 3. Converting your entries

Get the conversion script from the following location: [pivotx.net/files/misc/import_wordpress.php.zip][1]

Extract the .zip file, upload it to your pivotx/ folder and open pivotx/import_wordpress.php in your browser. Follow the on-screen instructions to convert all your entries to MySQL. 

After you're done, all the Entries, Pages, Comments, Tags, Categories and Users from your Wordpress blog will be imported into PivotX. You can now delete your old Wordpress, and the wp_* tables from the Database. You **did** remember to make that backup, didn't you? 

Don't forget to show off your newly converted site on the forum, after you're done! :-)

 [1]: http://pivotx.net/files/misc/import_wordpress.php.zip
