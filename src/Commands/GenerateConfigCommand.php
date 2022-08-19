<?php

namespace Realodix\Relax\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class GenerateConfigCommand extends Command
{
    /**
     * @var \Symfony\Component\Console\Output\OutputInterface
     */
    protected $output;

    /**
     * @var \Symfony\Component\Console\Input\InputInterface
     */
    protected $input;

    protected static $defaultName = 'init';

    private const FILE_NAME = '.php-cs-fixer.php';

    public function configure(): void
    {
        $this->setDescription('Generate PHP-CS-FIXER configuration file.');
    }

    /**
     * {@inheritdoc}
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $filename = self::FILE_NAME;

        if ($this->outputFileExists() && ! $this->overwriteExistingFile($input, $output)) {
            return Command::FAILURE;
        }

        if (! $this->generateAndSaveCode()) {
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
     */
    protected function generateAndSaveCode(): bool
    {
        $code = <<<'CODE'
            <?php
            use Realodix\Relax\Config;

            $localRules = [
                // ...
            ];

            return Config::create('@Realodix', $localRules);
            CODE;

        if (file_put_contents($this->getOutputFilename(), $code) === false) {
            $this->output->writeln('<comment>Failed to write to output file.</comment>');

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
