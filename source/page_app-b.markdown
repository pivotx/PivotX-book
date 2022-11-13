# Appendix B: All Template Tags 

## archive_list 

Inserts a list of links to the archive pages for a weblog. By default the current
weblog is used and month is the dividing time unit, i.e., links to the monthly 
archives of the current weblog is listed.

Example 1: 

    [[ archive_list unit='week' order='desc'  
       format='<a href="%url%">%st_day% %st_monname% - %en_day% %en_monname% %st_year% </a><br />' ]]

Example 2: 

    <ul>  
    [[ archive_list unit='month' order='asc'  
       format='<li><a href="%url%">%st_monname% %st_year%</a></li>' ]]  
    </ul>

You can also make a 'jumpmenu': A dropdown selector, with the archives in it. When 
the user selects one, the browser immediately goes to that page. If you use this, 
it's a good idea to also include a version of the list, for users who don't have 
javascript, and to keep the site easy to index by Search engines. The complete code 
could look like this: 

    <!-- Javascript enabled Jumpmenu for the archives -->  
    <select id="archivemenu" style='display:none;'>  
      
    [[ archive_list unit='month' order='desc'  
       format='<option value="%url%">%st_monname% %st_year%</option>'  
    ]]  
      
    </select>  
      
    <script type='text/javascript'>  
    jQuery(document).ready(function() {  
    jQuery("#archivemenu").show();  
    jQuery("#archivemenu").bind("change", function(){  
    document.location = jQuery("#archivemenu").val();  
    });  
    });  
    </script>  
      
    <!-- Accessible version, for users without Javascript -->  
    <noscript>  
    <ul>  
    [[ archive_list  
       unit='month'  
       order='desc'  
       format='<li><a href="%url%">%st_monname% %st_year%</a></li>'       
    ]]  
    </ul>   
    </noscript>  
    
The following attributes can be used in the `[[archive_list]]` tag: 

