__©2018 - Made by Eric Heinzl__
- **Github Repository**: <https://github.com/xPand4B/BKR-Verleih>

## How To Start ##
0.)  Read [__'CHANGE-LOG'__](https://github.com/xPand4B/BKR-Verleih/blob/master/CHANGE-LOG.md) if you already have a version of this project

1.)  Check your Configuration Settings inside ` config.php ` file.

2.)  Drag this Project inside your webserver directory (hosted __OR__ local).

3.)  Open Project inside your browser.

4.)  Select your database-type.

5.)  Create your first Employee/Admin User
* Necessary to add...
    * movies
    * customer
    * employee/admin
    * rental

6.)  Have fun __(^-^)/__


## Features ##
* force HTTPS for live server
* Easy to edit Configuration
* Self-import for database
* Database Version control
* Responsive Design
* Dynamic Page loading
    * Reload content section only
        * Pages are mostly loaded from partials
    * 404-Not-Found Error Page
    * 403-Access-forbidden
    * Site Access Control



## System Recommandations ##
| Name                         | Used Version    | Source                                 |
| ---------------------------- |:--------------- |:-------------------------------------- |
| PHPMyAdmin                   | 4.8.0.1         | https://www.phpmyadmin.net/downloads/  |
| PHP                          | 7.2.4           | http://php.net/downloads.php           |



## Powerd with ##
| Name                         | Source                                                      |
| ---------------------------- |:----------------------------------------------------------- |
| JQuery                       | https://jquery.com                                          |
| The Movie DB                 | https://www.themoviedb.org                                  |
| Font Awesome                 | https://fontawesome.com                                     |
| Lightbox 2                   | http://lokeshdhakar.com/projects/lightbox2/                 |
| Parsley Validation           | http://parsleyjs.org                                        |


## Changelog ##
The changelog is located inside the [CHANGE-LOG.md](https://github.com/xPand4B/BKR-Verleih/blob/master/CHANGE-LOG.md) file.


## Overall Code-lines (10.06.2018) ##
| File Extension         | Lines       |
| ---------------------- |:----------- |
| .html                  |   55        |
| .php                   | 2593        |
| .css                   |  867        |
| .js                    |   99        |
| .sql                   | 3063        |

| Total                  | 6677        |
| ---------------------- |:----------- |

__PowerShell command:__

`dir -Recurse *.<EXTENSION> | Get-Content | Measure-Object -Line`
