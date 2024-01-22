<?php

use App\StudentMigration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\FeesController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ShiftController;

use App\Http\Controllers\VitalController;

use App\Http\Controllers\PeriodController;

use App\Http\Controllers\AllFeesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FeeHeadController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\PayslipController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\WaiversController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\FeeWaiverController;
use App\Http\Controllers\MarkInputController;
use App\Http\Controllers\PhoneBookController;
use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\AbsentFineController;
use App\Http\Controllers\BookQrCodeController;
use App\Http\Controllers\DateConfigController;
use App\Http\Controllers\FeeSubHeadController;
use App\Http\Controllers\SalaryHeadController;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\ClubMembersController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\FeesMappingController;
use App\Http\Controllers\SalesReturnController;
use App\Http\Controllers\SmsPurchaseController;
use App\Http\Controllers\SmsTemplateController;
use App\Http\Controllers\SpecificFeeController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\AmountConfigController;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\WaiverConfigController;
use App\Http\Controllers\AcademicYearsController;
use App\Http\Controllers\ClubModeratorController;
use App\Http\Controllers\FeeDateConfigController;
use App\Http\Controllers\MeritPositionController;
use App\Http\Controllers\PayrollReportController;
use App\Http\Controllers\StudentReportController;

use App\Http\Controllers\BookCategoriesController;
use App\Http\Controllers\AccountingFundsController;
use App\Http\Controllers\PurchasesReturnController;

use App\Http\Controllers\QuickCollectionController;
use App\Http\Controllers\AccountingGroupsController;
use App\Http\Controllers\DigitalFeeConfigController;
use App\Http\Controllers\StudentMigrationController;
use App\Http\Controllers\AccountingLedgersController;
use App\Http\Controllers\PhoneBookCategoryController;
use App\Http\Controllers\StudentBulkUploadController;
use App\Http\Controllers\StudentCategoriesController;
use App\Http\Controllers\StudentSendIdPassController;



use App\Http\Controllers\TeacherBulkUploadController;
use App\Http\Controllers\StudentApplicationController;
use App\Http\Controllers\AccountFundTransferController;
use App\Http\Controllers\AccountTransactionsController;
use App\Http\Controllers\FeeManagementReportController;
use App\Http\Controllers\StudentResultReportController;
use App\Http\Controllers\TransferCertificateController;
use App\Http\Controllers\AccountingCategoriesController;
use App\Http\Controllers\AccountingCoreReportController;
use App\Http\Controllers\AttendanceTimeConfigController;
use App\Http\Controllers\AccountContraTransferController;
use App\Http\Controllers\AccountFundWiseTransferController;
use App\Http\Controllers\AccountUserWiseTransferController;
use App\Http\Controllers\StudentReportPdfDownloadController;
use App\Http\Controllers\AccountLedgerWiseTransferController;
use App\Http\Controllers\AccountJournalTransactionsController;
use App\Http\Controllers\AccountVoucherWiseTransferController;
use App\Http\Controllers\Frontend\FrontendClassRoutineController;
use App\Http\Controllers\AccountFundSummaryWiseTransferController;
use App\Http\Controllers\Frontend\StudentOnlineRegistrationController;
use App\Http\Controllers\AccountFundSummaryMonthlyWiseTransferController;
use App\Http\Controllers\GeneralCertificateController;
use App\Http\Controllers\HscRecommendationController;
use App\Subexam;
Route::get('/login', function () {
	return redirect('login');
});
Route::get('/data', function () {
	$subexams = Subexam::with('exam')->get();
	dd($subexams);

	foreach ($subexams as $subexam) {
        $examName = $subexam->exam->name;
        // Access other properties as needed
        $examId = $subexam->exam->id;

        // Do something with the data
        dd($examName, $examId);
    }
});

Auth::routes();

Route::get('test-pdf', function () {
	return view('layouts.pdf.test-pdf');
});

//Frontend Route
Route::get('/', 'WebsiteController@index')->name('index');
Route::get('/post/{slug?}', 'WebsiteController@single')->name('singlePost');
Route::get('/category/{id?}', 'WebsiteController@category_archive');
Route::get('/notice/{id?}', 'WebsiteController@notice');
Route::get('/all-notices', 'WebsiteController@notices')->name('allNotices');
Route::get('/all-news', 'WebsiteController@news')->name('allNews');
Route::get('/event/{id?}', 'WebsiteController@event');
Route::post('/contact/send_message', 'WebsiteController@send_message');
Route::get('/site/{slug?}', 'WebsiteController@index');
Route::get('/contact-us', 'Frontend\ContactController@index')->name('contact');
Route::post('/contact-submit', 'Frontend\ContactController@store')->name('contact.store');
Route::get('/booklist', 'Frontend\BookController@index')->name('booklist');
Route::get('/books-search', 'Frontend\BookController@search')->name('searchBook');
Route::get('/club/{slug}', 'Frontend\ClubController@show')->name('club.show');
Route::get('/archive-news', 'Frontend\ArchiveNewsController@index')->name('archiveNews.index');
Route::post('/archive-news-search', 'Frontend\ArchiveNewsController@search')->name('archiveNews.search');
// change language
Route::get('/language/{lang}', 'Frontend\LanguagesController@index');
Route::get('/login/type/{lang}', 'WebsiteController@loginType');

// TeachersController Routes [New]
Route::get('/teacher', 'Frontend\TeachersController@index')->name('teacher.index');
Route::get('/teacher-department/{slug}', 'Frontend\TeachersController@show')->name('teacher-department');

// StaffsController Routes [New]
Route::get('/staff', 'Frontend\StaffsController@index')->name('staff.index');
Route::get('/staff-department/{slug}', 'Frontend\StaffsController@show')->name('staff-department');

// AdministrativeController Routes [New]
Route::get('/administrative', 'Frontend\AdministrativeController@index')->name('administrative.index');

// GalleryController Routes [New]
Route::get('/page/image-gallery', 'Frontend\GalleryController@imageIndex')->name('gallery.index');
Route::get('/page/video-gallery', 'Frontend\GalleryController@videoIndex')->name('video.index');
// TODO GalleryController
Route::get('/image-gallery/{year}', 'Frontend\GalleryController@imageYear')->name('image-gallery.show');

