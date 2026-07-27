<?php

namespace Tests;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    private string $compiledViewsPath;

    protected function setUp(): void
    {
        parent::setUp();

        $this->compiledViewsPath = sys_get_temp_dir()
            .DIRECTORY_SEPARATOR
            .'cv-portfolio-tests-'
            .getmypid()
            .DIRECTORY_SEPARATOR
            .'views';

        (new Filesystem)->ensureDirectoryExists($this->compiledViewsPath);

        config()->set('view.compiled', $this->compiledViewsPath);
    }

    protected function tearDown(): void
    {
        (new Filesystem)->deleteDirectory($this->compiledViewsPath);

        parent::tearDown();
    }
}
