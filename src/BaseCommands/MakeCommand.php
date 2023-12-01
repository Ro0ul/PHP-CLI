<?php declare(strict_types=1);

namespace Roul\Cli\BaseCommands;
use Roul\Cli\Command;
use Roul\Cli\CommandsGatherer;

class MakeCommand extends Command {
    public function __construct(
        protected string $name = "make:command",
        protected string $description = "",
    ){
        CommandsGatherer::gather($this->name, $this->description, [$this,'action']);
    }
    public function action() : void 
    {
        $fileName = $this->getAdditionalArguments()[1];
        $camelCaseName = strtoupper($fileName[0]) . substr($fileName,1) . "Commmand";

        $content = file_get_contents(__DIR__ . "/NewCommand.php");
        $content = str_replace("NewCommand", $camelCaseName, $content);
        $content = str_replace("namespace Roul\Cli\BaseCommands;","namespace Roul\Cli;",$content);
        
        
        file_put_contents(__DIR__ . "/../$camelCaseName.php",$content);
    }
}