<?
	/**
	 * Remove Role None Users (for WordPress)
	 *
	 * A script to remove users who have the role of 'None' on WordPress websites
	 *
	 *
	 * @author Leo Newball, Jr.
	 * @version 1.0
	 * @license GLPv3
	 */

	$dbHost = "localhost"; // Enter your database Host
	$dbUser = "root"; // Enter your database User
	$dbPass = "root"; // Enter your database password
	$db = "wordpress"; // Enter your database

	$mysqli = new mysqli($dbHost, $dbUser, $dbPass, $db);
	if ($mysqli->connect_errno) {
    	echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	} 

	/* 	Users who don't have a role on WordPress websites, often have two missing components to their information in the database
		They mey either not have a meta_key 'wp_user_level' which indicates their user lever or
		Their wp_capabilities has a value of a:0:{}.
		This searches for items missing any of those two fields and remove it.	
	*/
	$res = $mysqli->query("SELECT * FROM wp_users WHERE ID NOT IN (SELECT user_id FROM wp_usermeta WHERE meta_key = 'wp_user_level') OR ID IN (SELECT user_id FROM wp_usermeta WHERE meta_value = 'a:0:{}')");
	

	/* 	This is merely database cleanup and removes any excess information in the user_meta, along with their entry in the wp_users table */
	while ($row = $res->fetch_assoc()) {
		echo '<p>';
		print_r($row);
		if (!$mysqli->query("delete from wp_users where ID = $row[ID]") && !$mysqli->query("delete from wp_usermeta where user_id = $row[ID]")) {
			    echo "Compelte fail! : (" . $mysqli->errno . ") " . $mysqli->error;
				
			} else {
				echo "<em>Deleted: " . $row['ID'] . "</em>";
			}
		echo '</p>';
		}


?>