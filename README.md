# CRUD de usuário com autenticação desenvolvido em Laravel

Projeto desenvolvido para um teste de desenvolvedor back end júnior.

A proposta era desenvolver um CRUD de usuários com o framework Laravel.

Foram utilizados conceitos como:

* Migrations
* Seeds
* Rotas
* Models
* Controllers
* Autenticação com JWT

Rotas da API:

| Method | Route                 | Description         |
| ------ | --------------------- | ------------------- |
| POST   | /api/login            | Login with JWT      |
| POST   | /api/users/create     | Create a user       |
| GET    | /api/users/all        | Get All users       |
| GET    | /api/users/:id        | Get a user by id    |
| DEL    | /api/users/delete/:id | Delete a user by id |
| PUT    | /api/users/update/:id | Update a user by id |

## Screenshots

* Login with JWT
![Login with JWT](https://user-images.githubusercontent.com/70995453/166815542-a6a8c993-8b4d-4f53-99b9-32dad9b58ff6.png)

* Create user
![Create user](https://user-images.githubusercontent.com/70995453/166815791-95d3f660-4f76-46b3-882d-cd9086672b3a.png)

* Update user
![Update user](https://user-images.githubusercontent.com/70995453/166816045-a6b89f62-f0fc-4dcb-ae27-0886534ec3bf.png)

* Get all users
![Get all users](https://user-images.githubusercontent.com/70995453/166816126-fc4dca58-c308-42ee-973f-193428c08dec.png)

* Get user by id
![Get user by id](https://user-images.githubusercontent.com/70995453/166816171-7001edc2-d833-4e94-be52-2da87070982e.png)

* Delete user by id
![Delete user by id](https://user-images.githubusercontent.com/70995453/166816215-9da4c766-0341-4a62-b8e8-d509f7e06732.png)





