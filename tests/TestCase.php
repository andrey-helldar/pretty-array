<?php

namespace Tests;

use function file_get_contents;
use Helldar\PrettyArray\Services\Formatter;

use function implode;
use PHPUnit\Framework\TestCase as TestCaseFramework;

abstract class TestCase extends TestCaseFramework
{
    protected function service(): Formatter
    {
        return Formatter::make();
    }

    protected function path(string $filename): string
    {
        return implode(DIRECTORY_SEPARATOR, [__DIR__, 'stubs', $filename]);
    }

    protected function getFile(string $filename): string
    {
        return file_get_contents(
            $this->path($filename)
        );
    }

    protected function requireFile(string $filename): array
    {
        return require $this->path($filename);
    }

    protected function requireSource(): array
    {
        return $this->requireFile('source.php');
    }
}
