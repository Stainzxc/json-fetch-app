# Laravel JSONPlaceholder API Clone

## 📌 Overview

This project is a Laravel-based application that fetches data from the public API **JSONPlaceholder** and stores it in a local database using Eloquent ORM. It also exposes RESTful API endpoints secured with Basic Authentication.

---

## 🚀 Features

* Fetch data via Artisan command
* Store data using Eloquent ORM
* Normalized database structure
* RESTful API endpoints
* Basic Authentication
* Dockerized setup

---

## 📦 Data Sources

Data is fetched from:

* https://jsonplaceholder.typicode.com/

Resources:

* Users (10)
* Posts (100)
* Comments (500)
* Albums (100)
* Photos (5000)
* Todos (200)

---

## 🛠️ Tech Stack

* Laravel
* MySQL
* Docker
* Nginx
* PHP 8.3

---

## ⚙️ Setup Instructions

### 1. Clone the repository

```bash
git clone <your-repo-url>
cd json-fetch-app
```

---

### 2. Install dependencies

```bash
composer install
```

---

### 3. Configure environment

Copy `.env` file:

```bash
cp .env.example .env
```

Update database settings:

```env
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=json_fetch
DB_USERNAME=root
DB_PASSWORD=root

CACHE_STORE=file
```

---

### 4. Run Docker

```bash
docker compose up -d --build
```

---

### 5. Run migrations

```bash
docker exec -it laravel_app php artisan migrate
```

---

### 6. Fetch data from API

```bash
docker exec -it laravel_app php artisan fetch:api-data
```

---

## 🔐 Authentication

This project uses **Basic Authentication**.

All users are assigned a default password:

```text
password
```

### Example credentials:

* Email: [Sincere@april.biz](mailto:Sincere@april.biz)
* Password: password

---

## 📡 API Endpoints

Base URL:

```
http://localhost:8006/api
```

### 🔹 Users

```
GET /users
```

### 🔹 Posts

```
GET    /posts
GET    /posts/{id}
GET    /posts/{id}/comments
POST   /posts
PUT    /posts/{id}
PATCH  /posts/{id}
DELETE /posts/{id}
```

### 🔹 Comments

```
GET /comments
GET /comments?postId=1
```

### 🔹 Albums

```
GET /albums
```

### 🔹 Photos

```
GET /photos
```

### 🔹 Todos

```
GET /todos
```

---

## 🧪 Testing

Use Postman or any REST client.

Make sure to:

* Set Authorization → Basic Auth
* Use valid email and password (`password`)

---

## 🗄️ Database Structure

The database is normalized with relationships:

* Users → Posts
* Posts → Comments
* Users → Albums → Photos
* Users → Todos

---

## 🐳 Docker Services

* PHP (Laravel)
* MySQL
* Nginx

---

## 📌 Notes

* API returns stored data from database
* Authentication is required for all endpoints
* Data is fetched once using Artisan command

---

## cURL for Postman
## GET ALL
curl --location 'http://localhost:8006/api/posts/' \
--header 'Content-Type: application/json' \
--header 'Authorization: Basic U2luY2VyZUBhcHJpbC5iaXo6cGFzc3dvcmQ='

## GET POST BY ID
curl --location 'http://localhost:8006/api/posts/1' \
--header 'Content-Type: application/json' \
--header 'Authorization: Basic U2luY2VyZUBhcHJpbC5iaXo6cGFzc3dvcmQ='

## GET POST BY ID COMMENTS
curl --location 'http://localhost:8006/api/posts/1/comments' \
--header 'Content-Type: application/json' \
--header 'Authorization: Basic U2luY2VyZUBhcHJpbC5iaXo6cGFzc3dvcmQ='

## GET COMMENTS
curl --location 'http://localhost:8006/api/comments/' \
--header 'Content-Type: application/json' \
--header 'Authorization: Basic U2luY2VyZUBhcHJpbC5iaXo6cGFzc3dvcmQ='

## GET ALBUMS
curl --location 'http://localhost:8006/api/albums/' \
--header 'Content-Type: application/json' \
--header 'Authorization: Basic U2luY2VyZUBhcHJpbC5iaXo6cGFzc3dvcmQ='

## GET TODOS
curl --location 'http://localhost:8006/api/todos/' \
--header 'Content-Type: application/json' \
--header 'Authorization: Basic U2luY2VyZUBhcHJpbC5iaXo6cGFzc3dvcmQ='

## GET USERS
curl --location 'http://localhost:8006/api/users/' \
--header 'Content-Type: application/json' \
--header 'Authorization: Basic U2luY2VyZUBhcHJpbC5iaXo6cGFzc3dvcmQ='

## UPDATE
curl --location --request PUT 'http://localhost:8006/api/posts/1' \
--header 'Content-Type: application/json' \
--header 'Authorization: Basic U2luY2VyZUBhcHJpbC5iaXo6cGFzc3dvcmQ=' \
--data '{
  "title": "Update Title"
}'

## PATCH
curl --location --request PATCH 'http://localhost:8006/api/posts/1' \
--header 'Content-Type: application/json' \
--header 'Authorization: Basic U2luY2VyZUBhcHJpbC5iaXo6cGFzc3dvcmQ=' \
--data '{
  "title": "Update Title"
}'

## DELETE
curl --location --request DELETE 'http://localhost:8006/api/posts/2' \
--header 'Authorization: Basic U2luY2VyZUBhcHJpbC5iaXo6cGFzc3dvcmQ='

---

## 👨‍💻 Author

Ruel Almonia
