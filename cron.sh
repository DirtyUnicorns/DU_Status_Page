#!/bin/ash

COUNT=0
while [ $COUNT -lt 30 ]
do

while IFS= read -r line;do
    DOCKER=`echo $line |cut -d '|' -f1`
    NAME=`echo $line |cut -d '|' -f2`
    URL=`echo $line |cut -d '|' -f3`
    SITE=`docker inspect --format "{{.State.Health.Status}}" $DOCKER`
    if [ "$SITE" = "healthy" ]; then
        curl -s --retry 3 $URL > /dev/null
    else
        curl -s --retry 3 $URL/fail > /dev/null
    fi
done < /values

((COUNT++))
sleep 30;
done
