<?php declare(strict_types=1);

namespace Roul\Cli\BaseCommands;
use Jawira\CaseConverter\Convert;
use PhpParser\Node\NullableType;
use Roul\Cli\Command;
use Roul\Cli\CommandsGatherer;

class MakeCommand extends Command {

    public function __construct(
        protected string $name = "make:command",
        protected string $description = "",
    ){
        CommandsGatherer::gather($this->name, $this->description, [$this,'execute']);
    }
    /**
     * Creates a new command
     * @param string $namespace the namespace of the command class
     * @param string $directory the directory of the command
     * @param string $fileName command File name
     */
    public function execute(?string $namespace = null, ?string $directory = null, ?string $fileName = NullableType) : bool | int
    {
        if(!$fileName){
            $fileName = $this->getAdditionalArguments()[1];
        }
        $convert = new Convert($fileName);
        $camelCaseName = $convert->toCamel();

        if(!str_contains($camelCaseName,"Command")){
            $camelCaseName = $camelCaseName . "Command";
        }
        if(!$namespace){
            $namespace = readline("File Namespace : ");
        }
        $content = file_get_contents(__DIR__ . "/NewCommand.php");
        $content = str_replace("NewCommand", $camelCaseName, $content);
        $content = str_replace("namespace Roul\Cli\BaseCommands;","namespace $namespace;",$content);

        if(!$directory){
            $directory = "";
            $fileDirectory = readline("File Directory : [root : Application ROOT , costum : Costum Directory]");


            switch($fileDirectory){
                case "root" :
                    $directory = $_SERVER["DOCUMENT_ROOT"];
                    break;
                case "costum" : 
                    $directory = readline("Directory : ! the current Directory is the one in which you're in at the terminal " . PHP_EOL);
                    break;
                default:
                    echo "Please Enter A Valid Argument";
                    die();
            }
        }
        if(!empty($directory)){
            return file_put_contents($directory . "/$camelCaseName.php",$content);
        }
        return file_put_contents($directory . "$camelCaseName.php",$content);
    }
        
}