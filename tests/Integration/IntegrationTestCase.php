<?php

namespace Realodix\Relax\Tests\Integration;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Input\StringInput;

abstract class IntegrationTestCase extends TestCase
{
    protected function setUp(): void
    {
        $this->clearTempDirectory();
    }

    protected function tearDown(): void
    {
        $this->clearTempDirectory();
    }

    /**
     * @throws \Exception
     */
    protected function testFixture(string $name, ?string $suffix = null): void
    {
        $fileName = $name;

        if (! is_null($suffix)) {
            $fileName = $fileName.'-'.$suffix;
        }

        copy(__DIR__."/../Fixtures/Ruleset/{$fileName}_actual.php", __DIR__."/tmp/{$fileName}.php");

        $this->assertTrue(
            $this->runFixer($name),
            "Fixture fixtures/{$fileName} was not proceeded properly.",
        );

        $this->assertFileEquals(
            __DIR__."/../Fixtures/Ruleset/{$fileName}_expected.php",
            __DIR__."/tmp/{$fileName}.php",
            "Result of proceeded fixture fixtures/{$fileName} is not equal to expected.",
        );
    }

    /**
     * @throws \Exception
     */
    protected function runFixer(string $name): bool
    {
        $application = new \PhpCsFixer\Console\Application;
        $application->setAutoExit(false);

        $config = "tests/Integration/Config/config_{$name}.php";
        $result = $application->run(
            new StringInput("fix --config={$config} --quiet"),
            new \Symfony\Component\Console\Output\BufferedOutput,
        );

        return $result === 0;
    }

    protected function clearTempDirectory(): void
    {
        $files = glob(__DIR__.'/tmp/*.php');

        foreach ($files as $file) {
            unlink($file);
        }
    }
}
