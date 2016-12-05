<?php

namespace Maxer\MaxerBundle\Command;

use Maxer\MaxerBundle\Domain\Analize\Finder;
use Maxer\MaxerBundle\Domain\Analize\Statistics;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class MaxerAnalizeCommand
 * @package Maxer\MaxerBundle\Command
 */
class MaxerAnalizeCommand extends ContainerAwareCommand
{
    /**
     *
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     */
    protected function configure()
    {
        $this
            ->setName('maxer:analize')
            ->setDescription('...')
            ->addArgument('argument', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     * @throws \Noodlehaus\Exception\EmptyDirectoryException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $maxer = $this->getContainer()->get('maxer.maxer');
        $maxer->login();

        $statistics = new Statistics($maxer);
        $finder = new Finder($maxer);

        $results = $finder->getContent('http://www.maxmodels.pl/modelka.html?filter%5Bsort%5D=active');

        foreach ($results as $result) {
            $views = $statistics->getViewsFromProfile('http://www.maxmodels.pl/' . $result);
            echo('Konto: ' . $result . "\t\t\twyświetlenia: " . $views . "\t\t\t\r\n");
        }
    }
}
