<?php

Interface ValidatorInterface 
{
    public function __construct(object $obj, array $rules = []);
    public function validate();
}