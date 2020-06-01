#!/bin/sh

RED="\033[1;31m" 
BLUE="\033[1;34m"
GREEN="\033[1;32m"
NC="" 

DIRFILE=`readlink -e "$0"`
CURFILE=`basename "$DIRFILE"`
CURDIR=`dirname "$DIRFILE"`

echo "\n"
echo "${RED} Devoleped by ExRecod${NC}"
echo "${BLUE} Forum http://xxxreal.ru/{NC}"
echo "${RED} MULTI SERVERS RCM ADMIN MOD v.9.x ${NC}"

while read line ; do
  IFS=";"
  set -- $line
  ip=$1
  port=$2
  rcon=$3
  log=$4
  IPPORT=$1
IPPORT=$(echo $ip | sed -e "s/\.//g")
IPPORTW=$IPPORT$port 
  
if (echo "$IPPORTW" | grep -E -q "^?[0-9]+$"); then 
  echo "$ip->$port->$rcon->$log => " 

pkill -f go_$IPPORTW.sh 
pkill -f go_$IPPORTW.php
pkill -f cleaner_$IPPORTW.php

echo "Killed go_$IPPORTW \n"

fi
done < $CURDIR/cfg/servers.cfg  
