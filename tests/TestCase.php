<?php


namespace AnyImage\Moderation\Tests;


use AnyImage\Moderation\ModerationFacade;
use AnyImage\Moderation\ModerationServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Define environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app[ 'config' ]->set('database.default', 'testbench');
        $app[ 'config' ]->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }


    /**
     * Setup the test environment.
     */
    protected function setUp() : void
    {
        parent::setUp();

        $this->artisan('migrate', ['--database' => 'testing']);
        // Your code here
    }

    protected function getPackageProviders($app)
    {
        return [ModerationServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return ['Moderation' => ModerationFacade::class];
    }

}