*   **format** - The lay-out of the archive.  
    Defaults to '`<a href=\"%url%\">%st_day% %st_monname% - %en_day%  
    %en_monname% %st_year% </a><br />`'.  
    Possible replacement strings are:  
    %url% - The URL specified with the archive.  
    several date strings - The date for this archive.  
    (uses PivotX Date Formatting as described in [Appendix d: Date formatting options][1])   
    %counter% - The sequence number of the archive.  
    %active% - Is replaced by the string specified in the isactive attribute whenever the current 
    archive is the same as the one you are looking at. 
*   **isactive** - Optional attribute to add to format for the
    current archive.
*   **weblog** - The weblog which the link list is created for.
    Optional attribute, the current weblog is used by default. 
*   **unit** - Dividing unit for the archives.  
    Possible values: week, month (default) and year. 
*   **separator** - You can use the 'separator' attribute to add a
    separator between the different archives.  
    E.g. `separator='<span class='sep'>|</span>'` .
*   **order** - The sequence of the archive list.  
    Specify 'descending' or 'desc' to get it sorted
    descending; otherwise it will be ascending.  
*   **start** - Starting moment of links to output.  
    Format YYYY-NN where NN is number of month when using unit='month', number of week when using 
    unit='week' and 00 when using unit='year'. Moment is inclusive.  
*   **end** - Ending moment of links to output. For format see **start**.  
    Note: starting and ending give seemingly other-way-around output when using order='desc'.  
*   **year** - Year to be selected. Format YYYY.  
*   **amount** - Amount of links to output.  

## atombutton 

Inserts a graphical button with a link to the Atom XML feed. If the Atom and RSS 
feeds have been disabled in the configuration, this tag will have no output.   


## backtrace 

Outputs a backtrace of the called PHP functions. Useful for when you're debugging, 
and wondering what parts of the code have been executed to get to this point in 
the templates.   


You can also call this function from your own PHP code, by calling `smarty_backtrace()`, 
although it might be better to use `debug_printbacktrace()`, since then the 
output will show up in the debug log only.   


See also: `[[ print_r ]]`  


## body 

Outputs the 'body' part of an entry or page. The main difference of using this 
instead of `[[ $entry.body ]]` or `[[ $page.body ]]` is that `[[ body ]]` will 
also parse smarty tags that are placed inside the content, whereas the former 
output the contents as-is.  


Optional parameter:

*   **strip:** If strip is set to 1, most HTML tags are removed from the output.
*   **anchorname:** this specifies the name of the anchor, which shows up at the 
    end of the link, after the hashmark (the '#'-sign). If you use this, be sure 
    to add it to `[[more]]` as well.
*   **noanchor:** if set to 1, the body will not have an anchor. Useful if you're 
    using more than one `[[body]]` tag on a single page, and it's generating 
    multiple id's with the same value.  
    
## built-in functions within Smarty

There are several useful functions built-in within Smarty itself (like `capture`, 
`php`, `if` and `foreach`). You can read about them: [Built-in Functions][2]
    
## cached_include


Cached include works just like `[[ include ]]`, but with the ability to
cache the resulting output.

    [[ cached_include file='testfile.html' ]]

By default the cache is updated every 10 minutes but this can be changed by 
using the 'cache' parameter. If the file you are including contains a 
dependency in the file that includes it, you must add something unique to
that dependency in the 'jitter' parameter.

Parameters available:

  * **file** - file to include, relative to the PivotX 'templates' directory
  * **cache** - cache update in minutes
  * **jitter** - optional dependency text

Examples:

    <!-- include the sidebar template, allow it to be cached for a maximum of 
    30 minutes and the resulting cached output is dependent on the entry-uid 
    of the current entry -->
    [[ cached_include file='right-sidebar.tpl' cache=30 jitter=$entry.uid ]]
    
    <!-- include the sidebar template, with the output dependant on the 
    current pagetype ('weblog', 'entry', 'page') -->
    [[ cached_include file='right-sidebar.tpl' jitter=$modifier.pagetype ]]
    
**Note:** Cached include is designed to be fast, so it does _not_ have any 
built-in checks for changed template files. If you're developing, remember
to often clear the PivotX cache, or check `Disallow cached includes` in 
`Administration` &raquo; `Configuration`.



## category 

Outputs the categories of the current entry or the categories selected by the
"name" parameter. Optionally links them to a (category) page that contains
entries from the corresponding category.

    [[ category link=true ]]

Optional parameters:

*   **ignore:** You can let this tag 'ignore' certain categories. For example: 
    `ignore='sticky, notused'` 
*   **only:** List only the categories of the current entry that are in this 
    attribute. For example: `only='movies, books, music'`
*   **name:** List only the categories that are in this attribute. The 
    "ignore" and "only" parameter are ignored, when using this parameter. For 
    example: `name='movies, books, music'`
*   **link:** If link is `true`, all category names will be a link, leading to 
    the corresponding category page.
*   **sep:** The separator used between the categories. Default value is `', '`.  
*   **title:** Add a title-attribute to the link. Use `%name%` and `%display%` 
    as placeholders for the category's internal name and display name. For example 
    `title="Other entries in category %display%."`

## category_link 

Create a link to the (category) page for any given category. For example:

    [[ category_link name='music' ]]

Optional parameters:

*   **title:** Add a title-attribute to the link.
*   **text:** Gives the link a text display. Defaults to display name of category.
*   **hrefonly:** Only the href value is returned.

## category_list 

Output a linked list, leading to the different (category) pages for the different categories.   
Example:

    <ul>  
    [[category_list format='<li><a href="%url%">%display%</a></li>']]  
    </ul>  
    
Optional parameters:  

*   **ignore:** You can let this tag 'ignore' certain categories. For example: 
    `ignore='sticky, notused'` 
*   **only:** List only the categories that are in this attribute. For example: 
    `only='movies, books, music'`
*   **format:** Specify the format for the output. Parameters that will be 
    replaced by the correct values are `%url%`, `%name%`, `%display%`  
    and `%count%` (which returns the number of entries in the category).

## chaptername 

This tag is used to output the name of the chapter that a page belongs to.  
Obviously this only contains a value when displaying a page.  


## commcount 

Output the number of comments for the current entry. You can provide the labels, 
if you want to override the defaults.   
  
Example:

    [[ commcount text0='No comments' text1='One comment' textmore='%num% comments' ]]

You can use `%num%` to output the number as a localised value, like 'seven', 
or `%n%` to output as numbers, like '7'.

## commentform 

Displays a commentform if commenting is allowed and the user's remote IP 
isn't blocked.

This displays the `_sub_commentform.html` template by default, but you can 
override it to use another template:   

    [[commentform template='_sub_mycommentform.html' ]]

See also: [[ message ]] 

## commentlink 

Inserts a link to the comments for an entry with the number of comments as the 
default link text. Example: `One comment`. 

To change this, use for example something like: 

    [[commentlink text0='Nothing' text1='One' textmore='Many']]  
    

## comments 

Using the `[[comments]]`-tag, you can display all comments for the current entry. 

Example 1: 

    [[comments]]  
    <div class='comment'>  
    %anchor%  
    <img class='gravatar' src='%gravatar%' alt='%name%' />  
    <div class='comment-text'>  
    %comment%  
    <cite><strong>%name%</strong> %email% %url% - %date% %editlink%</cite>  
    </div>  
    </div>  
    [[/comments]]

The following parameters can be used in the `[[comments]]` tag: 

*   **order** - Sort order for comments, either 'descending' or 'ascending'. 
*   **format_reply** - Free text. Defaults to 'Reply on %name%'. 
*   **format_forward** - Free text. Defaults to 'Replied on by %name%'. 
*   **format_backward** - Free text. Defaults to 'This is a reply on %name%'. 
*   **date** - Date format. You can use all PivotX date formatting tags to customize the output - see [Appendix d: Date formatting options][1].
*   **default_gravatar** - URL to default gravatar. 
*   **gravatar_size** - Size (in pixels) for gravatar. 
*   **skipanchor** - Set to any value skips creation of start and ending anchor (id=comm and id=lastcomment).

The HTML content of the block is used for formatting. The following formatting tags are recognized: 

*   **%quote%** - The text produced using 'format_reply'. 
*   **%quoted-back%** - The text produced using 'format_forward'. 
*   **%quoted-forward%** - The text produced using 'format_backward'. 
*   **%count%** - The number of the comment. 
*   **%code%** - The id/code of the entry. 
*   **%even-odd%** - Returns 'even' or 'odd' depending on the number of the current entry. 
*   **%ip%** - The IP address of the commenter. 
*   **%date%** - The date. 
*   **%datelink%** - A link to the current comment with the date as link text. 
*   **%comment%** - The actual comment 
*   **%comment-nolinebreaks%** - The actual comment, but without any linebreaks 
*   **%name%** - The name of the commenter. 
*   **%name_attr%** - The name of the commenter stripped so it can be used as an attribute value.
*   **%email%** - The mailto link for the commenter. 
*   **%url%** - The link to the homepage for the commenter. 
*   **%anchor%** - The HTML code defining the anchor for the current comment. 
*   **%url-to-name%** - The homepage link with the name as link text. 
*   **%email-to-name%** - The mailto link with the name as link text. 
*   **%gravatar%** - The URL to the gravatar for the current commenter. 
*   **%editlink%** - The link to the edit page for the current comment. 

## content 

This tag is used to output the search results or the tag cloud. Currently there 
are no options to configure the output. The search-results can be configured 
using the `[[searchresults]]` tag.  


## count 

Display the number of elements a given array has.   

Example:

    [[ count array=$entry.comments ]]

## date 

Outputs a date, using the given formatting. If no date parameter is given,
the date of the current entry/page is used.

Example:

    [[ date format='%day% %month% %ye% - %hour24%:%minute%' 
            date=$entry.publish_date ]]

The format parameter uses the date formatting options as described in [Appendix d: Date formatting options][1].

Optional parameters:

*   **use** - fetch the date from a date variable (like 'publish_date' or 'edit_date') in 
    the current entry/page.
*   **date** - set the date explicitly.


## download 

Insert a link to a downloadable file. Usually this tag is generated by using
the 'insert download' option when writing an Entry or Page.

Example:

    [[ download file='my_report.pdf' title='Download my report' ]]

## editlink  

Insert a link to edit the current Entry or Page, directly from your website.
These link are only shown to users who are logged in.
  
Example: 

    [[ editlink format='Edit me!' ]]

Optional parameters:

*   **format** - The text to display in the link.
*   **prefix** - The text to display before the link, for layout purposes. For example: `prefix=' - '`
*   **postfix** - The text to display after the link, for layout purposes. For example: `postfix=' - '`

## emotpopup 

Insert the link to the popup window with the emoticons. This is only displayed
if the visitor is allowed to use emoticons in the comments of the current
weblog.   

## explode 

Outputs or returns an exploded string. Works pretty much the same as PHP's explode() function. Valid parameters are 'glue', 'string' and 'return'.  


The example below will split string $string by commas and return the result into array $array

    [[ explode string=$string glue=',' return='array' ]]

## feed (RSS / Atom) 

Using the `[[feed]]`-tag, you can fetch and display any RSS or Atom feed from the Interwebs. It uses caching internally, to speed up display. 

Example 1: 

    [[ feed url='http://webtwee.net/atom.xml' amount=8 ]]   
    <p><strong><a href='%link%'>%title%</a></strong><br/>  
    %description%  
    </p>   
    [[ /feed ]]

Example 2: 

    [[ feed url='http://webtwee.net/atom.xml' dateformat='%dayname% %day% %monthname%' ]]   
    <p><strong><a href='%link%'>%title%</a></strong><br/></p>  
      
    %content% (%author% - %date%)  
    [[ /feed ]]

The following attributes can be used in the `[[feed]]` tag: 

*   **amount** - The number of items to show. Defaults to 8. 
*   **dateformat** - Determines how dates are formatted. 
*   **allowtags** - Set this to allow certain tags in the HTML in `%title%`, 
    `%content%`, `%description%`. This option is off by default, since it requires 
    you to trust the source of the Feed. If this option is set, the 'trimlength' 
    attribute is ignored. Examples: 
    *   allowtags='*' - Allow all common HTML tags (but no javascript) 
    *   allowtags='<strong\><em\>' - Allow only `<strong>` and `<em>` tags. 
        (but no scripting in those tags either) 
*   **trimlength** - Limit the title, description and content to the given length. Useful if a feed contains too much text. If trimlength is used, all HTML will be stripped from these fields, because otherwise the trimming might break an HMTL tag in two, which would break the wellformedness of your page. 

Note that `[[feed]]` is a block function, so you will need to use both the `[[feed]]` and `[[/feed]]` tags in your template. The HTML that is between the tags is used for formatting. The following formatting tags are recognized: 

*   **%title%** - Title of the feed item 
*   **%link%** - Link to the item on the web 
*   **%description%** - Short description of the item. Prefers a plain-text summary, if available in the feed. 
*   **%content%** - Full content of the feed item. Prefers fully HTML formatted content, if available in the feed. 
*   **%author%** - Author of the item, if available. Falls back to the author of the feed, if per-item author is not available. 
*   **%id%** - unique ID of the feed item. 
*   **%date%** - Date of the feed item. uses the 'dateformat' attribute, and if that's not available, it uses `'%dayname% %day% %monthname% %year%'`

## getentry 

Get an Entry, referenced by its UID. You can use this to include an entry (or
part of it) in a template, Page or other Entry. The fetched Entry is stored in
the `[[$ownvar]]` template variable. Use the `[[print_r]]` tag to see the
contents of `[[$ownvar]]`

    [[ getentry uid=nnn var=ownvar]]  
      
    [[ print_r var=$ownvar ]]
    
If you want one of the fields in the entry just use `[[$ownvar]]` as you would
use `[[$entry]]`. So the title will be `[[$ownvar.title]]` and the
introduction would be `[[$ownvar.introduction|parse]]`.

You **don't** need to use `[[resetentry]]` here because the `[[$entry]]` variable is not changed.

## getpage 

Get a Page, referenced by its URI or UID. You can use this to include a page (or part
of it) in a template, Entry or other Page. The fetched Page is stored in the
`[[$page]]` template variable. Use the `[[print_r]]` tag to see the contents
of `[[$page]]`. 

    [[ getpage uri='about']]  
      
    [[ print_r var=$page ]]  
    
    <h2>[[$page.title]]</h2>
    [[$page.introduction|parse]]
      
    [[ resetpage ]]

## getpagelist 

Retrieves a list of pages. Useful in combination with `[[getpage]]`. You can
use this To get an array with the URIs of all pages in a chapter, and then
iterate through them with `[[foreach]]`. 

The '`var`' attribute determines the variable in the template that will have
the results. Defaults to '`pagelist`'. Note: do *not* include the `$` in the
variablename: `var=pagelist` is correct, `var=$pagelist` is not. This is
because the '`var`' attribute is used a string to set the variable, if you use
`$pagelist`, the *value* of `$pagelist` is used, instead of the string
'`pagelist`'. 

Example 1: Get a list of URIs, and print them: 

    [[ getpagelist var="pagelist" ]]  
      
    [[ print_r var=$pagelist ]]  
    

You can use the 'onlychapter' attribute to choose a chapter to get the pages
from. If omitted, it will return all pages. 

Example 2: Get a list of URI's, and use `[[foreach]]` to iterate the list. 

    [[ getpagelist var="pagelist" onlychapter="pages" ]]  
      
    [[ foreach from=$pagelist item="pageuri" ]]  
      
    item: [[ $pageuri ]]<br />  
      
    [[ /foreach ]]  
    

The real power of this tag shows, when combined with `[[getpage]]`. Let's suppose 
you want to display a list of pages, but you need more data than `[[pagelist]]` 
provides, or you require the use of smarty tags. You can use the `[[getpagelist]]` 
tag to get the pages, iterate over them, and pass them one at a time to `[[getpage]]`. 

Example 3: Get a list of URI's, and use `[[getpage]]` on them. 

    [[ getpagelist var="pagelist" onlychapter="pages" ]]  
      
    [[ foreach from=$pagelist item="pageuri" ]]  
      
    [[ getpage uri=$pageuri ]]  
      
    <h2><a href="[[ $page.link ]]">[[ $page.title ]]</a></h2>   
    [[ $page.introduction ]]  
      
    [[ resetpage ]]  
      
    [[ /foreach ]]  
    

By default, the Pagelist comes sorted in the order in which it is in the PivotX 
backend (i.e. in the 'sorting order' that you gave it. If you pass an extra 
parameter `sort='title'`, PivotX will sort the pages alphabetically by title 
instead.

## home 

Returns the URL to the homepage of the website.   


## hook 

Executes a hook from within a template. The parameters are 'name' and 'value'.

## id_anchor

Inserts an anchor for the current entry (needed for permalink). Takes one
optional parameter 'name' which sets the prefix before the entry uid.  

## image 

Inserts an image. Valid parameters are 'file', 'alt', 'align', 'class', 'id', 'width' and 'height'.

    [[ image file='somedirectory/somefile.jpg' ]]  
    

The 'file' parameter is mandatory and should be the relative path from the PivotX 
'images' directory. The 'alt' parameter is optional, but should always be given 
since the XHTML standard requires an alternative text. The inserted image will have 
the classname '`pivotx-image`' unless the 'class' parameter is set. If 'align' is 
set to 'left' or 'right', the image will also get the classname '`align-left`' or 
'`align-right`' respectively.   

## implode 

Outputs or returns an imploded array. Works pretty much the same as PHP's
implode() function. Valid parameters are 'glue', 'array' and 'return'.  


The example below will join the pieces of array $aArray with commas and return them into the string $string

    [[ implode array=$aArray glue=',' return='string' ]]

## include

Includes a file from the templates folder of your site. It takes one parameter: 'file'.

    [[ include file='testfile.html' ]]
    
    [[ include file='testfile.html' assign=ownvar]]

The 'file' parameter is mandatory and should be the relative path from the
PivotX 'templates' directory. If you use it with the assign parm the output of
the include will be assigned to ownvar.

## introduction 

Outputs the 'introduction' part of an entry or page. The main difference of
using this instead of [[ $entry.introduction ]] or [[ $page.introduction ]] is
that [[ introduction ]] will also parse Smarty tags that are placed inside the
content, whereas the former output the contents as-is.

Optional parameter:

*   **strip:** If strip is set to 1, most HTML tags are removed from the output.

## lang 

Outputs the current language, like 'en' or 'nl'.

The optional type='..' attribute can be either 'html' or 'xml'. The output
will then be suitable to use in templates, in the html tag, to set the correct
language.   

Note: If you are using XHTML 1.0 (which is the default for PivotX) you should
use both [[lang type='html']] and [[lang type='xml']].

Example:

    <html xmlns='http://www.w3.org/1999/xhtml' [[lang type="xml"]] [[lang type="html"]]>

## last_comments

Inserts a list of the latest comments that where left by visitors. 

**Note:** As of PivotX 2.1 this function will be deprecated. Use [[latest_comments]] instead.

## latest_comments

Inserts a list of the latest comments that where left by visitors. 

    [[ latest_comments  
    format='<a href="%url%" title="%date%"><b>%name%</b></a>: %comm%<br />'  
    length=100 trim=16 count=8  
    ]]  
    
The following attributes can be used in the `[[latest_comments]]` tag: 

*   **format** - The lay-out of the comment.  
    Defaults to  
    '`<a href='%url%' title='%date%'><b>%name%</b></a> (%title%): %comm%<br />`'.   
    Possible replacement strings are:  
    %url% - The URL specified with the comment.  
    %date% - The date the comment was made.  
    %name% - The name of the commenter.  
    %title% - The title of the comment.  
    %comm% - The actual comment.  
    %popup% - The constructed popup (see weblog settings). 
*   **length** - Determines the maximum length that is shown (default 100).
*   **trim** - Option to trim long titles and names (default 16).  
    For example, `trim=8` will make it so that 'personwithlongname' is shown as 'personw..'. 
*   **count** - Determines the maximum amount of comments shown (default 6).
*   **category** - (Optional) Used to get the latest comments for specific categories instead of 
    the categories in the current weblog. Use `category='*'` to display all the latest comments, regardless of category.

**Note:** This is a new tag, as of PivotX 2.1.  


## link 

Inserts a link to a page, an entry or a weblog.  


    [[ link page='someuri' ]]

It tries to detect automatically what kind of link you want depending of where the tag is inserted. However, you can force   

  * a page link using the 'page' parameter (with the uri as the value)
  * an entry link using the 'entry' parameter (with the code as value)
  * a weblog link using the 'weblog' parameter (with the internal name as value)  
  * a mailto link using the 'mail' parameter (with the mail address as value)
  * a page or entry link using the 'uri' parameter (the uri value is searched to determine whether it is a page or an entry)
  * a weblog link using the 'weblog' parameter
  * a category link using the 'category' parameter
  * an author link using the 'author' or 'user' parameter
    

Other valid parameters are:

  * 'title' and 'text' to set the link title and text
  * 'hrefonly' if you only want to insert the URL
  * 'query' if you need to add a query to the generated URL
  * 'fullurl' to create a link with the http(s) protocol and domain name
  * 'encrypt' to encrypt the mailto link
  
Example: `[[ link page='someuri' hrefonly=1 fullurl=1 ]]` will output something like `http://example.org/page/someuri`.

