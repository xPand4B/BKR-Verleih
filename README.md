# ©2018 - Made by Eric Heinzl


HOW TO START
============
    0. Read 'CHANGE-LOG' if you already have a version of this project
    1. Check your Configuration Settings ( ./config.php )
    2. Drag this Project inside your webserver (hosted OR local)
	3. Open Project inside your browser
	4. Select your database-type
	5. Create your first Employee/Admin User
		* Necessary to add...
			* movies
			* customer
			* employee/admin
			* rental
	6. Have fun

FEATURES
========
    * force HTTPS for live server
    * Easy to edit Configuration ( /config.php )
	* Self-import for database
    * Database Version control
        [ /app/init.php ]
        [ /app/config/version.php ]
        [ /app/core/update.database.php ]
	* Responsive Design ( /styles/* )
	* Dynamic Page loading
		* Reload content section only ( /scripts/php/Page.php )
			* Pages are mostly loaded from partials ( /app/partials/* )
		* 404-Not-Found Error Page ( /app/error/* )
		* 403-Access-forbidden ( ex. <URl>/img )
		* Site Access Control (check if logged in)
    * Complete Imprint
    * Complete Privacy Policy


SYSTEM RECOMMANDATIONS
======================
| Name                         | Used Version    | Source                                 |
| ---------------------------- |:--------------- |:-------------------------------------- |
| PHPMyAdmin                   | 4.8.0.1         | https://www.phpmyadmin.net/downloads/  |
| PHP                          | 7.2.4           | http://php.net/downloads.php           |


POWERED WITH
============
| Name                         | Source                                                      |
| ---------------------------- |:----------------------------------------------------------- |
| JQuery                       | https://jquery.com                                          |
| The Movie DB                 | https://www.themoviedb.org                                  |
| Font Awesome                 | https://fontawesome.com                                     |
| Lightbox 2                   | http://lokeshdhakar.com/projects/lightbox2/                 |
| Parsley Validation           | http://parsleyjs.org                                        |


## OVERALL CODE-LINES ##
    - PowerShell => dir -Recurse *.<EXTENSION> | Get-Content | Measure-Object -Line
        [10.06.2018]
            .html   >>    55
            .php    >>  2593
            .css    >>   867
            .js     >>    99
            .sql    >>  3063
            ----------------
            Total   >>  6677
