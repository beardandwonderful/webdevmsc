<?php

//include connection to database
include 'dbconfig.php';
//return query results submitted by users to the database query table
$result = mysqli_query($conn, "SELECT * FROM Q where id='0'");
//return an error if no result is available
if (!$result)
{
	$error = 'Error fetching data: ' . mysqli_error($link);
	include 'error.html.php';
	exit();
}

$row = mysqli_fetch_array($result);
$genderchoice =$row['gender'];
$personality =$row['personality'];

//this section is checking to see if only a gender choice was submitted to the database query - innterjoins are used to retrieve data from multiple tables
if ($row['personality']=="x"){
	$test = mysqli_query($conn, "SELECT *  FROM style t2 inner join participants t1 on t1.participant_ID = t2.participant_ID where t1.gender ='$genderchoice'" );
	$butresult = mysqli_query($conn, "SELECT *, COUNT(*) as num FROM style t2 inner join participants t1 on t1.participant_ID = t2.participant_ID where t1.gender ='$genderchoice' group by buttontype ORDER by num DESC" );
	$loresult = mysqli_query($conn, "SELECT *, COUNT(*) as num FROM style t2 inner join participants t1 on t1.participant_ID = t2.participant_ID where t1.gender ='$genderchoice' group by layout ORDER by num DESC" );
	$cenresult = mysqli_query($conn, "SELECT *, COUNT(*) as num FROM style t2 inner join participants t1 on t1.participant_ID = t2.participant_ID where t1.gender ='$genderchoice' group by contcen ORDER by num DESC" );
	$ulresult = mysqli_query($conn, "SELECT *, COUNT(*) as num FROM style t2 inner join participants t1 on t1.participant_ID = t2.participant_ID where t1.gender ='$genderchoice' group by buttonul ORDER by num DESC" );


}

else
//this section is checking to see if only a personality trait choice was submitted to the database query
if ($row['gender']=="x"){
	$test = mysqli_query($conn, "SELECT *  FROM style t2 inner join participants t1 on t1.participant_ID = t2.participant_ID where t1.dom_trait ='$personality'" );
	$butresult = mysqli_query($conn, "SELECT *, COUNT(*) as num FROM style t2 inner join participants t1 on t1.participant_ID = t2.participant_ID where t1.dom_trait ='$personality' group by buttontype ORDER by num DESC" );
	$loresult = mysqli_query($conn, "SELECT *, COUNT(*) as num FROM style t2 inner join participants t1 on t1.participant_ID = t2.participant_ID where t1.dom_trait ='$personality' group by layout ORDER by num DESC" );
	$cenresult = mysqli_query($conn, "SELECT *, COUNT(*) as num FROM style t2 inner join participants t1 on t1.participant_ID = t2.participant_ID where t1.dom_trait ='$personality' group by contcen ORDER by num DESC" );
	$ulresult = mysqli_query($conn, "SELECT *, COUNT(*) as num FROM style t2 inner join participants t1 on t1.participant_ID = t2.participant_ID where t1.dom_trait ='$personality' group by buttonul ORDER by num DESC" );
}

else
//otherwise a value exists for both and a query is run
if (($row['gender']!=="x")&&($row['personality']!=="x")){
	$test = mysqli_query($conn, "SELECT *  FROM style t2 inner join participants t1 on t1.participant_ID = t2.participant_ID where t1.dom_trait ='$personality' AND t1.gender ='$genderchoice'" );
	$butresult = mysqli_query($conn, "SELECT *, COUNT(*) as num FROM style t2 inner join participants t1 on t1.participant_ID = t2.participant_ID where t1.dom_trait ='$personality' AND t1.gender ='$genderchoice' group by buttontype ORDER by num DESC" );
	$loresult = mysqli_query($conn, "SELECT *, COUNT(*) as num FROM style t2 inner join participants t1 on t1.participant_ID = t2.participant_ID where t1.dom_trait ='$personality' AND t1.gender ='$genderchoice' group by layout ORDER by num DESC" );
	$cenresult = mysqli_query($conn, "SELECT *, COUNT(*) as num FROM style t2 inner join participants t1 on t1.participant_ID = t2.participant_ID where t1.dom_trait ='$personality' AND t1.gender ='$genderchoice' group by contcen ORDER by num DESC" );
	$ulresult = mysqli_query($conn, "SELECT *, COUNT(*) as num FROM style t2 inner join participants t1 on t1.participant_ID = t2.participant_ID where t1.dom_trait ='$personality' group by buttonul ORDER by num DESC" );
}
else
$test = mysqli_query($conn, "SELECT *  FROM style" );