## link_list

Returns the content of a specific file in your template folder.
File names searched subsequently (first match is used):
_sub_link_list.tpl
_aux_link_list.tpl
link_list.tpl
link_list.html
_aux_link_list.html
_sub_link_list.html

## log_dir 

Returns the local absolute URL to the (current) weblog.

**Note:** *In PivotX 2.1 you may prefer to use `[[webloghome]]` instead of `[[log_dir]]`.  

## log_url 

Returns the global absolute URL to the (current) weblog. 

## message 

Will contain any messages that are generated by PivotX in special cases.
Used with commentposting to tell the user what went wrong. 

## more 

Inserts a link to the body (more-link) for the current entry. If the entry
has only an introduction, nothing will be inserted. 

Valid optional parameters are:

*   **text** - The link text.   
*   **title** - The link title.   
*   **prefix** - The text/code before the actual link. Default value is the empty string. 
*   **postfix** - The text/code after the actual link. Default value is the empty string.
*   **anchorname** - Specifies the name of the anchor, which shows up at the 
    end of the link, after the hash mark (the '#'-sign). If you don't use any 
    anchors, just set an empty anchorname. If you use this, be sure to add it 
    to `[[body]]` as well.

The following formatting tag is recognized inside **text** and **title**: 

*   %title% - Title of the entry.

