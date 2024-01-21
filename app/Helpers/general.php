<?php

use App\Enums\VoucherType;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;



if (!function_exists('_lang')) {
    function _lang($string = '')
    {
        $targetLang = Session::has('locale') ? Session::get('locale') : get_option('language') ?? 'en';

        $json = [];
        if (file_exists(lang_path() . "/$targetLang.json")) {
            $json = json_decode(file_get_contents(lang_path() . "/$targetLang.json"), true);
        }

        return !empty($json[$string]) ? $json[$string] : $string;
    }
}


if (!function_exists('startsWith')) {
    function startsWith($haystack, $needle)
    {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }
}


if (!function_exists('create_option')) {
    function create_option($table, $value, $display, $selected = "", $where = NULL)
    {
        $options = "";
        $condition = "";
        if ($where != NULL) {
            $condition .= "WHERE ";
            foreach ($where as $key => $v) {
                $condition .= $key . "'" . $v . "' ";
            }
        }

        $query = DB::select("SELECT $value, $display FROM $table $condition");
        $options .= "<option value='' selected='true'>Select Value</option>";
        foreach ($query as $d) {
            if ($selected != "" && $selected == $d->$value) {
                $options .= "<option value='" . $d->$value . "' selected='true'>" . ucwords($d->$display) . "</option>";
            } else {
                $options .= "<option value='" . $d->$value . "'>" . ucwords($d->$display) . "</option>";
            }
        }

        echo $options;
    }
}

if (!function_exists('get_table')) {
    function get_table($table, $where = NULL)
    {
        $condition = "";
        if ($where != NULL) {
            $condition .= "WHERE ";
            foreach ($where as $key => $v) {
                $condition .= $key . "'" . $v . "' ";
            }
        }
        $query = DB::select("SELECT * FROM $table $condition");
        return $query;
    }
}

if (!function_exists('get_pages')) {
    function get_pages()
    {
        $pages = \App\Page::where("page_status", "publish")->get();
        return $pages;
    }
}

if (!function_exists('get_posts')) {
    function get_posts($limit = 5, $post_type = "post")
    {
        $posts = \App\Post::where("post_status", "publish")
            ->where("post_type", $post_type)
            ->orderBy("id", "desc")
            ->limit($limit)
            ->get();
        return $posts;
    }
}

if (!function_exists('get_notices')) {
    function get_notices($user_type = "Website", $limit = 5)
    {
        $notices = \App\Notice::join("user_notices", "notices.id", "user_notices.notice_id")
            ->select('notices.*')
            ->where("user_notices.user_type", $user_type)
            ->orderBy("notices.id", "desc")
            ->limit($limit)
            ->get();
        return $notices;
    }
}

if (!function_exists('get_events')) {
    function get_events($limit = 5)
    {
        $events = \App\Event::limit($limit)
            ->orderBy("id", "desc")->get();
        return $events;
    }
}

if (!function_exists('user_count')) {
    function user_count($user_type)
    {
        $count = \App\User::where("user_type", $user_type)
            ->selectRaw("COUNT(id) as total")
            ->first()->total;
        return $count;
    }
}

if (!function_exists('post_parmalink')) {
    function post_parmalink($post)
    {
        return url('post/' . $post->slug);
    }
}

if (!function_exists('get_logo_file_path')) {
    function get_logo_file_path()
    {
        $logo = get_option("logo");
        if ($logo == "") {
            return "uploads/logo.png";
        }
        return "uploads/$logo";
    }
}

if (!function_exists('get_logo')) {
    function get_logo()
    {
        return asset(get_logo_file_path());
    }
}



if (!function_exists('sql_escape')) {
    function sql_escape($unsafe_str)
    {

        $unsafe_str = stripslashes($unsafe_str);

        return $escaped_str = str_replace("'", "", $unsafe_str);
    }
}

if (!function_exists('get_option')) {
    function get_option($name)
    {
        $setting = DB::table('settings')->where('name', $name)->get();
        if (!$setting->isEmpty()) {
            return $setting[0]->value;
        }
        return "";
    }
}

if (!function_exists('set_option')) {
    function set_option($name, $value): bool
    {
        return DB::table('settings')
            ->updateOrInsert(
                ['name' => $name],
                ['value' => $value]
            );
    }
}

