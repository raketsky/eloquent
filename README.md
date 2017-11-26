##Installation
* composer install
* vendor/bin/phpmig migrate

##Migration
vendor/bin/phpmig generate CreateTempoTable
vendor/bin/phpmig migrate
vendor/bin/phpmig rollback -t 0 && vendor/bin/phpmig migrate