Example:

    [[ more text='Continue reading about %title%' ]] 

  
## nextentry 

Inserts a link to the next entry in the current weblog, 
from the current entry's categories or from selected categories. 

Valid optional parameters are:

*   **text** - HTML to insert to create the link.   
*   **cutoff** - maximum length of %title% and %subtitle% as used inside **text** (default 20).
*   **incategory** - only entries from the current entry's categories (ignored when category is also used).
*   **category** - only entries from certain categories. For example: category='sticky, notused'.

The following formatting tags are recognized inside **text**: 

*   **%title%** / **%subtitle%** - Title / subtitle of the entry.
*   **%link%** - Relative link to the entry.

Example:

    [[ nextentry text='<a href="%link%">The entry called "%title%"</a>' incategory="1" ]]

## nextpage 

Inserts a link to the next page in the chapter (of the current page). Valid optional parameters are:

*   **text** - HTML to insert to create the link.   
*   **cutoff** - maximum length of %title% and %subtitle% as used inside **text** (default 20).
*   **sort** - How the pages should be sorted. Legal values are `title`, `uri` and `date`. 
    The default sort is the PivotX sort as seen in the backend.
*   **sortorder** - If set to 'reverse', the pages order is reversed.

The following formatting tags are recognized inside **text**: 

*   **%title%** / **%subtitle%** - Title / subtitle of the page.
*   **%link%** - Relative link to the page.

Example:

    [[ nextpage text='<a href="%link%">The page called "%title%"</a>' ]]

**Note:** This is a new tag, as of PivotX 2.1

## nocache

The content inside a nocache block isn't cached, even if output caching is
enabled.

Example:

    [[ nocache ]]
    [[ date date=$smarty.now|date_format:"%Y-%m-%d %H:%M:%S" ]]
    [[ /nocache ]]

**Note:** This is a new tag, as of PivotX 2.3.0.

## pagelist 

Inserts a list of all chapters and their pages. Valid parameters are:

*   **pages** - HTML to insert for each page in each chapter.
*   **chapterbegin** - HTML to insert before the pages in each chapter.
*   **chapterend** - HTML to insert after the pages in each chapter.
*   **isactive** - Text to insert for '%active%' (inside the pages parameter) for an active page.
*   **onlychapter** - Display pages from this chapter only, given by chapter name or ID.
*   **excludechapter** - Exclude pages from this chapter, given by chapter name or ID.
*   **exclude** - A comma separated list of URIs of pages that should be excluded.
*   **sort** - How the pages should be sorted. Legal values are 'title', 'uri' and 'date'. Default sort is the PivotX sort as seen in the backend.
*   **sortorder** - If set to 'reverse', the pages order is reversed.
*   **dateformat** - The formatting of '%date%' (inside the pages parameter - see [Appendix d: Date formatting options][1]).

The following formatting tags are recognized inside **pages**: 

*   **%title%** / **%subtitle%** - Title / subtitle of the page.
*   **%user%** - The user how wrote the page.
*   **%date%** - Date of the page. Uses the `dateformat` parameter if present.
*   **%link%** - Relative link to the page.
*   **%uri%** - The URI / ID of the page.  
    

The following formatting tags are recognized inside `chapterbegin` and `chapterend`:

