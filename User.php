<?php

class User
{
    private $email;
    private $password;
    private $remember = false;

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function remember()
    {
        $this->remember = true;
        return $this;
    }

    public function forget()
    {
        $this->remember = false;
        return $this;
    }

    public function isRemember()
    {
        return $this->remember;
    }
    public function getValidationRules()
    {
        return [
            'email' => ['isNotEmptyRule', 'isEmail'],
            'password' => ['isSecurePassword'],
        ];
    }
}
