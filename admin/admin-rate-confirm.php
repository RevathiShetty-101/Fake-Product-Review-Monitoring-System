<?php 
	$pid='';
	$treview='';
	if(isset($_GET["pid"])){
	$pid = $_GET['pid'];
	$treview = $_GET['treview'];}
	$myfile = fopen("userReview.txt", "w") or die("Unable to open file!");
	$txt = $treview;
	fwrite($myfile, $txt."\n");
	fclose($myfile);

	$python = 'C:\ProgramData\Anaconda3\python.exe';
	$pyscript = 'C:\xampp\htdocs\ita_project\admin\rate.py';

	exec("C:\ProgramData\Anaconda3\python.exe C:\xampp\htdocs\ita_project\admin\rate.py userReview.txt", $output);
	//print_r($output);
	//echo $output[0];
	//$output_array = json_decode($output);
	foreach($output as $row){
		$rating = $row;
	}
	//$rate = $rating[1];
	$rating='';
	$sql = "update products set rating='$rating' where pid='$pid'";
	$conn = mysqli_connect("localhost","root","");
	mysqli_select_db($conn,"ita_database");
	if($conn->query($sql)){
		echo ("<SCRIPT LANGUAGE='JavaScript'> window.alert('Product rating updated!!') window.location.href='admin-rate-product.php'</SCRIPT>");
	}

?>