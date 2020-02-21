<?php
require_once("config-student.php");

class Database
{
    //PDO object
    private $_dbh;

    function __construct()
    {
        try {
            //Create a new PDO connection
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            // echo "Connected!";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getPets()
    {
        // define query
        $sql = "SELECT * FROM pets";

        // bind params

        // prepare statement
        $statement = $this->_dbh->prepare($sql);

        // execute statement
        $statement->execute();

        // return results
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}