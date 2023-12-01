<?php declare(strict_types=1);

namespace Tests\Unit;

require_once(__DIR__ . "/../../vendor/autoload.php");

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Roul\Cli\BaseCommands\MakeCommand;

class MakeCommandTest extends TestCase {

    #[Test]
    public function commandIsCreated() : void
    {
        $makeCommand = new MakeCommand();
        
        $newCommand = $makeCommand->execute("Tests\Unit",__DIR__,"testing_test");

        $this->assertEquals(true,$newCommand);
    }
}