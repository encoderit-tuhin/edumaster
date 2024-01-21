<?php

namespace Database\Seeders;

use App\Teacher;
use App\UserPayroll;
use App\SalaryHeadUserPayroll;
use Illuminate\Database\Seeder;
use App\Services\SalaryHeadService;

class TeacherSeeder extends Seeder
{
	public function __construct(
		private readonly SalaryHeadService $salaryHead
	) {
	}

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$teacherData = [
			[
				'id' => 1,
				'user_id' => 1,
				'department_id' => 1,
				'name' => 'Super Admin',
				'designation' => 'Lecturer',
				'gender' => 'Male',
				'phone' => '01951233084',
				'sl' => 1,
			],
			[
				'id' => 2,
				'user_id' => 2,
				'department_id' => 2,
				'name' => 'Fr. Thadeus Hembrom, CSC',
				'designation' => 'Principal',
				'gender' => 'Male',
				'religion' => 2,
				'phone' => '01951233000',
				'sl' => 2,
			],
			[
				'id' => 3,
				'user_id' => 3,
				'department_id' => 1,
				'name' => 'Fr. Hubert Palma',
				'designation' => 'Director of administration and student guidance',
				'gender' => 'Male',
				'religion' => 2,
				'phone' => '01951233001',
				'sl' => 3,
			],

			// Department Bangla
			[
				'id' => 4,
				'user_id' => 4,
				'department_id' => 1,
				'name' => 'Md. Mahsin Ali',
				'designation' => 'Lecturer',
				'gender' => 'Male',
				'phone' => '01723249247',
				'sl' => 4,
			],
			[
				'id' => 5,
				'user_id' => 5,
				'department_id' => 1,
				'name' => 'Nurul Huda Monty',
				'designation' => 'Lecturer',
				'gender' => 'Male',
				'phone' => '01673019943',
				'sl' => 5,
			],
			[
				'id' => 6,
				'user_id' => 6,
				'department_id' => 1,
				'name' => 'Monoara Yeasmin',
				'designation' => 'Lecturer',
				'gender' => 'Male',
				'phone' => '01913639515',
				'sl' => 6,
			],
			[
				'id' => 7,
				'user_id' => 7,
				'department_id' => 1,
				'name' => 'Atiqul Bashar',
				'designation' => 'Lecturer',
				'gender' => 'Male',
				'phone' => '01729820849',
				'sl' => 7,
			],
			[
				'id' => 8,
				'user_id' => 8,
				'department_id' => 1,
				'name' => 'Fahmida Alam',
				'designation' => 'Lecturer',
				'gender' => 'Male',
				'phone' => '01600183395',
				'sl' => 8,
			],

			// Department English
			[
				'id' => 9,
				'user_id' => 9,
				'department_id' => 2,
				'name' => 'Md. Mahsin Ali',
				'designation' => 'Lecturer',
				'gender' => 'Male',
				'phone' => '01723249247',
				'sl' => 9,
			],
			[
				'id' => 10,
				'user_id' => 10,
				'department_id' => 2,
				'name' => 'Nurul Huda Monty',
				'designation' => 'Lecturer',
				'gender' => 'Male',
				'phone' => '01673019943',
				'sl' => 10,
			],
			[
				'id' => 11,
				'user_id' => 11,
				'department_id' => 2,
				'name' => 'Monoara Yeasmin',
				'designation' => 'Lecturer',
				'gender' => 'Male',
				'phone' => '01913639515',
				'sl' => 11,
			],
			[
				'id' => 12,
				'user_id' => 12,
				'department_id' => 2,
				'name' => 'Atiqul Bashar',
				'designation' => 'Lecturer',
				'gender' => 'Male',
				'phone' => '01729820849',
				'sl' => 12,
			],
			[
				'id' => 13,
				'user_id' => 13,
				'department_id' => 2,
				'name' => 'Fahmida Alam',
				'designation' => 'Lecturer',
				'gender' => 'Male',
				'phone' => '01600183395',
				'sl' => 13,
			],

			// Department ICT
			[
				'id' => 14,
				'user_id' => 14,
				'department_id' => 3,
				'name' => 'Nihar Ranjan Chakrabarty',
				'designation' => 'Lecturer',
				'gender' => 'Male',
				'phone' => '01746475395',
				'sl' => 14,
			],
			[
				'id' => 15,
				'user_id' => 15,
				'department_id' => 3,
				'name' => 'Silvia Mree',
				'designation' => 'Lecturer',
				'gender' => 'Male',
				'phone' => '01745815194',
				'sl' => 15,
			],
			[
				'id' => 16,
				'user_id' => 16,
				'department_id' => 3,
				'name' => 'Ibrahim Mia',
				'designation' => 'Lecturer',
				'gender' => 'Male',
				'phone' => '01732148959',
				'sl' => 16,
			],
			[
				'id' => 17,
				'user_id' => 17,
				'department_id' => 3,
				'name' => 'Sadeka Ferdousi Quyasha',
				'designation' => 'Lecturer',
				'gender' => 'Male',
				'phone' => '01790393556',
				'sl' => 17,
			],
			[
				'id' => 18,
				'user_id' => 18,
				'department_id' => 3,
				'name' => 'Md. Jahidul Islam Monir',
				'designation' => 'Demonstrator',
				'gender' => 'Male',
				'phone' => '01911853060',
				'sl' => 18,
			],

			// Department Math
			[
				'id' => 19,
				'user_id' => 19,
				'department_id' => 4,
				'name' => 'Utpal Datta',
				'designation' => 'Lecturer',
				'gender' => 'Male',
				'phone' => '01718050301',
				'sl' => 19,
			],
			[
				'id' => 20,
				'user_id' => 20,
				'department_id' => 4,
				'name' => 'Nandon Sarker',
				'designation' => 'Lecturer',
				'gender' => 'Male',
				'phone' => '01911352225',
				'sl' => 20,
			],
			[
				'id' => 21,
				'user_id' => 21,
				'department_id' => 4,
				'name' => 'Md. Golam Zakaria',
				'designation' => 'Lecturer',
				'gender' => 'Male',
				'phone' => '01717369224',
				'sl' => 21,
			],
			[
				'id' => 22,
				'user_id' => 22,
				'department_id' => 4,
				'name' => 'Md. Arafath Rahaman Joy',
				'designation' => 'Lecturer',
				'gender' => 'Male',
				'phone' => '01903341542',
				'sl' => 22,
			],
			[
				'id' => 23,
				'user_id' => 23,
				'department_id' => 4,
				'name' => 'Kamal Chandra Sarker',
				'designation' => 'Lecturer',
				'gender' => 'Male',
				'phone' => '01736417798',
				'sl' => 23,
			],

			// Physics Department
			[
				'id' => 24,
				'user_id' => 24,
				'department_id' => 5,
				'name' => 'Md. Mahibur Rahman',
				'designation' => 'Lecturer in Physics',
				'gender' => 'Male',
				'phone' => '01914868115',
				'sl' => 24,
			],
			[
				'id' => 25,
				'user_id' => 25,
				'department_id' => 5,
				'name' => 'Md. Rahat Khan Pathan',
				'designation' => 'Lecturer in Physics',
				'gender' => 'Male',
				'phone' => '01723810258',
				'sl' => 25,
			],
			[
				'id' => 26,
				'user_id' => 26,
				'department_id' => 5,
				'name' => 'Saiful Islam',
				'designation' => 'Lecturer in Physics',
				'gender' => 'Male',
				'phone' => '01723580548',
				'sl' => 26,
			],
			[
				'id' => 27,
				'user_id' => 27,
				'department_id' => 5,
				'name' => 'Md. Kamrul Hasan',
				'designation' => 'Lecturer in Physics',
				'gender' => 'Male',
				'phone' => '01911180080',
				'sl' => 27,
			],
			[
				'id' => 28,
				'user_id' => 28,
				'department_id' => 5,
				'name' => 'Nahid Hasan',
				'designation' => 'Demons. in Physics (P)',
				'gender' => 'Male',
				'phone' => '01914853344',
				'sl' => 28,
			],

			// Chemistry Department
			[
				'id' => 29,
				'user_id' => 29,
				'department_id' => 6,
				'name' => 'Md. Mostafizar Rahman',
				'designation' => 'Lecturer in Chemistry',
				'gender' => 'Male',
				'phone' => '01687483224',
				'sl' => 29,
			],
			[
				'id' => 30,
				'user_id' => 30,
				'department_id' => 6,
				'name' => 'Md. Anwer Hossen Shamim',
				'designation' => 'Lecturer in Chemistry',
				'gender' => 'Male',
				'phone' => '01715331178',
				'sl' => 30,
			],
			[
				'id' => 31,
				'user_id' => 31,
				'department_id' => 6,
				'name' => 'Md. Anwar Hossen Tapan',
				'designation' => 'Lecturer in Chemistry',
				'gender' => 'Male',
				'phone' => '01568886864',
				'sl' => 31,
			],
			[
				'id' => 32,
				'user_id' => 32,
				'department_id' => 6,
				'name' => 'Md. Abu Kayes Rony',
				'designation' => 'Lecturer in Chemistry (P)',
				'gender' => 'Male',
				'phone' => '01718647585',
				'sl' => 32,
			],
			[
				'id' => 33,
				'user_id' => 33,
				'department_id' => 6,
				'name' => 'Md. Sofiqur Rahman',
				'designation' => 'Demons. in Chemistry (P)',
				'gender' => 'Male',
				'phone' => '01731309046',
				'sl' => 33,
			],

			// Biology Department
			[
				'id' => 34,
				'user_id' => 34,
				'department_id' => 7,
				'name' => 'Md. Shaidul Islam',
				'designation' => 'Lecturer in Biology',
				'gender' => 'Male',
				'phone' => '01757294000',
				'sl' => 34,
			],
			[
				'id' => 35,
				'user_id' => 35,
				'department_id' => 7,
				'name' => 'Tania Afrin',
				'designation' => 'Lecturer in Biology',
				'gender' => 'Female',
				'phone' => '01789905610',
				'sl' => 35,
			],
			[
				'id' => 36,
				'user_id' => 36,
				'department_id' => 7,
				'name' => 'Md. Mahamud Hasan',
				'designation' => 'Lecturer in Biology',
				'gender' => 'Male',
				'phone' => '01715247022',
				'sl' => 36,
			],
			[
				'id' => 37,
				'user_id' => 37,
				'department_id' => 7,
				'name' => 'Md. Rukonuzzaman',
				'designation' => 'Lecturer in Biology',
				'gender' => 'Male',
				'phone' => '01673440231',
				'sl' => 37,
			],
			[
				'id' => 38,
				'user_id' => 38,
				'department_id' => 7,
				'name' => 'Rahanara Begum',
				'designation' => 'Demons. in Biology',
				'gender' => 'Female',
				'phone' => '01744801650',
				'sl' => 38,
			],

			// Humanities Department
			[
				'id' => 39,
				'user_id' => 39,
				'department_id' => 8,
				'name' => 'Dulu Dalbot',
				'designation' => 'Lecturer in Economics',
				'gender' => 'Male',
				'phone' => '01674833266',
				'sl' => 39,
			],
			[
				'id' => 40,
				'user_id' => 40,
				'department_id' => 8,
				'name' => 'Mst. Snigdha Sultana',
				'designation' => 'Lecturer in Logic',
				'gender' => 'Female',
				'phone' => '01918111445',
				'sl' => 40,
			],
			[
				'id' => 41,
				'user_id' => 41,
				'department_id' => 8,
				'name' => 'Aparna Sarker',
				'designation' => 'Lecturer in Geography',
				'gender' => 'Male',
				'phone' => '01710176354',
				'sl' => 41,
			],
			[
				'id' => 42,
				'user_id' => 42,
				'department_id' => 8,
				'name' => 'S.M. Asaduzzaman Sampad',
				'designation' => 'Lecturer in Civics & Good Governance',
				'gender' => 'Male',
				'phone' => '01710131316',
				'sl' => 42,
			],
			[
				'id' => 43,
				'user_id' => 43,
				'department_id' => 8,
				'name' => 'Farzana Akter Urmi',
				'designation' => 'Lecturer in Social Work',
				'gender' => 'Female',
				'phone' => '01956004757',
				'sl' => 43,
			],
			[
				'id' => 44,
				'user_id' => 44,
				'department_id' => 8,
				'name' => 'Md. Kazi Jasim',
				'designation' => 'Lecturer in History',
				'gender' => 'Male',
				'phone' => '01714739923',
				'sl' => 44,
			],

			// Business Studies
			[
				'id' => 45,
				'user_id' => 45,
				'department_id' => 9,
				'name' => 'Elius Ahmed	Lecturer',
				'designation' => 'Lecturer in Accounting',
				'gender' => 'Male',
				'phone' => '01912505325',
				'sl' => 45,
			],
			[
				'id' => 46,
				'user_id' => 46,
				'department_id' => 9,
				'name' => 'Md. Mizanur Rahman',
				'designation' => 'Lecturer in Management',
				'gender' => 'Male',
				'phone' => '01724802319',
				'sl' => 46,
			],
			[
				'id' => 47,
				'user_id' => 47,
				'department_id' => 9,
				'name' => 'Zahirul Islam',
				'designation' => 'Lecturer in Finance, Banking & Insurance',
				'gender' => 'Male',
				'phone' => '01911731163',
				'sl' => 47,
			],
			[
				'id' => 48,
				'user_id' => 48,
				'department_id' => 9,
				'name' => 'Zohra Jabeen Disha',
				'designation' => 'Lecturer in Statistics',
				'gender' => 'Male',
				'phone' => '01675144997',
				'sl' => 48,
			],
		];

		foreach ($teacherData as $data) {
			$teacher = Teacher::create($data);

			// if ($teacher) {
			// 	$userPayroll = UserPayroll::create([
			// 		'user_id' => $data['user_id'],
			// 		'net_salary' => 40,
			// 		'current_due' => 10,
			// 		'current_advance' => 5
			// 	]);

			// 	if ($userPayroll) {
			// 		$salaryHeads = $this->salaryHead->getSalaryHeads();

			// 		foreach ($salaryHeads as $salaryHead) {
			// 			SalaryHeadUserPayroll::create([
			// 				'user_payroll_id' => $userPayroll->id,
			// 				'salary_head_id' => $salaryHead->id,
			// 				'amount' => 10,
			// 			]);
			// 		}
			// 	}
			// }
		}
	}
}
