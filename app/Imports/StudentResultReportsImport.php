<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentResultReportsImport implements ToCollection, WithHeadingRow
{
    public $data = [];

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if (
                $row['student_id'] ||
                $row['roll_no'] ||
                $row['name'] ||
                $row['group'] ||
                $row['category'] ||
                $row['gender'] ||
                $row['date_of_birth'] ||
                $row['religion'] ||
                $row['fathers_name'] ||
                $row['mothers_name'] ||
                $row['mobile_no']
            ) {
                $this->data[] = [
                    'student_id' => $row['student_id'],
                    'roll_no' => $row['roll_no'],
                    'name' => $row['name'],
                    'group' => $row['group'],
                    'category' => $row['category'],
                    'gender' => $row['gender'],
                    'date_of_birth' => $row['date_of_birth'],
                    'religion' => $row['religion'],
                    'fathers_name' => $row['fathers_name'],
                    'mothers_name' => $row['mothers_name'],
                    'mobile_no' => $row['mobile_no']
                ];
            }
        }
    }
}
