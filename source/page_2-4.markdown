# 2.4. Template Tags

PivotX uses [Smarty][1] for its template engine. So if you'd like to get deeper into the PivotX 
templates, it's suggested that you familiarize yourself with Smarty. Get the documentation here: 

*   [http://www.smarty.net/crashcourse.php][2]

*   [http://www.smarty.net/manual/en/][3] (especially the [For Template Designers][4] part is relevant)

Everything that works with Smarty will work in PivotX templates. Just keep in mind that we use 
different delimiters, so you should use [[tag]] instead of {tag}. 

Currently, there's only a single page documenting some of the new tags that were introduced in PivotX 2. 
Later, this page will contain all information on how to write, edit and organize your templates.   


## Template Tags

As mentioned above, PivotX uses Smarty as the template language. This means that there are two types
of tags - functions and blocks. 

**Functions** - template tags that accept (optional) parameters controlling the output of the 
tag. The general syntax is

    [[ tag_name para_name1="some value" para_name2="some value" ... ]]

**Blocks** - template tags that come in pairs, an opening and closing tag pair, defining a block. The content 
of the block is passed to the template tag. The opening tag can take optional parameters. The general syntax is 

    [[ tag_name para_name1="some value" ... ]]  
        Some text  
        Some text  
        Some text  
    [[ /tag_name ]]

All of the tags are described in detail in [Appendix B: List of Template Tags][5].

 [1]: http://smarty.php.net "http://smarty.php.net"
 [2]: http://www.smarty.net/crashcourse.php "http://www.smarty.net/crashcourse.php"
 [3]: http://www.smarty.net/manual/en/ "http://www.smarty.net/manual/en/"
 [4]: http://www.smarty.net/manual/en/smarty.for.designers.php "http://www.smarty.net/manual/en/smarty.for.designers.php"
 [5]: /page/app-b/ "Appendix B: List of Template Tags"
