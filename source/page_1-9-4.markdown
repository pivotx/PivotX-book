# 1.9.4. Getting your feet wet with Templates

<a href="/images/1-9-4.png" class="fancybox"><img src="/images/1-9-4.png" width="300"
  alt="Screenshot" /></a>   
*The picture above shows the template files of the default PivotX theme called 'Skinny'*.

 [1]: http://docs.google.com/File?id=dgf95wcb_351gww7bdf7_b
 
 Theme folder contents

A basic theme consists of the following files:

 - _sub_header.html
 - _sub_sidebar.html
 - _sub_footer.html
 - frontpage_template.html
 - entrypage_template.html
 - page_template.html
 - archivepage_template.html
 - search_template.html
 - style.css
 - a folder named 'images'

###The _sub files

A theme folder contains some files starting with _sub. These are files that are included in your normal pages like your header, footer and sidebar. You include them with `[[ include file="themefolder/_sub_header.html" ]]`.

**1. _sub_header.html**

This is the header file included in all pages of your theme. The header contains
all standard header information and the first part of the <body> section, used 
on all pages including the navigation part.
Please add 

	<link href="[[ template_dir base="true" ]]pivotx_essentials.css" rel="stylesheet" type="text/css" media="screen" />


to your header. This CSS file contains some basic markup PivotX uses. If you wish 
to alter the standard PivotX CSS, overwrite rules in your own CSS file.
Remember: When PivotX gets updated, `pivotx_essentials.css` will be overwritten.

**2. _sub_sidebar.html**

The sidebar also appears on all pages (in this example at least). If you have multiple sidebars you can include a `_sub_sidebar_left.html` and a `_sub_sidebar_right.html` for example. If your theme doesn't have a sidebar you can leave it out.

**3. _sub_footer.html**

The footer contains the body and html closing tags and you can add some info here, lik ethe name of the author and, of course, a link to PivotX.net
The page files

A basic theme consists of a frontpage, an entrypage, a generic page, an archivepage and a search page. You can use the frontpage template as an archivepage but we choose to duplicate it and name it 'archivepage' so it's clear which file to choose when users setup and configure their site.

**4. frontpage_template.html**

This is it, the main template of your website. The frontpage contains your [[subweblog]], page navigation (if you want to).

**5. entrypage_template.html**

This is the template used for single entries and contains the stuff needed for commenting, page navigation etc.

<p class="note" markdown=1">Important: please include the standard commentform. Use this tag: [[commentform]] instead of non-standard commentform code so all options keep intact and users can choose their spam protection.</p>

**6. page_template.html**

This template is used for pages. It can contain the same stuff as your entrypage except the commenting part (you can't comment on pages)

**7. archivepage_template.html**

This template defines the look of your archives. It needs a subweblog so PivotX can get a list of entries from the database. This template can be identical to the frontpage.

**8. searchpage_template.html**

The page that shows search results. This template needs the [[ content ]] tag to show the search results.
Other files and folders

**9. style.css**

You can name this file after the name of your theme as you wish. You have to include `pivotx_essentials.css` too. PivotX needs this file for the markup of the standard elements, like the search box and the comment forms. Your stylesheet should load after pivotx_essentials is loaded. So put the link to your css file after the link to `pivotx_essentials.css`.

**10. The images folder**

This is the folder where you put all the graphics used in your theme.


Compatibility and validation

Themes published on Themes.PivotX.net should be thoroughly tested on different browsers. If you develop themes on a Windows platform, test your theme in Internet Explorer 6/7/8, Safari, Firefox, Chrome and Opera. If you work on a Mac, test your themes in Safari and Firefox. Your website should behave the same with all browsers. We prefer testing on both Mac and Windows platforms of course.
We know this is a lot of work and we will do some tests of our own. So if you are unable to test your theme then we will do that for you. But if you are able to do the testing yourself it would save us a lot of work.

Last but not least we advice to check your HTML and CSS with the W3C validation service. The W3C CSS Validation service enables you to check your CSS code for validity, and warns you if you are using browser specific code.
