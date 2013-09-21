<?
require 'src/php/Init.php';
$clearPage = false;
if(isset($_GET['request']))
{
	$requestArray = explode('-', $_GET['request']);
	$output = passthru("python src/python/mixcloud.py '".$requestArray[0]."' '".$requestArray[1]."'");
	setSessionDataBasedOnTheSearchResult($output['author'], $output['composition'], $output['url']);
}
elseif(isset($_GET['prev']))
	setSessionDataForPreviousComposition();
elseif(isset($_GET['next']))
	setSessionDataForNextComposition();
elseif(isset($_GET['skip']))
	setSessionDataForNextCompositionSkip();
else
	$clearPage = true;
?>
<html>
	<head>
		<title>djTurk</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	</head>
	<body>
		<form method="get" action="../index.php">
	<?
		require 'src/php/TopMenu.php';
		if(!$clearPage)
			require 'src/php/PlayersCreation.php';
	?>
		</form>
	</body>
</html>