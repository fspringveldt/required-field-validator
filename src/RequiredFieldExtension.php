<?php

namespace SilverStripe\RequiredFieldValidator;

use SilverStripe\Core\Config\Config;
use SilverStripe\ORM\DataExtension;
use SilverStripe\ORM\ValidationResult;

class RequiredFieldExtension extends DataExtension
{
    /**
     * A list of fields on this DataObject which must be set.
     * @var array
     */
    private static $required_fields = [];

    /**
     * Validates that any set required fields are set.
     *
     * @param ValidationResult $validationResult
     */
    public function validate(ValidationResult $validationResult)
    {
        $required_fields = Config::inst()->get(get_class($this->owner), 'required_fields');

        foreach ($required_fields as $key => $name) {
            $field = $this->owner->dbObject($name);
            if (empty($field->getValue())) {
                $validationResult->addError(
                    _t(
                        __CLASS__ . '.REQUIRED_FIELD',
                        '{field} is required',
                        ['field' => $name]
                    )
                );
            }
        }
    }
}