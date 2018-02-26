## Development Setup
```
composer install
```

### Laravel Setup and Dependencies
- Laravel Passport
- doctrine/dbal 2.3
- GuzzleHttp/Guzzle
- Frontend Preset React Js

### Front End (ReactJS)

### Before Deploying to Server
```
php artisan serve passport:keys
```

### Common Development Problems
laravel passport ErrorException (E_NOTICE) Trying to get property of non-object.
```
php artisan passport:install --force
```
> Happens when you edited/rename and migrated database.
