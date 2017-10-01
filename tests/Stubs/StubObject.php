<?php

namespace SilverStripe\RequiredFieldValidator\Tests\Stubs;

use SilverStripe\Dev\TestOnly;
use SilverStripe\ORM\DataObject;

class StubObject extends DataObject implements TestOnly
{
    private static $table_name = 'StubObject';

    private static $db = [
        'Title' => 'Varchar(20)'
    ];

    private static $required_fields = [
        'Title'
    ];
}