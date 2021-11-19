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
            $response = (new Client())->get('https://api.aelf.org/v1/messes/2021-11-19/afrique');
            $contents = json_decode($response->getBody()->getContents(), true);
            echo json_encode($contents['messes'][0]['lectures'][0]);
        } catch (GuzzleException $e) {
        }

        return 0;
    }
}
