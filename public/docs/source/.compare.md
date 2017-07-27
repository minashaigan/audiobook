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
<!-- START_4fb2c254627b68c503474f58f915ec4a -->
## Display a listing of the authors.

> Example request:

```bash
curl -X GET "http://localhost/api/v1/authors" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/authors",
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
                "introduction": null,
                "birth_date": null,
                "death_date": null,
                "image": null,
                "nation": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "genres": "genre1,genre2,genre3",
                "rate": 2.5
            },
            {
                "id": 2,
                "name": "author2",
                "introduction": "intro1",
                "birth_date": null,
                "death_date": null,
                "image": null,
                "nation": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "genres": "genre1,genre5",
                "rate": 0
            },
            {
                "id": 3,
                "name": "author3",
                "introduction": "intro2",
                "birth_date": 1200,
                "death_date": null,
                "image": null,
                "nation": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "genres": "",
                "rate": 0
            },
            {
                "id": 4,
                "name": "author4",
                "introduction": "intro3",
                "birth_date": 1300,
                "death_date": 1400,
                "image": null,
                "nation": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "genres": "",
                "rate": 0
            },
            {
                "id": 5,
                "name": "author5",
                "introduction": "intro4",
                "birth_date": 1400,
                "death_date": 1500,
                "image": null,
                "nation": "nationality",
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "genres": "",
                "rate": 5
            }
        ],
        "top_authors": [
            "author5"
        ]
    },
    "result": 1,
    "description": "list of authors",
    "message": "success"
}
```

### HTTP Request
`GET api/v1/authors`

`HEAD api/v1/authors`


<!-- END_4fb2c254627b68c503474f58f915ec4a -->

<!-- START_bb66c2842c782ae26d9782d21e5a15b2 -->
## Display the specified author.

> Example request:

```bash
curl -X GET "http://localhost/api/v1/authors/{author}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/authors/{author}",
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
            "introduction": null,
            "birth_date": null,
            "death_date": null,
            "image": null,
            "nation": null,
            "created_at": null,
            "updated_at": null,
            "deleted_at": null,
            "books": [
                {
                    "id": 1,
                    "name": "book1",
                    "description": null,
                    "time": "2 ساعت و 26 دقیقه",
                    "page_number": null,
                    "publisher": "publisher",
                    "audio_publisher": null,
                    "publish_year": 1396,
                    "audio_publish_year": null,
                    "language": null,
                    "summary": null,
                    "file": "file1.pdf",
                    "file_size": null,
                    "image": null,
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null,
                    "authors": "author1,author2,author3",
                    "narrators": "narrator1,narrator2",
                    "genres": "genre1,genre2,genre3",
                    "rate": 1.5,
                    "pivot": {
                        "author_id": 1,
                        "book_id": 1
                    }
                },
                {
                    "id": 2,
                    "name": "book2",
                    "description": null,
                    "time": "3 ساعت و 26 دقیقه",
                    "page_number": null,
                    "publisher": "publisher",
                    "audio_publisher": null,
                    "publish_year": 1397,
                    "audio_publish_year": null,
                    "language": null,
                    "summary": null,
                    "file": "file2.pdf",
                    "file_size": null,
                    "image": null,
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null,
                    "authors": "author1,author5",
                    "narrators": "narrator1",
                    "genres": "genre1,genre5",
                    "rate": 4,
                    "pivot": {
                        "author_id": 1,
                        "book_id": 2
                    }
                }
            ],
            "genres": "genre1,genre2,genre3",
            "rate": 2.5,
            "related_author": {
                "1": "author2"
            },
            "reviews": [
                {
                    "id": 1,
                    "name": "user1",
                    "email": "user1@yahoo.com",
                    "image": null,
                    "activated": 1,
                    "api_token": "Ur2jwparrXpPO5SsVwr1XuNlK5BlMu0X2k2KkJQM30PDpeCPaaH5lWgBpPC9",
                    "created_at": null,
                    "updated_at": null,
                    "pivot": {
                        "author_id": 1,
                        "user_id": 1,
                        "comment": "co1",
                        "rate": 1,
                        "enable": 1,
                        "created_at": null,
                        "updated_at": null
                    }
                },
                {
                    "id": 2,
                    "name": "user2",
                    "email": "user2@yahoo.com",
                    "image": null,
                    "activated": 0,
                    "api_token": "Ur2jwparrXpPO5SsVwr1XuNlK5BlMu0X2k2KkJQM30PDpeCPaaH5lWgBpPC9111",
                    "created_at": null,
                    "updated_at": null,
                    "pivot": {
                        "author_id": 1,
                        "user_id": 2,
                        "comment": "co4",
                        "rate": 4,
                        "enable": 1,
                        "created_at": null,
                        "updated_at": null
                    }
                }
            ]
        }
    },
    "result": 1,
    "description": "an author",
    "message": "success"
}
```

