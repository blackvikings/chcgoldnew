<?php
use App\Course;

class Helpers 
{
	public static function courseNavigation($course)
	{
		$count = Course::where('id', $course)->count();
		return $count;
	}  
}