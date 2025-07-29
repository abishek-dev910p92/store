# Store Dashboard

## Overview
This project provides a dynamic dashboard for a store, featuring real-time visualization of sales data and order status. The dashboard includes interactive charts that automatically update based on the latest data from the API.

## Features
- **Dynamic Data Cards**: Display of total sales, product count, order count, and today's orders
- **Daily Sales Trend Chart**: Line chart showing sales trends over time
- **Order Status Chart**: Pie chart displaying the distribution of order statuses
- **Real-time Updates**: Charts automatically adjust based on the latest data

## Technical Implementation
- **Frontend**: HTML, CSS (Tailwind), JavaScript
- **Charts**: Chart.js for data visualization
- **Data Source**: PHP backend that fetches data from an API

## How It Works
1. The dashboard fetches data from the API endpoint
2. Data is displayed in cards at the top of the dashboard
3. Charts are dynamically generated based on the card data
4. When card data changes, charts automatically update to maintain proportional relationships

## Setup
1. Upload the files to your web server
2. Configure the API endpoint in `dashboard.php` to point to your actual data source
3. Access the dashboard through your web browser

## FTP Configuration
The project includes FTP configuration for easy deployment to the server. The configuration is stored in `sync_config.jsonc`.