### HTTP Request
`GET api/v1/authors/{author}`

`HEAD api/v1/authors/{author}`


<!-- END_bb66c2842c782ae26d9782d21e5a15b2 -->

<!-- START_f477b3ff382e2000e9a5f9b2630e470f -->
## Search the specified author with his related tags, genres, books, name

> Example request:

```bash
curl -X GET "http://localhost/api/v1/searchAuthor" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/searchAuthor",
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
`GET api/v1/searchAuthor`

`HEAD api/v1/searchAuthor`


<!-- END_f477b3ff382e2000e9a5f9b2630e470f -->

#Book

all functions about books :
     to show all books , top books with their information
     to show specified book and related information

Class BookController
<!-- START_81570fe29be54336ca67a7f3c307e51d -->
## Display a listing of the books.

> Example request:

```bash
curl -X GET "http://localhost/api/v1/books" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/books",
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
                "description": null,
                "time": "2 ساعت و 26 دقیقه",
                "page_number": null,
                "publisher": "publisher",
                "audio_publisher": null,
                "publish_year": 1396,
                "audio_publish_year": null,
                "language": null,
                "summary": null,
                "file": "file1.pdf",
                "file_size": null,
                "image": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "authors": "author1,author2,author3",
                "narrators": "narrator1,narrator2",
                "genres": "genre1,genre2,genre3",
                "rate": 1.5
            },
            {
                "id": 2,
                "name": "book2",
                "description": null,
                "time": "3 ساعت و 26 دقیقه",
                "page_number": null,
                "publisher": "publisher",
                "audio_publisher": null,
                "publish_year": 1397,
                "audio_publish_year": null,
                "language": null,
                "summary": null,
                "file": "file2.pdf",
                "file_size": null,
                "image": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "authors": "author1,author5",
                "narrators": "narrator1",
                "genres": "genre1,genre5",
                "rate": 4
            },
            {
                "id": 3,
                "name": "book3",
                "description": null,
                "time": "4 ساعت و 26 دقیقه",
                "page_number": null,
                "publisher": "publisher",
                "audio_publisher": null,
                "publish_year": 1398,
                "audio_publish_year": null,
                "language": null,
                "summary": null,
                "file": "file3.pdf",
                "file_size": null,
                "image": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "authors": "",
                "narrators": "",
                "genres": "genre2,genre3,genre4",
                "rate": 0
            },
            {
                "id": 4,
                "name": "book4",
                "description": null,
                "time": "5 ساعت و 26 دقیقه",
                "page_number": null,
                "publisher": "publisher",
                "audio_publisher": null,
                "publish_year": 1399,
                "audio_publish_year": null,
                "language": null,
                "summary": null,
                "file": "file4.pdf",
                "file_size": null,
                "image": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "authors": "",
                "narrators": "",
                "genres": "genre4,genre5",
                "rate": 0
            },
            {
                "id": 5,
                "name": "book5",
                "description": null,
                "time": "6 ساعت و 26 دقیقه",
                "page_number": null,
                "publisher": "publisher",
                "audio_publisher": null,
                "publish_year": 1400,
                "audio_publish_year": null,
                "language": null,
                "summary": null,
                "file": "file5.pdf",
                "file_size": null,
                "image": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "authors": "",
                "narrators": "",
                "genres": "",
                "rate": 0
            }
        ],
        "top_books": [
            "book2"
        ]
    },
    "result": 1,
    "description": "list of books",
    "message": "success"
}
```

### HTTP Request
`GET api/v1/books`

`HEAD api/v1/books`


<!-- END_81570fe29be54336ca67a7f3c307e51d -->

<!-- START_a5bf2d508ab578edc135a330ff7e0479 -->
## Display the specified book.

> Example request:

```bash
curl -X GET "http://localhost/api/v1/books/{book}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/books/{book}",
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
            "description": null,
            "time": "2 ساعت و 26 دقیقه",
            "page_number": null,
            "publisher": "publisher",
            "audio_publisher": null,
            "publish_year": 1396,
            "audio_publish_year": null,
            "language": null,
            "summary": null,
            "file": "file1.pdf",
            "file_size": null,
            "image": null,
            "created_at": null,
            "updated_at": null,
            "deleted_at": null,
            "authors": "author1,author2,author3",
            "narrators": "narrator1,narrator2",
            "genres": "genre1,genre2,genre3",
            "rate": 1.5,
            "sections": [
                {
                    "id": 1,
                    "chapter_number": 1,
                    "chapter_name": "chap1",
                    "time": "8 ساعت و 30 دقیقه",
                    "file": "chap_file1.pdf",
                    "book_id": 1,
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null
                },
                {
                    "id": 2,
                    "chapter_number": 2,
                    "chapter_name": "chap2",
                    "time": "9 ساعت و 30 دقیقه",
                    "file": "chap_file2.pdf",
                    "book_id": 1,
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null
                },
                {
                    "id": 3,
                    "chapter_number": 3,
                    "chapter_name": "chap3",
                    "time": "10 ساعت و 30 دقیقه",
                    "file": "chap_file3.pdf",
                    "book_id": 1,
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null
                },
                {
                    "id": 4,
                    "chapter_number": 4,
                    "chapter_name": "chap4",
                    "time": "11 ساعت و 30 دقیقه",
                    "file": "chap_file4.pdf",
                    "book_id": 1,
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null
                },
                {
                    "id": 5,
                    "chapter_number": 5,
                    "chapter_name": "chap5",
                    "time": "12 ساعت و 30 دقیقه",
                    "file": "chap_file5.pdf",
                    "book_id": 1,
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null
                }
            ],
            "related_book": {
                "1": "book2",
                "2": "book3"
            },
            "reviews": [
                {
                    "id": 1,
                    "name": "user1",
                    "email": "user1@yahoo.com",
                    "image": null,
                    "activated": 1,
                    "api_token": "Ur2jwparrXpPO5SsVwr1XuNlK5BlMu0X2k2KkJQM30PDpeCPaaH5lWgBpPC9",
                    "created_at": null,
                    "updated_at": null,
                    "pivot": {
                        "book_id": 1,
                        "user_id": 1,
                        "comment": "co1",
                        "rate": 2,
                        "enable": 1,
                        "created_at": null,
                        "updated_at": null
                    }
                },
                {
                    "id": 2,
                    "name": "user2",
                    "email": "user2@yahoo.com",
                    "image": null,
                    "activated": 0,
                    "api_token": "Ur2jwparrXpPO5SsVwr1XuNlK5BlMu0X2k2KkJQM30PDpeCPaaH5lWgBpPC9111",
                    "created_at": null,
                    "updated_at": null,
                    "pivot": {
                        "book_id": 1,
                        "user_id": 2,
                        "comment": "co5",
                        "rate": 1,
                        "enable": 1,
                        "created_at": null,
                        "updated_at": null
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
`GET api/v1/books/{book}`

`HEAD api/v1/books/{book}`


<!-- END_a5bf2d508ab578edc135a330ff7e0479 -->

<!-- START_6908f9a211388c62f49e9828346a3961 -->
## Search the specified book with its related authors, narrators, genres, tags, name

> Example request:

```bash
curl -X GET "http://localhost/api/v1/searchBook" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/searchBook",
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
`GET api/v1/searchBook`

`HEAD api/v1/searchBook`


<!-- END_6908f9a211388c62f49e9828346a3961 -->

#Narrator

 all functions about narrators :
     to show all narrators , top narrators with their information
     to show specified narrator and related information

Class NarratorController
<!-- START_b783e569ca5864fedcc5f114b0e0c3e0 -->
## Display a listing of the narrators.

> Example request:

```bash
curl -X GET "http://localhost/api/v1/narrators" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/narrators",
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
        "narrators": [
            {
                "id": 1,
                "name": "narrator1",
                "introduction": null,
                "image": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "genres": "genre1,genre2,genre3",
                "rate": 2.5
            },
            {
                "id": 2,
                "name": "narrator2",
                "introduction": "intro1",
                "image": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "genres": "genre1,genre5",
                "rate": 2.5
            }
        ],
        "top_narrators": []
    },
    "result": 1,
    "description": "list of narrators",
    "message": "success"
}
```

### HTTP Request
`GET api/v1/narrators`

`HEAD api/v1/narrators`


<!-- END_b783e569ca5864fedcc5f114b0e0c3e0 -->

<!-- START_c5e20b85cb81683494fa19a5ce7c6683 -->
## Display the specified narrator.

> Example request:

```bash
curl -X GET "http://localhost/api/v1/narrators/{narrator}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/narrators/{narrator}",
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
        "narrator": {
            "id": 1,
            "name": "narrator1",
            "introduction": null,
            "image": null,
            "created_at": null,
            "updated_at": null,
            "deleted_at": null,
            "books": [
                {
                    "id": 1,
                    "name": "book1",
                    "description": null,
                    "time": "2 ساعت و 26 دقیقه",
                    "page_number": null,
                    "publisher": "publisher",
                    "audio_publisher": null,
                    "publish_year": 1396,
                    "audio_publish_year": null,
                    "language": null,
                    "summary": null,
                    "file": "file1.pdf",
                    "file_size": null,
                    "image": null,
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null,
                    "authors": "author1,author2,author3",
                    "narrators": "narrator1,narrator2",
                    "genres": "genre1,genre2,genre3",
                    "rate": 1.5,
                    "pivot": {
                        "narrator_id": 1,
                        "book_id": 1
                    }
                },
                {
                    "id": 2,
                    "name": "book2",
                    "description": null,
                    "time": "3 ساعت و 26 دقیقه",
                    "page_number": null,
                    "publisher": "publisher",
                    "audio_publisher": null,
                    "publish_year": 1397,
                    "audio_publish_year": null,
                    "language": null,
                    "summary": null,
                    "file": "file2.pdf",
                    "file_size": null,
                    "image": null,
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null,
                    "authors": "author1,author5",
                    "narrators": "narrator1",
                    "genres": "genre1,genre5",
                    "rate": 4,
                    "pivot": {
                        "narrator_id": 1,
                        "book_id": 2
                    }
                }
            ],
            "genres": "genre1,genre2,genre3",
            "rate": 2.5,
            "related_narrator": {
                "1": "narrator2"
            },
            "reviews": [
                {
                    "id": 1,
                    "name": "user1",
                    "email": "user1@yahoo.com",
                    "image": null,
                    "activated": 1,
                    "api_token": "Ur2jwparrXpPO5SsVwr1XuNlK5BlMu0X2k2KkJQM30PDpeCPaaH5lWgBpPC9",
                    "created_at": null,
                    "updated_at": null,
                    "pivot": {
                        "narrator_id": 1,
                        "user_id": 1,
                        "comment": "co1",
                        "rate": 1,
                        "enable": 1,
                        "created_at": null,
                        "updated_at": null
                    }
                },
                {
                    "id": 2,
                    "name": "user2",
                    "email": "user2@yahoo.com",
                    "image": null,
                    "activated": 0,
                    "api_token": "Ur2jwparrXpPO5SsVwr1XuNlK5BlMu0X2k2KkJQM30PDpeCPaaH5lWgBpPC9111",
                    "created_at": null,
                    "updated_at": null,
                    "pivot": {
                        "narrator_id": 1,
                        "user_id": 2,
                        "comment": "co4",
                        "rate": 4,
                        "enable": 1,
                        "created_at": null,
                        "updated_at": null
                    }
                }
            ]
        }
    },
    "result": 1,
    "description": "a narrator",
    "message": "success"
}
```

### HTTP Request
`GET api/v1/narrators/{narrator}`

`HEAD api/v1/narrators/{narrator}`


<!-- END_c5e20b85cb81683494fa19a5ce7c6683 -->

<!-- START_e7e056b576305480bea6450780509a89 -->
## Search the specified narrator with his related genres, books, tags, name.

> Example request:

```bash
curl -X GET "http://localhost/api/v1/searchNarrator" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/searchNarrator",
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
`GET api/v1/searchNarrator`

