SAND Test Environment (Ubuntu)
==============================

[![mOASIS](https://s3-eu-west-1.amazonaws.com/moasis/images/logo.png)](http://www.moasis.org.mz)

This infrastructure code allows you to set up SAND in a test environment in [Ubuntu](http://www.ubuntu.com/) using [Puppet](http://puppetlabs.com/).

Setup
-----

1. Ensure you have the latest version of Puppet installed by following [these instructions](http://docs.puppetlabs.com/guides/puppetlabs_package_repositories.html#for-debian-and-ubuntu):

        $ wget http://apt.puppetlabs.com/puppetlabs-release-precise.deb
        $ sudo dpkg -i puppetlabs-release-precise.deb
        $ sudo apt-get update
        $ sudo apt-get install puppet

2. Copy the deploy.sh script to your test machine
3. Run `sudo ./deploy.sh`
4. Navigate to your machine using a web browser

Troubleshooting
---------------

* If you've already got MySQL server installed on your machine, then you may need to [completely remove it](http://stackoverflow.com/questions/10853004/removing-mysql-5-5-completely) first. If you can't do that, then you'll need to edit the puppet manifest to use your current MySQL root password.