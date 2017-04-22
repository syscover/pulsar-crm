# CRM to Laravel

[![Total Downloads](https://poser.pugx.org/syscover/crm/downloads)](https://packagist.org/packages/syscover/crm)

## Installation

Before install sycover/crm, you need install syscover/pulsar to load application base

**1 - After install Laravel framework, execute on console:**
```
composer require syscover/pulsar-crm
```

**2 - Register service provider, on file config/app.php add to providers array**
```
Syscover\Crm\CrmServiceProvider::class,
```

**3 - Execute publish command**
```
php artisan vendor:publish
```

**4 - Execute optimize command load new classes**
```
php artisan optimize
```

**5 - And execute migrations and seed database**
```
php artisan migrate
php artisan db:seed --class="CrmTableSeeder"
```

**6 - Execute command to load all updates**
```
php artisan migrate --path=database/migrations/updates
```

**7 - To use auth properties, include this arrays in config/auth.php**

Inside guards array
```
'crm' => [
    'driver'    => 'session',
    'provider'  => 'crmCustomer',
],
```

Inside providers array
```
'crmCustomer' => [
    'driver'    => 'eloquent',
    'model'     => Syscover\Crm\Models\Customer::class,
],
```

Inside passwords array
```
'crmPasswordBroker' => [
    'provider'  => 'crmCustomer',
    'email'     => 'pulsar::emails.password',
    'table'     => 'password_resets',
    'expire'    => 60,
],
```

you can change email crmPasswordBroker, to custom appearance.

**8 - How get auth properties**
Use crm guard to get auth properties
```
auth('crm')
```

**9 - Add CRM middleware to nest protected routes**
In app/Http/Kernel.php add to $routeMiddleware array
```
'pulsar.crm.auth' => \Syscover\Crm\Middleware\CrmAuthenticate::class,
```
You can nest protected routes under this middleware.


## Activate Package
Access to Pulsar Panel, and go to:
 
Administration-> Permissions-> Profiles, and set all permissions to your profile by clicking on the open lock.<br>

Go to Administration -> Packages, edit the package installed and activate it.