`HEAD api/v1/searchNarrator`


<!-- END_e7e056b576305480bea6450780509a89 -->

#Subscription

 all functions about subscriptions :
     to show all subscriptions , top subscription by number users use that subscription with their information
     to show specified subscription and related information

Class SubscriptionController
<!-- START_46dcd308965b0b9fd76e9440ef86abcd -->
## Display a listing of the subscriptions.

> Example request:

```bash
curl -X GET "http://localhost/api/v1/subscriptions" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/subscriptions",
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
                "name": null,
                "subscription": null,
                "type": 0,
                "price": 100,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "type_name": "روزانه",
                "users_number": 2
            },
            {
                "id": 2,
                "name": null,
                "subscription": null,
                "type": 0,
                "price": 200,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "type_name": "روزانه",
                "users_number": 1
            },
            {
                "id": 3,
                "name": null,
                "subscription": null,
                "type": 1,
                "price": 300,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "type_name": "هفتگی",
                "users_number": 1
            },
            {
                "id": 4,
                "name": null,
                "subscription": null,
                "type": 2,
                "price": 400,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "type_name": "ماهانه",
                "users_number": 0
            },
            {
                "id": 5,
                "name": null,
                "subscription": null,
                "type": 3,
                "price": 500,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "type_name": "سالانه",
                "users_number": 1
            }
        ]
    },
    "result": 1,
    "description": "list of subscriptions with number of users that buy that subscription",
    "message": "success"
}
```

