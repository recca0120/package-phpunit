<?php

class ApplicationTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
    }

    public function tearDown()
    {
    }

    public function test_application_base_path()
    {
        $this->assertEquals(
            realpath(Application::getInstance()->basePath()),
            __DIR__
        );
    }
}
