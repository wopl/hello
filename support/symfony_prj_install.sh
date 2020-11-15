######################################################################
##                                                                  ##
## symfony_prj_install.sh            (c) Wolfram Plettscher 06/2020 ##
##                                                                  ##
######################################################################


### this script CANNOT run automatically
### but gives only a guide to manually perform the tasks
composer create-project symfony/website-skeleton wpt4
# composer require server --dev
# composer require sec-checker --dev
# composer require --dev profiler
composer require annotations
composer require twig
composer require knplabs/knp-menu-bundle
composer require asset
composer require security
composer require expressionlanguage
composer require symfony/dotenv
composer require symfony/http-foundation
composer require form
composer require symfony/monolog-bundle
composer require doctrine/collections
composer require logger
composer require symfony/security-bundle
composer require symfony/monolog-bundle
composer require symfony/validator
composer require symfony/intl
composer require symfony/webpack-encore-bundle

./composer require symfony/maker-bundle --dev

# for apache server within docker container
composer require symfony/apache-pack

# for Routing of pathes (automatically included)
# composer require sensio/framework-extra-bundle

### in addition
# ensure all file in var and vendor are www-data/www-data (chown/chgrp -R www-data var/vendor)
# regularly update composer (./composer update --with-dependencies)

# temporarily (due to apache config problems) the app is called via https://wpt.plettscher.de/index.php/login
