### API endpoints
|request   | url  | desctiption  |
|---|---|---|
| ```GET```  | /users/{userId}/posts  | Display all posts by User |
| ```GET```  | /users/{userId}/looks  | Show user's looks | 
| ```GET```  | /users/{userId}/comments | View all comments by User |
| ```GET``` | /posts | Show all Posts |
| ```GET``` | /posts/{postId} | View specific Post with Comments |
| ```POST``` | /posts | Create new Post |
| ```PUT``` | /posts/{postId} | Update Post by id | 
| ```DELETE``` | /posts/{postId} | Delete Post by id |

### Installation

You will need PHP 5.5.9 and Composer installed in your system 


```sh
$ git clone https://github.com/artsoroka/shopdrobeapp
$ cd shopdrobeapp 
$ composer install
```

To set up database connection you can edit ```app/config/database.php``` file directly or use .env file like this 

```
APP_ENV=local
APP_DEBUG=true
APP_KEY=KEmdPKgL1rZ23TwTVWlPXRiTkYHJSSUn

DB_HOST=localhost
DB_DATABASE=shopdrobeapp
DB_USERNAME=admin
DB_PASSWORD=password

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

MAIL_DRIVER=smtp
MAIL_HOST=mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
```

First, install migrations with ```artisan```  
```sh 
$ php artisan migrate:install
```

Load tables in database and sample data by running  

```sh
$ php artisan migrate:refresh --seed 
```