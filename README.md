CONFIGURATION
-------------

### Database

import db file `db/yii_playground_20160226.sql`

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii_playground',
    'username' => 'your_username',
    'password' => 'your_password',
    'charset' => 'utf8',
];
```

**NOTES:**
- Yii won't create the database for you, this has to be done manually before you can access it.
- Check and edit the other files in the `config/` directory to customize your application as required.
- Refer to the README in the `tests` directory for information specific to basic application tests.


Plug in
-------------

### Dependent dropdown
~~~
composer require require kartik-v/yii2-widget-depdrop "@dev"
url :: http://demos.krajee.com/widget-details/depdrop
~~~

### Select2
~~~
composer require kartik-v/yii2-widget-select2 "@dev"
url :: https://github.com/kartik-v/yii2-widget-select2
~~~
