<?php

namespace Roul\Cli;

class Command {
    public function __construct(
        protected string $name,
        protected string $description = "",
    ){
        CommandsGatherer::gather($this->name, $this->description, [$this,"action"]);
    }

    protected function getArguments() : array 
    {
        global $argv;

        return $argv;
    }
    protected function getAdditionalArguments() : array
    {
        global $argv;
        global $argc;

        $arguments = [];

        for($i = 1; $i < $argc;$i++){
            if($argv[$i]){
                $arguments[] = $argv[$i];
            }
        }
        return $arguments;
    }
    public function action() : void 
    {
        echo "Im Doing An Action >B)";
    }
}