######################################################################
##                                                                  ##
## dockerrun.sh                      (c) Wolfram Plettscher 05/2019 ##
##                                                                  ##
######################################################################

## run container in production mode
 
docker run --name=wpt \
           --detach \
           --restart=always \
           --env-file ./container_environment.txt \
	   -p 80:80 \
           woppl/wptools:0.0.3

