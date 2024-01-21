<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LeaveSeeder::class,
            SliderSeeder::class,
            AuthSeeder::class,
            UserSeeder::class,
            RoleTableSeeder::class,
            PermissionTableSeeder::class,
            RoleHasPermissionTableSeeder::class,
            RolePermissionSeeder::class,
            ParentModelTableSeeder::class,
            MediaCategorySeeder::class,
            MediaMujibGallerySeeder::class,
            MediaSeeder::class,
            PicklistSeeder::class,
            SubjectsTableSeeder::class,
            ClassSeeder::class,
            SectionSeeder::class,
            StudentGroupSeeder::class,
            SalaryHeadSeeder::class,
            PaymentMethodSeeder::class,
            TeacherSeeder::class,
            StaffSeeder::class,
            DepartmentSeeder::class,
            UtilitySeeder::class,
            PostCategorySeeder::class,
            PageSeeder::class,
            SiteNavigationSeeder::class,
            ClubSeeder::class,
            // BookSeeder::class,
            InventorySeeder::class,
            ExamTableSeeder::class,
            GradesSeeder::class,
            MarksTableSeeder::class,
            MarkDetailsSeeder::class,
            ExamSchedulesTableSeeder::class,
            AccountingCategoryTableSeeder::class,
            AccountingGroupTableSeeder::class,
            AccountingLedgerTableSeeder::class,
            AccountingFundTableSeeder::class,
            SmsTemplateSeeder::class,
            FeeHeadTableSeeder::class,
            FeeSubHeadTableSeeder::class,
            FeeWaiverTableSeeder::class,
            BankAccountSeeder::class,
            StudentCategoryTableSeeder::class,
            PeriodTableSeeder::class,
            WaiverTableSeeder::class,
            AttendanceTimeConfigTableSeeder::class,
            ExamAttendanceTableSeeder::class,
            ExamTypeSeeder::class,
            StudentOnlineRegistrationTableSeeder::class,
            StudentSeeder::class,
            StudentSessionTableSeeder::class,
        ]);
    }
}
