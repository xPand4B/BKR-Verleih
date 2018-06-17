## [10.06.2018] ##
* Improved CSS file structure

    `./app/core/head.html`

    `./styles/*`

* Improved environment variable loading

    `./app/autoload.php`

## [02.06.2018] ##
* Added Development/Production Database connection, in order to upload the project to a hoster

    `/config.php`

    `/scripts/php/Database.php`

* Improved Database check, e.x. exist all tables?

    `/app/init.php`

    `/app/core/missing.tables.php`

* Improved environment variables loading

    `/app/autoload.php`

* Added Development/Production Database files

    `/database/*.sql`

* Improved database selection, only show database files for current mode (dev/live)

    `/app/core/select.database.php`

* Added HTTPS force for production mode

    `/app/init.php`

## [31.05.2018] ##
* Added delete scripts
* Customer
    
    ` /app/partials/kunden/show.all.php`
    
    ` /scripts/php/delete/delete.customer.php`

* Movies (depending on serveral things, e.x. movie still in use?)
    
    ` /app/includes/filme.php`
    
    ` /app/partials/filme/delete.php`
    
    ` /scripts/php/delete/delete.movie.php`

## [30.05.2018] ##
* Created config file
    ` /app/config/default.php`
* Depending on config file...
    * Database name         `/database/*.sql`
    * Database connection   `/scripts/php/Database.php`
    * Version control       `/app/init.php`
    * Website Title
        [ /app/core/first.start.php ]
        [ /app/core/select.database.php ]
        [ /app/core/update.database.php ]
        [ /scripts/php/Page.php ]
- Read config file and save settings as environment variables
    [ /app/init.php ]
    [ /app/autoload.php ]
- Added autoload to scripts, in order to access environment variables
    [ /scripts/php/add/add.kunden.php ]
    [ /scripts/php/add/add.mitarbeiter.php ]
    [ /scripts/php/add/add.movies.php ]
    [ /scripts/php/add/add.verleihEnd.php ]
    [ /scripts/php/add/add.verleihStart.php ]
    [ /scripts/php/login/login.php ]

## [28.05.2018]
    - Created Partial-includes to find things easier
        [ /app/partials/* ]
        [ /app/includes/filme.php ]
        [ /app/includes/home.php ]
        [ /app/includes/kunden.php ]
        [ /app/includes/mitarbeiter.php ]
        [ /app/includes/verleih.php ]

## [24.05.2018]
    - Added JS Script for selecting all checkboxes
        [ /scripts/javascript/checkbox.selectAll.js ]
        [ /app/includes/kunden.php ]
        [ /app/includes/verleih.php ]

    - Create delete Customer script (empty)
        [ /scripts/php/delete/delete.customer.php ]

    - Created 'Verleih abschließen' script
        [ /scripts/php/add/add.verleihEnd.php ]
        [ /app/includes/verleih.php ]

    - Added 'frist' to DB table 'typ'

    - Added Link from 'Verleih' to 'Kunden' (Onclick Row)

    - Created colored indicator for 'rueckgabedatum' based on 'frist' (DB >> typ >> frist)
        [ /app/includes/verleih.php ]
        [ /app/includes/kunden.php ]

    - Added DB table 'versions' to control DB version
        [ /app/config/version.php ]
        [ /app/init.php ]
        [ /app/core/update.database.php ]

## [23.05.2018]
    - Added 'Verleih Hinzufügen'
        [ /app/includes/verleih.php ]
        [ /scripts/php/add/add.verleihStart.php ]
        [ /scripts/php/search/search.costumer.php ]

    - Added Verleih View Query
        [ /app/includes/verleih.php ]
        [ /app/includes/kunden.php ]

## [22.05.2018]
    - Updated READ-ME
		[ /READ-ME.txt ]

	- Added Table array inside Database Class (better access to tables)
		[ /scripts/php/Database.php ]
		[ /app/includes/filme.php ]
		[ /app/includes/kunden.php ]
		[ /app/includes/mitarbeiter.php ]
		[ /app/includes/profil.php ]
		[ /app/includes/verleih.php ]
		[ /app/init.php ]
		[ /scripts/php/add/add.kunden.php ]
		[ /scripts/php/add/add.mitarbeiter.php ]
		[ /scripts/php/login/login.php ]

	- Created 'Latest Movies' View on Homepage
		[ /app/includes/home.php ]

	- Added self-import for database if not exist
		[ /scripts/php/Database.php ]
		[ /app/init.php ]
		[ /app/core/select.database.php ]

## [20.05.2018]
    - Category, Actor and Director collapsible
        [ /app/includes/filme.php ]
        [ /scripts/javascript/collapsible.js ]

    - Added Imprint Page, Links and Access
        [ /app/includes/impressum.php ]
        [ /app/core/footer.html ]
        [ /scripts/php/Page.php ]
        [ /scripts/php/Topnav.php ]

    - Added Privacy Policy Page, Links and Access
        [ /app/includes/datenschutz.php ]
        [ /app/core/footer.html ]
        [ /scripts/php/Page.php ]
        [ /scripts/php/Topnav.php ]

    - Improved 'backLink' for php scripts (function BackLink)
        [ /scripts/php/login/login.php ]
        [ /scripts/php/add/add.kunden.php ]
        [ /scripts/php/add/add.mitarbeiter.php ]
        [ /scripts/php/add/add.movies.php ]
        [ /scripts/php/add/add.verleihStart.php ]

    - Improved comments for php objects
        [ /scripts/php/Database.php ]
        [ /scripts/php/Page.php ]
        [ /scripts/php/Topnav.php ]
