<?php
/**
 * User: matteo
 * Date: 29/04/19
 * Time: 14.13
 */

class Database {
    private $dbname;
    private $dbhost;
    private $dbpsw;
    private $dbuser;
    public $connessione;

    /**
     * Database constructor.
     */
    public function __construct($host = 'localhost', $dbname = 'registro', $dbuser = 'moodleuser', $dbpsw = 'yourpassword') {
        $this->dbhost = $host;
        $this->dbname = $dbname;
        $this->dbuser = $dbuser;
        $this->dbpsw = $dbpsw;
        $this->connessione = null;
    }

    public function getConnection() {

        if (empty($this->connessione)) {

            $this->connessione = new mysqli($this->dbhost, $this->dbuser, $this->dbpsw, $this->dbname);

            if ($this->connessione->connect_errno) {
                echo "Failed to connect to MySQL: " . $this->conn->connect_error();
                die();
            }
        }
        return $this->connessione;
    }



}