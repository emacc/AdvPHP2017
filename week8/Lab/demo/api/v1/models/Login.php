<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author 001351509
 */
class Login extends DBSpring{
    
    public function userLogin ( $email, $password ) {
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
