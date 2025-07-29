# PowerShell script to download Chart.js UMD version
$webClient = New-Object System.Net.WebClient

# Download the minified UMD version
$webClient.DownloadFile('https://cdn.jsdelivr.net/npm/chart.js@4.5.0/dist/chart.umd.min.js', 'd:\php minitgo\htdocs\store\assets\js\chart.min.js')

# Download the unminified UMD version
$webClient.DownloadFile('https://cdn.jsdelivr.net/npm/chart.js@4.5.0/dist/chart.umd.js', 'd:\php minitgo\htdocs\store\assets\js\chart.js')

Write-Host "Chart.js UMD versions downloaded successfully."