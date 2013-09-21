<?
function setSessionDataBasedOnTheSearchResult($author, $composition, $url)
{
	$_SESSION['prev_author'] = 'unknown';
	$_SESSION['prev_composition'] = 'unknown';
	$_SESSION['prev_url'] = 'unknown';

	$_SESSION['now_author'] = $author;
	$_SESSION['now_composition'] = $composition;
	$_SESSION['now_url'] = $url;

	$_SESSION['next_author'] = computeNextAuthor($author);
	$_SESSION['next_composition'] = computeNextComposition($composition);
	$_SESSION['next_url'] = computeNextUrl($url);
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

	$_SESSION['now_author'] = computeNextAuthor($_SESSION['now_author']);
	$_SESSION['now_composition'] = computeNextComposition($_SESSION['now_composition']);
	$_SESSION['now_url'] = computeNextUrl($_SESSION['now_url']);

	$_SESSION['next_author'] = computeNextAuthor($_SESSION['now_author']);
	$_SESSION['next_composition'] = computeNextComposition($_SESSION['now_composition']);
	$_SESSION['next_url'] = computeNextUrl($_SESSION['now_url']);
}

function setSessionDataForNextCompositionSkip()
{
	/*$_SESSION['next_author'] = computeNextAuthor($_SESSION['next_author']);
	$_SESSION['next_composition'] = computeNextComposition($_SESSION['next_composition']);
	$_SESSION['next_url'] = computeNextUrl($_SESSION['next_url']);*/

	$_SESSION['next_author'] = computeAnotherNextAuthor($_SESSION['now_author'], $_SESSION['next_author']);
	$_SESSION['next_composition'] = computeAnotherNextComposition($_SESSION['now_composition'], $_SESSION['next_composition']);
	$_SESSION['next_url'] = computeAnotherNextUrl($_SESSION['now_url'], $_SESSION['next_url']);
}