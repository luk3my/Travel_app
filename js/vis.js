(function() {
  var margin = {top: 50, left:50, right:50, bottom: 50},
    height = 400 - margin.top - margin.bottom,
    width = 800 - margin.left - margin.right;

  var svg = d3.select("#map")
        .append("svg")
        .attr("height", height + margin.top + margin.bottom)
        .attr("width", width + margin.left + margin.right)
        .append("g")
        .attr("transform", "translate(" + margin.left +"," + margin.top +")");

  // Get world.topojson
  d3.queue()
    .defer(d3.json, "world-countries.topojson")
    .await(ready)
  // Get travel data


  // Make the map flat using projections
  var projection = d3.geoMercator()
    .translate([ width / 2, height / 2 ])
    .scale(100)

  var path = d3.geoPath()
      .projection(projection)

function ready (error, data) {
  console.log(data);

var countries1 = topojson.feature(data, data.objects.countries1).features



console.log(countries1);

svg.selectAll(".country1")
  .data(countries1)
  .enter().append("path")
  .attr("class", "country1")
  .attr("d", path)
  .on('mouseover', function(d) {
    //Add class selected
    d3.select(this).classed("selected", true)
  })
    .on('mouseout', function(d) {
      //Remove class selected
      d3.select(this).classed("selected", false)
  }) 


}
})();   

// margin
var margin = {top: 20, right: 20, bottom: 20, left: 20},
    width = 500 - margin.right - margin.left,
    height = 500 - margin.top - margin.bottom,
    radius = width/2;

// color range
var color = d3.scaleOrdinal()
    .range(["#BBDEFB", "#90CAF9", "#64B5F6", "#42A5F5", "#2196F3", "#1E88E5", "#1976D2"]);

// pie chart arc. Need to create arcs before generating pie


// donut chart arc
var arc2 = d3.arc()
    .outerRadius(radius - 180)
    .innerRadius(radius - 150);

// arc for the labels position
var labelArc = d3.arc()
    .outerRadius(radius - 180)
    .innerRadius(radius - 100);

// generate pie chart and donut chart
var pie = d3.pie()
    .sort(null)
    .value(function(d) { return d.Count; });


// define the svg donut chart
var svg2 = d3.select("#DonutChart").append("svg")
    .attr("width", width)
    .attr("height", height)
  .append("g")
    .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");

// import data 
d3.json("php/myData2.php", function(error, data) {
  if (error) throw error;
    
    console.log(data);

    // parse data
    data.forEach(function(d) {
        d.Count = +d.Count;
        d.UserName = d.UserName;
    })


    // "g element is a container used to group other SVG elements"
  var g2 = svg2.selectAll("#DonutChart")
      .data(pie(data))
    .enter().append("g")
      .attr("class", "arc2");

   // append path 
  g2.append("path")
      .attr("d", arc2)
      .style("fill", function(d) { return color(d.data.UserName); })
    .transition()
      .ease(d3.easeLinear)
      .duration(2000)
      .attrTween("d", tweenDonut);
        
   // append text
  g2.append("text")
    .transition()
      .ease(d3.easeLinear)
      .duration(2000)
    .attr("transform", function(d) { return "translate(" + labelArc.centroid(d) + ")"; })
      .attr("dy", ".35em")
      .text(function(d) { return d.data.UserName; });
    
});



function tweenDonut(b) {
  b.innerRadius = 0;
  var i = d3.interpolate({startAngle: 0, endAngle: 0}, b);
  return function(t) { return arc2(i(t)); };

}

//-------------------------------------------------------------------------------
// Get world city weather


var API_KEY = "c1f0bcc8538c02faea81cf3f564dabb4";
var far = false;
var wd;

function displayTemp(cTemp) {
  
  return Math.round(cTemp) + " °C";
}

function render(wd) {
  console.log(wd);
  var London = wd.list[0].name;
  var LonWeather = wd.list[0].weather[0].description;
  var LonTemp = displayTemp(wd.list[0].main.temp);

  console.log(London);
  console.log(LonWeather);
  console.log(LonTemp);

  var Tokyo = wd.list[1].name;
  var TokWeather = wd.list[1].weather[0].description;
  var TokTemp = displayTemp(wd.list[1].main.temp);

  console.log(Tokyo);
  console.log(TokWeather);
  console.log(TokTemp);

  var Ny = wd.list[2].name;
  var NyWeather = wd.list[2].weather[0].description;
  var NyTemp = displayTemp(wd.list[2].main.temp);

  console.log(Ny);
  console.log(NyWeather);
  console.log(NyTemp);

  var Sydney = wd.list[3].name;
  var SydWeather = wd.list[3].weather[0].description;
  var SydTemp = displayTemp(wd.list[3].main.temp);

  console.log(Sydney);
  console.log(SydWeather);
  console.log(SydTemp);

  
  
  //var icon = wd.weather[0].icon;

  $('#LonWeather').html(LonWeather);
  $('#LonTemp').html(LonTemp);
  $('#TokWeather').html(TokWeather);
  $('#TokTemp').html(TokTemp);
  $('#NyWeather').html(NyWeather);
  $('#NyTemp').html(NyTemp);
  $('#SydWeather').html(SydWeather);
  $('#SydTemp').html(SydTemp);
 
  //var iconSrc = "http://openweathermap.org/img/w/" + icon + ".png";
  //$('#currentWeather').prepend('<img id="icon" src="' + iconSrc + '">');



}

$(function() {


    //Call to the open weather API

    $.getJSON('http://api.openweathermap.org/data/2.5/group?id=2643743,1850147,5128581,2147714&units=metric&appid=' + API_KEY,
      function(apiData) {
        wd = apiData;

        render(apiData, far);

        $('#toggle').click(function() {
          far = !far;
          render(wd, far);

        })

      });

 

});