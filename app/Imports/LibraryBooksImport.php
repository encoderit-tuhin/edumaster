<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LibraryBooksImport implements ToCollection, WithHeadingRow
{
    public $data = [];

    public function collection(Collection $rows)
    {

        foreach ($rows as $row) {
            // dd($row);

            if (
                isset($row['date']) ?? $row['date'] ||
                isset($row['scheme_no']) ?? $row['scheme_no'] ||
                isset($row['call_no']) ?? $row['call_no'] ||
                isset($row['writer_name']) ?? $row['writer_name'] ||
                isset($row['book_name']) ?? $row['book_name'] ||
                isset($row['book_copy_no']) ?? $row['book_copy_no'] ||
                isset($row['publisher']) ?? $row['publisher'] ||
                isset($row['year_of_publication']) ?? $row['year_of_publication'] ||
                isset($row['version']) ?? $row['version'] ||
                isset($row['price']) ?? $row['price'] ||
                isset($row['supplier']) ?? $row['supplier'] ||
                isset($row['total_page']) ?? $row['total_page'] ||
                isset($row['identify_page']) ?? $row['identify_page'] ||
                isset($row['comment']) ?? $row['comment'] ||
                isset($row['asset_no']) ?? $row['asset_no']
            ) {
                // $this->data[] = [
                //     'date' => $row['date'] ?? null,
                //     'scheme_no' => $row['scheme_no'] ?? null,
                //     'call_no' => $row['call_no'] ?? null,
                //     'writer_name' => $row['writer_name'] ?? null,
                //     'name' => $row['book_name'] ?? null,
                //     'book_copy_no' => $row['book_copy_no'] ?? null,
                //     'publisher' => $row['publisher'] ?? null,
                //     'publish_date' => $row['year_of_publication'] ?? null,
                //     'version' => $row['version'] ?? null,
                //     'price' => $row['price'] ?? null,
                //     'supplier' => $row['supplier'] ?? null,
                //     'total_page' => $row['total_page'] ?? null,
                //     'identify_page' => $row['identify_page'] ?? null,
                //     'description' => $row['comment'] ?? null,
                //     'asset_no' => $row['asset_no'] ?? null,
                // ];

                $this->data[] = [
                    'date' => $this->convertToUTF8($row['date'] ?? null),
                    'scheme_no' => $this->convertToUTF8($row['scheme_no'] ?? null),
                    'call_no' => $this->convertToUTF8($row['call_no'] ?? null),
                    'writer_name' => $this->convertToUTF8($row['writer_name'] ?? null),
                    'name' => $this->convertToUTF8($row['book_name'] ?? null),
                    'book_copy_no' => $this->convertToUTF8($row['book_copy_no'] ?? null),
                    'publisher' => $this->convertToUTF8($row['publisher'] ?? null),
                    'publish_date' => $this->convertToUTF8($row['year_of_publication'] ?? null),
                    'version' => $this->convertToUTF8($row['version'] ?? null),
                    'price' => $this->convertToUTF8($row['price'] ?? null),
                    'supplier' => $this->convertToUTF8($row['supplier'] ?? null),
                    'total_page' => $this->convertToUTF8($row['total_page'] ?? null),
                    'identify_page' => $this->convertToUTF8($row['identify_page'] ?? null),
                    'description' => $this->convertToUTF8($row['comment'] ?? null),
                    'asset_no' => $this->convertToUTF8($row['asset_no'] ?? null),
                ];
            }
        }
    }

    protected function convertToUTF8($value)
    {
        return mb_convert_encoding($value, 'UTF-8', 'auto');
    }
}
