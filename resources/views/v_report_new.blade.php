<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Chart Batang CSS</title>
  <style>
    .chart-bar {
      height: 100%;
      background-color: #4caf50;
      float: left;
      margin: 0 5px;
      text-align: center;
      line-height: 300px;
    }

    .chart-bar:nth-child(1) {
      background-color: #ff9800;
    }

    .chart-bar:nth-child(2) {
      background-color: #2196f3;
    }

    .chart-bar:nth-child(3) {
      background-color: #f44336;
    }

    .chart-bar:nth-child(4) {
      background-color: #03a9f4;
    }

    .chart-bar:nth-child(5) {
      background-color: #teal;
    }

    .chart-container {
      width: 500px;
      height: 300px;
      border: 1px solid #ddd;
      margin: 20px auto;
      font-family: Arial, sans-serif;
    }

    .chart-title {
      text-align: center;
      font-size: 18px;
      margin-bottom: 10px;
    }
  </style>
</head>

<body>
  <div class="chart-container">
    <h2 class="chart-title">Data Penjualan</h2>
    <div class="chart-bar" style="width: 20%">10</div>
    <div class="chart-bar" style="width: 40%">20</div>
    <div class="chart-bar" style="width: 60%">30</div>
    <div class="chart-bar" style="width: 80%">40</div>
    <div class="chart-bar" style="width: 100%">50</div>
  </div>
</body>

</html>