#!/bin/bash
BASEDIR=.
EXCLUDE=$BASEDIR/deploy/exclude_pattern.txt
SRC_DIR=$BASEDIR/src/
DST_SERVER=uniquevision@192.168.120.251
DST_DIR=/var/www/app/example-takase/tprefix
DST_PATH=$DST_SERVER:$DST_DIR

rsync -avz --chmod=Da+xr,Du+w,Fa+r,Fu+w -e ssh --delete --exclude-from=$EXCLUDE $SRC_DIR $DST_PATH

