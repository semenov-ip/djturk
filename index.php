<?
require 'src/php/Init.php';
$clearPage = false;
if(isset($_GET['request']))
{
	$output = findComposition($_GET['request']);
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
		<div style="margin-left: 650px; margin-top: 50px; width: 800px">
		<a class="twitter-timeline" data-dnt="true" href="https://twitter.com/search?q=%23dj" data-widget-id="381353011756285952">"#dj"</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div>
	</body>
</html>