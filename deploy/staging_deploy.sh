#!/bin/sh
cd /var/www/stg-mio.com/htdocs/admin
/usr/bin/git --git-dir=/var/www/stg-mio.com/htdocs/admin/.git checkout staging
/usr/bin/git --git-dir=/var/www/stg-mio.com/htdocs/admin/.git pull origin staging

