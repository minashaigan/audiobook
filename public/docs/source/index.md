---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)
<!-- END_INFO -->

#Author

 all functions about authors :
     to show all authors , top authors with their information
     to show specified author and related information
<!-- START_95699a9074268cd7aa7e621af899a9be -->
## Author List

Display a listing of the authors.

> Example request:

```bash
curl -X GET "http://localhost:8000/api/authors" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/authors",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "authors": [
            {
                "id": 1,
                "name": "author1",
                "introduction": "i'm an author",
                "birth_date": 1392,
                "death_date": 1450,
                "image": "authors\/July2017\/vSm5qpNBJ8vw5v7a6wGz.png",
                "nation": "iranian",
                "created_at": "2017-07-27 17:18:21",
                "updated_at": "2017-07-27 17:18:21",
                "deleted_at": null,
                "genres": "",
                "rate": 0
            }
        ],
        "top_authors": []
    },
    "result": 1,
    "description": "list of authors",
    "message": "success"
}
```

### HTTP Request
`GET api/authors`

`HEAD api/authors`


<!-- END_95699a9074268cd7aa7e621af899a9be -->

<!-- START_31c161d4e2e8dd0cef72967cb4f6a4af -->
## Author

Display the specified author.

> Example request:

```bash
curl -X GET "http://localhost:8000/api/authors/{author}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/authors/{author}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "author": {
            "id": 1,
            "name": "author1",
            "introduction": "i'm an author",
            "birth_date": 1392,
            "death_date": 1450,
            "image": "authors\/July2017\/vSm5qpNBJ8vw5v7a6wGz.png",
            "nation": "iranian",
            "created_at": "2017-07-27 17:18:21",
            "updated_at": "2017-07-27 17:18:21",
            "deleted_at": null,
            "books": [],
            "genres": "",
            "rate": 0,
            "related_author": [],
            "reviews": []
        }
    },
    "result": 1,
    "description": "an author",
    "message": "success"
}
```

### HTTP Request
`GET api/authors/{author}`

`HEAD api/authors/{author}`


<!-- END_31c161d4e2e8dd0cef72967cb4f6a4af -->

<!-- START_c5243d0dc9718c136d93ada58f330b62 -->
## Author Search

Search the specified author with his related tags, genres, books, name

> Example request:

```bash
curl -X GET "http://localhost:8000/api/searchAuthor" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/searchAuthor",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "search_result": []
    },
    "result": 1,
    "description": "list of authors by searching",
    "message": "success"
}
```

### HTTP Request
`GET api/searchAuthor`

`HEAD api/searchAuthor`


<!-- END_c5243d0dc9718c136d93ada58f330b62 -->

#Book

all functions about books :
     to show all books , top books with their information
     to show specified book and related information

Class BookController
<!-- START_eb8df775503b6007bbbaeec13534e2e0 -->
## Book List

Display a listing of the books.

> Example request:

```bash
curl -X GET "http://localhost:8000/api/books" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/books",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "books": [
            {
                "id": 1,
                "name": "book1",
                "description": "a novel",
                "time": "2 ساعت و 30 دقیقه",
                "page_number": 50,
                "publisher": "publisher",
                "audio_publisher": "audio publisher",
                "publish_year": 1345,
                "audio_publish_year": null,
                "language": "فارسی",
                "summary": "summary summary summary summary",
                "file": "books\/July2017\/OMfcVaYKOAd6vjDNqW6P.wma",
                "file_size": "300 Mb",
                "image": "books\/July2017\/37eEuUV3UjSUPj504yKO.png",
                "created_at": "2017-07-27 17:24:00",
                "updated_at": "2017-07-27 20:34:51",
                "deleted_at": null,
                "authors": "",
                "narrators": "",
                "genres": "",
                "rate": 3
            }
        ],
        "top_books": []
    },
    "result": 1,
    "description": "list of books",
    "message": "success"
}
```

### HTTP Request
`GET api/books`

`HEAD api/books`


<!-- END_eb8df775503b6007bbbaeec13534e2e0 -->

<!-- START_5037bf4b2967efcaf3ff9ef1ac4dd532 -->
## Book

Display the specified book.

> Example request:

