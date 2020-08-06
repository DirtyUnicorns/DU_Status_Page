# DU services status page
Example PHP-FPM 7.3 & Nginx 1.18 setup for Docker, build on [Alpine Linux](http://www.alpinelinux.org/).
The image is only +/- 35MB large.

* Built on the lightweight and secure Alpine Linux distribution
* Very small Docker image size (+/-35MB)
* Uses PHP 7.3 for better performance, lower CPU usage & memory footprint
* Optimized to only use resources when there's traffic (by using PHP-FPM's on-demand PM)
* The servers Nginx, PHP-FPM and supervisord run under a non-privileged user (nobody) to make it more secure
* The logs of all the services are redirected to the output of the Docker container (visible with `docker logs -f <container name>`)
* Follows the KISS principle (Keep It Simple, Stupid) to make it easy to understand and adjust the image to your needs
* HealthChecks.io integration

[![Docker Pulls](https://img.shields.io/docker/pulls/jmzsoftware/du_status_page.svg)](https://hub.docker.com/r/jmzsoftware/du_status_page/)
![nginx 1.18.0](https://img.shields.io/badge/nginx-1.18-brightgreen.svg)
![php 7.3](https://img.shields.io/badge/php-7.3-brightgreen.svg)
![License MIT](https://img.shields.io/badge/license-MIT-blue.svg)
![License APACHE](https://img.shields.io/badge/license-APACHE-blue.svg)

## Usage

Most configuration is done in the values.sample file and the docker-compose.yml.
You can clone this repo and rename values.sample to values and change all the parameters.  
Then just run docker-compose up.
