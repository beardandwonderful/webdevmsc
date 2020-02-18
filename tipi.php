<?php


include('session.php');

$check = $_SESSION['login_user'];
if (!$check)
{header("location: loginpage.php");}


?>
<!DOCTYPE html>
<html>
<head>
	<title>TIPI</title>
	<link rel="stylesheet"
			 href="https://fonts.googleapis.com/css?family=Abel">
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	</script>
<style>
	body, h1 {
		font-family: 'Abel', serif;

	}
</style>





</head>
<body>

<h1>You are participant: <?php echo $login_session; ?></h1>
	<section>

		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center ">
					<h1>Welcome to your TIPI test</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 text-center">
					<p>Welcome to your TIPI test - below is a series of statements. As part of the test you need to select to what extent you agree or disagree with each statement.</p>
					<p>All responses as part of this study are CONFIDENTIAL - and no particpant will be indetifiable by the information they provide - please be as honest as possible with your responses.</p>
				</div>
			</div>

			<form action="tipiadd.php"  method="post" >

<br><br>

<!--using this block repeat -->
<hr>
<div class="form-group row text-center tipibox">
	<div class="col-sm-12">I see myself as enthusiastic and extroverted</H4></div>
</div>
<div class = "form-group row"
<div class="col-sm-12">
	<input class="form-control" max="7" min="1" name="ex1"  step = "0.1" type="range">
</div>
<div class = "form-group row">
	<div class="col-sm-2">Disagree Strongly</div>
	<div class="col-sm-3"></div>
	<div class="col-sm-2 mid">Neither Agree nor Diagree</div>
	<div class="col-sm-3"></div>
	<div class="col-sm-2 rig">Agree Strongly</div>
</div>
<br>
<br>
<hr>
<!--using this block repeat -->
<div class="form-group row text-center tipibox">
	<div class="col-sm-12">I see myself as critical and quarrelsome</H4></div>
</div>
<div class = "form-group row"
<div class="col-sm-12">
	<input class="form-control inv" max="7" min="1" name="ag1" type="range" step = "0.1">
</div>
<div class = "form-group row">
<div class="col-sm-2">Disagree Strongly</div>
<div class="col-sm-3"></div>
<div class="col-sm-2 mid">Neither Agree nor Diagree</div>
<div class="col-sm-3"></div>
<div class="col-sm-2 rig">Agree Strongly</div>
</div>
<br>
<br>
<hr>
<!--using this block repeat -->
<div class="form-group row text-center tipibox">
	<div class="col-sm-12">I see myself as dependable and self disciplined</H4></div>
</div>
<div class = "form-group row"
<div class="col-sm-12">

	<input class="form-control" max="7" min="1" name="con1" type="range" step = "0.1">
</div>

<div class = "form-group row">
<div class="col-sm-2">Disagree Strongly</div>
<div class="col-sm-3"></div>
<div class="col-sm-2 mid">Neither Agree nor Diagree</div>
<div class="col-sm-3"></div>
<div class="col-sm-2 rig">Agree Strongly</div>
</div><br>
<br>
<hr>
<!--using this block repeat -->
<div class="form-group row text-center tipibox">
	<div class="col-sm-12">I see myself as anxious and easily upset</H4></div>
</div>
<div class = "form-group row"
<div class="col-sm-12">
	<input class="form-control inv" max="7" min="1" name="em1" type="range" step = "0.1">
</div>
<div class = "form-group row">
	<div class="col-sm-2">Disagree Strongly</div>
	<div class="col-sm-3"></div>
	<div class="col-sm-2 mid">Neither Agree nor Diagree</div>
	<div class="col-sm-3"></div>
	<div class="col-sm-2 rig">Agree Strongly</div>
