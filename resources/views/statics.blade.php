@extends(Session::get('userType')==1 ? "./layoutNisit" : (Session::get('userType')==2 ?"./layoutTeacher":"./layoutAdmin"))
@section('title',"statics")
@section('Content')

<div class="col-xl-15 col-15 mb-4">
    <div class="card"  >
        <div class="card-header card-bg " style="background-color: #bf4040">
            <span class="link-active " style="font-size: 15px; color:white;">สถิติการยืมอุปกรณ์</span>
        </div>
        <div class="card-body" >
            <div class="col-sm-12" id="historyRequirements" style="overflow-y:auto;">


            {{-- <!DOCTYPE html>
            <html lang="en">
                <head>
                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>ChartJs</title>

                </head>
                <body>

                    <canvas id="myChart" width="400" height="400"></canvas>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>

                    <script>
                        var ctx = document.getElementById("myChart");
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ["เมาส์", "คีย์บอร์ด", "อุปกรณ์อิเล็กทรอนิกส์", "อุปกรณ์คอมพิวเตอร์", "สายไฟ", "ปลั๊ก"],
                                datasets: [{
                                    label: '# of Votes',
                                    data: [12, 19, 3, 5, 2, 3],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255,99,132,1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero:true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>


                </body>
            </html> --}}

            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>ChartJs</title>

            </head>

            <body>


                <canvas id="myChart" width="400" height="200"></canvas>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>
                <script>
                var ctx = document.getElementById("myChart");
                        var myChart = new Chart(ctx, {
                            //type: 'bar',
                            //type: 'line',
                            type: 'bar',
                            data: {

                                labels: ["เมาส์", "คีย์บอร์ด", "อุปกรณ์อิเล็กทรอนิกส์", "อุปกรณ์คอมพิวเตอร์"],
                                datasets: [{
                                    label: '# of Votes',
                                    data: [12, 19, 3, 5],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255,99,132,1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)'
                                    ],

                                    borderWidth: 2
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero:true
                                        }
                                    }]
                                }
                            }
                        });
                </script>

            </body>
            </html>

            </div>
        </div>
    </div>
</div>

@endsection
