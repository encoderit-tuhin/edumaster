<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$userData = [
			[
				'id' => 1,
				'role_id' => 0,
				'name' => 'Super Admin',
				'email' => 'nmdc@admin.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Admin',
				'phone' => '01951233084',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 2,
				'role_id' => 0,
				'name' => 'Fr. Thadeus Hembrom, CSC',
				'email' => 'thadeus@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01951233000',
				'status' => 1,
				'image' => 'teachers/principal.jpg',
			],
			[
				'id' => 3,
				'role_id' => 0,
				'name' => 'Fr. Hubert Palma',
				'email' => 'hubert@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01951233001',
				'status' => 1,
				'image' => 'teachers/hubert.jpg',
			],

			// Department Bangla
			[
				'id' => 4,
				'role_id' => 0,
				'name' => 'Md. Mahsin Ali',
				'email' => 'mahsinmohammad5@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01723249247',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 5,
				'role_id' => 0,
				'name' => 'Nurul Huda Monty',
				'email' => 'nurulhudamonty@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01673019943',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 6,
				'role_id' => 0,
				'name' => 'Monoara Yeasmin',
				'email' => 'yeasmin.monoararumpa@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01913639515',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 7,
				'role_id' => 0,
				'name' => 'Atiqul Bashar',
				'email' => 'atiqulbashar@yahoo.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01729820849',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 8,
				'role_id' => 0,
				'name' => 'Fahmida Alam',
				'email' => 'fahmidalalamlopa@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01600183395',
				'status' => 1,
				'image' => 'profile.png',
			],

			// Department English
			[
				'id' => 9,
				'role_id' => 0,
				'name' => 'Debjani Bhowmik	Lecturer',
				'email' => 'jani.bhowmik@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01712277367',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 10,
				'role_id' => 0,
				'name' => 'Md. Gulam Saruar',
				'email' => 'saruar_sust@yahoo.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01911614979',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 11,
				'role_id' => 0,
				'name' => 'Md. Mahamudul Hassan',
				'email' => 'mamuney@yahoo.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01711964649',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 12,
				'role_id' => 0,
				'name' => 'Md. Ataur Rahaman Asif',
				'email' => 'asif.rahamanjnu@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01783092770',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 13,
				'role_id' => 0,
				'name' => 'Dinonath Mankhin',
				'email' => 'mankhin8dino17@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01724987331',
				'status' => 1,
				'image' => 'profile.png',
			],

			// Department ICT
			[
				'id' => 14,
				'role_id' => 0,
				'name' => 'Nihar Ranjan Chakrabarty',
				'email' => 'nihar.ranjan2810@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01746475395',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 15,
				'role_id' => 0,
				'name' => 'Silvia Mree',
				'email' => 'ilvia_mree@yahoo.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01745815194',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 16,
				'role_id' => 0,
				'name' => 'Ibrahim Mia',
				'email' => 'imsoinik@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01732148959',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 17,
				'role_id' => 0,
				'name' => 'Sadeka Ferdousi Quyasha',
				'email' => 'sadekaferdousi89@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01790393556',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 18,
				'role_id' => 0,
				'name' => 'Md. Jahidul Islam Monir',
				'email' => 'jmonir.ict@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01911853060',
				'status' => 1,
				'image' => 'profile.png',
			],

			// Department Math
			[
				'id' => 19,
				'role_id' => 0,
				'name' => 'Utpal Datta',
				'email' => 'icmautpal12@yahoo.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01718050301',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 20,
				'role_id' => 0,
				'name' => 'Nandon Sarker',
				'email' => 'nandon_srkr@yahoo.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01911352225',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 21,
				'role_id' => 0,
				'name' => 'Md. Golam Zakaria',
				'email' => 'zmd.golam@yahoo.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01717369224',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 22,
				'role_id' => 0,
				'name' => 'Md. Arafath Rahaman Joy',
				'email' => 'joy.mym2212@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01903341542',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 23,
				'role_id' => 0,
				'name' => 'Kamal Chandra Sarker',
				'email' => 'kamalchandrasarker@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01736417798',
				'status' => 1,
				'image' => 'profile.png',
			],

			// Physics Department
			[
				'id' => 24,
				'role_id' => 0,
				'name' => 'Md. Mahibur Rahman',
				'email' => 'mahi.amc@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01914868115',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 25,
				'role_id' => 0,
				'name' => 'Md. Rahat Khan Pathan',
				'email' => 'rahatkhanpathan@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01723810258',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 26,
				'role_id' => 0,
				'name' => 'Saiful Islam',
				'email' => 'saiful.ph.ru@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01723580548',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 27,
				'role_id' => 0,
				'name' => 'Md. Kamrul Hasan',
				'email' => 'khm006@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01911180080',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 28,
				'role_id' => 0,
				'name' => 'Nahid Hasan',
				'email' => 'hnahid347@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01914853344',
				'status' => 1,
				'image' => 'profile.png',
			],

			// Chemistry Department
			[
				'id' => 29,
				'role_id' => 0,
				'name' => 'Md. Mostafizar Rahman',
				'email' => 'mostafiz.du86@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01687483224',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 30,
				'role_id' => 0,
				'name' => 'Md. Anwer Hossen Shamim',
				'email' => 'shamimche@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01715331178',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 31,
				'role_id' => 0,
				'name' => 'Md. Anwar Hossen Tapan',
				'email' => 'anwar.tapan@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01568886864',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 32,
				'role_id' => 0,
				'name' => 'Md. Abu Kayes Rony',
				'email' => 'kayesrony@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01718647585',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 33,
				'role_id' => 0,
				'name' => 'Md. Sofiqur Rahman',
				'email' => 'sujonbarara@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01731309046',
				'status' => 1,
				'image' => 'profile.png',
			],

			// Biology Department
			[
				'id' => 34,
				'role_id' => 0,
				'name' => 'Md. Shaidul Islam',
				'email' => 'shaidulislam009@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01757294000',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 35,
				'role_id' => 0,
				'name' => 'Tania Afrin',
				'email' => 'papri103@yahoo.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01789905610',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 36,
				'role_id' => 0,
				'name' => 'Md. Mahamud Hasan',
				'email' => 'd.hasanmahamud@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01715247022',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 37,
				'role_id' => 0,
				'name' => 'Md. Rukonuzzaman',
				'email' => 'rukon53cu@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01673440231',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 38,
				'role_id' => 0,
				'name' => 'Rahanara Begum',
				'email' => 'rahanarabegum@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01744801650',
				'status' => 1,
				'image' => 'profile.png',
			],

			// Humanities Department
			[
				'id' => 39,
				'role_id' => 0,
				'name' => 'Dulu Dalbot',
				'email' => 'domenic@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01674833266',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 40,
				'role_id' => 0,
				'name' => 'Mst. Snigdha Sultana',
				'email' => 'snigdhasultana1000@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01918111445',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 41,
				'role_id' => 0,
				'name' => 'Aparna Sarker',
				'email' => 'aparna22sarker@yahoo.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01710176354',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 42,
				'role_id' => 0,
				'name' => 'S.M. Asaduzzaman Sampad',
				'email' => 'sampad2006@ymail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01710131316',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 43,
				'role_id' => 0,
				'name' => 'Farzana Akter Urmi',
				'email' => 'farzanaakterurmi1@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01956004757',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 44,
				'role_id' => 0,
				'name' => 'Md. Kazi Jasim',
				'email' => 'kazi.jasim39@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01714739923',
				'status' => 1,
				'image' => 'profile.png',
			],

			// Humanities Department
			[
				'id' => 45,
				'role_id' => 0,
				'name' => 'Elius Ahmed	Lecturer',
				'email' => 'ahmedelius1984@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01912505325',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 46,
				'role_id' => 0,
				'name' => 'Md. Mizanur Rahman',
				'email' => 'mizanurmgt@yahoo.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01724802319',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 47,
				'role_id' => 0,
				'name' => 'Zahirul Islam',
				'email' => 'sazal730@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01911731163',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 48,
				'role_id' => 0,
				'name' => 'Zohra Jabeen Disha',
				'email' => 'dzohrajabeen@yahoo.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Teacher',
				'phone' => '01675144997',
				'status' => 1,
				'image' => 'profile.png',
			],

			// Staff Administration
			[
				'id' => 101,
				'role_id' => 0,
				'name' => 'Fr. Thadeus Hembrom, CSC',
				'email' => 'frthadeuscsc@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01715759667',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 102,
				'role_id' => 0,
				'name' => 'Fr. Hubert Palma, CSC',
				'email' => 'frpalmacsc@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01720996644',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 103,
				'role_id' => 0,
				'name' => 'Fr. Gracy D`Rozario, CSC',
				'email' => 'isubious@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01912428558',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 104,
				'role_id' => 0,
				'name' => 'Mr. Theophil Hajong',
				'email' => 'theophil.hajong@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01711591073',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 105,
				'role_id' => 0,
				'name' => 'Mr. Racksy B Rozario',
				'email' => 'rex.ndcm@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01827184022',
				'status' => 1,
				'image' => 'profile.png',
			],

			// Staff Principal Office
			[
				'id' => 106,
				'role_id' => 0,
				'name' => 'Mr. Theophil Hajong',
				'email' => 'theophil.hajong@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01711591073',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 107,
				'role_id' => 0,
				'name' => 'Mr. Jyoti Francis Dawa',
				'email' => 'jyodawa@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01782495184',
				'status' => 1,
				'image' => 'profile.png',
			],

			// Academic/Main Office
			[
				'id' => 108,
				'role_id' => 0,
				'name' => 'Fr. Hubert Palma, CSC',
				'email' => 'frpalmacsc@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01720996644',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 109,
				'role_id' => 0,
				'name' => 'Mr. Racksy B Rozario',
				'email' => 'rex.ndcm@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01827184022',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 110,
				'role_id' => 0,
				'name' => 'Mr. Ringku Joseph Cruze',
				'email' => 'ringku_cruze1988@yahoo.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01855846316',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 111,
				'role_id' => 0,
				'name' => 'Mr. Hubert Mree	Office',
				'email' => 'hubartmree1989@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01724642328',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 112,
				'role_id' => 0,
				'name' => 'Mrs. Monju Simsang',
				'email' => 'monju@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01789933137',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 113,
				'role_id' => 0,
				'name' => 'Ms. Aulovi Chiran',
				'email' => 'aulovichiran@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01793746303',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 114,
				'role_id' => 0,
				'name' => 'Mr. Chapal Rozario',
				'email' => 'chapalrozario1980@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01965173746',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 115,
				'role_id' => 0,
				'name' => 'Mr. Jasengh Drong',
				'email' => 'jasengh@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01850721872',
				'status' => 1,
				'image' => 'profile.png',
			],

			// Exam
			[
				'id' => 116,
				'role_id' => 0,
				'name' => 'Fr. Gracy D`Rozario, CSC',
				'email' => 'isubious@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01912428558',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 117,
				'role_id' => 0,
				'name' => 'Mr. Rony Sen Gupta',
				'email' => 'rony.ndcm@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01710763447',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 118,
				'role_id' => 0,
				'name' => 'Mr. Jony Kubi',
				'email' => 'johnykubi1985@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01759618458',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 119,
				'role_id' => 0,
				'name' => 'Mr. Subroto Das',
				'email' => 'subrototusardas2021@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01704472671',
				'status' => 1,
				'image' => 'profile.png',
			],

			// Exam
			[
				'id' => 120,
				'role_id' => 0,
				'name' => 'Fr. Thadeus Hembrom, CSC',
				'email' => 'frthadeuscsc@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01715759667',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 121,
				'role_id' => 0,
				'name' => 'Mr. Redcliffe Dibra',
				'email' => 'redcliffedibra56@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01921129770',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 122,
				'role_id' => 0,
				'name' => 'Mr. Toney Pereira',
				'email' => 'toneypereira47@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01682613805',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 123,
				'role_id' => 0,
				'name' => 'Mr. Tobias Murmu',
				'email' => 'tobimurmu@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01722188269',
				'status' => 1,
				'image' => 'profile.png',
			],

			// Guidance
			[
				'id' => 124,
				'role_id' => 0,
				'name' => 'Fr. Hubert Palma, CSC',
				'email' => 'frpalmacsc@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01720996644',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 125,
				'role_id' => 0,
				'name' => 'Fr. Isubious Gracy D`Rozario, CSC',
				'email' => 'isubious@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01912428558',
				'status' => 1,
				'image' => 'profile.png',
			],

			// Information & Technology
			[
				'id' => 126,
				'role_id' => 0,
				'name' => 'Fr. Hubert Palma, CSC',
				'email' => 'frpalmacsc@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01720996644',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 127,
				'role_id' => 0,
				'name' => 'Mr. Sabuj Mrong	Office',
				'email' => 'mrong.sabuj@yahoo.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01701765423',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 128,
				'role_id' => 0,
				'name' => 'Mr. Partho Rodrigues',
				'email' => 'pclament90@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01731119052',
				'status' => 1,
				'image' => 'profile.png',
			],

			// Laboratories 
			[
				'id' => 129,
				'role_id' => 0,
				'name' => 'Fr. Gracy D`Rozario, CSC',
				'email' => 'isubious@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01912428558',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 130,
				'role_id' => 0,
				'name' => 'Mr. Samuel Shongkor Roy Shanto',
				'email' => 'roysamuelshanto@yahoo.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01780918233',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 131,
				'role_id' => 0,
				'name' => 'Mr. Diparson Sangma',
				'email' => 'diparson@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01739069000',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 132,
				'role_id' => 0,
				'name' => 'Mr. Timol Chambugong',
				'email' => 'timolchambugong987@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01992913000',
				'status' => 1,
				'image' => 'profile.png',
			],

			// Library  
			[
				'id' => 133,
				'role_id' => 0,
				'name' => 'Fr. Thadeus Hembrom, CSC',
				'email' => 'frthadeuscsc@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01715759667',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 134,
				'role_id' => 0,
				'name' => 'Mrs. Afia Khatun',
				'email' => 'afiakhatun@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01734852182',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 135,
				'role_id' => 0,
				'name' => 'Mrs. Tonni Rozlin Dio',
				'email' => 'rozlindio@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01911749538',
				'status' => 1,
				'image' => 'profile.png',
			],

			// Store Room  
			[
				'id' => 136,
				'role_id' => 0,
				'name' => 'Fr. Hubert Palma, CSC',
				'email' => 'frpalmacsc@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01720996644',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 137,
				'role_id' => 0,
				'name' => 'Mrs. Sreeta Kisku',
				'email' => 'sreeta@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01773813392',
				'status' => 1,
				'image' => 'profile.png',
			],

			// Maintenance  
			[
				'id' => 138,
				'role_id' => 0,
				'name' => 'Md. Mustofa Kamal',
				'email' => 'mustofa1984@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01916311010',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 139,
				'role_id' => 0,
				'name' => 'Md. Arshad Hossain',
				'email' => 'arshadhossain0165@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01797343925',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 140,
				'role_id' => 0,
				'name' => 'Md. Masud Alam',
				'email' => '',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01904450502',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 141,
				'role_id' => 0,
				'name' => 'Md. Shamsul Huda Rasel',
				'email' => '',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01729413268',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 142,
				'role_id' => 0,
				'name' => 'Mr. Sentu Chisim',
				'email' => '',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01764156658',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 143,
				'role_id' => 0,
				'name' => 'Mr. Bimol Costa	Cook',
				'email' => '',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01718809332',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 144,
				'role_id' => 0,
				'name' => 'Mr. Rosan Basra	Janitor',
				'email' => '',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01939363138',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 145,
				'role_id' => 0,
				'name' => 'Mr. Nibesh Mankhin',
				'email' => '',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01719980747',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 146,
				'role_id' => 0,
				'name' => 'Md. Alom Mia',
				'email' => '',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01721973869',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 147,
				'role_id' => 0,
				'name' => 'Mr. Manik Chonra Sotra Dor',
				'email' => '',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01854777113',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 148,
				'role_id' => 0,
				'name' => 'Md. Ashraful Islam',
				'email' => '',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01938083631',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 149,
				'role_id' => 0,
				'name' => 'Mr. Mithun Gomes',
				'email' => '',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01957927789',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 150,
				'role_id' => 0,
				'name' => 'Mr. Liton Chiran',
				'email' => '',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01776268991',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 151,
				'role_id' => 0,
				'name' => 'Mr. Polinus Kama',
				'email' => '',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01745755074',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 152,
				'role_id' => 0,
				'name' => 'Mr. Bidra Chambugong',
				'email' => '',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01304378616',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 153,
				'role_id' => 0,
				'name' => 'Mr. Hilion Mankhin',
				'email' => '',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01833081839',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 154,
				'role_id' => 0,
				'name' => 'Mr. Badal Mrong	Janitor',
				'email' => '',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01859099717',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 155,
				'role_id' => 0,
				'name' => 'Mr. Hridoy Gomes',
				'email' => '',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01317090599',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 156,
				'role_id' => 0,
				'name' => 'Fr. Hubert Palma, CSC',
				'email' => '',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01720996644',
				'status' => 1,
				'image' => 'profile.png',
			],

			// Bookstore
			[
				'id' => 157,
				'role_id' => 0,
				'name' => 'Fr. Hubert Palma, CSC',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01720996644',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 158,
				'role_id' => 0,
				'name' => 'Mr. Poritush Bonowari',
				'email' => '',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01719592157',
				'status' => 1,
				'image' => 'profile.png',
			],

			// Student Work Program
			[
				'id' => 159,
				'role_id' => 0,
				'name' => 'Fr. Gracy D`Rozario, CSC',
				'email' => 'isubious@gmail.com',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01912428558',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 160,
				'role_id' => 0,
				'name' => 'Mr. Liptu Chambugong',
				'email' => '',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01739339970',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 161,
				'role_id' => 0,
				'name' => 'Mr. Pankoj Chambugong',
				'email' => '',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01980721277',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 162,
				'role_id' => 0,
				'name' => 'Mr. Suidish Chisim',
				'email' => '',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01759294100',
				'status' => 1,
				'image' => 'profile.png',
			],

			// Maintenance Staffs
			[
				'id' => 163,
				'role_id' => 0,
				'name' => 'Aoulovi',
				'email' => '',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01793746303',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 164,
				'role_id' => 0,
				'name' => 'Timol',
				'email' => '',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01992913000',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 165,
				'role_id' => 0,
				'name' => 'Tonni',
				'email' => '',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01915925228',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 166,
				'role_id' => 0,
				'name' => 'Afia',
				'email' => '',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01734852182',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 167,
				'role_id' => 0,
				'name' => 'Partho',
				'email' => '',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01329490800',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 168,
				'role_id' => 0,
				'name' => 'Srita',
				'email' => '',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01784640376',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 169,
				'role_id' => 0,
				'name' => 'Shanto',
				'email' => '',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01780918283',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 170,
				'role_id' => 0,
				'name' => 'Monju',
				'email' => '',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01928722347',
				'status' => 1,
				'image' => 'profile.png',
			],
			[
				'id' => 171,
				'role_id' => 0,
				'name' => 'Chopol',
				'email' => '',
				'password' => bcrypt('ndcm1234'),
				'password_static' => 'ndcm1234',
				'user_type' => 'Staff',
				'phone' => '01749738005',
				'status' => 1,
				'image' => 'profile.png',
			],
		];

		foreach ($userData as $data) {
			$user = User::create($data);
		}
	}
}