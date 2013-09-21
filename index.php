<html>
	<head>
		<title>djTurk</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
	</head>
	<body>
<?
	require 'src/php/TopMenu.php';
	if(isset($_GET['request']))
	{
		$requestArray = explode('-', $_GET['request']);
		$output = passthru("python src/python/mixcloud.py '".$requestArray[0]."' '".$requestArray[1]."'");
		echo $output;
	}
?>
	</body>
</html>