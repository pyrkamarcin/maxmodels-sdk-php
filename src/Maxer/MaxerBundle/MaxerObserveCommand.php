<?php

namespace Maxer\MaxerBundle\Command;

use Maxer\MaxerBundle\Domain\Analize\Models;
use Maxer\MaxerBundle\Domain\Analize\Statistics;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class MaxeObserveCommand
 * @package Maxer\MaxerBundle\Command
 */
class MaxerObserveCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('maxer:observe')
            ->setDescription('...');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $maxer = $this->getContainer()->get('maxer.maxer');
        $maxer->login();

        $models = new Models($maxer, 1);
        $dataids = $models->getModels();

        $output->writeln('Dodawanie profili:');

        foreach ($dataids as $dataid) {

            $output->write("\tDodano: " . $dataid . '');

            $maxer->client->post("http://www.maxmodels.pl/user/observe", [
                'form_params' => [
                    'act' => "ADD",
                    'id' => $dataid,
                    't' => $maxer->getTValue()
                ],
                'cookies' => $maxer->jar
            ]);

            $output->writeln("\t ( ok )");

            sleep(1);
        }

        $output->writeln('Dodano profile do obserwowanych.');

        $stats = new Statistics($maxer);
        $output->writeln('Jest: ' . $stats->getObserved());
    }
}
