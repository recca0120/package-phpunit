# Laravel Package Develop Phpunit

## Install

### step1
composer.json
```
require-dev: {
    "recca0120/package-phpunit": "~0.2.1"
}
```

composer install or composer update

### step2
copy phpunit.xml, tests folder to root

### step3
execute phpunit

This package is auto setup database [sqlite]

you can add migrations to database/migrations

and in your test case add code

```php
class DatabaseTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $app = App::getInstance();
        $app->migrate('up');
    }

    public function tearDown()
    {
        $app = App::getInstance();
        $app->migrate('down');
    }
}
```


## FULL DEMO

```php
use Illuminate\Database\Eloquent\Model;

class DatabaseTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $app = App::getInstance();
        $app->migrate('up');
    }

    public function tearDown()
    {
        $app = App::getInstance();
        $app->migrate('down');
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
```

## notice
### sqlite is not support alter table
