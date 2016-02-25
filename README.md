# WMC Doctrine Naming Strategy

This naming strategy is based on Doctrine's own `UnderscoreNamingStrategy`.

The only difference is that table names are pluralized (`users` and
`user_pictures` instead of `user` and `user_picture`). Join key column names are
kept in singular form (`user_id`).

**WARNING**: We recommend you use this naming strategy from the very beginning of
your project. If you change the naming strategy mid-way, all your tables' name
will change and this might create an unpleasant situation.

## Installation

### With Symfony
The best way to install this extension is through composer:

First, require the bundle:

```sh
composer require wemakecustom/doctrine-naming-strategy "^1.0"
```

Second, enable it:

```php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new WMC\DoctrineNamingStrategyBundle\WMCDoctrineNamingStrategyBundle(),
        // ...
    );
}
```

Third and finally, configure doctrine to use it:

```yaml
# config.yml

doctrine:
    orm:
        naming_strategy: wmc.doctrine.orm.naming_strategy
```

and you're done.

### With a pure Doctrine

The best way to install this extension is through composer:

First, require the bundle:

```sh
composer require wemakecustom/doctrine-naming-strategy "^1.0"
```

Then give the naming strategy to doctrine's configuration:

```php
<?php

$namingStrategy = new \WMC\DoctrineNamingStrategyBundle\ORM\NamingStrategy();
$configuration->setNamingStrategy($namingStrategy);
```
