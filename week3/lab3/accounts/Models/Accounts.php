<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Accounts
 *
 * @author 001351509
 */
class Accounts extends DB{
    
    public function __construct() {
        
        $dbConfig = array(
                "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPAdvClassSpring2017',
                "DB_USER"=>'root',
                "DB_PASSWORD"=>''
            );
            
        parent::__construct($dbConfig);
}

    public function signup($email, $password) {
            $db = $this->getDB();
            $stmt = $db->prepare("INSERT INTO users SET email = :email, password = :password, created = NOW()");
            
            $binds = array (
                ":email" => $email,
                ":password" => password_hash($password, PASSWORD_DEFAULT)
            );
            
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                return true;
            }

            return false;
            }
            
    public function login ( $email, $password ) {
        $db = $this->getDB();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
            
        $binds = array (
                ":email" => $email,
            );
            
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if (password_verify($password, $results['password']) ) {
                    return $results;
                }                
            }
        
        return 0;
    }
    
    public function findUser ( $email ) {
        $db = $this->getDB();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
            
        $binds = array (
                ":email" => $email,
            );
            
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                
                return true;              
            }
        
        return false;
    }
    
    public function getUserInfo ( $email, $password ) {
        $db = $this->getDB();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
            
        $binds = array (
                ":email" => $email,
            );
            
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if (password_verify($password, $results['password']) ) {
                    return $results;
                }                
            }
        
        return 0;
    }

}
