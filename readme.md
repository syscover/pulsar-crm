# CRM to Laravel

[![Total Downloads](https://poser.pugx.org/syscover/pulsar-crm/downloads)](https://packagist.org/packages/syscover/pulsar-crm)

## Installation

Before install sycover/pulsar-crm, you need install syscover/pulsar-core and syscover/pulsar-admin

**1 - After install Laravel framework, execute on console:**
```
composer require syscover/pulsar-crm
```

Register service provider, on file config/app.php add to providers array
```
Syscover\Crm\CrmServiceProvider::class,
```

**2 - Execute publish command**
```
php artisan vendor:publish --provider="Syscover\Crm\CrmServiceProvider"
```
and
```
composer dump-autoload
```

**3 - And execute migrations and seed database**
```
php artisan migrate
php artisan db:seed --class="CrmTableSeeder"
```

**4 - Execute command to load all updates**
```
php artisan migrate --path=vendor/syscover/pulsar-crm/src/database/migrations/updates
```

**5 - To use auth properties, include this arrays in config/auth.php**

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
    'table'     => 'admin_password_resets',
    'expire'    => 60,
],
```

you can change email crmPasswordBroker, to custom appearance.

**6 - You can nest protected routes under this middleware**
```
'auth:crm'
```

**Options**
You can register ResetLinkEmailSent event in app/Providers/EventServiceProvider.php to custom the notification. 
Don't forget to create App\Listeners\SendResetLinkEmail listener.
```
protected $listen = [
    ...
    'Syscover\Crm\Events\ResetLinkEmailSent' => [
        'App\Listeners\SendResetLinkEmail'
    ],
    ...
];
```