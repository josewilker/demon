#!/bin/bash

touch /demons/.lock;

sleep 310s;

rm -rf /demons/.lock;

bash dkill.sh;
bash dscreen.sh;

echo "All demons restarted!";

