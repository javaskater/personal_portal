#!/bin/bash

init_repertoire=$(pwd)
projet_repertoire=$(dirname $(dirname $init_repertoire))
project=$(basename $projet_repertoire)
path_sqlite="var/data/data.sqlite"
dir_sqlite=$(dirname ${path_sqlite})

echo "++ We actually add the vendor part of our symfony3's project through composer"

cd $projet_repertoire
composer install

echo " We want to create the database ${path_sqlite}"
mkdir -p ${dir_sqlite}
touch ${path_sqlite}
php bin/console doctrine:schema:create

echo " we need to add the node dependencies to our web project"
cd web/jpm
#for the grunt tooling (sass to css)
npm install
#create a first uncompressed version of the css style with its maps
gulp dist

echo "makes the symfony's var directory writable by Apache !!!"
chmod -R g+rwx "${projet_repertoire}/var"
sudo chown -R :www-data "${projet_repertoire}/var"
# Set Gid Bit !!!
sudo chmod -R g+s "${projet_repertoire}"

cd $init_repertoire

echo "Website ready for use ..."
