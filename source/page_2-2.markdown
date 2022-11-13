# 2.2 Learning by example: Picking apart the 'Bare Bones' templates

In order to understand what the various different tags in the template do, the easiest 
thing is to start by dissecting one of the standard themes: Bare Bones
  
We'll explain only what the separate tags do in relevance to PivotX. If you wish to learn 
more about the coding language Smarty, please refer to the [Smarty Manual][1].
  
## Bare Bones:  \_sub\_header.html

### Title 

The title can be as simple as :
  
    <title> Name of my website </title>  
    
But it can also be:
  
    <title>  
     [[ if $pagetype=="entry" || $pagetype=="page" ]][[title]] - [[sitename]]  
     [[ else ]][[sitename]][[/if]]  
    </title>  

This If-statement outputs either '**Title of this entry - Websitename**' or, on
a page: '**Title of this page - Websitename**', or, on your homepage, simply '**Websitename**'.

Google in particular likes it when the title of your page also reflects its 
content. Thus, your entries will be easier to find when searched for on Google.  


  
### Links to stylesheets

    <link href="[[ template_dir base="true" ]]pivotx_essentials.css" rel="stylesheet" type="text/css" media="screen" />

This links to the Pivotx-essentials stylesheet. For the standard elements such as 
searchboxes and comments you need to include this link. 

It directs to the main 'Templates' folder, which is this file's default location.  

    <link href="[[template_dir]]bare_bones.css" rel="stylesheet" type="text/css" media="screen" />

This links to the stylesheet in your theme-folder ( in this case, the 'bare bones' 
folder) within the Templates folder. If you put your stylesheet in a seperate 
'styles' folder, the path could be: `[[ template_dir ]]styles/stylesheet.css`. 

### Link to home

    <a href="[[home]]">

This automatically creates a link to your site's homepage.  
  
### Inserting the weblog titles

    <h1>[[weblogtitle]]</a></h1>  
    <p class="weblogsubtitle">[[weblogsubtitle]]</p>

This automatically inserts your weblog's title and subtitle in the header. These titles can be 
changed in `Pivotx` > `administration` > `weblogs` > edit weblog.  


## Bare Bones frontpage\_template.html

### The file-include

    [[ include file="bare_bones/_sub_header.html" ]]

This includes the `_sub_header.html` file in the frontpage template. For pieces of code that are used 
often in multiple places or pages (for example the header, the footer, the menu, the sidebar), you can 
use this code to include a separate file for these. It is also possible to use nested includes, i.e. 
an include in an include.

In the Bare Bones Front-page template you'll also find includes for the footer and sidebar.  


  


### Showing a weblog on the page

    <!-- begin of weblog 'standard' -->  
     [[ subweblog name="standard" ]][[ literal ]]  
      
      (Lots of Smarty- and HTMLcode in between)  
      
     [[ /literal ]][[ /subweblog ]]  
     <!-- end of weblog 'standard' -->  
    

This inserts a weblog into the page, so this is most likely to be one of the most important tags in 
your template. Basically, what these tags do is get the weblog-entries specified in the subweblog tag.

[Read more about the `[[subweblog]]` tag][2] and all the arguments it can hold  in the 
template-tags appendix.   


  
### Displaying the Page numbers

    [[ paging action="digg" ]]  
    

This tag inserts page-numbers (paging) when your weblog contains more entries than the number of entries 
specified to be displayed per page in the subweblog tag. 

[Read more about  the `[[paging]]` tag][3] and the arguments it can hold, in the template-tags appendix.


## Bare Bones \_sub\_sidebar.html

### A Pagelist

    [[ pagelist
     chapterbegin="<h3>%chaptername%</h3><small>%description%</small><ul>"  
     pages="<li %active%><a href='%link%' title='%subtitle%'>%title%</a></li>"  
     chapterend="</ul>"  
     isactive="id='active'"  
    ]]   
      
    

A pagelist is used to display a list of certain pages. In this case there is no chapter specified, 
but you can indeed specify what specific chapter the pagelist should be made of. This particular 
pagelist will show a list of all known pages from each chapter, with the chapter name above each 
sub-list.   


[Read more about the `[[pagelist]]` tag][4] and the arguments it can hold, in the template-tags appendix.

A more detailed version of the pagelist is the [`[[getpagelist]]` tag][5]; It is much more 
customizable than the `[[pagelist]]` tag.

  
  


### The Latest comments

    <h3>[[t]]Latest Comments[[/t]]</h3>  
     [[latest_comments  
       format="<a href='%url%' title='%date%'><b>%name%</b></a>: %comm%<br />"  
       length=100  
       trim=16  
       count=8  
     ]]  
    

You can use this tag to display the latest comments that visitors have left on your weblog.   


The `[[t]]` and `[[/t]]` tags indicate that this is a standard header that PivotX will translate to the 
language specified in your weblog settings.  Of course, you can always type your own custom header inside 
the <h3\>-tags which then wouldn't need translation.

You can indicate how many comments will be shown by this tag and much more extra features.

