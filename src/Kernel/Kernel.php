<?php declare(strict_types=1);

namespace Roul\Cli\Kernel;
use Exception;

class Kernel {
    public function __construct(
        private array $commands
    ){}
    public function run()
    {
        global $argv;
        $keyIsFound = false;
        foreach ($this->commands as $command) {
            $commandName = $command[0];
            $commandDesc = $command[1];
            $commandCallback = $command[2];
            $inputName = str_replace(" ","",$argv[1]);
            if($inputName == $commandName){
               $keyIsFound = true;
               break;
            }
        }
        if($keyIsFound){
            return call_user_func($commandCallback);
        }
        throw new Exception("Command Not Found");
    }

}