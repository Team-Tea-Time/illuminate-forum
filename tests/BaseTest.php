<?php

namespace AndreasElia\Tests\Forum;

use Mockery;
use Tests\TestCase;

abstract class BaseTest extends TestCase
{
    /**
     * Tear down the test case.
     *
     * @return void
     */
    public function tearDown()
    {
        Mockery::close();
    }
}
