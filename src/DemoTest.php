<?php

use Mockery as m;

class EmailTemplateTest extends PHPUnit_Framework_TestCase
{
    use Laravel;

    public function setUp()
    {
        $this->migrate('up');
    }
    
    public function tearDown()
    {
        m::close();
        $this->migrate('down');
        $this->destroyApplication();
    }
    
    public function test_application() {
        $app = $this->createApplication();
    }
}
