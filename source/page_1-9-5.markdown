# 1.9.5. Working with feeds

PivotX automatically generates feeds for your weblog(s) if you enable it in
the "XML feeds" tab in the weblog configuration. This will also insert 
the necessary auto-discovery tags in the HTML header. In addition you can use
`[[rssbutton]]` and/or `[[atombutton]]` in your templates to insert explicit
links to your feeds.

If you want a custom feed, you need to read about feed URLs below.

## Feed URLs

All feed URLs are starting with selecting the feed type - "rss" or "atom":

    example.org/index.php?feed=type

Then you can select which category, weblog or author to display content from

    example.org/index.php?feed=type&c=catid
    example.org/index.php?feed=type&w=weblogid
    example.org/index.php?feed=type&u=authorid

Then you can select how many items to include - the default is 10:

    example.org/index.php?feed=type&n=15

Finally, the default content to display is entries, but if you want comments
you can add "&comm" to the end the feed URL.

    example.org/index.php?feed=type&comm
    example.org/index.php?feed=type&e=uid&comm

will display all the latest comments for the site or the comments for an
entry.

You can also combine the parameters for example to select entries by an author
and in a specific category...

PS! Don't forget to replace "&" with "&amp;amp;" in the URLs to get valid HTML.
And, if you have renamed your index.php to something else, you must update the
URLs above.
