<?php

class CombinationCounter
{
    protected $combinations = [];

    public function addProduct(Product $product)
    {
        $key = implode('|', [
            $product->make,
            $product->model,
            $product->colour,
            $product->capacity,
            $product->network,
            $product->grade,
            $product->condition
        ]);

        if (!isset($this->combinations[$key])) {
            $this->combinations[$key] = 0;
        }

        $this->combinations[$key]++;
    }

    public function saveToFile($outputFile)
    {
        $file = fopen($outputFile, 'w');
        fputcsv($file, ['make', 'model', 'colour', 'capacity', 'network', 'grade', 'condition', 'count']);

        foreach ($this->combinations as $combination => $count) {
            $fields = explode('|', $combination);
            fputcsv($file, array_merge($fields, [$count]));
        }

        fclose($file);
    }
}