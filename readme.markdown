This is all the code behind [my personal website](http://mikevanrossum.nl). 

I had to write my own CMS in PHP for the school class [ServerSide Scripting](http://intra.iam.hva.nl/content/1112/verdieping1/server_side_scripting//intro-en-materiaal/). Instead of writing a simple guestbook (the level of skill expected at the end of the class), I wrote my own portfolio/blog website.

## Features

* Analytics tracking of site visits, here is [the (monthly) result](http://mikevanrossum.nl/analytics). *The coolest feature IMO!*
* Request routing on the frontend (javascript) as well as the backend (PHP).
* Javascript based navigation.
* MVC pattern similar to CodeIgnitor.
* Blog system including
 * RSS feed
 * Comments with verification using the Akismet API 
 * A mailscript which updates me for every non-spam comment.
 * async share buttons
* Admin panel to edit blog posts (more coming).
* Daily backup script (using cron & mail script).
* Hourly checking for new tweets (using the Twitter API) & photos (using RSS parsing) and stuff them in the database (using cron).