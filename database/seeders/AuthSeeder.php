<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Default Roles
		DB::table('permission_roles')->insert([
			[
				'role_name' => 'Super Admin',
				'created_at' => now(),
				'updated_at' => now(),
			],
			[
				'role_name' => 'Admin',
				'created_at' => now(),
				'updated_at' => now(),
			],
			[
				'role_name' => 'Teacher',
				'created_at' => now(),
				'updated_at' => now(),
			],
			[
				'role_name' => 'Student',
				'created_at' => now(),
				'updated_at' => now(),
			],
			[
				'role_name' => 'Parent',
				'created_at' => now(),
				'updated_at' => now(),
			],
		]);

		//Default Permissions
		// DB::table('permissions')->insert([
		// 	[
		// 		'name' => 'manage-users',
		// 		'display_name' => 'Manage Users',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-roles',
		// 		'display_name' => 'Manage Roles',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-permissions',
		// 		'display_name' => 'Manage Permissions',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-settings',
		// 		'display_name' => 'Manage Settings',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-academic-year',
		// 		'display_name' => 'Manage Academic Year',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-class',
		// 		'display_name' => 'Manage Class',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-section',
		// 		'display_name' => 'Manage Section',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-subject',
		// 		'display_name' => 'Manage Subject',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-exam',
		// 		'display_name' => 'Manage Exam',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-mark-distribution',
		// 		'display_name' => 'Manage Mark Distribution',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-grade',
		// 		'display_name' => 'Manage Grade',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-student',
		// 		'display_name' => 'Manage Student',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-teacher',
		// 		'display_name' => 'Manage Teacher',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-parent',
		// 		'display_name' => 'Manage Parent',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-attendance',
		// 		'display_name' => 'Manage Attendance',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'view-attendance',
		// 		'display_name' => 'View Attendance',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-assignment',
		// 		'display_name' => 'Manage Assignment',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'view-assignment',
		// 		'display_name' => 'View Assignment',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-syllabus',
		// 		'display_name' => 'Manage Syllabus',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'view-syllabus',
		// 		'display_name' => 'View Syllabus',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-routine',
		// 		'display_name' => 'Manage Routine',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'view-routine',
		// 		'display_name' => 'View Routine',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-homework',
		// 		'display_name' => 'Manage Homework',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'view-homework',
		// 		'display_name' => 'View Homework',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-notice',
		// 		'display_name' => 'Manage Notice',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'view-notice',
		// 		'display_name' => 'View Notice',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-event',
		// 		'display_name' => 'Manage Event',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'view-event',
		// 		'display_name' => 'View Event',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-transport',
		// 		'display_name' => 'Manage Transport',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'view-transport',
		// 		'display_name' => 'View Transport',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-hostel',
		// 		'display_name' => 'Manage Hostel',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'view-hostel',
		// 		'display_name' => 'View Hostel',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'view-library',
		// 		'display_name' => 'View Library',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'view-assignment',
		// 		'display_name' => 'View Assignment',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'view-syllabus',
		// 		'display_name' => 'View Syllabus',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'view-routine',
		// 		'display_name' => 'View Routine',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'view-homework',
		// 		'display_name' => 'View Homework',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'view-notice',
		// 		'display_name' => 'View Notice',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'view-event',
		// 		'display_name' => 'View Event',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'view-transport',
		// 		'display_name' => 'View Transport',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'view-hostel',
		// 		'display_name' => 'View Hostel',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'view-library',
		// 		'display_name' => 'View Library',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'view-website',
		// 		'display_name' => 'View Website',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-website',
		// 		'display_name' => 'Manage Website',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-frontend-settings',
		// 		'display_name' => 'Manage Frontend Settings',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-frontend-theme',
		// 		'display_name' => 'Manage Frontend Theme',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-frontend-menu',
		// 		'display_name' => 'Manage Frontend Menu',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-frontend-page',
		// 		'display_name' => 'Manage Frontend Page',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-frontend-post',
		// 		'display_name' => 'Manage Frontend Post',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-frontend-slider',
		// 		'display_name' => 'Manage Frontend Slider',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'view-frontend',
		// 		'display_name' => 'View Frontend',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-frontend',
		// 		'display_name' => 'Manage Frontend',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'view-backend',
		// 		'display_name' => 'View Backend',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-backend',
		// 		'display_name' => 'Manage Backend',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'view-website',
		// 		'display_name' => 'View Website',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-website',
		// 		'display_name' => 'Manage Website',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-frontend-settings',
		// 		'display_name' => 'Manage Frontend Settings',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-frontend-theme',
		// 		'display_name' => 'Manage Frontend Theme',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-frontend-menu',
		// 		'display_name' => 'Manage Frontend Menu',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-frontend-page',
		// 		'display_name' => 'Manage Frontend Page',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-frontend-post',
		// 		'display_name' => 'Manage Frontend Post',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'manage-frontend-slider',
		// 		'display_name' => 'Manage Frontend Slider',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// 	[
		// 		'name' => 'view-frontend',
		// 		'display_name' => 'View Frontend',
		// 		'created_at' => now(),
		// 		'updated_at' => now(),
		// 	],
		// ]);
	}
}