if (!function_exists('has_permission')) {
    function has_permission($name, $role_id)
    {
        $permission = DB::table('permissions')
            ->where('permission', $name)
            ->where('role_id', $role_id)
            ->get();
        if (!$permission->isEmpty()) {
            return true;
        }
        return false;
    }
}


if (!function_exists('get_year_list')) {
    function get_year_list($from = 1950, $to = null, $sorting = "DESC")
    {
        if (empty($to)) {
            $to = date('Y');
        }

        $years = [];
        for ($i = $from; $i <= $to; $i++) {
            $years[$i] = $i;
        }

        // Sort it.
        if ($sorting == "DESC") {
            krsort($years);
        } else {
            ksort($years);
        }

        return $years;
    }
}

// Generate Year Select Box
if (!function_exists('get_year_select')) {
    function get_year_select($inputName, $label, $selected = null, $required = false, $class = 'form-control')
    {
        return generate_select($inputName, get_year_list(), $label, $selected, $required, __('--Select Year--'), $class);
    }
}

if (!function_exists('get_academic_year')) {
    function get_academic_year($id = "")
    {
        if ($id == "") {
            $id = get_option("academic_year");
        }
        $query = DB::table('academic_years')->where('id', $id)->get();
        if (!$query->isEmpty()) {
            return $query[0]->year;
        }
        return "";
    }
}

if (!function_exists('get_class_name')) {
    function get_class_name($id)
    {
        $class = DB::table('classes')->where('id', $id)->get();
        if (!$class->isEmpty()) {
            return $class[0]->class_name;
        }
        return "";
    }
}

if (!function_exists('get_grade')) {
    function get_grade($mark)
    {
        $mark = sql_escape($mark);
        $grade = DB::select("SELECT grade_name FROM grades WHERE $mark BETWEEN marks_from AND marks_to");
        if (count($grade) > 0) {
            return $grade[0]->grade_name;
        }
        return "N/A";
    }
}

if (!function_exists('get_grades')) {
    function get_grades($withFailedGrade = false): array
    {
        $grades = [
            'A+' => 'A+',
            'A' => 'A',
            'A-' => 'A-',
            'B' => 'B',
            'C' => 'C',
            'D' => 'D',
        ];

        if ($withFailedGrade) {
            $grades['F'] = 'F';
        }

        return $grades;
    }
}

if (!function_exists('generate_select')) {
    function generate_select(
        $name,
        $options = [],
        $label = null,
        $selected = null,
        $required = false,
        $emptyLabel = "--Select--",
        $class = 'form-control',
        $id = null,
        $onchange = null,
        bool $enableRequiredMark = true,
        $isMultiple = false
    ) {
        $select = "";
        $requiredText = "";

        // if form is for online application, then only show the required mark,
        // otherwise it's not necessary, as it's done by css.
        if (request()->is('student-applications/create') || request()->is('student-applications/*/edit') || request()->is('student-online-registration')) {
            // If request is for backend
            $requiredText = ($required && $enableRequiredMark) ? "<span class='text-danger'>*</span>" : "";
        }

        if (!empty($label)) {
            $select = "<label class='label-control'>$label " . $requiredText . "</label>";
        }

        if ($isMultiple) {
            $name = $name . "[]";
        }

        $select .= "<select name='$name'
        " . (!empty($id) ? "id='$id'" : "") . "
        " . (!empty($onchange) ? "onchange='$onchange'" : "") . "
        class='$class'
            " . ($required ? "required" : "") . "
            " . ($isMultiple ? "multiple" : "") . "
        >";

        if (!empty($emptyLabel)) {
            $select .= "<option value=''>$emptyLabel</option>";
        }

        foreach ($options as $key => $value) {
            $select .= "<option value='$key' " . ($selected == $key ? "selected" : "") . ">$value</option>";
        }

        $select = $select . "</select>";

        return $select;
    }
}

if (!function_exists('get_grades_select')) {
    function get_grades_select($inputName, $label, $selected = null, $required = false, $class = 'form-control')
    {
        return generate_select($inputName, get_grades(), $label, $selected, $required, __('--Select Grade--'), $class);
    }
}

