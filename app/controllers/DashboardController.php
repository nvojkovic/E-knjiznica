<?php

class DashboardController extends BaseController {

	public function Home()
	{
		$userCount = User::count();
		$studentBookCount = Book::where('tip', 'K')->count();
		$teacherBookCount = Book::where('tip', 'N')->count();
		$activeBorrowCount = Borrow::where('DatumVracanja', null)->count();

		//Code for chart
		$chart = DB::table('posudbe')->select(DB::raw("MONTH(datumPosudbe), DATE_FORMAT(datumPosudbe, '%Y-%m-%d'), COUNT(*)"))->groupBy('MONTH(datumPosudbe)')->get();
		$chart2 = array();
		foreach($chart as $month)
		{
			$temp = array();
			$temp['month'] = $month->{"DATE_FORMAT(datumPosudbe, '%Y-%m-%d')"};
			$temp['count'] = $month->{'COUNT(*)'};
			array_push($chart2, $temp);
		}
		$chart2 = json_encode($chart2);
		return View::make('home', array('data' => $chart2, 'userCount' => $userCount, 'studentBookCount' => $studentBookCount, 'teacherBookCount' => $teacherBookCount, 'activeBorrowCount' => $activeBorrowCount));
	}

}