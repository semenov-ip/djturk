<?
function getCurrentAuthor()
{
	return isset($_SESSION['now_author']) ? $_SESSION['now_author'] : 'unknown';
}

function getCurrentComposition()
{
	return isset($_SESSION['now_composition']) ? $_SESSION['now_composition'] : 'unknown';
}

function getCurrentUrl()
{
	return isset($_SESSION['now_url']) ? $_SESSION['now_url'] : 'unknown';
}

function getPreviousAuthor()
{
	return isset($_SESSION['prev_author']) ? $_SESSION['prev_author'] : 'unknown';
}

function getPreviousComposition()
{
	return isset($_SESSION['prev_composition']) ? $_SESSION['prev_composition'] : 'unknown';
}

function getPreviousUrl()
{
	return isset($_SESSION['prev_url']) ? $_SESSION['prev_url'] : 'unknown';
}

function getNextAuthor()
{
	return isset($_SESSION['next_author']) ? $_SESSION['next_author'] : 'unknown';
}

function getNextComposition()
{
	return isset($_SESSION['next_composition']) ? $_SESSION['next_composition'] : 'unknown';
}

function getNextUrl()
{
	return isset($_SESSION['next_url']) ? $_SESSION['next_url'] : 'unknown';
}