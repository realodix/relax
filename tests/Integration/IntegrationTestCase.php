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
            file_exists(__DIR__."/tmp/{$fileName}.php"),
            "Fixture fixtures/{$fileName} does not exist.",
        );

        $this->assertTrue(
            is_writable(__DIR__."/tmp/{$fileName}.php"),
            "Fixture fixtures/{$fileName} is not writable.",
        );

        $this->assertFalse(
            $this->runFixer($name),
            "Fixture fixtures/{$fileName} returned invalid true result.",
        );

        $this->assertTrue(
            $this->runFixer($name, true),
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
    protected function runFixer(string $name, bool $fix = false): bool
    {
        $dryRun = $fix ? '' : '--dry-run';

        $application = new \PhpCsFixer\Console\Application;
        $application->setAutoExit(false);

        $output = new \Symfony\Component\Console\Output\BufferedOutput;
        $config = "tests/Integration/Config/config_{$name}.php";
        $result = $application->run(new StringInput("fix {$dryRun} --diff --config={$config} --quiet"), $output);

        return $result === 0;
    }

    protected function clearTempDirectory(): void
    {
        $files = glob(__DIR__.'/tmp/*.php');

        foreach ($files as $file) {
            unlink($file);
        }
    }

    protected function getConfigPath(): string
    {
        return 'tests/Integration/config/config_relax.php';
    }
}
