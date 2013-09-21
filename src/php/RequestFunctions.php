<?
function computeNextTrackData($artist, $track)
{
	$data = array(
		'artist'	=> $artist,
		'track'		=> $track,
	);

	$getData = http_build_query($data);
	$options = array('http' =>
	array(
		'method' => 'GET',
		'header' => 'Content-type: application/x-www-form-urlencoded',
		'content' => $getData
	)
	);
	$context = stream_context_create($options);
	$result = file_get_contents('http://djturk-back.herokuapp.com:8080', false, $context);
	print_r($result);
	return $result;
}

function computeNextAuthor($author)
{
	return 'unknown';
}

function computeNextComposition($composition)
{
	return 'unknown';
}

function computeNextUrl($url)
{
	return 'unknown';
}

function computeAnotherNextAuthor($author, $nextAuthor)
{
	return 'unknown';
}

function computeAnotherNextComposition($composition, $nextComposition)
{
	return 'unknown';
}

function computeAnotherNextUrl($url, $nextUrl)
{
	return 'unknown';
}

function findComposition($request)
{
	$requestArray = explode('-', $request);
	//return passthru("python src/python/mixcloud.py '".$requestArray[0]."' '".$requestArray[1]."'");
	$data = array(
		'artist'	=> $requestArray[0],
		'track'		=> $requestArray[1],
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
	$result = file_get_contents('http://djturk-back.herokuapp.com', false, $context);
	print_r($result);
	return $result;
}