```bash
curl -X GET "http://localhost:8000/api/books/{book}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/books/{book}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "book": {
            "id": 1,
            "name": "book1",
            "description": "a novel",
            "time": "2 ساعت و 30 دقیقه",
            "page_number": 50,
            "publisher": "publisher",
            "audio_publisher": "audio publisher",
            "publish_year": 1345,
            "audio_publish_year": null,
            "language": "فارسی",
            "summary": "summary summary summary summary",
            "file": "books\/July2017\/OMfcVaYKOAd6vjDNqW6P.wma",
            "file_size": "300 Mb",
            "image": "books\/July2017\/37eEuUV3UjSUPj504yKO.png",
            "created_at": "2017-07-27 17:24:00",
            "updated_at": "2017-07-27 20:34:51",
            "deleted_at": null,
            "authors": "",
            "narrators": "",
            "genres": "",
            "rate": 3,
            "sections": [],
            "related_book": [],
            "reviews": [
                {
                    "id": 1,
                    "role_id": 1,
                    "name": "user1",
                    "email": "user1@yahoo.com",
                    "avatar": null,
                    "image": null,
                    "activated": 1,
                    "api_token": "Ur2jwparrXpPO5SsVwr1XuNlK5BlMu0X2k2KkJQM30PDpeCPaaH5lWgBpPC9",
                    "created_at": null,
                    "updated_at": "2017-07-27 15:21:33",
                    "pivot": {
                        "book_id": 1,
                        "user_id": 1,
                        "comment": "comment1",
                        "rate": 3,
                        "enable": 1,
                        "created_at": "2017-07-27 21:30:20",
                        "updated_at": "2017-07-27 21:30:20"
                    }
                }
            ]
        }
    },
    "result": 1,
    "description": "a book",
    "message": "success"
}
```

### HTTP Request
`GET api/books/{book}`

`HEAD api/books/{book}`


<!-- END_5037bf4b2967efcaf3ff9ef1ac4dd532 -->

<!-- START_e1389f5a84f5c6031bc7e0d914f4bed3 -->
## Book Search

Search the specified book with its related authors, narrators, genres, tags, name

> Example request:

```bash
curl -X GET "http://localhost:8000/api/searchBook" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/searchBook",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "search_result": []
    },
    "result": 1,
    "description": "list of books by searching",
    "message": "success"
}
```

### HTTP Request
`GET api/searchBook`

`HEAD api/searchBook`


<!-- END_e1389f5a84f5c6031bc7e0d914f4bed3 -->

#Narrator

 all functions about narrators :
     to show all narrators , top narrators with their information
     to show specified narrator and related information

Class NarratorController
<!-- START_29200ac93238b2ac71316c507adba351 -->
## Narrator List

Display a listing of the narrators.

> Example request:

```bash
curl -X GET "http://localhost:8000/api/narrators" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/narrators",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "narrators": [],
        "top_narrators": []
    },
    "result": 1,
    "description": "list of narrators",
    "message": "success"
}
```

### HTTP Request
`GET api/narrators`

`HEAD api/narrators`


<!-- END_29200ac93238b2ac71316c507adba351 -->

<!-- START_826cfaa3f91071b9fe221ad757cbc54d -->
## Narrator

Display the specified narrator.

> Example request:

```bash
curl -X GET "http://localhost:8000/api/narrators/{narrator}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/narrators/{narrator}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": [],
    "result": 0,
    "description": "wrong narrator id ",
    "message": "failed"
}
```

### HTTP Request
`GET api/narrators/{narrator}`

`HEAD api/narrators/{narrator}`


<!-- END_826cfaa3f91071b9fe221ad757cbc54d -->

<!-- START_eb57e186156403f743a9f8b92af72736 -->
## Narrator Search

Search the specified narrator with his related genres, books, tags, name.

> Example request:

```bash
curl -X GET "http://localhost:8000/api/searchNarrator" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/searchNarrator",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "search_result": []
    },
    "result": 1,
    "description": "list of narrators by searching",
    "message": "success"
}
```

### HTTP Request
`GET api/searchNarrator`

`HEAD api/searchNarrator`


<!-- END_eb57e186156403f743a9f8b92af72736 -->

#Subscription

 all functions about subscriptions :
     to show all subscriptions , top subscription by number users use that subscription with their information
     to show specified subscription and related information

Class SubscriptionController
<!-- START_1d2b5f6e73105787201d992da63ae7e7 -->
## Subscription List

Display a listing of the subscriptions.

> Example request:

