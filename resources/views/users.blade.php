<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <canvas id="activeTimeChart" width="800" height="400"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('activeTimeChart').getContext('2d');
        
        var data = @json($data);

        var usernames = data.map(function (entry) {
            return entry.username;
        });

        var activeTimes = data.map(function (entry) {
            return entry.active_time;
        });

        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: usernames,
                datasets: [{
                    label: 'Active Time (minutes)',
                    data: activeTimes,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Active Time (minutes)'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Usernames'
                        }
                    }
                }
            }
        });
    });
</script>
</body>
</html>