*   **%chaptername%** - The name of the chapter.
*   **%description%** - The description of the chapter.  
    

Example: 


    [[ pagelist  
    chapterbegin='<ul>'  
    pages='<li %active%><a href="%link%" title="%subtitle%">%title%</a></li>'  
    chapterend='</ul>'  
    isactive='id="active"'  
    sort='title'  
    ]]

## paging 

The paging tag provides links to the next or previous pages from your front page,
making it easy for your visitors to read on/navigate your entries. It can tell
you which entries you are reading, how many previous/next entries, and how many
in total. 

Some examples. Basic navigation to display where you are: 

    <p class="entrynavigation">  
    [[ paging action='prev' ]] |  
    [[ paging action='curr' ]] |  
    [[ paging action='next' ]]  
    </p>

Or display navigation in a style like on the Digg.com website: 

    [[ paging action='digg' ]]

With this tag the action attribute is either `digg`, `next`, `prev` or `curr`. 
PivotX displays its own default text, unless you specify it yourself: 

For example: 

    [[ paging action='prev' format='&laquo; Previous page (%num_from% - %num_to%)' ]] |  
    [[ paging action='curr' format='Displaying %num_from% - %num_to% of %num_tot%' ]] |  
    [[ paging action='next' format='Next page (%num_from% - %num_to%) &raquo; ' ]]

or: 

    [[ paging action='digg' format_prev='Previous' format_next='Next' ]]  
    

For the other (single) link styles the optional link text can contain the following
format tags: 

*   **%num%** - The number of next/prev/current entries.  
*   **%num_tot%** - The total number of entries.  
*   **%num_from%** - Start number of entries.  
*   **%num_to%** - End number of entries.

Example/typical usage: In your frontpage template add `[[ paging action='next' ]]`
or `[[ paging action='digg' ]]` after the closing `[[subweblog]]` tag. 

**Note:** The notion of next and previous is adopted from Pivot - meaning 'next'
will give you older entries. This make sense when you look at the front page and
you want to see the next entries (as in 'not on the front page'). Anyway, if you
dislike this, just use the optional link text like this: 

    [[paging action='next' format='Previous %num% entries' ]]

**Extra Digg style info**

If you select Digg style paging, you keep the templates/pivot_essentials.css in
your templates. If you want other colours and so on, you can override the styles
in that file. Alternatively, you can create your own styles for it, by giving
the `<ul>` that makes the navigation its own id: 

    [[ paging action='digg' id='mystyle' ]]

If you just select the plain 'digg' action a lot of links/pages are listed. If
you have 1000 entries and 10 entries on each page, the most you could have is
100 links (numbered from 1 to 100) - which looks ugly. You can use the maxpages
attribute to limit the maximum number of pages - for example, use 

    [[ paging action='digg' maxpages=7 ]]

to display only 7 links/pages centered around the current page.   

If you're working on a website that has a `[[weblog]]` where the categories and
amount of entries per page are defined in the template, you can use the `amount`
and `category` parameters in the `[[paging]]` tags, to keep everything in sync.
Example 1:

    [[ paging action='prev' amount=10 category="*" ]] |
    [[ paging action='next' amount=10 category="*" ]]  

    [[ subweblog amount=10 category="*"]] .. [[/subweblog]]

Example 2:

    [[ paging action='digg' amount=10 category="news,music,movies" ]] 

    [[ subweblog amount=10 category="news,music,movies"]] .. [[/subweblog]]
    
PivotX generally determines correctly whether or not it should show the paging 
navigation, but you can use the `showalways` parameter to display it, regardless 
of whether there are multiple pages to navigate to or not: 

    [[ paging action='digg' amount=10 showalways=1 ]]

## parse (modifier)

Parse is a modifier, that parses a variable or the output of a smarty function,
just like the 'introduction' and 'body' are parsed.   


For example: if you have a smarty variable `$foo` containing `[[image ..]]` tags,
these tags will be output as-is, just as if you'd use `[[$var]]`. To parse them, and output
the results, use the following:

    [[ $foo|parse ]]

## permalink 

Inserts a permanent link to the current entry (in the archives). Valid parameters 
are `unit`, `title` and `text` (which set the link title and text).

    [[ permalink unit='week' text='&para;' title='Permanent link to "%title%" in the archives' ]]

## pivotxbutton 

Inserts a nice button with a link to the PivotX website. 

## pivotx_dir 

Returns the local absolute URL to the Pivotx directory. 

## pivotx_path 

Returns the (file system) path to the Pivotx directory. (Normally not used in templates.)  


## pivotx_url 

Returns the global absolute URL to the Pivotx directory. 

## popup 

Inserts an image popup - a thumbnail that can be clicked to open the full-size image. Valid 
parameters are `file`, `description`, `alt` and `align`.  
If extension Fancybox is activated this template tag has been redefined to accept all
parameters that Fancybox accepts (see extension documentation).  

    [[ popup file='somedirectory/somefile.jpg' ]]  

The `file` parameter is mandatory and should be the relative path from the PivotX 
'images' directory. The `alt` parameter is optional, but should always be given 
since the XHTML standard requires an alternative text. The inserted thumbnail 
will have CSS class `pivotx-popup`. If 'align' is set to left or right, the image 
will also get CSS class 'align-left' or 'align-right' respectively. 

## previousentry 

Inserts a link to the previous entry in the current weblog, 
from the current entry's categories or from selected categories. 

Valid optional parameters are:

*   **text** - HTML to insert to create the link.   
*   **cutoff** - maximum length of `%title%` and `%subtitle%` as used inside **text** (default 20).
*   **incategory** - only entries from the current entry's categories (ignored when 
    category is also used).
*   **category** - only entries from certain categories. For example: `category='sticky, notused'`.

The following formatting tags are recognized inside **text**: 

*   **%title%** / **%subtitle%** - Title / subtitle of the entry.
*   **%link%** - Relative link to the entry.

Example:

    [[ previousentry text='<a href="%link%">The entry called "%title%"</a>' incategory="1" ]]

## previouspage 

Inserts a link to the previous page in the chapter (of the current page). Valid optional 
parameters are:

*   **text** - HTML to insert to create the link.   
*   **cutoff** - maximum length of `%title%` and `%subtitle%` as used inside **text** (default 20).
*   **sort** - How the pages should be sorted. Legal values are `title`, `uri` and `date`. 
    Default sort is the PivotX sort as seen in the backend.
*   **sortorder** - If set to `reverse`, the pages order is reversed.

The following formatting tags are recognized inside **text**: 

*   **%title%** / **%subtitle%** - Title / subtitle of the page.
*   **%link%** - Relative link to the page.

Example:

    [[ previouspage text='<a href="%link%">The page called "%title%"</a>' ]]

**Note:** This is a new tag, as of PivotX 2.1

## print_r 

Outputs the content of a variable (string, object, array). It works like PHP's `print_r()` 
function. Use the `var` attribute to pass the variable you wish to output.  

    [[ print_r var=$page ]]  

