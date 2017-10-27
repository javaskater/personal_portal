#!/bin/bash

SYMF_BASE_DIR="../.."

CONSOLE_BIN=${SYMF_BASE_DIR}/bin/console

CACHE_DIR=${SYMF_BASE_DIR}/var/cache

MY_GROUP=$(id -Gn | cut -d" " -f1)

APACHE="www-data"

echo "changing the proprietary/group of ${CACHE_DIR}"
sudo chown -R $USER:$MY_GROUP $CACHE_DIR

echo "cleaning the symfony cache for dev mode"
php $CONSOLE_BIN cache:clear --env=dev

echo "cleaning the symfony cache for prod mode"
php $CONSOLE_BIN cache:clear --env=prod

echo "changing the proprietary/group of ${CACHE_DIR}"
sudo chown -R $USER:$APACHE $CACHE_DIR