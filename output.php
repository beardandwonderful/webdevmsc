<head><script src="http://d3js.org/d3.v3.min.js"></script>

  <style>

  	.axis {
  	  font: 10px sans-serif;
  	}

  	.axis path,
  	.axis line {
  	  fill: none;
  	  stroke: #000;
  	  shape-rendering: crispEdges;
  	}

  	</style>



</head>
<body>
<div  id = "graphhere" class = "col-lg-12 myboxcard"></div>


<script>


var diameter = 400, //max size of the bubbles
color    = d3.scale.category20b(); //color category

var bubble = d3.layout.pack()
.sort(null)
.size([diameter, diameter])
.padding(1.5);

var svg = d3.select("#graphhere")
.append("svg")
.attr("width", diameter)
.attr("height", diameter)
.attr("class", "bubble");

d3.json("traitdata.php", function(error, data){

//convert numerical values from strings to numbers
data = data.map(function(d){ d.value = +d["num"]; return d; });

//bubbles needs very specific format, convert data to this.
var nodes = bubble.nodes({children:data}).filter(function(d) { return !d.children; });

//setup the chart
var bubbles = svg.append("g")
.attr("transform", "translate(0,0)")
.selectAll(".bubble")
.data(nodes)
.enter();

//create the bubbles
bubbles.append("circle")
.attr("r", function(d){ return d.r; })
.attr("cx", function(d){ return d.x; })
.attr("cy", function(d){ return d.y; })
.style("fill", function(d) { return color(d.value); });

//format the text for each bubble
bubbles.append("text")
.attr("x", function(d){ return d.x; })
.attr("y", function(d){ return d.y + 5; })
.attr("text-anchor", "middle")
.text(function(d){ return d["dom_trait"]; })
.style({
    "fill":"white",
    "font-family":"Helvetica Neue, Helvetica, Arial, san-serif",
    "font-size": "12px"
});
})

</script>


</div>

</body>
