<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    use DatabaseMigrations, DatabaseTransactions;
}
