<?php

class Database {
    // Variables
        private $dbData = array('host'=>'', 'user'=>'', 'pass'=>'', 'name'=>'');
        public $conn;
        public $table = array(
            'exemplar'     => 'exemplar',
            'filme'        => 'filme',
            'kategorie'    => 'kategorie',
            'kat_link'     => 'kat_link',
            'kunden'       => 'kunden',
            'mitarbeiter'  => 'mitarbeiter',
            'ort'          => 'ort',
            'regisseur'    => 'regisseur',
            'rid_link'     => 'rid_link',
            'rückgabe'     => 'rueckgabe',
            'schauspieler' => 'schauspieler',
            'sid_link'     => 'sid_link',
            'typ'          => 'typ',
            'verleih'      => 'verleih',
            'version'      => 'versions'
        );
    // end Variables


    /**
     * Connect to DB and check for connection
     */
    function __construct(){
        if(getenv('development') == 'true' && getenv('production') == 'false'){
            $this->dbData['host'] = getenv('DB_DEV_HOST');
            $this->dbData['user'] = getenv('DB_DEV_USERNAME');
            $this->dbData['pass'] = getenv('DB_DEV_PASSWORD');
            $this->dbData['name'] = getenv('DB_DEV_DATABASE');

        }else if(getenv('production') == 'true' && getenv('development') == 'false'){
            $this->dbData['host'] = getenv('DB_LIVE_HOST');
            $this->dbData['user'] = getenv('DB_LIVE_USERNAME');
            $this->dbData['pass'] = getenv('DB_LIVE_PASSWORD');
            $this->dbData['name'] = getenv('DB_LIVE_DATABASE');
        }
    }


    /**
     * Create DB Connection with values from __construct
     */
    public function Connect(){
        $this->conn = new mysqli(
            $this->dbData['host'],
            $this->dbData['user'],
            $this->dbData['pass'],
            $this->dbData['name']
        );

        $this->CheckConnection();
    }


        /**
         * Check if connection is ready
         */
        private function CheckConnection(){
            if($this->conn->connect_error){
                die('Connection failed => ' . $this->conn->connect_error);
                $this->Close();
                exit();
            }
        }


        /**
         * Check if DB exist
         */
        public function Exist(){
            $this->conn = new mysqli(
                $this->dbData['host'],
                $this->dbData['user'],
                $this->dbData['pass']
            );

            if(!mysqli_select_db($this->conn, $this->dbData['name'])){
                return false;
            }else{
                return true;
            }
        }


        /**
         * Create Database from Database folder
         */
        public function CreateDatabase($filename){
            $this->conn = new mysqli(
                $this->dbData['host'],
                $this->dbData['user'],
                $this->dbData['pass']
            );
            $temp = '';

            $fp = fopen($filename, 'r') or die('Unable to read Database file.');
            while(!feof($fp)){
                $line = fgets($fp);
                // Check if line is a comment
                if(!(substr($line, 0, 2) == '--' || $line == '')){
                    $temp .= $line;
                    if(substr(trim($line), -1, 1) == ';'){
                        if(strpos($temp, '{{DB_DATABASE}}')){
                            $temp = str_replace('{{DB_DATABASE}}', $this->dbData['name'], $temp);
                        }
                        mysqli_query($this->conn, $temp);
                        $temp = '';
                    }
                }
            }//end while
            fclose($fp);
        }


    /**
     * Create SQL Table View with onclick function
     * @param mysql  $query   [MYSQL query]
     * @param boolean $onclick [Available onclick row ?]
     */
    public function SQLTable($query = '', $onclick = false){
        $this->Connect();
        if(!empty($query)){
            $result = mysqli_query($this->conn, $query);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $link = "'index.php?page=" . $_GET['page'] . "&id=" . $row[0] . "'";

                    // Onclick Event?
                    if($onclick){
                        $count = 1;
                        echo '<tr class="search" title="Klick mich" onclick="document.location.href = ' . $link . '" style="cursor:pointer">';
                    }else{
                        $count = 0;
                        echo '<tr class="search">';
                    }

                    // Get all Select Outputs exept first(ID)
                    for($i = $count; $i < sizeof($row)/2; $i++){
                        if($row[$i] == '0000-00-00'){
                            echo '<td class="emptyDate">' . $row[$i] . '</td>';
                        }else{
                            echo '<td>' . $row[$i] . '</td>';
                        }
                    }
                    echo '</tr>';
                }//end while
            }else{
                echo '</table>';
                echo '<hr><h3 id="empty-query">Nothing found.</h3><hr>';
            }//no results found
        //empty query
        }else{
            echo '</table>';
            echo '<hr><h3 id="empty-query">Empty Query.</h3><hr>';
        }
        echo '</table>';
        $this->Close();
    }//end method


    /**
     * Return Query results
     * @param mysql $query [MYSQL query]
     */
    public function SQLReturn($query = ''){
        if(!empty($query)){
            $this->Connect();
            $result = mysqli_query($this->conn, $query);
            if(mysqli_num_rows($result) > 0){
                $items = [];
                while($row = mysqli_fetch_assoc($result)){
                    array_push($items, $row);
                }
                $this->Close();
                return $items;
            }else{
                // echo '<h3>Nothing found.<h3>';
                echo '<p></p>';
                $this->Close();
            }//no result found
        }//empty query
    }//end function


    /**
     * Check if something exist
     * @param mysql $query [MYSQL query]
     */
    public function SQLExist($query = ''){
        if(!empty($query) && $query != ''){
            $this->Connect();
            $result = mysqli_query($this->conn, $query);
            if(mysqli_num_rows($result) == 0){
                $this->Close();
                return false;
            }else{
                $this->Close();
                return true;
            }
        }else{
            return false;
        }
    }


    /**
     * Add Query to database
     * @param mysql $query [MYSQL query]
     */
    public function SQLAdd($query = ''){
        if(!empty($query) && $query != ''){
            $this->Connect();
            mysqli_query($this->conn, $query);
            $this->Close();
        }
    }


    /**
     * Close DB connection
     */
    public function Close(){ mysqli_close($this->conn); }


}// end class
