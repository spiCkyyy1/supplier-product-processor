<?php

class Application
{
    protected $parserFactory;
    protected $combinationCounter;

    public function __construct(ParserFactory $parserFactory, CombinationCounter $combinationCounter)
    {
        $this->parserFactory = $parserFactory;
        $this->combinationCounter = $combinationCounter;
    }

    public function run($file, $outputFile)
    {
        $parser = $this->parserFactory::createParser($file);
        $products = $parser->parse();

        foreach ($products as $product) {
            echo $product . PHP_EOL;
            $this->combinationCounter->addProduct($product);
        }

        $this->combinationCounter->saveToFile($outputFile);
    }
}