### HTTP Request
`GET api/v1/subscriptions`

`HEAD api/v1/subscriptions`


<!-- END_46dcd308965b0b9fd76e9440ef86abcd -->

<!-- START_d398888f170a89ff50e3021d8f88fd18 -->
## Display the specified subscription.

> Example request:

```bash
curl -X GET "http://localhost/api/v1/subscriptions/{subscription}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/subscriptions/{subscription}",
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
null
```

### HTTP Request
`GET api/v1/subscriptions/{subscription}`

`HEAD api/v1/subscriptions/{subscription}`


<!-- END_d398888f170a89ff50e3021d8f88fd18 -->

#User

all related operations to specified user

Class UserController
<!-- START_82703f5860426190c1aec309db25fa45 -->
## register specified user

> Example request:

```bash
curl -X GET "http://localhost/api/v1/register" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/register",
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
`GET api/v1/register`

`HEAD api/v1/register`


<!-- END_82703f5860426190c1aec309db25fa45 -->

<!-- START_6fe98d7ced9bf8a790a2e2c2cb69689c -->
## login specified user

> Example request:

```bash
curl -X GET "http://localhost/api/v1/login" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/login",
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
`GET api/v1/login`

`HEAD api/v1/login`


<!-- END_6fe98d7ced9bf8a790a2e2c2cb69689c -->

