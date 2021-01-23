#!/bin/bash

echo "[DEMON] Starting ...";

baseDir=$(pwd);

for entry in "$baseDir/demons"/*
do

    nentry=`basename $entry`;
    fentry="${nentry%.*}";

    fchar="${fentry:0:1}";

    if [ "$fchar" != "_" ]; then

        screen -dmS "d-$fentry" bash -c "$entry --denv; exec bash";

        echo "[DEMON] The child 'd-$fentry' has been created!";

    fi;

done

echo "[DEMON] To see a window of a demon, use screen -r d-{demon}.";

echo "[DEMON] Started!";


# baseDir=$(pwd);
# screen -dmS DEMON bash -c "$baseDir/demon.sh; exec bash";

# echo "[DEMON]";
# echo "Screen created!";
# echo "Name: DEMON";
# echo "";
