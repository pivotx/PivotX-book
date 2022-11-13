Appendix C: Howto's - various snippets for special effects
==========================================================

Archives - lists with entry titles
----------------------------------

The `[[archive_list]]` template tag insert a list of links to the (monthly) 
archive  pages for a weblog. Very often you want an archive that really 
just is a list of links to the entries grouped by month. 

Typically you will use the code below in your sidebar or footer template.

### Static list

You can do this using the `[[subweblog]]` tag:

    <ul>
    [[ subweblog name="archivelist" category="default" 
        amount=1000 ignorearchive=1 ignorepaging=1 ]]
    [[ literal ]]
    [[ assign var=year_month value=$entry.date|truncate:7:"" ]]
    [[ if $year_month != $year_month_old ]]
        [[ if !$first ]]</ul></li>[[ /if ]]
        [[* Here the month and year is outputted - modify is wanted *]]
        <li>[[ date format='%monname% %year%' ]]<ul>
    [[ /if ]]
    [[* On the line below is the actual entry link - modify is wanted *]]
    <li>[[ link ]]</li>
    [[ if $last ]]</ul></li>[[ /if ]]
    [[ assign var=year_month_old value=$year_month ]]
    [[ /literal ]]
    [[ /subweblog ]]
    </ul>

This code loops through all the entries in the category default (assuming you
have less than 1000 entries) and makes a list with all the months which has 
entries. Each item/month in the list contains a sublist with all the entries
of the month.

The problem with the list is that it takes a lot of space. You can fix that
using CSS to make it expandable and so on, but it's easier to make a dynamic
list using some JavaScript code from the Hierarchical Menus extension.

### Dynamic/expandable list

After installing the [Hierarchical Menus][2] extension, add

    <script type="text/javascript" src="[[extensions_dir]]menu/menu.js"></script>

