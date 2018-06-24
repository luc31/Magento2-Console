<?php

namespace Canonge\Consolemodule\Console;

use Canonge\Consolemodule\Service\Module;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateModuleCommand extends Command
{

    const NAME = 'Tp_Exo1';
    protected $_module;


    public function __construct(Module $moduleList)
    {
        $this->_module = $moduleList;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('example:greeting')
            ->setDescription('Greeting command')
            ->setDefinition(
                [
                    new InputArgument(
                        self::NAME,
                        InputArgument::OPTIONAL,
                        'Veuillez a renseigner le nom du module ex : Coca_Slider'
                    ),

                ]
            );
        parent::configure();

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ( !$input->getArgument(self::NAME)) {
            $desc = $this->getDefinition()->getArgument(1)->getDescription();
            $output->writeln($desc);
        } else {
            $name =$input->getArgument(self::NAME);
            $output->writeln($name);
           $this->_module->createModule($name);
        }

    }

}