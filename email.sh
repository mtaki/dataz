#!/bin/bash
cd /var/www/tcra
while :
do
	sleep 5
	php console.php email
done
