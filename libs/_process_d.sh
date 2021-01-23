#!/bin/bash

workersStart=0;
scriptName=$1;
cmd=$2;
workers=$3;
ever=$4;
scriptTimeout=$5;
sleept=$6;

baseDir=$(pwd);

echo "";

function execp() {

    if [ ! -f "$baseDir/demons/.lock" ]; then

        workersStart=0;

        until [ $workersStart -eq $1 ]
        do

            if [ ! -z $scriptTimeout ]; then
                timeout ${scriptTimeout}s $2&
            else
                $2&
            fi;

            if [ ! -z $sleept ]; then
                sleep $sleept;
            else
                sleep 1;
            fi;

            #logs
            logMsg="[DEMON] Worker for \"$2\" defined!";
            logger $logMsg;

            #utils
            workersStart=`expr $workersStart + 1`

            sleep 1

        done

        wait;

    fi;

}

execp "$workers" "$cmd";

if [ $ever -eq 1 ]; then

    while [ $ever -eq 1 ]
    do

        execp "$workers" "$cmd";

    done

fi;

#echo "[DEMON] All processes have completed";
