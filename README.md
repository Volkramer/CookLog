# cooklog

## Project setup
```
npm install
```

### Compiles and hot-reloads for development
```
npm run serve
```

### Compiles and minifies for production
```
npm run build
```

### Run your tests
```
npm run test
```

### Lints and fixes files
```
npm run lint
```

### Customize configuration
See [Configuration Reference](https://cli.vuejs.org/config/).


# Cooklog API

## API Installation/Configuration

Create your .env (.env.example)
composer install
php artisan generate:key
php artisan migrate:fresh --seed
php artisan passport:client --password

## API MONGODB OPEN FOOD FACT DB INSTALL

install mongodb
install mongorestore
install driver mongodb-PHP
use mongo restore to import off database
fill the .env with the mongodb parameter

## User

### Register
http://site.url/api/user/register
POST {
    body: name, email, password
}

### Login
http://site.url/api/user/login
POST {
    body: username (email), password
}

### Logout
http://site.url/api/user/logout
POST {
    header: Bearer +token,
    body:
}

### Profil
http://site.url/api/user/profil/
GET {
    header: Bearer +token
}

## Product

### Get Product by code
http://site.url/api/product/code/{code_ean}/{full?}
GET{

}

### Find Product
http://site.url/api/product/search/{slug}/{full?}
GET{

}

## Shopping List

### Get User shopping lists
http://site.url/api/shoppinglist/
GET{
    header: Bearer + token
}

### Create Shopping List
http://site.url/api/shoppinglist/
POST{
    header: Bearer + token,
    body:
}

### Get Shopping list by id
http://site.url/api/shoppinglist/{id}
GET{
    header: Bearer + token
    body:
}

### Update Shopping list
http://site.url/api/shoppinglist/{id}
PUT{
    header: Bearer + token
    body: name
}

### Delete Shopping list
http://site.url/api/shoppinglist/{id}
DELETE{
    header: Bearer + token
    body:
}

## Shopping List Item

### Create Shopping List Item
http://site.url/api/shoppinglistitem/
POST{
    header: Bearer + token,
    body: productId, quantity, check, shoppingListId
}

### Get Shopping list Item by id
http://site.url/api/shoppinglistitem/{id}
GET{
    header: Bearer + token
    body:
}

### Update Shopping list Item 
http://site.url/api/shoppinglistitem/{id}
PUT{
    header: Bearer + token
    body: productId, quantity, check, shoppingListd
}

### Delete Shopping list Item
http://site.url/api/shoppinglistitem/{id}
DELETE{
    header: Bearer + token
    body:
}

## Stock List

### Get User stock lists
http://site.url/api/stocklist/
GET{
    header: Bearer + token
}

### Create Stock List
http://site.url/api/stocklist/
POST{
    header: Bearer + token,
    body:
}

### Get Stock list by id
http://site.url/api/stocklist/{id}
GET{
    header: Bearer + token
    body:
}

### Update Stock list
http://site.url/api/stocklist/{id}
PUT{
    header: Bearer + token
    body: name
}

### Delete Stock list
http://site.url/api/stocklist/{id}
DELETE{
    header: Bearer + token
    body:
}

## Stock List Item

### Create Stock List Item
http://site.url/api/stocklistitem/
POST{
    header: Bearer + token,
    body: productId, quantity, dlc, stockListId
}

### Get Stock list Item by id
http://site.url/api/stocklistitem/{id}
GET{
    header: Bearer + token
    body:
}

### Update Stock list Item 
http://site.url/api/stocklistitem/{id}
PUT{
    header: Bearer + token
    body: productId, quantity, dlc, dluoToggle, stockListId
}

### Delete Stock list Item
http://site.url/api/stocklistitem/{id}
DELETE{
    header: Bearer + token
    body:
}