<!-- START_394d402f1e299237fa88b4466e18226b -->
## logout specified user

> Example request:

```bash
curl -X GET "http://localhost/api/v1/logout" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/logout",
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
    "description": "authentication failed",
    "message": "Token Not Created"
}
```

### HTTP Request
`GET api/v1/logout`

`HEAD api/v1/logout`


<!-- END_394d402f1e299237fa88b4466e18226b -->

<!-- START_a00ddcb2bce017ca893fb5d0e8a26508 -->
## buy specified subscription

> Example request:

```bash
curl -X GET "http://localhost/api/v1/subscriptions/buy/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/subscriptions/buy/{id}",
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
null
```

### HTTP Request
`GET api/v1/subscriptions/buy/{id}`

`HEAD api/v1/subscriptions/buy/{id}`


<!-- END_a00ddcb2bce017ca893fb5d0e8a26508 -->

<!-- START_2633cc70ba1956ea8dded5a24553d5b3 -->
## verify bought subscription

> Example request:

```bash
curl -X POST "http://localhost/api/v1/subscriptions/verify" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/subscriptions/verify",
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
`POST api/v1/subscriptions/verify`


<!-- END_2633cc70ba1956ea8dded5a24553d5b3 -->

<!-- START_e507ffcda3a937b22a5970cdefea7032 -->
## get specified book by subscription the user bought

> Example request:

```bash
curl -X GET "http://localhost/api/v1/books/get/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/books/get/{id}",
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
`GET api/v1/books/get/{id}`

`HEAD api/v1/books/get/{id}`


<!-- END_e507ffcda3a937b22a5970cdefea7032 -->

<!-- START_1cbac528a51511bb73d9f23557c22220 -->
## add new wish book

> Example request:

```bash
curl -X GET "http://localhost/api/v1/books/wish/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/books/wish/{id}",
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
`GET api/v1/books/wish/{id}`

`HEAD api/v1/books/wish/{id}`


<!-- END_1cbac528a51511bb73d9f23557c22220 -->

<!-- START_81f37b479d4dcd6728b3126f273fd667 -->
## add new genre for user

> Example request:

```bash
curl -X GET "http://localhost/api/v1/genres/get/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/genres/get/{id}",
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
`GET api/v1/genres/get/{id}`

`HEAD api/v1/genres/get/{id}`


<!-- END_81f37b479d4dcd6728b3126f273fd667 -->

<!-- START_687be18b8fdde1b85f8e63f1c70a7a5c -->
## change password

> Example request:

```bash
curl -X GET "http://localhost/api/v1/password/change" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/password/change",
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
`GET api/v1/password/change`

`HEAD api/v1/password/change`


<!-- END_687be18b8fdde1b85f8e63f1c70a7a5c -->

<!-- START_df7685810b87ea446da1641963360da6 -->
## upload photo

> Example request:

```bash
curl -X GET "http://localhost/api/v1/image/upload" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/image/upload",
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
`GET api/v1/image/upload`

`HEAD api/v1/image/upload`


<!-- END_df7685810b87ea446da1641963360da6 -->

