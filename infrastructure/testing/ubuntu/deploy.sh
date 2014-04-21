#!/bin/bash

################################################################################
# 1. Clean previous deploy
################################################################################
rm -rf ~/sand-tmp
rm -rf /sand

################################################################################
# 2. Create working directory for the deploy
################################################################################
mkdir ~/sand-tmp
cd ~/sand-tmp

################################################################################
# 3. Install the required puppet modules
################################################################################
puppet module install --force example42/puppi
puppet module install --force puppetlabs/stdlib
puppet module install --force puppetlabs/mysql
puppet module install --force example42/apache
puppet module install --force example42/php

################################################################################
# 4. Download the latest source
################################################################################
curl --digest --user JembiJenkins:JembiJenkins#123 https://bitbucket.org/jembi/sand/get/master.tar.gz -o master.tar.gz

################################################################################
# 5. Extract the source
################################################################################
mkdir source
tar -C source -zxvf master.tar.gz --strip-components 1

################################################################################
# 6. Create dummy mount point
################################################################################
cd source
ln -s $PWD /sand

################################################################################
# 7. Apply the configuration
################################################################################
cd infrastructure/testing
sudo puppet apply --verbose manifests/sand.pp
