<?php

namespace Tests;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->setPrerequisites();
    }

    /**
     * @return void
     */
    protected function setPrerequisites(): void
    {
        Eloquent::unguard();
    }
}
