<?php

class DashboardController extends BaseController {

	public function Home()
	{
		$userCount = User::count();
		$studentBookCount = Book::where('tip', 'K')->count();
		$teacherBookCount = Book::where('tip', 'N')->count();
		$activeBorrowCount = Borrow::where('DatumVracanja', null)->count();
		$AVCount = AV::count();

		//Code for chart
		$chart = DB::table('posudbe')->select(DB::raw("MONTH(datumPosudbe), YEAR(datumPosudbe), DATE_FORMAT(datumPosudbe, '%Y-%m'), COUNT(*)"))->groupBy('MONTH(datumPosudbe)', 'YEAR(datumPosudbe)')->orderBy('datumPosudbe', 'DESC')->get();
		$chart2 = array();
		foreach($chart as $month)
		{
			$temp = array();
			$temp['day'] = $month->{"DATE_FORMAT(datumPosudbe, '%Y-%m')"};
			$temp['count'] = $month->{'COUNT(*)'};
			array_push($chart2, $temp);
		}
		$chart2 = json_encode($chart2);
		
		return View::make('home', array('data' => $chart2, 'userCount' => $userCount, 'studentBookCount' => $studentBookCount, 'teacherBookCount' => $teacherBookCount, 'activeBorrowCount' => $activeBorrowCount, 'AVCount' => $AVCount));
	}

}
