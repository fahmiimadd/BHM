<?php   
use Carbon\Carbon; 
use Carbon\CarbonPeriod; 
use App\siswa;

function dataReport($start,$end) {
$data =	DB::table('attr_pembayaran_siswa')
	->join('siswas', function ($join) use ($start,$end){
		$join->on('attr_pembayaran_siswa.siswa_id_siswa', '=', 'siswas.id_siswa')
			 ->where('attr_pembayaran_siswa.status', '=', 1)->whereBetween('attr_pembayaran_siswa.updated_at', [$start, $end]);
	})->join('attr_pembayarans','attr_pembayaran_siswa.attr_pembayaran_id_pembayaran', '=', 'attr_pembayarans.id_pembayaran')
	->select('siswas.nis','siswas.namaSiswa','attr_pembayarans.namaAttr','attr_pembayaran_siswa.updated_at')->get();
return $data;
}

function getDatesOfWeek() {
	$dates[0] = Carbon::parse("last monday");
	for ($i=1; $i < 7; $i++) { 
		$dates[$i] = Carbon::parse("last monday");
		$dates[$i]->addDays($i);
	}
	return $dates;
}

function returnDates($fromdate, $todate) {
	$dateArray = array();
    $fromdate = \DateTime::createFromFormat('Y-m-d H:i:s', $fromdate);
    $todate = \DateTime::createFromFormat('Y-m-d H:i:s', $todate);
    $period = new \DatePeriod(
        $fromdate,
        new \DateInterval('P1D'),
        $todate->modify('+1 day')
	);
	foreach ($period as $values) {
		$value = $values->format('Y-m-d');
		$carbonValue = Carbon::createFromFormat('Y-m-d',$value);
		array_push($dateArray, $carbonValue);
	}
	return $dateArray;
}

function getReportTotal(){
	$mount = DB::table('attr_pembayaran_siswa')->where('status',1)->get();
	$totalamount = 0;
	foreach ($mount as $value) {
		$jumlah = DB::table('attr_pembayarans')->where('id_pembayaran',$value->attr_pembayaran_id_pembayaran)->first()->jumlah;
		$totalamount = $totalamount + $jumlah;
	}
	return 	$totalamount;
}

function getReportDay($rawTime){
	$time = $rawTime->format("Y-m-d");
	$mount = DB::table('attr_pembayaran_siswa')->where('status',1)->get();
	$totalamount = 0;
	foreach ($mount as $value) {

		
		$myDate = new Carbon($value->updated_at);
		if ($time == $myDate->format("Y-m-d")) {
			$jumlah = DB::table('attr_pembayarans')->where('id_pembayaran',$value->attr_pembayaran_id_pembayaran)->first()->jumlah;
			$totalamount = $totalamount + $jumlah;
		} else {

		} 
	}	
	return 	$totalamount;
}

function mountRange($start,$end) {
	$jumlah = 0;
	$data =	DB::table('attr_pembayaran_siswa')
		->join('siswas', function ($join) use ($start,$end){
			$join->on('attr_pembayaran_siswa.siswa_id_siswa', '=', 'siswas.id_siswa')
				 ->where('attr_pembayaran_siswa.status', '=', 1)->whereBetween('attr_pembayaran_siswa.updated_at', [$start, $end]);
		})->join('attr_pembayarans','attr_pembayaran_siswa.attr_pembayaran_id_pembayaran', '=', 'attr_pembayarans.id_pembayaran')
		->select('attr_pembayarans.jumlah')->get();

	foreach ($data as $value) {
			$jumlah = $jumlah + $value->jumlah;
	}
	return $jumlah;
}




?>