# Appendix G: Database Problems

<p class="note" markdown="1">
This chapter is currently only covering problems related to
the **flatfile database** backend.
</p>

If one entry is suddenly gone or appears empty when you try to edit it, or rebuilding 
the index tells you that "entry 00YXX is NOT ok", most likely some of the files in the 
`pivotx/db/standard-00Y00` folder are corrupt.

Usually these can be fixed by the database repair utilities, and if they can not be
repaired, at least these utilities will be able to get all the information
that is left, and make the broken entries accessible again.

To start download the [database repair utilities][1]. Then:

   1.  Make a backup of your `pivotx/db` folder. Nothing is going to break, but
having a current backup is always a good thing..
   2.  Unzip the file and upload the five files to your `pivotx` folder
   3.  Open `pivotx/repair_db1.php` in your browser, and refresh the page until
it gets to the 'Done' part.
   4.  Do the same with `pivotx/repair_db2.php`, `pivotx/repair_db3.php` and
`pivotx/repair_db4.php`.
   5.  Open `pivotx/repair_db_cleanup.php` in your browser. This will add a .bak
extension to the files that couldn't be read.
   6.  Remove the repair scripts from your `pivotx` folder.

**Note:** If one of the script gets to 'Done' but it did not list all entries as
'OK', you do need to run the next script as well.

Do NOT remove the .bak files. We might be able to repair at least part of these 
files with a later version of the database repair utilities.

 [1]: http://pivotx.net/files/misc/db-repair.zip
