<?php

namespace cva67\phpmvc\app;

use cva67\phpmvc\database\DbModel;

abstract class BaseModel extends DbModel
{
    private array $errors = [];
    protected array $data = [];

    protected const RULE = [
        "required" => "Your {field} is required",
        "max" => "Your {field} accepts maximum {max} digit",
        'min' => "Your {field} accepts minimum {min} digit",
        'email' => "Your {field} is not valid",
        'integer' => "Your {field} is not a number",
        'match' => "Your {field} is not match"
    ];

    public  function load(array $body)
    {
        foreach ($body as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = trim($value);
                $this->data[$key] = trim($value);
            }
        }
        return $this->data;
    }

    abstract public function rules(): array;

    public  function validate()
    {
        return $this->applyRules();
    }

    public function applyRules()
    {

        foreach ($this->rules() as $attributes => $values) {
            $isRequired = false;

            $data = $this->{$attributes};

            foreach ($values ?? [] as $key => $val) {

                $rule = explode(':', $val);

                if ($rule[0] === 'required' && !$data) {
                    $isRequired = true;
                    $this->addError($attributes, $rule[0]);
                }
                if (!$isRequired && $data) {

                    if ($rule[0] === 'max' && strlen($data) > $rule[1] ?? 0) {
                        $this->addError($attributes, $rule[0], $rule[1]);
                    }
                    if ($rule[0] === 'min' && strlen($data) < $rule[1] ?? 0) {
                        $this->addError($attributes, $rule[0], $rule[1]);
                    }
                    if ($rule[0] === 'email') {
                        if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
                            $this->addError($attributes, $rule[0]);
                        }
                    }
                    if ($rule[0] === 'integer') {
                        if (!filter_var($data, FILTER_VALIDATE_INT)) {
                            $this->addError($attributes, $rule[0]);
                        }
                    }

                    if ($rule[0] === 'match' && $data !== $this->{$rule[1]}) {
                        $this->addError($attributes, $rule[0], $rule[1]);
                    }
                }
            }
        }
        return empty($this->errors);
    }

    public function addError(string $attributes, string $rule, string $val = '')
    {

        $message = self::RULE[$rule];
        $message = str_replace('{field}', $attributes, $message);

        if ($rule) {
            $r = '{' . $rule . '}';
            $message = str_replace($r, $val, $message);
        }

        $this->errors[$attributes] = $message;
    }
    public function addCustomError(string $attributes, string $message)
    {


        $this->errors[$attributes] = $message;
    }
    public function hasError($attribute)
    {
        return $this->errors[$attribute] ?? false;
    }
    public function save()
    {
        // if (!$this->validate()) {
        //     return false;
        // }
        return parent::save();
    }
}
