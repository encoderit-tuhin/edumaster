<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LibraryMember;
use App\BookIssue;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BookIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $library_id = '')
    {
        $issues = [];
        $member = '';
        if($request->all() != []){
            return redirect('bookissues/list/'.$request->library_id);
        }
        if($library_id != ''){
            $member = LibraryMember::join('users','users.id','=','library_members.user_id')->where('library_members.library_id',$library_id)->first();
            $issues = BookIssue::select('*','book_issues.id AS id')
                                ->join('books','books.id','=','book_issues.book_id')
                                ->join('book_categories','book_categories.id','=','books.category_id')
                                ->where('book_issues.library_id',$library_id)
                                ->orderBy('book_issues.id', 'DESC')
                                ->get();
        }
        return view('backend.library.issues.issue-index',compact('issues','member','library_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.library.issues.issue-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $toDay = Carbon::now()->toDateString();
        $this->validate($request, [
            'library_id' => 'required',
            'book_id' => 'required',
            'due_date' => 'required|date|date_format:"Y-m-d"|after:'.$toDay,
        ]);

        $libraryID = $request->library_id;

        $type = LibraryMember::where('library_members.library_id',$libraryID)->first()->member_type;


        $issue = new BookIssue();
        $issue->library_id = $request->library_id;
        $issue->book_id = $request->book_id;
        $issue->note = $request->note;
        $issue->issue_date = $toDay;
        $issue->due_date = $request->due_date;

        if($type == 'Student'){
            $id = LibraryMember::where('library_members.member_type',$type)->where('library_members.library_id', $libraryID)->first()->student_id;
            $issue->student_id =  $id;
            $issue->type =  $type;
            
        }elseif($type == 'Teacher'){
            $id = LibraryMember::where('library_members.member_type',$type)->where('library_members.library_id', $libraryID)->first()->teacher_id;
            $issue->teacher_id =  $id;
            $issue->type =  $type;
        }else{
            $id = LibraryMember::where('library_members.member_type',$type)->where('library_members.library_id', $libraryID)->first()->staff_id;
            $issue->staff_id =  $id;
            $issue->type =  $type;
        }

        $issue->save();

        return redirect('bookissues/list/'.$request->library_id)->with('success', _lang('Information has been added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $issue = BookIssue::select('*','users.name AS member_name','book_issues.status AS status')
                            ->join('library_members','library_members.library_id','=','book_issues.library_id')
                            ->join('users','users.id','=','library_members.user_id')
                            ->join('books','books.id','=','book_issues.book_id')
                            ->join('book_categories','book_categories.id','=','books.category_id')
                            ->where('book_issues.id',$id)
                            ->first();

        return view('backend.library.issues.issue-view',compact('issue'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $issue = BookIssue::find($id);
        return view('backend.library.issues.issue-edit',compact('issue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $toDay = Carbon::now()->toDateString();
        $this->validate($request, [
            'library_id' => 'required',
            'book_id' => 'required',
            'due_date' => 'required',
        ]);

        $libraryID = $request->library_id;

        $type = LibraryMember::where('library_members.library_id',$libraryID)->first()->member_type;

        $issue = BookIssue::find($id);
        $issue->library_id = $request->library_id;
        $issue->book_id = $request->book_id;
        $issue->note = $request->note;
        $issue->due_date = $request->due_date;
        $issue->student_id = NULL;
        $issue->teacher_id = NULL;
        $issue->staff_id = NULL;

        if($type == 'Student'){
            $id = LibraryMember::where('library_members.member_type',$type)->where('library_members.library_id', $libraryID)->first()->student_id;
            $issue->student_id =  $id;
            $issue->type =  $type;
            
        }elseif($type == 'Teacher'){
            $id = LibraryMember::where('library_members.member_type',$type)->where('library_members.library_id', $libraryID)->first()->teacher_id;
            $issue->teacher_id =  $id;
            $issue->type =  $type;
        }else{
            $id = LibraryMember::where('library_members.member_type',$type)->where('library_members.library_id', $libraryID)->first()->staff_id;
            $issue->staff_id =  $id;
            $issue->type =  $type;
        }

        $issue->save();
        
        return redirect('bookissues/list/'.$request->library_id)->with('success', _lang('Information has been updated'));
    }

     /**
     * Book Return the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function book_return($id)
    {
        $toDay = Carbon::now()->toDateString();
        $issue = BookIssue::find($id);
        $issue->return_date = $toDay;
        $issue->status = 2;
        $issue->save();
        return redirect('bookissues/list/'.$issue->library_id)->with('success', _lang('Book has been returned'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $issue = BookIssue::find($id);
        $issue->delete();
        return back()->with('success', _lang('Information has been deleted'));
    }

    // filter by all
    public function allIssues()
    {
        $issues = DB::table('book_issues')
        ->select(
            'book_issues.id',
            'book_issues.type',
            'book_issues.issue_date',
            'book_issues.return_date',
            'book_issues.status',
            'book_issues.student_id',
            'book_issues.teacher_id as teacher_id',
            'book_issues.staff_id',
            'books.name as book_name',
            'students.first_name as student_first_name',
            'students.last_name as student_last_name',
            'students.phone as student_phone',
            'teachers.name as teacher_name',
            'teachers.phone as teacher_phone',
            'staffs.name as staff_name',
            'staffs.phone as staff_phone',
        )
        ->leftJoin('books', 'book_issues.book_id', '=', 'books.id')
        ->leftJoin('students', 'book_issues.student_id', '=', 'students.id')
        ->leftJoin('teachers', 'book_issues.teacher_id', '=', 'teachers.id')
        ->leftJoin('staffs', 'book_issues.staff_id', '=', 'staffs.id')
        ->get();
        // return $issues;
        $idSelect = '';
        return view('backend.library.issues.issue_filter', compact('issues', 'idSelect'));
    }

    public function commonFilter($status, $id){
        if(($status == '0' || $status == '1' || $status == '2' || $status == '') && $id == '')
        {
            $data = '';

            if($status == '0')
            {
                $data = [1,2];
            }
            else if($status == '1')
            {
                $data = [1,1];
            }else if($status == '2')
            {
                $data = [2,2];
            }else{
                $data = [1,2];
            }
            $issues = DB::table('book_issues')
            ->select(
                'book_issues.id',
                'book_issues.type',
                'book_issues.issue_date',
                'book_issues.return_date',
                'book_issues.status',
                'book_issues.student_id',
                'book_issues.teacher_id',
                'book_issues.staff_id',
                'books.name as book_name',
                'students.first_name as student_first_name',
                'students.last_name as student_last_name',
                'students.phone as student_phone',
                'teachers.name as teacher_name',
                'teachers.phone as teacher_phone',
                'staffs.name as staff_name',
                'staffs.phone as staff_phone',
            )
            ->leftJoin('books', 'book_issues.book_id', '=', 'books.id')
            ->leftJoin('students', 'book_issues.student_id', '=', 'students.id')
            ->leftJoin('teachers', 'book_issues.teacher_id', '=', 'teachers.id')
            ->leftJoin('staffs', 'book_issues.staff_id', '=', 'staffs.id')
            ->whereIn('book_issues.status', $data)
            ->get();

            return $issues;
        }
        else if(($status == '0' || $status == '1' || $status == '2' || $status == '') && !empty($id))
        {
            $data = '';

            if($status == '0')
            {
                $data = [1,2];
            }
            else if($status == '1')
            {
                $data = [1,1];
            }else if($status == '2')
            {
                $data = [2,2];
            }else{
                $data = [1,2];
            }
            $issues = DB::table('book_issues')
            ->select(
                'book_issues.id',
                'book_issues.type',
                'book_issues.issue_date',
                'book_issues.return_date',
                'book_issues.status',
                'book_issues.student_id',
                'book_issues.teacher_id',
                'book_issues.staff_id',
                'books.name as book_name',
                'students.first_name as student_first_name',
                'students.last_name as student_last_name',
                'students.phone as student_phone',
                'teachers.name as teacher_name',
                'teachers.phone as teacher_phone',
                'staffs.name as staff_name',
                'staffs.phone as staff_phone',
            )
            ->leftJoin('books', 'book_issues.book_id', '=', 'books.id')
            ->leftJoin('students', 'book_issues.student_id', '=', 'students.id')
            ->leftJoin('teachers', 'book_issues.teacher_id', '=', 'teachers.id')
            ->leftJoin('staffs', 'book_issues.staff_id', '=', 'staffs.id')
            ->whereIn('book_issues.status', $data)
            ->where('book_issues.student_id', $id)
            ->orWhere('book_issues.teacher_id', $id)
            ->orWhere('book_issues.staff_id', $id)
            ->get();

            return $issues;
        }
    }

    public function filterIssues(Request $request)
    {
        $status = $request->status_id;
        $user_id = $request->user_id;

        if($status == '0' && empty($user_id))
        {
            $issues = $this->commonFilter($status,$user_id);
            $idSelect = 0;
            return view('backend.library.issues.issue_filter', compact('issues', 'idSelect'));
        }else if($status == '0' && !empty($user_id)){
            $issues = $this->commonFilter($status,$user_id);
            $idSelect = 0;
            return view('backend.library.issues.issue_filter', compact('issues', 'idSelect'));

        }else if($status == '1' && empty($user_id)){
            $issues = $this->commonFilter($status,$user_id);
            $idSelect = 1;
            return view('backend.library.issues.issue_filter', compact('issues', 'idSelect'));
        }else if($status == '1' && !empty($user_id)){
            $issues = $this->commonFilter($status,$user_id);
            $idSelect = 1;
            return view('backend.library.issues.issue_filter', compact('issues', 'idSelect'));
        }else if($status == '2' && empty($user_id)){
            $issues = $this->commonFilter($status,$user_id);
            $idSelect = 2;
            return view('backend.library.issues.issue_filter', compact('issues', 'idSelect'));
        }else if($status == '2' && !empty($user_id)){
            $issues = $this->commonFilter($status,$user_id);
            $idSelect = 2;
            return view('backend.library.issues.issue_filter', compact('issues', 'idSelect'));
        }     
        else if(empty($status) && !empty($user_id)){
            $issues = $this->commonFilter($status='',$user_id);
            $idSelect = '';
            return view('backend.library.issues.issue_filter', compact('issues', 'idSelect'));
        }else{
            $issues = $this->commonFilter('','');
            $idSelect = '';
            return view('backend.library.issues.issue_filter', compact('issues', 'idSelect'));
        }
    }
}
