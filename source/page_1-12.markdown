# 1.12 Moblogging

PivotX supports posting entries with your cell phone (or by e-mail in general).
First, you set up a new e-mail address just for moblogging. -The choice of mail
provider is up to you. Then you edit the Moblogging options in the PivotX
configuration; as a minimum you must set the mail server and username and password (for the newly
created e-mail address). You are now ready to post entries with your
cell phone - PivotX's scheduler will automatically check the mail server for new
messages every 10 minutes (as long as any of your pages are visited).

<p markdown="1" class="note">Note: You can run the scheduler manually by visiting
`example.org/pivotx/scheduler.php` in your browser. You can modify the scheduler
frequency inside the file `scheduler.php`.</p>

Creating a new e-mail address may sound difficult, but for example you could use Gmail:
After creating a new Gmail account, just remember to set the mail server to "pop.gmail.com"
and the "Use the IMAP extension" option to "POP3S" in the Gmail settings.

Handling the e-mail
-------------------

This is how PivotX converts an e-mail message to an entry:

1.  The e-mail subject becomes the entry title.
2.  The entry user/author and category is taken from the PivotX configuration.
3.  The e-mail text is assigned to the entry introduction after all unwanted
content is skipped (as defined by modules/moblog/known_providers.php).
4.  Any image attachments are saved and image links are added to the entry introduction.

The entry body is empty.

To better control the resulting entry, you can use keywords in the e-mail text.
The format is "keyword: some text" on a single line. The following keywords are understood:

*   **title:** - overrides the e-mail subject (in case it's useless).
*   **subtitle:** - set the entry subtitle (which is empty by default).
*   **user:** - override the user/author from the PivotX configuration.
*   **publish:** - set to zero to post entries on hold.
*   **category:** - override the category from the PivotX configuration (cat: is also accepted).
*   **introduction:** - explicitly set the introduction.
*   **body:** - explicitly set the body (only use this together with the introduction keyword).

Advanced/hidden configuration
-----------------------------

Some moblogging options aren't available through the standard configuration
screen but you can set them in the advanced configuration. The options are:

*   **moblog_replyaddress** - Use the "From" or "Return-Path" header to set the
reply address which is used when PivotX checks if the e-mail is sent from an
allowed sender. Default: "" - PivotX tries to detect which is the most likely
correct reply address. Use "from" or "return-path" to force PivotX.
*   **moblog\_pop\_port** - If you aren't using the IMAP extension, you can use
this option to override the default ports.
*   **moblog\_imap\_mailbox** - Many online mail services (like Gmail), don't use
a name for the default (IMAP) INBOX. However, use this option if your mail server requires you to
provide one.
*   **moblog\_spam\_category** - Name of category to which posts that are considered
spam, i.e., not from an allowed sender, are assigned to. Default: "spam". It might
make sense to create a category named "spam".
*   **moblog_title** - This is used as the title for posts if PivotX wasn't able
to find anything in the e-mail subject or from a "title: …" line in the e-mail.
Default: "Moblog on <date\>".
*   **moblog_status** - Publish the moblog posts or put them on hold. Default:
"publish". Use "hold" for putting on hold [sic].
*   **moblog\_allow\_comments** - The default: "1" allows comments for the new post.
Use "0" to disallow.
*   **moblog\_save\_mail** - Save the received e-mails in the folder db/mail (mainly for debugging
purposes). Default: "0". Use "1" to save e-mails.
*   **moblog\_leave\_on_server** - Try to leave the e-mail on the mail server (mainly for archiving purposes). Default: "0". Use "1" to leave e-mails on mail server.
*   **moblog\_send\_confirmation** - Send confirmation of successful moblog post,
to the PivotX admin e-mail. Default: "1". Use "0" to not send notifications.
*   **moblog_maxwidth** - If an attached image is wider than this value (in pixels),
create a thumbnail. Default: "400".
*   **moblog_maxheight** - If an attached image is taller than this value (in pixels),
create a thumbnail. Default: "200".
*   **moblog\_skip\_thumbnail** - Make a link instead of creating a thumbnail (if the
attached image is too large). Default: "0". Use "1" to create a link instead of a thumbnail.
*   **moblog\_click\_for_image** - The text used for the (popup) link when a
thumbnail is skipped. Default: "Click for image"
*   **moblog_quality** - The image quality for created thumbnails. Default:
"60" (percent).

What to do if it doesn't work
-----------------------------

In case it doesn't work, there are a few things to check:

*   Check if PivotX itself is running properly and that Moblogging is
in fact activated in the PivotX configuration.
*   Check if at least one entry is in Allowed senders otherwise every mail will be considered spam.
*   Enable PivotX debugging and check the debug window after running the scheduler.
*   Make sure that **moblog\_save\_mail** is set to one ("1") in the advanced config. If
this is the case, any incoming mail should be saved as a file to the db/mail folder.
*   Try sending e-mail with a regular e-mail program instead of your phone or PDA.
*   Check in the PivotX overview, to see if the entries get posted, but perhaps
as 'spam' (and hence on hold).
*   Take a look at the list above to see if your phone is supported.
*   If it still doesn't work and you want help, please, post to the PivotX Support
Forum. Be as specific as possible in your problem report. Saying "it doesn't work
with my phone" isn't helpful to the person trying to help you.
Instead, ensure your post contains the following details:
*   the brand and type of device used;
*   what you were *trying* to send and approximately how big it was (in Kb);
*   describe what's going on and whether or not any of the tips above this one have helped you;
*   provide a link to your phpinfo.php file (see [here][1]); and
*   provide a link to the corresponding file from `/db/mail/` *(preferably
zipped or compressed in some other way)*.
*   If you your post simply says, "It doesn't work with my phone..", don't
expect any help at all.

Supported Phones
----------------

Moblogging works best with any modern phones that allows
sending email over the internet. You can either send mail directly to the address
you've created, or use a tool like [Shozu][2] or [Pixelpipe][3] to handle sending the mail.

 [1]: /page/app-e#phpinfo "your_friend_phpinfo"
 [2]: http://shozu.com "Shozu"
 [3]: http://pixelpipe.com
