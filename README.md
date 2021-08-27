# ramin-dashboard
ramin-dashboard features:
* Dashboard built on top of CodeIgniter 4 and database backend (MySQL, or other)
* Date and time based on timezone
* Weather widget (updated periodically)
* Simple Server Metrics including CPU usage, RAM usage, Disk utilization, IP address (updated periodically)
* RSS feed (e.g for a news feed, updated periodically)
* A simple dashboard where you can add Sites, and Links for those Sites
* Icons for Links from https://icons.getbootstrap.com/
* Metric / Imperial setting
* Themes 

<img width="1363" alt="Collapsed" src="https://user-images.githubusercontent.com/249256/131122882-988d768d-980c-4817-b87f-dbd28cb10f12.png">
<img width="1355" alt="Expanded" src="https://user-images.githubusercontent.com/249256/131122895-9e6ed446-186e-4feb-b3a3-bb027ec99310.png">


# Installation:
### Requirements:
* Apache or NGINX (Have not tested others yet)
* PHP 7.3+ (tested on PHP 7.4)
* Database (MySQL, PostgreSQL, SQLite3)

### Database initialization:
1. Create database user and a database with privileges (e.g user dashboard, database name: dashboard)
2. When creating a database, use utf8_general_ci for collation 	
3. Run SQL script (dashboard.sql) to create database structure

Edit
App/Config/App.php
	* Edit $baseURL variable e.g https://mydomain/dashboard/public/

App/Config/Database.php
	* Modify all database details.
		- DBdriver can be SQLite3, MySQLi, or other CodeIgniter4 supported database driver

Configure NGINX or Apache site (point to /public/)

Get API code from https://openweathermap.org/api


# Current TODO 
Please contact me if you would like to contribute or assist
* Create database structures for Postgres, SQLite3
* Dockerize the app
