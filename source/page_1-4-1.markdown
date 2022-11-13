# Writing Entries and Pages 

## 1.4.1.1 Writing an entry 



To write an entry, head to the back-end of your PivotX website. For most users 
the back-end will be located at `http://www.yourdomainname.com/pivotx`, so point 
your web browser there and log in with the username and password you created in 
Chapter 3. Upon logging in you'll be taken to the *Dashboard*, where you can add 
content to your site, change the look of it, and change the settings: 

<a href="/images/img1-4b.jpg" class="fancybox"><img src="/images/img1-4b.jpg" width="400" alt="Screenshot" /></a>

  
The dashboard gives you a quick overview of what's happening on your website. 
At the very top you should see your own name and the main navigation menu below 
it. Below the menu and the short dashboard introduction are a few button 
shortcuts ('New Entry', 'New Page', 'Configuration' and 'Manage Media'). There 
are also lists of the latest entries, comments and pages, and to the right there's 
an area with the latest PivotX news and forum posts.

Let's take this one step at a time, and start by writing a new entry. Let's use 
the shortcut: click the button that says 'New entry'. This will take you to the 
following screen:

<a href="/images/img1-4c.jpg" class="fancybox"><img src="/images/img1-4c.jpg" width="400" alt="Screenshot" /></a>

As you can see, it's all pretty straight forward. Enter a title and an optional 
subtitle for your entry. Below this is a section called 'Introduction', and here 
you enter the first part of your story. The screen looks a lot like a standard 
word processor which is exactly what it is. All the usual controls like Bold, 
Italic, Underline and what not are there, along with some other things we'll 
get into later.

Let's enter some text in the 'introduction' and 'body' part and click 'Post and 
Continue Editing' on the right side of your screen when you're done:

<a href="/images/img1-4d.jpg" class="fancybox"><img src="/images/img1-4d.jpg" width="400" alt="Screenshot" /></a>

  
That saves the entry, like you would save a document in for example Microsoft 
Word. If you now go to your website's front page your new entry should appear: 

<a href="/images/img1-4e.jpg" class="fancybox"><img src="/images/img1-4e.jpg" width="400" alt="Screenshot" /></a>

It worked! The text we typed in the 'Introduction' part appeared, and if you 
click 'Read More' the text in the 'Body' part will also appear:

<a href="/images/img1-4f.jpg" class="fancybox"><img src="/images/img1-4f.jpg" width="400" alt="Screenshot" /></a>

## I.4.1.2 Inserting pictures & popups

But a story needs pictures too! Of course, PivotX gives you the possibility 
to add pictures to your entries. Let's go back to our entry screen to look at 
the different options.

Let's add a picture to the introduction. In the introduction part's toolbar 
there is an icon with a picture and a small plus sign. When you move your mouse 
pointer over it the tooltip reads 'PivotX Image'.

<img src="/images/img1-4g.jpg" alt="Screenshot" />

Clicking on that icon opens the 'Insert an Image' window, where you can either 
pick a previously uploaded image or upload a new image from the computer you're 
working on, which is what we're going to do:

<a href="/images/img1-4h.jpg" class="fancybox"><img src="/images/img1-4h.jpg" width="400" alt="Screenshot" /></a>

  
After picking an image from your computer, the screen looks like this (do not 
pay attention to the yellow warning at the top of the window):

<a href="/images/img1-4i.jpg" class="fancybox"><img src="/images/img1-4i.jpg" width="400" alt="Screenshot" /></a>
  
You can see PivotX automatically put the image in a folder named '2009-03', 
and shows a preview of what the image looks like. Enter some alternate text, 
and leave the alignment as is, centered. All you have to do is click 'Insert 
Image!', and it's done:

<a href="/images/img1-4j.jpg" class="fancybox"><img src="/images/img1-4j.jpg" width="400" alt="Screenshot" /></a>

But where is it? Don't worry, you don't see the picture here but it will be 
in your entry. PivotX added the following to the introduction: `[[image file="2009-03/vogel.jpg" alt="A bird!" ]]`.

  
This lets the PivotX engine know what to do when publishing the entry. Let's 
hit 'Post and Continue Editing', and check our website:

<a href="/images/img1-4k.jpg" class="fancybox"><img src="/images/img1-4k.jpg" width="400" alt="Screenshot" /></a>

Woohoo! That looks good, doesn't it? Of course, we could have added the picture 
to the 'body' part instead, so you would only see it if you click 'Read More', 
but you'd probably figured that out for yourself.  
  
