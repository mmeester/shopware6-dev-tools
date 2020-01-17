<?php declare(strict_types=1);
/**
 * AliasCommand
 *
 * @copyright Copyright © 2020 e-mmer. All rights reserved.
 * @author    maurits@e-mmer.nl
 */

namespace DevTools\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AliasCommand extends Command
{
    /**
     * @var string
     */
    protected static $defaultName = 'dev:create-alias';

    protected function configure()
    {
        $this
            // the short description shown while running "php bin/console list"
            ->setDescription('Create <info>sw</info> alias to use Shopware commands');
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface   $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return int|void|null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $alias = 'alias sw="./psh.phar"';
        $user = posix_getpwuid(posix_getuid());
        $home_dir = $user['dir'];

        if (file_exists($home_dir . '/.zshrc')) {
            $profile = '/.zshrc';
        } else {
            if (file_exists($home_dir . '/.bashrc')) {
                $profile = '/.bashrc';
            } else {
                $output->writeln('<error>Profile not found, please add alias: ' . $alias . ' manually</error>');

                return;
            }
        }

        $output->writeln([
            '',
            'Creating alias in <comment>~' . $profile . '</comment>',
            '==========================',
            '',
        ]);

        file_put_contents($home_dir.$profile, "\n" . $alias . "\n", FILE_APPEND);

        $output->writeln([
            'Done...',
            '',
            'Restart your terminal or run <info>source ~' . $profile . '</info>',
            'After that use <comment>sw</comment> instead of ./psh.phar'
        ]);
    }
}
