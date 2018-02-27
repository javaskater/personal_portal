#!/bin/bash

init_repertoire=$(pwd)
projet_repertoire=$(dirname $init_repertoire)
archive_repertoire=$(dirname $projet_repertoire)/tmp
#echo "$archive_repertoire"
nom_module=$(basename $projet_repertoire)
nom_archive=${nom_module}_$(date +%Y-%m-%d_%H%M%S).zip
archive_abs_path=$archive_repertoire/$nom_archive
path_sqlite="var/data/data.sqlite"
dir_sqlite=$(dirname ${path_sqlite})
#echo "$archive_abs_path"

if [ -d "$archive_repertoire" ]
then
  rm -rf "$archive_repertoire"
fi

mkdir -p $archive_repertoire

cd $projet_repertoire

branche=$(git branch | sed -n '/\* /s///p')
#echo $branche

git archive --format zip --prefix="${nom_module}/" --output $archive_abs_path $branche
echo "git archive: $archive_abs_path generated for branch: ${branche}; contenu:"
unzip -l "$archive_abs_path"
echo "+ we need to add the vendor part of our symfony3's project.."
cd $archive_repertoire
unzip -qq $nom_archive && rm $nom_archive && cd ${nom_module}

#echo $(pwd)

echo "++ We actually add the vendor part of our symfony3's project through composer"
composer install

echo " we need to rebuild the bundle.js which bundles all files of our react js project"
cd web/jpm
#add grunt tooling project
npm install
#add the bootstrap kit to your project
gulp dist
#in a production environment I don't need the dev node_modules
npm prune --production

#adding the sqlite database !!!!
abs_dir_sqlite="${archive_repertoire}/${nom_module}/${dir_sqlite}" 
echo " We want to create the database ${path_sqlite}"
mkdir -p ${abs_dir_sqlite}
cd "$archive_repertoire/${nom_module}"
php bin/console doctrine:schema:create

cd $archive_repertoire

zip -rqq $nom_archive ${nom_module}

echo "archive: $archive_abs_path après ajout de la partie composer/vendor"

unzip -l $nom_archive

cd $init_repertoire

echo "archive ${archive_repertoire}/${nom_archive} créée ..... OK!"