</div>
<br>
<br>
<hr>
<!--using this block repeat -->
				<div class="form-group row text-center tipibox">
					<div class="col-sm-12">I see myself as complex and open to new experiences</H4></div>
				</div>
				<div class = "form-group row"
				<div class="col-sm-12">

					<input class="form-control" max="7" min="1" name="op1" type="range" step = "0.1">
				</div>

			<div class = "form-group row">
				<div class="col-sm-2">Disagree Strongly</div>
				<div class="col-sm-3"></div>
				<div class="col-sm-2 mid">Neither Agree nor Diagree</div>
				<div class="col-sm-3"></div>
				<div class="col-sm-2 rig">Agree Strongly</div>
			</div>
			<br>
			<br>
<hr>
<!--using this block repeat -->
<div class="form-group row text-center tipibox">
	<div class="col-sm-12 ">I see myself as reserved and quiet</H4></div>
</div>
<div class = "form-group row"
<div class="col-sm-12">

	<input class="form-control inv" max="7" min="1" name="ex2" type="range" step = "0.1">
</div>

<div class = "form-group row">
<div class="col-sm-2">Disagree Strongly</div>
<div class="col-sm-3"></div>
<div class="col-sm-2 mid">Neither Agree nor Diagree</div>
<div class="col-sm-3"></div>
<div class="col-sm-2 rig">Agree Strongly</div>
</div>
<br>
<br>
<hr>
<!--using this block repeat -->
<div class="form-group row text-center tipibox">
	<div class="col-sm-12">I see myself as sympathetic and warm</H4></div>
</div>
<div class = "form-group row"
<div class="col-sm-12 rig">

	<input class="form-control" max="7" min="1" name="ag2" type="range" step = "0.1">
</div>

<div class = "form-group row">
<div class="col-sm-2">Disagree Strongly</div>
<div class="col-sm-3"></div>
<div class="col-sm-2 mid">Neither Agree nor Diagree</div>
<div class="col-sm-3"></div>
<div class="col-sm-2 rig">Agree Strongly</div>
</div><br>
<br>
<hr>
<!--using this block repeat -->
<div class="form-group row text-center tipibox">
	<div class="col-sm-12">I see myself as disorganised and careless</H4></div>
</div>
<div class = "form-group row"
<div class="col-sm-12">

	<input class="form-control inv" max="7" min="1" name="con2" type="range" step = "0.1">
</div>

<div class = "form-group row">
<div class="col-sm-2">Disagree Strongly</div>
<div class="col-sm-3"></div>
<div class="col-sm-2 mid">Neither Agree nor Diagree</div>
<div class="col-sm-3"></div>
<div class="col-sm-2 rig">Agree Strongly</div>
</div><br>
<br>
<hr>
<!--using this block repeat -->
<div class="form-group row text-center tipibox">
	<div class="col-sm-12">I see myself as calm and emotionally stable</H4></div>
</div>
<div class = "form-group row"
<div class="col-sm-12">

	<input class="form-control" max="7" min="1" name="em2" type="range" step = "0.1">
</div>

<div class = "form-group row">
<div class="col-sm-2">Disagree Strongly</div>
<div class="col-sm-3"></div>
<div class="col-sm-2 mid">Neither Agree nor Diagree</div>
<div class="col-sm-3"></div>
<div class="col-sm-2 rig">Agree Strongly</div>
</div>
<br>
<br>
<hr>
<!--using this block repeat -->
<div class="form-group row text-center tipibox">
	<div class="col-sm-12">I see myself as conventional and uncreative</H4></div>
</div>
<div class = "form-group row"
<div class="col-sm-12">

	<input class="form-control inv" max="7" min="1" name="op2" type="range" step = "0.1">
</div>

<div class = "form-group row">
<div class="col-sm-2">Disagree Strongly</div>
<div class="col-sm-3"></div>
<div class="col-sm-2 mid">Neither Agree nor Diagree</div>
<div class="col-sm-3"></div>
<div class="col-sm-2 rig">Agree Strongly</div>
</div>


<br><br>


						<div class="form-group row">
					<div class="col-sm-12 ">
						<input class="btn btn-primary btn-block " id="mysub" type="submit" value="Submit your responses">
					</div>
				</div>

			</form>
</div>
		</div>
	</section>
</body>
</html>
</html>
