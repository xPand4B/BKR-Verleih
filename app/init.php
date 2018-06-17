<?php
    // Load all config settings as environment var
    require './app/autoload.php';

    if(getenv('production') == 'true' && getenv('development') == 'false'){
        if(!checkHTTPS()){
            header("Location: https://" . getenv('WEB_DOMAIN'));
        }
    }

    // Check for HTTPS
    function checkHTTPS(){
    	if((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443){
    		return true;
    	}else{
    		return false;
    	}
    }


    error_reporting(false);
    session_cache_limiter(false);
    session_start();

    // Include Database object
    require 'scripts/php/Database.php';
    // Create DB object - Check if Database exist
    $DB = new Database();


    // All Tables can be found inside Database Class ( /scripts/php/Database.php )
    $mitarbeiterTable = $DB->table['mitarbeiter'];
    $versionTable     = $DB->table['version'];

// Select Database for usage
    if(!$DB->Exist()){
        // Ensure nobody is still logged in
        session_unset();
        session_destroy();
        require 'app/core/select.database.php';

    // Database exist
    }else{
        // Check if all tables exist
        foreach($DB->table as $table){
            if(!$DB->SQLExist("SHOW TABLES LIKE '$table'")){
                session_unset();
                session_destroy();
                require_once 'app/core/missing.tables.php';
                exit();
            }
        }

        // Versions table exist
        if($DB->SQLExist("SHOW TABLES LIKE '$versionTable'")){

            // Get Versions from DB
            $availableVersion = $DB->SQLReturn("SELECT version FROM $versionTable ORDER BY ID DESC LIMIT 1");
            $availableVersion = $availableVersion[0]['version'];
            $upToDate = false;

            if(getenv('currentVersion') === $availableVersion){
                $upToDate = true;
            }

            // Version doesnt exist in table
            if(!$upToDate){
                session_unset();
                session_destroy();
                require 'app/core/update.database.php';

            // Version is up-to-date
            }else{
                //Clean Start
                if(!$DB->SQLExist("SELECT 1 FROM $mitarbeiterTable LIMIT 1")){
                    // Ensure nobody is still logged in
                    session_unset();
                    session_destroy();
                    require 'app/core/first.start.php';

                // Normal Start
                }else{
                    // Include Page object
                    require 'scripts/php/Page.php';
                    // Create Page object (loads every content)
                    $Page = new Page();
                }
            }// Version is up-to-date
        // Versions table doesnt exist
        }else{
            session_unset();
            session_destroy();
            require 'app/core/update.database.php';
        }// Versions table doesnt exist
    }// Database exist
