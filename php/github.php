<html>
<body>

<img src="qgis-icon.png"/>

<?php
$pattern='/^[\-a-zA-Z0-9]+$/';
$match = array();
if (!empty($_POST) && !empty($_POST[user_github]) && preg_match($pattern, $_POST[user_github], $match)) {
    $db = pg_connect("host=localhost port=5432 dbname=redmine user=geobox password=geobox");
    $query = "UPDATE usersgithub SET github = '$_POST[user_github]', updated_on = now() WHERE id = $_POST[user_id] and mail = '$_POST[user_email]'";
    // echo $query;
    $result = pg_query($query);
    // echo $result;
    if (!$result) {
        echo "<h3>Form result</h3>\n";
        echo "<p>We are so sorry. An error occurred.</p>\n";
        exit;
      } else {
        echo "<h3>Form result</h3>\n";
        echo "<p>Your GitHub account <b>" . $_POST[user_github] .  "</b> was recorded. <b>Thank you!</b></p>\n";
      }
} else {
?>

<h3>Migrating issues to GitHub</h3>

<p>We would like to migrate our issue tracker to GitHub.</p>

<p>The current platform, based on Redmine 2.5.2, is becoming obsolete and hard to maintain.</p>

<p>We already use GitHub as our code repository. Having the issue tracker on the same platform enables better integration. 
GitHub also has better tools to improve issue triage and management.</p>

<h3>Mapping user accounts</h3>

<p>When migrating issues and related comments, we would like to associate the Redmine user with a GitHub user account.
It you provide us your GitHub account, we will do so.</p>

<p>If you don't have a GitHub account or if you prefer do not share it, you still be listed as the original author. 
The history of contributions will be preserved.</p>

<h3>Form</h3>

<form method="post" action="#">
<input type="hidden" name="user_id" value="<?php echo $_GET["id"];?>" />
<table border="0">
<tr><td>Name</td><td><input type="text" name="user_name" value="<?php echo $_GET["name"];?>" readonly/></td></tr>
<tr><td>Email</td><td><input type="email" name="user_email" value="<?php echo $_GET["email"];?>" readonly/><br /></td></tr>
<tr><td>GitHub account</td><td><input type="text" name="user_github" /><br /></td></tr>
<tr><td></td><td><input type="submit" value="Submit" /></td></tr>
</table>
</form>

<p>Do not provide the email associated with your GitHub acconut (although you can log in using the email or the account name). 
You can check you account by log in into GitHub. After log in, you can see your account name, as illustrated in the image below.</p>

<img src="github-account.png"/>

<p>We don't need and we don't ask for your password. Just provide your GitHub account.</p>

<?php    
}
?>

<h3>Further information</h3>

<p>All the migration process has been discussed within the QGIS community for the last 3 years. 
To make the process clear, the migration proposal was published as 
a <a href="https://github.com/qgis/QGIS-Enhancement-Proposals/issues/141">QGIS Enhancement Proposal</a>
</p>

<?php
if (!empty($_POST)) {
    $db = pg_connect("host=localhost port=5432 dbname=redmine user=geobox password=geobox");
    $query = "UPDATE usersgithub SET github = '$_POST[user_github]', updated_on = now() WHERE id = $_POST[user_id] and mail = '$_POST[user_email]'";
    echo $query;
    $result = pg_query($query);
    echo $result;
}
?>

<!-- <p>
<?php
	$str = 'aWQ9MTEyMiZuYW1lPUpvcmdlJmVtYWlsPWpnckBkaS51bWluaG8ucHQ=';
	echo base64_decode($str);
?>
</p> -->

<body>
</html>

