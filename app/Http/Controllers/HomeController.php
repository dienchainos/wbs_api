<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class HomeController extends AppController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
    public function index()
    {
	    return view('dashboard');
    }
	
	/**
	 * @return mixed
	 * @throws \Exception
	 */
    public function show()
    {
	    $students = Students::getListStudents();
	    
	    $this->setDatable($students)->addColumn('action', function ($students) {
		    return '<a href="students.index'.$students->user_id.'">'.$students->username.'</a>';
	    });
	
	    return $this->loadTable();
    }
	
	/**
	 * @param Request $request
	 */
    public function add(Request $request)
    {
    	foreach (Students::data() as $data) {
		    $student = new Students($data);
		    $student->save();
	    }
    }
	
	/**
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function destroy($id)
    {
	    Students::destroy($id);
	    
	    return redirect()->route('students.index')
		                 ->with('success','Student deleted successfully');
    }
    
}
