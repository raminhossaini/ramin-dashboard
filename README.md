# ramin_dashboard
ramin_dashboard features:
* Dashboard built on top of CodeIgniter 4 and database backend (MySQL, or other)
* Date and time based on timezone
* Weather widget (updated periodically)
* Simple Server Metrics including CPU usage, RAM usage, Disk utilization, IP address (updated periodically)
* RSS feed (e.g for a news feed, updated periodically)
* A simple dashboard where you can add Sites, and Links for those Sites
* Icons for Links from https://icons.getbootstrap.com/
* Metric / Imperial setting
* Themes 

-----------------------------------
Installation:
-----------------------------------
Database initialization:
1. Create database user and a database with privileges (e.g user dashboard, database name: dashboard)
2. Run SQL script (dashboard.sql) to create database structure

Edit
App/Config/App.php
	* Edit $baseURL variable e.g https://mydomain/dashboard/public/

App/Config/Database.php
	* Modify all database details.
		- DBdriver can be SQLite3, MySQLi, or other CodeIgniter4 supported database driver

Configure NGINX or Apache site

Get API code from https://openweathermap.org/api


Current TODO 
Please contact me if you would like to contribute or assist
* Create database structures for Postgres, SQLite3
* Dockerize the app
