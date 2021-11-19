<?php

namespace Alf;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class VersetCommand extends Command
{
    /**
     * @return void
     */
    protected function configure(): void
    {
        $this->setName('alf:verset');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $response = (new Client())->get(sprintf('https://api.aelf.org/v1/messes/%s/afrique',(new \DateTime())->format('Y-m-d')));
	    $contents = $response->getBody()->getContents();
	    echo $contents;
        } catch (GuzzleException $e) {
        }

        return 0;
    }
}
