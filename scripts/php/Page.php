<?php
require 'scripts/php/Topnav.php';
class Page {

// Variables
    private $Path = array(
        'index'    => './index.php',
        'includes' => './app/includes/',
        'error'    => './app/error/',
        'core'     => './app/core/',
    );
    // Available Pages for...
        // ...User
        private $userPages = array('impressum', 'datenschutz', 'home', 'filme');
        // ...Customer
        private $customerPages = array('profil');
        // ...Employees
        private $adminPages = array('verleih', 'kunden', 'mitarbeiter');

    private $TopNav;
    private $currentPage;
// end Variables


    /**
     * Check if URL parameter '?page' isset
     * If true, merge available pages
     * If false, redirect to ?page=home
     */
    function __construct(){
        // Page is not set
        if(!isset($_GET['page'])){
            $uri = $this->Path['index'] . '?page=home';
            header('Location: ' . $uri);
        // Page is set
        }else{
            // Merge Available Pages together
            $this->customerPages = array_merge($this->userPages, $this->customerPages);
            $this->adminPages    = array_merge($this->userPages, $this->adminPages);
            // Get current pagename
            $this->currentPage = basename($_GET['page']);
            // Create Topnav Object
            $this->TopNav = new Topnav($this->Path['includes']);
        }
    }


    /**
     * Check if Requested page exists
     * If exist, check for login
     * if the user is logged in, check if url page is adminPages/customerPages array
     */
    public function Load(){
        $filePath = $this->Path['includes'] . $this->currentPage . '.php';

        // File does not exist
        if(!file_exists($filePath)){
            include $this->Path['error'] . '404_NotFound.php';
            return true;
        // File does exist
        }else{
            // Logged in
            if(isset($_SESSION['isAdmin']) || isset($_SESSION['isCustomer'])){
                // Admin User ?
                if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1){
                    if(in_array($this->currentPage, $this->adminPages)){
                        $this->LoadPage($this->adminPages, true);
                        return true;
                    }
                // Customer
                }else if(isset($_SESSION['isCustomer']) && $_SESSION['isCustomer'] == 1){
                    if(in_array($this->currentPage, $this->customerPages)){
                        $this->LoadPage($this->customerPages, true);
                        return true;
                    }
                }
            // not Logged in
            }else{
                // Check User pages
                if(in_array($this->currentPage, $this->userPages)){
                    $this->LoadPage($this->userPages, false);
                    return true;
                }
            }
        }
        header('Location: ' . $this->Path['index'] . '?page=home');
    }


        /**
         * Load User Page Content
         * @param array   $userTypePages [Contains all available pages the current user can access]
         * @param boolean $login         [User is logged in ( true/false )]
         */
        private function LoadPage($userTypePages = [], $login = false){
            $this->TopNav->Load($userTypePages, $login);
            $this->LoadBanner();
            $this->LoadContent();
        }

            /**
             * Loads Banner section
             */
            private function LoadBanner(){
                if($this->currentPage == 'home'){
                    echo '<section class="bannerHome"><h1>' . ucfirst(getenv('WEB_TITLE')) . '</h1></section>';
                }else{
                    echo '<section class="banner"><h1>' . ucfirst($this->currentPage) . '</h1></section>';
                }
            }

            /**
             * Loads Main + Content Section
             */
            private function LoadContent() {
                echo '<section id="main">
                        <section id="content">';
                include $this->Path['includes'] . $this->currentPage . '.php';
                  echo '</section>';
                include $this->Path['core'] . 'footer.html';
                echo '</section>';
            }


    /**
     * Set Page Titel
     */
    public function Titel(){
        $baseTitel = ucfirst(getenv('WEB_TITLE'));
        if ($this->currentPage == 'home') {
            return $baseTitel;

        }else if(in_array($this->currentPage, $this->adminPages) ||
                 in_array($this->currentPage, $this->customerPages)){
            return $baseTitel . ' | ' . ucfirst($this->currentPage);

        }else{
            return $baseTitel . ' | 404 Error';
        }
    }

}// end class
