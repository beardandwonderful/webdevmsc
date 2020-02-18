<?php

if( isset($_POST['genderchoice']) )
{
$genderchoice= $_POST['genderchoice'];
}








include 'dbconfig.php';

//prepare my banner images

if (!isset($genderchoice)){
$result = mysqli_query($conn, "SELECT b.dom_trait,COUNT(*) as num FROM participants a, tipi b WHERE a.participant_ID = b.participant_ID  group by b.dom_trait");
//$result = mysqli_query($conn, 'SELECT b.dom_trait, count(b.dom_trait)   FROM participants a, tipi b WHERE a.participant_ID = b.participant_ID  group by b.dom_trait');
if (!$result)
{
	$error = 'Error fetching data: ' . mysqli_error($link);
	include 'error.html.php';
	exit();
}


$data = array();
    for ($x = 0; $x < mysqli_num_rows($result); $x++) {
        $data[] = mysqli_fetch_assoc($result);
    }

    echo json_encode($data);}

		else {
			$result = mysqli_query($conn, "SELECT dom_trait, COUNT(*) as num FROM participants  WHERE gender = '$genderchoice'  group by dom_trait");
			if (!$result)
			{
				$error = 'Error fetching data: ' . mysqli_error($link);
				include 'error.html.php';
				exit();
			}


			$data = array();
			    for ($x = 0; $x < mysqli_num_rows($result); $x++) {
			        $data[] = mysqli_fetch_assoc($result);
			    }

			    echo json_encode($data);


    }

?>