```bash
curl -X GET "http://localhost:8000/api/subscriptions" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/subscriptions",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "subscriptions": [
            {
                "id": 1,
                "name": "subscription 1",
                "subscription": null,
                "type": 0,
                "price": 12000,
                "created_at": "2017-07-30 08:22:58",
                "updated_at": "2017-07-30 08:22:58",
                "deleted_at": null,
                "type_name": "روزانه",
                "users_number": 0
            },
            {
                "id": 2,
                "name": null,
                "subscription": null,
                "type": 2,
                "price": 120000,
                "created_at": "2017-07-30 08:41:17",
                "updated_at": "2017-07-30 08:41:17",
                "deleted_at": null,
                "type_name": "ماهانه",
                "users_number": 0
            },
            {
                "id": 3,
                "name": null,
                "subscription": null,
                "type": 1,
                "price": 11,
                "created_at": "2017-07-30 08:42:45",
                "updated_at": "2017-07-30 08:42:45",
                "deleted_at": null,
                "type_name": "هفتگی",
                "users_number": 0
            },
            {
                "id": 4,
                "name": null,
                "subscription": null,
                "type": 1,
                "price": 34600,
                "created_at": "2017-07-30 08:43:05",
                "updated_at": "2017-07-30 08:43:05",
                "deleted_at": null,
                "type_name": "هفتگی",
                "users_number": 0
            }
        ]
    },
    "result": 1,
    "description": "list of subscriptions with number of users that buy that subscription",
    "message": "success"
}
```

### HTTP Request
`GET api/subscriptions`

`HEAD api/subscriptions`


<!-- END_1d2b5f6e73105787201d992da63ae7e7 -->

<!-- START_4ba9f3f36998228e7204bdbe0dc80f5d -->
## Subscription

Display the specified subscription.

> Example request:

```bash
curl -X GET "http://localhost:8000/api/subscriptions/{subscription}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/subscriptions/{subscription}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "subscriptions": {
            "id": 1,
            "name": "subscription 1",
            "subscription": null,
            "type": 0,
            "price": 12000,
            "created_at": "2017-07-30 08:22:58",
            "updated_at": "2017-07-30 08:22:58",
            "deleted_at": null,
            "type_name": "روزانه",
            "users_number": 0
        }
    },
    "result": 1,
    "description": "list of subscriptions with number of users that buy that subscription",
    "message": "success"
}
```

### HTTP Request
`GET api/subscriptions/{subscription}`

`HEAD api/subscriptions/{subscription}`


<!-- END_4ba9f3f36998228e7204bdbe0dc80f5d -->

#User

all related operations to specified user

Class UserController
<!-- START_fcfeaaa7e2848c8ce08609235b28904a -->
## Register

register specified user

> Example request:

```bash
curl -X GET "http://localhost:8000/api/register" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/register",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "errors": {
            "name": [
                "وارد کردن نام شما ضروری است "
            ],
            "email": [
                "وارد کردن ایمیل شما ضروری است "
            ],
            "password": [
                "وارد کردن گذرواژه  شما ضروری است "
            ]
        }
    },
    "result": 0,
    "description": "wrong input",
    "message": "failed by Validator"
}
```

### HTTP Request
`GET api/register`

`HEAD api/register`


<!-- END_fcfeaaa7e2848c8ce08609235b28904a -->

<!-- START_10fb7d8fad114ca30c6e101867a5f70f -->
## Login

login specified user

> Example request:

```bash
curl -X GET "http://localhost:8000/api/login" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/login",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "errors": {
            "email": [
                "وارد کردن ایمیل شما ضروری است "
            ],
            "password": [
                "وارد کردن گذرواژه  شما ضروری است "
            ]
        }
    },
    "result": "0",
    "description": "wrong input",
    "message": "validator error"
}
```

### HTTP Request
`GET api/login`

`HEAD api/login`


<!-- END_10fb7d8fad114ca30c6e101867a5f70f -->

<!-- START_7e6ee60aafd6de54298e0e276a7451fe -->
## Logout

logout specified user

> Example request:

```bash
curl -X GET "http://localhost:8000/api/logout" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/logout",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": [],
    "result": 1,
    "description": "loged out",
    "message": "Token Not Created"
}
```

### HTTP Request
`GET api/logout`

`HEAD api/logout`


<!-- END_7e6ee60aafd6de54298e0e276a7451fe -->

<!-- START_d0474cc5460205e6f914e401aaeadeee -->
## Buy Subscription

buy specified subscription

> Example request:

```bash
curl -X GET "http://localhost:8000/api/subscriptions/buy/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/subscriptions/buy/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": [],
    "result": 0,
    "description": "wrong subscription id ",
    "message": "failed"
}
```

