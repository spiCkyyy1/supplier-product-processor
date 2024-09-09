<?php

class CsvParser
{
    protected $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function parse()
    {
        $products = [];
        if (($handle = fopen($this->file, 'r')) !== false) {
            $headers = fgetcsv($handle, 1000, ',');
            while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                $data = array_combine($headers, $row);
                $products[] = new Product(
                    $data['make'] ?? null,
                    $data['model'] ?? null,
                    $data['colour'] ?? null,
                    $data['capacity'] ?? null,
                    $data['network'] ?? null,
                    $data['grade'] ?? null,
                    $data['condition'] ?? null
                );
            }
            fclose($handle);
        }
        return $products;
    }
}