// FrontendClassRoutineController Routes [New]
Route::get('page/class-routine', [FrontendClassRoutineController::class, 'index'])->name('class-routines.index');
Route::get('/get-sections/{class_id}', [FrontendClassRoutineController::class, 'sectionsGet'])->name('class-sections.index');
Route::get('/get-section-routine/{class_id}/{section_id}', [FrontendClassRoutineController::class, 'sectionsRoutine'])->name('sections-routines.index');

// Frontend Routes [New]
Route::get('/page/{slug}', 'WebsitePagesController@show')->name('pages.show');

// StudentOnlineRegistrationController Routes [New]
Route::resource('student-online-registration', StudentOnlineRegistrationController::class);
Route::get('student-online-registration/get-subjects/by-group-class', [StudentOnlineRegistrationController::class, 'getSubjects'])->name('student-online-registration.get-subjects');

Route::group(['middleware' => ['auth']], function () {
	/** Common Route for All **/
	Route::get('dashboard', 'DashboardController@index')->name('dashboard');

	//Profile Controller
	Route::get('profile/my_profile', 'ProfileController@my_profile');
	Route::get('profile/edit', 'ProfileController@edit');
	Route::post('profile/update', 'ProfileController@update');
	Route::get('profile/changepassword', 'ProfileController@change_password');
	Route::post('profile/updatepassword', 'ProfileController@update_password');


	/** Permission Route Group **/
	Route::group(['middleware' => ['permission']], function () {

		//User Controller
		Route::get('users/get_users/{user_type}', [UserController::class, 'get_users']);
		Route::resource('users', 'UserController');

		Route::post('teachers/update-teacher-status', 'TeacherController@updateTeacherStatus')->name('teachers.updateStatus');
		Route::resource('teachers', 'TeacherController');
		Route::get('teacher.status-enable/{id}', [TeacherController::class, 'statusEnable'])->name('teacher.status-enable');
		Route::get('teacher.status-disable/{id}', [TeacherController::class, 'statusDisable'])->name('teacher.status-disable');

		// TeacherBulkUploadController Route
		Route::get('teachers-bulk-upload', [TeacherBulkUploadController::class, 'index'])->name('teachers.bulk-upload');
		Route::post('teachers-bulk-upload/store', [TeacherBulkUploadController::class, 'store'])->name('teachers.bulk-upload.store');
		Route::get('teachers-bulk-file-upload', [TeacherBulkUploadController::class, 'fileIndex'])->name('teachers.bulk-file-upload');
		Route::post('teachers-file-upload/store', [TeacherBulkUploadController::class, 'fileStore'])->name('teachers.bulk-file-upload.store');
		Route::get('teachers-dow\nload-file-upload/store', [TeacherBulkUploadController::class, 'downloadDemoFile'])->name('teachers.download.demo.file');
		Route::get('teachers-list-report', [TeacherController::class, 'teacherList'])->name('teachers-list-report');

		Route::post('staffs/update-staff-status', 'StaffController@updateStaffStatus')->name('staffs.updateStatus');
		Route::resource('staffs', 'StaffController');

		//Parents Route
		Route::get('parents/get_parents', 'ParentController@get_parents');
		Route::resource('parents', 'ParentController');

		//Student Route
		Route::get('students/id_card/{student_id}', 'StudentController@id_card')->name('students.view_id_card');
		Route::get('student-search-for-card-print', [StudentController::class, 'studentIdCard'])->name('student-search-for-card-print');
		Route::get('student-list-for-card-print', [StudentController::class, 'studentIdCardList'])->name('student-list-for-card-print');
		Route::get('students/get_subjects/{class_id}', 'StudentController@get_subjects');
		Route::get('students/get_students/{class_id}/{section_id}', 'StudentController@get_students');
		Route::match(['get', 'post'], 'students/promote/{step?}', 'StudentController@promote')->name('students.promote');

		Route::get('students/get_students/{class_id}', 'StudentController@get_students_by_classId');
		Route::get('students/get_students/sms/{class_id}/{section}', 'StudentController@get_students_by_classId_section_id');

		Route::resource('students', 'StudentController');
		Route::get('students/create/{id}', [StudentController::class, 'create']);
		Route::get('students.status-enable/{id}', [StudentController::class, 'statusEnable'])->name('students.status-enable');
		Route::get('students.status-disable/{id}', [StudentController::class, 'statusDisable'])->name('students.status-disable');

		Route::post('/fetch-student-data', 'StudentController@fetchStudentData')->name('fetch-student-data');
		Route::resource('student-applications', StudentApplicationController::class);
		Route::get('student-applications/class/{class_id?}', [StudentApplicationController::class, 'index']);

		Route::resource('student-send-id-pass', StudentSendIdPassController::class);
		Route::get('student-send-id-pass/delete/{id}', [StudentSendIdPassController::class, 'delete'])->name('student-send-id-pass.delete');
		// Summary
		Route::get('student-list', [StudentReportController::class, 'studentList'])->name('student-list.index');
		Route::post('student-list', [StudentReportController::class, 'studentList'])->name('student-list.search');
		Route::post('gender-wise-student-list', [StudentReportController::class, 'studentList'])->name('gender-wise-student-list.search');
		Route::post('religion-wise-student-list', [StudentReportController::class, 'studentList'])->name('religion-wise-student-list.search');

		// Report PDF Generate
		Route::post('student-list-pdf-download', [StudentReportPdfDownloadController::class, 'studentSummaryReportPdfDownload'])->name('student-list-pdf-download.store');
		Route::get('student-list-pdf-reports-download', [StudentReportPdfDownloadController::class, 'studentPdfDownload'])->name('student-reports-download.index');
		Route::post('student-details-pdf-reports-download', [StudentReportPdfDownloadController::class, 'detailsStudentListPdf'])->name('student-details-download.index');
		Route::get('at-a-glance-pdf', [StudentReportPdfDownloadController::class, 'atAGlancePdf'])->name('at-a-glance-pdf.index');
		Route::post('quick-search-pdf', [StudentReportPdfDownloadController::class, 'quickSearchPdf'])->name('quick-search-pdf.search');
		Route::get('student-id-pass-pdf-download', [StudentReportPdfDownloadController::class, 'studentIdPassPdfDownload'])->name('student-id-pass-download.index');
		Route::get('applying-students-pdf-download', [StudentReportPdfDownloadController::class, 'applyingStudents'])->name('applying-students-pdf-download.index');
		Route::post('send-sms-pdf-reports', [StudentReportPdfDownloadController::class, 'sendSmsPdfReports'])->name('send-sms-pdf-reports.index');
		Route::post('student-migration-download', [StudentReportPdfDownloadController::class, 'migratedListPdfDownload'])->name('student-migration.download');

		// Details
		Route::get('details-student-list', [StudentReportController::class, 'detailsStudentList'])->name('details-student-list.index');
		Route::post('class-wise-student-list', [StudentReportController::class, 'detailsStudentList'])->name('class-wise-student-list.search');
		Route::post('section-wise-student-list', [StudentReportController::class, 'detailsStudentList'])->name('section-wise-student-list.search');
		Route::post('section-group-wise-student-list', [StudentReportController::class, 'detailsStudentList'])->name('section-group-wise-student-list.search');
		Route::post('category-wise-student-list', [StudentReportController::class, 'detailsStudentList'])->name('category-wise-student-list.search');
		Route::post('section-category-wise-student-list-search', [StudentReportController::class, 'detailsStudentList'])->name('section-category-wise-student-list.search');
		Route::post('age-wise-student-list-search', [StudentReportController::class, 'detailsStudentList'])->name('age-wise-student-list.search');
		Route::post('gender-wise-student-list-search', [StudentReportController::class, 'detailsStudentList'])->name('gender-wise-student-details.search');
		Route::get('at-a-glance', [StudentReportController::class, 'atAGlance'])->name('at-a-glance.index');
		Route::get('taught-list', [StudentReportController::class, 'taughtList'])->name('taught-list.index');
		Route::post('taught-list', [StudentReportController::class, 'taughtList'])->name('taught-list.search');
		Route::get('migrated-list', [StudentReportController::class, 'migratedList'])->name('migrated-list.index');
		Route::post('migrated-list', [StudentReportController::class, 'migratedList'])->name('migrated-list.search');
		Route::get('migrated-list-report', [StudentReportController::class, 'migratedListReport'])->name('migrated-list.report');
		Route::post('migrated-list-report', [StudentReportController::class, 'migratedListReport'])->name('migrated-list.report');
		Route::get('quick-search', [StudentReportController::class, 'quickSearch'])->name('quick-search.index');
		Route::post('quick-search', [StudentReportController::class, 'quickSearch'])->name('quick-search.search');
		Route::get('quick-search/{id}', [StudentReportController::class, 'quickSearchShow'])->name('quick-search.show');
		Route::get('student-report-download/{id}', [StudentReportController::class, 'studentReportDownload'])->name('student-report.download');
		Route::get('student-session-list', [StudentReportController::class, 'studentSessionReportIndex'])->name('student-session-list');
		Route::get('student-session-report', [StudentReportController::class, 'studentSessionReport'])->name('student-session-report');

		// StudentBulkUploadController Route
		Route::get('students-bulk-upload', [StudentBulkUploadController::class, 'index'])->name('students.bulk-upload');
		Route::post('students-bulk-upload/store', [StudentBulkUploadController::class, 'store'])->name('students.bulk-upload.store');
		Route::get('students-bulk-file-upload', [StudentBulkUploadController::class, 'fileIndex'])->name('students.bulk-file-upload');
		Route::post('students-file-upload/store', [StudentBulkUploadController::class, 'fileStore'])->name('students.bulk-file-upload.store');
		Route::get('students-download-file-upload/store', [StudentBulkUploadController::class, 'downloadDemoFile'])->name('students.download.demo.file');

		// Departments - Class - Section Route Controller 
		Route::resource('departments', DepartmentsController::class);
		Route::resource('student-categories', StudentCategoriesController::class);
		Route::resource('class', ClassController::class);
		Route::post('sections/section', 'SectionController@get_section');
		Route::get('sections/class/{class_id}', 'SectionController@index')->name('sections.index');
		Route::resource('sections', SectionController::class);

		// PayrollController Route
		Route::get('/payroll-assign', [PayrollController::class, 'index'])->name('payroll.assign.index');
		Route::post('/payroll-create', [PayrollController::class, 'create'])->name('payroll.assign.create');
		Route::get('/payroll-mapping', [PayrollController::class, 'mapping'])->name('payroll.mapping.create');
		Route::post('/payroll-mapping', [PayrollController::class, 'mappingStore'])->name('payroll.mapping.store');
		Route::get('/salary-create', [PayrollController::class, 'salaryCreateGet'])->name('salary.create.index');
		Route::post('/salary-create', [PayrollController::class, 'salaryCreateGet'])->name('salary.create.search');
		Route::post('/salary-create-store', [PayrollController::class, 'salaryCreate'])->name('salary.create.store');
		Route::get('/salary-payment-process', [PayrollController::class, 'salaryPaymentProcess'])->name('salary.payment-process.index');
		Route::post('/salary-payment-process', [PayrollController::class, 'salaryPaymentProcess'])->name('salary.payment-process.search');
		Route::post('/salary-payment-create', [PayrollController::class, 'salaryPayment'])->name('salary.payment-process.create');
		Route::get('/advance-salary-payment', [PayrollController::class, 'advanceSalaryPayment'])->name('advance.salary.payment');
		Route::post('/advance-salary-payment', [PayrollController::class, 'advanceSalaryPayment'])->name('advance.salary.payment.check');
		Route::post('/advance-salary-pay', [PayrollController::class, 'advanceSalaryPay'])->name('advance.salary.pay');
		Route::get('/due-salary-payment', [PayrollController::class, 'dueSalaryPayment'])->name('due.salary.payment');
		Route::post('/due-salary-payment', [PayrollController::class, 'dueSalaryPayment'])->name('due.salary.payment.check');
		Route::post('/due-salary-pay', [PayrollController::class, 'dueSalaryPay'])->name('due.salary.pay');
		Route::get('/return-salary-payment', [PayrollController::class, 'returnSalaryPayment'])->name('return.salary.payment');
		Route::post('/return-salary-payment', [PayrollController::class, 'returnSalaryPayment'])->name('return.salary.payment.check');
		Route::post('/return-salary-pay', [PayrollController::class, 'returnSalaryPay'])->name('return.salary.pay');
		Route::resource('salary-heads', SalaryHeadController::class);


		Route::get('/salary-statement', [PayrollReportController::class, 'salaryStatementReport'])->name('salary-statement-report');
		Route::get('/payment-info', [PayrollReportController::class, 'getPaymentInfo'])->name('payment-info-report');

		//Subject Route
		Route::get('subjects/class/{class_id}', 'SubjectController@index')->name('subjects.index');
		Route::post('subjects/subject', 'SubjectController@get_subject');
		Route::resource('subjects', 'SubjectController');

		//Assign Subject Route
		Route::post('assignsubjects/search', 'AssignSubjectController@search')->name('assignsubjects.index');
		Route::resource('assignsubjects', 'AssignSubjectController');

		//Assign Shift
		Route::resource('assignshifts', 'AssignShiftController');

		//Assign Class
		Route::resource('assignclass', 'ClassAssignController');

		Route::resource('syllabus', 'SyllabusController');
		Route::resource('assignments', 'AssignmentController');
		Route::resource('student_groups', 'StudentGroupController');
		Route::resource('academic-years', AcademicYearsController::class);

		//Class Routine
		Route::get('class_routines', 'ClassRoutineController@index')->name('class_routines.index');
		Route::get('class_routines/class/{class_id}', 'ClassRoutineController@class')->name('class_routines.index');
		Route::get('class_routines/manage/{class_id}/{section_id}', 'ClassRoutineController@manage')->name('class_routines.edit');
		Route::post('class_routines/store', 'ClassRoutineController@store')->name('class_routines.create');
		Route::get('class_routines/show/{class_id}/{section_id}', 'ClassRoutineController@show')->name('class_routines.index');

		//Attendance Controller
		Route::match(['get', 'post'], 'student/attendance', 'AttendanceController@student_attendance')->name('student_attendance.create');
		Route::post('student/attendance/save', 'AttendanceController@student_attendance_save')->name('student_attendance.create');
		Route::get('student/attendance/bulk-upload', 'AttendanceController@show')->name('students.attendance-bulk-upload');
		Route::post('student/attendance/bulk-upload/store', 'AttendanceController@store')->name('students.attendance-bulk-upload.store');
		Route::get('student/attendance/download-upload-file', 'AttendanceController@downloadDemoFile')->name('students.attendance-download.demo.file');
		Route::match(['get', 'post'], 'staff/attendance', 'AttendanceController@staff_attendance')->name('staff_attendance.create');
		Route::post('staff/attendance/save', 'AttendanceController@staff_attendance_save')->name('staff_attendance.create');

		// Attendance Delete
		// Route::get('student_attendance/delete', 'AttendanceController@studentAttendanceDelete')->name('student_attendance.delete');
		Route::match(['get', 'post'], 'student_attendance/delete', 'AttendanceController@studentAttendanceDelete')->name('student_attendance.delete');

		// leaves
		Route::post('update-leave-status/{id}', [LeaveController::class, 'updateStatus'])->name('leave.updateStatus');
		Route::resource('leave', 'LeaveController');

		//Media Controller
		Route::resource('attendance-time-config', AttendanceTimeConfigController::class);

		Route::resource('media-categories', 'MediaCategoriesController');
		Route::resource('medias', 'MediasController');
		Route::post('medias/filter', 'MediasController@index')->name('medias.filter');

		Route::get('get-categories', 'MediaCategoriesController@getCategories')->name('medias.get-categories');
		Route::post('media-category-create', 'MediaCategoriesController@mediaCategoryStore')->name('medias.media-categories.add');
		Route::get('get-subcategories', 'MediaCategoriesController@getSubcategories')->name('medias.get-subcategories');

		//Utility Controller
		Route::match(['get', 'post'], 'administration/general_settings/{store?}', 'UtilityController@settings')->name('general_settings.update');
		Route::post('administration/theme_option/{store?}', 'UtilityController@update_theme_option')->name('theme_option.update');
		Route::get('administration/change_session/{session_id}', 'UtilityController@change_session')->name('general_settings.update');
		Route::post('administration/upload_logo', 'UtilityController@upload_logo')->name('general_settings.update');
		Route::get('administration/backup_database', 'UtilityController@backup_database')->name('utility.backup_database');

		//Language Controller
		Route::resource('languages', 'LanguageController');
		// student migration
		Route::get('students/get_students/migration/{class_id}/{section}', [StudentMigrationController::class, 'get_student_for_migration']);
		Route::resource('student-migration', StudentMigrationController::class);
		Route::get('student-migration-pushback', [StudentMigrationController::class, 'index'])->name('student-migration-pushback.index');

		//Semester Exams
		// Route::get('exam-settings/startup'[])
		Route::get('mark-input/section-wise', [MarkInputController::class, 'sectionWise'])->name('mark-input');
		Route::get('mark-input/section-wise/{exam_id}/{subject_id}', [MarkInputController::class, 'sectionWiseSearch'])->name('mark-input.search');

		Route::get('add-or-update-mark-input', [MarkInputController::class, 'markInputNew'])->name('markInputNew');
		Route::post('mark-input-store', [MarkInputController::class, 'markInputStore'])->name('add-or-update-mark-input.store');
		Route::get('search-student-or-show-mark', [MarkInputController::class, 'getStudentsForAddMark'])->name('search-student-or-show-mark');
		// Route::get('update-input-mark', [MarkInputController::class, 'updateMarkInput'])->name('update-input-mark');
		// Route::get('update-input-mark-show', [MarkInputController::class, 'updateMarkInputShow'])->name('update-input-mark-show');


		// leaves
		Route::post('update-leave-status/{id}', [LeaveController::class, 'updateStatus'])->name('leave.updateStatus');
		Route::resource('leave', LeaveController::class);

		//PickList Controller
		Route::get('picklists/type/{type}', 'PicklistController@type')->name('picklists.index');
		Route::resource('picklists', 'PicklistController');

		//Library Controller
		Route::get('librarymembers/librarycard/{id}', 'LibraryMemberController@library_card')->name('librarymembers.view_library_card');
		Route::post('librarymembers/section', 'LibraryMemberController@get_section');
		Route::post('librarymembers/student', 'LibraryMemberController@get_student');
		Route::resource('librarymembers', 'LibraryMemberController');

		//BookCategory - Book  Controller
		Route::resource('book-categories', BookCategoriesController::class);
		Route::resource('books', BookController::class);
		Route::get('books-bulk-upload', [BookController::class, 'bulkUpload'])->name('books.bulk-upload');
		Route::post('books-bulk-upload/store', [BookController::class, 'bulkStore'])->name('books.bulk-upload.store');
		Route::get('books-bulk-demo-file-download', [BookController::class, 'downloadDemoFile'])->name('books.bulk-upload-demo.download');

		Route::get('books-qr-code/page', [BookQrCodeController::class, 'index'])->name('books.qr-code');
		Route::post('books-qr-code/store', [BookQrCodeController::class, 'store'])->name('book-ids.store');

		// club controller
		Route::get('club-members/create', [ClubMembersController::class, 'create'])->name('members.create');
		Route::post('club-member/store', [ClubMembersController::class, 'store'])->name('members.store');
		Route::get('club-moderator/create', [ClubModeratorController::class, 'create'])->name('moderator.create');
		Route::post('club-moderator/store', [ClubModeratorController::class, 'store'])->name('moderator.store');
		Route::post('update-club-status/', [ClubController::class, 'updateStatus'])->name('clubs.updateStatus');
		Route::resource('clubs', ClubController::class);

		// Student Result Reports
		Route::resource('student-result-reports', StudentResultReportController::class);
		Route::get('student-result-reports-file-download', [StudentResultReportController::class, 'downloadDemoFile'])->name('student-result-reports-file-download.file');

		//Book Issue  Controller
		Route::match(['get', 'post'], 'bookissues/list/{library_id?}', 'BookIssueController@index')->name('bookissues.index');
		Route::get('bookissues/return/{id}', 'BookIssueController@book_return')->name('bookissues.return');
		Route::resource('bookissues', 'BookIssueController');
		Route::get('bookissues/filter/all', 'BookIssueController@allIssues')->name('bookissues.filter');
		Route::post('bookissues/filter/all', 'BookIssueController@filterIssues')->name('bookissues.filter_by_option');

		//Transport Controller
		Route::resource('transportvehicles', 'TransportVehicleController');

		//Transport Controller
		Route::resource('transports', 'TransportController');

		//Transport Member Controller
		Route::post('transportmembers/section', 'TransportMemberController@get_section');
		Route::post('transportmembers/student', 'TransportMemberController@get_student');
		Route::post('transportmembers/transport_fee', 'TransportMemberController@get_transport_fee');
		Route::get('transportmembers/list/{type?}/{class?}', 'TransportMemberController@index')->name('transportmembers.index');
		Route::resource('transportmembers', 'TransportMemberController');

		//Hostel Controller
		Route::resource('hostels', 'HostelController');

		//Hostel Category Controller
		Route::resource('hostelcategories', 'HostelCategoryController');

		//Hostel Member Controller
		Route::get('hostelmembers/class/{class_id}', 'HostelMemberController@index')->name('hostelmembers.index');
		Route::get('hostelmembers/create/{id?}', 'HostelMemberController@create')->name('hostelmembers.create');
		Route::post('hostelmembers/standard', 'HostelMemberController@get_standard');
		Route::post('hostelmembers/hostel_fee', 'HostelMemberController@get_hostel_fee');
		Route::resource('hostelmembers', 'HostelMemberController');

		// Exam Controller
		Route::get('exams/all-exams', 'ExamController@getAllExam');
		Route::get('exams/all-exams-id/{exam_id}/{class_id}', 'ExamController@getAllExamByExamID')->name('exams.all-exams-id');
		Route::get('exams/get-data-by-selection', 'ExamController@getDataBySelection');
		Route::match(['get', 'post'], 'exams/schedule/{type?}', 'ExamController@exam_schedule')->name('exams.view_schedule');
		Route::match(['get', 'post'], 'exams/attendance', 'ExamController@exam_attendance')->name('exams.store_exam_attendance');
		Route::post('exams/store_exam_attendance', 'ExamController@store_exam_attendance')->name('exams.store_exam_attendance');
		Route::post('exams/store_schedule', 'ExamController@store_exam_schedule')->name('exams.store_exam_schedule');
		Route::post('exams/get_exam', 'ExamController@get_exam');
		Route::post('exams/get_subject', 'ExamController@get_subject');
		Route::post('exams/get_teacher_subject', 'ExamController@get_teacher_subject');
		Route::resource('exams', 'ExamController');
		Route::post('exam/sub-exams', 'ExamController@subExamStore')->name('subexam');
		Route::get('exam/get-sub-exams', 'ExamController@getSubExam')->name('getSubexam');
		Route::delete('exam/sub-exams/{id}', 'ExamController@subExamDelete')->name('subexam.delete');

       //Grade Controller
		Route::resource('grades', 'GradeController');

		//Mark Distribution Controller
		Route::resource('mark_distributions', 'MarkDistributionController');

		//Mark Register
		Route::match(['get', 'post'], 'marks/rank/{class?}', 'MarkController@student_ranks')->name('marks.view_student_rank');
		Route::match(['get', 'post'], 'marks/create', 'MarkController@create')->name('marks.create');
		Route::post('marks/store', 'MarkController@store')->name('marks.store');
		Route::match(['get', 'post'], 'marks/{class?}', 'MarkController@index')->name('marks.index');
		Route::get('marks/view/{student_id}/{class_id}', 'MarkController@view_marks')->name('marks.show');
		Route::get('merit-process', [MeritPositionController::class, 'process'])->name('merit-process');
		Route::post('merit-process/store', [MeritPositionController::class, 'store'])->name('merit-process.store');
		Route::get('merit-list', [MeritPositionController::class, 'index'])->name('merit-list');
		Route::post('merit-list/show', [MeritPositionController::class, 'showMeritList'])->name('merit-list.show');

		//Bank & Cash Account Controller
		Route::resource('accounts', 'AccountController');

		// Accounting related Controllers
		Route::resource('accounting-categories', AccountingCategoriesController::class);
		Route::resource('accounting-groups', AccountingGroupsController::class);
		Route::get('/get-account-groups/{id}', [AccountingGroupsController::class, 'getAccountGroups']);

		Route::resource('accounting-ledgers', AccountingLedgersController::class);
		Route::resource('accounting-funds', AccountingFundsController::class);
		Route::resource('account-transaction-payment', AccountTransactionsController::class);
		Route::resource('journal-transactions', AccountJournalTransactionsController::class);
		Route::resource('account-fund-transfers', AccountFundTransferController::class);
		Route::resource('account-contra-transfers', AccountContraTransferController::class);
		Route::resource('voucher-wise', AccountVoucherWiseTransferController::class);
		Route::resource('user-wise', AccountUserWiseTransferController::class);
		Route::resource('ledger-wise', AccountLedgerWiseTransferController::class);
		Route::resource('fund-wise', AccountFundWiseTransferController::class);
		Route::resource('fund-summary', AccountFundSummaryWiseTransferController::class);
		Route::resource('fund-summary-monthly', AccountFundSummaryMonthlyWiseTransferController::class);
		Route::get('voucher-delete', [AccountVoucherWiseTransferController::class, 'delete'])->name('voucher-delete');
		Route::post('voucher-delete', [AccountVoucherWiseTransferController::class, 'destroy'])->name('voucher-delete');

		Route::get('account-journal-report', [AccountJournalTransactionsController::class, 'report'])->name('account-journal-report');

		//Accounting Core Reports
		Route::get('balance-sheet', [AccountingCoreReportController::class, 'getBalanceSheet'])->name('balance-sheet');
		Route::get('balance-sheet-details', [AccountingCoreReportController::class, 'getBalanceSheetDetails'])->name('balance-sheet-details');
		Route::get('trial-balance', [AccountingCoreReportController::class, 'getTrialBalance'])->name('trial-balance');
		Route::get('trial-balance-details', [AccountingCoreReportController::class, 'getBalanceSheetDetails'])->name('trial-balance-details');

		Route::get('cash-flow-statement', [AccountingCoreReportController::class, 'getCashFlowStatement'])->name('cash-flow-statement');
		Route::get('cash-flow-details', [AccountingCoreReportController::class, 'getCashFlowDetails'])->name('cash-flow-details');
		Route::get('cash-book-account', [AccountingCoreReportController::class, 'getCashBookAccount'])->name('cash-book-account');
		Route::get('bank-book-account', [AccountingCoreReportController::class, 'getBankBookAccount'])->name('bank-book-account');
		Route::get('ledger-book-account', [AccountingCoreReportController::class, 'getLedgerBookAccount'])->name('ledger-book-account');
		Route::get('cash-flow-details', [AccountingCoreReportController::class, 'getCashFlowDetails'])->name('cash-flow-details');

		Route::get('income-statement', [AccountingCoreReportController::class, 'getIncomeStatement'])->name('income-statement');
		Route::get('income-statement-details', [AccountingCoreReportController::class, 'getIncomeStatementDetails'])->name('income-statement-details');
		Route::get('cash-summary', [AccountingCoreReportController::class, 'getCashSummary'])->name('cash-summary');


		//Chart Of Accounts Controller
		Route::resource('chart_of_accounts', 'ChartOfAccountController');

		//Payment Method Controller
		Route::resource('payment_methods', 'PaymentMethodController');

		//Payee/Payer Controller
		Route::resource('payee_payers', 'PayeePayerController');

		//Transaction Controller
		Route::get('transactions/income', 'TransactionController@income')->name('transactions.manage_income');
		Route::get('transactions/expense', 'TransactionController@expense')->name('transactions.manage_expense');
		Route::get('transactions/add_income', 'TransactionController@add_income')->name('transactions.add_income');
		Route::get('transactions/add_expense', 'TransactionController@add_expense')->name('transactions.add_expense');
		Route::resource('transactions', 'TransactionController');

		// Fee Type
		Route::resource('fee_types', 'FeeTypeController');

		// Fees Management
		Route::resource('fee-head', FeeHeadController::class);
		Route::resource('fee-sub-head', FeeSubHeadController::class);
		Route::resource('fees-mapping', FeesMappingController::class);
		Route::resource('amount-config', AmountConfigController::class);
		Route::resource('fees', FeesController::class);
		Route::resource('date-config', DateConfigController::class);
		Route::resource('fee-date-config', FeeDateConfigController::class);
		Route::resource('bank-accounts', BankAccountController::class);
		Route::resource('digital-fee-configs', DigitalFeeConfigController::class);
		Route::resource('absent-fines', AbsentFineController::class);
		Route::resource('periods', PeriodController::class);
		Route::resource('fee-waiver', FeeWaiverController::class);
		Route::resource('waiver-config', WaiverConfigController::class);
		Route::resource('quick-collection', QuickCollectionController::class);
		Route::resource('payslip', PayslipController::class);
		Route::get('payslip/create/form', [PayslipController::class, 'createForm'])->name('payslip.create.form');
		Route::get('payslip/create/collection', [PayslipController::class, 'collection'])->name('payslip.create.collection');
		Route::post('payslip/update/collection', [PayslipController::class, 'collectionUpdate'])->name('payslip.update.collection');
		Route::get('payslip/delete/list', [PayslipController::class, 'destroyList'])->name('payslip.delete.list');
		Route::delete('payslip/delete/store/{id}', [PayslipController::class, 'destroy'])->name('payslip.delete.store');
		Route::post(
			'student-collection/sub-head-wise-calculation',
			[QuickCollectionController::class, 'getCollectionAmounts']
		)
			->name('student-collection.sub-head-wise-calculation');
		Route::get('student-collection/invoice/{id}', [QuickCollectionController::class, 'invoice'])
			->name('student-collection.invoice');
		Route::resource('waivers', WaiversController::class);
		Route::resource('specific-fee', SpecificFeeController::class);
		Route::resource('all-fees', AllFeesController::class);

		//Fee Collection Report
		Route::get('class-wise-payment-summary', [FeeManagementReportController::class, 'getClassWisePaymentSummary'])->name('class-wise-payment-summary');
		Route::get('fee-head-summary-info', [FeeManagementReportController::class, 'getFeeHeadInfoSummary'])->name('fee-head-info-summary');
		Route::get('fee-head-class-collection', [FeeManagementReportController::class, 'getFeeHeadClassCollection'])->name('fee-head-class-collection');
		Route::get('monthly-paid-info', [FeeManagementReportController::class, 'getMonthlyPaidInfo'])->name('monthly-paid-info');
		Route::get('unpaid-info', [FeeManagementReportController::class, 'getUnpaidFeeInfo'])->name('unpaid-info');
		Route::get('unpaid-summery', [FeeManagementReportController::class, 'getUnpaidFeeSummery'])->name('unpaid-summery');
		Route::get('payment-ratio-info', [FeeManagementReportController::class, 'getPaymentRatioInfo'])->name('payment-ratio-info');
		Route::get('payment-fee-info', [FeeManagementReportController::class, 'getPaymentInfo'])->name('payment-fee-info');
		Route::get('payment-details-info/{id}', [FeeManagementReportController::class, 'getPaymentInfoDetails'])->name('payment-details-info');
		Route::get('head-wise-payment', [FeeManagementReportController::class, 'getHeadWisePayment'])->name('head-wise-payment');
		// Route::get('head-wise-payment-details',[FeeManagementReportController::class, 'getSubHeadWisePayment'])->name('head-wise-payment-details');
		Route::get('head-wise-due', [FeeManagementReportController::class, 'getSubHeadWisePayment'])->name('head-wise-due');
		Route::get('paid-invoice', [FeeManagementReportController::class, 'getPaidFees'])->name('paid-invoice');

		//Invoice
		Route::get('invoices/class/{class_id}', 'InvoiceController@index')->name('invoices.index');
		Route::resource('invoices', 'InvoiceController');

		//Student Payments
		Route::get('student_payments/create/{invoice_id?}', 'StudentPaymentController@create')->name('student_payments.create');
		Route::get('student_payments/class/{class_id}', 'StudentPaymentController@index')->name('student_payments.index');
		Route::resource('student_payments', 'StudentPaymentController');

		//Message Controller
		Route::get('message/compose', 'MessageController@create');
		Route::get('message/outbox', 'MessageController@send_items');
		Route::get('message/inbox', 'MessageController@inbox_items');
		Route::get('message/outbox/{id}', 'MessageController@show_outbox');
		Route::get('message/inbox/{id}', 'MessageController@show_inbox');
		Route::post('message/send', 'MessageController@send');

		//SMS Controller
		Route::get('sms/phon-book', 'SmsController@phoneBook')->name('sms.phoneBook');
		Route::get('sms/compose', [SmsController::class, 'compose2'])->name('sms.compose');
		Route::get('sms/compose2', [SmsController::class, 'create'])->name('sms.compose2');

		Route::get('sms/logs', 'SmsController@logs')->name('sms.view_logs');
		Route::post('sms/send', 'SmsController@send')->name('sms.compose');
		Route::get('sms-summary-report', [SmsController::class, 'summaryReport'])->name('sms.summaryReport');
		Route::match(['get', 'post'], 'sms-send-report', [SmsController::class, 'sendReport'])->name('sms.sendReport');


		//Email Controller
		Route::get('email/compose', 'EmailController@create')->name('email.compose');
		Route::get('email/logs', 'EmailController@logs')->name('email.view_logs');
		Route::post('email/send', 'EmailController@send')->name('email.compose');

		//Subject Settings
		Route::get('subject/config', 'SubjectConfigController@create')->name('subject.config');
		Route::get('subject/config/list', 'SubjectConfigController@list')->name('subject.config.list');
		Route::post('subject/config', 'SubjectConfigController@store')->name('subject.config.store');
		Route::put('subject/config/update', 'SubjectConfigController@update')->name('subject.config.update');
		Route::delete('subject/config/{id}', 'SubjectConfigController@destroy')->name('subject.config.destroy');

		//Notice Controller
		Route::get('notices/{id}', 'NoticeController@show')->where('id', '[0-9]+');
		Route::resource('notices', 'NoticeController');

		//Event Controller
		Route::get('events/{id}', 'EventController@show')->where('id', '[0-9]+');
		Route::resource('events', 'EventController');

		//Report Controller
		Route::any('student_attendance_report/status', 'ReportController@studentAttendanceReportStatus')->name('reports.student_attendance_report.status');
		Route::match(['get', 'post'], 'reports/student_attendance_report/{view?}', 'ReportController@student_attendance_report')->name('reports.student_attendance_report');
		Route::match(['get', 'post'], 'reports/staff_attendance_report/{view?}', 'ReportController@staff_attendance_report')->name('reports.staff_attendance_report');
		Route::match(['get', 'post'], 'reports/student_id_card/{view?}', 'ReportController@student_id_card')->name('reports.student_id_card');
		Route::match(['get', 'post'], 'reports/exam_report/{view?}', 'ReportController@exam_report')->name('reports.exam_report');
		Route::match(['get', 'post'], 'reports/progress_card/{view?}', 'ReportController@progress_card')->name('reports.progress_card');
		Route::match(['get', 'post'], 'reports/class_routine/{view?}', 'ReportController@class_routine')->name('reports.class_routine');
		Route::match(['get', 'post'], 'reports/exam_routine/{view?}', 'ReportController@exam_routine')->name('reports.exam_routine');
		Route::match(['get', 'post'], 'reports/income_report/{view?}', 'ReportController@income_report')->name('reports.income_report');
		Route::match(['get', 'post'], 'reports/expense_report/{view?}', 'ReportController@expense_report')->name('reports.expense_report');
		Route::get('reports/account_balance', 'ReportController@account_balance')->name('reports.account_balance');
		Route::match(['get', 'post'], 'reports/student_attendance_ratio/{view?}', 'ReportController@student_attendance_ratio')->name('reports.student_attendance_ratio');

		//Permission Controller
		Route::get('permission/control/{role_id?}', 'PermissionController@index')->name('permission.manage');
		Route::post('permission/store', 'PermissionController@store')->name('permission.manage');

		//Role Controller
		Route::resource('permission_roles', 'RoleController');

		//CMS Controller
		Route::get('posts/type/{type?}', 'PostController@index')->name("posts.custom_post_list");
		Route::resource('posts', 'PostController');

		//Page Controller
		Route::resource('pages', 'PageController');

		//Page Controller
		Route::resource('sliders', 'SliderController');

		//Post Categrory
		Route::get('post_categories/get_category', 'PostCategoryController@get_category');
		Route::resource('post_categories', 'PostCategoryController');

		//Route::get('website_languages/translate/{language_id?}','WebsiteLanguageController@translate')->name("website_languages.translate");
		//Route::post('website_languages/store_translate','WebsiteLanguageController@store_translate')->name("website_languages.translate");
		//Route::resource('website_languages','WebsiteLanguageController');

		//Site Navigation
		Route::resource('site_navigations', 'SiteNavigationController');
		Route::get('site_navigation_items/navigation/{navigation_id?}', 'NavigationItemController@index')->name("site_navigation_items.index");
		Route::get('site_navigation_items/create/{navigation_id?}', 'NavigationItemController@create')->name("site_navigation_items.create");
		Route::resource('site_navigation_items', 'NavigationItemController');

		Route::match(['get', 'post'], 'website/menu_sorting', 'FrontendSettingController@menu_sorting')->name('website.menu_sorting');
		Route::match(['get', 'post'], 'website/theme_option', 'FrontendSettingController@theme_option')->name('website.theme_option');

		// inventory 
		Route::resource('item-category', ItemCategoryController::class);
		Route::resource('item', ItemController::class);
		Route::resource('supplier', SupplierController::class);

		Route::get('remove-purchase-item/{id}', [PurchasesController::class, 'removeItem'])->name('remove-purchase-item');
		Route::resource('purchases', PurchasesController::class);
		Route::get('remove-sales-item/{id}', [SalesController::class, 'removeItem'])->name('remove-purchase-item');

		Route::resource('sales', SalesController::class);
		Route::resource('purchases-return', PurchasesReturnController::class);
		Route::resource('sales-return', SalesReturnController::class);

		Route::post('quiz-result-search', [QuizController::class, 'quizResultSearch'])->name('quizResultSearch');
		Route::resource('quiz', QuizController::class);
		// contact message

		Route::resource('shift', ShiftController::class);

		// testimonial
		Route::post('student-search-testimonial', [TestimonialController::class, 'studentSearch'])->name('testimonial.searchStudent');
		// Route::get('testimonial-running-student', [TestimonialController::class,'runningStudents'])->name('testimonial.runningStudents');
		Route::get('testimonial-pdf/{id}', [TestimonialController::class, 'testimonialPdf'])->name('testimonial.pdf');
		Route::resource('testimonial', TestimonialController::class);

		Route::resource('hsc-recommendation', HscRecommendationController::class);
		Route::resource('general-certificate', GeneralCertificateController::class);


		Route::get('tc-pdf/{id}', [TransferCertificateController::class, 'tcPdf'])->name('tc.pdf');
		Route::post('student-search', [TransferCertificateController::class, 'studentSearch'])->name('tc.searchStudent');
		Route::resource('tc', TransferCertificateController::class);
		// committee

		Route::resource('committee', CommitteeController::class);

		Route::get('vital-pdf/{id}', [VitalController::class, 'vitalPdf'])->name('vital.pdf');
		Route::get('print-vital', [VitalController::class, 'printVital'])->name('print-vital');
		Route::resource('vital', VitalController::class);
		// sms
		Route::resource('sms-template', SmsTemplateController::class);
		Route::resource('phone-book', PhoneBookController::class);
		Route::resource('phone-book-category', PhoneBookCategoryController::class);
		Route::get('contact-message', [ContactController::class, 'index'])->name('contact-message');
		Route::get('contact-message-change-status/{id}', [ContactController::class, 'status'])->name('contact-message-change-status');
		Route::resource('sms-purchase', SmsPurchaseController::class);
		Route::resource('user-logs', UserLogsController::class);

		Route::prefix('feedback')->group(
			function () {
				Route::get('/student', 'NotificationController@getStudentNotification');
				Route::get('/admin', 'NotificationController@getAdminNotification');
				Route::post('/send', 'NotificationController@feedbackSend');
			}
		);
	});


	/** Teacher Route Group **/
	Route::group(['middleware' => ['teacher']], function () {
		Route::get('teacher/my_profile', 'Users\TeacherController@my_profile');
		Route::get('teacher/class_schedule', 'Users\TeacherController@class_schedule');
		Route::get('teacher/mark_register', 'Users\TeacherController@mark_register');
		Route::post('teacher/marks/create', 'Users\TeacherController@create_mark');
		Route::post('teacher/marks/store', 'Users\TeacherController@store_mark');
		Route::get('teacher/assignments', 'Users\TeacherController@assignments');
		Route::get('teacher/create_assignment', 'Users\TeacherController@create_assignment');
		Route::post('teacher/store_assignment', 'Users\TeacherController@store_assignment');
		Route::get('teacher/edit_assignment/{id}', 'Users\TeacherController@edit_assignment');
		Route::get('teacher/assignment/{id}', 'Users\TeacherController@show_assignment');
		Route::post('teacher/update_assignment/{id}', 'Users\TeacherController@update_assignment');
		Route::get('teacher/destroy_assignment/{id}', 'Users\TeacherController@destroy_assignment');
	});


	/** Student Route Group **/
	Route::group(['middleware' => ['student']], function () {
		Route::get('student/my_profile', 'Users\StudentController@my_profile');
		Route::get('student/my_subjects', 'Users\StudentController@my_subjects');
		Route::get('student/class_routine', 'Users\StudentController@class_routine');
		Route::match(['get', 'post'], 'student/exam_routine/{view?}', 'Users\StudentController@exam_routine');
		Route::get('student/progress_card', 'Users\StudentController@progress_card');
		Route::get('student/my_invoice/{status?}', 'Users\StudentController@my_invoice');
		Route::get('student/view_invoice/{id?}', 'Users\StudentController@view_invoice');
		Route::get('student/invoice_payment/{method?}/{invoice_id?}', 'Users\StudentController@invoice_payment');
		Route::get('student/paypal/{action?}/{invoice_id?}', 'Users\StudentController@paypal');
		Route::post('student/stripe_payment/{invoice_id?}', 'Users\StudentController@stripe_payment');
		Route::get('student/payment_history', 'Users\StudentController@payment_history');
		Route::get('student/library_history', 'Users\StudentController@library_history');
		Route::get('student/my_assignment', 'Users\StudentController@my_assignment');
		Route::get('student/view_assignment/{id?}', 'Users\StudentController@view_assignment');
		Route::get('student/my_syllabus', 'Users\StudentController@my_syllabus');
		Route::get('student/view_syllabus/{id?}', 'Users\StudentController@view_syllabus');
	});


	/** Parent Route Group **/
	Route::group(['middleware' => ['parent']], function () {
		Route::get('parent/my_profile', 'Users\ParentController@my_profile');
		Route::get('parent/my_children/{student_id?}', 'Users\ParentController@my_children');
		Route::match(['get', 'post'], 'parent/children_attendance/{student_id?}', 'Users\ParentController@children_attendance');
		Route::get('parent/progress_card/{student_id?}', 'Users\ParentController@progress_card');
	});
});

// });

// Route::get('/installation', 'Install\InstallController@index');
// Route::get('install/database', 'Install\InstallController@database');
// Route::post('install/process_install', 'Install\InstallController@process_install');
// Route::get('install/create_user', 'Install\InstallController@create_user');
// Route::post('install/store_user', 'Install\InstallController@store_user');
// Route::get('install/system_settings', 'Install\InstallController@system_settings');
// Route::post('install/finish', 'Install\InstallController@final_touch');

Route::post('student/paypal_ipn', 'GatewayController@paypal_ipn');
