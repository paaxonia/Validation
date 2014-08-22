<?php  namespace Paaxonia\Validation;

use Paax\Validation\Exceptions\FormValidationException;
use Paax\Validation\FactoryInterface as ValidatorFactory;
use Paax\Validation\ValidatorInterface as ValidatorInstance;
use Input;

abstract class FormValidator {

    /**
     * @var ValidatorFactory
     */
    protected $validator;

    /**
     * @var ValidatorInstance
     */
    protected $validation;

    /**
     * @var array
     */
    protected $messages = [];

    /**
     * @var null
     */
    protected $name = null;

    /**
     * @param ValidatorFactory $validator
     */
    function __construct(ValidatorFactory $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Validate the supplied form data.
     *
     * @param array $formData
     * @throws \Paax\Validation\Exceptions\FormValidationException
     * @return bool
     */
    public function validate(array $formData = null)
    {
        $formData = $formData ?: Input::all();

        $this->validation = $this->validator->make(
            $formData,
            $this->getValidationRules(),
            $this->getValidationMessages()
        );

        if ($this->validation->fails())
        {
            throw new FormValidationException('Validation failed', $this->getValidationErrors(), $this->getFormName());
        }

        return true;
    }

    /**
     * Get the set form name.
     *
     * @return string|null
     */
    private function getFormName()
    {
        return $this->name;
    }

    /**
     * Get the set validation rules.
     *
     * @return array
     */
    private function getValidationRules()
    {
        return $this->rules;
    }

    /**
     * Get get any set validation messages.
     *
     * @return array
     */
    private function getValidationMessages()
    {
        return $this->messages;
    }

    /**
     * Get the validation errors.
     *
     * @return mixed
     */
    private function getValidationErrors()
    {
        return $this->validation->errors();
    }
}