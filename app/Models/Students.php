<?php

namespace App\Models;

class Students extends Bases
{
	protected $collection = 'students';
	
	protected $fillable = [
		'user_id',
		'video_name',
		'username',
		'video_path',
		'results',
		'uploaded_date',
		'marked',
		'mail'
	];
	
	public static function data()
	{
		return [
			[
				'video_path' => 'https://www.youtube.com/watch?v=Y5Ohju_moTA&list=RDY5Ohju_moTA&start_radio=1',
				'username'   => 'hoangthien',
				'user_id'       => 12,
				'video_name'    => 'Tittle video 1',
				'uploaded_date' => "2018-10-11T09:34:06Z",
				'mail'       => 'snguyentb303@gmail.com',
				'results' => [
					'event1' => 1,
					'event2' => 1
				]
			],
			[
				'video_path' => 'https://www.youtube.com/watch?v=Y5Ohju_moTA&list=RDY5Ohju_moTA&start_radio=1',
				'username'   => 'nguyenduyen',
				'user_id'       => 13,
				'video_name'    => 'Tittle video 2',
				'uploaded_date' => "2018-10-11T09:34:06Z",
				'mail'       => 'snguyentb303@gmail.com',
				'results' => [
					'event1' => 1,
					'event2' => 1
				]
			],
			[
				'video_path' => 'https://www.youtube.com/watch?v=Y5Ohju_moTA&list=RDY5Ohju_moTA&start_radio=1',
				'username'   => 'chuhieuthien',
				'user_id'       => 14,
				'video_name'    => 'Tittle video 3',
				'uploaded_date' => "2018-10-11T09:34:06Z",
				'mail'       => 'snguyentb303@gmail.com',
				'results' => [
					'event1' => 1,
					'event2' => 1
				]
			],
			
		];
	}
	
	/**
	 * @param $studentId
	 * @param array $fields
	 * @return mixed
	 */
	public static function getVideoListStudent($studentId, $fields = [])
	{
		$fields = array_merge(
			['video_path', 'user_id', 'uploaded_date', 'mail', 'user_id', 'results', 'video_name'],
			$fields
		);
		
		return self::where('user_id', (int)$studentId)->get($fields);
	}
	
	/**
	 * @param array $fields
	 * @param array $order
	 * @return Students[]|\Illuminate\Database\Eloquent\Collection
	 */
	public static function getListStudents($fields = [], $order = ['uploaded_date' => 'DESC'])
	{
		$fields = array_merge(['username', 'mail'], $fields);
		
		return self::groupBy('user_id')
			->orderBy('uploaded_date', 'DESC')
			->get($fields);
	}
}
