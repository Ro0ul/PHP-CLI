# Roul-Cli

A PHP Console Application Library

# Prerequisites

. PHP >= 8.1 .
. Composer Installed .

# Installation 
  1. Install the package
  2. ```
        composer require roul/php-cli
     ```
  3. Make Sure you have dev as minimum stablity in the composer.json file
  4. Create A File With whatever Name You Want
  5. Insert This PHP Code into the file : 
  ```php 
      #!/usr/bin/php
    <?php

    require_once __DIR__ . "/vendor/autoload.php";

    use Roul\Cli\CommandsGatherer;

    $commands = include("Commands.php");

    foreach ($commands as $name => $command) {
        new $command;
    }

    CommandsGatherer::run();

  ``` 
  6. Create A "Commands.php" File That returns an array of all the commands you want
  7. If You want to use The Base Commands Just Import the Classes in the "Roul\Cli\BaseCommands" Directory 

  # Usage 

  ## Note These Commands will only work if you imported them ⚠

  ## Making Commands
  ```
    php <cli-name> make:command <command-name>
  ```
  
