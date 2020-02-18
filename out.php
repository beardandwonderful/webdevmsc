<?php
include 'dbconfig.php';
include('session.php');
$check = $_SESSION['login_user'];
if (!$check)
{header("location: loginpage.php");}
$result = mysqli_query($conn, "SELECT * FROM q where id='0'");
$row = mysqli_fetch_array($result);
$genderchoice =$row['gender'];
$personality =$row['personality'];
$maresult = mysqli_query($conn, "SELECT *  FROM participants where gender = 'male'");
$feresult = mysqli_query($conn, "SELECT *  FROM participants where gender = 'female'");
$allresult = mysqli_query($conn, "SELECT *  FROM participants ");
$mnum_rows = mysqli_num_rows($maresult);
$fnum_rows = mysqli_num_rows($feresult);
$allnum_rows = mysqli_num_rows($allresult);
?>
<head>
  <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Abel">
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/custom.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <!-- //submitting query and storing for later use -->
  <script>
  function updategender()
  {
    var genderchoice=document.querySelector('input[name="gender"]:checked').value;
    var personality= document.querySelector('input[name="personalityq"]:checked').value;
    $.ajax({
      type: 'post',
      url: 'qup.php',
      data: {
        genderchoice:genderchoice,
        personality:personality,
      },
      success: function (resp){  $("#viewhere").load("checktest.php");
      $('#gender1').load("gendergraph.php");
      $('#pers1').load("tipitable.php");
      $('#anal1').load("analysis.php");
    }
  });
}
</script>
<!-- <script>
function getnew(){
d3.json("traitdata.php", function (data){
var svg = d3.select("#personalitygraph")
.append("svg")
.attr("width", 250)//the width value goes here
.attr("height", 200)
.style("font-size", "8px")
.attr("transform", "rotate(-90)" );;//the height value goes here
svg.selectAll("rect")
.data(data)
.enter()
.append("rect")
.attr("width", function (d) {return d.num *15;})
.attr("height", 40)
.attr("y", function (d,i) {return i * 50;})
.attr("fill", "w");
svg.selectAll("text")
.data(data)
.enter()
.append("text")
.attr("fill", "white")
.attr("y", function (d,i) {return i * 50+15;})
.text(function (d) {return d.dom_trait;})
});
};
</script> -->
</head>
<body>
  <section>
    <div class="container">
      <div class = "row">
        <div class = "col-sm-4 studybox">
          <div class="row">
            <div class="col-sm-12 text-center ">
              <h4>Filter by gender</h4><br>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4 text-center "> All </div>
            <div class="col-sm-4 text-center ">Male </div>
            <div class="col-sm-4 text-center "> Female </div>
          </div>
          <div class="row">
            <div class="col-sm-4 text-center ">  <input type="radio" id="g1" name="gender" value = "x"  onClick=" updategender(); " checked  ></div>
            <div class="col-sm-4 text-center "> <input type="radio" id="g2" name="gender" value = "male"  onClick=" updategender();   "  > </div>
            <div class="col-sm-4 text-center ">  <input type="radio" id="g3" name="gender" value = "female"  onClick=" updategender(); "  ></div>
          </div>
          <br>
        </div>
        <div class = "col-sm-8 studybox">
          <div class="row">
            <div class="col-sm-12 text-center ">
              <h4>Filter by Dominant Personality Type</h4><br>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2 text-center ">All</div>
            <div class="col-sm-2 text-center ">Extroversion</div>
            <div class="col-sm-2 text-center ">Agreeableness</div>
            <div class="col-sm-2 text-center ">Conscientiousness</div>
            <div class="col-sm-2 text-center ">Emotional</div>
            <div class="col-sm-2 text-center ">Openness</div>
          </div>
          <div class="row">
            <div class="col-sm-2 text-center ">  <input type="radio" id="p" name="personalityq" value = "x"  onClick="updategender()" checked ></div>
            <div class="col-sm-2 text-center ">  <input type="radio" id="p" name="personalityq" value = "EXTROVERSION"  onClick="updategender()"  ></div>
            <div class="col-sm-2 text-center ">  <input type="radio" id="p" name="personalityq" value = "AGREEABLENESS"  onClick="updategender()"  ></div>
            <div class="col-sm-2 text-center ">  <input type="radio" id="p" name="personalityq" value = "CONSCIENTIOUSNESS"  onClick="updategender()"  ></div>
            <div class="col-sm-2 text-center ">  <input type="radio" id="p" name="personalityq" value = "EMOTIONAL"  onClick="updategender()"  ></div>
            <div class="col-sm-2 text-center ">  <input type="radio" id="p" name="personalityq" value = "OPENNESS"  onClick="updategender()"  ></div>
          </div>
          <br>
        </div>
      </div>
      <!-- below is main content section -->
      <div class = "row">
        <!-- graphs live here -->
        <div class = "col-sm-4">
          <div class = "row">
            <div class = "col-sm-12" >
              <div id = "gender1">  <?php include 'gendergraph.php'; ?> </div>
            </div></div>
            <div class = "row">
              <div class = "col-sm-12" >
                <div id = "pers1">  <?php include 'tipitable.php'; ?> </div>
              </div></div>
              <div class = "row">
                <div class = "col-sm-12" >
                  <div id = "anal1">  <?php include 'analysis.php'; ?> </div>
                </div></div>
                <div>
                </div>
                <!-- first graph row  -->
                <div class = "row">
                  <div class = "col-sm-12" id = "personalitygraph">
                    <script src="http://d3js.org/d3.v3.min.js"></script>
                    <script>
                    d3.json("traitdata.php", function (data){
                      var svg = d3.select("#personalitygraph")
                      .append("svg")
                      .attr("width", 250)//the width value goes here
                      .attr("height", 200)
                      .style("font-size", "8px")
                      .attr("transform", "rotate(-90)" );;//the height value goes here
                      svg.selectAll("rect")
                      .data(data)
                      .enter()
                      .append("rect")
                      .attr("width", function (d) {return d.num *15;})
                      .attr("height", 40)
                      .attr("y", function (d,i) {return i * 50;})
                      .attr("fill", "w");
                      svg.selectAll("text")
                      .data(data)
                      .enter()
                      .append("text")
                      .attr("fill", "white")
                      .attr("y", function (d,i) {return i * 50+15;})
                      .text(function (d) {return d.dom_trait;})
                    })
                    </script>
                  </div></div>
                  <div class = "row">
                    <div class = "col-sm-12" id = ""><script src="http://d3js.org/d3.v3.min.js"></script>
                    </div>
                  </div>
                </div>
                <div class = "col-sm-8">
                  <div id = "viewhere"><?php  include 'checktest.php';?></div>
                </div>
              </div>
            </section>
          </body>