Another way of adding pictures is using a 'PivotX Popup'. To demonstrate this, 
we'll go back to the entry, and delete the `[[image file="2009-03/vogel.jpg" alt="A bird!" ]]` 
from the introduction text. Instead of clicking the 'PivotX Image' icon we'll now 
use the 'PivotX Popup' icon. For this example let's move on to the 'body' part and 
select a piece of text before clicking the icon: 

<img src="/images/img1-4l.jpg" alt="Screenshot" /></a>

 
Upon clicking the icon the 'Insert an Image Popup' screen appears. In the 
screenshot below, use the 'Select' button to pick the previously uploaded image 
of the bird.   


  
<a href="/images/img1-4m.jpg" class="fancybox"><img src="/images/img1-4m.jpg" width="400" alt="Screenshot" /></a>


  
Enter the alternate text again manually. PivotX automatically assumes that we 
want to use the selected text for the popup (we'll see what that means in a 
moment), and let's change the alignment to 'Inline', so the link to the image 
will show up inline with the text of the entry. When you click 'Insert popup!', 
you'll notice that PivotX inserts `[[popup file="2009-03/vogel.jpg" 
description="the Los Angeles underground" alt="a bird!" align="inline" ]]` 
to the entry text. Again, this means the PivotX engine will know what to do 
when we publish our entry. Click 'Post and Continue Editing', and check your 
website (you'll have to click 'Read More' to see it, since we put the popup 
in the 'body' part of the entry): 

<img src="/images/img1-4n.jpg"  alt="Screenshot" />

Aha! PivotX has automatically changed the the selected text into a link and 
clicking that link will reveal the picture in a 'Thickbox' popup with the 
alternate text as the picture's caption:

<a href="/images/img1-4o.jpg" class="fancybox"><img src="/images/img1-4o.jpg" width="400" alt="Screenshot" /></a>

Remember, when we inserted the popup we chose 'Use Text' for the popup link. 
Another option is 'Use Thumbnail', which means that a small picture will show 
up in your entry instead of the text link. When somebody clicks the small 
picture the popup will pop up and show the fullsize picture.  
When you choose 'Use Thumbnail' you can click 'Edit thumbnail', which will 
then open a window called *the PivotX Image Cropper*. Here you can edit what 
the thumbnail will look like. There're some options on the right you can 
choose from:  
  
*   'fixed proportions', which means the size will be determined by a setting (which we'll see later in the 'configuration' part)
*   'bounded size', which means it either takes the height or width of that setting, whichever is the smallest, or
*   'free crop', which means whatever you select inthe cropper window is going to be the size of the thumbnail. (you should really experiment with these options to see hoe it affects your thumbnail)

  
  
We'll use 'fixed proportions here, and select a nice part of the image, 
like in the screenshot below. When you're done, click 'Create Thumbnail', 
and in the next window accept the thumbnail and insert the popup.  

<a href="/images/img1-4p.jpg" class="fancybox"><img src="/images/img1-4p.jpg" width="400" alt="Screenshot" /></a>

Now if we check the website (after saving our work) the entry will look 
like this:

<a href="/images/img1-4q.jpg" class="fancybox"><img src="/images/img1-4q.jpg" width="400" alt="Screenshot" /></a>
 
..and you can actually click on the thumbnail to get the Thickbox popup!

Let's leave it at that for now as far as writing entries is concerned, 
and move on to creating a page.

## I.4.1.3 Adding a page

When you click the 'New Page' button on the dashboard page, a screen will show 
up that is very similar to the 'New Entry' screen. Writing a page, and inserting 
pictures, works the same as for an entry, so we won't go into that anymore.

Something that's important when creating a new page though, is selecting the 
right template.

In this case, we'll select `skinny/page_2column.html`. Of course, creating your 
own template is possible too, but that's covered in another Chapter.

<a href="/images/img1-4r.jpg" class="fancybox"><img src="/images/img1-4r.jpg" width="400" alt="Screenshot" /></a>

After saving your work, the new page automatically shows up in the list of 
pages on the right side of the website:

<a href="/images/img1-4s.jpg" class="fancybox"><img src="/images/img1-4s.jpg" width="400" alt="Screenshot" /></a>

Nice! Now click on the link to view the page you just created:

<a href="/images/img1-4t.jpg" class="fancybox"><img src="/images/img1-4t.jpg" width="400" alt="Screenshot" /></a>

  
Up until now, we've been working with the PivotX default template. But what 
if you want to customize the look of your website? Read on! In the next chapter 
we'll cover how you can customize your weblog's templates.
