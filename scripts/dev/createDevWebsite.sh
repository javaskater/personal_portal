#!/bin/bash

init_repertoire=$(pwd)
projet_repertoire=$(dirname $(dirname $init_repertoire))
project=$(basename $projet_repertoire)
path_sqlite="var/data/data.sqlite"
dir_sqlite=$(dirname ${path_sqlite})

echo "++ We actually add the vendor part of our symfony3's project through composer"

cd $projet_repertoire
php ../composer.phar install

echo " We want to create the database ${path_sqlite}"
mkdir -p ${dir_sqlite}

if [ -f ${path_sqlite} ]; then
	rm ${path_sqlite}
fi

touch ${path_sqlite}

php bin/console doctrine:schema:create

echo " we need to add the node dependencies to our web project: we are at $(pwd)"
cd web/jpm
#for the grunt tooling (sass to css)
npm install
#create a first uncompressed version of the css style with its maps
gulp dist

echo "makes the symfony's var directory writable by Apache !!!"
# Set Gid Bit !!!
chmod -R g+s "${projet_repertoire}"

# gives the hand back to symfony
cd ${projet_repertoire}
# starts the embedded php server and gives the hand back
# php bin/console server:start
# starts the embedded php server and wait !!!
php bin/console server:run
## We see the errors directly on the output
### CTRL+C to stop the server

echo "Website ready for use got to http://localhost:8000/ ..."