[Read more about the `[[latest_comments]]` tag][6] and the arguments it can hold in the template-tags 
appendix.  


  
### Standard feed and PivotX buttons 

    [[pivotxbutton]]
    [[rssbutton]]
    [[atombutton]
    

The  `[[rssbutton]]` and `[[atombutton]]` tags display the standard rss- and atomfeed 
buttons from Pivot; they are automatically linked to the feeds' URLs.   


The `[[pivotxbutton]]` tag includes a small PivotX credit button on your site; it automatically 
links to the PivotX website. If you choose to delete this button, please put a credit-link to 
PivotX somewhere else as a small gesture to the developers of this free Open Source CMS.  


  
### The weblog archive

      
    [[archive_list  
      unit="month"  
      order="asc"  
      format="<li><a href='%url%'>%st_monname% %st_year%</a></li>"  
    ]]  
      
    

The `[[archive_list]]` tag displays a list of older entries from your weblog. In this example a 
list of months is generated that the user can click to see that month's entries.   


[Read more about the `[[archive_list]]` tag][7] and all the arguments it can hold in the 
template-tags appendix.  


  
### The category list 

    <ul>  
      [[category_list format="<li><a href='%url%'>%display%</a></li>"]]  
    </ul>
    

Displays a list of all weblog categories known to your PivotX installation. 

[Read more about the `[[category_list]]` tag][8] and all its options in the template-tags appendix.

  
### The linklist

    [[link_list]]
    

This tag inserts all contents of the page '**Links**'; you will find this default page in the PivotX 
back-end, under 'Pages' > 'Links'. You can alter the introduction and body text of this page to 
display your favorite links on your website.  


### The searchfield

    [[search button="Search!" placeholder="Enter Searchterms" ]]  
    

`[[search]]` inserts a small search field and a button so visitors can search your website for 
specific words or terms.   


You can customize the look of your search field and the button with css and/or by adding 
configurations to the tag.

[Read more about the `[[search]]` tag][9] and all its options in the template-tags appendix.



## Bare Bones \_sub\_footer.html

In the footer you'd usually put the meta content that you need on every page, i.e. 
links to a disclaimer page or your colophon page. Or your Google Analytics code.
The Bare Bones footer template is extremely basic and should present no difficulties 
for anyone with basic html skills.



## Bare Bones entrypage_template.html

The entrypage template is used to display separate entries with their comments. Note the 
difference between entries and pages. Pages are static pieces of information, entries 
are short timely articles on your website. 


### The header inclusion

	[[ include file="bare_bones/_sub_header.html" ]]

As explained earlier; this tag inserts the header at the top of the template, because after all, 
we need a header on this page too!


### The Entry title

	<h2>
    	<a href="[[ link hrefonly=1 ]]">[[title]]</a>
	</h2>
	

This entrypage is already dedicated to just one single entry. So we can call the separate 
fields of the entry with simple commands. [[ title ]] will display the title, [[subtitle]] 
will display the subtitle and so forth.

The [[ link hrefonly=1 ]] wil generate a link to this entry. It might be a bit useless 
on this entrypage, though.


### The Entry Subtitle
	
	<h3>[[subtitle]]</h3>
	
Displays the subtitle.

### The date of the entry

	 [[ date format="%dayname% %day% %monthname% %year% at %hour12%&#58;%minute% %ampm%." ]]

This tag will display the date of the entry in a preset format. 

[Read more about the date formatting options][10] in the dateformatting appendix
	
### Tags

	[[ tags ]]

This (smarty)tag will output all words that this entry is tagged with. Each tag wil be linked, 
so the visitor can easily find more entries that have the same tag.

### Editlink

	[[ editlink format="Edit" prefix=" - " ]]

This tag displays a link to edit this entry directly in PivotX. It will only be shown when the visitor 
is logged in to PivotX at the same time. 

### Introduction and Body tags

	[[ introduction ]]
	[[ body ]]
	
These two tags display the exact contents of the introduction and body fields of the entry. Note that there 
is no `<p>` tag around these. The lay-out tags like paragraphs, lists etc will be implemented by the wysiwyg 
editor in PivotX. So no need to worry about those in the template.

### Comment count

	<p class="comments">[[ commcount ]]</p>
	
This tag displays the amount of comments of the entry.

[Read more about the `[[commcount]]` tag][11]	

### Comments

	[[ comments ]]
	    <div class="comment">
	    	%anchor%
        	<img class="gravatar" src="%gravatar%" alt="%name%" />
        	<div class="comment-text">
        		%comment%
        		<cite><strong>%name%</strong> %email% %url% - %date% %editlink%</cite>
        	</div>
        </div>
	[[ /comments ]]
            
            
To display the comments on this entry, use the comments opening and closing tags. There are many 
options that you can use inside the comments-tag. 

Also, this a loop, which means that everything between [[comments]] and [[/comments]] will be 
repeated for every single comment. 

[Read more about the `[[comments]]` tag][12] and its options.	


### The message and commentform 

	[[message]]
	[[commentform]]
    
The message-tag displays any system message that the visitor needs while filling out the comment form. 
For instance, 'please enter a name' or 'your comment was posted succesfully'.

The commentform-tag displays the comment form. When not otherwise indicated in the tag, this tag fetches 
the _sub_commentform.html in the root of the template folder.

[Read more about the `[[commentform]]` tag][13] and its options.

## Bare Bones 


 [1]: http://www.smarty.net/docs.php "Smarty Manual"
 [2]: /page/app-b#anchor-subweblog--weblog "Read more about the subweblog tag"
 [3]: /page/app-b#anchor-paging "Read more about  the paging tag"
 [4]: /page/app-b#anchor-pagelist "Read more about the pagelist tag"
 [5]: /page/app-b#anchor-getpagelist "[[getpagelist]] tag"
 [6]: /page/app-b#anchor-latest_comments "Read more about the [[ latest_comments ]] tag"
 [7]: /page/app-b#anchor-archive_list "Read more about the [[ archive_list ]] tag"
 [8]: /page/app-b#anchor-category_list "Read more about the [[ category_list ]] tag"
 [9]: /page/app-b#anchor-search "Read more about the [[ search ]] tag"
 [10]: /page/app-d "Read more about the date formatting options"
 [11]: /page/app-b#anchor-commcount "Read more about the commcount tag"
 [12]: /page/app-b#anchor-comments "Read more about the comment tag"
 [13]: /page/app-b#anchor-commentform "Read more about the commentform tag"
