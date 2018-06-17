<?php
class Topnav  {

// Variables
    private $pages;     // Contains all available pages for current usertype
    private $loggedIn;
    private $Path;
// end Variables


    /**
     * [__construct description]
     * @param [type] $path [Contains path for files ( 'root/scripts/php/Database.php' )]
     */
    function __construct($path) {
        $this->Path = $path;
    }


    /**
     * Init Topnav attributes
     * @param array   $pages    [Contains all available pages the current user can access]
     * @param boolean $loggedIn [User is logged in ( true/false )]
     */
    public function Load($pages = [], $loggedIn = false){
        $this->pages = $pages;
        $this->loggedIn = $loggedIn;
        $this->DrawTopnav();
    }


    /**
     * Create Topnav view with links from $pages
     */
    private function DrawTopnav(){?>
        <nav class="topnav">
            <!-- Mobile: Open Menu -->
            <div id="mobileMenuBG">
                <div id="mobileMenuIcon" onclick="mobileNav(this)">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
            </div>
            <!-- end Mobile-->

            <ul><?php
            // Create Links
                foreach($this->pages as $link){
                    if(file_exists($this->Path . $link . '.php')){
                        if($link != 'impressum' && $link != 'datenschutz'){?>
                            <li><a href="index.php?page=<?php echo $link; ?>" <?php if($_GET['page'] == $link){ echo 'class="active"'; }?>><?php echo ucfirst($link); ?></a> </li>
                            <?php
                        }
                    }
                }
            // Create Login/Logout Button
                // login = false
                if($this->loggedIn == false){?>
                    <li><button onclick="document.getElementById('modalLogin').style.display = 'block';" style="width:auto;" class="openModal">Anmelden</button></li>
                    <?php
                // login = true
                }else{
                    echo '<li><a href="./scripts/php/login/logout.php" style="width:auto" id="logout">Abmelden</a></li>';
                }?>
            </ul>
        </nav>
        <script src="./scripts/javascript/topnav.js"></script>
        <?php
        include './app/core/modal/modal.Login.html';
    }// end function


}//end class
