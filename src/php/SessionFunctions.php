<?
function setSessionDataBasedOnTheSearchResult($author, $composition, $url)
{
	$_SESSION['prev_author'] = 'unknown';
	$_SESSION['prev_composition'] = 'unknown';
	$_SESSION['prev_url'] = 'unknown';

	$_SESSION['now_author'] = $author;
	$_SESSION['now_composition'] = $composition;
	$_SESSION['now_url'] = $url;

	$result = computeNextTrackData($author, $composition);

	$_SESSION['next_author'] = $result['author'];
	$_SESSION['next_composition'] = $result['composition'];
	$_SESSION['next_url'] = $result['url'];
}

function setSessionDataForPreviousComposition()
{
	$_SESSION['prev_author'] = 'unknown';
	$_SESSION['prev_composition'] = 'unknown';
	$_SESSION['prev_url'] = 'unknown';

	$_SESSION['now_author'] = $_SESSION['prev_author'];
	$_SESSION['now_composition'] = $_SESSION['prev_composition'];
	$_SESSION['now_url'] = $_SESSION['prev_url'];

	$_SESSION['next_author'] = $_SESSION['now_author'];
	$_SESSION['next_composition'] = $_SESSION['now_composition'];
	$_SESSION['next_url'] = $_SESSION['now_url'];
}

function setSessionDataForNextComposition()
{
	$_SESSION['prev_author'] = $_SESSION['now_author'];
	$_SESSION['prev_composition'] = $_SESSION['now_composition'];
	$_SESSION['prev_url'] = $_SESSION['now_url'];

	$result = computeNextTrackData($_SESSION['now_author'], $_SESSION['now_composition']);
	$_SESSION['now_author'] = $result['author'];
	$_SESSION['now_composition'] = $result['composition'];
	$_SESSION['now_url'] = $result['url'];

	$result = computeNextTrackData($_SESSION['now_author'], $_SESSION['now_composition']);
	$_SESSION['next_author'] = $result['author'];
	$_SESSION['next_composition'] = $result['composition'];
	$_SESSION['next_url'] = $result['url'];
}

function setSessionDataForNextCompositionSkip()
{
	$result = computeNextTrackData($_SESSION['next_author'], $_SESSION['next_composition']);
	$_SESSION['next_author'] = $result['author'];
	$_SESSION['next_composition'] = $result['composition'];
	$_SESSION['next_url'] = $result['url'];
/*
	$_SESSION['next_author'] = computeAnotherNextAuthor($_SESSION['now_author'], $_SESSION['next_author']);
	$_SESSION['next_composition'] = computeAnotherNextComposition($_SESSION['now_composition'], $_SESSION['next_composition']);
	$_SESSION['next_url'] = computeAnotherNextUrl($_SESSION['now_url'], $_SESSION['next_url']);*/
}