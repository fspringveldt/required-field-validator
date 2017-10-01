## SilverStripe Required field validator

This module adds a required field validation mechanism to DataObjects which can be used outside of the cms|controller|form context.
It does so by adding a hook to the `DataObject::validate()` method to check for statically configured fields.

## Installation ##

```composer require silverstripe/required-field-validator```

## Configuration/Usage instructions ##
Required fields can be set on a DataObject subclass by adding `private static $required_fields` to it as below

Configuration example:
```php
class MyObject extends DataObject
{
    private static $db = [
        'Title' => 'Varchar(20)'
    ];
    
    private static $required_fields = [
        'Title'
    ]
}
    
``` 

## Bugtracker ##

Bugs are tracked on [github.com](https://github.com/fspringveldt/required-field-validator/issues).