# Wildside/Userstamps

Provides an Eloquent trait to automatically maintain created_by and updated_by (and deleted_by when using SoftDeletes) on your models.

## Requirements

* This package requires PHP 5.6+
* It has been tested against Laravel 5.2 (though should work with previous versions of Laravel 5).

## Installation

Require this package in your `composer.json` and update composer.

```php
"wildside/userstamps": "0.1.0"
```

Migrate your Model's table to include a `created_by` and `updated_by` (and `deleted_by` if using `SoftDeletes`).

```php
$table -> unsignedInteger('created_by') -> after('created_at');
$table -> unsignedInteger('updated_by') -> after('updated_at');
```

Load the trait in your Model.

```php
use Wildside\Userstamps\Userstamps;

class Example extends Model {

    use Userstamps;
}
```
