<?php

namespace Walther\T3crawler\Command;

use TYPO3\CMS\Core\Core\Environment;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CrawlerCommand extends Command
{
    /**
     * @return void
     */
    protected function configure(): void
    {
        $this
            ->setDescription('Crawl websites with ease.')
            ->addOption(
                'count',
                'c',
                InputOption::VALUE_OPTIONAL,
                'Maximum count of urls to crawl'
            )
            ->addOption(
                'output',
                'o',
                InputOption::VALUE_OPTIONAL,
                'Path to results csv file'
            )
            ->addOption(
                'url',
                'u',
                InputOption::VALUE_REQUIRED,
                'URL to crawl, eg. https://www.your-website.com/sitemap.xml'
            );
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return mixed
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $binary = 'crawler-' . $this->getOsFamily() . '-' . $this->getOsVersion() . ($this->getOsFamily() === 'windows' ? '.exe' : '');
        $binaryPath = Environment::getExtensionsPath() . '/t3crawler/Resources/bin/';

        if (file_exists($binaryPath . $binary)) {

            $options = [
                $input->getOption('url') ? '-url "' . $input->getOption('url') . '"' : '',
                $input->getOption('count') ? '-count ' . $input->getOption('count') : '',
                $input->getOption('output') ? '-output "' . $input->getOption('output') . '"' : ''
            ];

            $cmd = '"' . $binaryPath . $binary . '" ' . implode(' ', $options);

            exec($cmd, $output, $status);

            $output->writeln('Ended with status: ' . $status);

            return 0;
        }

        return 0;
    }

    /**
     * @return string|null
     */
    private function getOsFamily(): ?string
    {
        switch (PHP_OS_FAMILY) {
            case 'Windows':
                return 'windows';
            case 'BSD':
                return 'freebsd';
            case 'Darwin':
                return 'darwin';
            case 'Linux':
                return 'linux';
        }

        return null;
    }

    /**
     * @return string|null
     */
    private function getOsVersion(): ?string
    {
        switch (PHP_INT_SIZE) {
            case 4:
                return 'x86';
            case 8:
                return 'amd64';
        }

        return null;
    }
}
