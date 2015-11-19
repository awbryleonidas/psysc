<?php
if (isset($_POST['submit']))
{
	define('BASEPATH', __FILE__);
	include('../application/config/database.php');
	$db = $db[$active_group];

	$con = mysqli_connect($db['hostname'], $db['username'], $db['password'], $db['database']);

	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	else
	{
		$sql = file_get_contents('database.sql');
		if (!$sql){
			die ('Error opening file');
		}

		mysqli_multi_query($con, $sql);
		
		do {
			if ($result = mysqli_store_result($con))
			{
				mysqli_free_result($result);
			}
		} while(mysqli_next_result($con));

		if (mysqli_error($con)) 
		{
			die(mysqli_error($con));
		}

		echo 'DONE.  Please remove the "install" folder.';
		$con->close();
	}
}
else
{
	echo '<p>This will install the core database tables.  Be sure to configure <strong>application/config/database.php</strong> properly. </p>';
	echo '<form method="POST" action="' . $_SERVER['PHP_SELF'] . '">';
	echo '<input type="submit" name="submit" value="Install Now" />';
	echo '</form>';
}