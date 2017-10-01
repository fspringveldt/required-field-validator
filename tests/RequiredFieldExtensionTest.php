<?php

namespace SilverStripe\RequiredFieldValidator;

use SilverStripe\Core\Config\Config;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\RequiredFieldValidator\Tests\Stubs\StubObject;

class RequiredFieldExtensionTest extends SapphireTest
{
    /**
     * @var StubObject
     */
    private $stub;

    protected static $extra_dataobjects = [
        StubObject::class,
    ];

    protected function setUp()
    {
        $this->stub = StubObject::create();
        return parent::setUp();
    }

    /**
     * @expectedException Silverstripe\ORM\ValidationException
     * @expectedExceptionMessage Title is required
     */
    public function testCannotWriteDataObjectWithoutSettingRequiredFields()
    {
        $this->stub->write();
    }

    public function testCanWriteDataObjectIfNoRequiredFieldsSet()
    {
        Config::modify()->set(get_class($this->stub), 'required_fields', []);
        $this->assertGreaterThan(0, $this->stub->write());
    }
}