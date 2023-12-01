<?php 
use Roul\Cli\BaseCommands\CoffeeDispanser;
use Roul\Cli\BaseCommands\HelpCommand;
use Roul\Cli\BaseCommands\MakeCommand;

#Make sure you put the Name of the command as the key and the class name as the value
return [
    "make:command"=> MakeCommand::class,
    "coffee"=>CoffeeDispanser::class,
    "help"=>HelpCommand::class
];