<?php

class Validator {
    protected $data;
    protected $errors = [];

    public function __construct($data) {
        $this->data = $data;
    }

    public function validate($rules) {
        foreach ($rules as $field => $fieldRules) {
            foreach ($fieldRules as $rule) {
                if ($rule === 'required' && empty(trim($this->data[$field] ?? ''))) {
                    $this->errors[$field] = "Le champ $field est obligatoire.";
                }
                if (str_starts_with($rule, 'min:')) {
                    $min = (int) explode(':', $rule)[1];
                    if (strlen(trim($this->data[$field] ?? '')) < $min) {
                        $this->errors[$field] = "Le champ $field doit contenir au moins $min caractères.";
                    }
                }
            }
        }
    }

    public function fails() {
        return !empty($this->errors);
    }

    public function errors() {
        return $this->errors;
    }
}