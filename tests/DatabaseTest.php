<?php

use Illuminate\Database\Eloquent\Model;

class DatabaseTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->migrate('up');
    }

    public function tearDown()
    {
        $this->migrate('down');
    }

    public function test_app_environment()
    {
        $this->assertEquals(App::environment(), 'testing');
    }

    public function test_insert_into_database()
    {
        $data = [
            'test1' => 'test1',
            'test2' => 'test2',
            'test3' => 'test3',
        ];
        $test = Test::create($data);
        // $result = $test->toArray();
        $this->assertEquals($test->id, 1);
        $this->assertEquals($test->test1, $data['test1']);
        $this->assertEquals($test->test2, $data['test2']);
        $this->assertEquals($test->test3, $data['test3']);
    }
}

class Test extends Model
{
    protected $guarded = ['id'];
}
