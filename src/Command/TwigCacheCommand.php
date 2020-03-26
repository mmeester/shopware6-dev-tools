<?php declare(strict_types = 1);
/**
 * TwigCacheCommand
 *
 * @copyright Copyright © 2020 e-mmer. All rights reserved.
 * @author    maurits@e-mmer.nl
 */

namespace DevTools\Command;

use DevTools\Helper\DetectDirectory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Yaml\Yaml;

class TwigCacheCommand extends Command
{
    /**
     * @var string
     */
    protected static $defaultName = 'dev:twig-cache';

    protected function configure()
    {
        $this
            // the short description shown while running "php bin/console list"
            ->setDescription('Disable or enable twig template caching in yaml file')

            // configure an argument
            ->addArgument('state', InputArgument::REQUIRED, 'Do you want to enable or disable the twig cache')
        ;
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface   $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return int|void|null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $roots = DetectDirectory::detectInstallDirectory();

        if($roots===false){
            $output->write('<error>🚨🚨 Install directory not found 🚨🚨</error>', true);
            return;
        }

        $state = strtolower($input->getArgument('state'));
        if($state === 'enable' || $state === 'enabled') {
            $output->writeln([
                '',
                'Enabling Twig cache',
                '====================',
                '',
            ]);
            $cache = true;
        }elseif ($state === 'disable' || $state === 'disabled') {
            $output->writeln([
                '',
                'Disabling Twig cache',
                '====================',
                '',
            ]);
            $cache = false;
        }else {
            $output->writeln('<error>ERROR: missing variable enable or disable</error>');
            return;
        }

        $yaml = Yaml::parse(file_get_contents($roots['core'] . '/Framework/Resources/config/packages/twig.yaml'));

        $yaml['twig']['cache'] = $cache;

        $new_yaml = Yaml::dump($yaml);
        file_put_contents($roots['core'] . '/Framework/Resources/config/packages/twig.yaml', $new_yaml);

        $output->writeln([
            'Done...',
            '',
            'You might need to run <info>./psh.phar cache</info>'
        ]);
    }
}