if (!function_exists('get_relations')) {
    function get_relations(): array
    {
        return [
            'Father' => __('Father'),
            'Mother' => __('Mother'),
            'Brother' => __('Brother'),
            'Sister' => __('Sister'),
            'Uncle' => __('Uncle'),
            'Aunt' => __('Aunt'),
            'Grandfather' => __('Grandfather'),
            'Grandmother' => __('Grandmother'),
            'Hostel Incharge' => __('Hostel Incharge'),
            // 'Self' => __('Self'),
            'Other' => __('Other'),
        ];
    }
}

if (!function_exists('get_relations_select')) {
    function get_relations_select($inputName, $label, $selected = null, $required = false, $class = 'form-control')
    {
        return generate_select($inputName, get_relations(), $label, $selected, $required, __('--Select Relation--'), $class);
    }
}

if (!function_exists('get_point')) {
    function get_point($mark)
    {
        $mark = sql_escape($mark);
        $grade = DB::select("SELECT point FROM grades WHERE $mark BETWEEN marks_from AND marks_to");
        if (count($grade) > 0) {
            return $grade[0]->point;
        }
        return "N/A";
    }
}

if (!function_exists('get_final_grade')) {
    function get_final_grade($point)
    {
        $point = sql_escape($point);
        $grade = DB::select("SELECT grade_name FROM grades WHERE $point>point OR $point=point limit 1");
        if (count($grade) > 0) {
            return $grade[0]->grade_name;
        }
        return "N/A";
    }
}

if (!function_exists('get_section_name')) {
    function get_section_name($id)
    {
        $class = DB::table('sections')->where('id', $id)->get();
        if (!$class->isEmpty()) {
            return $class[0]->section_name;
        }
        return "";
    }
}

if (!function_exists('get_subject_name')) {
    function get_subject_name($id)
    {
        $class = DB::table('subjects')->where('id', $id)->get();
        if (!$class->isEmpty()) {
            return $class[0]->subject_name;
        }
        return "";
    }
}

if (!function_exists('get_subject_all_types')) {
    function get_subject_all_types()
    {
        return [
            'All' => __('All Groups'),
            'Compulsory' => __('Compulsory'),
            'Elective' => __('Elective'),
            'Optional' => __('Optional'),
            'Elective_Optional' => __('Elective & Optional Both'),
        ];
    }
}

if (!function_exists('get_subject_types')) {
    function get_subject_types()
    {
        return [
            'Compulsory' => __('Compulsory'),
            'Optional' => __('Optional'),
        ];
    }
}


if (!function_exists('get_exam')) {
    function get_exam($id)
    {
        $class = DB::table('exams')->where('id', $id)->get();
        if (!$class->isEmpty()) {
            return $class[0]->name;
        }
        return "";
    }
}

if (!function_exists('timezone_list')) {

    function timezone_list()
    {
        $zones_array = array();
        $timestamp = time();
        foreach (timezone_identifiers_list() as $key => $zone) {
            date_default_timezone_set($zone);
            $zones_array[$key]['ZONE'] = $zone;
            $zones_array[$key]['GMT'] = 'UTC/GMT ' . date('P', $timestamp);
        }
        return $zones_array;
    }
}

if (!function_exists('create_timezone_option')) {

    function create_timezone_option($old = "")
    {
        $option = "";
        $timestamp = time();
        foreach (timezone_identifiers_list() as $key => $zone) {
            date_default_timezone_set($zone);
            $selected = $old == $zone ? "selected" : "";
            $option .= '<option value="' . $zone . '"' . $selected . '>' . 'GMT ' . date('P', $timestamp) . ' ' . $zone . '</option>';
        }
        echo $option;
    }
}


if (!function_exists('get_country_list')) {
    function get_country_list($old_data = '')
    {
        if ($old_data == "") {
            echo file_get_contents(app_path() . '/Helpers/country.txt');
        } else {
            $pattern = '<option value="' . $old_data . '">';
            $replace = '<option value="' . $old_data . '" selected="selected">';
            $country_list = file_get_contents(app_path() . '/Helpers/country.txt');
            $country_list = str_replace($pattern, $replace, $country_list);
            echo $country_list;
        }
    }
}

