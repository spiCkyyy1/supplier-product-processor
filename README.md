# Supplier Product List Processor

## Requirements

- PHP 7+
- CSV File with product data

## Instructions

1. Clone this repository.
2. Place your input CSV file in the project directory.
3. Run the command:
  php parser.php --file=products_comma_separated.csv --unique-combinations=combination_count.csv
Replace `products_comma_separated.csv` with your input file.

## Features

- Processes CSV files with product data.
- Validates required fields (`make`, `model`).
- Counts unique product combinations.
- Saves the unique combination counts to `combination_count.csv`.

