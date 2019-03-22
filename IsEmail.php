<?php 

class IsEmail implements ValidationRuleInterface
{
    private $value;
    
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }
    public function isValid(): bool
    {
        return filter_var($this->value,FILTER_VALIDATE_EMAIL);
    }
    public function getMessage(): string
    {
        return 'El email no cumple con los requisitos';
    }
}

