<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleHasPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [1, 1],
            [1, 2],
            [2, 1],
            [2, 2],
            [3, 1],
            [3, 2],
            [4, 1],
            [4, 2],
            [5, 1],
            [5, 2],
            [6, 1],
            [7, 1],
            [8, 1],
            [9, 1],
            [10, 1],
            [11, 1],
            [12, 1],
            [13, 1],
            [14, 1],
            [15, 1],
            [16, 1],
            [17, 1],
            [17, 2],
            [18, 1],
            [18, 2],
            [19, 1],
            [19, 2],
            [20, 1],
            [20, 2],
            [21, 1],
            [21, 2],
            [22, 1],
            [22, 2],
            [23, 1],
            [23, 2],
            [24, 1],
            [24, 2],
            [25, 1],
            [26, 1],
            [27, 1],
            [28, 1],
            [29, 1],
            [30, 1],
            [31, 1],
            [32, 1],
            [33, 1],
            [34, 1],
            [35, 1],
            [36, 1],
            [37, 1],
            [38, 1],
            [39, 1],
            [40, 1],
            [41, 1],
            [42, 1],
            [43, 1],
            [44, 1],
            [45, 1],
            [46, 1],
            [47, 1],
            [48, 1],
            [49, 1],
            [50, 1],
            [51, 1],
            [52, 1],
            [53, 1],
            [54, 1],
            [55, 1],
            [56, 1],
            [57, 1],
            [58, 1],
            [59, 1],
            [60, 1],
            [61, 1],
            [62, 1],
            [63, 1],
            [64, 1],
            [65, 1],
            [66, 1],
            [67, 1],
            [68, 1],
            [69, 1],
            [70, 1],
            [71, 1],
            [72, 1],
            [73, 1],
            [74, 1],
            [75, 1],
            [76, 1],
            [77, 1],
            [78, 1],
            [79, 1],
            [80, 1],
            [81, 1],
            [82, 1],
            [83, 1],
            [84, 1],
            [85, 1],
            [86, 1],
            [87, 1],
            [88, 1],
            [89, 1],
            [90, 1],
            [91, 1],
            [92, 1],
            [93, 1],
            [94, 1],
            [95, 1],
            [96, 1],
            [97, 1],
            [98, 1],
            [98, 2],
            [99, 1],
            [99, 2],
            [100, 1],
            [100, 2],
            [101, 1],
            [101, 2],
            [102, 1],
            [102, 2],
            [103, 1],
            [103, 2],
            [104, 1],
            [104, 2],
            [105, 1],
            [105, 2],
            [106, 1],
            [106, 2],
            [107, 1],
            [107, 2],
            [108, 1],
            [108, 2],
            [109, 1],
            [109, 2],
            [110, 1],
            [110, 2],
            [111, 1],
            [111, 2],
            [112, 1],
            [112, 2],
            [113, 1],
            [113, 2],
            [114, 1],
            [114, 2],
            [115, 1],
            [115, 2],
            [116, 1],
            [116, 2],
            [117, 1],
            [117, 2],
            [118, 1],
            [118, 2],
            [119, 1],
            [119, 2],
            [120, 1],
            [120, 2],
            [121, 1],
            [121, 2],
            [122, 1],
            [122, 2],
            [123, 1],
            [123, 2],
            [124, 1],
            [124, 2],
            [125, 1],
            [125, 2],
            [126, 1],
            [126, 2],
            [127, 1],
            [127, 2],
            [128, 1],
            [128, 2],
            [129, 1],
            [129, 2],
            [130, 1],
            [130, 2],
            [131, 1],
            [131, 2],
            [132, 1],
            [132, 2],
            [133, 1],
            [133, 2],
            [134, 1],
            [134, 2],
            [135, 1],
            [135, 2],
            [136, 1],
            [136, 2],
            [137, 1],
            [137, 2],
            [138, 1],
            [138, 2],
            [139, 1],
            [139, 2],
            [140, 1],
            [140, 2],
            [141, 1],
            [141, 2],
            [142, 1],
            [142, 2],
            [143, 1],
            [143, 2],
            [144, 1],
            [144, 2],
            [145, 1],
            [145, 2],
            [146, 1],
            [146, 2],
            [147, 1],
            [147, 2],
            [148, 1],
            [148, 2],
            [149, 1],
            [149, 2],
            [150, 1],
            [150, 2],
            [151, 1],
            [151, 2],
            [152, 1],
            [152, 2],
            [153, 1],
            [153, 2],
            [154, 1],
            [154, 2],
            [155, 1],
            [155, 2],
            [156, 1],
            [156, 2],
            [157, 1],
            [157, 2],
            [158, 1],
            [158, 2],
            [159, 1],
            [159, 2],
            [160, 1],
            [160, 2],
            [161, 1],
            [161, 2],
            [162, 1],
            [162, 2],
            [163, 1],
            [163, 2],
            [164, 1],
            [164, 2],
            [165, 1],
            [165, 2],
            [166, 1],
            [166, 2],
            [167, 1],
            [167, 2],
            [168, 1],
            [168, 2],
            [169, 1],
            [169, 2],
            [170, 1],
            [170, 2],
            [171, 1],
            [171, 2],
            [172, 1],
            [172, 2],
            [173, 1],
            [173, 2],
            [174, 1],
            [174, 2],
            [175, 1],
            [175, 2],
            [176, 1],
            [176, 2],
            [177, 1],
            [177, 2],
            [178, 1],
            [178, 2],
            [179, 1],
            [179, 2],
            [180, 1],
            [180, 2],
            [181, 1],
            [181, 2],
            [182, 1],
            [182, 2],
            [183, 1],
            [183, 2],
            [184, 1],
            [184, 2],
            [185, 1],
            [185, 2],
            [186, 1],
            [186, 2],
            [187, 1],
            [187, 2],
            [188, 1],
            [188, 2],
            [189, 1],
            [189, 2],
            [190, 1],
            [190, 2],
            [191, 1],
            [191, 2],
            [192, 1],
            [192, 2],
            [193, 1],
            [193, 2],
            [194, 1],
            [194, 2],
            [195, 1],
            [195, 2],
            [196, 1],
            [196, 2],
            [197, 1],
            [197, 2],
            [198, 1],
            [198, 2],
            [199, 1],
            [199, 2],
            [200, 1],
            [200, 2],
            [201, 1],
            [201, 2],
            [202, 1],
            [202, 2],
            [203, 1],
            [204, 1],
            [205, 1],
            [206, 1],
            [207, 1],
            [208, 1],
            [209, 1],
            [210, 1],
            [211, 1],
            [212, 1],
            [212, 2],
            [213, 1],
            [213, 2],
            [214, 3],
            [215, 4],
        ];

        $chunkSize = 100; // Number of records to insert at a time
        $chunks = array_chunk($data, $chunkSize);

        foreach ($chunks as $chunk) {
            $query = "INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ";

            $valueStrings = [];
            foreach ($chunk as $row) {
                $values = implode(", ", array_map(function ($value) {
                    return is_null($value) ? 'NULL' : "'" . addslashes($value) . "'";
                }, array_values($row)));
                $valueStrings[] = "(" . $values . ")";
            }

            $query .= implode(", ", $valueStrings);

            // Execute the SQL statement
            DB::statement($query);
        }
    }
}