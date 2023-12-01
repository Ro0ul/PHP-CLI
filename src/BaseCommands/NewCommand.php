<?php declare(strict_types=1);

namespace Roul\Cli\BaseCommands;
use Roul\Cli\Command;
use Roul\Cli\CommandsGatherer;

class NewCommand extends Command {
    public function __construct(
        protected string $name = "",
        protected string $description = "",
    ){
        CommandsGatherer::gather($this->name, $this->description, [$this,'execute']);
    }
    public function execute() : void 
    {
        
    }
}