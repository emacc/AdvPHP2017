<?php

/**
 * Description of DBSpring
 *
 * @author GFORTI
 */
class DbCRUD extends DB {
    //put your code here
    
    function __construct() {
        
        $this->setDns('mysql:host=localhost;port=3306;dbname=phpadvclassspring2017');
        $this->setPassword('');
        $this->setUser('root');
        
    }
    
    function readAllAddress() {
        $db = $this->getDB();
        $stmt = $db->prepare("SELECT * FROM address");

        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
           $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return $results;    
    }
    
    function createAddress($fullname, $email, $addressline1, $city, $state, $zip, $birthday) {
        $db = $this->getDB();
        $stmt = $db->prepare("INSERT INTO address SET fullname = :fullname, email = :email, addressline1 = :addressline1, city = :city, state = :state, zip = :zip, birthday = :birthday");
        $binds = array(
            ":fullname" => $fullname,
            ":email" => $email,
            ":addressline1" => $addressline1,
            ":city" => $city,
            ":state" => $state,
            ":zip" => $zip,
            ":birthday" => $birthday
        );
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            return true;
        }

        return false;
    }

}
