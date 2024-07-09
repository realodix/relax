<?php

namespace Realodix\Relax\Commands;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Generates the configuration file.
 *
 * @codeCoverageIgnore
 */
#[AsCommand(name: 'init')]
class GenerateConfigCommand extends Command
{
    private const FILE_NAME = '.php-cs-fixer.php';

    public function configure(): void
    {
        $this->setDescription('Generate PHP-CS-FIXER configuration file.');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $filename = self::FILE_NAME;

        if ($this->outputFileExists() && ! $this->overwriteExistingFile($input, $output)) {
            return Command::FAILURE;
        }

        if (! $this->generateAndSaveCode($output)) {
            return Command::FAILURE;
        }

        $output->writeln("<info>Successfully wrote configuration file '{$filename}'.</info>");

        return Command::SUCCESS;
    }

    /**
     * Returns true if the file should be overwritten, otherwise false.
     *
     * @param InputInterface  $input
     * @param OutputInterface $output
     */
    protected function overwriteExistingFile($input, $output): bool
    {
        $io = new SymfonyStyle($input, $output);
        $filename = $this->getOutputFilename();

        if (! $io->confirm("The file '{$filename}' already exists. Overwrite it?", false)) {
            $output->writeln('<comment>Not overwriting existing file.</comment>');

            return false;
        }

        return true;
    }

    /**
     * Returns the fully-qualified output filename.
     */
    protected function getOutputFilename(): string
    {
        return getcwd().DIRECTORY_SEPARATOR.self::FILE_NAME;
    }

    /**
     * Generates the configuration file and tries to write the contents to file.
     * Returns true on success or false if the file could not be written.
     *
     * @param OutputInterface $output
     */
    protected function generateAndSaveCode($output): bool
    {
        $code = <<<'CODE'
            <?php
            use Realodix\Relax\Config;
            use Realodix\Relax\Finder;

            $localRules = [
                // ...
            ];

            $finder = Finder::create()
                ->in(__DIR__)

            return Config::create('relax')
                ->setRules($localRules)
                ->setFinder($finder);
            CODE;

        if (file_put_contents($this->getOutputFilename(), $code) === false) {
            $output->writeln('<comment>Failed to write to output file.</comment>');

            return false;
        }

        return true;
    }

    /**
     * Returns true if the output file exists, otherwise false.
     */
    protected function outputFileExists(): bool
    {
        return file_exists($this->getOutputFilename())
            && ! is_dir($this->getOutputFilename());
    }
}
