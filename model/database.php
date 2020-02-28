<?php
require_once("config-pet.php");

class Database
{
    //PDO object
    private $_dbh;

    function __construct()
    {
        try {
            //Create a new PDO connection
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
//            echo "Connected!";
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

    function addPet($pet)
    {
        var_dump($pet);

        // define query
        $sql = "INSERT INTO pets (`name`, `color`, `type`) 
                VALUES (:name, :color, :type)";

        echo $sql;

        // prepare statement
        $statement = $this->_dbh->prepare($sql);

        //bind params
        $statement->bindParam(':name', $pet->getName());
        $statement->bindParam(':color', $pet->getColor());
        $statement->bindParam(':type', $pet->getType());

        // execute statement
        $statement->execute();
    }
}