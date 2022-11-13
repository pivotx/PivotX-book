# 2.1 How templates work

In order to customize PivotX, you will need to customize its templates. In the 
following manual you will be taken through a step-by-step explanation on how to create 
your own PivotX Templates. A fairly good knowledge of HTML is advised.
  
PivotX uses the Smarty template language. This template code is recognizable 
as [[ code ]].  
  
## What are templates?
Templates are the HTML coded pages that define the look of your information. 
The content of a weblog might still be the same, but by changing the templates 
for a weblog you can change the layout, colors, fonts, images etc of your website. 
  
Put in short: Weblog content + weblog template = viewable site in your browser  
  
### Location of the templates

The templates folder can be found at: PivotX &rsaquo; Templates &rsaquo; [name of theme]-folder.  
  
## Starting a complete new set of PivotX templates

### Start with the basics

First, create your layout as a static HTML page. For instance, you can create
the frontpage and a subpage of your website. You can add all elements that you
wish to have in your final template, while keeping it in static HTML for the time being. This is a good way to 
ensure the styling of your template is right.
  
When you're happy with your layout you can start transferring 
the code to new template files.  
  
### Creating a template folder

Create a new folder inside the 'templates' folder. Eventually you'll (at least) 
want to create the following basic templates in that folder:
 
*   Frontpage-template  
*   Entry-template
*   Page-template
*   Search-template
*   Archivepage-template

### Turning your HTML into a template

The easiest way to start with your brand new template is to compare a standard 
template (for instance, the 'Bare bones' frontpage template) with your own 
static HTML frontpage. 

What you will spend most of your time doing is replacing pieces of (fake)content in your original HTML 
page with the specific Smarty tags that will insert the right PivotX content.  
  
[Let's see what the Bare Bones templates look like...][1]

 [1]: /page/2-2 "Let's see what the Bare Bones frontpage-template looks like..."
