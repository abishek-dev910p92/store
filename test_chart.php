<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart.js Test</title>
    <script src="assets/js/chart.min.js"></script>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .chart-container { width: 600px; height: 400px; margin: 0 auto; }
        #debug { margin-top: 20px; padding: 10px; background-color: #f5f5f5; border-radius: 5px; }
    </style>
</head>
<body>
    <h1>Chart.js Test</h1>
    <div class="chart-container">
        <canvas id="testChart"></canvas>
    </div>
    <div id="debug">
        <h2>Debug Information</h2>
        <div id="debugInfo"></div>
    </div>

    <script>
        // Debug function to log information
        function logDebug(message) {
            const debugInfo = document.getElementById('debugInfo');
            const logEntry = document.createElement('p');
            logEntry.textContent = message;
            debugInfo.appendChild(logEntry);
            console.log(message);
        }

        // Check if Chart.js is loaded
        window.addEventListener('load', function() {
            try {
                if (typeof Chart === 'undefined') {
                    logDebug('ERROR: Chart.js is not loaded');
                } else {
                    logDebug('SUCCESS: Chart.js is loaded, version: ' + Chart.version);
                    
                    // Simple data for testing
                    const data = {
                        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
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
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    };

                    // Get the canvas element
                    const ctx = document.getElementById('testChart');
                    if (!ctx) {
                        logDebug('ERROR: Canvas element not found');
                        return;
                    }
                    
                    logDebug('Canvas element found, creating chart...');
                    
                    try {
                        // Create the chart
                        new Chart(ctx, {
                            type: 'bar',
                            data: data,
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                        logDebug('Chart created successfully');
                    } catch (chartError) {
                        logDebug('ERROR creating chart: ' + chartError.message);
                    }
                }
            } catch (error) {
                logDebug('ERROR: ' + error.message);
            }
        });
    </script>
</body>
</html>