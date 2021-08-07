<?php

namespace Tests\Suites;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * Abstract suite for repository base test cases
 * @package Tests\Suites
 */
abstract class RepositoryTestSuite extends TestCase
{
    use WithFaker;

    /**
     * @inheritdoc
     */
    protected function setPrerequisites():void
    {
        parent::setPrerequisites();
        $this->setRepository();
    }

    abstract public function setRepository();
}