//here values returned are sorted into arrays - this is to help with for each statements for colour averaging
$rowcount=mysqli_num_rows($test);
if ($rowcount>0){
	//while results exist (so if users have submitted data)
	while ($row = mysqli_fetch_array($test))
	{
		$rgbout[] = array('bcr' => $row['bcr'], 'bcg' => $row['bcg'], 'bcb' => $row['bcb']   );
		$rgbbordout[] = array('bbr' => $row['bbr'], 'bbg' => $row['bbg'], 'bbb' => $row['bbb']   );
		$rgbfontout[] = array('fcr' => $row['fcr'], 'fcg' => $row['fcg'], 'fcb' => $row['fcb']   );
		$rgbbannerout[] = array('bancr' => $row['bancr'], 'bancg' => $row['bancg'], 'bancb' => $row['bancb']   );
		$rgbnavout[] = array('navcr' => $row['navcr'], 'navcg' => $row['navcg'], 'navcb' => $row['navcb']   );
		$rgbbodout[] = array('bodcr' => $row['bodcr'], 'bodcg' => $row['bodcg'], 'bodcb' => $row['bodcb']   );
		$rgbbgout[] = array('bgr' => $row['bgr'], 'bgg' => $row['bgg'], 'bgb' => $row['bgb']   );
	}

	//the following sections are retrieveing the individual rgb elements, averaging them and then creating a new rgb value
	$rsquare = 0;
	$gsquare = 0;
	$bsquare = 0;
	foreach($rgbout as $rgbout):
		$rsquare = ($rsquare + ( $rgbout['bcr']* $rgbout['bcr'])/$rowcount);
		$gsquare = ($gsquare + ( $rgbout['bcg']* $rgbout['bcg'])/$rowcount);
		$bsquare = ($bsquare + ( $rgbout['bcb']* $rgbout['bcb'])/$rowcount);
	endforeach;
	$buttoncol = "rgb(".round(sqrt($rsquare)).",".round(sqrt($gsquare)).",".round(sqrt($bsquare)).")";



	$bordrsquare = 0;
	$bordgsquare = 0;
	$bordbsquare = 0;
	foreach($rgbbordout as $rgbbordout):
		$bordrsquare = ($bordrsquare + ( $rgbbordout['bbr']* $rgbbordout['bbr'])/$rowcount);
		$bordgsquare = ($bordgsquare + ( $rgbbordout['bbg']* $rgbbordout['bbg'])/$rowcount);
		$bordbsquare = ($bordbsquare + ( $rgbbordout['bbb']* $rgbbordout['bbb'])/$rowcount);
	endforeach;
	$buttonbordercol = "rgb(".round(sqrt($bordrsquare)).",".round(sqrt($bordgsquare)).",".round(sqrt($bordbsquare)).")";



	$fontrsquare = 0;
	$fontgsquare = 0;
	$fontbsquare = 0;
	foreach($rgbfontout as $rgbfontout):
		$fontrsquare = ($fontrsquare + ( $rgbfontout['fcr']* $rgbfontout['fcr'])/$rowcount);
		$fontgsquare = ($fontgsquare + ( $rgbfontout['fcg']* $rgbfontout['fcg'])/$rowcount);
		$fontbsquare = ($fontbsquare + ( $rgbfontout['fcb']* $rgbfontout['fcb'])/$rowcount);
	endforeach;
	$buttonfontcol = "rgb(".round(sqrt($fontrsquare)).",".round(sqrt($fontgsquare)).",".round(sqrt($fontbsquare)).")";


	$banrsquare = 0;
	$bangsquare = 0;
	$banbsquare = 0;
	foreach($rgbbannerout as $rgbbannerout):
		$banrsquare = ($banrsquare + ( $rgbbannerout['bancr']* $rgbbannerout['bancr'])/$rowcount);
		$bangsquare = ($bangsquare + ( $rgbbannerout['bancg']* $rgbbannerout['bancg'])/$rowcount);
		$banbsquare = ($banbsquare + ( $rgbbannerout['bancb']* $rgbbannerout['bancb'])/$rowcount);
	endforeach;
	$bannercol = "rgb(".round(sqrt($banrsquare)).",".round(sqrt($bangsquare)).",".round(sqrt($banbsquare)).")";

	$navrsquare = 0;
	$navgsquare = 0;
	$navbsquare = 0;
	foreach($rgbnavout as $rgbnavout):
		$navrsquare = ($navrsquare + ( $rgbnavout['navcr']* $rgbnavout['navcr'])/$rowcount);
		$navgsquare = ($navgsquare + ( $rgbnavout['navcg']* $rgbnavout['navcg'])/$rowcount);
		$navbsquare = ($navbsquare + ( $rgbnavout['navcb']* $rgbnavout['navcb'])/$rowcount);
	endforeach;
	$navcol = "rgb(".round(sqrt($navrsquare)).",".round(sqrt($navgsquare)).",".round(sqrt($navbsquare)).")";

	$bodrsquare = 0;
	$bodgsquare = 0;
	$bodbsquare = 0;
	foreach($rgbbodout as $rgbbodout):
		$bodrsquare = ($bodrsquare + ( $rgbbodout['bodcr']* $rgbbodout['bodcr'])/$rowcount);
		$bodgsquare = ($bodgsquare + ( $rgbbodout['bodcg']* $rgbbodout['bodcg'])/$rowcount);
		$bodbsquare = ($bodbsquare + ( $rgbbodout['bodcb']* $rgbbodout['bodcb'])/$rowcount);
	endforeach;
	$bodycol = "rgb(".round(sqrt($bodrsquare)).",".round(sqrt($bodgsquare)).",".round(sqrt($bodbsquare)).")";

	$brsquare = 0;
	$bgsquare = 0;
	$bbsquare = 0;
	foreach($rgbbgout as $rgbbgout):
		$brsquare = ($brsquare + ( $rgbbgout['bgr']* $rgbbgout['bgr'])/$rowcount);
		$bgsquare = ($bgsquare + ( $rgbbgout['bgg']* $rgbbgout['bgg'])/$rowcount);
		$bbsquare = ($bbsquare + ( $rgbbgout['bgb']* $rgbbgout['bgb'])/$rowcount);
	endforeach;
	$bgcol = "rgb(".round(sqrt($brsquare)).",".round(sqrt($bgsquare)).",".round(sqrt($bbsquare)).")";
}

