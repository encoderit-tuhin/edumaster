<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UtilitySeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$days = array(
			array("day" => "SUNDAY", "is_active" => 1),
			array("day" => "MONDAY", "is_active" => 1),
			array("day" => "TUESDAY", "is_active" => 1),
			array("day" => "WEDNESDAY", "is_active" => 1),
			array("day" => "THURSDAY", "is_active" => 1),
			array("day" => "FRIDAY", "is_active" => 1),
			array("day" => "SATURDAY", "is_active" => 1),
		);
		DB::table('class_days')->insert($days);

		//Default Mark Distribution
		DB::table('mark_distributions')->insert([
			'mark_distribution_type' => 'Exam',
			'mark_percentage' => 100,
			'is_exam' => 'yes',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
		]);

		//Default Academic year
		// DB::table('academic_years')->insert([
		// 	'session' => date('Y'),
		// 	'year' => date('Y') . '-' . date('Y', strtotime('+1 year')),
		// 	'created_at' => date('Y-m-d H:i:s'),
		// 	'updated_at' => date('Y-m-d H:i:s'),
		// ]);
		for ($year = 2023; $year <= 2023; $year++) {
			$startYear = $year;
			$endYear = $year + 1;

			DB::table('academic_years')->insert([
				'session' => $startYear,
				'year' => $startYear . '-' . $endYear,
				'created_at' => now(),
				'updated_at' => now(),
			]);
		}
		//Leave type



		//Default Settings
		DB::table('settings')->insert([
			[
				'name' => 'school_name',
				'value' => 'Notre Dame College Mymensingh'
			],
			[
				'name' => 'site_title',
				'value' => 'Notre Dame College Mymensingh'
			],
			[
				'name' => 'phone',
				'value' => '01814633111'
			],
			[
				'name' => 'email',
				'value' => 'ndamemym@gmail.com'
			],
			[
				'name' => 'language',
				'value' => 'English'
			],
			[
				'name' => 'google_map',
				'value' => '<iframe class="map"
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7248.622763639181!2d90.407563!3d24.716188!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb7f0244f2d553e80!2sNotre%20Dame%20College%20Mymensingh%20(NDCM)!5e0!3m2!1sen!2sbd!4v1660369182678!5m2!1sen!2sbd"></iframe>'
			],
			[
				'name' => 'address',
				'value' => 'City Bypass, Barera, Mymensingh'
			],
			[
				'name' => 'on_google_map',
				'value' => 'https://maps.app.goo.gl/Ns5tgHieYhuPxK489'
			],
			[
				'name' => 'institute_id',
				'value' => '1300'
			],
			[
				'name' => 'timezone',
				'value' => 'Asia/Dhaka'
			],
			[
				'name' => 'academic_year',
				'value' => '1'
			],
			[
				'name' => 'timezone',
				'value' => 'Canada/Pacific'
			],
			[
				'name' => 'currency_symbol',
				'value' => '$'
			],
			[
				'name' => 'mail_type',
				'value' => 'mail'
			],
			[
				'name' => 'logo',
				'value' => 'logo.png'
			],
			[
				'name' => 'paypal_currency',
				'value' => 'USD'
			],
			[
				'name' => 'stripe_currency',
				'value' => 'USD'
			],
			[
				'name' => 'backend_direction',
				'value' => 'ltr'
			],
			[
				'name' => 'active_theme',
				'value' => 'default'
			],
			[
				'name' => 'disabled_website',
				'value' => 'no'
			],
			[
				'name' => 'copyright_text',
				'value' => '&copy; Copyright 2023. All Rights Reserved.'
			],
			[
				'name' => 'examResultPhone',
				'value' => '01841442371'
			],
			[
				'name' => 'tutionFeePhone',
				'value' => '01841442370'
			],
			[
				'name' => 'facebookLink',
				'value' => 'https://www.facebook.com/ndcmymensingh'
			],
			[
				'name' => 'eiin_code',
				'value' => 'EIIN: 137031, Code: 7314, ESTD: 2014'
			],
			[
				'name' => 'sidebar_color',
				'value' => '#17191c'
			],
			[
				'name' => 'sidebar_text_color',
				'value' => '#8b9094'
			],
			[
				'name' => 'sidebar_border_color',
				'value' => '#17191c'
			],
			[
				'name' => 'active_sidebar_background',
				'value' => '#000000'
			],
			[
				'name' => 'custom_backend_css',
				'value' => '.nav li.active > ul>li.active > a {
					color: #FFF !important;
				}
				.main-panel .navbar {
					background: #17191c;
					border: none !important;
				}'
			],
			[
				'name' => 'custom_frontend_css',
				'value' => ''
			],
			[
				'name' => 'api_key',
				'value' => 'aRAv9QlmjCm6FKx2mzWS'
			],
			[
				'name' => 'sender_id',
				'value' => '8809604902393'
			],
			[
				'name' => 'sms_api',
				'value' => ''
			],
			[
				'name' => 'default_sms_gateway',
				'value' => 'bulkSMSBD'
			],
			[
				'name' => 'sms_test_mode',
				'value' => 'false'
			],
			[
				'name' => 'sms_type',
				'value' => 'nonmasking'
			]
		]);

		DB::table('payroll_accounting_mappings')->insert([
			'ledger_id' => 6,
			'fund_id' => 1,
		]);
	}
}
