<?php declare(strict_types=1);

namespace Roul\Cli;
use Roul\Cli\Kernel\Kernel;

class CommandsGatherer {

    private static array $commands = [];

    /**
     * Registers A new command to the static array commands variable
     * @var $name Name Of the command
     * @var $description Description of the command 
     * @var $method The Callback Provided by the Command class
     */
    public static function gather(
        string $name,
        string $description,
        mixed $method
    ){
        static::$commands[] = [
            $name,
            $description,
            $method
        ];   
    }
    /**
     * Runs The CommandsGatherer to then instantiate A new Kernel instance and then runs it
     */
    public static function run() 
    {
        $kernel = new Kernel(static::$commands);
        $kernel->run();
    }
}