### HTTP Request
`GET api/subscriptions/buy/{id}`

`HEAD api/subscriptions/buy/{id}`


<!-- END_d0474cc5460205e6f914e401aaeadeee -->

<!-- START_91487fe4f3ca393494680430f6661ea2 -->
## Verify

verify bought subscription

> Example request:

```bash
curl -X POST "http://localhost:8000/api/subscriptions/verify" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/subscriptions/verify",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/subscriptions/verify`


<!-- END_91487fe4f3ca393494680430f6661ea2 -->

<!-- START_93fb30738cd51426e2b7af103ad4df42 -->
## Get Book

get specified book by subscription the user bought

> Example request:

```bash
curl -X GET "http://localhost:8000/api/books/get/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/books/get/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": [],
    "result": 0,
    "description": "wrong api_token ",
    "message": "failed"
}
```

### HTTP Request
`GET api/books/get/{id}`

`HEAD api/books/get/{id}`


<!-- END_93fb30738cd51426e2b7af103ad4df42 -->

<!-- START_b099fb90fee0214f6f02ecfaeb83d001 -->
## Wish Book

add new wish book

> Example request:

```bash
curl -X GET "http://localhost:8000/api/books/wish/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/books/wish/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": [],
    "result": 0,
    "description": "wrong api_token ",
    "message": "failed"
}
```

### HTTP Request
`GET api/books/wish/{id}`

`HEAD api/books/wish/{id}`


<!-- END_b099fb90fee0214f6f02ecfaeb83d001 -->

<!-- START_f2a16824dfa30dc02205915bb0101431 -->
## Get Genre

add new genre for user

> Example request:

```bash
curl -X GET "http://localhost:8000/api/genres/get/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/genres/get/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": [],
    "result": 0,
    "description": "wrong api_token ",
    "message": "failed"
}
```

### HTTP Request
`GET api/genres/get/{id}`

`HEAD api/genres/get/{id}`


<!-- END_f2a16824dfa30dc02205915bb0101431 -->

<!-- START_0a1e3650ed394f2132198f8a7225c8b3 -->
## Change Password

change password

> Example request:

```bash
curl -X GET "http://localhost:8000/api/password/change" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/password/change",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": [],
    "result": 0,
    "description": "wrong api_token ",
    "message": "failed"
}
```

### HTTP Request
`GET api/password/change`

`HEAD api/password/change`


<!-- END_0a1e3650ed394f2132198f8a7225c8b3 -->

<!-- START_8c01d5d0e13f9edb45404d25ffc1a6ce -->
## Upload Photo

upload photo

> Example request:

```bash
curl -X GET "http://localhost:8000/api/image/upload" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/image/upload",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": [],
    "result": 0,
    "description": "wrong api_token ",
    "message": "failed"
}
```

### HTTP Request
`GET api/image/upload`

`HEAD api/image/upload`


<!-- END_8c01d5d0e13f9edb45404d25ffc1a6ce -->

<!-- START_8131605db2a5916714b0e783e896f5d2 -->
## Review Book

user review specified book

> Example request:

```bash
curl -X GET "http://localhost:8000/api/books/review/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/books/review/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": [],
    "result": 0,
    "description": "wrong api_token ",
    "message": "failed"
}
```

### HTTP Request
`GET api/books/review/{id}`

`HEAD api/books/review/{id}`


<!-- END_8131605db2a5916714b0e783e896f5d2 -->

<!-- START_0659b1d9673ff310a8662b33707c4ed6 -->
## Review Author

user review specified author

> Example request:

```bash
curl -X GET "http://localhost:8000/api/authors/review/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/authors/review/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": [],
    "result": 0,
    "description": "wrong api_token ",
    "message": "failed"
}
```

### HTTP Request
`GET api/authors/review/{id}`

`HEAD api/authors/review/{id}`


<!-- END_0659b1d9673ff310a8662b33707c4ed6 -->

<!-- START_1267355dfe51119dd150606cc32f447d -->
## Review Narrator

user review specified narrator

> Example request:

```bash
curl -X GET "http://localhost:8000/api/narrators/review/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/narrators/review/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": [],
    "result": 0,
    "description": "wrong api_token ",
    "message": "failed"
}
```

### HTTP Request
`GET api/narrators/review/{id}`

`HEAD api/narrators/review/{id}`


<!-- END_1267355dfe51119dd150606cc32f447d -->