if (!function_exists('decimalPlace')) {

    function decimalPlace($number)
    {
        return number_format((float) $number, 2);
    }
}

if (!function_exists('get_fee_select')) {

    function get_fee_selectbox($class = "", $fee_id = "")
    {
        $select = "<select name='fee_type[]' class='form-control $class'>";
        $select .= "<option value=''>" . __('--Select--') . "</option>";

        foreach (get_table("fee_types") as $fee_type) {
            $selected = $fee_id == $fee_type->id ? "selected" : "";
            $select .= "<option value='" . $fee_type->id . "' $selected>" . $fee_type->fee_type . "</option>";
        }
        $select .= "</select>";
        return $select;
    }
}

if (!function_exists('get_children')) {
    function get_children($menu_name, $link, $icon)
    {
        $parent_id = App\ParentModel::where('user_id', Auth::User()->id)->first()->id;
        $students = App\Student::where('parent_id', $parent_id)->get();
        $student = App\Student::where('parent_id', $parent_id)->first();
        if (count($students) == 1) {
            $active = '';
            if (Request::is($link . '/*')) {
                $active = 'class="active"';
            }
            return "<li " . $active . ">
						<a href='" . URL::to('/') . '/' . $link . '/' . $student->id . "'>
							<i class='" . $icon . "'></i>
							" . $menu_name . "
						</a>
					</li>";
        } else {
            $return = '<li><a href="#"><i class="' . $icon . '"></i>' . $menu_name . '</a><ul>';
            foreach ($students as $student) {
                $active = '';
                if (Request::is($link . '/' . $student->id)) {
                    $active = 'class="active"';
                }
                $return .= "<li " . $active . ">
								<a href='" . URL::to('/') . '/' . $link . '/' . $student->id . "'>
									" . $student->first_name . " " . $student->last_name ?? '' . "
								</a>
							</li>";
            }
            $return .= '</ul><li>';

            return $return;
        }
        return '';
    }
}

