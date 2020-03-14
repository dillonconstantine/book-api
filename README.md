# Book API

Book API is built with the [Laravel](https://github.com/laravel/laravel) framework and makes use of the [Laravel Passport](https://github.com/laravel/passport) package to provide a full OAuth2 server implementation.

It makes use of a number of Laravel features such as form requests, API resources and custom middleware, and uses unit testing.

It follows the [JSON:API](https://jsonapi.org/format/) specification for building APIs in JSON, and was built as a project to demonstrate my knowledge of RESTful APIs.

## Getting An Access Token

To get an access token you can do so via the API as shown below or alternatively you can head over to [https://book-api.dillonconstantine.com/](https://book-api.dillonconstantine.com/) and generate an access token.

The following headers need to be provided if getting an access token via the API:

```
Accept: application/json
X-Requested-With: XMLHttpRequest
```

### Register

* **HTTP Request**

  `POST` /api/auth/register

* **Sample Call**

```javascript
{
    "name": "John Doe",
    "email": "example@gmail.com",
    "password": "12345678",
    "password_confirmation": "12345678"
}
```

### Login

* **HTTP Request**

  `POST` /api/auth/login

* **Sample Call**

```javascript
{
    "email": "example@gmail.com",
    "password": "12345678"
}
```

## Requests

`GET` and `DEL` requests need to be sent with the following headers:

```
Authorization: Bearer access-key-here
Accept: application/vnd.api+json
```

`POST` and `PATCH` requests need to provide the following header in addition:

```
Content-Type: application/vnd.api+json
```

### Retrieve All Books

* **HTTP Request**

  `GET` /api/books/

### Retrieve Single Book

* **HTTP Request**

  `GET` /api/books/{id}

### Store A Book

* **HTTP Request**

  `POST` /api/books/

* **Sample Call**

```javascript
{
    "data": {
        "type": "books",
        "attributes": {
            "title": "Aspernatur Nulla Dolore",
            "author": "Natasha Phillips",
            "released": "1995-06-24"
        }
    }
}
```

### Update A Book

* **HTTP Request**

  `PATCH` /api/books/{id}

* **Sample Call**

```javascript
    {
        "data": {
            "type": "books",
            "id": "5ead8c4a-6b1b-43ac-ba26-a0a7cdcbf701"
            "attributes": {
                "released": "1998-12-30",
            }
        }
    }
```

### Delete A Book

* **HTTP Request**

  `DEL` /api/books/{id}

## To-do

* Add an author resource and implement a relationship between the book and author resources based on the JSON:API specification.

* Implement returning only specific fields for example:\
  `GET` /books?fields[books]=author

* Implement sorting for example:\
  `GET` /api/book?sort=released

* General polishing and testing.

## Software

### Frameworks & Libraries

* Laravel (PHP)

### Other

* Laravel Passport

## Notes

For the purpose of accessibility of the project, email verification and password resets are not active.
