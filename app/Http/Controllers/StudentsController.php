<?php

namespace App\Http\Controllers;

use App\Models\Students;

class StudentsController extends AppController
{
	/**
	 * @var array
	 */
	protected $event = [];
	
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
	 * @param $studentId
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index($studentId)
	{
		return view('students.index', ['studentId' => $studentId]);
	}
	
	/**
	 * @param $studentId
	 * @return mixed
	 * @throws \Exception
	 */
	public function student($studentId)
	{
		$students = Students::getVideoListStudent($studentId);
		
		$this->setDatable($students)
			->addColumn('action', function ($students) {
				return '<a href="/students/index/'.$students->user_id.'">'. $students->video_path .'</a>';
			})
			->addColumn('results.event1', function ($students) {
				return $students->results['event1'];
			})
			->addColumn('results.event2', function ($students) {
				return $students->results['event2'];
			});
		
		return $this->loadTable();
	}
	
}
