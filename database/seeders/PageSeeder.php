<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$pages = [
			[
				'page' => [
					'slug' => 'home',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'Home',
						'page_content' => '<p>Home page content</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => 'হোম',
						'page_content' => '<p>হোম পেইজ</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],
			[
				'page' => [
					'slug' => 'about-us',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'About Us',
						'page_content' => '<p>About us content</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => 'আমাদের সম্পর্কে',
						'page_content' => '<p>আমাদের সম্পর্কে</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					]
				]
			],
			[
				'page' => [
					'slug' => 'principal-speech',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'Principal Speech',
						'page_content' => '<p>It is my profound honor and immense pleasure to welcome all at the renowned institute of
						Notre Dame College Mymensingh in the City of Education, Mymensingh.&nbsp;</p>
						<p>Notre Dame College Mymensingh started in 2014 with 700 students in three sections; Science,
							Humanities, and Business Studies under the leadership of our late Founder Principal Fr. Bakul
							Stanislaus Rozario, CSC. The College is run by the Holy Cross Priests Society of Bangladesh
							those who have dedicated their lives to provide quality education in and outside the country.
							Since its inception, our college is playing a vital role in the education sector as a whole in
							this country.&nbsp;</p>
						<p>One of the purposes of establishing this institute is to provide excellent education to
							supplement the education sector of the nation by generating healthier educated students. Our
							College campus is established in such a way that students will feel comfortable, enjoyable, and
							inspire to study here. We have specious multimedia classrooms, excellent Lab rooms, a huge
							library, playgrounds, and 24 hours power services.&nbsp;During this pandemic period, our college
							continued classes using appropriate technologies like; YouTube and Zoom classes to keep students
							busy with their schooling. Through Zoom classes we took exams and lab classes so that we can
							deliver their required education and enable students to do good results in the board
							exams.&nbsp;</p>
						<p>A well-educated person is inevitable for building society and nation. However, education does not
							mean gaining only certificates but developing wisdom, experiences, good human behavior, habits,
							traits, and attitude which helps a person to lead a fruitful life. Famous Quotes of Aristotle
							is&nbsp;<strong>“Knowing yourself is the beginning of all Wisdom “.</strong>&nbsp;We
							also try to do that through our education programs for our students, so that they can know
							themselves first and then acquire wisdom accordingly.&nbsp;</p>
						<p>We aim to make our students excel in education and be good human persons. Therefore, our key
							focus is to teach students good discipline, character building, provide proper and quality
							education, impart ethics, develop moral values, and assist to explore their inherent qualities
							of physical, mental, social, and spiritual through classroom education, lab classes, weekly quiz
							exams, games &amp; sports as well as through co-curricular activities. If they can go through
							these exercises successfully then definitely we will be able to make them good persons and
							quality citizens, which means, they will be future good leaders of this nation.&nbsp;</p>
						<p>Apart from the academic office staff and Teachers, we have Student Directors and Counselors who
							are fully dedicated in taking care of the students very honestly and sincerely during classes
							and office days, for the total well-being of the students.&nbsp;&nbsp;</p>
						<p>We have established a good system to connect with the parents of each student to update them
							about their child’s improvements and lacking in terms of class attendance, exam results,
							lab classes, and other education-related issues. This is an effort of tri-partners so that we
							can work together to achieve our goals and purposes efficiently and effectively. The College
							alone cannot do much if parents do not co-operate with us.&nbsp;&nbsp;</p>
						<p>We expect that students who come to our college will finally do excellent results in the board
							exams, gain expected knowledge, and be well prepared for higher studies, better employment later
							in practical life. We the members of the faculty, administration, and staff of the college are
							pleased to have this opportunity to serve our students, society, and the nation.</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => 'অধ্যক্ষের বাণী',
						'page_content' => '<p>শিক্ষা নগর, ময়মনসিংহের প্রশংসিত প্রতিষ্ঠান নটর ডেম কলেজে সবাকে আমার গভীর শ্রদ্ধাশ্রব্দে
						ও অসীম আনন্দে স্বাগতম জানাই। শিক্ষার শহর ময়মনসিংহে, নটর ডেম কলেজ ময়মনসিংহ ইনস্টিটিউটটি।&nbsp;</p>
						<p>নটর ডেম কলেজ ময়মনসিংহ 2014 সালে শুরু হয়েছিল, যাত্রা 700 জন ছাত্র-ছাত্রী তিনটি বিভাগে; বিজ্ঞান,
							মানবিকতা, এবং ব্যবসায় গবেষণা, আমাদের দিত্বগ্রহণ করেছিলেন আমাদের শেষ প্রধান প্রিন্সিপাল পাদ্র বকুল
							স্ট্যানিসলস রোজারিও, সি.এস.সি। কলেজটি বাংলাদেশের হোলি ক্রস প্রিস্ট সোসাইটি দ্বারা চালিত হয়, যারা দেশের বাইরে শিক্ষা প্রদান করতে আপনার
							জীবন দেয়েছেন। আমাদের কলেজ যত্ন সহ এই দেশে একটি গুরুত্বপূর্ণ ভূমিকা পালন করছে।&nbsp;</p>
						<p>এই ইনস্টিটিউট স্থাপনার একটি উদ্দেশ্য ছিল শিক্ষার জন্য একটি সুশিক্ষিত ছাত্র-ছাত্রী তৈরি করতে, জাতির শিক্ষা খণ্ডে সাধারণ শিক্ষা দেওয়ার
							জন্য। আমাদের কলেজ ক্যাম্পাস এই রকম প্রতিষ্ঠিত করা হয়েছে যাতে ছাত্র-ছাত্রীরা এখানে অবস্থান করতে সুবিধা অনুভব করতে পারে, আনন্দ অনুভব করতে পারে, এবং
							পড়াশোনা করতে উৎসাহিত হতে পারে। আমাদের কলেজের পাশাপাশি মাল্টিমিডিয়া শ্রেণীকক্ষ, অসাধারণ ল্যাব কক্ষ, একটি বৃহত্তর গ্রন্থাগার, খেলার মাঠ, এবং ২৪ ঘণ্টা
							বিদ্যুত সেবা রয়েছে।&nbsp;এই প্যান্ডেমিক সময়ে, আমাদের কলেজ ছাত্র-ছাত্রীদের তাদের পাঠশালায় ব্যস্ত থাকতে সতর্ক করার জন্য যেমন ইউটিউব এবং জুম ক্লাসের
							মাধ্যমে চালাতে থাকল, তাদের প্রয়োজনীয় শিক্ষা প্রদান করতে পারেন, এবং বোর্ড পরীক্ষায় সাফল্য অর্জন করতে সাহায্য করতে পারেন।&nbsp;</p>
						<p>একজন ভাল শিক্ষিত ব্যক্তি সমাজ এবং জাতি গঠনে অবশ্যই। তবে, শিক্ষা মাত্র প্রমাণপত্র অর্জন করা নয়, বরং বুদ্ধি, অভিজ্ঞতা, ভাল মানুষিক আচরণ, আচার, লক্ষণ,
							এবং দৃষ্টিভঙ্গি উন্নত করা যাক যা একজন ব্যক্তির জীবনটি ফলদায়ী করতে সাহায্য করে। আরিস্টটলের একটি মহৎ উক্তি দ্বারা জানা যায়&nbsp;<strong>“আত্ম-পরিচয় সব জ্ঞানের শুরু”
							।</strong>&nbsp;আমরা আমাদের ছাত্র-ছাত্রীদের জন্য এই ধরণের শিক্ষা প্রোগ্রাম অনুষ্ঠান করার চেষ্টা করি, যাতে তারা প্রথমে নিজেকে জানতে পারে এবং তারপর সেই
							অনুভবের সাথে জ্ঞান অর্জন করতে পারে।&nbsp;</p>
						<p>আমরা আমাদের ছাত্র-ছাত্রীদের শিক্ষা অঙ্গগুলি মধ্যে ভাল শৃঙ্গার্য, চরিত্র নির্মাণ, যথাযথ এবং গুণগত শিক্ষা, নীতি উন্নত করতে, নৈতিক মূল্য বিকাশ করতে এবং তাদের
							প্রাকৃতিক, মানসিক, সামাজিক, এবং আধ্যাত্মিক স্বাভাবিক গুণগুণগুণ অন্বেষণ করতে সাহায্য করতে নকলে আসতে, শ্রেণীকক্ষ শিক্ষা, ল্যাব ক্লাস, সাপ্তাহিক কুইজ পরীক্ষা,
							খেলা &amp; খেলাধুলা, এবং সহ পাঠের পাশাপাশি বাহ্যিক কার্যক্রমের মাধ্যমে। যদি তারা এই অনুশাসন সাফল্য়সাধ্যভাবে পারে, তবে নিশ্চিতভাবে আমরা তাদের ভাল ব্যক্তিগত
							এবং গুণগত নাগরিক তৈরি করতে সক্ষম হব। এটা মানে, তারা এই জাতির ভবিষ্যতের ভাল নেতা হবে।&nbsp;</p>
						<p>শিক্ষানিদের পাশাপাশি শিক্ষা অফিস কর্মচারী এবং শিক্ষকগণের বাইরে, আমাদের ছাত্র-ছাত্রীদের সার্থক সময় এবং দফ্তরের দিনগুলির জন্য ছাত্র-ছাত্রীদের সম্পূর্ণ দেখাদেখি নেওয়া বিশেষভাবে উল্লিখিত ছাত্র-ছাত্রীদের
							সার্থক সময় এবং সতীকরণের জন্য পূর্ণ নিষ্ঠা বিশেষজ্ঞ ছাত্র নির্দেশক এবং মন্তিদের উপস্থিতি রয়েছে।&nbsp;&nbsp;</p>
						<p>আমরা প্রতিটি ছাত্র-ছাত্রীর প্রাপ্তির জন্য তাদের বাবামায়ের সাথে যোগাযোগ করতে একটি ভাল সিস্টেম স্থাপন করেছি, তাদের শিক্ষার উন্নতি এবং অক্ষমতা
							নম্বরে, পরীক্ষার ফলাফল, ল্যাব ক্লাস, এবং অন্যান্য শিক্ষা সম্পর্কিত সমস্যাগুলি আপডেট করতে যাতে আমরা আমাদের লক্ষ্য এবং উদ্দেশ্যগুলি কার্যকরভাবে এবং কার্যক্ষমভাবে অর্জন করতে সাহায্য
							করতে পারি। কলেজটি একমাত্র করতে পারে না যদি বাবা-মায়েরা আমাদের সাথে সহযোগিতা করেন না।&nbsp;&nbsp;</p>
						<p>আমরা আশা করি যে আমাদের কলেজে আসা ছাত্র-ছাত্রীরা শেষ পরীক্ষায় সর্বোত্তম ফলাফল প্রদান করবে, প্রয়োজনীয় জ্ঞান অর্জন করবে, এবং প্রাক্তন
							জীবনে উন্নত শিক্ষা নিয়ে সুযোগ্য প্রস্তুত হবে। আমরা কলেজের শিক্ষার্থী, প্রশাসন, এবং স্টাফের সদস্যরা আমাদের ছাত্র-ছাত্রীদের, সমাজের, এবং জাতির
							সেবার এই সুযোগ নিতে আনন্দিত।</p>
						',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],
			[
				'page' => [
					'slug' => 'history',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'History of Notre Dame College Mymensingh',
						'page_content' => '<p><u></u>In 2008, during the celebration of the centennial anniversary of Catholic faith in Mymensingh Diocese, Bishop Paul Ponen Kubi, C.S.C., a revered figure in Mymensingh Diocese, made a request to the Holy Cross Fathers and Brothers to establish a new Notre Dame College in Mymensingh Diocese. He expressed his hope that, alongside the historic Notre Dame College in Dhaka, another Notre Dame College would be founded, making higher education more accessible for the people of Mymensingh and the northern region.

						Bishop Paul Ponen Kubis vision aimed to provide quality education and opportunities for students in the Mymensingh and northern regions of Bangladesh. This new college would continue the legacy of Notre Dame education and contribute to the intellectual and social development of the area</p>
						<p>One of the purposes of establishing this institute is to provide excellent education to
							supplement the education sector of the nation by generating healthier educated students. Our
							College campus is established in such a way that students will feel comfortable, enjoyable, and
							inspire to study here. We have specious multimedia classrooms, excellent Lab rooms, a huge
							library, playgrounds, and 24 hours power services.&nbsp;During this pandemic period, our college
							continued classes using appropriate technologies like; YouTube and Zoom classes to keep students
							busy with their schooling. Through Zoom classes we took exams and lab classes so that we can
							deliver their required education and enable students to do good results in the board
							exams.&nbsp;</p>
						<p>A well-educated person is inevitable for building society and nation. However, education does not
							mean gaining only certificates but developing wisdom, experiences, good human behavior, habits,
							traits, and attitude which helps a person to lead a fruitful life. Famous Quotes of Aristotle
							is&nbsp;<strong>“Knowing yourself is the beginning of all Wisdom “.</strong>&nbsp;We
							also try to do that through our education programs for our students, so that they can know
							themselves first and then acquire wisdom accordingly.&nbsp;</p>
						<p>We aim to make our students excel in education and be good human persons. Therefore, our key
							focus is to teach students good discipline, character building, provide proper and quality
							education, impart ethics, develop moral values, and assist to explore their inherent qualities
							of physical, mental, social, and spiritual through classroom education, lab classes, weekly quiz
							exams, games &amp; sports as well as through co-curricular activities. If they can go through
							these exercises successfully then definitely we will be able to make them good persons and
							quality citizens, which means, they will be future good leaders of this nation.&nbsp;</p>
						<p>Apart from the academic office staff and Teachers, we have Student Directors and Counselors who
							are fully dedicated in taking care of the students very honestly and sincerely during classes
							and office days, for the total well-being of the students.&nbsp;&nbsp;</p>
						<p>We have established a good system to connect with the parents of each student to update them
							about their child’s improvements and lacking in terms of class attendance, exam results,
							lab classes, and other education-related issues. This is an effort of tri-partners so that we
							can work together to achieve our goals and purposes efficiently and effectively. The College
							alone cannot do much if parents do not co-operate with us.&nbsp;&nbsp;</p>
						<p>We expect that students who come to our college will finally do excellent results in the board
							exams, gain expected knowledge, and be well prepared for higher studies, better employment later
							in practical life. We the members of the faculty, administration, and staff of the college are
							pleased to have this opportunity to serve our students, society, and the nation.</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => 'নটর ডেম কলেজের ইতিকথা ',
						'page_content' => '<p><br />২০০৮ খ্রিস্টাব্দ ময়মনসিংহ ধর্মপ্রদেশে কাথলিক ধর্ম বিশ্বাসের শত বর্ষ পূর্তি উৎসবে ময়মনসিংহ ধর্মপ্রদেশের শ্রদ্ধেয় বিশপ পল পনেন কুবি, সিএসসি পবিত্র ক্রুশ যাজক সংঘের কাছে নতুন একটি নটর ডেম কলেজ প্রতিষ্ঠার অনুরোধ করেন। তিনি আশাবাদ ব্যক্ত করেন যে, ঢাকায় প্রতিষ্ঠিত ঐতিহ্যবাহী নটর ডেম কলেজের আদলে আরেকটি &lsquo;নটর ডেম কলেজ&rsquo; যেন প্রতিষ্ঠা করা হয়, যাতে ময়মনসিংহ ও উত্তরাঞ্চলের মাঝে উচ্চশিক্ষা আরও সহজলভ্য করা যায়।</p>
						<p>২০০৯ খ্রি: পবিত্র ক্রুশ যাজক সংঘের সাধারণ সভায় ময়মনসিংহে নটর ডেম কলেজ প্রতিষ্ঠার সিন্ধান্ত গ্রহণ করা হয়। কলেজ প্রতিষ্ঠার সম্ভাবনা ও বাস্তবায়নের জন্য একটি কমিটি গঠন এবং ফাদার বকুল এস রোজারিও, সিএসসি-কে আহ্বায়ক-এর দ্বায়িত্ব দেয়া হয়। কমিটি বিশপ মহোদয় ও স্থানীয় গণ্যমান্য ব্যক্তিবর্গের সাথে আলাপ-আলোচনা করে বাড়েরা বাইপাস মোড় এলাকায় চার একর জমি ক্রয় করেন। নতুন কলেজ প্রতিষ্ঠার লক্ষ্যে জমি ক্রয়ের পর পরই এর&nbsp;দ্রুত উন্নয়ন কাজ শুরু করা হয়। নির্ধারিত স্থানটি ছিল ধানী জমি ও কোথাও জলাশয়। মাটি ভরাট ও দেওয়াল নির্মাণের মধ্য দিয়ে শুরু হয় এর উন্নয়ন কাজ।</p>
						<p>নতুন কলেজের ভিত্তিপ্রস্তর স্তাপন করেন বাংলাদেশে নিযুক্ত ভাটিকান রাষ্ট্রদূত আর্চ বিশপ যোসেফ মারিনো। এই ঐতিহাসিকক্ষণে গণপ্রজাতন্ত্রী বাংলাদেশ সরকারের ধর্ম বিষয়ক মন্ত্রী আলহাজ অধ্যক্ষ মতিউর রহমান, ময়মনসিংহ ধর্মপ্রদেশের বিশপ পল পনেন কুবি, সিএসসি, পবিত্র ক্রুশ যাজক সংঘের প্রদেশপাল ফা: জেমস ক্লেমেন্ট ক্রুশ, সিএসসি, ময়মনসিংহের মাননীয় জেলা প্রশাসক লোকমান হোসেন মিয়া, মেয়র জনাব ইকরামুল হক টিটু, অতিরিক্ত পুলিশ সুপার এবং আরো গণ্যমাণ্য ব্যক্তিবর্গ উপস্থিত ছিলেন।</p>
						<p>২০১৪ খ্রিস্টাব্দের ৮ মে ফা: বকুল এস রোজারিও, সিএসসি আনুষ্ঠানিকভাবে নবপ্রতিষ্ঠিত কলেজের প্রথম অধ্যক্ষের দায়িত্ব গ্রহণ করেন। কলেজের সহশিক্ষা কার্যক্রমের দায়িত্ব পালন করেন ফাদার থাদেউস হেম্ব্রম, সিএসসি এবং কলেজের ছাত্র পরিচালক ও উপদেষ্টা দাযিত্ব পালন করেন ফাদার প্লাসিড প্রশান্ত রোজারিও, সিএসসি। দাযিত্ব গ্রহণের পর ফাদারগণ প্রথমে অফিস সহকর্মী এবং পরে শিক্ষক নিয়োগের মধ্য দিয়ে শুরু হয় এর শিক্ষার আয়েজন। ১ জুলাই ২০১৪ খ্রিস্টবর্ষে ৬৫৮ জন শিক্ষার্থী এবং ১৮ জন শিক্ষকের বরণ অনুষ্ঠানের মধ্য দিয়ে নটর ডেম কলেজ ময়মনসিংহ নতুন ইতিহাস শুরু করে। অত্যন্ত ভাবগাম্ভীর্য ও অর্থপূর্ণ এই নবীনবরণ অনুষ্ঠানে উপস্থিত ছিলেন মাননীয় জেলা প্রশাসক মুস&Iacute;াকীম বিল্লাহ ফারুকী, ময়মনসিংহ ধর্মপ্রদেশের ধর্মপাল পল পনেন কুবি, সিএসসি, পবিত্র ক্রুশ যাজক সংঘের প্রদেশপাল ফাদার জেমস ক্রুশ, সিএসসি, পবিত্র ক্রুশ সংঘের ও ধর্মপ্রদেশের অন্যান্য ফাদারগণ, গণ্যমাণ্য অতিথিগণ, কলেজের শিক্ষকগণ, কলেজের নতুন শিক্ষার্থী ও তাদের অভিভাবকগণ। হৃদয় ও মনন গঠনে পূর্ণাঙ্গ শিক্ষা দিয়ে শিক্ষার্থীদের সৃজনশীল, দায়িত্বশীল, স&brvbar;াবলম্বী, সুশৃঙ্খল, দেশপ্রেমিক ও বিকশিত মানুষ হিসেবে গড়ে তোলাই এ কলেজের লক্ষ্য ও উদ্দেশ্য।</p>        </p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],
			[
				'page' => [
					'slug' => 'explanation-nomenclature',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'Explanation of Nomenclature',
						'page_content' => '<p>There is a history or purpose behind the name of any institution. The purpose, principles and ideals of the organization are expressed through naming. Notre Dame (Notre Dame) comes from two French words. In English it translates to Our Lady. According to Roman Catholic Christians, Our Lady refers to Mary, the mother of Jesus Christ. Notre Dame College is dedicated to that noble woman, Mother Mary. In the knowledge and age of Jesus Christ, the role of Mother Mary in the love of God and man and human development was unique.	Notre Dame College.</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => 'নামকরণ ও প্রতীকের ব্যাখ্যা',
						'page_content' => '<p style="margin-bottom: 1rem; padding: 0px; color: rgb(69, 69, 69); font-family: Muli, sans-serif; text-align: justify;">&nbsp;কোন প্রতিষ্ঠানের নামকরনের পিছনে কোন ইতিহাস বা উদ্দেশ্য নিহিত থাকে। প্রতিষ্ঠানের উদ্দেশ্য, নীতি ও আদর্শ নামকরণের মধ্য দিয়েই প্রকাশ পায়। নটর ডেম (Notre Dame) শব্দ দুটি ফরাসি ভাষা থেকে নেওয়া। ইংরেজিতে-এর অনুবাদ হয় Our Lady। রোমান ক্যাথলিক খ্রিস্টানগণের মতে Our Lady বলতে যিশু খ্রিস্টের জননী মরিয়ম বা মাতা মেরীকে বুঝানো হয়। নটর ডেম কলেজ সেই মহীয়সী নারী মাতা মেরীর নামে উৎসর্গীকৃত। যিশু খ্রিস্টের জ্ঞানে ও বয়সে, ঈশ্বর&nbsp;ও মানুষের ভালোবাসা এবং মানবিক বিকাশ লাভে মাতা মেরীর ভূমিকা ছিল অনন্য।</p><p style="margin-bottom: 1rem; padding: 0px; color: rgb(69, 69, 69); font-family: Muli, sans-serif; text-align: justify;">নটর ডেম কলেজের মূল নীতিকে যে কথার দ্বারা প্রকাশ করা হয়েছে তা হল Diligite Lumen Sapientiae এ হচ্ছে ল্যাটিন ভাষা, যার ইংরেজি অনুবাদ হচ্ছে, Love the light of wisdom, অর্থাৎ জ্ঞানের আলোকে ভালোবাসা। সৃষ্টিকর্তা ঈশ্বর হচ্ছেন সকল জ্ঞানের উৎস। জ্ঞান (Sapientiae) শব্দটি কলেজের আসল উদ্দেশ্য প্রকাশ করে। শুধু বই পুস্তক পড়ে তত্ত্ব আহরণ করা নয় বরং জ্ঞানের উৎস স্রস্টাকে অর্থাৎ পরম করুণাময় ঈশ্বরকে&nbsp;লাভ করার উপায় জানতে সহায়তা করাও নটর ডেম কলেজের অন্যতম উদ্দেশ্য। Lumen শব্দটি অর্থ হচ্ছে আলো। আলো অন্ধকারকে দূরীভূত করে মানুষকে পথ চলার দৃষ্টিশক্তি দান করে এবং ভালোমন্দের পার্থক্য বোঝার ক্ষমতা দেয়। Diligite শব্দটি হচ্ছে অনুজ্ঞাসূচক, যার অর্থ ভালোবাসা। জ্ঞান যেহেতু কল্যাণকর, যেহেতু ভালোবাসা নিয়ে জ্ঞান আহরণ করতে হবে।</p><p style="margin-bottom: 1rem; padding: 0px; color: rgb(69, 69, 69); font-family: Muli, sans-serif; text-align: justify;">কলেজের প্রতীকের মাঝখানে রয়েছে একটি খোলা পুস্তক, যার এক পৃষ্ঠায় লেখা রয়েছে আলফা অর্থাৎ গ্রিক বর্ণমালার আদি অক্ষর এবং অপর পৃষ্ঠায় লেখা রয়েছে ওমেগা অর্থাৎ বর্ণমালার অন্ত অক্ষর। ঈশ^র হচ্ছেন সব কিছুর আদি ও অন্ত। তাঁকে জানাটাই হচ্ছে প্রকৃত জ্ঞান। বই হচ্ছে জ্ঞানের বাহক বা প্রতিনিধি।</p><p style="margin-bottom: 1rem; padding: 0px; color: rgb(69, 69, 69); font-family: Muli, sans-serif; text-align: justify;">কলেজের প্রতীকে রয়েছে তিনটি ক্ষেত্র। বাম দিকের ক্ষেত্রটিতে দেখা যায় ৭টি ফুলের চিত্র। এখানে ফুল হচ্ছে বিশুদ্ধতার প্রতীক । ডান দিকের ক্ষেত্রটি বাংলাদেশের ভ’মিতে কলেজটির অবস্থানের প্রতীক। আমদের এই দেশটি সবুজে-শ্যামলে সুন্দর। উদীয়মান সূর্য নতুন দিনের নতুন আশার প্রতীক। নিচের ক্ষেত্রটিতে আড়াআড়িভাবে বসানো নোঙরদ্বয়ের মাঝখানে স্থাপিত ক্রুশটি হলিক্রস সংঘের প্রতীক।</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],
			[
				'page' => [
					'slug' => 'vision',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'Vision',
						'page_content' => 'Notre Dame College Mymensingh inspires students to acquire genuine knowledge and skills by creating a conducive learning environment so that they can transform into dignified individuals and be equipped with the knowledge and skills to face the challenges of today',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => 'দর্শন ',
						'page_content' => 'নটর ডেম কলেজ ময়মনসিংহ শিক্ষার উপযুক্ত পরিবেশ সৃষ্টি করে শিক্ষার্থীদের প্রকৃত জ্ঞান ও দক্ষতা অর্জনের জন্য অনুপ্রাণিত করে যেন তারা মর্যাদাপূর্ণ ব্যক্তিতে রূপান্তরিত হয়ে বর্তমান বিশ্বের চ্যালেঞ্জসমূহ মোকাবিলা করার জন্যে জ্ঞান ও দক্ষতায় সুসজ্জিত হতে পারে।',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],
			[
				'page' => [
					'slug' => 'mission',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'Mission',
						'page_content' => 'Notre Dame College Mymensingh imparts quality and qualitative education to students from different parts of rural and urban areas through theory and practical classes and co-curricular activities in an appropriate learning environment. This college imparts innovative and quality life-long education to the students which sets their life on the path of success.',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => 'দর্শন ',
						'page_content' => 'নটর ডেম কলেজ ময়মনসিংহ যথোপযুক্ত শিক্ষার পরিবেশে তত্ত্ব ও ব্যবহারিক ক্লাস এবং সহ-শিক্ষা কার্যক্রমের মাধ্যমে গ্রাম ও শহরের বিভিন্ন জায়গা থেকে আসা শিক্ষার্থীদের জন্যে মানসম্পন্ন ও গুণগত শিক্ষা দান করে থাকে। এই কলেজ শিক্ষার্থীদের উদ্ভাবনী ও গুণগত জীবন-ব্যাপী শিক্ষা দান করে যা তাদের জীবনকে সফলতার পথে পরিচালিত করে।

						',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],
			[
				'page' => [
					'slug' => 'objective',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'Objectives',
						'page_content' => 'In light of the philosophy of Notre Dame College Mymensingh the objectives of the college are as follows:
						1. The college helps students achieve intellectual, physical, moral and psychological excellence through effective technical education.
						2. Multimedia is used in the classroom for students to get proper education.
						3. With the mutual support of administrative officers, faculty, staff and parents, students reveal their latent talents and achieve good results in examinations.
						4. Encourages students to create a safe learning environment by participating in orderly studies, co-curricular activities and sports through mutual respect, respect and social justice.
						5. To love the poor and deprived, and develop them as socially responsible people by imparting values based education to the students.
						6. Encourages students to solve personal, psychological and interpersonal problems through professional counseling.
						7. Helping students develop into thinkers, researchers, innovators and entrepreneurs amidst the fast-paced technological challenges of todays world.',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => 'উদ্দেশ্যসমূহ  ',
						'page_content' => 'নটর ডেম কলেজ ময়মনসিংহ-এর দর্শনের আলোতে কলেজের উদ্দেশ্যসমূহ নিম্নরূপ:
						১. কলেজ ফলপ্রসূ প্রযুক্তিগত শিক্ষা পদ্ধতির মাধমে ছাত্রদের মেধা, শারিরীক, নৈতিক ও মনস্তাত্তি¦ক উৎকর্ষ সাধনে সহায়তা করে।
						২. শিক্ষার্থীদের যথোপযুক্ত শিক্ষা লাভের জন্যে শ্রেণিকক্ষে মাল্টিমিডিয়া ব্যবহার করা হয়।
						৩. প্রশাসনিক অফিসার, শিক্ষকমন্ডলী, স্টাফ এবং অভিভাবকদের পারস্পরিক সহায়তায় শিক্ষার্থীগণ তাদের সুপ্ত প্রতিভা প্রকাশ করে পরীক্ষায় ভাল ফল অর্জন করে।
						৪. পারস্পারিক সদাচরণ, শ্রদ্ধাবোধ এবং সামাজিক ন্যায্যতার মাধমে শৃংখলা মেনে পড়াশোনা, সহশিক্ষা কার্যক্রম এবং খেলাধুলায় অংশগ্রহণ করে শিক্ষার একটি নিরাপদ পবিবেশ সৃষ্টি করতে ছাত্রদের উদ্বুদ্ধ করে।
						৫. শিক্ষার্থীদের মূল্যবোধ ভিত্তিক শিক্ষা প্রদানের মাধ্যমে দরিদ্র এবং বঞ্চিতদের ভালবাসতে, এবং সামাজিকভাবে দায়িত্বশীল মানুষরূপে গড়ে তুলে।
						৬. পেশাগত পরামর্শদানের মাধ্যমে শিক্ষার্থীদের ব্যক্তিগত, মনস্তাত্ত্বিক এবং পারস্পরিক সমস্যা সমাধানে উৎসাহিত করে।
						৭. বর্তমান জগতের দ্রুতগতি সম্পন্ন প্রযুক্তিগত চ্যালেঞ্জসমূহের মধ্যেই ছাত্রদের চিন্তাশীল মানুষ, গবেষক, উদ্ভাবক এবং উদ্যোগতারূপে গড়ে তুলতে সহায়তা করে।

						',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],
			[
				'page' => [
					'slug' => 'goal',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'Goal',
						'page_content' => 'To establish Notre Dame College Mymensingh as a model educational institution in the country where students will acquire practical knowledge with equal opportunities.',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => ' লক্ষ্য  ',
						'page_content' => 'দেশে নটর ডেম কলেজ ময়মনসিংহকে একটি আদর্শ শিক্ষা প্রতিষ্ঠানরূপে প্রতিষ্ঠা করা যেখানে ছাত্ররা সকলে সমান সুযোগ লাভের মাধমে ব্যবহারিক জ্ঞান অর্জন করবে।

						',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],
			[
				'page' => [
					'slug' => 'motto',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'Motto',
						'page_content' => 'The motto of Notre Dame College Mymensingh is, Pursue Knowledge through Human Service. The motto of this motto is not to be limited only to literary knowledge but to seek real knowledge and become a devotee of human service. The Bengali word for English knowledge is knowledge. The name of the college, Notre Dame, is derived from the French language; Which is Our Lady in English and Mata Meri in Bengali. Just as Mary, the Mother of Knowledge, the mother of Jesus Christ, raised her Son in knowledge, age and love of humanity and inspired him to devote his life to the service of humanity, so this motherly educational institution invites every Notredamian to seek true human knowledge through education by being initiated into the motto of the college. He is motivated by moral values and dedicated to develop people who are committed to human service.',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => '  মূলমন্ত্র ',
						'page_content' => '<p> নটর ডেম কলেজ ময়মনসিংহ-এর মূলমন্ত্র হচ্ছে, জ্ঞান অন্বেষণ করো মানব সেবার তরে। এই মূলমন্ত্রের প্রতিপাদ্য হলো শুধু গ্রন্থগত বিদ্যায় সীমাবদ্ধ না থেকে প্রকৃত জ্ঞান অন্বেষী হয়ে মানব সেবায় ব্রতী হওয়া। ইংরেজি Knowledge শব্দের বাংলা হলো জ্ঞান। </p> <P>কলেজের নাম Notre Dame, ফরাসি ভাষা থেকে উদ্ভূত; যার ইংরেজি হলো Our Lady এবং বাংলায় মাতা মেরী। যীশু খ্রিস্টের জননী জ্ঞানের মাতা মেরী যেমন তাঁর পুত্রকে জ্ঞানে, বয়সে ও মানুষের ভালোবাসায় গড়ে তুলেছেন এবং মানব সেবায় ব্রতী হয়ে জীবন উৎসর্গ করতে অনুপ্রাণিত করেছেন, তেমনি মাতৃরূপ এই শিক্ষা প্রতিষ্ঠান প্রত্যেক Notredamian -কে অত্র কলেজের মূলমন্ত্রে দীক্ষিত হয়ে শিক্ষা লাভের মাধ্যমে প্রকৃত জ্ঞান অন্বেষণ করে মানবিক ও নৈতিক মূল্যবোধে উদ্বুদ্ধ হয়ে মানব সেবায় ব্রতী ব্যক্তিরূপে গড়ে তুলতে নিবেদিত।</P>

						',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],
			[
				'page' => [
					'slug' => 'admission-information',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'Admission info',
						'page_content' => '<img src="https://ndcm.edu.bd/public/page_Image/admission_information4987.png">',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => 'ভর্তির তথ্য  ',
						'page_content' => '<img src="https://ndcm.edu.bd/public/page_Image/admission_information4987.png">',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],
			[
				'page' => [
					'slug' => 'booklist',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'Book list',
						'page_content' => '<p>Book List</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => 'বইএর তালিকা ',
						'page_content' => '<p>বইএর তালিকা</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],

			[
				'page' => [
					'slug' => 'academic-achievement',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'Academic Achivement',
						'page_content' => '<p>academic achivement</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => ' প্রাতিষ্ঠানিক অর্জন ',
						'page_content' => '<p>প্রাতিষ্ঠানিক অর্জন</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],
			[
				'page' => [
					'slug' => 'class-routine',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'Class routine',
						'page_content' => '<p>Class Routine</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => 'ক্লাস রুটিন ',
						'page_content' => '<p>ক্লাস রুটিন</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],
			[
				'page' => [
					'slug' => 'academic-facilities',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'Academic Facilities',
						'page_content' => '<p>Academic Facilities</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => ' একাডেমিক সুবিধা ',
						'page_content' => '<p>একাডেমিক সুবিধা</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],
			[
				'page' => [
					'slug' => 'debating-club',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'Debating Club',
						'page_content' => '<P>Notre Dame Debating Club
						Personal Date: July 2014
						Slogan: Think Globally, Act Locally
						
						
						History of Club Competition: First First First, Notor Debating Club Mymensingh started its activities in July 2014 and since then its activities have been held periodically and the question is with the highest reputation abroad. Every week the club members and moderator participate in mass debate exercises. Since the local time, the club has been operating on Grill on Thomkemark during the pandemic to facilitate its progress.
						
						Aims and Objectives:
						1. Putting knowledge into practice through experience and reference.
						2. To develop students intelligence and thinking through debate practice
						3. Teaching creative subjects beautifully presented by hand
						4. To discuss the discussion on the economic, economic, cultural and social issues of the country.
						
						Activities:
						1 Annual Debate Workshop
						2. Participation in national debates.
						3 educational formula
						4 Anandabhram
						5 Annual publication
						
						Club Achievements:
						1 2016 National Debate Winner Winner
						2 2017 Homecoming National Debate 2nd place.
						3, 2017 Dem, Dhaka Jatiya Party notar participated in semi-final
						4 In 2018, Holycross Authority participated with the Clear Competition.
						
						Facebook page: https://www.youtube.com/watch?v=bukn9z7vu3E</P>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => '  ডিবেটিং ক্লাব',
						'page_content' => 'নটর ডেম ডিবেটিং ক্লাব
						প্রতিষ্ঠাকাল: জুলাই ২০১৪
						স্লোগান: Think Globally, Act Locally
						
						
						ক্লাবের সংক্ষিপ্ত ইতিহাস: কলেজ প্রতিষ্ঠার বছরের শুরুতেই, ২০১৪ সালের জুলাই মাসে নটর ডেম ডিবেটিং ক্লাব ময়মনসিংহ তার কার্যক্রম শুরু করে এবং তার পর থেকে তার কার্যক্রম ধারাবাহিকভাবে চালিয়ে যাচ্ছে এবং সেটা দেশথবিদেশে সর্বত্র সুনামের সাথে। প্রতিষ্ঠার পর থেকে এ ক্লাব শিক্ষার্থীদের মাঝে যুক্তির সৃজনশীলতার চর্চা বাড়াতে প্রতি সপ্তাহে ক্লাব দিবসে ক্লাবের সদস্যরা এবং মডারেটরগন বিতর্ক চর্চায় অংশ নিয়ে থাকেন। প্রতিষ্ঠার পর থেকে এ ক্লাব তার সৃজনশীল কার্যক্রম থামিয়ে রাখেনি তবে করোনা মহামারি সময়ে কিছুটা থমকে গেলেও অন-লাইনে এ ক্লাবের কার্যক্রম চালায়।
						
						লক্ষ্য ও উদ্দেশ্য:
						১. শিক্ষার্থীদের জ্ঞানের চর্চাকে অভিজ্ঞতা ও উপস্থাপনের মাধ্যমে বাস্তবে পরিনত করা।
						২. বিতর্ক চর্চার মাধ্যমে ছাত্রদের মেধা ও মননের বিকাশ ঘটানো
						৩. সৃজনশীল বিষয়গুলোকে সুন্দরভাবে উপস্থাপনা হাতে কলমে শেখানো
						৪. দেশ, বিদেশের রাজনৈতিক, অর্থনৈতিক, সাংস্কৃতিক ও মাসাজিক বিষয়গুলোকে নিয়ে নিয়মিত বিতর্ক চর্চা করা।
						
						কার্যক্রম:
						১ বার্ষিক বিতর্ক কর্মশালা
						২ জাতীয় বিতর্ক প্রতযোগিতাগুলোতে অংশগ্রহন করা।
						৩ শিক্ষাসফর
						৪ আনন্দভ্রম
						৫ বার্ষিক দেয়ালিকা প্রকাশ
						
						ক্লাবের অর্জন সমূহ:
						১ ২০১৬ সালে জাতীয় বিতর্ক প্রতিযোগিতায় বিজয়ী হওয়া
						২ ২০১৭ ঘউঋ জাতীয় বিতর্ক প্রতিযোগিতায় ২য় স্থান অধিকার করা।
						৩ ২০১৭ সালে নটর ডেম কলেজ ঢাকা কর্তৃক আয়োজিত প্রতিযোগিতায় অংশগ্রহন করে সেমিফাইনালে যাওয়া
						৪ ২০১৮ সালে হলিক্রস কলেজ কর্তি আয়োজিত প্রতিযোগিয়াত সাফযের সাথে অংশ নেয়া।
						
						ফেইসবুক পেইজ: https://www.youtube.com/watch?v=bukn9z7vu3E',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],
			[
				'page' => [
					'slug' => 'cultural-club',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'Cultural Club',
						'page_content' => '<p>Notre Dame Cultural Club
						Club establishment date: 01 August 2014
						
						Slogan: May the hearts of all be developed in the practice of pure culture
						
						Brief History of the Club: The Notre Dame College Mymensingh Cultural Club started its journey at the same time as the establishment of Notre Dame College Mymensingh to awaken the spirit of the students to manifest their immense talent. Since its establishment in 2014, the club has been making a mark of uniqueness in various regional and national level events in Bangladesh. The Notre Dame College Cultural Club thrives on organizing, celebrating and achieving with this indomitable passion to end the dynamism and obsolescence of pure consciousness in culture. In 2018, two members of the club (Asif and Tapu) won awards at the national level of Bangladesh, testifying to this meritorious achievement. The clubs moderators, sponsoring teachers and talented student members are leaving the creative touch of Durniba in various arts including music, recitation, drama, painting. It is a good wish that this extremely creative club will keep the reputation of Notre Dame College Mymensingh intact throughout the country and internationally.
						
						
						Current Aims and Objectives of the Club:
						1. To enable students to have a clear understanding of their own culture, culture and cherish it.
						3. Practicing and developing creativity in a student.
						4. To make a student responsible and aware of his responsibilities towards the society and prepare him to fulfill them.
						5. To explore and develop the inherent talent of the students.
						
						 
						
						Annual Specific Activities:
						1. Collection of club members
						2. Formation of club committee
						3. Practicing national anthem
						4. Nazrul music practice
						5. Rabindra Sangeet practice
						6. Practicing patriotic music
						7. Modern music practice
						8. Classical dance practice
						9. Modern dance practice
						10. Practice poetry
						11. Presentation practice
						12. Preparing for the competition
						13. Club Achievements:
						
						
						Notre Dame Cultural Club already has several achievements in its basket of success.
						
						1. Two members of our club (Tapu and Asif) participated and won the prize (1st place) in the final team of Mymensingh division in the national level purely national music practice competition 2018 - higher secondary level.
						
						2. Besides, cultural club Notre Dame College Mymensingh achieved great success in solo and group dance in the cultural festival organized by Notre Dame College Dhaka.
						
						3. In the cultural competition with other colleges of Mymensingh during the Mymensingh Education and Culture Week, our club members achieved success in various subjects (patriotic music, Rabindra music, Nazrul music, modern music, poetry and classical dance) which in a word is enviable.
						
						Facebook page: https://www.facebook.com/Ndcmculturalclub</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => '  সাংস্কৃতিক ক্লাব',
						'page_content' => '<p>নটর ডেম সাংস্কৃতিক ক্লাব
						ক্লাবের প্রতিষ্ঠাকাল : ০১ আগষ্ট ২০১৪
						
						স্লোগান: শুদ্ধ সংস্কৃতি চর্চায় বিকশিত হোক সবার হৃদয়
						
						ক্লাবের সংক্ষিপ্ত ইতিহাস: নটরডেম কলেজ ময়মনসিংহর প্রতিষ্ঠার সমকালীন সময়েই অপার মেধার উদ্ভাসনে শিক্ষার্থীদের চেতনার অনুরননে যাত্রা শুরু করে নটরডেম কলেজ ময়মনসিংহ সাংস্কৃতিক ক্লাব। ২০১৪ সালে প্রতিষ্ঠার পর থেকেই ক্লাবটি বাংলাদেশের বিভিন্ন আঞ্চলিক ও জাতীয় পর্যায়ের আয়োজন গুলোতে অনন্যতার সাক্ষর রেখে আসছে। সংস্কৃতিতেই যে শুদ্ধ চেতনার গতিময়তা ও জরাকীর্ণতার অবসান এই অদম্য স্পৃহায় নটরডেম কলেজ সাংস্কৃতিক ক্লাব তাদের আয়োজন, উদযাপন ও অর্জনে সমৃদ্ধি প্রতিষ্ঠা করছে। ২০১৮ সালে ক্লাবটির দুইজন সদস্যের (আসিফ ও তপু) বাংলাদেশের জাতীয় পর্যায়ে পুরস্কার অর্জন এই মেধাবী কৃতিত্বের সাক্ষ্য দেয়। ক্লাবটির মডারেটর, পৃষ্ঠোপোষক শিক্ষকবৃন্দ ও মেধাবী শিক্ষার্থী সদস্যরা সংগীত, আবৃত্তি, নাটক, অংকণ সহ নানামুখী শিল্পকলায় দুর্নিবার সৃজনী স্পর্শ রেখে যাচ্ছে অদ্যাবধি। অপার সৃষ্টিশীল এই ক্লাবটি তাদের কৃতিত্বে সমগ্র দেশ তথা আন্তর্জাতিক ভাবে নটরডেম কলেজ ময়মনসিংহ এর সুনাম অক্ষুন্ন রাখবে এই শুভ কামনা।
						
						
						ক্লাবের বর্তমান লক্ষ্য ও উদ্দেশ্য:
						১. শিক্ষার্থীদের স্বীয় সংস্কৃতি, কৃষ্টি সম্পর্কে স্পষ্ট ধারণা প্রদান এবং তা লালন করার উপযোগী করে তোলা।
						৩. একজন শিক্ষার্থীর মাঝে সৃজনশীলতার চর্চা ও বিকাশ সাধন।
						৪. একজন শিক্ষার্থীকে দায়িত্বশীল রূপে গড়ে তোলা এবং সমাজের প্রতি তার দায়িত্ব কর্তব্য সমূহ সম্পর্কে অবগত করা ও তা পালনে তাকে প্রস্তুত করে তোলা।
						৫. শিক্ষার্থীর অন্তনির্হিত প্রতিভাকে অন্বেষণ করা ও তা বিকাশে সাহায্য করা।
						
						 
						
						বার্ষিক নির্দিষ্ট কার্যক্রম:
						১. ক্লাবের সদস্য সংগ্রহ
						২. ক্লাবের কমিটি গঠন
						৩. জাতীয় সংগীত চর্চা
						৪. নজরুল সংগীত চর্চা
						৫. রবীন্দ্র সংগীত চর্চা
						৬. দেশাত্ববোধক সংগীত চর্চা
						৭. আধুনিক সংগীত চর্চা
						৮. ক্লাসিক্যাল নৃত্য চর্চা
						৯. আধুনিক নৃত্য চর্চা
						১০. কবিতা আবৃত্বি চর্চা
						১১. উপস্তাপনা চর্চা
						১২. প্রতিযোগীতার প্রস্তুতি গ্রহন
						১৩. ক্লাবের অর্জন সমূহ:
						
						
						ইতোমধ্যেই নটর ডেম সাংস্কৃতিক ক্লাবের সাফল্যের ঝুড়িতে এসেছে বেশ কিছু অর্জন।
						
						১. জাতীয় পর্যায়ে শুদ্ধভাবে জাতীয় সংগীত চর্চা প্রতিযোগিতা ২০১৮ - এ উচ্চ মাধ্যমিক পর্যায়ে ময়মনসিংহ বিভাগের চূড়ান্ত দলে আমাদের ক্লাবের দুজন সদস্য (তপু ও আসিফ) অংশগ্রহণ ও পুরস্কার (১ম স্থান) অর্জন করে।
						
						২. এছাড়া নটর ডেম কলেজ ঢাকা কতৃক আয়োজিত সাংস্কৃতিক উৎসবে সাংস্কৃতিক ক্লাব নটর ডেম কলেজ ময়মনসিংহ একক ও দলীয় নৃত্যে ব্যপক সাফল্য অর্জন করে।
						
						৩. ময়মনসিংহ শিক্ষা ও সংস্কৃতি সপ্তাহ-এ ময়মনসিংহের অন্যান্য কলেজের সাথে সাংস্কৃতিক প্রতিযোগিতায় আমাদের ক্লাবের সদস্যরা বিভিন্ন বিষয়ে (দেশাত্ববোধক সংগীত, রবীন্দ্র সংগীত, নজরুল সংগীত, আধুনিক সংগীত, কবিতা আবৃতি ক্লাসিক্যাল নৃত্য) সাফল্য অর্জন করে যা এক কথায় ঈর্ষণীয়।
						
						ফেইসবুক পেইজ: https://www.facebook.com/Ndcmculturalclub</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],
			[
				'page' => [
					'slug' => 'science-club',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'Science Club',
						'page_content' => '<p>Notre Dame Science Club
						Established: September 2014 AD
						Slogan: Make life enjoyable with the touch of science
						
						A brief history of the club
						
						Our world is very wonderful. Just as the vastness of this world is unimaginable, there is no end to the intelligence of even the smallest particles. So since ancient times intelligent people have been searching for these secrets. In pursuit of this mystery, we have reached today modern age, which is entirely dependent on technology. As a result of the successful use of science and technology, various countries of the world have reached the golden peak of success today. Currently, there is no alternative path for the development of the country and the nation except the development of science and technology. Keeping that goal in mind, "Notre Dame Science Club" was first established in Mymensingh on September 2014 to use science in the service of people and to make the young generation science minded.
						
						 
						
						Aims and Objectives of the Club:
						
						Realizing the importance of science in everyday life.
						
						Getting young students to think science.
						
						To be able to create more new and new ways of thinking by using various theoretical aspects of science in practical situations.
						
						Accelerating the science literacy movement.
						
						Making life easier by making simple scientific instruments using indigenous technology.
						
						To train students in organizational activities.
						
						 
						
						Annual Specific Activities of the Club:
						
						  Preparing and organizing various science related projects.
						
						Participation in various international and national olympiads.
						
						Organizing group wise olympiads of colleges.
						
						Publication of annual magazine on various activities of the club.
						
						To arrange knowledge acquisition through educational tours.
						
						Arranging participation in various science fairs with their own projects.
						
						Conduct tree plantation drive.
						
						Club Achievements:
						 
						
						Divisional competition of National Earth Olympiad: NEO-2015 was held at Bangladesh Agricultural University on 26/12/2015 and 7 members were selected by 9 member teams.
						
						NDSCM members Mahdi Hasan Emon and Junayet Hossain got second place in the Olympiad of the 2nd International Nature Summit-2016 held at Notre Dame College, Dhaka on 12-13 February 2016 and won the third place in the slogan competition.
						
						International Green Conference-2016 NDSCM member Md. Ataur Rahman Saikat and Mahdi Hasan Emon participated in the seminar of 2016 and got the opportunity to give Green Speech as the youngest participants.
						
						Prakash Maitra of NDSCM won 2nd place in Eco-vocabulary category at 7th International Nature Summit -2016. Received the award from Honorable LGRD Minister Hon.
						
						Notre Dame Annual Science Festival 2016 and 6th GKC was held in the first half of September. Our club members carry the name of the club with considerable reputation.
						
						Notre Dame Science Club organized and successfully completed the 1st Notre Dame Science Fair in 2017 and 2019 Science Olympiad in Mymensingh Division on its own initiative.
						
						  Club Facebook Page Link: Fb.me/scnd.official</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => 'সায়েন্স ক্লাব  ',
						'page_content' => 'নটর ডেম সায়েন্স ক্লাব
						প্রতিষ্ঠাকাল: সেপ্টেম্বর ২০১৪ খ্রিষ্টাব্দ
						স্লোগান: বিজ্ঞানের ছোঁয়ায় জীবন হোক উপভোগ্য
						
						ক্লাবের সংক্ষিপ্ত ইতিহাস
						
						আমাদের এ জগত অতি বিস্ময়কর। এ জগতের বিশালতা যেমন অচিন্তনীয় তেমনি ক্ষুদ্রাতি ক্ষুদ্র কণাদেরও সূক্ষতার শেষ নেই। তাই প্রাচীনকাল থেকেই বুদ্ধিমান মানুষেরা এসবের রহস্য খুঁজে চলেছে। এই রহস্যের পিছনে ছুটতে ছুটতে আমরা পৌঁছেছি বর্তমানে আধুনিক যুগে যার পুরোটা প্রযুক্তি নির্ভর। বিজ্ঞান ও প্রযুক্তির সফল ব্যবহারের ফলে পৃথিবীর বিভিন্ন দেশ আজ সাফল্যের স্বর্ণ শিখর ছুঁয়েছে। বর্তমানে দেশ ও জাতির উন্নয়নের জন্য বিজ্ঞান ও প্রযুক্তির উন্নয়ন ছাড়া বিকল্প কোনো রাস্তা নেই। সেই লক্ষ্যকে সামনে রেখে মানুষের সেবায় বিজ্ঞানকে কাজে লাগাতে এবং তরুণ প্রজন্মকে বিজ্ঞান মনস্ক করে তুলতে বৃহত্তম ময়মনসিংহে সর্বপ্রথম সেপ্টেম্বর ২০১৪ ইং তারিখে-এ প্রতিষ্ঠা হয় “নটর ডেম বিজ্ঞান ক্লাব”।
						
						 
						
						ক্লাবের লক্ষ্য ও উদ্দেশ্য:
						
						দৈনন্দিন জীবনে বিজ্ঞানের গুরুত্বকে উপলব্ধি করা।
						
						তরুন শিক্ষার্থীদের বিজ্ঞান মনস্ক করা।
						
						বিজ্ঞানের বিভিন্ন তাত্তি¡ক বিষয়গুলো বাস্তব ক্ষেত্রে ব্যবহার করে আরো নতুন নতুন চিন্তাধারা তৈরি করতে সক্ষম হওয়া।
						
						বিজ্ঞানের সাক্ষরতা আন্দোলনকে ত্বরান্বিত করা।
						
						দেশীয় প্রযুক্তি ব্যবহার করে সহজ বৈজ্ঞানিক উপকরণ তৈরীর মাধ্যমে জীবন যাত্রাকে সহজতর করা।
						
						সাংগঠনিক কর্মকান্ডে ছাত্রদের সুদক্ষ করা।
						
						 
						
						ক্লাবের বার্ষিক নির্দিষ্ট কার্যক্রম:
						
						 বিভিন্ন বিজ্ঞান বিষয়ক প্রজেক্ট তৈরী ও প্রদর্শনের আয়োজন করা।
						
						আন্তর্জাতিক ও জাতীয় বিভিন্ন অলিস্পিয়াডে অংশগ্রহণ।
						
						কলেজের গ্রুপ পভিত্তিক অলিম্পিয়াডের আয়োজন করা।
						
						ক্লাবের বিভিন্ন কার্যক্রম নিয়ে বাৎসরিক ম্যাগাজিন প্রকাশ করা।
						
						শিক্ষা সফরের মাধ্যমে জ্ঞান অর্জনের ব্যবস্থা করা।
						
						বিভিন্ন বিজ্ঞান মেলায় নিজেদের প্রজেক্ট সহ অংশগ্রহণের ব্যবস্থা করা।
						
						বৃক্ষরোপন অভিযান পালন করা।
						
						ক্লাবের অর্জন সমূহ:
						 
						
						National Earth Olympiad: NEO -2015 এর বিভাগীয় প্রতিযোগিতা ২৬/১২/২০১৫ তারিখে বাংলাদেশ কৃষি বিশ্ববিদ্যালয় অনুষ্ঠিত হয় ৯ সদস্যের দল অংশগ্রহণ করে ৭ জন সদস্য নির্বাচিত হয়।
						
						১২-১৩ ফেব্রুয়ারী ২০১৬ইং তারিখে নটর ডেম কলেজ, ঢাকায় অনুষ্ঠিত 2nd International Nature Summit -2016 এর অলিম্পিয়াডে দ্বিতীয় স্থান NDSCM এর সদস্য মাহ্দী হাসান ইমন এবং জুনায়েত হোসেন স্লোগান প্রতিযোগিতার তৃতীয় স্থান অর্জন করে।
						
						International Green Conference-2016 ২০১৬ এর সেমিনারে NDSCM- এর সদস্য  মোঃ আতাউর রহমান সৈকত এবং মাহ্দী হাসান ইমন অংশগ্রহণ করে এবং কনিষ্ঠ অংশগ্রহণকারী হিসাবে Green Speech দেওয়ার সুযোগ পায়।
						
						৭ম International Nature Summit -2016 -তে NDSCM- এর প্রকাশ মৈত্র Eco-vocabulary বিভাগে ২য় স্থান অর্জন করে। পুরস্কার গ্রহণ করেন মাননীয় LGRD মন্ত্রী মহোদয়ের কাছ থেকে।
						
						Notre Dame Annual Science Festival 2016 and 6th GKC অনুষ্ঠিত হয় সেপ্টেম্বর মাসের প্রথমার্ধে। আমাদের ক্লাবের সদস্যরা যথেষ্ট সুনামের সাথে ক্লাবের নাম তুলে ধরে।
						
						ময়মনসিংহ বিভাগে নিজ উদ্যোগে নটর ডেম বিজ্ঞান ক্লাব ২০১৭ সালে 1st Notre Dame Science Fair এবং ২০১৯ বিজ্ঞান অলিম্পিয়াড অনুষ্ঠানের আয়োজন করে এবং সফলভাবে সমপন্ন করে।
						
						 ক্লাবের ফেইসবুক পেইজ লিংক:   Fb.me/scnd.official',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],

			[
				'page' => [
					'slug' => 'volunteer-alliance',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'volunteer Alliance
						',
						'page_content' => '<p>Notre Dame Volunteers Alliance
						Established: 10 December 2014
						Slogan: Work together, win humanity.
						Brief history of the club:
						Every person is born in this world with some talent. But many cannot develop this latent talent due to lack of suitable opportunities and environment. There is no alternative to evolving yourself to survive in a competitive world. Notre Dame College Mymensingh has created a team that creates outstanding opportunities for talented students to express themselves. The name of this group is Volunteers Alliance. This group is completely heterogeneous and new. Its official operation started from December 2014.
						This group consists of selected students from among the students of Notre Dame College Mymensingh who represent all students. Apart from classroom teaching, Notre Dame College Mymensingh Volunteers Alliance focuses on activities such as manual labor, conferences, seminars, sports, life fellowship, educational tours, participation in parades, evaluation of camping work, etc.
						Current Aims and Objectives of the Club:
						To develop students loyalty and respectful attitude towards the law and order of the country through discipline
						To prepare students as ideal, responsible, and humane people.
						To develop as a competent and timely person through physical exercise.
						Helping them develop leadership qualities by giving them club management responsibilities.
						Encouraging students with love of humanity and patriotism.
						Annual Specific Activities:
						Ongoing Activities of the Club:
						Public awareness creation and participation in organizational activities.
						Helping to become enlightened people with love of country, awareness and sense of responsibility.
						Practicing and developing creativity in a student.
						To train students in organizational activities.
						
						Club Achievements:
						Many of the members of the Volunteers Alliance have completed their college programs and are serving in various forces. For example, the captain of the first committee of volunteers is currently serving as a lieutenant.
						13. Club Facebook Page: Enter the link below
						Page Link: https://www.facebook.com/NDCM-Volunteer-Alliance-NDVA-106284941971386/</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => 'ভলান্টিয়ার্স এলাইয়েন্স',
						'page_content' => 'নটর ডেম ভলান্টিয়ার্স এলাইয়েন্স
						প্রতিষ্ঠাকাল : ১০ ডিসেম্বর ২০১৪
						স্লোগান: কাজ করবো একসাথে, জয় করবো মানবতাকে।
						ক্লাবের সংক্ষিপ্ত ইতিহাস:
						প্রতিটা মানুষই কিছু না কিছু প্রতিভা নিয়ে এই পৃথিবীতে জন্মগ্রহণ করে। কিন্তু উপযুক্ত সুযোগ এবং পরিবেশের অভাবে অনেকে তাদের এই সুপ্ত প্রতিভাকে বিকশিত করতে পারে না। প্রতিযোগীতামূলক বিশ্বে টিকে থাকার জন্য নিজেকে বিকশিত করার বিকল্প নেই। নটর ডেম কলেজ ময়মনসিংহ এমন একটি দল তৈরি করেছে যা প্রতিভাবান শিক্ষার্থীদের আত্ম-প্রকাশের জন্য অসামান্য সুযোগ সৃষ্টি করে দেয়। এই দলটির নাম ভলান্টিয়ার্স এলাইয়েন্স। এই দলটি সম্পূর্ণ ভিন্নধর্মী ও নতুন। এর আনুষ্ঠানিক কার্যক্রম শুরু হয় ডিসেম্বর ২০১৪ সাল থেকে।
						এই দলটি নটর ডেম কলেজ ময়মনসিংহ এর শিক্ষার্থীদের মধ্য থেকে বাছাইকৃত শিক্ষার্থীদের নিয়ে গঠিত যারা সকল শিক্ষার্থীদের প্রতিনিধিত্ব করে থাকে। ক্লাসে শিক্ষাদানের বাইরে নটর ডেম কলেজ ময়মনসিংহ ভলান্টিয়ার্স এলাইয়েন্স যেসব বিষয়ে গুরুত্ব দেয় কায়িক শ্রম, কনফারেন্স, সিমিনার, খেলাধুলা, জীবন সহভাগিতা, শিক্ষা সফর, প্যারেডে অংশগ্রহণ, ক্যাম্পিং কাজের মূল্যায়ণ ইত্যাদি।
						ক্লাবের বর্তমান লক্ষ্য ও উদ্দেশ্য:
						নিয়ম শৃঙ্খলার মাধ্যমে শিক্ষার্থীদের দেশের আইন শৃঙ্খলার প্রতি আনুগত্য ও শ্রদ্ধাশীল মনোভাব গড়ে তোলা
						শিক্ষার্থীদের আদর্শবান, দায়িত্বশীল, ও মানবিক মানুষ হিসাবে প্রস্তুত করা ।
						শারীরিক কসরতের মাধ্যমে যোগ্য ও সময় উপযোগী মানুষ হিসেবে গড়ে তোলা।
						ক্লাব পরিচালনার দায়িত্ব প্রদানের মাধ্যমে তাদের নেতৃত্বের গুণাবলি বিকাশে সহায়তা করা।
						শিক্ষার্থীদের মানবপ্রেম ও দেশপ্রেমে উজ্জীবিত করা।
						বার্ষিক নির্দিষ্ট কার্যক্রম:
						ক্লাবের চলমান কার্যক্রম সমূহ:
						জনসচেতনতা সৃষ্টি ও সাংগাঠনিক কর্মকান্ডে অংশগ্রহণ।
						দেশ প্রেম, সচেতন ও দায়িত্ববোধ সম্পন্ন আলোকিত মানুষ হতে সহায়তা করণ।
						একজন শিক্ষার্থীর মাঝে সৃজনশীলতার চর্চা ও বিকাশ সাধন।
						সাংগঠনিক কর্মকান্ডে ছাত্রদের সুদক্ষ করা।
						
						ক্লাবের অর্জন সমূহ:
						ভলান্টিয়ার্স এলাইয়েন্সের সদস্যরা কলেজ কার্যক্রম শেষ করে অনেকেই বিভিন্ন বাহিনীতে কর্মরত রয়েছে। যেমনঃ ভলান্টিয়ার্সের প্রথম কমিটির ক্যাপ্টেন বর্তমানে লেফটেন্যান্ট হিসেবে কর্মরত আছে।
						১৩. ক্লাবের ফেইসবুক পেইজ: নিচে লিংকটি লিখুন
						পেইজের লিংক: https://www.facebook.com/NDCM-Volunteer-Alliance-NDVA-106284941971386/',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],
			[
				'page' => [
					'slug' => 'business-club',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'Business Club',
						'page_content' => '<p>Notre Dame Business Club
						The club was founded on July 1, 2015.
						Slogan: Business is the main driving force of economic development of the country.
						BRIEF HISTORY: Established on 1st July 2015 under the guidance of the then Club Coordinator Fr Thaddeus Hembrom CSC with the aim of imparting practical knowledge of business to students. Two moderators Md. Mizanur Rahman and Ilyas Ahmed have been managing the club since its inception.
						Aims and Objectives:
						To improve the quality of life and create employment opportunities by conducting business and trade in the decade of economic development.
						-Getting an idea about the financing of the business organization.
						-Helping in developing practical knowledge of business along with theoretical concepts.
						-To gain knowledge about production, distribution and marketing of products through factory visits.
						- Get an idea about the life history of a successful businessman.
						- Giving practical knowledge about capital and capital markets.
						-Helping students develop leadership qualities by providing club management responsibilities
						- Participate in various competitions.
						- To impart knowledge to the students about industrial trade by organizing seminars.
						Activities: Educational tour, factory visit, participation in various college functions and publication of posters
						Achievements: Earning profit by selling products in the stall on the occasion of educational and cultural week in the college
						Page Link: https://www.facebook.com/NotreDameBusinessClub/</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => 'বিজনেস ক্লাব',
						'page_content' => '<p>নটর ডেম বিজনেস ক্লাব
						ক্লাবের প্রতিষ্ঠাকালঃ ১জুলাই , ২০১৫ খ্রিষ্টাব্দ।
						স্লোগানঃ ব্যবসায়ই দেশের অর্থনৈতিক উন্নয়নের মূল চালিকা শক্তি।
						সংক্ষিপ্ত ইতিহাসঃ ছাত্রদের ব্যবসায় বানিজ্য সম্পর্কে বাস্তব জ্ঞান অর্জনের লক্ষে ১ জুলাই ২০১৫ খ্রিষ্টাব্দে ততকালিন ক্লাব কো-অর্ডিনেটর ফাঃ থাদেউস হেম্ব্রম সিএসসি এর নির্দেশনায় প্রতিষ্ঠিত হয়। শুরু থেকে বর্তমান সময় পর্যন্ত দুইজন মডারেটর মোঃ মিজানুর রহমান এবং ইলিয়াস আহমেদ ক্লাবটি পরিচালনা করে আসছেন।
						লক্ষ্য এবং উদ্দেশ্যঃ
						দশের অর্থনৈতিক উন্নয়নে ব্যবসায় বানিজ্য পরিচালনা করে জীবনযাপনের মান উন্নয়ন এবং কর্মসংস্থানের সুযোগ সৃষ্টি করা।
						-ব্যবসায় প্রতিষ্ঠানের অর্থায়ন সম্পর্কে ধারণা লাভ।
						-তত্ত্বগত ধারণার পাশাপাশি ব্যবসায় বানিজ্য সম্পর্কে ব্যবহারিক জ্ঞান বৃদ্ধিতে সহায়তা করা।
						-শিল্পকারখানা ভ্রমনের মাধ্যমে পণ্য উৎপাদন , বণ্টন ও বাজারজাতকরণ সম্পর্কে জ্ঞান অর্জন করা।
						- সফল ব্যবসায়ীর জীবন ইতিহাস সম্পর্কে ধারণা লাভ।
						-মূলধন ও পূঁজিবাজার সমন্ধে বাস্তব জ্ঞান দান।
						-ক্লাব পরিচালনার দায়িত্ব প্রদানের মাধ্যমে ছাত্রদের নেতৃত্বের গুণাবলি বিকাশে সহয়তা করা
						- বিভিন্ন ধরনের প্রতিযোগিতায় অংশগ্রহন করা।
						- সেমিনার আয়োজনের মাধ্যমে শিল্প বানিজ্য বিষয়ে ছাত্রদের জ্ঞান দান।
						কার্যক্রমঃ শিক্ষা সফর, কারখানা পরিদর্শন, কলেজের বিভিন্ন অনুষ্ঠানে অংশগ্রহন এবং দেয়ালিকা প্রকাশ
						অর্জন সমূহঃ কলেজে শিক্ষা ও সাংস্কৃতিক সপ্তাহ উপলক্ষে ষ্টলে পণ্য বিক্রির মাধ্যমে মুনাফা অর্জন
						পেইজ লিংকঃ https://www.facebook.com/NotreDameBusinessClub/</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],
			[
				'page' => [
					'slug' => 'humanities-club',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'Humaneties Club',
						'page_content' => '<p>Notre Dame Humane Society

						Date of Establishment: 22nd July, 2015 AD
						
						
						Slogan: Enlighten myself and enlighten others through education, unity and humanity.
						
						
						Brief History : At present morality, values and service attitude among people are gradually declining. Crime trend among students is increasing. As Bangladesh is a country prone to natural disasters, poor people face huge losses. In view of the current situation in Bangladesh, Notre Dame College should instill in students with moral values, service attitude and respect for other religions along with academic education. For this purpose, Principal Fr. Thaddeus Hembram, CSC established Notre Dame Humanities Club on the pattern of Notre Dame College, Dhaka on 22nd July, 2015.
						
						Aims and Objectives:
						To develop the humanity of the students and to practice moral and humanitarian qualities.
						To participate in the service of humanity during various natural calamities and to encourage others.
						To show and practice the latent talent of students.
						Causes and solutions to current social problems and to make others aware.
						Assisting and encouraging others to donate blood to vulnerable patients.
						To inculcate the spirit of leadership, patriotism and responsibility among various students.
						Organizing seminars on social problems.
						Annual Specific Activities: Publication of posters, distribution of winter clothes, organizing picnics.
						Ongoing activities of the club: Recruitment and admission of members, distribution of winter clothes and preparation of wall paper.
						New Potential Activities: Organizing seminars on various social issues.
						Achievements:
						 On January 8, 2022 AD, blankets and old clothes were distributed among the students of primary and secondary schools under the jurisdiction of Diglakona Parish, a border area of Jamalpur district, and among the poor families of various villages.
						 Blankets were distributed to 150 families in Namaktalasen village of Dapuniya area on 25th January, 2020.
						 In the month of September 2019, two students suffering from cancer were given a financial grant for their treatment.
						 On January 13, 2018, blankets, sweaters and old clothes were distributed among three hundred students in Tawakuchha, Balijhuri, Lauchapara, Diglakona and Maryamnagar primary schools in the border areas of Jamalpur district.
						 In the month of February 2018, the blood group of about 400 students was tested in collaboration with the Medicine Club of Mymensingh Medical College.
						 Relief materials were distributed to 300 flood affected families in Char area of Kulkandi Union of Jamalpur district on 28th July, 2017.
						 50,000 (fifty thousand) check was handed over to the District Commissioner for the welfare of displaced and abused Rohingya children in 2017.
						 On December 19, 2016, blankets were distributed to 200 families in Kathlasen village of Dapuniya area.
						
						Page link: facebook.com/groups/506796154113114</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => 'মানবিক সংঘ',
						'page_content' => '<p>নটর ডেম মানবিক সংঘ

						প্রতিষ্ঠাকাল: ২২ শে জুলাই,২০১৫ খ্রিস্টাব্দ
						
						
						স্লোগান: শিক্ষা, একতা ও মানবিকতার মাধ্যমে নিজে আলোকিত হবো এবং অপরকে আলোকিত করব।
						
						
						সংক্ষিপ্ত ইতিহাস : বর্তমানে মানুষের মধ্যে নৈতিকতা, মূল্যবোধ ও সেবার মনোভাব ক্রমান্বয়ে হ্রাস পাচ্ছে। ছাত্রদের মধ্যে অপরাধ প্রবণতা বৃদ্ধি পাচ্ছে । বাংলাদেশ প্রাকৃতিক দুর্যোগপ্রবণ দেশ হওয়ায় দরিদ্র মানুষেরা ব্যাপক ক্ষয়ক্ষতির সম্মুখীন হয়। বাংলাদেশে বর্তমান অবস্থার প্রেক্ষিতে নটর ডেম কলেজ একাডেমিক শিক্ষার পাশাপাশি ছাত্ররা যেন নৈতিক মূল্যবোধ সম্পন্ন, সেবার মনোভাব এবং অন্যান্য ধর্মের প্রতি শ্রদ্ধাশীল জাগ্রত হয়। এর লক্ষ্যে অধ্যক্ষ ফা.থাদেউস হেম্ব্রম , সিএসসি এর উদ্যোগে ২২ শে জুলাই,২০১৫ খ্রিস্টাব্দে নটর ডেম কলেজ,ঢাকার আদলে নটর ডেম মানবিক ক্লাব গঠন করেন ।
						
						লক্ষ্য ও উদ্দেশ্য :
						ছাত্রদের মানবিকতা বিকাশ এবং নৈতিক ও মানবিক গুণাবলি চর্চা করা ।
						বিভিন্ন প্রাকৃতিক দুর্যোগপূর্ণ সময়ে আর্তমানবতার সেবায় অংশগ্রহণ করা এবং অপরকে উৎসাহিত করা ।
						ছাত্রদের সুপ্ত প্রতিভা প্রদর্শন ও চর্চা করা ।
						বর্তমান সামাজিক সমস্যার কারণ ও সমাধানের পথ এবং অন্যদের সচেতন করা ।
						মূমুর্ষূ রোগীদের রক্তদানে সহযোগিতা এবং অন্যদের উৎসাহিত করা।
						বিভিন্ন ছাত্রদের নেতৃত্বের মনোভাব, দেশপ্রেম এবং দায়িত্ববোধ জাগ্রত করা ।
						সামাজিক সমস্যা সর্ম্পকে সেমিনারের আয়োজন ।
						বার্ষিক নির্দিষ্ট কার্যক্রম : দেয়ালিকা প্রকাশ, শীতবস্ত্র বিতরণ, বনভোজন আয়োজন করা।
						ক্লাবের চলমান কার্যক্রম সমূহ : সদস্য সংগ্রহ ও ভর্তি, শীতবস্ত্র বিতরণ ও দেয়ালিকা প্রকাশের প্রস্তুতি।
						নতুন সম্ভাব্য কার্যক্রম সমূহ: বিভিন্ন সামাজিক সমস্যা সর্ম্পকে সেমিনারের আয়োজন করা ।
						অর্জন সমূহ :
						 ২০২২ খ্রিস্টাব্দে ৮ জানুয়ারি জামালপুর জেলার সীমান্তবর্তী এলাকা দিগলাকোণা প্যারিসের আওতাধীন প্রাথমিক ও মাধ্যমিক বিদ্যালয়ের ছাত্রছাত্রী এবং বিভিন্ন গ্রামের দরিদ্র পরিবারদের মাঝে প্রায় একশত জনকে কম্বল ও পুরাতন পোশাক বিতরণ করা হয়।
						 ২৫ শে জানুয়ারি,২০২০ খ্রিস্টাব্দে ডাপুনিয়া এলাকার নামাকতলাসেন গ্রামে ১৫০ পরিবারকে কম্বল বিতরণ করা হয় ।
						 ২০১৯ খ্রিস্টাব্দে সেপ্টম্বর মাসে ক্যানসার অক্রান্ত দুইজন ছাত্রকে চিকিৎসার জন্য আর্থিক অনুদান প্রদান করা হয় ।
						 ১৩ ই জানুয়ারি,২০১৮ খ্রিস্টাব্দে জামালপুর জেলার সীমান্তবর্তী এলাকা তাওয়াকুছা, বালিঝুড়ি, লাউচাপড়া, দিগলাকোণা এবং মরিয়মনগর প্রাথমিক বিদ্যালয়ে তিনশত ছাত্রছাত্রীদের মাঝে কম্বল, সোয়েটার ও পুরাতন কাপড় বিতরণ করা হয় ।
						 ২০১৮ খ্রিস্টাব্দের ফেব্রæয়ারি মাসে ময়মনসিংহ মেডিকেল কলেজের মেডিসিন ক্লাবের সহযোগিতায় প্রায় ৪০০ ছাত্রের রক্তের গ্রæপ পরীক্ষা করা হয় ।
						 ২৮ শে জুলাই, ২০১৭ খ্রিস্টাব্দে জামালপুর জেলার কুলকান্দি ইউনিয়নের চর এলাকায় ৩০০ বন্যার্ত পরিবারকে ত্রাণসামগ্রী বিতরণ করা হয় ।
						 ২০১৭ খ্রিস্টাব্দে বিতারিত ও নির্যাতিত রোহিঙ্গা শিশুদের কল্যাণার্থে জেলা প্রশাসকের কাছে ৫০,০০০ (পঞ্চাশ হাজার ) টাকার চেক হস্তান্তর করা হয় ।
						 ১৯ শে ডিসেম্বর, ২০১৬ খ্রিস্টাব্দে ডাপুনিয়া এলাকার কাঠলাসেন গ্রামে ২০০ পরিবারকে কম্বল বিতরণ করা হয় ।
						
						পেইজ লিংক : facebook.com/groups/506796154113114</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],
			[
				'page' => [
					'slug' => 'english-language-research-club',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'English Language & Research Club
						',
						'page_content' => '<p>English Language & Research Club

						Slogan: Acquiring is more spontenious process than learning English.
						
						History:
						
						Our club is working for the development of communication to make our club members communicatively competent. Our activities cover the areas of helping students to achieve expected score in IELTS, inspiring Article writing, developing spoken English, providing ABC knowledge of English Literature, giving ideas on Phonetics & Phonology, sharing ideas on ELT/SLA, preparing skilled Debaters, researching on critical grammar, giving proper suggestion for university admission, enriching communicative competence, arranging excursions, encouraging to participate in social welfare related activities.
						
						 
						
						 Aim & Motiv:
						
						The main objective of ELRC is to create a recreational and consolidating opportunity for students to learn and practice English. Thus, it tries to give vent to students creative talents. It also provides encouraging atmosphere for Students to express personal views about whatever they choose.
						
						 
						
						Annual Activities:
						
						Helping students to achieve expected score in IELTS                     
						
						Inspiring Article writing
						
						Developing spoken English
						
						Providing ABC Knowledge of English Literature
						
						Giving ideas on Phonetics & Phonology
						
						Sharing ideas on ELT/SLA
						
						Preparing skilled Debaters
						
						Research on critical grammar
						
						Giving proper suggestion for university admission
						
						Enriching communicative competence
						
						Arranging excursions
						
						Encouraging to participate in social welfare related activities
						
																																				 
						
						Achievements:
						
						Arranging First “Notre Dame English carnival 2018” – is our great achievement. For the first time, in the history of Mymensingh division, we have organized such kind of English competition to abate the fear of English from the students mind and encourage them to be the leaders of tomorrow. As part of our regular visit to nature, we have visited some historical place of our country such as Cox bazar, Bandarban, Nilachaol, Nilgiri, Fantasy kingdom, Shahjalal University of Science and Technology, Shajalals Mazar etc. Those were really amazing trips where students and teachers got an opportunity to come close to each other. Participating for the first time in "3rd National English carnival 2017" at Notre Dame College Dhaka- we achieved Runners up prize among the top most colleges of Dhaka city.
						
						Facebook Page: http://www.elrcndcm.com/</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => 'ইংরেজি ভাষা ও গবেষণা ক্লাব',
						'page_content' => '<p>ইংরেজি ভাষা ও গবেষণা ক্লাব

						স্লোগান: ইংরেজি শেখার চেয়ে অর্জন করা আরও স্বতঃস্ফূর্ত প্রক্রিয়া।
						
						ইতিহাস:
						
						আমাদের ক্লাব যোগাযোগের উন্নয়নে কাজ করে যাচ্ছে আমাদের ক্লাবের সদস্যদের যোগাযোগে সক্ষম করে তুলতে। আমাদের ক্রিয়াকলাপগুলি IELTS-এ প্রত্যাশিত স্কোর অর্জনে শিক্ষার্থীদের সাহায্য করা, প্রবন্ধ লেখার অনুপ্রেরণা, কথ্য ইংরেজির বিকাশ, ইংরেজি সাহিত্যের ABC জ্ঞান প্রদান, ধ্বনিতত্ত্ব ও ধ্বনিবিদ্যা সম্পর্কে ধারণা প্রদান, ELT/SLA সম্পর্কে ধারণা ভাগ করে নেওয়া, দক্ষ বিতার্কিকদের প্রস্তুত করা, গবেষণার ক্ষেত্রগুলিকে কভার করে। সমালোচনামূলক ব্যাকরণ, বিশ্ববিদ্যালয়ে ভর্তির জন্য যথাযথ পরামর্শ দেওয়া, যোগাযোগের দক্ষতা সমৃদ্ধ করা, ভ্রমণের ব্যবস্থা করা, সামাজিক কল্যাণ সম্পর্কিত কার্যক্রমে অংশগ্রহণের জন্য উত্সাহিত করা।
						
						 
						
						  লক্ষ্য ও উদ্দেশ্য:
						
						ELRC-এর মূল উদ্দেশ্য হল শিক্ষার্থীদের ইংরেজি শেখার এবং অনুশীলন করার জন্য একটি বিনোদনমূলক এবং একীভূত করার সুযোগ তৈরি করা। এইভাবে, এটি শিক্ষার্থীদের সৃজনশীল প্রতিভাকে উন্মুক্ত করার চেষ্টা করে। এটি ছাত্রদের জন্য তারা যা বেছে নেয় সে সম্পর্কে ব্যক্তিগত মতামত প্রকাশ করার জন্য উত্সাহজনক পরিবেশ প্রদান করে।
						
						 
						
						বার্ষিক কার্যক্রম:
						
						IELTS-এ প্রত্যাশিত স্কোর অর্জনে শিক্ষার্থীদের সাহায্য করা
						
						অনুপ্রেরণামূলক প্রবন্ধ লেখা
						
						কথ্য ইংরেজি উন্নয়নশীল
						
						ইংরেজি সাহিত্যের ABC জ্ঞান প্রদান করা
						
						ধ্বনিতত্ত্ব এবং ধ্বনিবিদ্যা সম্পর্কে ধারণা দেওয়া
						
						ইএলটি/এসএলএ সম্পর্কে ধারণা শেয়ার করা
						
						দক্ষ বিতার্কিকদের প্রস্তুত করা
						
						সমালোচনামূলক ব্যাকরণ গবেষণা
						
						বিশ্ববিদ্যালয়ে ভর্তির জন্য যথাযথ পরামর্শ প্রদান
						
						যোগাযোগের দক্ষতা সমৃদ্ধ করা
						
						ভ্রমণের ব্যবস্থা করা
						
						সামাজিক কল্যাণ সম্পর্কিত কর্মকান্ডে অংশগ্রহণের জন্য উৎসাহিত করা
						
																																				 
						
						অর্জন:
						
						প্রথম "নটরডেম ইংলিশ কার্নিভাল 2018" আয়োজন করা - আমাদের বড় অর্জন। ময়মনসিংহ বিভাগের ইতিহাসে প্রথমবারের মতো শিক্ষার্থীদের মন থেকে ইংরেজি ভীতি দূর করতে এবং আগামী দিনের কর্ণধার হতে উৎসাহিত করতে এ ধরনের ইংরেজি প্রতিযোগিতার আয়োজন করেছি। প্রকৃতিতে আমাদের নিয়মিত ভ্রমণের অংশ হিসাবে, আমরা আমাদের দেশের কিছু ঐতিহাসিক স্থান যেমন কক্সবাজার, বান্দরবান, নীলাচল, নীলগিরি, ফ্যান্টাসি কিংডম, শাহজালাল বিজ্ঞান ও প্রযুক্তি বিশ্ববিদ্যালয়, শাহজালালের মাজার ইত্যাদি পরিদর্শন করেছি। সেগুলি সত্যিই আশ্চর্যজনক ভ্রমণ ছিল যেখানে শিক্ষার্থীরা। এবং শিক্ষকরা একে অপরের কাছাকাছি আসার সুযোগ পেয়েছেন। নটরডেম কলেজ ঢাকা-তে "তৃতীয় ন্যাশনাল ইংলিশ কার্নিভাল 2017" এ প্রথমবারের মতো অংশগ্রহণ করে- আমরা ঢাকা শহরের শীর্ষস্থানীয় কলেজগুলোর মধ্যে রানার্স আপ পুরস্কার অর্জন করেছি।
						
						ফেসবুক পেজ: http://www.elrcndcm.com/</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],

			[
				'page' => [
					'slug' => 'nature-literature-club',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'Notre Dame Art and Literature Club',
						'page_content' => '<p>
						Established: April 14, 2017 AD
						Slogan: I am the sky, the tree of the blue sea, I am the eternal melody
						A brief history of the club: Mans relationship with nature is very old. Nisarga has a magical bond with literature. Nature, literature and people, this three-way illusion is a big surprise! There is an acute crisis of love and humanity around the world. The young generation is sinking into a dark hole. The journey of Nature and Literature Club started on April 14, 2017 with the expectation that the new generation will build a human world freed from the infinite emptiness of isolation. Since its inception, the club has been playing a supporting role in the success of various activities of the college.
						Aims and Objectives:
						1. To awaken the heart of the students in the multifaceted taste of literature along with academic studies.
						2. Helping students unleash their inner talent.
						3. Enlightened by the light of knowledge, students will acquire the qualities to enlighten the next generation.
						4. Students will acquire leadership qualities through active participation in the co-curricular activities of the college.
						5. The achievements and reputation of the college will be boosted.
						
						
						Annual Specific Activities:
						1. Annual Study Tour (January-February)
						2. Wall release on the occasion of Great Ekushe February. (February)
						3. Special Seminar on the occasion of Great Independence Day. (March)
						4. Special Charuivati on the occasion of Boishakh (April)
						5. Organizing Special Literary Meetings (Inter-College), (June-July)
						6. Publication of the club s own literary magazine, (December)
						
						
						Achievements:
						1. First place in essay competition organized by Mymensingh City Corporation on the occasion of Mujib year and Golden Jubilee of Independence-2021.
						Facebook page: https://www.facebook.com/ndcm.edu.bd</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => ' নিসর্গ ও সাহিত্য ক্লাব',
						'page_content' => '<p>প্রতিষ্ঠাকাল: ১৪ এপ্রিল, ২০১৭ খ্রিষ্টবর্ষ
						স্লোগান: আমি আকাশ, নীল সমুদ্দুর বৃক্ষ আমি শাশ্বত সুর
						ক্লাবের সংক্ষিপ্ত ইতিহাস: নিসর্গের সঙ্গে মানুষের সম্পর্ক বহু পুরোনো। সাহিত্যের সঙ্গে নিসর্গ এক মায়াবী বন্ধনে আবদ্ধ। নিসর্গ, সাহিত্য আর মানুষ এই ত্রিমুখী মায়াজাল বড় আশ্চর্যের! পৃথিবীজুড়ে ভালোবাসা ও মানবতাবোধের তীব্র সংকট। তরুণ প্রজন্ম অন্ধকার গহবরে তলিয়ে যাচ্ছে। বিচ্ছিন্নতাবোধের অসীম শূন্যতা থেকে মুক্ত হয়ে মানবিক বিশ্ব নির্মাণ করবে নবীন প্রজন্ম এই প্রত্যাশাকে ধারণ করে নিসর্গ ও সাহিত্য ক্লাব এর যাত্রা শুরু হয় ২০১৭ খ্রিষ্টবর্ষের ১৪ এপ্রিল। প্রতিষ্ঠালগ্ন থেকেই ক্লাবটি কলেজের বিভিন্ন কার্যক্রমের সফলতার পথে সহায়ক ভূমিকা পালন করে যাচ্ছে।
						লক্ষ্য ও উদ্দেশ্য:
						১. একাডেমিক পড়াশুনার পাশাপাশি সাহিত্যের বহুবিধ রসাস্বাদনে শিক্ষার্থীদের হৃদয়কে জাগ্রত করা।
						২. শিক্ষার্থীদের অন্তর্গত প্রতিভা প্রকাশে সহায়তা করা।
						৩. জ্ঞানের আলোয় আলোকিত হয়ে শিক্ষার্থীরা আগামী জাতিকে আলোকিত করার গুণাবলি অর্জন করবে।
						৪. কলেজের সহশিক্ষা কার্যক্রমে সক্রিয় অংশগ্রহণের মাধ্যমে শিক্ষার্থী নেতৃত্বের গুণাবলি অর্জন করবে।
						৫. কলেজের অর্জন ও সুনাম তরান্বিত হবে।
						
						
						বার্ষিক নির্দিষ্ট কার্যক্রম:
						১. বার্ষিক শিক্ষাসফর ( জানুয়ারি- ফেব্রুয়ারি)
						২. মহান একুশে ফেব্রুয়ারি উপলক্ষে দেয়ালিকা প্রকাশ। (ফেব্রুয়ারি)
						৩. মহান স্বাধীনতা দিবস উপলক্ষে বিশেষ সেমিনার। (মার্চ)
						৪. বৈশাখ উপলক্ষে বিশেষ চড়ুইভাতি ( এপ্রিল)
						৫. বিশেষ সাহিত্যসভা আয়োজন ( আন্তঃকলেজ), ( জুন-জুলাই)
						৬. ক্লাবের নিজস্ব সাহিত্যপত্রিকা প্রকাশ, (ডিসেম্বর)
						
						
						অর্জন সমূহ:
						১. মুজিববর্ষ ও স্বাধীনতার সুবর্ণজয়ন্তী-২০২১ উপলক্ষে ময়মনসিংহ সিটি কর্পোরেশন কর্তৃক আয়োজিত রচনা প্রতিযোগিতায় প্রথম স্থান অর্জন।
						ফেইসবুক পেইজ: https://www.facebook.com/ndcm.edu.bd</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],
			[
				'page' => [
					'slug' => 'photography-media-club',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'Photography and Media Club',
						'page_content' => '<p>Present name: Notre Dame Photography and Media Club

						Date of Establishment: May 17, 2017 AD:
						
						Slogan: See the world in media.
						
						Brief history: We dream of a different Bangladesh. I want to build a different kind of people, who will have the habit of thinking first. Even in ancient times, when people could not meet their basic needs like food and clothing, a group of people changed their thinking due to the rotation of the moon and the sun. Create co-curricular activities. What should we do if we want to make our country different through co-educational programs? How far to go? Part of that free thinking is image capture and preservation. Many have ambitions in photography and media in view of the plan. For example, a photograph is a stronger document than a thousand pieces of evidence and an indicator of the limits of circulation.
						
						Aims and Objectives:
						
						1. Documenting and video recording of all the activities of the college students from the day of admission to the last day of the academic year, so that later they can remember their memories for a lifetime.
						2. Encouraging every student to collect photos of international standards on various important days like International Mother Language Day, Victory Day and other important days. Creating and displaying loyalty to country and nation.
						3. Creating social awareness documentaries.
						4. Creating opportunities and linkages to work in various international journals and imparting necessary training to students to produce. Even providing training on how to improve ones skills while working in photography and media.
						5. The club will have a two-room open where there will be chapter-wise video reviews of each subject periodically. So that any student can monitor it using his ID no.
						6. To preserve the videos of any cultural competitions of the college in various programs and present them as documentaries.
						7. Above all, to create a personal identity image for the students to be presented as a memory of each college student and to convey to the people a broad representation of the college s values and plans by representing the success of the freshmen s previous year.
						
						Annual Specific Activities:
						1. Training workshop on photography and media
						2. Acquiring the skills of hand drawing and making authentic images.
						3. Participate in various competitions.
						4. Creation of photo zone, T-shot, club media zone on club days.
						5. Making college annual documentary.
						6. To play a helpful role in achieving organizational skills.
						
						  Club Achievements:
						1. 17.05.2017 AD. The club was inaugurated by the then Acting Principal Fr. Thaddeus Hembrom (CSC) and was attended by Fr. Justin Sudhir Das (CSC), Mr. Theophile Hajong, Administrative Secretary Notre Dame College Mymensingh. Club moderator Nandan Sarkar along with other teachers and alumni were present.
						2. 16.07.2017 AD. Launched photography courses of the club and imparted specialized training on photography and media to the students. Mr. Mojibur Rahman Sheikh Anindya Mintu was the instructor. Overall support was sourced from club members Tauqeer, Saqib, Anik, Naeem, Musnad Azaan and Tanveer.
						3. 16 September 2017 AD. Photography and Media Club visited Fantasy Kingdom with 104 club members. Who were accompanied by Fr Placide Prashant Rosario (CSC), Student Advisor and Director and Fr Pranoy Gomez (CSC), Assistant Student Advisor and Director Notre Dame College Mymensingh. Club moderators Nandan Sarkar and Nurul Huda Monty were in charge of the overall arrangement.
						4. Last 20-25 December 2017 AD: Photography and Media Club organized a 6-day educational tour with 82 members and visited Cox s Bazar, Rangamati, Bandarban.
						
						5. On the occasion of the club day, the stalls were decorated by the club with various club materials such as photo zone, t-shirts, club media zone etc. The clubs stall was inaugurated by the principal of the college. Fr. George Kamal Rosario (CSC) and was accompanied by a large number of club members.
						6. A college documentary is produced by the club and this documentary is made relentlessly
						Club Moderators and Alumni have worked hard.
						7. 7.2.2019-10.2.2021 A.D. Photography and Media Club organized 4 days with 102 members.
						Educational tour visited Coxs Bazar, Rangamati, Bandarban.
						Clubs Facebook Page: Enter the link below (if not then take help from ICT Club)
						Page Link: facebook.com/ndpmc/</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => ' ফটোগ্রাফি এন্ড মিডিয়া ক্লাব',
						'page_content' => '<p>প্রতিষ্ঠাকাল : ১৭ মে, ২০১৭ খ্রী:

						স্লোগান: মিডিয়াতে বিশ্ব দেখি।
						
						সংক্ষিপ্ত ইতিহাস: অন্যরকম বাংলাদেশের স্বপ্ন দেখি আমরা। গড়তে চাই অন্যরকম মানুষ, যাদের থাকবে প্রথমত চিন্তা করার অভ্যাস। অতি প্রাচীন কালে মানুষ যখন অন্ন-বস্ত্রের মতো মৌলিক চাহিদা মেটাতে পারতো না তখনও কিন্তু চাঁদ সূর্যের আবর্তনে একদল মানুষ চিন্তার পরিবর্তন ঘটায়। তৈরি করে সহশিক্ষা কার্যক্রম। সেই সহশিক্ষা কার্যক্রমের মাধ্যমেই আমাদের দেশটাকে অন্যরকম করতে চাইলে কি করতে হবে? কত দূর যেতে হবে? সেই মুক্ত চিন্তার মধ্যে একটি অংশ হলো চিত্র ধারণ ও সংরক্ষণ। উক্ত পরিকল্পনার প্রেক্ষিতে অনেকের উচ্চাকাক্সক্ষা থাকে ফটোগ্রাফি ও মিডিয়ার উপর। যেমন একটি ফটোগ্রাফ হলো হাজার প্রমাণের চেয়েও শক্তিশালী দলিল ও আবর্তনের সীমা নির্দেশক।
						
						লক্ষ্য ও উদ্দেশ্য:
						
						১. কলেজের ছাত্রদের ভর্তির দিন থেকে শুরু করে শেষ দিন অবধি শিক্ষাবর্ষ অনুযায়ী সকল কার্যক্রমের ডকুমেন্টারি ও ভিডিও আকারে ধারণ করে রাখা, যেন পরবর্তীতে নিজের স্মৃতিকে সারাজীবন মনে রাখতে পারে।
						২. বিভিন্ন গুরুত্বপূর্ণ দিবস যেমন- আন্তর্জাতিক মাতৃভাষা দিবস, বিজয় দিবসসহ অন্যান্য গুরুত্বপূর্ণ দিবসে আন্তর্জাতিক মান সম্পন্ন ছবি সংগ্রহ করতে প্রত্যেক শিক্ষার্থীকে উদ্বুদ্ধ করা। দেশ ও জাতির প্রতি আনুগত্য তৈরি করা এবং সেগুলো প্রদর্শন করা।
						৩. সামাজিক সচেতনতা মূলক প্রামাণ্য চিত্র তৈরি করা।
						৪. বিভিন্ন আন্তর্জাতিক জার্নালে কাজ করার সুযোগ ও সংযোগ তৈরি করা এবং ছাত্রদের তৈরি করার জন্য প্রয়োজনীয় প্রশিক্ষণ দেওয়া। এমনকি ফটোগ্রাফি ও মিডিয়াতে কিভাবে কাজ করলে নিজের দক্ষতা বৃদ্ধি করা যায় সে বিষয়ে প্রশিক্ষণের ব্যবস্থা করা।
						৫. উক্ত ক্লাবের একটি ডবন-ংরঃব খোলা থাকবে যেখানে পর্যায়ক্রমে প্রত্যেক বিষয়ের অধ্যায় ভিত্তিক ভিডিও খবংংড়হ থাকবে। যেন যেকোন ছাত্র তার আইডি নং ব্যবহার করে সেটি পর্যবেক্ষণ করতে পারে।
						৬. বিভিন্ন প্রোগ্রামে কলেজের যেকোন সাংস্কৃতিক প্রতিযোগিতার ভিডিও সংরক্ষণ করা এবং প্রামাণ্যচিত্র হিসেবে তৈরি করে সেগুলো উপস্থাপন করা।
						৭. সর্বোপরি ছাত্রদের জন্য একটি নিজস্ব প্রামাণ্য চিত্র তৈরি করা যা প্রত্যেক কলেজ ছাত্রের স্মৃতি হিসেবে তুলে দেওয়া এবং নতুনদের পূর্বের বছরের সফলতার অংশ উপস্থাপন করে কলেজের মান ও পরিকল্পনার বিস্তর উপস্থাপনা মানুষের কাছে পৌঁছে দেওয়া।
						
						বার্ষিক নির্দিষ্ট কার্যক্রম:
						১. ফটোগ্রাফি ও মিডিয়ার উপর প্রশিক্ষণ কর্মশালা
						২. হাতে কলমে ছবি উঠানো ও প্রমাণ্য চিত্র তৈরীর দক্ষতা অর্জন।
						৩. বিভিন্ন প্রতিযোগিতায় অংশগ্রহণ করানো ।
						৪. ক্লাব দিবসে ফটোজোন,টি-শাট,ক্লাব মিডিয়া জোন তৈরী করা ।
						৫. কলেজ বার্ষিক ডকুমেন্টারি তৈরী করা ।
						৬. সাংগঠনিক দক্ষতা অর্জনে সহায়ক ভ’মিকা পালন করা ।
						
						 ক্লাবের অর্জন সমূহ:
						১. ১৭.০৫.২০১৭ খ্রী. ক্লাবের উদ্ভোধন করেছিলেন তৎকালীন ভারপ্রাপ্ত অধ্যক্ষ ফা: থাদেউস হেমব্রম (সিএসসি) এবং উপস্থিত ছিলেন ফা: জাস্টিন সুধীর দাস (সিএসসি), মি. থিউফিল হাজং, প্রশাসনিক সচিব নটর ডেম কলেজ ময়মনসিংহ। উপস্থিত ছিলেন ক্লাবের মডারেটর নন্দন সরকার সহ অন্যান্য শিক্ষক বৃন্দ এবং প্রাক্তন ছাত্র বৃন্দ।
						২. ১৬.০৭.২০১৭ খ্রী. ক্লাবের ফটোগ্রাফি কোর্স চালু করা এবং ছাত্রদের ফটোগ্রাফি ও মিডিয়ার উপর বিশেষ প্রশিক্ষণ প্রদান করা হয়। প্রশিক্ষক হিসেবে ছিলেন জনাব মজিবুর রহমান শেখ অনিন্দ্য মিন্টু। সার্বিক সহযোগিতায় ছিল ক্লাবের সদস্য তৌকির, সাকিব, অনিক, নাঈম, মুসনাদ আযান এবং তানভীর উৎস।
						৩. ১৬ সেপ্টেম্বর ২০১৭ খ্রী. ফটোগ্রাফি এন্ড মিডিয়া ক্লাব ১০৪ জন ক্লাব সদস্য নিয়ে ঘুরে আসে ফ্যান্টাসি কিংডম। যাদের সাথে ছিলেন ফা: প্লাসিড প্রশান্ত রোজারিও (সিএসসি), ছাত্র উপদেষ্টা ও পরিচালক এবং ফা: প্রনয় গোমেজ (সিএসসি), সহকারী ছাত্র উপদেষ্টা ও পরিচালক নটরডেম কলেজ ময়মনসিংহ। সার্বিক আয়োজনে ছিলেন ক্লাব মডারেটরদ্বয় নন্দন সরকার এবং নুরুল হুদা মন্টি।
						৪. গত ২০-২৫ ডিসেম্বর ২০১৭ খ্রী: ফটোগ্রাফি এন্ড মিডিয়া ক্লাব ৮২ জন সদস্য নিয়ে আয়োজন করে ৬ দিনের শিক্ষাসফর সেখানে পরিদর্শিত হয় কক্সবাজার, রাঙ্গামাটি, বান্দরবান।
						
						৫. ক্লাব দিবস উপলক্ষে ক্লাবের পক্ষ থেকে স্টল সাজানো অবস্থায় সুসজ্জিত ছিল ক্লাবের বিভিন্ন উপকরণ যেমন ফটোজোন, টি-শার্ট, ক্লাব মিডিয়া জোন ইত্যাদি। ক্লাবের স্টল উদ্ভোধন করেন কলেজের অধ্যক্ষ ড. ফা. জর্জ কমল রোজারিও (সিএসসি) এবং সাথে ছিলেন ক্লাবের সদস্য বৃন্দ।
						৬. ক্লাবের পক্ষ থেকে তৈরী করা হয় কলেজ ডকুমেন্টারী আর এ ডকুমেন্টারি তৈরিতে নিরলস ভাবে
						শ্রম দিয়েছিলেন ক্লাব মডারেটর গণ এবং প্রাক্তন ছাত্র বৃন্দ।
						৭. ৭.২.২০১৯-১০.২.২০২১খ্রী.ফটোগ্রাফি এন্ড মিডিয়া ক্লাব ১০২ জন সদস্য নিয়ে আয়োজন করে ৪ দিনের
						শিক্ষাসফর সেখানে পরিদর্শিত হয় কক্সবাজার, রাঙ্গামাটি, বান্দরবান।
						ক্লাবের ফেইসবুক পেইজ: নিচে লিংকটি লিখুন (না থাকলে অবশ্যই আইসিটি ক্লাবের সহায়তা নিন)
						পেইজের লিংক: facebook.com/ndpmc/</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],
			[
				'page' => [
					'slug' => 'math-club',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'Math Club',
						'page_content' => '<p>Math Club
						Establishment Date : 19.07.2017
						
						Slogan: Learn Math, Dream
						
						Abbreviation of clubber:
						As mathematics progressed, so did civilization. Behind all the aesthetics around us lies the correct application of mathematical reasoning. But in childhood, mathematics is presented to us as a scary subject. Its effects last a lifetime. As a result, the use of mathematics in our daily life remains unknown. Thinking of its use in every stage of our daily life and how to present mathematics as a fun subject to the students, the Principal proposed Maths Club, and Maths Club was started on 19.07.2017.
						
						Current Aims and Objectives:
						1) To make interested in mathematics.
						2) To acquire practical knowledge about the application of mathematics in daily life.
						3) Preparing students for various competitions.
						4) Eliminate fear of mathematics.
						5) Developing skills to lead organizational work.
						
						Facebook Page: Enter the link below (if not then take help from ICT Club)
						Page Link: https://www.facebook.com/103977872205027/posts/103978135538334/?substory_index=0</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => 'ম্যাথ ক্লাব
						',
						'page_content' => '<p>প্রতিষ্ঠাকাল : ১৯.০৭.২০১৭

						স্লোগান: গণিত শেখো, স্বপ্ন দেখো
						
						ক্লাবরে সংক্ষপ্তি ইতহিাস:
						গণিতের উন্নতির সাথে সাথে সভ্যতার উন্নতি হয়েছে। আমাদের চার পাশের যা কিছু নান্দনিক- এর অন্তরালে লুকিয়ে রয়েছে গাণিতিক যুক্তির সঠিক প্রয়োগ। অথচ শৈশবে আমাদের সামনে গণিতকে উপস্থাপন করা হয় ভীতিকর বিষয় হিসেবে। এর প্রভাব থেকে যায় সারা জীবন। ফলে গণিত আমাদের প্রাত্যহিক জীবনে কী কাজে লাগে তা অজানাই থেকে যায়। আমাদের দৈনন্দিন জীবনে প্রতিটি পর্যায়ে এর ব্যবহার ও গণিতকে আনন্দের বিষয় হিসেবে কিভাবে ছাত্রদের কাছে উপস্থাপন করা যায় সেই চিন্তা থেকে অধ্যক্ষ মহোদয় গণিত ক্লাবের প্রস্তাব করেন, এবং ১৯.০৭.২০১৭ তারিখ গণিত ক্লাবের শুরু হয।
						
						বর্তমান লক্ষ্য ও উদ্দেশ্য:
						১)গণিতের প্রতি আগ্রহী করে তোলা।
						২) দৈনন্দিন জীবনে গণিতের ব্যবহার সম্পর্কে বাস্তব জ্ঞান আরোহন করা।
						৩) বিভিন্ন প্রতিযোগিতার জন্য শিক্ষার্থীদের প্রস্তুত করা।
						৪) গণিত ভীতি দূর করা।
						৫) সাংগঠনিক কাজে নেতৃত্ব দেওয়ার জন্য দক্ষ করে গড়ে তোলা।
						
						ফেইসবুক পেইজ: নিচে লিংকটি লিখুন (না থাকলে অবশ্যই আইসিটি ক্লাবের সহায়তা নিন)
						পেইজের লিংক: https://www.facebook.com/103977872205027/posts/103978135538334/?substory_index=0</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],

			[
				'page' => [
					'slug' => 'nattyo-club',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'Nattyo Club',
						'page_content' => '<p>Nattyo Club</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => 'নাট্য ক্লাব',
						'page_content' => '<p>নাট্য ক্লাব</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],
			[
				'page' => [
					'slug' => 'ict-club',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'ICT Club',
						'page_content' => '<p>ICT Club</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => 'আইসিটি ক্লাব',
						'page_content' => '<p>আইসিটি ক্লাব</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],
			[
				'page' => [
					'slug' => 'environment-climate',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'Environment and climate',
						'page_content' => '<p>Environment and climate</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => 'পরিবেশ এবং জলবায়ু',
						'page_content' => '<p>পরিবেশ এবং জলবায়ু</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],
			[
				'page' => [
					'slug' => 'environment-and-climate',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'Environment and climate',
						'page_content' => '<p>Environment and climate</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => 'পরিবেশ এবং জলবায়ু',
						'page_content' => '<p>পরিবেশ এবং জলবায়ু</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],
			[
				'page' => [
					'slug' => 'environment-and-climate',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'Environment and climate',
						'page_content' => '<p>Environment and climate</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => 'পরিবেশ এবং জলবায়ু',
						'page_content' => '<p>পরিবেশ এবং জলবায়ু</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],
			[
				'page' => [
					'slug' => 'health-care',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'Health care',
						'page_content' => '<p>health-care</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => 'স্বাস্থ্যসেবা',
						'page_content' => '<p>স্বাস্থ্যসেবা</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],
			[
				'page' => [
					'slug' => 'health-care',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'Health care',
						'page_content' => '<p>health-care</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => 'স্বাস্থ্যসেবা',
						'page_content' => '<p>স্বাস্থ্যসেবা</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],
			[
				'page' => [
					'slug' => 'library',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'Library ',
						'page_content' => '<p>A library is a treasure trove of knowledge, where countless books are preserved. The library is a serene and tranquil place where studying becomes an essential task. It attracts book lovers to immerse themselves in a wealth of literature. Books here are divided into various subjects, catering to everyones interests. A library, when alive, is a valuable resource, providing opportunities for creativity and education.</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => 'গ্রন্থাগার',
						'page_content' => '<p>একটি লাইব্রেরি হলো জ্ঞানের স্তুপ, যেখানে অসংখ্য বই সংরক্ষিত রয়েছে। লাইব্রেরি একটি শান্ত ও আল্পন জায়গা, যেখানে পড়াশোনা একটি অত্যন্ত মৌলিক কাজ। এটি সমৃদ্ধির স্তরে পড়াশোনা করতে আসে বইপ্রেমিক লোকেরা। এখানে বইগুলি বিভিন্ন বিষয়ে বিভক্ত আছে এবং এটি প্রত্যেকের জন্য কিছু না কিছু আছে। লাইব্রেরি জীবন্ত হলে প্রত্যেকের জন্য উপকারী এবং তথ্য সৃজনশীলতা এবং শিক্ষার সুযোগ সরবরাহ করে।

						</p>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],
			[
				'page' => [
					'slug' => 'download-option',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'download option ',
						'page_content' => '<section class="content_section section_one">
						<div class="container">
							<div class="row">
								<div class="col-lg-8 col-md-6 order-md-1 order-2">
									<div class="video_area aos-init" data-aos="fade-right" style="background-image: url(https://ndcm.edu.bd/public/frontend/images/bg_images/01.jpg);">
										<div class="cover">
											<a href="https://www.youtube.com/watch?v=RdZZxWB5gSA" class="bla-1">
												<i class="ion-ios-play"></i>
											</a>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 order-md-2 order-1">
									<div class="content_article aos-init" data-aos="fade-left">
										<div class="text_title">
											<h2 style="color: #AE9142;">Download Option</h2>
											<ul>
												<li><a href=""><i class="fas fa-check" style="color: #AE9142;"></i> Class Routine Download</a></li>
												<li><a href=""><i class="fas fa-check" style="color: #AE9142;"></i> Syllabus Download</a></li>
												<li><a href=""><i class="fas fa-check" style="color: #AE9142;"></i> Exam Routine Download</a></li>
												<li><a href=""><i class="fas fa-check" style="color: #AE9142;"></i> Prospectus Download</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => 'download option ',
						'page_content' => '<section class="content_section section_one">
						<div class="container">
							<div class="row">
								<div class="col-lg-8 col-md-6 order-md-1 order-2">
									<div class="video_area aos-init" data-aos="fade-right" style="background-image: url(https://ndcm.edu.bd/public/frontend/images/bg_images/01.jpg);">
										<div class="cover">
											<a href="https://www.youtube.com/watch?v=RdZZxWB5gSA" class="bla-1">
												<i class="ion-ios-play"></i>
											</a>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 order-md-2 order-1">
									<div class="content_article aos-init" data-aos="fade-left">
										<div class="text_title">
											<h2 style="color: #AE9142;">ডাউনলোড অপশন</h2>
											<ul>
    <li><a href=""><i class="fas fa-check" style="color: #AE9142;"></i> ক্লাস রুটিন ডাউনলোড</a></li>
    <li><a href=""><i class="fas fa-check" style="color: #AE9142;"></i> সিলেবাস ডাউনলোড</a></li>
    <li><a href=""><i class="fas fa-check" style="color: #AE9142;"></i> পরীক্ষা রুটিন ডাউনলোড</a></li>
    <li><a href=""><i class="fas fa-check" style="color: #AE9142;"></i> প্রোসপেক্টাস ডাউনলোড</a></li>
</ul>

										</div>
									</div>
								</div>
							</div>
						</div>
					</section>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],
			[
				'page' => [
					'slug' => 'co-curriculums',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'Co Curriculums',
						'page_content' => '<section class="content_section section_two">
						<div class="container">
							<div class="row">
								<div class="col-lg-4 col-md-6">
									<div class="content_article aos-init aos-animate" data-aos="fade-right">
										<div class="text_title">
											<h2 style="color: #0C2340;">Co-Curriculums</h2>
											<ul>
												<li><a href=""><i class="fas fa-check" style="color: #0C2340;"></i> Debate
														Competition</a>
												</li>
												<li><a href=""><i class="fas fa-check" style="color: #0C2340;"></i> Abundance of
														Cultural
														Activities</a></li>
												<li><a href=""><i class="fas fa-check" style="color: #0C2340;"></i> Study Tour</a>
												</li>
												<li><a href=""><i class="fas fa-check" style="color: #0C2340;"></i> Sports &amp;
														Games</a></li>
												<li><a href=""><i class="fas fa-check" style="color: #0C2340;"></i> Club Day
														Celebration</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-lg-8 col-md-6">
									<div class="video_area aos-init aos-animate" data-aos="fade-left" style="background-image: url(https://ndcm.edu.bd/public/frontend/images/bg_images/02.jpg); ?>);">
										<div class="cover">
											<a href="https://www.youtube.com/watch?v=RdZZxWB5gSA" class="bla-1">
												<i class="ion-ios-play"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => 'সহ পাঠ্যক্রম',
						'page_content' => '<section class="content_section section_two">
						<div class="container">
							<div class="row">
								<div class="col-lg-4 col-md-6">
									<div class="content_article aos-init aos-animate" data-aos="fade-right">
										<div class="text_title">
											<h2 style="color: #0C2340;">সহ-পাঠ্যক্রম</h2>
											<ul>
    <li><a href=""><i class="fas fa-check" style="color: #0C2340;"></i> বিতর্ক প্রতিযোগিতা</a></li>
    <li><a href=""><i class="fas fa-check" style="color: #0C2340;"></i> সাংস্কৃতিক কার্যক্রমে অধিক সুযোগ</a></li>
    <li><a href=""><i class="fas fa-check" style="color: #0C2340;"></i> অধ্যয়ন পর্যটন</a></li>
    <li><a href=""><i class="fas fa-check" style="color: #0C2340;"></i> খেলা এবং খেলাধুলা</a></li>
    <li><a href=""><i class="fas fa-check" style="color: #0C2340;"></i> ক্লাব দিন উদযাপন</a></li>
</ul>

										</div>
									</div>
								</div>
								<div class="col-lg-8 col-md-6">
									<div class="video_area aos-init aos-animate" data-aos="fade-left" style="background-image: url(https://ndcm.edu.bd/public/frontend/images/bg_images/02.jpg); ?>);">
										<div class="cover">
											<a href="https://www.youtube.com/watch?v=RdZZxWB5gSA" class="bla-1">
												<i class="ion-ios-play"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],
			[
				'page' => [
					'slug' => 'student-facilities',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'Student Facilities',
						'page_content' => '<section class="content_section section_three">
						<div class="container">
							<div class="row">
								<div class="col-lg-8 col-md-6 order-md-1 order-2">
									<div class="video_area aos-init aos-animate" data-aos="fade-right" style="background-image: url(https://ndcm.edu.bd/public/frontend/images/bg_images/03.jpg);">
										<div class="cover">
											<a href="https://www.youtube.com/watch?v=RdZZxWB5gSA" class="bla-1">
												<i class="ion-ios-play"></i>
											</a>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 order-md-2 order-1">
									<div class="content_article aos-init aos-animate" data-aos="fade-left">
										<div class="text_title">
											<h2 style="color: #AE9142;">Student Facilities</h2>
											<ul>
												<li><a href=""><i class="fas fa-check" style="color: #AE9142;"></i> Book Enriched Library</a></li>
												<li><a href=""><i class="fas fa-check" style="color: #AE9142;"></i> Computer Lab</a></li>
												<li><a href=""><i class="fas fa-check" style="color: #AE9142;"></i> Wi-Fi Connectivity</a></li>
												<li><a href=""><i class="fas fa-check" style="color: #AE9142;"></i> Scholarship</a></li>
												<li><a href=""><i class="fas fa-check" style="color: #AE9142;"></i> Campus job</a></li>
												<li><a href=""><i class="fas fa-check" style="color: #AE9142;"></i> Student Guidance</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => 'ছাত্র সুবিধা',
						'page_content' => '<section class="content_section section_three">
						<div class="container">
							<div class="row">
								<div class="col-lg-8 col-md-6 order-md-1 order-2">
									<div class="video_area aos-init aos-animate" data-aos="fade-right" style="background-image: url(https://ndcm.edu.bd/public/frontend/images/bg_images/03.jpg);">
										<div class="cover">
											<a href="https://www.youtube.com/watch?v=RdZZxWB5gSA" class="bla-1">
												<i class="ion-ios-play"></i>
											</a>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 order-md-2 order-1">
									<div class="content_article aos-init aos-animate" data-aos="fade-left">
										<div class="text_title">
											<h2 style="color: #AE9142;">ছাত্র সুবিধা</h2>
											<ul>
												<li><a href=""><i class="fas fa-check" style="color: #AE9142;"></i> বই সমৃদ্ধ লাইব্রেরি</a></li>
												<li><a href=""><i class="fas fa-check" style="color: #AE9142;"></i> কম্পিউটার ল্যাব</a></li>
<li><a href=""><i class="fas fa-check" style="color: #AE9142;"></i> ওয়াই-ফাই সংযোগ</a></li>
<li><a href=""><i class="fas fa-check" style="color: #AE9142;"></i> ছাত্রবৃত্তি</a></li>
<li><a href=""><i class="fas fa-check" style="color: #AE9142;"></i> ক্যাম্পাস জব</a></li>
<li><a href=""><i class="fas fa-check" style="color: #AE9142;"></i> ছাত্র নির্দেশনা</a></li>

											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],


			[
				'page' => [
					'slug' => 'video-section',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'Video ',
						'page_content' => '<section class="video_section">
						<div class="cover_overly"></div>
						<div class="cover">
							<div class="container">
								<h2>Welcome to Notre Dame College</h2>
								<h4>Our Campus</h4>
								<a href="https://www.youtube.com/watch?v=RdZZxWB5gSA" class="bla-1">
									<i class="ion-ios-play"></i>
								</a>
							</div>
						</div>
					</section>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => 'Video',
						'page_content' => '<section class="video_section">
						<div class="cover_overly"></div>
						<div class="cover">
							<div class="container">
								<h2>Welcome to Notre Dame College</h2>
								<h4>Our Campus</h4>
								<a href="https://www.youtube.com/watch?v=RdZZxWB5gSA" class="bla-1">
									<i class="ion-ios-play"></i>
								</a>
							</div>
						</div>
					</section>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],
			[
				'page' => [
					'slug' => 'hridoye-bongobondhu',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'Hridoye Bongobondhu',
						'page_content' => '<p><style>
						.single_page .page_article img {
					margin: 0 35px 35px 0;
					margin-bottom: 30px;
					object-fit: cover;
					height: 100%;
					float: none!important;
						width: auto;
					max-width: 50%;
				}
					</style>
					</p><div class="container-fluid mt-3  bongobondhu">
						<div class=" row  bg-light ">
				
							<div class="col-md-6">
								<div class="col-12 text-center">
									<img decoding="async" loading="lazy" style="width: 300px;" src="https://site2.edumanbd.com/wp-content/uploads/2022/09/bongobondhu.png" class="img-fluid" alt="" srcset="">
								</div>
								<div class=" col-md-6 col-12 mx-auto text-center bg-round">
									<h4 class="p-2 text-white"><a href="/page/hridoye-bongobondhu" class="text-white">হৃদয়ে
											বঙ্গবন্ধু</a></h4>
								</div>
							</div>
							<div class="col-md-6">
								<div class="col-12 text-center">
									<img decoding="async" loading="lazy" style="width: 300px;" src="https://site2.edumanbd.com/wp-content/uploads/2022/09/subarna-jayanti-1.png" class="img-fluid">
								</div>
								<div class=" col-md-6 col-12 mx-auto text-center bg-round">
									<h4 class="p-2 text-white"><a href="/page/hridoye-bongobondhu" class="text-white">সুবর্ণ জয়ন্তী কর্ণার
										</a></h4>
								</div>
							</div>
				
						</div>
						<div class="mt-4">
				
						</div>
					   
						<div class="row  p-4 border">
							<div class="col-md-6 ">
								<div class="row">
									<div class="col-md-4 d-flex   justify-content-center">
										<img style="height:100px;width:100px" src="https://site2.edumanbd.com/wp-content/uploads/2022/12/image-1-1.png" class="img-fluid" alt="">
									</div>
				
									<!-- Column 2 -->
									<div class="col-md-8">
										<h3>জাতীয় শুদ্ধাচার কৌশল</h3>
										<ul>
											<li> <i class="fa fa-arrow-circle-right text-primary" aria-hidden="true"></i> <a href="https://mopa.gov.bd/site/view/mopa_integrity/NIS%20Plan/%E0%A6%B6%E0%A7%81%E0%A6%A6%E0%A7%8D%E0%A6%A7%E0%A6%BE%E0%A6%9A%E0%A6%BE%E0%A6%B0-%E0%A6%95%E0%A7%8C%E0%A6%B6%E0%A6%B2-%E0%A6%95%E0%A6%B0%E0%A7%8D%E0%A6%AE%E0%A6%AA%E0%A6%B0%E0%A6%BF%E0%A6%95%E0%A6%B2%E0%A7%8D%E0%A6%AA%E0%A6%A8%E0%A6%BE" target="_blank">কর্ম পরিকল্পনা/ আদেশ / বিজ্ঞপ্তি</a></li>
											<li><i class="fa fa-arrow-circle-right text-primary" aria-hidden="true"></i><a href="https://mopa.gov.bd/site/view/mopa_integrity/Focal%20Point/%E0%A6%AB%E0%A7%8B%E0%A6%95%E0%A6%BE%E0%A6%B2-%E0%A6%AA%E0%A7%9F%E0%A7%87%E0%A6%A8%E0%A7%8D%E0%A6%9F-%E0%A6%95%E0%A6%B0%E0%A7%8D%E0%A6%AE%E0%A6%95%E0%A6%B0%E0%A7%8D%E0%A6%A4%E0%A6%BE-%E0%A6%93%E0%A6%AC%E0%A6%BF%E0%A6%95%E0%A6%B2%E0%A7%8D%E0%A6%AA-%E0%A6%95%E0%A6%B0%E0%A7%8D%E0%A6%AE%E0%A6%95%E0%A6%B0%E0%A7%8D%E0%A6%A4%E0%A6%BE" target="_blank">ফোকাল পয়েন্ট কর্মকর্তা ও বিকল্প কর্মকর্তা</a></li>
											<li><i class="fa fa-arrow-circle-right text-primary" aria-hidden="true"></i><a href="https://mopa.gov.bd/site/view/mopa_integrity/Quarterly_Half%20Yearly%20Implementation%20Report/%E0%A6%A4%E0%A7%8D%E0%A6%B0%E0%A7%88%E0%A6%AE%E0%A6%BE%E0%A6%B8%E0%A6%BF%E0%A6%95-%E0%A6%B7%E0%A6%BE%E0%A6%A3%E0%A7%8D%E0%A6%AE%E0%A6%BE%E0%A6%B8%E0%A6%BF%E0%A6%95-%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A6%A4%E0%A6%BF%E0%A6%AC%E0%A7%87%E0%A6%A6%E0%A6%A8" target="_blank">ত্রৈমাসিক/ষাণ্মাসিক পরিবীক্ষণ/মূল্যায়ন প্রতিবেদন</a></li>
											<li><i class="fa fa-arrow-circle-right text-primary" aria-hidden="true"></i><a href="https://mopa.gov.bd/site/view/mopa_integrity/Acts_Rules_Strategies/%E0%A6%86%E0%A6%87%E0%A6%A8-%E0%A6%AC%E0%A6%BF%E0%A6%A7%E0%A6%BF-%E0%A6%A8%E0%A7%80%E0%A6%A4%E0%A6%BF%E0%A6%AE%E0%A6%BE%E0%A6%B2%E0%A6%BE-%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A6%9C%E0%A7%8D%E0%A6%9E%E0%A6%BE%E0%A6%AA%E0%A6%A8" target="_blank">আইন/বিধি/নীতিমালা/পরিপত্র/নির্দেশিকা/প্রজ্ঞাপন</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-md-6 ">
								<div class="row">
									<div class="col-md-4 d-flex   justify-content-center">
										<img style="height:100px;width:100px" src="https://site2.edumanbd.com/wp-content/uploads/2022/12/apa.png" class="img-fluid" alt="">
									</div>
				
									<!-- Column 2 -->
									<div class="col-md-8">
										<h3>বার্ষিক কর্মসম্পাদন চুক্তি</h3>
										<ul class="elementor-icon-list-items">
											<li class="elementor-icon-list-item">
												<a href="https://mopa.gov.bd/site/view/mopa_pm/APA%20Guidelines%20Circulars%20APA%20Team/%E0%A6%8F%E0%A6%AA%E0%A6%BF%E0%A6%8F-%E0%A6%A8%E0%A6%BF%E0%A6%B0%E0%A7%8D%E0%A6%A6%E0%A7%87%E0%A6%B6%E0%A6%BF%E0%A6%95%E0%A6%BE-%E0%A6%AA%E0%A6%B0%E0%A6%BF%E0%A6%AA%E0%A6%A4%E0%A7%8D%E0%A6%B0-%E0%A6%8F%E0%A6%AA%E0%A6%BF%E0%A6%8F-%E0%A6%9F%E0%A6%BF%E0%A6%AE" target="_blank">
				
													<span class="elementor-icon-list-icon">
														<i aria-hidden="true" class=" fa fa-arrow-circle-right text-primary"></i> </span>
													<span class="elementor-icon-list-text">এপিএ নির্দেশিকা/পরিপত্র/এপিএ টিম</span>
												</a>
											</li>
											<li class="elementor-icon-list-item">
												<a href="https://mopa.gov.bd/site/view/mopa_pm/Agreements/%E0%A6%9A%E0%A7%81%E0%A6%95%E0%A7%8D%E0%A6%A4%E0%A6%BF%E0%A6%B8%E0%A6%AE%E0%A7%82%E0%A6%B9" target="_blank">
				
													<span class="elementor-icon-list-icon">
														<i aria-hidden="true" class="fa fa-arrow-circle-right text-primary"></i> </span>
													<span class="elementor-icon-list-text">চুক্তিসমূহ</span>
												</a>
											</li>
											<li class="elementor-icon-list-item">
												<a href="https://mopa.gov.bd/site/view/mopa_pm/Monitoring%20and%20Evaluation%20Report/%E0%A6%AA%E0%A6%B0%E0%A6%BF%E0%A6%AC%E0%A7%80%E0%A6%95%E0%A7%8D%E0%A6%B7%E0%A6%A3-%E0%A6%93-%E0%A6%AE%E0%A7%82%E0%A6%B2%E0%A7%8D%E0%A6%AF%E0%A6%BE%E0%A7%9F%E0%A6%A8-%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A6%A4%E0%A6%BF%E0%A6%AC%E0%A7%87%E0%A6%A6%E0%A6%A8" target="_blank">
				
													<span class="elementor-icon-list-icon">
														<i aria-hidden="true" class="fa fa-arrow-circle-right text-primary"></i> </span>
													<span class="elementor-icon-list-text">পরিবীক্ষণ ও মূল্যায়ন প্রতিবেদন</span>
												</a>
											</li>
											<li class="elementor-icon-list-item">
												<a href="https://apams.cabinet.gov.bd/" target="_blank">
				
													<span class="elementor-icon-list-icon">
														<i aria-hidden="true" class="fa fa-arrow-circle-right text-primary"></i> </span>
													<span class="elementor-icon-list-text">এপিএএমএস সফটওয়্যার লিংক</span>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
				
							<div class="col-md-6 ">
								<div class="row">
									<div class="col-md-4 d-flex   justify-content-center">
										<img style="height:100px;width:100px" src="https://site2.edumanbd.com/wp-content/uploads/2022/12/image-4.png" class="img-fluid" alt="">
									</div>
				
									<!-- Column 2 -->
									<div class="col-md-8">
										<h3>অভিযোগ প্রতিকার ব্যবস্থাপনা</h3>
										<ul class="elementor-icon-list-items">
											<li class="elementor-icon-list-item">
												<a href="https://mopa.gov.bd/site/view/mopa_grs/Onik%20and%20Appeal%20Officer/%E0%A6%85%E0%A6%A8%E0%A6%BF%E0%A6%95-%E0%A6%93-%E0%A6%86%E0%A6%AA%E0%A6%BF%E0%A6%B2-%E0%A6%95%E0%A6%B0%E0%A7%8D%E0%A6%AE%E0%A6%95%E0%A6%B0%E0%A7%8D%E0%A6%A4%E0%A6%BE" target="_blank">
				
													<span class="elementor-icon-list-icon">
														<i aria-hidden="true" class="fa fa-arrow-circle-right text-primary"></i> </span>
													<span class="elementor-icon-list-text">অনিক ও আপিল কর্মকর্তা</span>
												</a>
											</li>
											<li class="elementor-icon-list-item">
												<a href="https://mopa.gov.bd/site/view/mopa_grs/Monthly_Quarterly_Yearly%20Report/%E0%A6%AE%E0%A6%BE%E0%A6%B8%E0%A6%BF%E0%A6%95-%E0%A6%A4%E0%A7%8D%E0%A6%B0%E0%A7%88%E0%A6%AE%E0%A6%BE%E0%A6%B8%E0%A6%BF%E0%A6%95-%E0%A6%AC%E0%A6%BE%E0%A6%B0%E0%A7%8D%E0%A6%B7%E0%A6%BF%E0%A6%95-%E0%A6%AA%E0%A6%B0%E0%A6%BF%E0%A6%AC%E0%A7%80%E0%A6%95%E0%A7%8D%E0%A6%B7%E0%A6%A3-%E0%A6%AE%E0%A7%82%E0%A6%B2%E0%A7%8D%E0%A6%AF%E0%A6%BE%E0%A7%9F%E0%A6%A8-%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A6%A4%E0%A6%BF%E0%A6%AC%E0%A7%87%E0%A6%A6%E0%A6%A8" target="_blank">
				
													<span class="elementor-icon-list-icon">
														<i aria-hidden="true" class="fa fa-arrow-circle-right text-primary"></i> </span>
													<span class="elementor-icon-list-text">মাসিক/ত্রৈমাসিক/বার্ষিক/পরিবীক্ষণ/মূল্যায়ন
														প্রতিবেদন</span>
												</a>
											</li>
											<li class="elementor-icon-list-item">
												<a href="http://www.grs.gov.bd/" target="_blank">
				
													<span class="elementor-icon-list-icon">
														<i aria-hidden="true" class="fa fa-arrow-circle-right text-primary"></i> </span>
													<span class="elementor-icon-list-text">অভিযোগ দাখিল (অনলাইন আবেদন)</span>
												</a>
											</li>
											<li class="elementor-icon-list-item">
												<a href="https://mopa.gov.bd/site/view/mopa_grs/Acts_Rules_Strategies/%E0%A6%86%E0%A6%87%E0%A6%A8-%E0%A6%AC%E0%A6%BF%E0%A6%A7%E0%A6%BF-%E0%A6%A8%E0%A7%80%E0%A6%A4%E0%A6%BF%E0%A6%AE%E0%A6%BE%E0%A6%B2%E0%A6%BE-%E0%A6%AA%E0%A6%B0%E0%A6%BF%E0%A6%AA%E0%A6%A4%E0%A7%8D%E0%A6%B0-%E0%A6%A8%E0%A6%BF%E0%A6%B0%E0%A7%8D%E0%A6%A6%E0%A7%87%E0%A6%B6%E0%A6%BF%E0%A6%95%E0%A6%BE-%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A6%9C%E0%A7%8D%E0%A6%9E%E0%A6%BE%E0%A6%AA%E0%A6%A8" target="_blank">
				
													<span class="elementor-icon-list-icon">
														<i aria-hidden="true" class="fa fa-arrow-circle-right text-primary"></i> </span>
													<span class="elementor-icon-list-text">আইন/বিধি/নীতিমালা/পরিপত্র/নির্দেশিকা/প্রজ্ঞাপন</span>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-md-6 ">
								<div class="row">
									<div class="col-md-4 d-flex   justify-content-center">
										<img style="height:100px;width:100px" src="https://site2.edumanbd.com/wp-content/uploads/2022/12/image-5.png" class="img-fluid" alt="">
									</div>
				
									<!-- Column 2 -->
									<div class="col-md-8">
										<h3>তথ্য অধিকার</h3>
										<ul class="elementor-icon-list-items">
											<li class="elementor-icon-list-item">
															<a href="https://mopa.gov.bd/site/view/mopa_rti/RTI%20Designated%20officer/%E0%A6%A6%E0%A6%BE%E0%A7%9F%E0%A6%BF%E0%A6%A4%E0%A7%8D%E0%A6%AC%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A6%BE%E0%A6%AA%E0%A7%8D%E0%A6%A4-%E0%A6%95%E0%A6%B0%E0%A7%8D%E0%A6%AE%E0%A6%95%E0%A6%B0%E0%A7%8D%E0%A6%A4%E0%A6%BE-%E0%A6%93-%E0%A6%86%E0%A6%AA%E0%A6%BF%E0%A6%B2-%E0%A6%95%E0%A6%B0%E0%A7%8D%E0%A6%A4%E0%A7%83%E0%A6%AA%E0%A6%95%E0%A7%8D%E0%A6%B7" target="_blank">
				
																<span class="elementor-icon-list-icon">
											<i aria-hidden="true" class="fa fa-arrow-circle-right text-primary"></i>						</span>
														<span class="elementor-icon-list-text">দায়িত্বপ্রাপ্ত কর্মকর্তা ও আপিল কর্তৃপক্ষ</span>
															</a>
													</li>
												<li class="elementor-icon-list-item">
															<a href="https://mopa.gov.bd/site/view/mopa_rti/Application%20and%20Appeal%20Forms/%E0%A6%86%E0%A6%AC%E0%A7%87%E0%A6%A6%E0%A6%A8-%E0%A6%93-%E0%A6%86%E0%A6%AA%E0%A6%BF%E0%A6%B2-%E0%A6%AB%E0%A6%B0%E0%A6%AE" target="_blank">
				
																<span class="elementor-icon-list-icon">
											<i aria-hidden="true" class="fa fa-arrow-circle-right text-primary"></i>						</span>
														<span class="elementor-icon-list-text">আবেদন ও আপিল ফরম</span>
															</a>
													</li>
												<li class="elementor-icon-list-item">
															<a href="https://mopa.gov.bd/site/page/d169c213-51fc-4040-a5de-2f26a151a706" target="_blank">
				
																<span class="elementor-icon-list-icon">
											<i aria-hidden="true" class="fa fa-arrow-circle-right text-primary"></i>						</span>
														<span class="elementor-icon-list-text">স্বপ্রণোদিতভাবে প্রকাশযোগ্য তথ্যসমূহ</span>
															</a>
													</li>
												<li class="elementor-icon-list-item">
															<a href="https://mopa.gov.bd/site/view/mopa_rti/Acts-Rules-Strategies/%E0%A6%86%E0%A6%87%E0%A6%A8-%E0%A6%AC%E0%A6%BF%E0%A6%A7%E0%A6%BF-%E0%A6%A8%E0%A7%80%E0%A6%A4%E0%A6%BF%E0%A6%AE%E0%A6%BE%E0%A6%B2%E0%A6%BE-%E0%A6%AA%E0%A6%B0%E0%A6%BF%E0%A6%AA%E0%A6%A4%E0%A7%8D%E0%A6%B0-%E0%A6%A8%E0%A6%BF%E0%A6%B0%E0%A7%8D%E0%A6%A6%E0%A7%87%E0%A6%B6%E0%A6%BF%E0%A6%95%E0%A6%BE-%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A6%9C%E0%A7%8D%E0%A6%9E%E0%A6%BE%E0%A6%AA%E0%A6%A8" target="_blank">
				
																<span class="elementor-icon-list-icon">
											<i aria-hidden="true" class="fa fa-arrow-circle-right text-primary"></i>						</span>
														<span class="elementor-icon-list-text">আইন/বিধি/নীতিমালা/পরিপত্র/নির্দেশিকা/প্রজ্ঞাপন</span>
															</a>
													</li>
										</ul>
									</div>
								</div>
							</div>
				
				
						</div></div>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => 'হৃদয়ে বঙ্গবন্ধু',
						'page_content' => '<p><style>
						.single_page .page_article img {
					margin: 0 35px 35px 0;
					margin-bottom: 30px;
					object-fit: cover;
					height: 100%;
					float: none!important;
						width: auto;
					max-width: 50%;
				}
					</style>
					</p><div class="container-fluid mt-3  bongobondhu">
						<div class=" row  bg-light ">
				
							<div class="col-md-6">
								<div class="col-12 text-center">
									<img decoding="async" loading="lazy" style="width: 300px;" src="https://site2.edumanbd.com/wp-content/uploads/2022/09/bongobondhu.png" class="img-fluid" alt="" srcset="">
								</div>
								<div class=" col-md-6 col-12 mx-auto text-center bg-round">
									<h4 class="p-2 text-white"><a href="#" class="text-white">হৃদয়ে
											বঙ্গবন্ধু</a></h4>
								</div>
							</div>
							<div class="col-md-6">
								<div class="col-12 text-center">
									<img decoding="async" loading="lazy" style="width: 300px;" src="https://site2.edumanbd.com/wp-content/uploads/2022/09/subarna-jayanti-1.png" class="img-fluid">
								</div>
								<div class=" col-md-6 col-12 mx-auto text-center bg-round">
									<h4 class="p-2 text-white"><a href="#" class="text-white">সুবর্ণ জয়ন্তী কর্ণার
										</a></h4>
								</div>
							</div>
				
						</div>
						<div class="mt-4">
				
						</div>
					   
						<div class="row  p-4 border">
							<div class="col-md-6 ">
								<div class="row">
									<div class="col-md-4 d-flex   justify-content-center">
										<img style="height:100px;width:100px" src="https://site2.edumanbd.com/wp-content/uploads/2022/12/image-1-1.png" class="img-fluid" alt="">
									</div>
				
									<!-- Column 2 -->
									<div class="col-md-8">
										<h3>জাতীয় শুদ্ধাচার কৌশল</h3>
										<ul>
											<li> <i class="fa fa-arrow-circle-right text-primary" aria-hidden="true"></i> <a href="https://mopa.gov.bd/site/view/mopa_integrity/NIS%20Plan/%E0%A6%B6%E0%A7%81%E0%A6%A6%E0%A7%8D%E0%A6%A7%E0%A6%BE%E0%A6%9A%E0%A6%BE%E0%A6%B0-%E0%A6%95%E0%A7%8C%E0%A6%B6%E0%A6%B2-%E0%A6%95%E0%A6%B0%E0%A7%8D%E0%A6%AE%E0%A6%AA%E0%A6%B0%E0%A6%BF%E0%A6%95%E0%A6%B2%E0%A7%8D%E0%A6%AA%E0%A6%A8%E0%A6%BE" target="_blank">কর্ম পরিকল্পনা/ আদেশ / বিজ্ঞপ্তি</a></li>
											<li><i class="fa fa-arrow-circle-right text-primary" aria-hidden="true"></i><a href="https://mopa.gov.bd/site/view/mopa_integrity/Focal%20Point/%E0%A6%AB%E0%A7%8B%E0%A6%95%E0%A6%BE%E0%A6%B2-%E0%A6%AA%E0%A7%9F%E0%A7%87%E0%A6%A8%E0%A7%8D%E0%A6%9F-%E0%A6%95%E0%A6%B0%E0%A7%8D%E0%A6%AE%E0%A6%95%E0%A6%B0%E0%A7%8D%E0%A6%A4%E0%A6%BE-%E0%A6%93%E0%A6%AC%E0%A6%BF%E0%A6%95%E0%A6%B2%E0%A7%8D%E0%A6%AA-%E0%A6%95%E0%A6%B0%E0%A7%8D%E0%A6%AE%E0%A6%95%E0%A6%B0%E0%A7%8D%E0%A6%A4%E0%A6%BE" target="_blank">ফোকাল পয়েন্ট কর্মকর্তা ও বিকল্প কর্মকর্তা</a></li>
											<li><i class="fa fa-arrow-circle-right text-primary" aria-hidden="true"></i><a href="https://mopa.gov.bd/site/view/mopa_integrity/Quarterly_Half%20Yearly%20Implementation%20Report/%E0%A6%A4%E0%A7%8D%E0%A6%B0%E0%A7%88%E0%A6%AE%E0%A6%BE%E0%A6%B8%E0%A6%BF%E0%A6%95-%E0%A6%B7%E0%A6%BE%E0%A6%A3%E0%A7%8D%E0%A6%AE%E0%A6%BE%E0%A6%B8%E0%A6%BF%E0%A6%95-%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A6%A4%E0%A6%BF%E0%A6%AC%E0%A7%87%E0%A6%A6%E0%A6%A8" target="_blank">ত্রৈমাসিক/ষাণ্মাসিক পরিবীক্ষণ/মূল্যায়ন প্রতিবেদন</a></li>
											<li><i class="fa fa-arrow-circle-right text-primary" aria-hidden="true"></i><a href="https://mopa.gov.bd/site/view/mopa_integrity/Acts_Rules_Strategies/%E0%A6%86%E0%A6%87%E0%A6%A8-%E0%A6%AC%E0%A6%BF%E0%A6%A7%E0%A6%BF-%E0%A6%A8%E0%A7%80%E0%A6%A4%E0%A6%BF%E0%A6%AE%E0%A6%BE%E0%A6%B2%E0%A6%BE-%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A6%9C%E0%A7%8D%E0%A6%9E%E0%A6%BE%E0%A6%AA%E0%A6%A8" target="_blank">আইন/বিধি/নীতিমালা/পরিপত্র/নির্দেশিকা/প্রজ্ঞাপন</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-md-6 ">
								<div class="row">
									<div class="col-md-4 d-flex   justify-content-center">
										<img style="height:100px;width:100px" src="https://site2.edumanbd.com/wp-content/uploads/2022/12/apa.png" class="img-fluid" alt="">
									</div>
				
									<!-- Column 2 -->
									<div class="col-md-8">
										<h3>বার্ষিক কর্মসম্পাদন চুক্তি</h3>
										<ul class="elementor-icon-list-items">
											<li class="elementor-icon-list-item">
												<a href="https://mopa.gov.bd/site/view/mopa_pm/APA%20Guidelines%20Circulars%20APA%20Team/%E0%A6%8F%E0%A6%AA%E0%A6%BF%E0%A6%8F-%E0%A6%A8%E0%A6%BF%E0%A6%B0%E0%A7%8D%E0%A6%A6%E0%A7%87%E0%A6%B6%E0%A6%BF%E0%A6%95%E0%A6%BE-%E0%A6%AA%E0%A6%B0%E0%A6%BF%E0%A6%AA%E0%A6%A4%E0%A7%8D%E0%A6%B0-%E0%A6%8F%E0%A6%AA%E0%A6%BF%E0%A6%8F-%E0%A6%9F%E0%A6%BF%E0%A6%AE" target="_blank">
				
													<span class="elementor-icon-list-icon">
														<i aria-hidden="true" class=" fa fa-arrow-circle-right text-primary"></i> </span>
													<span class="elementor-icon-list-text">এপিএ নির্দেশিকা/পরিপত্র/এপিএ টিম</span>
												</a>
											</li>
											<li class="elementor-icon-list-item">
												<a href="https://mopa.gov.bd/site/view/mopa_pm/Agreements/%E0%A6%9A%E0%A7%81%E0%A6%95%E0%A7%8D%E0%A6%A4%E0%A6%BF%E0%A6%B8%E0%A6%AE%E0%A7%82%E0%A6%B9" target="_blank">
				
													<span class="elementor-icon-list-icon">
														<i aria-hidden="true" class="fa fa-arrow-circle-right text-primary"></i> </span>
													<span class="elementor-icon-list-text">চুক্তিসমূহ</span>
												</a>
											</li>
											<li class="elementor-icon-list-item">
												<a href="https://mopa.gov.bd/site/view/mopa_pm/Monitoring%20and%20Evaluation%20Report/%E0%A6%AA%E0%A6%B0%E0%A6%BF%E0%A6%AC%E0%A7%80%E0%A6%95%E0%A7%8D%E0%A6%B7%E0%A6%A3-%E0%A6%93-%E0%A6%AE%E0%A7%82%E0%A6%B2%E0%A7%8D%E0%A6%AF%E0%A6%BE%E0%A7%9F%E0%A6%A8-%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A6%A4%E0%A6%BF%E0%A6%AC%E0%A7%87%E0%A6%A6%E0%A6%A8" target="_blank">
				
													<span class="elementor-icon-list-icon">
														<i aria-hidden="true" class="fa fa-arrow-circle-right text-primary"></i> </span>
													<span class="elementor-icon-list-text">পরিবীক্ষণ ও মূল্যায়ন প্রতিবেদন</span>
												</a>
											</li>
											<li class="elementor-icon-list-item">
												<a href="https://apams.cabinet.gov.bd/" target="_blank">
				
													<span class="elementor-icon-list-icon">
														<i aria-hidden="true" class="fa fa-arrow-circle-right text-primary"></i> </span>
													<span class="elementor-icon-list-text">এপিএএমএস সফটওয়্যার লিংক</span>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
				
							<div class="col-md-6 ">
								<div class="row">
									<div class="col-md-4 d-flex   justify-content-center">
										<img style="height:100px;width:100px" src="https://site2.edumanbd.com/wp-content/uploads/2022/12/image-4.png" class="img-fluid" alt="">
									</div>
				
									<!-- Column 2 -->
									<div class="col-md-8">
										<h3>অভিযোগ প্রতিকার ব্যবস্থাপনা</h3>
										<ul class="elementor-icon-list-items">
											<li class="elementor-icon-list-item">
												<a href="https://mopa.gov.bd/site/view/mopa_grs/Onik%20and%20Appeal%20Officer/%E0%A6%85%E0%A6%A8%E0%A6%BF%E0%A6%95-%E0%A6%93-%E0%A6%86%E0%A6%AA%E0%A6%BF%E0%A6%B2-%E0%A6%95%E0%A6%B0%E0%A7%8D%E0%A6%AE%E0%A6%95%E0%A6%B0%E0%A7%8D%E0%A6%A4%E0%A6%BE" target="_blank">
				
													<span class="elementor-icon-list-icon">
														<i aria-hidden="true" class="fa fa-arrow-circle-right text-primary"></i> </span>
													<span class="elementor-icon-list-text">অনিক ও আপিল কর্মকর্তা</span>
												</a>
											</li>
											<li class="elementor-icon-list-item">
												<a href="https://mopa.gov.bd/site/view/mopa_grs/Monthly_Quarterly_Yearly%20Report/%E0%A6%AE%E0%A6%BE%E0%A6%B8%E0%A6%BF%E0%A6%95-%E0%A6%A4%E0%A7%8D%E0%A6%B0%E0%A7%88%E0%A6%AE%E0%A6%BE%E0%A6%B8%E0%A6%BF%E0%A6%95-%E0%A6%AC%E0%A6%BE%E0%A6%B0%E0%A7%8D%E0%A6%B7%E0%A6%BF%E0%A6%95-%E0%A6%AA%E0%A6%B0%E0%A6%BF%E0%A6%AC%E0%A7%80%E0%A6%95%E0%A7%8D%E0%A6%B7%E0%A6%A3-%E0%A6%AE%E0%A7%82%E0%A6%B2%E0%A7%8D%E0%A6%AF%E0%A6%BE%E0%A7%9F%E0%A6%A8-%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A6%A4%E0%A6%BF%E0%A6%AC%E0%A7%87%E0%A6%A6%E0%A6%A8" target="_blank">
				
													<span class="elementor-icon-list-icon">
														<i aria-hidden="true" class="fa fa-arrow-circle-right text-primary"></i> </span>
													<span class="elementor-icon-list-text">মাসিক/ত্রৈমাসিক/বার্ষিক/পরিবীক্ষণ/মূল্যায়ন
														প্রতিবেদন</span>
												</a>
											</li>
											<li class="elementor-icon-list-item">
												<a href="http://www.grs.gov.bd/" target="_blank">
				
													<span class="elementor-icon-list-icon">
														<i aria-hidden="true" class="fa fa-arrow-circle-right text-primary"></i> </span>
													<span class="elementor-icon-list-text">অভিযোগ দাখিল (অনলাইন আবেদন)</span>
												</a>
											</li>
											<li class="elementor-icon-list-item">
												<a href="https://mopa.gov.bd/site/view/mopa_grs/Acts_Rules_Strategies/%E0%A6%86%E0%A6%87%E0%A6%A8-%E0%A6%AC%E0%A6%BF%E0%A6%A7%E0%A6%BF-%E0%A6%A8%E0%A7%80%E0%A6%A4%E0%A6%BF%E0%A6%AE%E0%A6%BE%E0%A6%B2%E0%A6%BE-%E0%A6%AA%E0%A6%B0%E0%A6%BF%E0%A6%AA%E0%A6%A4%E0%A7%8D%E0%A6%B0-%E0%A6%A8%E0%A6%BF%E0%A6%B0%E0%A7%8D%E0%A6%A6%E0%A7%87%E0%A6%B6%E0%A6%BF%E0%A6%95%E0%A6%BE-%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A6%9C%E0%A7%8D%E0%A6%9E%E0%A6%BE%E0%A6%AA%E0%A6%A8" target="_blank">
				
													<span class="elementor-icon-list-icon">
														<i aria-hidden="true" class="fa fa-arrow-circle-right text-primary"></i> </span>
													<span class="elementor-icon-list-text">আইন/বিধি/নীতিমালা/পরিপত্র/নির্দেশিকা/প্রজ্ঞাপন</span>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-md-6 ">
								<div class="row">
									<div class="col-md-4 d-flex   justify-content-center">
										<img style="height:100px;width:100px" src="https://site2.edumanbd.com/wp-content/uploads/2022/12/image-5.png" class="img-fluid" alt="">
									</div>
				
									<!-- Column 2 -->
									<div class="col-md-8">
										<h3>তথ্য অধিকার</h3>
										<ul class="elementor-icon-list-items">
											<li class="elementor-icon-list-item">
															<a href="https://mopa.gov.bd/site/view/mopa_rti/RTI%20Designated%20officer/%E0%A6%A6%E0%A6%BE%E0%A7%9F%E0%A6%BF%E0%A6%A4%E0%A7%8D%E0%A6%AC%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A6%BE%E0%A6%AA%E0%A7%8D%E0%A6%A4-%E0%A6%95%E0%A6%B0%E0%A7%8D%E0%A6%AE%E0%A6%95%E0%A6%B0%E0%A7%8D%E0%A6%A4%E0%A6%BE-%E0%A6%93-%E0%A6%86%E0%A6%AA%E0%A6%BF%E0%A6%B2-%E0%A6%95%E0%A6%B0%E0%A7%8D%E0%A6%A4%E0%A7%83%E0%A6%AA%E0%A6%95%E0%A7%8D%E0%A6%B7" target="_blank">
				
																<span class="elementor-icon-list-icon">
											<i aria-hidden="true" class="fa fa-arrow-circle-right text-primary"></i>						</span>
														<span class="elementor-icon-list-text">দায়িত্বপ্রাপ্ত কর্মকর্তা ও আপিল কর্তৃপক্ষ</span>
															</a>
													</li>
												<li class="elementor-icon-list-item">
															<a href="https://mopa.gov.bd/site/view/mopa_rti/Application%20and%20Appeal%20Forms/%E0%A6%86%E0%A6%AC%E0%A7%87%E0%A6%A6%E0%A6%A8-%E0%A6%93-%E0%A6%86%E0%A6%AA%E0%A6%BF%E0%A6%B2-%E0%A6%AB%E0%A6%B0%E0%A6%AE" target="_blank">
				
																<span class="elementor-icon-list-icon">
											<i aria-hidden="true" class="fa fa-arrow-circle-right text-primary"></i>						</span>
														<span class="elementor-icon-list-text">আবেদন ও আপিল ফরম</span>
															</a>
													</li>
												<li class="elementor-icon-list-item">
															<a href="https://mopa.gov.bd/site/page/d169c213-51fc-4040-a5de-2f26a151a706" target="_blank">
				
																<span class="elementor-icon-list-icon">
											<i aria-hidden="true" class="fa fa-arrow-circle-right text-primary"></i>						</span>
														<span class="elementor-icon-list-text">স্বপ্রণোদিতভাবে প্রকাশযোগ্য তথ্যসমূহ</span>
															</a>
													</li>
												<li class="elementor-icon-list-item">
															<a href="https://mopa.gov.bd/site/view/mopa_rti/Acts-Rules-Strategies/%E0%A6%86%E0%A6%87%E0%A6%A8-%E0%A6%AC%E0%A6%BF%E0%A6%A7%E0%A6%BF-%E0%A6%A8%E0%A7%80%E0%A6%A4%E0%A6%BF%E0%A6%AE%E0%A6%BE%E0%A6%B2%E0%A6%BE-%E0%A6%AA%E0%A6%B0%E0%A6%BF%E0%A6%AA%E0%A6%A4%E0%A7%8D%E0%A6%B0-%E0%A6%A8%E0%A6%BF%E0%A6%B0%E0%A7%8D%E0%A6%A6%E0%A7%87%E0%A6%B6%E0%A6%BF%E0%A6%95%E0%A6%BE-%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A6%9C%E0%A7%8D%E0%A6%9E%E0%A6%BE%E0%A6%AA%E0%A6%A8" target="_blank">
				
																<span class="elementor-icon-list-icon">
											<i aria-hidden="true" class="fa fa-arrow-circle-right text-primary"></i>						</span>
														<span class="elementor-icon-list-text">আইন/বিধি/নীতিমালা/পরিপত্র/নির্দেশিকা/প্রজ্ঞাপন</span>
															</a>
													</li>
										</ul>
									</div>
								</div>
							</div>
				
				
						</div></div>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				]
			],

			[
				'page' => [
					'slug' => 'quiz-page',
					'page_status' => 'publish',
					'page_template' => 'default',
					'featured_image' => null,
					'author_id' => 1,
					'created_at' => now(),
					'updated_at' => now(),
				],
				'page_contents' => [
					[
						'page_title' => 'Sheikh Russell Quiz Competition',
						'page_content' => '<div class="">
										<a target="_blank" href="https://quiz.sheikhrussel.gov.bd/">
											<img src="https://site2.edumanbd.com/wp-content/uploads/2022/12/admin-ajax.jpeg" alt="#"
												style="height: 270px;">
										</a>
									</div>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'en',
						'created_at' => now(),
						'updated_at' => now(),
					],
					[
						'page_title' => 'শেখ রাসেল কুইজ প্রতিযোগিতা',
						'page_content' => '<div class="">
										<a target="_blank" href="https://quiz.sheikhrussel.gov.bd/">
											<img src="https://site2.edumanbd.com/wp-content/uploads/2022/12/admin-ajax.jpeg" alt="#"
												style="height: 270px;">
										</a>
									</div>',
						'meta_data' => null,
						'seo_meta_keywords' => null,
						'seo_meta_description' => null,
						'language' => 'bn',
						'created_at' => now(),
						'updated_at' => now(),
					],
				],

			],

		];

		foreach ($pages as $page) {
			$page_id = DB::table('pages')->insertGetId($page['page']);

			foreach ($page['page_contents'] as $page_content) {
				$page_content['page_id'] = $page_id;
				DB::table('page_contents')->insert($page_content);
			}
		}

		// Add page settings.
		$this->addPageSettingsSeeder();
	}

	private function addPageSettingsSeeder()
	{
		set_option(
			'home_page_settings',
			json_encode(
				[
					'sections' => [
						[
							'enabled' => 1,
							'order' => 1,
							"slug" => null,
							"view" => "theme.default.page-partials.slider",
							"background" => "#FFFFFF",
							"label" => "Slider",
							"key" => "slider",
						],
						[
							'enabled' => 1,
							'order' => 2,
							"slug" => 'principal-speech',
							"view" => 'theme.default.page-partials.principal-speech',
							"background" => "#FFFFFF",
							"label" => "Principal's Message",
							"key" => "principal_message",
						],
						[
							'enabled' => 1,
							'order' => 3,
							"slug" => null,
							"view" => "theme.default.page-partials.notice",
							"background" => "#F2F2F2",
							"label" => "Notices",
							"key" => "notice",
						],
						[
							'enabled' => 1,
							'order' => 4,
							"slug" => 'download-option',
							"view" => "theme.default.page-partials.download-option",
							"background" => "#0C2340",
							"label" => "Download Options",
							"key" => "download_options",
						],
						[
							'enabled' => 1,
							'order' => 5,
							"slug" => "co-curriculums",
							"view" => "theme.default.page-partials.co-curriculumn",
							"background" => "#AE9143",
							"label" => "Co curriculumns",
							"key" => "co_cirriculumns",
						],
						[
							'enabled' => 1,
							'order' => 6,
							"slug" => "student-facilities",
							"view" => "theme.default.page-partials.student-facilities",
							"background" => "#8C2332",
							"label" => "Student facilities",
							"key" => "student_facilities",
						],
						[
							'enabled' => 1,
							'order' => 7,
							"slug" => null,
							"view" => "theme.default.page-partials.events",
							"background" => "#F2F2F2",
							"label" => "News & Events",
							"key" => "events",
						],
						[
							'enabled' => 1,
							'order' => 8,
							"slug" => "video-section",
							"view" => "theme.default.page-partials.video-section",
							"background" => "#FFFFFF",
							"label" => "Video section",
							"key" => "video_section",
						],
						[
							'enabled' => 1,
							'order' => 9,
							"slug" => "hridoye-bongobondhu",
							"view" => "theme.default.page-partials.bongobondhu-section",
							"background" => "#F2F2F2",
							"label" => "Hridoye Bongobondhu",
							"key" => "bongobondhu_section",
						],
						[
							'enabled' => 1,
							'order' => 10,
							"slug" => "mujib-section",
							"view" => "theme.default.page-partials.mujib-section",
							"background" => "#F2F2F2",
							"label" => "Mujib + Sheikh Rasel section",
							"key" => "mujib_section",
						],
					]
				]
			)
		);
	}
}