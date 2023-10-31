// Define the LineGraph object
function LineGraph(canvasId, data, options={}) {
    this.canvas = document.getElementById(canvasId);
    this.ctx = this.canvas.getContext("2d");

    this.data = data;

    this.width = this.canvas.width;
    this.height = this.canvas.height;

    this.heading = options.heading || '';
    this.subtitle = options.subtitle || '';
    this.xAxisTitle = options.xAxisTitle || '';
    this.yAxisTitle = options.yAxisTitle || '';
    
    // Function to draw the line graph
    this.draw = function() {
      this.clearCanvas();
      // this.drawAxes();
      // this.drawDataPoints();
      this.drawLine();
      this.drawHeading();
      this.drawSubtitle();
      this.drawAxisTitles();
      
    };

    // Function to clear the canvas
    this.clearCanvas = function() {
      this.ctx.clearRect(0, 0, this.width, this.height);
    };

    // Function to draw the x and y axes
    this.drawAxes = function() {
      // Draw x-axis
      this.ctx.beginPath();
      this.ctx.moveTo(0, this.height);
      this.ctx.lineTo(this.width, this.height);
      this.ctx.stroke();

      // Draw y-axis
      this.ctx.beginPath();
      this.ctx.moveTo(0, 0);
      this.ctx.lineTo(0, this.height);
      this.ctx.stroke();
    };

    // Function to draw data points
    this.drawDataPoints = function() {
      var stepX = this.width / (this.data.length - 1);
      var maxValue = Math.max(...this.data);

      for (var i = 0; i < this.data.length; i++) {
        var x = i * stepX;
        var y = this.height - (this.data[i] / maxValue) * this.height;

        this.ctx.beginPath();
        this.ctx.arc(x, y, 5, 0, Math.PI * 2);
        this.ctx.fill();
      }
    };

    // Function to draw the line connecting data points
    this.drawLine = function() {
      var stepX = this.width / (this.data.length - 1);
      var maxValue = Math.max(...this.data);
      
      this.ctx.beginPath();
      this.ctx.moveTo(0, this.height - (this.data[0] / maxValue) * this.height);

      for (var i = 1; i < this.data.length; i++) {
        var x = i * stepX;
        var y = this.height - (this.data[i] / maxValue) * this.height;
        this.ctx.lineTo(x, y);
      }

      this.ctx.strokeStyle = "blue";
      this.ctx.lineWidth = 2;
      this.ctx.stroke();
    };


    // Function to draw the heading
    this.drawHeading = function() {
      this.ctx.fillStyle = "black";
      this.ctx.font = "bold 18px Arial";
      this.ctx.textAlign = "center";
      this.ctx.fillText(this.heading, this.width / 2, 30);
    };

    // Function to draw the subtitle
    this.drawSubtitle = function() {
      this.ctx.fillStyle = "gray";
      this.ctx.font = "italic 14px Arial";
      this.ctx.textAlign = "center";
      this.ctx.fillText(this.subtitle, this.width / 2, 50);
    };

    // Function to draw axis titles
    this.drawAxisTitles = function() {
      this.ctx.fillStyle = "black";
      this.ctx.font = "bold 14px Arial";
      this.ctx.textAlign = "center";

      // Draw x-axis title
      this.ctx.fillText(this.xAxisTitle, this.width / 2, this.height - 5);

      // Draw y-axis title
      this.ctx.save();
      this.ctx.translate(10, this.height / 2);
      this.ctx.rotate(-Math.PI / 2);
      this.ctx.fillText(this.yAxisTitle, 0, 0);
      this.ctx.restore();
    };

  }







  // Define the BarGraph object
  function BarGraph(canvasId, data) {
    
    this.canvas = document.getElementById(canvasId);
    this.ctx = this.canvas.getContext("2d");
    this.data = data;
    this.width = this.canvas.width;
    this.height = this.canvas.height;
    this.barWidth = this.width / data.length;

    // Function to draw the bar graph
    this.draw = function() {
      this.clearCanvas();
      this.drawBars();
    };

    // Function to clear the canvas
    this.clearCanvas = function() {
      this.ctx.clearRect(0, 0, this.width, this.height);
    };

    // Function to draw the bars
    this.drawBars = function() {
      var maxValue = Math.max(...this.data);
      var barSpacing = 10; // Adjust as needed

      for (var i = 0; i < this.data.length; i++) {
        var barHeight = (this.data[i] / maxValue) * this.height;
        var x = i * (this.barWidth + barSpacing);
        var y = this.height - barHeight;

        this.ctx.fillStyle = "blue";
        this.ctx.fillRect(x, y, this.barWidth, barHeight);
      }
    };
  }






document.addEventListener("DOMContentLoaded", function () {
    console.log("Hello");
    const data = [30, 50, 70, 90, 60, 80, 40, 20];

    var lineG1 = new LineGraph("graph1", data, {
      subtitle: "",
      xAxisTitle: "Assignments",
      yAxisTitle: "20       30     50      100"
    });
    lineG1.draw();

    const p_data = [50, 40, 70] 
    var prog = new BarGraph("prog", p_data);
    prog.draw();
});




























