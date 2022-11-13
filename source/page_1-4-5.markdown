# 1.4.5 Data structure of PivotX

The elementary unit is an Entry or a Page. Both have a title and possibly a subtitle, an introduction and a main text. 
Through extensions some data can be added to this (e.g. an extra image or pointers to other entries/pages).
Because of the fact that their structure is almost the same the maintenance of Entries and Pages is the same.

To create more relations Pages are grouped together in Chapters and Entries in Categories.

Pages (and Chapters too) are mainly intended to hold data for a longer time. So they have a fairly permanent use. 
If some sequence is necessary then a number can be assigned to both Pages and Chapters 
(when the number is equal then alphabetic order decides).

Entries (and Categories too) are mainly intended to hold data temporary. The last Entry is always the most actual. 
So there is no number to define here. Sequence is determined through the publishing date.

In essence the merging between Blog (Entry) and Web page (Page) within PivotX is plain to see here.

While the relation between Page and Chapter is always 1 on 1 this is somewhat different between Entry and Category. 
An Entry could belong to more than 1 Category. Why that is will be clear when the Weblog is described.

A Weblog is a group of 1 or more Subweblogs that could contain 1 or more Categories. 
The in between of a Subweblog seems to be too much but has a clear purpose. 
The most striking example is a front page on which someone always wants to show the last 3 Entries from 3 different Categories. 
The frequency of Entry creation could be completely different per Category.
This wish can be fullfilled by defining a Weblog with 3 Subweblogs of 1 Category each. 
Each Subweblog will show the last Entries of its own Category.
If an Entry needs to be shown in more than 1 Weblog then this can be done by allocating this Entry to more Categories.