to your header template. (You don't need to enable the extension.) Then use the 
code below. In addition to making the menu expandable, it will also open the 
month list item for the currently viewed entry.

    <ul id="archivelist" class="collapsible">
    [[ subweblog name="archivelist" category="default" 
        amount=1000 ignorearchive=1 ignorepaging=1 ]]
    [[ literal ]]
    [[ assign var=year_month value=$entry.date|truncate:7:"" ]]
    [[ if $year_month != $year_month_old ]]
        [[ if !$first ]]</ul></li>[[ /if ]]
        <li><a href="#">[[ date format='%monname% %year%' ]]</a><ul class="acitem">
    [[ /if ]]
    [[* Make the menu expand/open at the current entry's month *]]
    [[ if $pagetype == "entry" && $modifier.uid == $entry.uid ]]
        <li class="active">[[ link ]]</li>
    [[ else ]]
        <li>[[ link ]]</li>
    [[/if]]
    [[ if $last ]]</ul></li>[[ /if ]]
    [[ assign var=year_month_old value=$year_month ]]
    [[ /literal ]]
    [[ /subweblog ]]
    </ul>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            var archive = jQuery('#archivelist');
            archive.initMenu();
        });
    </script>

### Mixing month and year links

You can mix month and year links. The code below produces links for
the last six months (if you published something in those months) and follows with the remaining year links (the "weird" calculation is to show where the 6 of six months goes).

    [[ assign var=thisyear value=$smarty.now|date_format:"%Y" ]]
    [[ assign var=thismonth value=$smarty.now|date_format:"%m" ]]
    [[ assign var=stopyear value=$thisyear ]]
    [[ assign var=stopmonth value=$thismonth-6+1 ]]
    [[ if $stopmonth <= 0 ]]
        [[ assign var=stopyear  value=$stopyear-1 ]]
        [[ assign var=stopmonth value=$thismonth+12-6+1 ]]
    [[ /if ]]
    [[ if $stopmonth < 10 ]][[ assign var=stopmonth value="0"|cat:$stopmonth ]][[ /if ]]
    [[ if $stopmonth == 1 ]][[ assign var=stopyear value=$stopyear-1 ]][[ /if ]]
    <ul>Last 6 months + following years
    [[ archive_list unit='month' order='desc' start=$stopyear|cat:"-"|cat:$stopmonth format='<li><a href="%url%">%st_monname% %st_year%</a></li>' ]]
    [[ archive_list unit='year' order='desc' end=$stopyear|cat:"-00" format='<li><a href="%url%">%st_year%</a></li>' ]]
    </ul>

Insert a random image from a folder
-----------------------------------

With this snippet you'll be able to place images in a folder, and insert a 
random image from that folder everytime the page is requested by a browser. 

Create a new folder to your `images/` folder, and add some images to it. In 
this example we've used `randompics` as the name of the folder. 

In your template, add the following code: 

    [[php]]

    $foldername = "randompics";
    $width = 320;
    $height = 240;

    // -------------

    $path = realpath("../images/".$foldername);

    if (empty($path)) {
       echo "<!-- Path $foldername does not exist. -->";
    } else {

       $files = array();

       $d = dir($path);
       while (false !== ($entry = $d->read())) {
          if (in_array(getextension($entry), array('jpg','jpeg','png')) && (strpos($entry, ".thumb.")==0) ) {
              $files[] = $entry;
          }
       }
       $d->close;
       
       shuffle($files);

       printf("<img src='/pivotx/includes/timthumb.php?src=/images/%s/%s&w=%s&h=%s' />", 
            $foldername, $files[0], $width, $height);

    }

    [[/php]]

After you've done this, a random image with `<img />` will be inserted on the 
page. In the top part of the script, you can customize the foldername and the 
width and height of the resulting image. The image is passed through the 
thumbnailer to ensure that all images are consistently displayed on your site. 
    
<p class="note" markdown="1">**Note:** Remember to set `allow_php_in_templates` 
to `1` in Advanced Configuration, to make this snippet work. Otherwise the 
`[[php]]` tag will be ignored by PivotX. </p>

Making a weblog with a 'Sticky' entry at the top
------------------------------------------------

This snippet will show you how to create a page that has one specific entry that
'sticks' to the top of the page. If the administrator posts another entry that 
has to be sticky, it replaces the older one, and the older one will be shown 
amongst the 'regular' entries, lower on the page. 

<p class="note" markdown="1">**Note:** For this snippet to work, you need to have 
the [Bonusfields extension][1] installed. If you use a flat file database, you
need PivotX 2.3.5 or newer.</p>

First, you'll have to create an extrafield to keep track if posts that have to 
be sticky. Create a bonusfield checkbox called `Sticky` with an internal name 
of `sticky`. Set the `Extra Type Information` to `1`. After this, edit an entry 
or write a new one, and check the Sticky checkbox. 

Now you will need to edit your frontpage template to make sure that you'll 
always get one sticky entry, and then some other ones. 


    <!-- begin of weblog 'sticky' -->
    [[ subweblog name="sticky" amount="1" ignorepaging="1" orderby="extrafields_sticky" ]][[ literal ]]
    
    <div class="sticky">
    <h2><a href="[[ link hrefonly=1 ]]">[[ title ]]</a></h2>
    [[introduction]]
    </div>
    
    [[ /literal ]][[ /subweblog ]]      
    <!-- end of weblog 'sticky' -->
    
    
    <!-- begin of weblog 'standard' -->
    [[ subweblog name="standard" ]][[ literal ]]
    
    [[ if !$entry.extrafields.sticky || $stickydone ]]
    
        <h2><a href="[[ link hrefonly=1 ]]">[[ title ]]</a></h2>
        [[introduction]]
        (.. the rest of the entry goes here ..)
    
    [[ else]]
        [[ assign var=stickydone value=1]]
    [[/if]]
    
    [[ /literal ]][[ /subweblog ]]
    <!-- end of weblog 'standard' -->

**How it works:**

You'll notice that we have two `[[subweblog]]` tags. The first 
one gets the first available entry which is set to sticky. The second 
`[[subweblog]]` gets entries in a normal way, but we skip the first sticky one. 
In the first `[[subweblog]]` you see the parameter `orderby="extrafields_sticky"`. 
This makes sure that we only get entries with the sticky extrafield set. because 
we also set `amount="1"` and `ignorepaging="1"`, we make sure we get only the 
most recent one.

The second `[[subweblog]]` uses the settings for `amount` and `category` that 
are set in the Weblogs settings. The only thing we do here, is that we check 
inside the `[[subweblog]]` tag, if we have to skip the entry that's currently 
being processed. The `[[if]]` statement checks whether the sticky extrafield 
is set, and whether or not we've already skipped a sticky entry. The `[[else]]` 
statement sets `$stickydone`, to make sure we skip only one sticky entry maximum. 

Word count
----------

This is a simple snippet that counts the number of words in your introduction and/or body text.

<p class="note" markdown="1">**Note:** Remember to set `allow_php_in_templates` 
to `1` in Advanced Configuration, to make this snippet work. Otherwise the 
`[[php]]` tag will be ignored by PivotX. </p>

Include the following code in your template:
(this code counts only the words in an introduction)

    [[introduction]] 
    [[ php ]]
    $vars = $this->get_template_vars();
    $introduction = count(str_word_count($vars['entry']['introduction'], 1));
    echo $introduction." words";
    [[ /php ]]
    <!-- if you want to count the words in your [[ body ]] text, change the 'introduction' texts to 'body' -->

Optional:
If you want to count all words (introduction + body), do this:

    [[introduction]] 
    [[ php ]]
    $vars = $this->get_template_vars();
    $wordcount = count(str_word_count($vars['entry']['introduction'].$vars['entry']['body'], 1)); 
    echo $wordcount." words";
    [[ /php ]]

How to add a special something per category within a subweblog
--------------------------------------------------------------

A simple way to add an extra text or an image per specific category within a subweblog.

Suppose that you have a subweblog called 'news'. It shows entries from
multiple categories like 'sports','weather', 'politics'. Your code would be
similar like this: (in this example the amount of items and the categories are
set in your weblog configuration)

    [[ subweblog name='news' ]][[ literal ]]
    
    <h2><a href='[[ link hrefonly=1 ]]'>[[ title ]]</a></h2>
    [[ introduction ]]
    [[ more ]]
    
    [[ /literal ]][[ /subweblog ]]

Now you would like to add a nice category related image to every entry in the
'sports' category. Place the following code within your [[ subweblog ]]:

    [[ if in_array('sports', $category) ]]<img src='picture-of-an-athlete.jpg' /> [[ /if ]]

Your complete code will look like this:

    [[ subweblog name='news' ]][[ literal ]]
    
    [[ if in_array('sports', $category) ]]<img src='picture-of-an-athlete.jpg' /> [[ /if ]]
    <h2><a href='[[ link hrefonly=1 ]]'>[[ title ]]</a></h2>
    [[ introduction ]]
    [[ more ]]
    
    [[ /literal ]][[ /subweblog ]]

What does this do exactly?
You just added a nice piece of Smarty code that checks if an entry has the
category 'sports' in the array. If it does, the image named
'picture-of-an-athlete.jpg' will be added to that entry. If it doesn't,
nothing happens.

Optional:
Add a different image to all three categories? Do it like this:

    [[ subweblog name='news' ]][[ literal ]]
    
    [[ if in_array('sports', $category) ]]<img  src='picture-of-an-athlete.jpg' /> [[ /if ]]
    [[ if in_array('politics', $category) ]]<img    src='picture-of-dick-cheney.jpg' /> [[ /if ]]
    [[ if in_array('weather', $category) ]]<img     src='picture-of-a-cloud.jpg' /> [[ /if ]]
    <h2><a href='[[ link hrefonly=1 ]]'>[[ title ]]</a></h2>
    [[ introduction ]]
    [[ more ]]
    
    [[ /literal ]][[ /subweblog ]]


How to show entries in a subweblog published only 'this month'.
---------------------------------------------------------------

Normally a subweblog shows entries in chronological order and you set a number
of entries you want to display. With the snippet below you can tell your
subweblog to show only entries from the current month. And it's really simple!

Add the following code where you want your 'this month'-subweblog to appear

    [[ assign var=startmonth value=$smarty.now|date_format:"%Y-%m-01-00-00" ]]
    [[ subweblog category='*' start=$startmonth order='asc' ]][[ literal ]]
    
    <h2><a href='[[ link hrefonly=1 ]]'>[[ title ]]</a></h2>
    [[ introduction ]]
    [[ more ]]
    
    [[/literal]][[/subweblog]]

How to trim text after a given number of characters
---------------------------------------------------

You can trim text to a given number of characters in, for instance, an
introduction text. Normally you use `[[introduction]]` to display the intro
text. In your HTML this displays:

    <p>Hello I am an introduction</p>

If you break off your text with the 'trimlen' parameter to the
introduction text like this:

    <p>[[ introduction | strip_tags | trimlen:10 ]]</p>

Your HTML will look like this:

    <p>Hello I am</p>

The 'strip_tags' has to be used to remove all HTML code from your text. 
That's why you put the `<p>` tags around your snippet. If you don't add 
the 'strip_tags' parameter, your HTML will break because the closing 
`</p>` tag won't show up.

You want to strip the html-tags, but not all of them?
You can specify which HTML tags you do want to show:

    [[introduction|strip_tags:false:'<strong><em>']]


Automatically generated meta tags
---------------------------------

How to generate the 'description', 'keywords', and 'author' meta tags using the content of your site.

**Description tag:**
The following code displays the first 130 characters of your introduction text
in your 'description' tag. (entry or page alike)

    <meta name='description' content='[[ $entry.introduction|strip_tags|trimlen:130:'..' ]]' />

**Keywords tag:**
The following code adds keywords (tags) from your entry or page to the
'keyword' tag and seperates them with a comma.

    <meta name='keywords' content='[[ $entry.keywords|replace:' ':', ' ]]' />

**Author tag:**
Adds the author of an entry or a page to the 'author' meta tag.

    [[ if $pagetype=='entry' || $pagetype=='page' ]]
    <meta name='author' content='[[ user ]] - [[ sitename ]]'>
    [[ else ]]
    <meta name='author' content='[[ sitename ]]'>
    [[ /if ]]

How to make a simple event calendar
-----------------------------------

This article describes how you can turn a subweblog into an event calendar
with a publishdate and an expirationdate. In order to make the calendar work
we need to add some extra's and configure your PivotX install. I.e. a list of
entries (events in this example) ordered by the date of that event.

**Step 1** - install the [Bonusfields extension][1] (if you aren't already using it).

**Step 2** - you need to add a date field to your entries.
In Bonusfields, create a field called 'eventdate', type 'date', location 'Entry-before category'

**Step 3** - Create a new category called 'events'.
You can do this in administration > categories

**Step 4** - Editing your template to display a calendar.
Now we get to the template part. The code of the event calendar looks like a
normal subweblog but you have to add some magic. This is the complete code:

    [[ assign var=today value=$smarty.now|date_format:"%Y-%m-%d-00-00" ]]
    
    <!-- begin of weblog 'events' -->
    [[ subweblog name='events' category='events' start=$today
        orderby='extrafields_eventdate' order='asc' amount='10' ]]
    [[ literal ]]
    
    <h1><a href='[[ link hrefonly=1 ]]'>[[ date 
        format="%dname%. %ordday% %monthname% '%ye%" 
        date=$extrafields.eventdate ]]</a></h1>

    <h2>[[ title ]]</h2>
    <h3>[[ subtitle ]]</h3>
    [[ introduction ]]
    [[ more ]]
    
    [[ /literal ]]
    [[ /subweblog ]]
    <!-- end of weblog 'events' -->

**Step 5** - Creating a new entry
Now assign the template you just created to a weblog and create a new entry
like you normally would do. You will notice one addition: the new 'eventdate'
field in the right column just before the category list in your entry editor.
If you click om the event date field a small calendar pops up, where you can
select the date of the event. Now select 'events' as a category and publish
your event.

Have a look at your newly created event calender. The event you just created
now automatically dissapears from your subweblog when the event date is due.
The event isn't deleted from your database, it just doesn't appear in your
subweblog anymore.


Make your own 'read more' link on a entry or page
-----------------------------------

This bit of code shows a 'read more' link on a page that has more than 10
characters in the body, if the 'body' is longer than, say, 10 characters. We
check for a small number, but greater than '0', because we do not want 'false
positives' where the body contains nothing but `&nbsp;` or `<p></p>`.

    [[ if strlen($page.body)>10 ]]
    <p><a href="[[$page.link]]">[[t]]More[[/t]]</a></p>
    [[/if]]

Do you want to use this on a page instead of an entry? Replace 'page' for 'entry' and you're done.



Show an image or a text if a certain extrafield/bonusfield is empty or has a certain value.
-----------------------------------

You can use these examples for anything to do with showing or hiding elements when you use the
bonusfields.

For example, you want to show an image from a dog when someone selects 'dog' in a dropdown
bonusfield.

Make sure you have a bonusfield with a dropdown that has the value 'dog'. The bonusfield is
called 'animal' and you want to use it on a page.


    [[ if $page.bonusfields.animal=="dog" ]]
    <img src="/images/dog.jpg" alt="big brown dog" />
    [[ /if ]]

Another example, when a textfield is empty, you want to show the words 'no location is known yet'.

Make sure you have a bonusfield that is called 'location' and you want to use it on an entry. You want to
show the text when the location-textfield is empty:

    [[ if $entry.bonusfields.location=="" ]]
    <p>No location is known yet </p>
    [[ /if]]

And if there is a location, you want to show it in a div with some details:

    [[ if $entry.bonusfields.location!= "" ]]
    <div class="location">
    [[$entry.bonusfields.location]]

    <span class="details">
    [[$entry.bonusfields.location_details]]
    </span>

    </div>
    [[ /if]]

For this you got to have the [Bonusfields extension][1] installed. 
For more information on built-in Smarty functions, like 'if', 
read [the Smarty Documentation](http://www.smarty.net/docsv2/en/language.function.if).



Giving every page an unique id
-----------------------------------

Giving every page a unique id gives you the opportunity to add custom CSS for a certain page, entry or
chapter of category.

In your HTML:

    <body id="page_[[$modifier.uri]]">

In your CSS:

    #page_contact {
        background: red;
    }


`[[$page.uri]]` or `[[$entry.uri]]` = Gets the URI for the current page or entry.

`[[$entry.category.0]]` = Gets the category name (always gets the first category only, even if the entry has multiple categories)

`[[ $page.chaptername ]]` = Gets the Chaptername for the current page.



Showing images just the way you want
-----------------------------------
Pivotx has got a very nice php image resizer, and it can do more than just that. It can resize and also apply
effects to images.

For this you got to have the 'extra image field' extension, or the 'gallery extension' enabled. Both are
included in every PivotX installation. You can use it with the bonusfields too.

We start with resizing an image in an entry. With this code we resize an image and make it 100px high. It
does keep the relationship.

    [[ if $entry.extrafields.image!="" ]]
    <img src="[[pivotx_dir]]includes/timthumb.php?src=[[$entry.extrafields.image]]&amp;h=100"
    alt="[[$entry.extrafields.description]]" />
    [[ /if ]]

You can also make it 100px high and 100px wide. Now the image will be cropped if needed:

    [[ if $entry.extrafields.image!="" ]]
    <img src="[[pivotx_dir]]includes/timthumb.php?src=[[$entry.extrafields.image]]&amp;w=100&amp;h=100"
    alt="[[$entry.extrafields.description]]" />
    [[ /if ]]

You can also show an image in black and white:

    [[ if $entry.extrafields.image!="" ]]
    <img src="[[pivotx_dir]]includes/timthumb.php?src=[[$entry.extrafields.image]]&amp;f=2"
    alt="[[$entry.extrafields.description]]" />
    [[ /if ]]

Or give an image a certain jpg image quality:

    [[ if $entry.extrafields.image!="" ]]
    <img src="[[pivotx_dir]]includes/timthumb.php?src=[[$entry.extrafields.image]]&amp;q=75
    alt="[[$entry.extrafields.description]]" />
    [[ /if ]]

There are two options to making the thumbnail fit in the given widht and
height: the 'zc' and 'fit' parameters. Zc(zoomcrop) is enabled by default, and
it will always make the image fit in the given width and height, by cropping
the image if needed. This will lietrally cut off parts of the image, so if you
do not want this, set `zc=0`:

    <img src="[[pivotx_dir]]includes/timthumb.php?src=[[$entry.extrafields.image]]&amp;w=100&amp;h=100&amp;zc=0
    alt="[[$entry.extrafields.description]]" />

Similarly, the 'fit' parameter makes an image fit within the given width and
height, potentially making the result smaller, as long as the image fits
within the given constraints. Use this by setting `fit=1`:

    <img src="[[pivotx_dir]]includes/timthumb.php?src=[[$entry.extrafields.image]]&amp;w=100&amp;h=100&amp;fit=1
    alt="[[$entry.extrafields.description]]" />

You can also use the built-in thumbnailer for a gallery (make sure the gallery and fancybox are both activated):

    <div class="gallery">
    [[gallery popup="fancybox"]]
        <a href='%imageurl%%filename%' class="fancybox" title="%title%" rel="gallery-%uid%" >
        <img src="%pivotxurl%includes/timthumb.php?src=%filename%&amp;w=100&amp;h=100" alt="%alttext%" />
        </a>
    [[/gallery]]
    </div>

You'll notice that we're using `&amp;` instead of `&`, because otherwise the page does not validate.

More information about resizing and images you can find right here, on the
[project page for TimThumb](http://www.binarymoon.co.uk/projects/timthumb/).


[1]: http://extensions.pivotx.net/entry/17/bonusfields "Download the Bonusfields extension from extensions.pivotx.net"
[2]: http://extensions.pivotx.net/entry/33/menu "Download the Hierarchical Menus extension from extensions.pivotx.net"
