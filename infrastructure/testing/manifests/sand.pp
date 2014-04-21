# Variables
$mysql_root_password = "sand-mysql-root-pass"
$mysql_sand_user = "sand-user"					# These need to be same as the
$mysql_sand_user_password = "sand-password"		# contents of database.php in
$mysql_sand_database_name = "sand"				# artifacts/Config

# Defaults for exec
Exec {
	path => ["/bin", "/usr/bin", "/usr/local/bin", "/usr/local/sbin"],
	user => "root"
}

###############################################################################
# The stanzas below are used for extracting the create script from the MWB
# file. 
###############################################################################
# Install xvfb
package { "xvfb": 
	ensure	=> latest,
}

# Install gdebi to help us install the dependencies for MySQL Workbench
package {"install-gdebi":
	name 	=> "gdebi-core",
	ensure	=> latest
}

# Grab the right version of MySQL Workbench from S3
exec { "download-mysql-workbench":
	cwd	=> "/sand/infrastructure/testing/artifacts",
	command	=> "wget https://s3-eu-west-1.amazonaws.com/moasis/shared-deploy-artifacts/mysql-workbench-community-6.0.7-1ubu1204-i386.deb",
	creates => "/sand/infrastructure/testing/artifacts/mysql-workbench-community-6.0.7-1ubu1204-i386.deb",
	timeout	=> 0
}

# Install MySQL Workbench
exec { "install-mysql-workbench":
	command	=> "sudo gdebi /sand/infrastructure/testing/artifacts/mysql-workbench-community-6.0.7-1ubu1204-i386.deb -n",
	require	=> [ Package["install-gdebi"], Exec["download-mysql-workbench"] ],
	timeout	=> 0
 }

################################################################################
# No longer needed because we are using an MWB file without spaces in the name
################################################################################
# Rename MySQL Workbench file so the extract script works
# file { "/sand/model/model.mwb":
# 	source	=>	"/sand/model/Modelo de Dados 2.1.mwb",
# 	require	=> Exec["install-mysql-workbench"]
# }
################################################################################

################################################################################
# We need to make sure the mwb2sql.sh script has the correct line endings
################################################################################
package { "dos2unix": 
	ensure	=> latest,
}

exec { "fix-line-endings":
	cwd		=> "/sand/infrastructure/testing/artifacts",
	command	=> "dos2unix mwb2sql.sh",
	timeout	=> 0,
	require => Package["dos2unix"]
}
################################################################################

# Extract the SQL create script
exec { "extract-sql-create-script":
	cwd		=> "/sand/model",
	command => "Xvfb :1 & DISPLAY=:1 ../infrastructure/testing/artifacts/mwb2sql.sh sand-data-model.mwb create.sql",
	require	=> Exec["fix-line-endings"]
}


# Install MySQL server
class { "mysql::server":
	root_password => $mysql_root_password,
}

# Create SAND demo database
mysql::db { $mysql_sand_database_name: 
	user 			=> $mysql_sand_user,
	password		=> $mysql_sand_user_password,
	sql      		=> "/sand/model/create.sql",
	host			=> "localhost",
	grant			=> ["all"],
	before			=> Exec["import-demo-data"],
	require 		=> Exec["extract-sql-create-script"]
}

# Import the metadata
exec {"import-demo-data":
	cwd	=> "/sand/infrastructure/testing/artifacts",
	command	=> "mysql -u$mysql_sand_user -p$mysql_sand_user_password -D$mysql_sand_database_name < sand-demo-data.sql"
}

# Install apache & mod_rewrite
class { "apache": }
apache::module {"rewrite": }

apache::vhost { 'default':
    source      => '/sand/infrastructure/testing/artifacts/000-default',
    template    => '',
    priority 	=> ''
}

# Install php & pdo_mysql
class { "php":
  service 	=> "apache",
}
php::module { "mysql": }

# Copy the application scripts into place
file { "/var/www":
	ensure	=> directory,
	recurse	=> true,
	purge	=> true,
	links	=> follow,
	source	=> "/sand/webapp",
	owner	=> "www-data",
	group 	=> "www-data",
	require	=> Class["apache"]
}

# Create CakePHP tmp directory structure
file { [ "/var/www/app/tmp", "/var/www/app/tmp/cache",
         "/var/www/app/tmp/cache/models","/var/www/app/tmp/cache/persistent"]:
    ensure 	=> "directory",
    owner	=> "www-data",
	group 	=> "www-data",
	require	=> File["/var/www"]
}

# Copy the database config into place
file { "/var/www/app/Config/database.php":
	source	=> "/sand/infrastructure/testing/artifacts/database.php",
	owner	=> "www-data",
	require	=> File["/var/www"]
}

