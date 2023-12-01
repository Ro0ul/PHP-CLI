<?php declare(strict_types=1);

namespace Roul\Cli\BaseCommands;
use Roul\Cli\Command;
use Roul\Cli\CommandsGatherer;

class HelpCommand extends Command{
    public function __construct(
        protected string $name = "help",
        protected string $description = "Lists all Available Commands",
    ){
        CommandsGatherer::gather($this->name, $this->description, [$this,'execute']);
    }
    public function execute() : void 
    {
        if(!empty(CommandsGatherer::$commands)){
            foreach(CommandsGatherer::$commands as $command){
                if(!$command[1]){
                    $description = "No Description Available";
                }else{
                    $description = $command[1];
                }
                $commandName = $command[0];
                echo "Name : $commandName \n";
                echo "Description : $description \n";
                echo "------------------ \n";
            }
            exit;
        }
        echo "No Commands Found... Make Sure You Add Commands";
    }
}