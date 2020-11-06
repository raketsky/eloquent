## Installation

**1.** Install package
```shell script
$ composer require egosun/eloquent
```

**2.** Add Capsule Manager and necessary connections to your bootstrap file
```php
$capsule = new \Illuminate\Database\Capsule\Manager;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => '127.0.0.1',
    'database' => 'database-name',
    'username' => 'database-user',
    'password' => 'database-password',
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'eloquent' => true
], 'default');

$capsule->setAsGlobal();
$capsule->bootEloquent();
```

**3.** Make model by extending Eloquent
```php
use Egosun\Database\Eloquent;

class YourModel extends Eloquent
{
    // use it as a regular Laravel Eloquent model
}
```


## Usage

**1.** Generate migration
```shell script
$ vendor/bin/phpmig generate CreateTempoTable
```

**2.** Make necessary changes to newly created file to fit your needs

**3.** Run the migration
```shell script
$ vendor/bin/phpmig migrate
```

##

**+** To rollback previous migration 
```shell script
$ vendor/bin/phpmig rollback
```

**+** To rollback all migrations and re-migration
```shell script
$ vendor/bin/phpmig rollback -t 0 && vendor/bin/phpmig migrate
```
