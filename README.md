# PHP Laravel Developer Task - Ticket Support

Your assignment is to build an internal API for a ticket app (Only APIs)


## Installation

Clone the repo `https://github.com/Moemen-Gaballah/task-ticket.git` and `cd` into it

`composer install`

Rename or copy `.env.example` file to `.env`

`php artisan key:generate`

Set your database credentials in your `.env` file

Don't forget Set your database for test I'm using mysql for test not sqlite.

create database `ticket_test` for unit test.

`composer install`

`npm install`

`npm run dev`

`php artisan migrate --seed`

`php artisan serve`

run test `php artisan test`

`http://127.0.0.1:8000/`

End Point: `http://127.0.0.1:8000/api/v1/`

[//]: # (Basic API Documentation : `http://127.0.0.1:8000/request-docs`)

Postman Collection in root project  : `Ticket-ExpertApps.postman_collection.json`

### Done

- [x] Factory for category
- [x] Get All Ticket with paginate and filter by (Category, name)
- [x] Add Ticket
- [x] Edit Ticket


### TODO
- [] use Services instead of Repository design pattern.
- [] Complete Curd - custom pagination
- [] API Documentation with Swagger
- [] todo more Unit test
- [] ERD (Entity Relationship Diagram)
- etc...


# Demo


`Filter Tickets`

![image](https://raw.githubusercontent.com/Moemen-Gaballah/task-ticket/main/public/demo/filterTickets.png)

`Add Ticket`

![image](https://raw.githubusercontent.com/Moemen-Gaballah/task-ticket/main/public/demo/addTicket.png)

`Edit Ticket`

![image](https://raw.githubusercontent.com/Moemen-Gaballah/task-ticket/main/public/demo/editTicket.png)

`unit test`

![image](https://raw.githubusercontent.com/Moemen-Gaballah/task-ticket/main/public/demo/unitTest.png)



