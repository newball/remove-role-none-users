# Remove Role None Users (for WordPress)

A utility aimed at removing users with the role *none* from current WordPress installs. Written by [Leo Newball](http://leonewball.com "Leo Newball").

# Introduction

This is a utility aimed are removing users, and their associated metadata from current WordPress installs who have been given the role of *none*.

# Warning

Before running this utility, *perform a backup of your WordPress database!*

# Instructions

- Edit the removenone.php file and  enter the database information, related to your WordPress installation. The lines to edit look like:
	`$dbHost = "localhost"; // Enter your database Host
	$dbUser = "root"; // Enter your database User
	$dbPass = "root"; // Enter your database password
	$db = "wordpress"; // Enter your database`
- Place removenone.php on a server running WordPress
- Run the utility by visiting it's location in your web browser (i.e. your-domain-name.com/removenone.php)
- Dance and rejoice

# Known Issues

None (at the moment...)

Currently tested with WordPress version 4.1.