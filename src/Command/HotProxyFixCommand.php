<?php declare(strict_types = 1);
/**
 * HotProxyCommand
 *
 * @copyright Copyright © 2020 e-mmer. All rights reserved.
 * @author    maurits@e-mmer.nl
 */

namespace DevTools\Command;

use DevTools\Helper\DetectDirectory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HotProxyFixCommand extends Command
{
    /**
     * @var string
     */
    protected static $defaultName = 'dev:hot-proxy-fix';

    protected function configure()
    {
        $this
            // the short description shown while running "php bin/console list"
            ->setDescription('Fixes the shopware hot-proxy for non kubernetes projects')
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

        var_dump ( DetectDirectory::detectInstallDirectory() );
//        $output->writeln([
//            '',
//            'Copying fix to vendor folder',
//            '============================',
//            '',
//        ]);
//
//        copy(dirname(__DIR__) . '/Resources/proxy-server-hot/index.js', 'vendor/shopware/platform/src/Storefront/Resources/app/storefront/build/proxy-server-hot/index.js');
//
//        $output->writeln([
//            'Done...',
//            '',
//            'Run commands like you always do for development: <info>./psh.phar storefront:hot-proxy</info>'
//        ]);
    }
}
