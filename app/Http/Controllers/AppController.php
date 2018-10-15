<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;

class AppController extends Controller
{
	protected $datable;
	
	/**
	 * @param bool $make
	 * @return mixed
	 */
	protected function loadTable($make = true)
	{
		return $this->getDatable()->make($make);
	}
	
	/**
	 * @param $data
	 * @return AppController
	 * @throws \Exception
	 */
	protected function setDatable($data)
	{
		$this->datable = Datatables::of($data);
		
		return $this->datable;
	}
	
	/**
	 * @return mixed
	 */
	protected function getDatable()
	{
		return $this->datable;
	}
	
}