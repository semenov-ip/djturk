<?
function computeNextTrackData($artist, $track)
{//print_r($artist);
	$data = array(
		'artist'	=> $artist,
		'track'		=> $track,
		'next'		=> 1,
	);

	$getData = http_build_query($data);
	$options = array('http' =>
	array(
		'method' => 'GET',
		'header' => 'Content-type: application/x-www-form-urlencoded',
		'content' => $getData,
	)
	);
	$context = stream_context_create($options);
	$result = file_get_contents('http://djturk-back.herokuapp.com?'.$getData, false, $context);
	$resultArray = json_decode($result, true);
	return $resultArray;
}

function findComposition($request)
{
	$requestArray = explode('-', $request);
	$data = array(
		'artist'	=> $requestArray[0],
		'track'		=> $requestArray[1],
	);

	$getData = http_build_query($data);
	$options = array('http' =>
		array(
			'method' => 'GET',
			'header' => 'Content-type: application/x-www-form-urlencoded',
			'content' => $getData,
		)
	);
	$context = stream_context_create($options);
	$result = file_get_contents('http://djturk-back.herokuapp.com?'.$getData, false, $context);
	$resultArray = json_decode($result, true);
	print_r($resultArray);
	return $resultArray;
}