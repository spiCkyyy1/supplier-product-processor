<?php

require_once 'src/Product.php';
require_once 'src/ProductException.php';
require_once 'src/CsvParser.php';
require_once 'src/CombinationCounter.php';
require_once 'src/ParserFactory.php';
require_once 'src/Application.php';

if ($argc < 3) {
    echo "Usage: php parser.php --file products_comma_separated.csv --unique-combinations=combination_count.csv" . PHP_EOL;
    exit(1);
}

$file = null;
$outputFile = null;

foreach ($argv as $arg) {
    if (strpos($arg, '--file=') === 0) {
        $file = substr($arg, 7);
    }
    if (strpos($arg, '--unique-combinations=') === 0) {
        $outputFile = substr($arg, 21);
    }
}

if (!$file || !$outputFile) {
    echo "Missing required arguments." . PHP_EOL;
    exit(1);
}

$application = new Application(new ParserFactory(), new CombinationCounter());
$application->run($file, $outputFile);