if (!function_exists('count_inbox')) {
    function count_inbox()
    {
        $user_id = \Auth::user()->id;
        $inbox = DB::select("SELECT COUNT(id) as c FROM user_messages
		WHERE receiver_id='$user_id' AND user_messages.read='n'");
        return $inbox[0]->c;
    }
}

if (!function_exists('inbox_items')) {
    function inbox_items($limit = 5)
    {
        $messages = \App\Message::join("user_messages", "messages.id", "=", "user_messages.message_id")
            ->join("users", "messages.sender_id", "=", "users.id")
            ->select('messages.*', 'users.name as sender', 'user_messages.read')
            ->where("receiver_id", \Auth::user()->id)
            ->where("read", "n")
            ->limit($limit)
            ->orderBy("messages.id", "DESC")->get();

        return $messages;
    }
}

if (!function_exists('get_student_id')) {
    function get_student_id()
    {
        $user_id = \Auth::user()->id;
        $student = DB::select("SELECT id FROM students
		WHERE user_id='$user_id'");
        return $student[0]->id;
    }
}

if (!function_exists('get_student_name')) {
    function get_student_name($student_id)
    {
        $student = DB::select("SELECT first_name,last_name FROM students
		WHERE id='$student_id'");
        return $student[0]->first_name . " " . $student[0]->last_name ?? '';
    }
}

if (!function_exists('get_teacher_id')) {
    function get_teacher_id()
    {
        $user_id = \Auth::user()->id;
        $teacher = DB::select("SELECT id FROM teachers
		WHERE user_id='$user_id'");
        return $teacher[0]->id;
    }
}

if (!function_exists('get_parent_id')) {
    function get_parent_id()
    {
        $user_id = \Auth::user()->id;
        $parent = DB::select("SELECT id FROM parents
		WHERE user_id='$user_id'");
        return $parent[0]->id;
    }
}

if (!function_exists('object_to_string')) {
    function object_to_string($object, $col, $quote = false)
    {
        $string = "";
        foreach ($object as $data) {
            if ($quote == true) {
                $string .= "'" . $data->$col . "', ";
            } else {
                $string .= $data->$col . ", ";
            }
        }
        $string = substr_replace($string, "", -2);
        return $string;
    }
}

if (!function_exists('buildTree')) {

    function buildTree($object, $currentParent, $url, $currLevel = 0, $prevLevel = -1)
    {
        foreach ($object as $category) {
            if ($currentParent == $category->parent_id) {
                if ($currLevel > $prevLevel)
                    echo "<ol id='menutree'>";
                if ($currLevel == $prevLevel)
                    echo "</li>";
                echo '<li> <label class="menu_label" for=' . $category->id . '><a href="' . action($url, $category->id) . '">' . $category->category . '</a></label>';
                if ($currLevel > $prevLevel) {
                    $prevLevel = $currLevel;
                }
                $currLevel++;
                buildTree($object, $category->id, $url, $currLevel, $prevLevel);
                $currLevel--;
            }
        }
        if ($currLevel == $prevLevel)
            echo "</li> </ol>";
    }
}


if (!function_exists('buildOptionTree')) {

    function buildOptionTree($table, $currentParent, $currLevel = 0, $prevLevel = -1)
    {

        $array = DB::table($table)->get();
        foreach ($array as $category) {
            if ($currentParent == $category->parent_id) {

                $level = "";
                for ($i = 0; $i < $currLevel; $i++) {
                    $level .= "-";
                }
                echo '<option value=' . $category->id . '>' . $level . " " . $category->category . '</option>';
                if ($currLevel > $prevLevel) {
                    $prevLevel = $currLevel;
                }
                $currLevel++;
                buildOptionTree($table, $category->id, $currLevel, $prevLevel);
                $currLevel--;
            }
        }
    }
}

if (!function_exists('navigationTree')) {

    function navigationTree($object, $currentParent, $url, $currLevel = 0, $prevLevel = -1)
    {
        foreach ($object as $menu) {
            if ($currentParent == $menu->parent_id) {
                if ($currLevel > $prevLevel)
                    echo "<ol id='menutree' class='dd-list'>";
                if ($currLevel == $prevLevel)
                    echo "</li>";
                //echo '<li class="dd-item" data-id="'.$menu->id.'"> <label class="menu_label" for='.$menu->id.'><a href="'.action($url, $menu->id).'">'.$menu->menu_label.'</a></label>';
                echo '<li class="dd-item" data-id="' . $menu->id . '"><div class="dd-handle">' . $menu->menu_label . '</div><a class="edit_menu" href="' . action($url, $menu->id) . '">' . __('Edit Menu') . '</a>';
                if ($currLevel > $prevLevel) {
                    $prevLevel = $currLevel;
                }
                $currLevel++;
                navigationTree($object, $menu->id, $url, $currLevel, $prevLevel);
                $currLevel--;
            }
        }
        if ($currLevel == $prevLevel)
            echo "</li> </ol>";
    }
}


if (!function_exists('navigationOptionTree')) {

    function navigationOptionTree($table, $navigation_id, $currentParent, $currLevel = 0, $prevLevel = -1)
    {

        $array = DB::table($table)
            ->where("navigation_id", $navigation_id)->get();
        foreach ($array as $category) {
            if ($currentParent == $category->parent_id) {

                $level = "";
                for ($i = 0; $i < $currLevel; $i++) {
                    $level .= "-";
                }
                echo '<option value=' . $category->id . '>' . $level . " " . $category->menu_label . '</option>';
                if ($currLevel > $prevLevel) {
                    $prevLevel = $currLevel;
                }
                $currLevel++;
                navigationOptionTree($table, $navigation_id, $category->id, $currLevel, $prevLevel);
                $currLevel--;
            }
        }
    }
}


if (!function_exists('get_s')) {
    function get_s($serialized, $lang)
    {
        if (!empty($serialized)) {
            $array = unserialize($serialized);
            return $array[$lang];
        }
        return "";
    }
}

if (!function_exists('theme')) {
    function theme()
    {
        $theme = get_option('active_theme');
        if ($theme == "") {
            return "theme/default";
        }
        return "theme/" . $theme;
    }
}

if (!function_exists('theme_asset_url()')) {
    function theme_asset_url($file)
    {
        $theme = get_option('active_theme');
        if ($theme == "") {
            return asset("theme/default/$file");
        }
        return asset("theme/$theme/$file");
    }
}

if (!function_exists('load_custom_template')) {
    function load_custom_template()
    {
        $path = resource_path() . "/views/" . theme() . "/templates";
        if (is_dir($path)) {
            $files = scandir($path);
            $options = "";
            foreach ($files as $file) {
                $name = pathinfo($file, PATHINFO_FILENAME);
                if (strpos($name, 'template-') === 0) {
                    $name = str_replace(".blade", "", substr($name, 9));
                    $options .= "<option value='$name'>" . ucwords($name) . "</option>";
                }
            }
            echo $options;
        }
    }
}


if (!function_exists('load_theme')) {
    function load_theme($active = '')
    {
        $path = resource_path() . "/views/theme";
        $files = scandir($path);
        $options = "";

        foreach ($files as $file) {
            $name = pathinfo($file, PATHINFO_FILENAME);
            if ($name == "." || $name == "") {
                continue;
            }

            $selected = "";
            if ($active == $name) {
                $selected = "selected";
            } else {
                $selected = "";
            }

            $options .= "<option value='$name' $selected>" . ucwords($name) . "</option>";
        }
        echo $options;
    }
}

if (!function_exists('load_language')) {
    function load_language($active = '')
    {
        $path = lang_path();
        $files = scandir($path);
        $options = "";

        foreach ($files as $file) {
            $name = pathinfo($file, PATHINFO_FILENAME);
            if ($name == "." || $name == "" || $name == "language") {
                continue;
            }

            $selected = "";
            if ($active == $name) {
                $selected = "selected";
            } else {
                $selected = "";
            }

            $options .= "<option value='$name' $selected>" . ucwords($name) . "</option>";
        }
        echo $options;
    }
}

if (!function_exists('get_language_list')) {
    function get_language_list()
    {
        $path = lang_path();
        $files = scandir($path);
        $array = array();

        foreach ($files as $file) {
            $name = pathinfo($file, PATHINFO_FILENAME);
            if ($name == "." || $name == "" || $name == "language") {
                continue;
            }

            $array[] = $name;
        }
        return $array;
    }
}

if (!function_exists('get_navigation_id')) {
    function get_navigation_id($menu)
    {
        $nav = DB::table('site_navigations')->where('menu_name', $menu)->get();
        if (!$nav->isEmpty()) {
            return $nav[0]->id;
        }
        return 0;
    }
}

if (!function_exists('get_page_slug')) {
    function get_page_slug($page_id)
    {
        $page = DB::table('pages')->where('id', $page_id)->get();
        if (!$page->isEmpty()) {
            return $page[0]->slug;
        }
        return "/";
    }
}

$shortcodes = array();

if (!function_exists('create_shortcode')) {
    function create_shortcode($shortcode, $callback)
    {
        global $shortcodes;
        $shortcodes[$shortcode] = $callback;
    }
}

if (!function_exists('do_shortcode')) {
    function do_shortcode($shortcode)
    {
        global $shortcodes;
        call_user_func($shortcodes[$shortcode], $atts);
    }
}


if (!function_exists('get_blood_groups')) {
    function get_blood_groups(): array
    {
        return [
            'A+' => 'A+',
            'A-' => 'A-',
            'B+' => 'B+',
            'B-' => 'B-',
            'O+' => 'O+',
            'O-' => 'O-',
            'AB+' => 'AB+',
            'AB-' => 'AB-',
        ];
    }
}

if (!function_exists('get_blood_groups_select')) {
    function get_blood_groups_select($inputName, $label, $selected = "", $required = false, $class = 'form-control')
    {
        return generate_select($inputName, get_blood_groups(), $label, $selected, $required, __('--Select Group--'), $class);
    }
}

if (!function_exists('get_board_name')) {
    function get_board_name(): array
    {
        return [
            'Mymensingh',
            'Dhaka',
            'Chittagong',
            'Rajshahi',
            'Khulna',
            'Barisal',
            'Sylhet',
            'Comilla',
            'Jessore',
            'Dinajpur',
            'Technical',
            'Madrasah',
            'DIBS(Dhaka)'

        ];
    }
}
if (!function_exists('get_committee_post_name')) {
    function get_committee_post_name(): array
    {
        return [
            "President",
            "Bidyutsahi Member",
            "Donor Member",
            "Parent Member",
            "Teacher Agent",
            "Member secretary",
            "Doctor"
        ];
    }
}
if (!function_exists('get_sms_balance')) {
    function get_sms_balance()
    {
        $balance =  DB::table("sms_balances")->first();
        return $balance?->non_masking_balance ?? 0;
    }
}

if (!function_exists('get_masking_sms_balance')) {
    function get_masking_sms_balance()
    {
        $balance =  DB::table("sms_balances")->first();
        return $balance?->masking_balance ?? 0;
    }
}

// $responseData = json_decode($body, true);
// return $responseData['balance'] ?? null;
// } catch (\Throwable $th) {
//     //throw $th;
// }


if (!function_exists('formatPhoneNumber')) {
    function formatPhoneNumber($phoneNumber)
    {
        // Remove all non-digit characters
        $digits = preg_replace('/[^0-9]/', '', $phoneNumber);

        // Check for the leading "88" or "+88" and remove it
        if (strpos($digits, '88') === 0) {
            $digits = substr($digits, 2);
        } elseif (strpos($digits, '+88') === 0) {
            $digits = substr($digits, 3);
        }

        // If the number is less than 11 digits, return it as is
        if (strlen($digits) < 11) {
            return $digits;
        }

        // Remove leading "0" from the number if present
        if ($digits[0] === '0') {
            $digits = substr($digits, 1);
        }

        // Add the "0" prefix
        $formattedNumber = '0' . $digits;

        return $formattedNumber;
    }
}


if (!function_exists('validateNumber')) {
    function validateNumber($number)
    {
        $isValid = false;
        if (substr($number, 0, 4) == "8801" && strlen($number) == 13) {
            return true;
        } elseif (substr($number, 0, 2) == "01" && strlen($number) == 11) {
            return true;
        } elseif (substr($number, 0, 2) == "1" && strlen($number) == 10) {
            return true;
        }
        return $isValid;
    }
}

if (!function_exists('get_ssc_subjects')) {
    function get_ssc_subjects($key = null): array
    {
        $subjects =  [
            'compulsory' => [
                'bangla' => __('Bangla'),
                'english' => __('English'),
                'math' => __('Mathematics'),
                'ict' => __('ICT'),
                'religion_sub' => __('Religion & Moral Studies'),
                'career_education' => __('Career Education'),
                'physical_education' => __('Physical Education'),
            ],
            'science' => [
                'physics' => __('Physics'),
                'chemistry' => __('Chemistry'),
                'bk' => __('Bangladesh and Global Studies'),
                'biology' => __('Biology'),
                'higher_math' => __('Higher Math'),
            ],
            'science_optional' => [
                'biology' => __('Biology'),
                'higher_math' => __('Higher Math'),
                'agriculture' => __('Agriculture'),
            ],
            'business_studies' => [
                'businessEnt' => __('Business Introduction'),
                'accounting' => __('Accounting'),
                'management' => __('Business Management'),
                'financeBanking' => __('Finance & Banking'),
                'generalScience' => __('General Science'),
                // 'music' => __('Music'),
            ],
            'business_studies_optional' => [
                'agriculture' => __('Agriculture'),
            ],
            'humanities' => [
                'civicCitizenship' => __('Civics'),
                'geography' => __('Geography'),
                'economics' => __('Economics'),
                'history' => __('History of Bangladesh'),
                'generalScience' => __('General Science'),
                // 'music' => __('Music'),
            ],
            'humanities_optional' => [
                'agriculture' => __('Agriculture'),
            ],
        ];

        if ($key) {
            return $subjects[$key] ?? [];
        }

        return $subjects;
    }
}

if (!function_exists('get_districts')) {
    function get_districts(): array
    {
        return [
            'Bagerhat' => __('Bagerhat'),
            'Bandarban' => __('Bandarban'),
            'Barguna' => __('Barguna'),
            'Barisal' => __('Barisal'),
            'Bhola' => __('Bhola'),
            'Bogra' => __('Bogra'),
            'Brahmanbaria' => __('Brahmanbaria'),
            'Chandpur' => __('Chandpur'),
            'Chapainawabganj' => __('Chapainawabganj'),
            'Chittagong' => __('Chittagong'),
            'Chuadanga' => __('Chuadanga'),
            "Cox's Bazar" => __("Cox's Bazar"),
            'Dhaka' => __('Dhaka'),
            'Dinajpur' => __('Dinajpur'),
            'Faridpur' => __('Faridpur'),
            'Feni' => __('Feni'),
            'Gaibandha' => __('Gaibandha'),
            'Gazipur' => __('Gazipur'),
            'Gopalganj' => __('Gopalganj'),
            'Habiganj' => __('Habiganj'),
            'Jamalpur' => __('Jamalpur'),
            'Jessore' => __('Jessore'),
            'Jhalokati' => __('Jhalokati'),
            'Jhenaidah' => __('Jhenaidah'),
            'Joypurhat' => __('Joypurhat'),
            'Khagrachhari' => __('Khagrachhari'),
            'Khulna' => __('Khulna'),
            'Kishoreganj' => __('Kishoreganj'),
            'Kurigram' => __('Kurigram'),
            'Kushtia' => __('Kushtia'),
            'Lakshmipur' => __('Lakshmipur'),
            'Lalmonirhat' => __('Lalmonirhat'),
            'Magura' => __('Magura'),
            'Madaripur' => __('Madaripur'),
            'Manikganj' => __('Manikganj'),
            'Meherpur' => __('Meherpur'),
            'Moulvibazar' => __('Moulvibazar'),
            'Munshiganj' => __('Munshiganj'),
            'Mymensingh' => __('Mymensingh'),
            'Naogaon' => __('Naogaon'),
            'Narail' => __('Narail'),
            'Narayanganj' => __('Narayanganj'),
            'Natore' => __('Natore'),
            'Netrakona' => __('Netrakona'),
            'Nilphamari' => __('Nilphamari'),
            'Noakhali' => __('Noakhali'),
            'Pabna' => __('Pabna'),
            'Panchagarh' => __('Panchagarh'),
            'Patuakhali' => __('Patuakhali'),
            'Pirojpur' => __('Pirojpur'),
            'Rajbari' => __('Rajbari'),
            'Rajshahi' => __('Rajshahi'),
            'Rangamati' => __('Rangamati'),
            'Rangpur' => __('Rangpur'),
            'Satkhira' => __('Satkhira'),
            'Shariatpur' => __('Shariatpur'),
            'Sherpur' => __('Sherpur'),
            'Sirajgonj' => __('Sirajgonj'),
            'Sunamganj' => __('Sunamganj'),
            'Sylhet' => __('Sylhet'),
            'Tangail' => __('Tangail'),
            'Thakurgaon' => __('Thakurgaon'),
        ];
    }
}

if (!function_exists('get_districts_select')) {
    function get_districts_select($inputName, $label, $selected = "", $required = false, $class = 'form-control')
    {
        return generate_select($inputName, get_districts(), $label, $selected, $required, __('--Select District--'), $class);
    }
}

if (!function_exists('get_old_value')) {
    function get_old_value($student, $key = '')
    {
        if (empty($student)) {
            return old($key);
        }

        return $student->$key ?? null;
    }
}

if (!function_exists('format_currency')) {
    function format_currency($amount)
    {
        // Number formatter with en_US locale.
        $fmt = new NumberFormatter('en_US', NumberFormatter::DECIMAL);
        $formattedAmount = $fmt->format($amount);

        // Append the currency symbol manually.
        return '৳' . $formattedAmount;
    }
}

if (!function_exists('convert_amount_to_words')) {
    function convert_amount_to_words($number)
    {
        $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
        return ucfirst($f->format($number)) . ' Taka Only';
    }
}

if (!function_exists('get_accounting_types')) {
    function get_accounting_types(?string $key = null): array | string
    {
        $types = [
            VoucherType::PAYMENT => __('Payment'),
            VoucherType::RECEIPT => __('Receipt'),
            VoucherType::CONTRA => __('Contra'),
            VoucherType::FUND_TRANSFER => __('Fund Transfer'),
            VoucherType::JOURNAL => __('Journal'),
        ];

        if ($key) {
            return $types[$key] ?? '';
        }

        return $types;
    }
}