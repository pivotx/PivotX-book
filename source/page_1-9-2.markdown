# 1.9.2 Changing the settings of a theme/weblog  
A single PivotX installation can contain multiple weblogs. Each weblog is individually configurable.


<a href="/images/1-9-2-a.png" class="fancybox"><img src="/images/1-9-2-a.png" width="400"
  alt="Screenshot" /></a> 

*PivotX weblogs overview*  


  
## Installing themes  
You can install themes by uploading a theme folder to Pivotx/Templates with your favorite FTP tool and chmod the folder and the included files to 777.

  
Now login to PivotX and go to Administration/Weblogs. Click the Edit button of the weblog you want to edit.  
  
<a href="/images/1-9-2-b.png" class="fancybox"><img src="/images/1-9-2-b.png" width="400"
  alt="Screenshot" /></a>

  
The weblog configuration page is divided in 5 sections:  
  
1.  General settings 
2.  Templates 
3.  Subweblogs 
4.  XML Feeds 
5.  Commenting 

  
### 1. General settings 

**Weblogname**

The name of your weblog like "Peter's beerblog" 

**Payoff (optional)**

Give your weblog a catchy payoff like "The latest news about beer" 

**URL to weblog(optional):** PivotX will determine the url of your weblog if you leave this field blank. If you use your weblog as part of a frameset, or as a serverside include, you can use this to override it (needs more explanation/example)



  
**Language (optional)**

Set your weblog's language. The chosen Language determines in which language the dates and numbers will be output. 

If you choose to leave this blank, PivotX uses the language set in the configuration (Administration/Configuration). 

**"Read More" Text**

If you create an entry and add text in the "bodytext" field of the entry editor, PivotX will automatically show a "read more" link on your weblog. In this field you can change the text. If you leave this field blank, PivotX will use the default text (more). 

  
### 2. Templates 

You can assign different templates to the various pages of your weblog. 

  
**Frontpage Template**

The template which determines the layout of the index page of your website. (See [this page][3] about choosing a frontpage) [(Example)][4]

  
**Archivepage Template**

The template which determines the layout of your archives. This can be the same as "Frontpage Template". [(Example)][5]

  
**Entrypage Template**

The template which determines the layout of single entries. [(Example)][6]

  
**Extra Template**

The Template that defines how a search, tag or other special page will look like. [(Example)][7]

  
**Page Template**

The Template that defines how a page will look like if you haven't specified a template for it. [(Example)][8]

  
### 3. Subweblogs 

Each weblog can show multiple streams of information. I.e. show a standard weblog and a linkdump on one page. This stream is called a subweblog and contains a list of entries of a certain (or multiple) category. In the subweblog window you can define the categories and the number of entries that will show on your weblog. 

The number of subweblogs shown in this window are defined in the template you chose for the frontpage in the "templates" window (1.9.1.2 Templates). 

The name of a subweblog is defined in the subweblog code in the template: 

  
[[ subweblog name="Name of this subweblog" ]] 

  
**Number of entries**

The Number of entries in this subweblog that will be shown on the frontpage. 

**Offset (optional)**


If Offset is set to a number, that amount of entries will be skipped when generating the page. You can use this to make a "Previous entries" section. (Needs link to info about this)



**Categories**




Define the categories you want to show in each subweblog. You can select multiple categories by holding your ctrl key en select the categories with your mouse.  


### 4. XML Feeds
PivotX has built-in xml output functionality. You can enable RSS and Atom feeds by checking the "Generate Feeds" checkbox. PivotX now automatically creates feeds for entries and comments (both Atom and RSS).

  
If you enable this, PivotX will add auto discover links to the HTML code. Most browsers can read this and add a feed icon in your browsers' address bar.  
  
**Enable Feeds**  
When checking this, PivotX will automatically create feeds (both RSS and Atom) for entries and comments.

**RSS url**

Leave this blank to use PivotX's standard RSS feed, or specify a full URL. If you use a service like FeedBurner, you can give the link to your FeedBurner feed here. The link will be used in the RSS badge and in the autodiscovery link on this weblog.

**Atom url**

Leave this blank to use PivotX's standard Atom feed, or specify a full URL. If you use a service like FeedBurner, you can give the link to your FeedBurner feed here. The link will be used in the Atom badge and in the autodiscovery link on this weblog.

**Create Full Feeds**

Determines whether PivotX creates full Atom and RSS feeds. If set to "no" PivotX will create feeds that just contains short descriptions, thereby making your feeds less useful.  


**Feed link**

The link to send with the feed, to point to the main page. If you leave this blank, PivotX will send the weblog's frontpage as link.  

**Feed image**

You can specify an image to send with the feed. Some feed readers will display this image along with your feed. Leave this blank, or specify a full URL.  


### 5. Commenting
If you enable commenting on your PivotX site (Administration/Configuration > Allow comments by default checkbox), you can configure your comments settings her.

  
  
**Send mail**  

Check this if you want to receive an email eacht time a comment is placed on your website.  

**Email address**

Define the email address PivotX send mail to when a comment is added on your website. 

**Text to links**

Define whether typed urls and email addresses will be made clickable. 

**Wrap comments after**

To prevent long strings of characters from breaking your layout, text will be wrapped after the specified number of characters. 

**Allow Textile?**

If this is set to "Yes", visitors are allowed to use [Textile][9] in their comments. PivotX will automatically add a nice editor to your commentform. Textile is on by default. 

**Allow Emoticons?**

If this is set to "Yes", visitors are allowed to use emoticons, which are displayed as graphics. PivotX will add a popuplink with available emoticons to your commentform. 

Example: If you type :-) with Emoticons enabled. Those characters will be shown as ![][10]

 [1]: http://docs.google.com/File?id=dgf95wcb_353f4j8cgg9_b
 [2]: http://docs.google.com/File?id=dgf95wcb_352cgn8dn3k_b
 [3]: /page/1-4-3 "this page"
 [4]: http://pivotx.net/?w=weblog "(Example)"
 [5]: http://pivotx.net/archive/2009-m03 "(Example)"
 [6]: http://pivotx.net/archive/2009/05/26/we-are-done-what-should-we-do-next "(Example)"
 [7]: http://pivotx.net/tag/rc "(Example)"
 [8]: http://pivotx.net/page/documentation "(Example)"
 [9]: http://www.textism.com/tools/textile "visit the Textile website"
 [10]: http://docs.google.com/File?id=dgf95wcb_354hsr7wpcj_b
