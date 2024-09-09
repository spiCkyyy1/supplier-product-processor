<?php

class ParserFactory
{
    public static function createParser($file)
    {
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        switch ($extension) {
            case 'csv':
                return new CsvParser($file);
            // In the future, we can add support for other formats like JSON, XML, etc.
            default:
                throw new Exception('Unsupported file format');
        }
    }
}