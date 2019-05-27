<?php

/**
 * User: matteo
 * Date: 29/04/19
 * Time: 14.11
 */
require_once (__DIR__."/Database.php");

class Registro {
    private $DB;

    /**
     * Registro constructor.
     */
    public function __construct($DB) {
        $this->DB = $DB;
    }

    public function add(string $string, string $string1, string $string2) {
        $this->addEntry($string, $string1, $string2);

    }

    public function getCompletedNameByUsername(string $string) {

        $connessione = $this->DB->getConnection();

        $completedName ="";
        $sql = "SELECT DISTINCT nome, cognome FROM UtentiRegistrati WHERE username='$string'";
        $result = $connessione->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $completedName= $row["nome"]. " " . $row["cognome"].PHP_EOL;
            }
        } else {
            echo "0 results";
        }
        return $completedName;
    }

    public function removeAllByUsername(string $string) {
        $connessione = $this->DB->getConnection();
        $sql = "DELETE FROM UtentiRegistrati WHERE username='$string'";

        if ($connessione->query($sql)){
            echo "Rimosso tutti gli utenti con username $string";
        }else {
            echo "Forse si è verificato un'errore ".$this->connessione->error();
        }

    }

    /**
     * @param string $string
     * @param string $string1
     * @param string $string2
     */
    private function addEntry(string $string, string $string1, string $string2) {
        $connessione = $this->DB->getConnection();
        $sql = "INSERT INTO UtentiRegistrati(nome,cognome,username) VALUES ('$string', '$string1', '$string2')";
        if ($connessione->query($sql) === true) {
            echo 'Utente aggiunto' . PHP_EOL;
        } else {
            echo "Errore " . $sql . " :" . $connessione->error . PHP_EOL;
        }
    }


}

$db = new Database();
$reg = new Registro($db);
$reg->add('matteo','boni','bonimat');
echo "Il nome completo di bonimat è : ". $reg->getCompletedNameByUsername('bonimat');
$reg->removeAllByUsername('bonimat');
echo 'Ciao Mondo';