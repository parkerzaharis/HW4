<?php

$page_roles=array('admin');
require_once  'checksession.php';
?>

<html>
	<head>
	<title>Hw 4 User Details</title>
	</head>
		<h1>User Details</h1>
		<a href = 'http://localhost/HW4/user-list.php'>Back to User List</a><br><br>
		<a href='logout.php'>Logout</a><br><br>
		
		<form action= 'http://localhost/HW4/setupusers.php'> <button type = 'submit'> Add a User </button><br><br>
		
	<body>
	
	</body>
</html>

<?php

require_once  'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM user";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 
	$row = $result->fetch_array(MYSQLI_ASSOC); 

echo <<<_END
	<pre>
	id: $row[id]
	username: $row[username]
	forename: $row[forename]
	surname: $row[surname]
	password: $row[password]
	</pre>
	
		<form action='deleteRecord.php' method='post'>
		<input type='hidden' name='delete' value='yes'>
		<input type='hidden' name='id' value='$row[id]'>
		<input type='submit' value='DELETE RECORD'>	
	</form>
	

	
_END;

}

$conn->close();



?>