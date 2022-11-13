# Appendix F: Frequently Asked Questions

On this page you will find issues that are encountered by PivotX users more
often, so they are collected here. 

  
## Why doesn't `[[php]]` work?
The `[[php]]` tag is disabled by default, for security reasons. If you want to
enable it, go to Administration &#187; Advanced configration, add a key named
`allow_php_in_templates` with the value of `1`. Now your `[[php]]` tags will work.

   
## I've added a category, but it doesn't show up on my weblog. It isn't hidden, so why does this happen?

Just *having* a category isn't enough to make it shown in a weblog. The weblog
itself must be configured to *publish* the category. Go to Administration &#187; Weblogs &#187;
Edit your weblog &#187; tab 'Subweblogs'. After you've selected the new category
to be published, it will show up on your weblog.

## My stylesheets don't load / PivotX looks messed up!

Make sure you've read the page [Appendix e: Troubleshooting PivotX][1]. If the
solution to your problem isn't there, please post a message on [our forum][2],
and we'll help you if we can.   

## The end of my HTML sourcecode says "`<!-- PivotX feels unloved.. :-( -->`". Why?

We make PivotX for Free. It's yours to do with as you please, but the only thing
we ask in return, is that you place a link to `http://pivotx.net` on your pages.
It can be as big or small as you like, in whatever way it best fits your design..
But, please put in that small link somewhere, so PivotX feels the love. :-)

## I've locked myself out of PivotX, and now I'm banned. How do I remove the ban?

Log in with your FTP client, and delete the file `pivotx/db/ser_logins.php`, and
you can login again, with the correct password. If you do not know your password,
request a new one on the login screen. 

## I've upgraded PivotX, and now all I'm getting is an error like this: "`
Parse error: syntax error, unexpected T_OBJECT_OPERATOR in /sitename/pivotx/foobar.php on [..]`". What gives?

Your server is probably running on an old version of PHP. Since PHP 4 isn't supported anymore, you should really ask your host to upgrade. Download the [PivotX Check scripts][3], to verify that the version of PHP is indeed the problem, and then give this information to your webhoster.

## I get a "`500 Internal Server Error`" when using the PivotX example `.htaccess` file. Why?

The problem is that many servers have disallowed the usage of the `php_flag`
directive. Uncomment or remove the three lines in the `.htaccess` file that starts
with `php_flag` and the error should be gone.

 [1]: /page/app-e/ "Appendix E: Your friend PHPinfo"
 [2]: http://pivotx.net "our forum"
 [3]: http://pivotx.net/files/misc/pivotx-check.zip
