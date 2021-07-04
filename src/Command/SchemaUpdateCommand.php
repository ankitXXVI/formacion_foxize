<?php


namespace App\Command;


use RotateApp\Shared\Infraestructure\Doctrine\MysqlSchemaSQL;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SchemaUpdateCommand extends Command
{
    private MysqlSchemaSQL $mysqlUpdater;


    protected static $defaultName = 'app:schema:update-sql';

    /**
     * SchemaUpdateCommand constructor.
     * @param MysqlSchemaSQL $mysqlUpdater
     */
    public function __construct(MysqlSchemaSQL $mysqlUpdater)
    {
        parent::__construct();
        $this->mysqlUpdater = $mysqlUpdater;
    }

    protected function configure()
    {
        $this
        ->setDescription('Show SQL to execute.')
        ->setHelp('This command allows to show SQL to execute.')
    ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $output->writeln('SQL to execute:');

        $output->writeln(implode(';'.PHP_EOL,$this->mysqlUpdater->__invoke()));

        return Command::SUCCESS;

    }

}