#!/usr/bin/php
<?php
require __DIR__ . '/vendor/autoload.php';

use splitbrain\phpcli\CLI;
use splitbrain\phpcli\Options;


class CliHelper extends CLI
{
    protected function setup(Options $options)
    {
        $options->registerCommand('migration:create', 'Create migration file');
    }

    protected function main(Options $options)
    {

    }
}

$cli = new CliHelper();
$cli->run();

// cmod +x cli.php