# CRM to Laravel

[![Total Downloads](https://poser.pugx.org/syscover/crm/downloads)](https://packagist.org/packages/syscover/pulsar-crm)

## Installation

Before install sycover/crm, you need install syscover/pulsar to load application base

**1 - After install Laravel framework, execute on console:**
```
composer require syscover/pulsar-crm
```

**2 - Execute publish command**
```
php artisan vendor:publish --provider="Syscover\Crm\CrmServiceProvider"
```

**3 - Execute optimize command load new classes**
```
php artisan optimize
```

**4 - And execute migrations and seed database**
```
php artisan migrate
php artisan db:seed --class="CrmTableSeeder"
```

**5 - Execute command to load all updates**
```
php artisan migrate --path=vendor/syscover/pulsar-crm/src/database/migrations/updates
```

**6 - To use auth properties, include this arrays in config/auth.php**

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
    'table'     => 'admin_password_resets',
    'expire'    => 60,
],
```

you can change email crmPasswordBroker, to custom appearance.

**7 - Add CRM middleware to nest protected routes**
In app/Http/Kernel.php add to $routeMiddleware array
```
'pulsar.crm.auth' => \Syscover\Crm\Middleware\CrmAuthenticate::class,
```
You can nest protected routes under this middleware.

**8 - How get auth properties**
Use crm guard to get auth properties
```
auth('crm')
```