<html>
<head>
	<title>PHP Test</title>
</head>
<body>
<?php
echo "<h1>Hello, php!</h1>";
echo getcwd()."\t";
$d = opendir(".");
while (false !== ($f = readdir())) {
    print "$f\n";
    echo "<br >";
    }
closedir();
?>
    
</body>
</html>
