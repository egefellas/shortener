<?php

namespace Tests\Suites;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * Abstract suite for service base test cases
 * @package Tests\Suites
 */
abstract class ServiceTestSuite extends TestCase
{
    use WithFaker;

    /**
     * @inheritdoc
     */
    protected function setPrerequisites():void
    {
        parent::setPrerequisites();
        $this->setService();
    }

    abstract public function setService();
}
