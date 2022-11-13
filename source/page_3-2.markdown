# 3.2 Extension Meta Information

PivotX searches through the pivotx/extensions/ folder, automatically adding all extensions 
it finds to the admin-screens for Extensions and Widgets, where you can enable or disable them.

These screens also display certain information about the extensions it has found. It does 
this by reading the Meta Information that should come with every extension. Every extension ought to 
have at least one 'entry point', the name of which should be snippet\_extensionname.php, 
hook\_extensionname.php, widget\_extensionname.php or admin\_extensionname.php, where 'extensionname' 
should be the name of the extension. 

When PivotX indexes the pivotx/extensions/ folder, all files with matching filenames will be 
added to the internal list of available extensions, and they will be read to parse and display 
the meta-information in these files. This meta information is actually nothing more 
than a PHP comment block with a specific format. For example, the meta information in 
mobile/snippet_mobile.php looks like this: 

    // - Extension: Mobile Browser Extension  
    // - Version: 0.5  
    // - Author: PivotX Team  
    // - Email: admin@pivotx.net  
    // - Site: http://www.pivotx.net  
    // - Description: A snippet extension to detect mobile browsers, and ...  
    // - Date: 2009-02-22  
    // - Identifier: mobile  
    // - Required PivotX version: 2.1.0  
    

Every line with meta information looks like this:

    // - [Key]: [Value]

Where 'Key' is one of a certain set of predefined keys which can contain information. The 
'value' is the value of the preceding key, and the possible values depend on the type of the 
key. One fixed limitation is that a value must always be on one line, immediately following 
the key.

Some of the key/value pairs are required. If they're missing, your extension won't work, or 
it won't be accepted in the Extensions gallery on extensions.pivotx.net. Some other key/value 
pairs are optional, and some others still are required under certain conditions (like the 'Required 
database' key). 

  
The required keys are:

  
*   **Extension** - The name of the extension as it will be shown and used in the PivotX backend. 
*   **Version** - The version of the extension. You can use version numbers like '2.0', '1.0 beta 1' 
or '0.9 preview' (without the quotes). As a general guideline, you should number test-releases as '0.1', 
'0.2' etc., and the first stable release of your extension should be '1.0' (again, without the quotes).
*   **Author** - The author of the extension. 
*   **Email** - A working contact address of the author or maintainer of the extension. 
*   **Description** - A short description of 150 characters or less of the extension.
*   **Date** - The date of THE CURRENT release. This should be updated for every single release of 
the extension. This should always be in the format YYYY-MM-DD, so May 26th 2010 is written as 2010-05-26.
*   **Identifier** - This is the (unique) identifier of an extension used internally to enable/disable 
extensions. If you wish your extension to be published on the extensions website, make sure that the 
identifier is unique. Valid characters are [a-z0-9_-]. 
*   **Required PivotX Version** - This is the minimal version of PivotX that is required to run the extension.

  
The optional keys are:  
  
*   **Site** - The URL of the homepage of the extension, if there is one.
*   **First release date** - The date of the first release of the extension. This should always 
be in the format YYYY-MM-DD, so May 26th 2010 is written as 2010-05-26.
*   **Required database** - If the extension only works on MySQL or if it only works on Flat Files 
databases, use either the value 'MySQL' or 'Flat Files'. If this key is omitted, the extension 
has to work on both types of DB.
*   **Dependencies** - If the extension relies on other extensions you can provide a list of 
extension identifiers, separated by comma's. 

  
You can use other keys, but they will be ignored by PivotX. They won't break anything either, though.
