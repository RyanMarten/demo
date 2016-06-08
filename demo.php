<html>
<head>
	<title>Demo Code</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js" type="text/javascript" ></script>
	<script src="js.js" type="text/javascript" ></script>
	<link rel="stylesheet" type='text/css' href="css.css">
</head>
<body>
<h1> Testing Databases and PHP </h1>
<!-- means this file is the one used to POST -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<label>Name: <input type="text" name="name"></label>
<label>Email: <input type="text" name="email"></label>
<button type="submit">submit</button>
</form>
<!-- Shows that data from the form is recieved by PHP -->
<h5>
<?php 
$user = 'root';
$pass = '';
$db = 'demo';

mysql_connect('localhost', $user, $pass, $db) or die("Unable to connect");
mysql_select_db('demo');

echo "<p>Connection successfuly made to MariaDB</p>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field (more security can be put here)
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    if (!(empty($name))) {
       echo '<p>Your name is: ' . $name . '</p>';
       if (!(empty($email))) {
    	echo '<p>Your email is: ' . $email . '</p>';
    		mysql_query("INSERT INTO `students` (`name`, `email`) VALUES ('" . $name . "', '" . $email . "')") or die("Failed to query database: ". mysql_error()); 
    	}
    }
    
}




?>
</h5>
<table>
<caption>Table `students` in dataset `demo`</caption>
		<tr class="border-bottom">
			<th>Name</th><th>Email</th>
		</tr>
<?php
	
	$result = mysql_query("select * from students") or die("Failed to query database: ". mysql_error());
	if (mysql_num_rows($result) > 0) {
    // output data of each row
    while($row = mysql_fetch_assoc($result)) {
        echo "<tr class=\"border-bottom\"><td>" . $row["name"]. "</td><td>" . $row["email"]."</td></tr>";
    }
} else {
    echo "0 results";
}
	
?>
</table>
</body>
</html>

