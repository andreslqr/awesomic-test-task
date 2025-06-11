# Awesomic Test Task

<p align="center">
    <a href="https://www.awesomic.com/" target="_blank">
        <img src="https://cdn.prod.website-files.com/602d59da29b66668b8758391/67486a269b0bbc6612c7c157_awesomic-Logo-no-borders.svg" width="400" alt="Awesomic Logo">
    </a>
</p>


This is a small Tech Task to show you a little bit of my programming skills in Laravel, in this readme you will find:

- How to install and run
- Code changes and technical decisions
- Markdown API documentation
- Sample requests



## How to install and run

Use git to clone this repository in your machine:

```bash
git clone git@github.com:andreslqr/awesomic-test-task.git
```

Then enter in the project folder

```bash
cd awesomic-test-task
```

Install PHP dependencies

```bash
composer install
```

Copy .env file

```bash
cp .env.example .env
```

Create the app key

```bash
php artisan key:generate
```

There you got, application installed :)

Also if you need some dummy data you can run the seeders (by default the seeder it's gonna create 100 tasks in database):

```bash
php artisan db:seed
```


You can run the feature tests to make sure that everything works:

```bash
php artisan test
```

Or you can test this manually with postman or curl (keep reading to know the endpoints)

## Code changes and technical decisions

- The unused code from the project (like welcome page, console routes) was removed to make the project API only
- Strong typing was used in must of the code to improve readability and code editors tools
- Pest feature tests was created for better testing and a little of TDD
- For request examples I preferred use cURL instead of postman for markdown compatibility and be able to share commands to copy, paste, test
- Factories added to improve testing
- Used of repository pattern (The use repositories from beginning i think it's a good practice even when the logic it's simple)

## Markdown API documentation

Remember replace the domain for the correct one that you use in your local enviroment

### Tasks

#### `[GET]` `/api/tasks` `List and paginate the tasks`

##### Parameters

> | name | type | data type | description |
> | --- | --- | --- | --- |
> | status | nullable | string | Filter the task via status |

##### Responses

> | http code | content-type | response |
> | --- | --- | --- |
> | `200` | `application/json` | `{"data": [], "current_page": 1, "from": 1, "links": []}` |

##### Example cURL

> ```javascript
>  curl -X GET -H "Content-Type: application/json" http://awesomic.test/api/tasks
> ```


#### `[GET]` `/api/tasks/{id}` `Get the task details by id`

##### Parameters

`None`

##### Responses

> | http code | content-type | response |
> | --- | --- | --- |
> | `200` | `application/json` | `{"title": "", "description": "", "status": ""}` |
> | `404` | `application/json` | `{"message": ""}` |


##### Example cURL

> ```javascript
>  curl -X GET -H "Content-Type: application/json" http://awesomic.test/api/tasks/1
> ```

#### `[POST]` `/api/tasks` `Create a task`

##### Parameters

`None`

##### Responses

> | http code | content-type | response |
> | --- | --- | --- |
> | `200` | `application/json` | `{"id": 1, "title": "", "description": "", "status": ""}` |
> | `422` | `application/json` | `{"message":"","errors":{}}` |

##### Example cURL

> ```javascript
>  curl -X POST -H "Content-Type: application/json" --data @post.json http://awesomic.test/api/tasks/1
> ```

#### `[PUT]` `/api/tasks/{id}` `Update a task`

##### Parameters

`None`

##### Responses

> | http code | content-type | response |
> | --- | --- | --- |
> | `204` | `application/json` | None |
> | `404` | `application/json` | `{"message": ""}` |
> | `422` | `application/json` | `{"message":"","errors":{}}` |

##### Example cURL

> ```javascript
>  curl -X PUT -H "Content-Type: application/json" --data @post.json http://awesomic.test/api/tasks/1
> ```

#### `[DELETE]` `/api/tasks/{id}` `Delete a task`

##### Parameters

`None`

##### Responses

> | http code | content-type | response |
> | --- | --- | --- |
> | `204` | `application/json` | None |
> | `404` | `application/json` | `{"message": ""}` |

##### Example cURL

> ```javascript
>  curl -X DELETE -H "Content-Type: application/json" http://awesomic.test/api/tasks/1
> ```

## Sample requests (via cURL)

### `[GET]` `/api/tasks`

#### Request

```javascript
curl -X GET -H "Content-Type: application/json" http://awesomic.test/api/tasks -vvv
```
#### Response

```bash
* Host awesomic.test:80 was resolved.
* IPv6: (none)
* IPv4: 127.0.0.1
*   Trying 127.0.0.1:80...
* Connected to awesomic.test (127.0.0.1) port 80
> GET /api/tasks HTTP/1.1
> Host: awesomic.test
> User-Agent: curl/8.7.1
> Accept: */*
> Content-Type: application/json
> 
* Request completely sent off
< HTTP/1.1 200 OK
< Server: nginx/1.25.4
< Content-Type: application/json
< Transfer-Encoding: chunked
< Connection: keep-alive
< Vary: Accept-Encoding
< X-Powered-By: PHP/8.4.5
< Cache-Control: no-cache, private
< Date: Wed, 11 Jun 2025 04:54:03 GMT
< Access-Control-Allow-Origin: *
< 
{"current_page":1,"data":[{"id":3,"title":"Enim officia rerum voluptatum ad beatae adipisci.","description":"Consequatur sequi iste sed facere. Quis sit cumque accusamus non libero illum. Ut doloremque quia eius nesciunt. Atque doloribus temporibus repellat distinctio quasi consequatur et.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":4,"title":"Unde recusandae autem dolorem voluptas consequatur explicabo beatae.","description":"Alias est quo nihil sunt aut. Et asperiores ea quisquam nobis voluptatem magni. Itaque in et facere vero nostrum sequi. Voluptatum ex accusantium doloremque quaerat ex sed harum alias.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":5,"title":"Iure suscipit sunt modi perspiciatis iure doloremque.","description":"Nihil ducimus dolore sit eos possimus. Et aut saepe nesciunt veritatis perferendis sint. Debitis sed sit laborum animi et exercitationem.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":6,"title":"Est aut sunt et laborum excepturi hic.","description":"Temporibus eos quos voluptatem. Aut ut eos blanditiis aut ut minima cupiditate. Autem molestias omnis beatae.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":7,"title":"Eos sint ea est voluptas exercitationem est iste.","description":"Quidem rem voluptatem consequatur illo quod et itaque. Nemo odit ut neque ut. Nobis facilis reprehenderit accusantium.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":8,"title":"Labore omnis sit sunt inventore.","description":"Ut eum corrupti voluptates eaque. Beatae asperiores quo repellendus et. Ab aut fuga nulla consectetur.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":9,"title":"Mollitia consequatur est assumenda incidunt vel.","description":"Quisquam quibusdam illo minima qui dolorem ad nihil earum. Neque qui sint aut ducimus dolore qui.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":10,"title":"Eligendi doloremque et ducimus error qui consequatur.","description":"Facere cupiditate dolorem voluptates. Exercitationem ut ut temporibus voluptatem cum. Ut dolore voluptas ab optio laboriosam voluptas ea. Atque modi ad sed quibusdam accusantium ullam quis.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":11,"title":"Iure laudantium error accusamus reprehenderit ipsa incidunt et.","description":"Voluptatem quo consequatur harum ullam repellendus quisquam quas. Dignissimos reiciendis dolor in sit neque. Explicabo beatae est expedita quidem molestiae. Vel in et occaecati maiores voluptas officiis enim.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":12,"title":"Quaerat temporibus accusantium dolor libero cupiditate et tempore.","description":"Magnam occaecati assumenda reiciendis explicabo autem similique dolorum. Reiciendis sit dolor corporis culpa officia ut rerum. Dolores quasi ut tempore quisquam.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":13,"title":"Ipsam consectetur quis necessitatibus aut.","description":"Non minima vel totam repellat veritatis dicta qui. Ad ipsum eveniet illum esse quia atque autem. Sequi dignissimos itaque consequatur blanditiis. Perspiciatis ducimus saepe omnis voluptas et cupiditate perferendis.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":14,"title":"Saepe dolore est omnis.","description":"Voluptatem quis omnis dolor eos distinctio quos. A architecto ut eius.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":15,"title":"Harum recusandae consectetur id officiis accusantium ullam sapiente laborum.","description":"Ea sed error molestias esse accusamus est sequi et. Corporis a laboriosam sunt quis id placeat. Est in vel voluptates nulla est. Iusto labore eos eum dolorem cum veritatis aspernatur.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":16,"title":"Temporibus id illo non non.","description":"Ipsum neque libero sit alias quam maxime aut. Est quasi possimus quia voluptas occaecati porro fugit.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":17,"title":"Accusantium aliquam numquam et ea dolores beatae enim.","description":"Eum reiciendis sed vel id consequatur fugiat laborum. Pariatur officia qui unde consequatur nam numquam perferendis. Ad distinctio ut voluptate et ut est. Maiores et doloremque et sunt nobis architecto. Quasi maxime ut possimus minus odio labore.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":18,"title":"Fugiat et consequuntur quod praesentium perspiciatis eligendi omnis.","description":"Totam ea mollitia amet impedit. Ea in eos esse. Temporibus corrupti voluptas error cum et qui voluptatibus.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":19,"title":"Magnam dolores nemo sed blanditiis et quia quis illum.","description":"Iste voluptate aut fugiat animi vel eos rerum. Repudiandae ut fuga quasi corporis sit quod. Voluptatem ut dolorem libero fugit rem necessitatibus. Unde ducimus qui et ab autem quo enim. Molestias occaecati pariatur autem et eos dolor.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":20,"title":"Et atque nihil ratione distinctio ea ab consequatur.","description":"Fuga dolore eos est. Impedit aliquam iste rerum sit cum distinctio. Eum et cum dolorem. Qui neque in eaque magni dolorum.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":21,"title":"Molestias eum magnam aut delectus velit.","description":"Et iste rerum ad ex. Quia et iste fugiat qui. In omnis repellat voluptatem voluptas.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":22,"title":"Qui ullam voluptas placeat totam ullam.","description":"Labore ad praesentium qui in. Animi voluptas ut libero. Corporis veritatis est cumque qui earum animi repudiandae.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":23,"title":"Quae voluptatem quia nulla dolores qui et impedit.","description":"Odio quae ut nulla. Qui ad inventore facilis quo doloremque commodi qui. Et necessitatibus voluptas qui fugit beatae.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":24,"title":"Assumenda et ad pariatur quisquam unde recusandae voluptatem eaque.","description":"Voluptas eaque quos repudiandae. Omnis earum voluptate ut temporibus nam aspernatur nam.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":25,"title":"Hic ratione expedita consequatur quaerat temporibus rem perspiciatis.","description":"Doloribus exercitationem omnis rerum voluptatum numquam repellendus consequuntur. Quod earum occaecati et ea nihil et debitis. Quam vel error voluptas est quisquam.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":26,"title":"Reiciendis non nulla dolor aspernatur.","description":"Facere tempore repellat porro ipsum reiciendis nostrum. Consectetur quas in mollitia ut et fugiat. Voluptates soluta voluptatem consequuntur.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":27,"title":"Vitae quis rem quam earum.","description":"Ea quaerat est iusto eum reprehenderit. Sunt molestiae aliquam saepe consequatur. Et et fuga sit velit eum dicta nisi. Aut esse praesentium laboriosam et qui fugit. Quae quidem qui vel voluptatem dolore vel beatae ipsam.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":28,"title":"Omnis numquam temporibus nam.","description":"Dolorum omnis nihil voluptatem. Natus dicta necessitatibus rerum. Corporis * Connection #0 to host awesomic.test left intact
rerum non dolorum ab quia.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":29,"title":"Cumque omnis quo fugit enim.","description":"Omnis quia non consequatur. Consectetur accusamus laborum unde velit minima amet. Iusto esse dolores quibusdam. Quia ea distinctio quis.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":30,"title":"Labore corporis quia ratione eius eos sint aperiam distinctio.","description":"Numquam quos quasi odio ut labore omnis eos. Et ea voluptas ut quia in odio voluptatum. Minima veniam et commodi. Fuga omnis quis qui et sed delectus qui dolores.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":31,"title":"Et ab sint ullam mollitia sit.","description":"Delectus sint dolor culpa. Non repudiandae nemo dignissimos nobis aut. Culpa non fugit dolor omnis maiores.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":32,"title":"Sed consequatur ex quam at esse dolorem asperiores.","description":"Sed beatae fugit et distinctio et eum sint. Sapiente officia blanditiis dolores et maxime voluptas. Cum doloremque magnam corrupti fuga ut sunt rem. Eligendi deleniti repellendus non.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"}],"first_page_url":"http:\/\/awesomic.test\/api\/tasks?page=1","from":1,"last_page":4,"last_page_url":"http:\/\/awesomic.test\/api\/tasks?page=4","links":[{"url":null,"label":"&laquo; Previous","active":false},{"url":"http:\/\/awesomic.test\/api\/tasks?page=1","label":"1","active":true},{"url":"http:\/\/awesomic.test\/api\/tasks?page=2","label":"2","active":false},{"url":"http:\/\/awesomic.test\/api\/tasks?page=3","label":"3","active":false},{"url":"http:\/\/awesomic.test\/api\/tasks?page=4","label":"4","active":false},{"url":"http:\/\/awesomic.test\/api\/tasks?page=2","label":"Next &raquo;","active":false}],"next_page_url":"http:\/\/awesomic.test\/api\/tasks?page=2","path":"http:\/\/awesomic.test\/api\/tasks","per_page":30,"prev_page_url":null,"to":30,"total":98}%
```

### `[GET]` `/api/tasks?status=pending`

#### Request

```javascript
curl -X GET -H "Content-Type: application/json" http://awesomic.test/api/tasks\?status\=pending -vvv
```

#### Response

```bash
* Host awesomic.test:80 was resolved.
* IPv6: (none)
* IPv4: 127.0.0.1
*   Trying 127.0.0.1:80...
* Connected to awesomic.test (127.0.0.1) port 80
> GET /api/tasks?status=pending HTTP/1.1
> Host: awesomic.test
> User-Agent: curl/8.7.1
> Accept: */*
> Content-Type: application/json
> 
* Request completely sent off
< HTTP/1.1 200 OK
< Server: nginx/1.25.4
< Content-Type: application/json
< Transfer-Encoding: chunked
< Connection: keep-alive
< Vary: Accept-Encoding
< X-Powered-By: PHP/8.4.5
< Cache-Control: no-cache, private
< Date: Wed, 11 Jun 2025 04:56:17 GMT
< Access-Control-Allow-Origin: *
< 
{"current_page":1,"data":[{"id":3,"title":"Enim officia rerum voluptatum ad beatae adipisci.","description":"Consequatur sequi iste sed facere. Quis sit cumque accusamus non libero illum. Ut doloremque quia eius nesciunt. Atque doloribus temporibus repellat distinctio quasi consequatur et.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":4,"title":"Unde recusandae autem dolorem voluptas consequatur explicabo beatae.","description":"Alias est quo nihil sunt aut. Et asperiores ea quisquam nobis voluptatem magni. Itaque in et facere vero nostrum sequi. Voluptatum ex accusantium doloremque quaerat ex sed harum alias.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":8,"title":"Labore omnis sit sunt inventore.","description":"Ut eum corrupti voluptates eaque. Beatae asperiores quo repellendus et. Ab aut fuga nulla consectetur.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":13,"title":"Ipsam consectetur quis necessitatibus aut.","description":"Non minima vel totam repellat veritatis dicta qui. Ad ipsum eveniet illum esse quia atque autem. Sequi dignissimos itaque consequatur blanditiis. Perspiciatis ducimus saepe omnis voluptas et cupiditate perferendis.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":15,"title":"Harum recusandae consectetur id officiis accusantium ullam sapiente laborum.","description":"Ea sed error molestias esse accusamus est sequi et. Corporis a laboriosam sunt quis id placeat. Est in vel voluptates nulla est. Iusto labore eos eum dolorem cum veritatis aspernatur.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":16,"title":"Temporibus id illo non non.","description":"Ipsum neque libero sit alias quam maxime aut. Est quasi possimus quia voluptas occaecati porro fugit.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":19,"title":"Magnam dolores nemo sed blanditiis et quia quis illum.","description":"Iste voluptate aut fugiat animi vel eos rerum. Repudiandae ut fuga quasi corporis sit quod. Voluptatem ut dolorem libero fugit rem necessitatibus. Unde ducimus qui et ab autem quo enim. Molestias occaecati pariatur autem et eos dolor.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":20,"title":"Et atque nihil ratione distinctio ea ab consequatur.","description":"Fuga dolore eos est. Impedit aliquam iste rerum sit cum distinctio. Eum et cum dolorem. Qui neque in eaque magni dolorum.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":22,"title":"Qui ullam voluptas placeat totam ullam.","description":"Labore ad praesentium qui in. Animi voluptas ut libero. Corporis veritatis est cumque qui earum animi repudiandae.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":27,"title":"Vitae quis rem quam earum.","description":"Ea quaerat est iusto eum reprehenderit. Sunt molestiae aliquam saepe consequatur. Et et fuga sit velit eum dicta nisi. Aut esse praesentium laboriosam et qui fugit. Quae quidem qui vel voluptatem dolore vel beatae ipsam.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":28,"title":"Omnis numquam temporibus nam.","description":"Dolorum omnis nihil voluptatem. Natus dicta necessitatibus rerum. Corporis rerum non dolorum ab quia.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":30,"title":"Labore corporis quia ratione eius eos sint aperiam distinctio.","description":"Numquam quos quasi odio ut labore omnis eos. Et ea voluptas ut quia in odio voluptatum. Minima veniam et commodi. Fuga omnis quis qui et sed delectus qui dolores.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":31,"title":"Et ab sint ullam mollitia sit.","description":"Delectus sint dolor culpa. Non repudiandae nemo dignissimos nobis aut. Culpa non fugit dolor omnis maiores.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":32,"title":"Sed consequatur ex quam at esse dolorem asperiores.","description":"Sed beatae fugit et distinctio et eum sint. Sapiente officia blanditiis dolores et maxime voluptas. Cum doloremque magnam corrupti fuga ut sunt rem. Eligendi deleniti repellendus non.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":34,"title":"Eius vel tempora similique enim dolore ipsum quos.","description":"Voluptas enim velit perferendis in. Rem id corporis labore porro dolore eos molestiae dolore. Ut consequatur ipsam vel et quisquam nulla ducimus.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":39,"title":"Et quam ex in.","description":"Sapiente veritatis perspiciatis quae ut nostrum fugit. Officia temporibus repellendus molestiae animi omnis qui at. Magni animi qui atque omnis ducimus inventore ea. Voluptatem ea perspiciatis aliquam nobis. Sunt dolore et placeat numquam.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":45,"title":"Voluptas maxime quidem ipsam rerum magnam.","description":"Eaque architecto quos dolore illum. Aut laudantium enim eligendi ab aliquid. Aut distinctio recusandae enim ut.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":48,"title":"Ut nulla nemo molestiae fuga.","description":"Facilis exercitationem expedita quos ea omnis. Et dolore unde corporis hic nostrum architecto. Sit necessitatibus consequatur eos illo ut. Ea hic eaque laboriosam. Fugit consequuntur sit quibusdam eligendi sed sapiente.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":50,"title":"Ut officiis dolores qui architecto voluptatum.","description":"In ea repellendus ipsum hic rerum. At eveniet quis fugiat quisquam. Vero rerum autem eligendi consectetur quidem officiis. Perspiciatis maiores totam quia a recusandae magnam.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":56,"title":"Consequatur dolor distinctio ullam necessitatibus laborum excepturi.","description":"Sunt nemo magnam et id consequatur qui. Aut aut consectetur ea fugiat culpa doloribus. Dolores rerum cupiditate dolorum autem.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":58,"title":"Quos fugiat a quisquam nihil facilis rerum placeat ducimus.","description":"Delectus sapiente officiis harum molestias ut qui. Quia odit soluta ut sit animi sit ex neque. Alias blanditiis eum vitae ipsum ea.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":61,"title":"Nam aut delectus sunt asperiores optio aut.","description":"Atque voluptatibus voluptates et cumque. Autem in enim laudantium quis modi sed autem. Sequi corrupti quidem numquam. Ea similique vel temporibus fugiat sunt sequi repudiandae.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":62,"title":"Voluptatem nesciunt at provident rem qui voluptatem.","description":"Omnis est impedit cum quis. Ut earum aut quis suscipit molestias provident consequatur. Quo consequatur error quam.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":64,"title":"A cum libero iste ipsa quia quas molestiae.","description":"Unde voluptas at vitae amet. Odio dolor quo qui aut delectus qui non. Voluptas voluptas quia aut voluptatem et adipisci.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":65,"title":"Aperiam impedit aut blanditiis vero et.","description":"Laborum minima voluptatibus sed qui asperiores at distinctio. Consequatur fugit aut rerum aut. Impedit explicabo omnis quasi officia et sed. Tempore sed id quis neque sequi.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":70,"* Connection #0 to host awesomic.test left intact
title":"Nulla sed dolorum deleniti et culpa.","description":"Vel tenetur voluptas omnis. Et fuga omnis adipisci incidunt voluptate. Placeat deleniti cum voluptatem rerum nisi.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":71,"title":"Dolor sapiente officia sit ipsa.","description":"Autem sit architecto doloremque porro cumque explicabo corporis. Ducimus et laboriosam blanditiis nulla. Sunt ipsa cumque excepturi molestiae dolore quam. Voluptatem provident in facilis corporis voluptates facilis nam.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":74,"title":"Sed et totam sed odio molestiae.","description":"Est cumque quis possimus. Tempora consequatur distinctio aperiam quidem labore. Aut vel voluptatibus quasi aut ut est aut.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":75,"title":"Quidem corporis maiores vero ipsa vel.","description":"Cupiditate qui voluptate minus facere corporis non. Dolorum dolorem ut aliquid cupiditate. Praesentium cum tempora dolor necessitatibus. Soluta tempore eligendi voluptatum in sit saepe.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"},{"id":78,"title":"Vel repudiandae et enim natus.","description":"Quia quod fuga expedita error culpa natus sequi eum. Eos velit ut consectetur adipisci officia tempora. Labore nihil inventore dolore in eum laudantium magnam.","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"}],"first_page_url":"http:\/\/awesomic.test\/api\/tasks?page=1","from":1,"last_page":2,"last_page_url":"http:\/\/awesomic.test\/api\/tasks?page=2","links":[{"url":null,"label":"&laquo; Previous","active":false},{"url":"http:\/\/awesomic.test\/api\/tasks?page=1","label":"1","active":true},{"url":"http:\/\/awesomic.test\/api\/tasks?page=2","label":"2","active":false},{"url":"http:\/\/awesomic.test\/api\/tasks?page=2","label":"Next &raquo;","active":false}],"next_page_url":"http:\/\/awesomic.test\/api\/tasks?page=2","path":"http:\/\/awesomic.test\/api\/tasks","per_page":30,"prev_page_url":null,"to":30,"total":37}
```

### `[GET]` `/api/tasks/1`

#### Request

```javascript
curl -X GET -H "Content-Type: application/json" http://awesomic.test/api/tasks/1 -vvv
```

#### Response

```bash
Note: Unnecessary use of -X or --request, GET is already inferred.
* Host awesomic.test:80 was resolved.
* IPv6: (none)
* IPv4: 127.0.0.1
*   Trying 127.0.0.1:80...
* Connected to awesomic.test (127.0.0.1) port 80
> GET /api/tasks/3 HTTP/1.1
> Host: awesomic.test
> User-Agent: curl/8.7.1
> Accept: */*
> Content-Type: application/json
> 
* Request completely sent off
< HTTP/1.1 200 OK
< Server: nginx/1.25.4
< Content-Type: application/json
< Transfer-Encoding: chunked
< Connection: keep-alive
< Vary: Accept-Encoding
< X-Powered-By: PHP/8.4.5
< Cache-Control: no-cache, private
< Date: Wed, 11 Jun 2025 04:58:39 GMT
< Access-Control-Allow-Origin: *
< 
* Connection #0 to host awesomic.test left intact
{"id":1,"title":"Enim officia rerum voluptatum ad beatae adipisci.","description":"Consequatur sequi iste sed facere. Quis sit cumque accusamus non libero illum. Ut doloremque quia eius nesciunt. Atque doloribus temporibus repellat distinctio quasi consequatur et.","status":"pending","created_at":"2025-06-11T02:32:57.000000Z","updated_at":"2025-06-11T02:32:57.000000Z"}
```


### `[POST]` `/api/tasks`

#### Request

```javascript
curl -X POST -H "Content-Type: application/json" --data @post.json http://awesomic.test/api/tasks/ -vvv
```

#### Response

```bash
* Host awesomic.test:80 was resolved.
* IPv6: (none)
* IPv4: 127.0.0.1
*   Trying 127.0.0.1:80...
* Connected to awesomic.test (127.0.0.1) port 80
> POST /api/tasks/ HTTP/1.1
> Host: awesomic.test
> User-Agent: curl/8.7.1
> Accept: */*
> Content-Type: application/json
> Content-Length: 54
> 
* upload completely sent off: 54 bytes
< HTTP/1.1 201 Created
< Server: nginx/1.25.4
< Content-Type: application/json
< Transfer-Encoding: chunked
< Connection: keep-alive
< X-Powered-By: PHP/8.4.5
< Cache-Control: no-cache, private
< Date: Wed, 11 Jun 2025 05:02:17 GMT
< Access-Control-Allow-Origin: *
< 
* Connection #0 to host awesomic.test left intact
{"status":"pending","title":"Understanding JSON in Web Development","updated_at":"2025-06-11T05:02:17.000000Z","created_at":"2025-06-11T05:02:17.000000Z","id":101}
```

### `[PUT]` `/api/tasks/{id}`

#### Request

> ```javascript
>  curl -X PUT -H "Content-Type: application/json" --data @post.json http://awesomic.test/api/tasks/1 -vvv
> ```

#### Response

```bash
* Host awesomic.test:80 was resolved.
* IPv6: (none)
* IPv4: 127.0.0.1
*   Trying 127.0.0.1:80...
* Connected to awesomic.test (127.0.0.1) port 80
> PUT /api/tasks/10 HTTP/1.1
> Host: awesomic.test
> User-Agent: curl/8.7.1
> Accept: */*
> Content-Type: application/json
> Content-Length: 54
> 
* upload completely sent off: 54 bytes
< HTTP/1.1 204 No Content
< Server: nginx/1.25.4
< Connection: keep-alive
< X-Powered-By: PHP/8.4.5
< Cache-Control: no-cache, private
< Date: Wed, 11 Jun 2025 05:03:35 GMT
< Access-Control-Allow-Origin: *
< 
* Connection #0 to host awesomic.test left intact
```

### `[DELETE]` `/api/tasks/{id}`

#### Request

> ```javascript
>  curl -X DELETE -H "Content-Type: application/json" http://awesomic.test/api/tasks/10 -vvv
> ```

#### Response 

```bash
* Host awesomic.test:80 was resolved.
* IPv6: (none)
* IPv4: 127.0.0.1
*   Trying 127.0.0.1:80...
* Connected to awesomic.test (127.0.0.1) port 80
> DELETE /api/tasks/11 HTTP/1.1
> Host: awesomic.test
> User-Agent: curl/8.7.1
> Accept: */*
> Content-Type: application/json
> 
* Request completely sent off
< HTTP/1.1 204 No Content
< Server: nginx/1.25.4
< Connection: keep-alive
< X-Powered-By: PHP/8.4.5
< Cache-Control: no-cache, private
< Date: Wed, 11 Jun 2025 05:05:19 GMT
< Access-Control-Allow-Origin: *
< 
* Connection #0 to host awesomic.test left intact
```