This function is useful for when you're debugging, and wondering what a given 
variable contains. If you want to see all defined variables in the templates, 
you can use the following:

    <pre>  
    [[ php ]] print_r($this->_tpl_vars); [[/php]]  
    </pre>  
    

See also: [[ backtrace ]]

## register\_as\_visitor_link 

Inserts a link to the 'comment user'/'registered visitor' page. The valid parameters 
are `linktext` and `linktext_logged_in` (which is the link text displayed to a logged 
in visitor). 

## registered 

Returns the text 'registered' if the current visitor is (logged in and) registered.

## remember 

Inserts previously filled fields when commenting. The values can come from either a 
previous submit (when previewing, or when an error in the form occurred) or from the cookie. 

## resetpage 

If you've used `[[getpage]]` to set the `[[$page]]` variable, you can use `[[resetpage]]` 
to reset it to what it was before. Useful if you use `[[getpage]]` from inside another Page. 

    [[ getpage uri='about']]   
    [[ print_r var=$page ]]  
    [[ resetpage ]]

## rssbutton 

Inserts a graphical button with a link to the RSS XML feed. If the Atom and RSS feeds 
have been disabled in the configuration, this tag will have no output.   


## search 

Inserts a searchbox and button, to search for words in your Entries and Pages.

    [[ search ]]

There are several options to configure it, and to determine the output.

    [[ search fieldname='Search for stuff here' placeholder='searchterms' ]]

You can hide the button, forcing users to press 'enter' when the searchbox has focus.
While this may look nice, you should consider that this decreases the usability of the 
form for less experienced users, or those with disabilities.

    [[ search button=false ]]

You can limit your search to only entries or only pages.

    [[ search only=entries ]]

Or choose a specific weblog to search (default is the current weblog).

    [[ search weblog=example ]]

Or search all weblogs.

    [[ search weblog="_all_" ]]

Or choose a specific category to search.

    [[ search category=example ]]

Or search all categories.

    [[ search category="_all_" ]]

To get the search criteria in the resulting url specify:

    [[ search request_method=get ]]

PivotX always outputs a `<fieldset>` and `<legend>` tag. This is good for the 
usability of the form, but it might look unattractive when they're not styled 
(or hidden). The pivotx_essentials.css include fixes this by default. You can 
override them like this:

    .pivotx-search fieldset,  
    .pivotx-search-result fieldset {  
    border: 0;  
    padding: 0;  
    margin: 0;  
    }  
      
    .pivotx-search label,   
    .pivotx-search legend,   
    .pivotx-search-result label,   
    .pivotx-search-result legend {  
    display: none;  
    visibility: hidden;  
    }

If you feel that the `[[search]]` button formatting is to restrictive, just write your 
own HTML:

    [[if $modifier.pagetype=="search"]]
        [[assign var=placeholder value=$modifier.uri|escape]]
    [[else]]
        [[assign var=placeholder value="Enter search terms"]]
    [[/if]]
    <form method="post" action="[[home]]?q=" class="pivotx-search"> 
        <fieldset>
            <legend>Search for words used in entries and pages on this website</legend> 
            <label for="search">Enter the word[s] to search for here:</label> 
            <input id="search" type="text" name="q" class="searchbox" 
                value="[[$placeholder]]" onblur="if(this.value=='') this.value='[[$placeholder]]';" 
                onfocus="if(this.value=='[[$placeholder]]') this.value=''; this.select();return true;" /> 
            <input type="submit" class="searchbutton" value="Search!" /> 
        </fieldset>
    </form> 

## searchheading

This tag can be used to add a description like "[x] results found" to the top of the 
search results page. For example:

    <p>[[searchheading
        result0="No results for '%query%'."
        result1="There's one result for '%query%'."
        resultmore="There are %num% result for '%query%'."
    ]]</p>

The results of this tag will change with the amount of found entries/pages, as 
will be quite obvious from the example above. This tag will *not* add a header 
to the search results page. If your search results page doubles as the details 
page for tags, you can use this snippet to insert a heading on the page, only if 
we're actually on a search results page: 

    [[ if $modifier.pagetype=="search" ]]
        <h2>Search results</h2>
        [[search]]
    [[/if]]

As you can see, it will also provide another search box, for the visitor's convenience.

If you use this tag on a page that isn't a search results page, it will not provide any output.

## searchresults

By default PivotX outputs the searchresults using the `[[content]]` tag. The formatting 
of this tag can not be modified, so that's where the `[[searchresults]]` tag comes in. 
This block-tag allows you to specify the formatting of the results in an easy manner: 

    [[searchresults prefix="<ul>" postfix="</ul>" ]]
        <li>
            <a href="%link%">%title%</a> (%percentage%%)<br />
            %excerpt%
        </li>
    [[/searchresults]]

This tag allows for the following parameters:

* **prefix** - This code/text is prefixed before the results, if there are any results. 
    If there are no results, this will be ignored.
* **postfix** - This code/text is postfixed after the results, if there are any results. 
    If there are no results, this will be ignored. 
* **titletrimlength** - The length after which the text in `%title%` will be trimmed. 
    Defaults to '60'.
* **excerptlength** - The length after which the text in `%excerpt%` will be trimmed. 
    Defaults to '100'.

The block allows for the usual `%name%` style parameters. All the usual fields like 
`%title%`, `%subtitle%`, `%introduction%`, `%body%`, `%link%` are present, with the 
addition of `%percentage%`, which is used for the 'score' in the weighted search, and 
`%excerpt%`, which provides a short excerpt of the page/entry from which all tags and 
markup has been stripped. 

See the description for the `[[searchheading]]` tag on how to add a description like 
"[x] results found".

If the markup of `[[searchresults]]` is too restricted for you, you can use the predefined 
`[[$searchresult]]` variable to loop through the searchresults. For example:

    [[foreach from=$searchresults item=result]]
        <li>
            <a href="[[$result.link]]">[[$result.title]]</a> ([[$result.percentage]]%)<br />
            [[$result.introduction|parse|strip_tags]]
        </li>
    [[/foreach]]

All the entries/pages are retrieved in full, complete with any and all extrafields that 
may be present. Use `[[print_r var=$result]]` inside the `[[foreach]]` loop to find out 
about all elements in the array. 

**Note:** If you use this tag, the `[[content]]` tag will produce no results. Do not 
delete the `[[content]]` tag from your template, though, because then the tag-pages 
will not work anymore. 

## self 

Returns the local absolute URL to the current page. If the parameter 'includehostname' 
is set to 1, it will include the host name and return a global absolute URL.

## sitename 

Returns the sitename for the PivotX installation, as entered in `Administration` &raquo; `Configuration`.  

## sitedescription 

Returns the site description for the PivotX installation, as entered in `Administration` &raquo; `Configuration`. 

**Note:** This is a new tag, as of PivotX 2.3.0.

## spamquiz 

To protect your comments against spam, you can configure PivotX to ask a (silly/easy) 
question that has to be answered to accept a comment. Use this tag to place the question 
in the comment form. The valid parameters are 'intro' and 'format'. 'intro' is the leading 
text explaining the concept. The default value is:

    <div id='spamquiz'>  
    <div class='commentform_row'>  
    <small>%intro%</small><br />

