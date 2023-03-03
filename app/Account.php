<?php

namespace App;

class Account {

    private string $password;

    public function setPassword (string $password) : void {

        if (! preg_match ('/[$*%]/', $password)) {

            throw new \Exception ('MDP manque');    
        }
        
        $this->password = $password;
    }
}

?>