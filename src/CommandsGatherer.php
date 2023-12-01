<?php declare(strict_types=1);

namespace Roul\Cli;
use Exception;
use Roul\Cli\Kernel\Kernel;

class CommandsGatherer {

    private static array $commands = [];
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
    public static function run() 
    {
        $kernel = new Kernel(static::$commands);
        $kernel->run();
    }
}