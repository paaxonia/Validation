<?php  namespace Paaxonia\Validation\Exceptions;

use Exception;

class FormValidationException extends Exception{

    /**
     * @var mixed
     */
    protected $errors;

    /**
     * @var null
     */
    protected $name;

    /**
     * @param string $message
     * @param mixed  $errors
     * @param null   $name
     */
    function __construct($message, $errors, $name = null)
    {
        $this->errors = $errors;
        $this->name = $name;

        parent::__construct($message);
    }

    /**
     * Get the form validation errors.
     *
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Check if the form has a supplied name.
     *
     * @return bool
     */
    public function hasName()
    {
        return ( ! is_null($this->name));
    }

    /**
     * Get the name value.
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}