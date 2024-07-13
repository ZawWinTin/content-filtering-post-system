# Content Filtering System

### Installation

Install backend packages:

```bash
composer install
```

Copy **.env.example** to **.env**

Update **.env** for database

Generate key:

```bash
php artisan key:generate
```

### For Testing

For testing database:

```bash
php artisan db:test
```

### Run

Run the server

```bash
php artisan serve
```

_Note:Please check ContentFilteringSystem.postman_collection.json for API using Postman._
