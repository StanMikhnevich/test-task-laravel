<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# LARAVEL TEST TASK

---

## Deployment

Clone repository to HERD directory

- `composer install`
- `cp .env.example .env`
- `docker-compose up`

## Setup

- `php artisan key:generate`
- `php artisan storage:link`
- `php artisan migrate --seed`

## Credentials

- Login `admin@me.com`
- Password `admin@me.com`

## API endpoints

`*` - Required field

### Auth

#### Get token

- `POST` - `/api/auth/login`

#### Get current user

- `GET` - `/api/auth/user`

#### Logout

- `GET` - `/api/auth/user`

### Authors

#### Get authors

Parameters: `page=1` `perPage=15`

- `GET` - `/api/authors`

#### Get author details

- `GET` - `/api/authors/:id`

#### Create author

Body: `first_name*` `last_name*` `father_name`

- `POST` - `/api/authors`

#### Update author

Body: `first_name*` `last_name*` `father_name`

- `PUT` - `/api/authors/:id`

#### Delete author

- `DELETE` - `/api/authors/:id`

### Books

#### Get books

Parameters: `page=1` `perPage=15`

- `GET` - `/api/books`

#### Get book details

- `GET` - `/api/books/:id`

#### Create book

Body: `title*` `desc` `published_at*` `image*` `authors[]*`

- `POST` - `/api/books`

#### Update book

Body: `title*` `desc` `published_at*` `image*` `authors[]*`

- `PUT` - `/api/books/:id`

#### Delete book

- `DELETE` - `/api/books/:id`

### Search

Parameters: `q=`

- `GET` - `/api/search`