'format' is the question and the default value is:

    <label for='spamquiz_answer'><b>%question%</b></label>  
    <input type='text' class='commentinput' name='spamquiz_answer'   
    id='spamquiz_answer'  %name_value% />  
    </div>  
    </div>

For maximum flexibility you can (as of PivotX 2.1) specify both introduction and question 
in the 'format' parameter. 

## subtitle 

Returns the current subtitle (whether it's used for an entry or a page). 

## subweblog / weblog 

The `[[ subweblog ]]` tag is a block tag, which means that it always has to have an 
accompanying `[[ /subweblog ]]` tag. What's inside the tag is used to render the entries 
in that weblog. In fact, the contents can be seen as the template that is used for each 
entry. PivotX loops over the entries, and renders each one, using this 'sub template'. 

A representative example of what a `[[ subweblog ]]` block might look like is: 

    <!-- begin of weblog "standard" -->   
    [[ subweblog name='standard' ]][[ literal ]]   
      
    <!-- entry "[[title]]" -->   
    <div class='entry'>   
    <h2>   
    <a href='[[entrylink hrefonly=1]]'>[[title]]</a>   
    </h2>   
      
      
    <p class='date'>   
    [[ date format='%dayname% %day% %monthname% %year% at %hour12%:%minute% %ampm%' ]]   
    [[ editlink format='Edit' prefix=' - ' ]]   
    </p>   
      
      
    [[introduction]]   
      
    [[more]]   
      
    <p class='entryfooter'>   
    <span class='meta'>   
    [[ user field=emailtonick ]] |   
    [[ singlepermalink text='&para;' title='Permanent link to entry "%title%"' ]] |   
    [[ category link=true ]] |   
    </span>   
    <span class='comments'>   
    [[commentlink]]   
    </span>   
    [[tags prefix='<span class="tags">' postfix='</tags>' ]]   
    </p>   
      
      
    </div>   
      
    [[ /literal ]][[ /subweblog ]]   
    <!-- end of weblog "standard" -->

The `[[ literal ]]`-tags are there to make sure the contents aren't parsed too early. 
Don't remove them! 

The `[[subweblog]]`-tag takes the following arguments: 

*   **name** - The name of the subweblog. This one is not optional, as it is used to 
    match it to the correct categories. You can set the categories in the weblog 
    configuration, in the PivotX interface. 
*   **order** - Either `random`, `asc` or `desc`. Determines the order of the shown 
    entries: use `asc` for oldest-first and `desc` for newest-first. 
*   **orderby** - Which entry field to sort entries by, 'date' is the default. 
    If you want to use an extrafield (extension Bonusfields) then specify 'extrafields_fieldname'.   
*   **amount** - Determine the amount of entries to show at maximum. *(amount was 
    added in PivotX 2.1)*
*   **showme** - Determine the amount of entries to show at maximum. *(showme will 
    be deprecated starting with PivotX 2.1)*
*   **offset** - Skip the given number of entries. Useful if you'd like to show the 
    first few entries of weblog using another format than the next bunch. For example, 
    use `offset='4'` to skip four entries. 
*   **ignorepaging** - If set to `1`, any paging/browsing will be ignored and 
    the subweblog will use a zero offset.
*   **ignorearchive** - If set to `1`, the time period for the viewed
    archive page will be ignored. *(Added in  PivotX 2.3.2)*
*   **ignoreuser** - If set to `1`, any user filters will be ignored.
*   **user** - Show only entries from this user. Use the internal name of the author. 
*   **category** - Show only entries from this category or categories. Separate 
    multiple categories using a comma. For example: `category='movies, books, drink'`. 
    You can also use `category='*'` to select all categories. This parameter overrides 
    the category allocation done in the weblog configuration. 
*   **date** - Use only entries that fall within this time period. For example: use 
    `date='2011-03'` to display only entries from March 2011, or `date='2011-04-15'` 
    to show the entries from the 15th of april, 2011. 
*   **end** - Use only entries that are created before this date (in format 
    `YYYY-MM-DD-HH-MM`).  
*   **start** - Use only entries that are created after this date (in format 
    `YYYY-MM-DD-HH-MM`).
*   **noresult** - The text that's shown when there are no entries to be displayed.

The most commonly used tags inside `[[subweblog]]` are: `[[entrylink]]`, `[[title]]`, 
`[[subtitle]]`, `[[date]]`, `[[editlink]]`, `[[introduction]]`, `[[body]]`, `[[more]]`, 
`[[user]]`, `[[singlepermalink]]`, `[[permalink]]`, `[[category]]`, `[[commentlink]]` and `[[tags]]`. 

You can use the `[[subweblog]]` tag inside pages. For example, if you have a page on each 
author, you can use [[ subweblog author='name' ]] to show his or her latest entries. 


A few extra variables are set, for keeping track of where PivotX is in the loop of entries. These are:

*   `[[ $first ]]` is '1' for the first entry in the loop.
*   `[[ $counter ]]` is the number of current iteration in the loop.   
*   `[[ $max ]]` is the total number of entries for which the loop will be iterated.
*   `[[ $last ]]` is '1' for the last entry in the loop.

## tagcloud 

Returns a list of tags. You can set extra parameters to adjust the amount of tags shown 
and add minimum and maximum font sizes. It takes the following arguments:

*   **amount** - Amout of tags to display. Defaults to value of config tag_cloud_amount.
*   **minsize** - Minimum font size. Defaults to value of config tag_min_font.
*   **maxsize** - Maximum font size. Defaults to value of config tag_max_font.
*   **exclude** - Tags to be excluded separated by a comma.
*   **sep** - Separator to use between tags displayed. Default ", ".
*   **underscore** - The 'character' to use instead of the underscore in tags.

Example

    [[ tagcloud  
    amount='50'  
    minsize='10'  
    maxsize='30'  
    underscore=' ' 
    ]]

## tags 

Returns a concise list of the entry's tags. By default the tags are separated
by commas and link to their tag pages. It takes the following arguments:

*   **text** - The output format. The default value is "Used tags: %tags%" 
    (or the localised version thereof).
*   **sep** - The separator between the tags. The default value is ", ".
*   **textonly** - If set to 1, the tags aren't links.
*   **prefix** - The text before the **text**. The default value is "".
*   **postfix** - The text after the **text**. The default value is "".
*   **underscore** - The 'character' to use instead of the underscore in tags. If set to `underscore=" "` the tag 'star_wars' will display as 'star wars'. The default value is "_".

Examples:

    [[ tags textonly=1 text="This entry is tagged with %tags%." ]]
    [[ tags text="%tags%" prefix="My tags: <ul><li>" 
        postfix="</li></ul>" sep="</li><li>" ]]

## tt 

Used in the introduction and body of an entry, to add a tag to the entry.
Outputs a link to the tag page for the given tag. It takes the following
arguments:   


*   **tag** - The word to tag the entry with.
*   **link** - The URL to an external tag page. Optional.  
*   **underscore** - The 'character' to use instead of the underscore in tags. 
    If set to `underscore=" "` the tag 'star_wars' will display as 'star wars'. 
    The default value is "_".   

If the optional parameter link is set, the generated link will point there 
instead. Examples: 

    [[ tt tag='sometopic' ]]  
    [[ tt tag='php' link='http://delicious.com/tag/php' ]]  
    

## template_dir 

Returns the local absolute URL to the template directory.. 

## textilepopup 

Adds the textile editor header to the comments form. It's somewhat confusingly 
named for backwards compatibility. 

## title 

Returns the current title (whether it's used for an entry or a page). It takes one optional parameter 
`strip` which, if equal to one, will remove all HTML tags from the output.

## trackcount 

Output the number of trackbacks for the current entry. You can provide the labels, 
if you want to override the defaults.  
  
Example:

    [[ trackcount text0='No comments' text1='One comment' textmore='%num% comments' ]]

You can use `%num%` to output the number as a localised value, like `seven`, or 
`%n%` to output as numbers, like `7`.   


**Note:** This is a new tag, as of PivotX 2.1

## tracklink 

Inserts the trackback URL for the current entry. It takes one optional parameter `format`.  
  
Example:

    [[ tracklink format='<p>Trackback URL: %url% </p>']]

**Note:** This is a new tag, as of PivotX 2.1

## trackbacklink

Inserts a link to the trackbacks for an entry with the number of trackbacks as the 
default link text. Example: One trackback. 

To change this, use for example something like: 

    [[trackbacklink text0='Nothing' text1='One' textmore='Many']]

**Note:** This is a new tag, as of PivotX 2.1

## trackbacks 

Using the [[trackbacks]]-tag, you can display all trackbacks for the current entry. 

Example 1: 

    [[trackbacks]]  
    <div class='comment'>  
    %anchor%  
    <div class='comment-text'>  
    <strong>%title%</strong><br />%excerpt%  
    <cite class="comment">Sent on %date%, via %url% %editlink%</cite>  
    </div>  
    </div>  
    [[/trackbacks]]

The following parameters can be used in the `[[trackbacks]]` tag: 

*   **order** - Sort order for comments, either `descending` or `ascending`. 
*   **date** - The date format.  
    
The HTML content of the block is used for formatting. The following formatting tags are recognized: 

*   **%code%** - The id/code of the entry. 
*   **%count%** - The number of the current trackback.  
*   **%even-odd%** - Returns 'even' or 'odd' depending on the number of the current entry. 
*   **%ip%** - The IP address of the trackback. 
*   **%date%** - The date. 
*   **%datelink%** - A link to the current trackback with the date as link text. 
*   **%excerpt%** - The excerpt of the trackback.  
*   **%title%** - The title of the blog entry that sent the trackback. 
*   **%url%** - The link to the homepage for the commenter. 
*   **%anchor%** - The HTML code defining the anchor for the current trackback. 
*   **%editlink%** - The link to the edit page for the current trackback. 

**Note:** This is a new tag, as of PivotX 2.1

## uid

Returns the uid (code) for the current entry.   

## upload_dir 

Returns the local absolute URL to the upload directory.

## user 

Returns information about the author of the current entry or page. It takes one 
optional parameter `field` to select what information to return. Field value
can be any subfield name that is in the user array definition. Standard array 
consists out of: `username` (default), `email`, `nickname`, `image`, `language`, 
`text_processing` and `lastseen`. There is one special value `emailtonick` that 
will produce an encoded link to the e-mail address. For example:

    [[ user field=emailtonick ]]

## user_list

Returns a list of all (or some) authors on your PivotX site.

A typical example:

    <ul>
    [[ user_list
        format = "<li>%nickname% has published %entrycount% entries in the categories %categories%</li>"
        list_separator = ","
        ignore = "admin"
        show_level = "1,2,3,4"
    ]]
    </ul>
    
The following paramters can be used:

  * format - the format for the output, default "%nickname%&lt;br /&gt;"
  * list_separator - character to separate the list of allowed categories
  * ignore - list of users to be ignored, comma separated
  * show_level - users levels to show, comma separated (if omitted, all levels will be shown)

User levels are defined by the following numbers:

  -1 Inactive user;
  0 Moblogger;
  1 Normal;
  2 Advanced;
  3 Administrator;
  4 Superadmin.
  
The following formatting tags are recognized (in the format):

  * %username% - The user name (login name)
  * %email% - Email address
  * %userlevel% - User level in numeric format
  * %userleveltext% - The user level in text format
  * %entrycount% - The number of entries by this user
  * %nickname% - User nickname
  * %language% - User language
  * %image% - User image
  * %text_processing% - User setting for text processing ( 0 - None; 1 - XHTML, Convert Linebreaks to &lt;br /&gt;; 2 - Textile; 3 - Markdown; 4 - Markdown and Smartypants; 5 - WYSIWYG;)
  * %categories% - A list of categories the user is allowed to post in, separated by the list_separator

**Note:** This is a new tag, as of PivotX 2.3.0.

## via 

Returns the 'via' information from the extended entry form as a link with a title. 
It takes one optional parameter `format` with default value `<a href="%link%" title="%title%">via</a>`.

## webloghome 

Returns the local absolute URL to the (current) weblog. 

**Note:** This is a new tag, as of PivotX 2.1

## weblogid 

Returns the ID/internal name of the current weblog.

## weblog_list 

Displays a list of the weblogs in PivotX. Weblog_list takes the following arguments:

*   **format** - Determines how the list is formatted.
*   **current** - Determines what should be printed on the current weblog.
*   **exclude** - A comma-separated list of weblogs to be excluded from the list.
*   **include** - A comma-separated list of weblogs to be included in the list.
*   **sort** - See after example for more info.  

Example 1: 

    [[ weblog_list format='<a href="%link%">%title%</a><br />' ]]

Example 2: 

    <ul>  
    [[weblog_list  
    format='<li %active%><a href="%link%" title="%payoff%">%display%</a>   
    <small>(%internal%)</small></li>'  
    current='class="activepage"'  
    ]]  
    </ul>

By default, the Weblog list comes sorted in the order in which it is in the PivotX 
backend. If you pass an extra parameter `sort='title'`, PivotX will sort the 
pages alphabetically by title instead.

## weblogsubtitle 

Returns the subtitle (payoff) of the current weblog. It takes one optional parameter 
`strip` which, if equal to one, will remove all HTML tags from the output.

## weblogtitle 

Returns the title of the current weblog. It takes one optional parameter `strip` which, 
if equal to one, will remove all HTML tags from the output.

## widgets 

Inserts a block with the enabled widgets. 

## yesno 

Returns localised 'Yes' or 'No'. 'Yes' is returned if the `value` parameter evaluates to `1` or `true`. 


[1]: /page/app-d/ "Appendix d: Date formatting options"
[2]: http://www.smarty.net/docsv2/en/language.builtin.functions.tpl "http://www.smarty.net/docsv2/en/language.builtin.functions.tpl"
