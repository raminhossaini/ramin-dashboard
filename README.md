# ramin_dashboard

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
