# 3.1 The different types of extensions

In PivotX there are four types of extensions:

1.  Snippet extensions that define new (Smarty) template tags.
2.  Hook extensions that add functionality to a PivotX website or to the PivotX backend 
using hooks inside the PivotX core or internal templates.
3.  Widget extensions that add a widget to a PivotX website.   
    
4.  Admin Interface extensions that add administration pages for extensions to the PivotX 
backend.

Some extensions are pure snippet extensions and others are pure hook extensions, but very 
often and extension will contain a snippet, a hook and maybe even an admin part.  


## Snippet extensions
Snippet extensions are maybe most common since they add new features to the templating language. 
The output of a snippet is (X)HTML. A snippet maybe used to insert some static HTML code easily 
or to extract some live data from PivotX which might be hard (or impossible) to do with the 
standard snippets / template tags.

  
## Hook extensions

Hook extensions are used when you want to modify the (X)HTML produced by PivotX from the templates 
without modifying the templates. Typically hooks are used to insert some Javascript code in the 
head or at the end of the body - an example might be to add Google Analytics tracking code.  


## Widget extensions

Widgets are displayed where the widgets template tag is inserted. So again, you can modify the 
(X)HTML produced by PivotX without modifying the templates.  


## Admin extensions

Admin extensions typically add a configuration screen for the other extensions to the PivotX 
backend and therefore don't make much sense alone.
