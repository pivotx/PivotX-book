# Appendix D: Date formatting options 
  
This is an overview of the various options you can use for the formatting of dates in various template tags and the weblog settings.  

The options you can use are: 

* `%minute%` - the number of minutes after the hour: from 00 to 59 
* `%hour12%` - inserts the hour from 00 to 11 
* `%ampm%` - inserts either AM or PM 
* `%hour24%` - inserts the hour from 00 to 23 
* `%day%` -insert the day, as a double digit from '01' to '31' 
* `%ordday%` - ordinal day - insert the day, as a number from 1 to 31 
* `%orddaysuffix_en%` - ordinal day suffix (English) - adds the suffix as used in English (th, rd etc.). Only works when language is set to English. 
* `%daynum%` - insert the number of the day in the week, from 1 to 7 
* `%dayname%` - insert the name of the day, as defined by your language file
* `%dname%` - insert the short/abbreviated name of the day, as defined by your language file 
* `%weekday%` - insert the name of the day, as defined by your language file (same as `%dayname%`) 
* `%weeknum%` - the number of the week, from 1 to 53 
* `%month%` - the number of the month, as a double digit from '01' to '12' 
* `%ordmonth%` - ordinal month - the number of the month, from 1 to 12 
* `%monthname%` - insert the name of the month, as defined by your language file 
* `%monname%` - insert the short/abbreviated name of the month, as defined by your language file 
* `%year%` - the year, in four digits: like '2004' 
* `%ye%` - the year, in two digits: like '04' 
* `%aye%` - apostrophe year - the year, in two digits: prefixed with a typographically correct apostrophe, like '04  

In addition there are tags for start (`%st\_xxxx%`) and ending dates (`%en\_xxxx%`). The options you can use are: 

* `%st_day%` / `%en_day%` - insert the day, as a double digit from '01' to '31' 
* `%st_ordday%` / `%en_ordday%` - ordinal day - insert the day, as a number from 1 to 31 
* `%st_orddaysuffix_en%` / `%en_orddaysuffix_en%` - ordinal day suffix (English) - adds the suffix as used in English (th, rd etc.). Only works when language is set to English. 
* `%st_daynum%` / `%en_daynum%` - insert the number of the day in the week, from 1 to 7 
* `%st_dayname%` / `%en_dayname%` - insert the name of the day, as defined by your language file 
* `%st_weekday%` / `%en_weekday%` - insert the name of the day, as defined by your language file (same as `%dayname%`) 
* `%st_weeknum%` / `%en_weeknum%` - the number of the week, from 1 to 53 
* `%st_month%` / `%en_month%` - the number of the month, as a double digit from '01' to '12' 
* `%st_ordmonth%` / `%en_ordmonth%` - ordinal month - the number of the month, from 1 to 12 
* `%st_monthname%` / `%en_monthname%` - insert the name of the month, as defined by your language file 
* `%st_monname%` / `%en_monname%`  - insert the short name of the month, as defined by your language file 
* `%st_year%` / `%en_year%` - the year, in four digits: like '2004' 
* `%st_ye%` / `%en_ye%` - the year, in two digits: like '04' 
* `%st_aye%` / `%en_aye%` - apostrophe year - the year, in two digits: prefixed with a typographically correct apostrophe, like '04

