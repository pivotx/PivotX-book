# Appendix H: Coding Standards

These guidelines are based on the [Code Conventions for the Java Programming Language][1]
and on the [Pear Naming Conventions][2].

## Indenting and Line Length

Four spaces should be used as the unit of indentation.

Avoid lines longer than 80 characters, unless you feel it will degrade legibility.
In most cases, adding extra linebreaks will make the code more legibly, especially
when using long function calls: 

    <?php  
        printf("The %s is stuck to the %s, and now we have to pry it offusing a %s",  
            $variable1,  
            $variable2,  
            $variable3  
        );  
    ?>

## Control Structures

These include if, for, while, switch, etc. Here is an example if statement, since
it is the most complicated of them: 

    <?php  
        if ((condition1) || (condition2)) {  
            action1;  
        } elseif ((condition3) && (condition4)) {  
            action2;  
        } else {  
            defaultaction;  
        }  
    ?>

Control statements should have one space between the control keyword and opening
parenthesis, to distinguish them from function calls. 

You are strongly encouraged to always use curly braces even in situations where
they are technically optional. Having them increases readability and decreases
the likelihood of logic errors being introduced when new lines are added. 

For switch statements: 

    <?php  
    switch (condition) {  
        case 1:  
            action1;  
            break;  
      
        case 2:  
            action2;  
            break;
            
        default:  
            defaultaction;  
            break;  
    }  
    ?>

You should always use parenthesis, even if they are 'optional'. 

This is wrong: 

    if ($something) $title = "Pompidom"

This is right: 

    if ($something) { $title = "Pompidom"; }

## Function Calls

Functions should be called with no spaces between the function name, the opening
parenthesis, and the first parameter; spaces between commas and each parameter, and
no space between the last parameter, the closing parenthesis, and the semicolon.
Here's an example: 

    <?php  
    $var = foo($bar, $baz, $quux);  
    ?>

As displayed above, there should be one space on either side of an equals sign
used to assign the return value of a function to a variable. In the case of a
block of related assignments, more space may be inserted to promote readability: 

    <?php  
    $short         = foo($bar);  
    $long_variable = foo($baz);  
    ?>

## Function Definitions

Function declarations follow the _one true brace_ convention: 

    <?php  
    function fooFunction($arg1, $arg2 = '') {  
        if (condition) {  
            statement;  
        }  
        return $val;  
    }  
    ?>

Arguments with default values go at the end of the argument list. Always attempt to return a meaningful value from a function if one is appropriate. Here is a slightly longer example: 

    <?php  
    function connect(&$dsn, $persistent = false) {  
      
        if ([is_array][4]($dsn)) {  
            $dsninfo = &$dsn;  
        } else {  
            $dsninfo = DB::parseDSN($dsn);  
        }  
        if (!$dsninfo || !$dsninfo['phptype']) {  
            return $this->raiseError();  
        }  
        return true;  
    }  
    ?>

## Comments

Complete inline documentation comment blocks (docblocks) must be provided. Further
information can be found on the phpDocumentor website. 

Non-documentation comments are strongly encouraged. A general rule of thumb is
that if you look at a section of code and think .Wow, I don't want to try and
describe that., you need to comment it before you forget how it works. 

C style comments (`/* */`) and standard C+ + comments (`//`) are both fine. Use of
Perl/shell style comments (`#`) is discouraged. For simple comments use the `//`
notation, and for larger comments the block style definition. 

Good comments do not only describe 'what' or 'how', but more importantly 'why'.
Do not overdo commenting. Stating the obvious will just make the code larger and
less easy to read. 

Bad (because it states the obvious):

    // Increase $counter  
    $counter++;

Good:

    // Increase $counter, to keep track of the row that's being processed  
    $counter++;

All functions should have a phpdoc style comment block.

## Including Code

Anywhere you are unconditionally including a class file, use `require_once`. Anywhere
you are conditionally including a class file (for example, factory methods), use
`include_once`. Either of these will ensure that class files are included only once.
They share the same file list, so you don't need to worry about mixing them - a
file included with `require_once` will not be included again by `include_once`. 

  

<p class="note" markdown="1">Note: `include_once` and `require_once` are statements,
not functions. Parentheses should not surround the subject filename. </p>


## PHP Code Tags

Always use `<?php ?>` to delimit PHP code, not the `<? ?>` shorthand. This is required
for PEAR compliance and is also the most portable way to include PHP code on
differing operating systems and setups. 

## Example URLs

Use `www.example.com`, `www.example.org` and `www.example.net` for all
example URLs and email addresses, per RFC 2606. 

## Naming Conventions

### Classes

Classes should be given descriptive names. Avoid using abbreviations where possible.
Class names should always begin with an uppercase letter. The PEAR class hierarchy
is also reflected in the class name, each level of the hierarchy separated with
a single underscore. Examples of good class names are: 

*   `Log`

*   `Net_Finger`

*   `HTML_Upload_Error`

### Functions and Methods

Functions and methods should be named using the "studly caps" style (also referred
to as "bumpy case" or "camel case"). Functions should in addition have the
package name as a prefix, to avoid name collisions between packages. The initial
letter of the name (after the prefix) is lowercase, and each letter that starts a
new "word" is capitalized. Some examples: 

*   `connect()`

*   `getData()`

*   `buildSomeWidget()`

*   `XML_RPC_serializeData()`

Private class members (meaning class members that are intended to be used only
from within the same class in which they are declared; PHP 5 does not support
truly-enforceable private namespaces) are preceded by a single underscore. For
example: 

*   `_sort()`

*   `_initTree()`

*   `$this._status`

Note: The following applies to PHP5.

Protected class members (meaning class members that are intended to be used only
from within the same class in which they are declared or from subclasses that
extend it) are not preceded by a single underscore. For example: 

*   `protected $somevar`

*   `protected function initTree()`

### Constants

Constants should always be all-uppercase, with underscores to separate words.
Prefix constant names with the uppercased name of the class/package they are
used in. For example, the constants used by the `DB::` package all begin with `DB_`. 

Note: The true, false and null constants are excepted from the all-uppercase rule, and must always be lowercase. 

### Global Variables

If your package needs to define global variables, their name should start with
a single underscore followed by the package name and another underscore.
For example, the PEAR package uses a global variable called `$_PEAR_destructor_object_list`. 

  
## File Formats

*   Use utf-8 for strings, but not for the file itself - avoid the BOM.  
    
*   Use only linefeeds (`\n`) and no carriage returns (`\r`)

There should be one line feed after the closing PHP tag (`?>`). This means that
when the cursor is at the very end of the file, it should be one line below the
closing PHP tag.

 [1]: http://java.sun.com/docs/codeconv/ "Code Conventions for the Java Programming Language"
 [2]: http://pear.php.net/manual/en/standards.naming.php "Pear Naming Conventions"
 [3]: http://www.php.net/printf
 [4]: http://www.php.net/is_array
 [5]: http://www.example.com/ "http://www.example.com"
 [6]: http://www.example.org/ "http://www.example.org"
 [7]: http://www.example.net/ "http://www.example.net"
