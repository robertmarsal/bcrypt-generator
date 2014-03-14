# BcryptGenerator

Command line bcrypt hash generator. Useful for computing bcrypt hashes while
developing.

#### Installation

1. Add this package to your `composer.json` file, in the `require-dev` section
```json
    {
        "require-dev": {
            "robertboloc/bcrypt-generator": "dev-master"
        }
    }
```

2. Run `composer update`

This will install the script into `vendor/bin/bcrypt_generator.php`

#### Usage

Execute the CLI script providing some/all of the following options :

**--help | -h** Get usage information.  
**--text | -t** Text to get hashed.

For example calling the script using the `-t` option:
```php
php vendor/bin/bcrypt_generator.php -t admin
```

Will output something like:
```php
$2y$14$foQAf3JxtdeRCwYVXiH6DOJqPb1fnqD79NZOsj.2q3lIxMNYCVgXK
```

#### Notes

If you use this with a real password add a space before the `php` call to avoid
the command showing in your shell's history.