$browa = mysqli_fetch_assoc($butresult);
?>
<!-- table for displaying the returned data -->
<div class = "row">
	<div class = "col-sm-12" id = "gender">
		<table class="table">
			<caption>Data analysis</caption>
			<thead>
				<tr>
					<th>Field</th>
					<th>Majority Response</th>
				

				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Button Type </td>
					<td><?php if ($browa['buttontype'] == '1'){echo "Simplest";}else if ($browa['buttontype'] == '2'){echo "Simple";}else if
					($browa['buttontype'] == '3'){echo "Normal";}else if ($browa['buttontype'] == '4'){echo "Rounded";} ?></td>
				</tr>
				<tr>
					<td>Button Fill </td>
					<td><?php if (($rsquare>$bsuare)&&($gsquare<16129)) {echo "Warm";} ELSE {echo "Cold";}     ?></td>
				</tr>
				<tr>
					<td>Button Border </td>
					<td><?php if (($bordrsquare>$bordbsquare)&&($bordgsquare<16129)) {echo "Warm";} ELSE {echo "Cold";}     ?></td>
				</tr>

				<tr>
					<td>Button font </td>
					<td><?php if (($fontrsquare>$fontbsquare)&&($fontgsquare<16129)) {echo "Warm";} ELSE {echo "Cold";}     ?></td>
				</tr>
				<tr>
					<td>Banner Col </td>
					<td><?php if (($banrsquare>$banbsquare)&&($bangsquare<16129)) {echo "Warm";} ELSE {echo "Cold";}     ?></td>
				</tr>
				<tr>
					<td>Nav Col </td>
					<td><?php if (($navrsquare>$navbsquare)&&($navgsquare<16129)) {echo "Warm";} ELSE {echo "Cold";}     ?></td>
				</tr>
				<tr>
					<td>Body Col </td>
					<td><?php if (($bodrsquare>$bodbsquare)&&($bodgsquare<16129)) {echo "Warm";} ELSE {echo "Cold";}     ?></td>
				</tr>
				<tr>
					<td>BG Col </td>
					<td><?php if (($brsquare>$bbsquare)&&($bgsquare<16129)) {echo "Warm";} ELSE {echo "Cold";}     ?></td>
				</tr>

			</tbody>
		</table>
	</div></div>
