<?php

abstract class Validator implements ValidatorInterface
{
    protected $obj;
    protected $rules = [];
    protected $errors = [];
    protected $rulesValidators = [
        'isNotEmptyRule' => isNotEmptyRule::class,
        'isEmail' => isEmail::class,
        'isSecurePassword' => isSecurePassword::class,

    ];

    public function __construct(object $obj, array $rules = [])
    {
        $this->obj = $obj;
        $this->rules = $rules;
    }

    abstract public function validate();

    protected function addError(string $attribute, string $message)
    {
        $this->errors[$attribute] = $message;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
