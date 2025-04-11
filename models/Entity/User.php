<?php

class User extends AbstractEntity 
{
    private string $username;
    private string $email;
    private string $password;
    private ?string $accountPicture = null;
    
    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getAccountPicture(): ?string
    {
        return $this->accountPicture;
    }

    public function setAccountPicture(string $accountPicture): void
    {
        $this->accountPicture = $accountPicture ?? 'default.png'; // Met une image par défaut si NULL
    }
    
    public function setUsername(string $username) : void
    {
        $this->username = $username;
    }
    
    public function getUsername() : string
    {
        return $this->username;
    }
    
    public function setPassword(string $password) : void 
    {
        $this->password = $password;
    }
    
    public function getPassword() : string 
    {
        return $this->password;
    }
}