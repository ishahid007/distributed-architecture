#  Software Architecture, A Microservices project in PHP Codeigniter

## Important Note
Please make sure to clone the .htaccess file as well atleast for the "admin" and "student" panel as otherwise, the routes won't work properly.
If git isn't providing it, make sure to copy it directly via "admin/.htaccess" and "student/.htaccess" accordingly. (BIG Thanks).


## Introduction
This project is a proof-of-concept of Microservice Architecture build using CodeIgniter 3 and Bootstrap 3 for Front-end.  

There are four main decoupled service in this projects: User service, Assignment service, Solution service and Result service. All the services are using their separate database so they're not affected with the other one in any case.
The data is shared between tables using REST API to their respective modules.

All these dependency are already packed in one docker-compose.

Apart from that, there 2 main modules (panel) that are admin and student that runs the complete web app. They are not using any database and rather are sending REST API calls to the above services in order to fetch the data and operate on that.

- Admin
- Student


## Prerequiste
- Docker
- Docker Compose
- Composer
- Apache HTTP Server (Optional, already bundled in docker-compose)
- PHP 7.3 (Optional, already bundled in docker-compose)
- MySQL 8.0 (Optional, already bundled in docker-compose)

## Running
Normally, to run PHP application we just need to access it from browser by entering the address and the browser will render the page according to the instructions coded. 

**First, the DockerFile has been coded in a way to update all the dependencies and composer files but still if that doesn't work, follow the below ...**

**Start with docker (recommended)**
```
docker-compose up
```

By running the command docker-compose up, Docker Compose reads the docker-compose.yml file and starts the containers defined within it. It automatically creates the necessary networks, attaches volumes, and manages the dependencies between containers.


## Database Migration
To start database migration, docker compose has been designed in a way to automatically import all the databases of each service e.g 'users.sql' file to our 'mysql' container. We can access it via route (E.g by default, the database services will run on 9082, 9082, 9083, 9084)

## Assignment 
```http
http://localhost:9081/
Username: user
Password: password
```

## Solution
```http
http://localhost:9082/
Username: user
Password: password
```
## Result
```http
http://localhost:9083/
Username: user
Password: password
```
## User
```http
http://localhost:9084/
Username: user
Password: password
```
![alt text](https://github.com/ishahid007/distributed-architecture/blob/main/dbdigram.png)


## ADMIN PANEL (How It Works)?

**Start** 
```http
http://localhost:8081/login
E-mail: admin@admin.com
Password: 123456
```



**1** - Dashboard => Contains all the stats information regarding to the Total number of Users, Assignments and Total Solutions submitted so far.

**2a** - Assignments (List)
```http
http://localhost:8081/assignments
```
View all available assignments along with the title, deadline.
You can "View / Edit" and "Delete" the assignment.

**2b** - Assignments (View)

Click ON "View" button in order to view the assignment or edit that too
Also, clicking on "Title" will do the same action.

**2c** - Assignments (Create)
```http
http://localhost:8081/assignments/create
```
Click ON "Create New" button in order to create a new entry of assignment.

**2d** - Assignments (Delete)

Click ON "Delete" button in order to delete the assignment.



**3a** - Solutions (List)
```http
http://localhost:8081/solutions
```
View all available solutions along with the assignment title, student name deadline date.
You can "View / Rate" the solution and "Delete" the solution.

**3b** - Solutions (View)

Click ON "View" button in order to view the solution and rate the solution
Also, clicking on "Assignment Title" will do the same action.

**3c** - Solutions (Delete)

Click ON "Delete" button in order to delete the solution.



**4a** - Users (List)
```http
http://localhost:8081/users
```
View all available users along with the name, email and role.
You can "View / Edit" and "Delete" the user.


**4b** - Users (View)

Click ON "View" button in order to view the user or edit that too
Also, clicking on "Title" will do the same action.

**4c** - Users (Create)
```http
http://localhost:8081/users/create
```
Click ON "Create New" button in order to create a new entry of user (Admin or Student Role).

**4d** - Users (Delete)

Click ON "Delete" button in order to delete the user.


**5** - Admin Logout (Sign out)
```http
http://localhost:8081/logout
```
Click ON "Logout" to sign out of the admin role






## STUDENT PANEL (How It Works)?

**Start** 
```http
http://localhost:8082/login
E-mail: student@student.com
Password: 123456
```



**1** - Dashboard => Contains all the stats information regarding to the Total number of, Assignments and rest of the features will be added in future.

**2a** - Assignments (List)
```http
http://localhost:8082/assignments
```
View all available assignments along with the title, deadline.
You can "View / Reply" and "Submit" your solution to the assignment.

**2b** - Assignments (View)

Click ON "View" button in order to view the assignment.

Also, clicking on "Title" will do the same action.

You can submit your solution by clicking on either "Submit now" Or "Reply".


**2c** - Solution (Rating)

Click on "Assignment" that you have submitted the solution and on the same page, you will find the rating, rated by the admin.



**3** - Student Logout (Sign out)
```http
http://localhost:8082/logout
```
Click ON "Logout" to sign out of the student role



## API


### User Service
#### Get list of users
```http
GET localhost:8083/index.php/api/v1/user
```

#### Create a new user
```http
POST localhost:8083/index.php/api/v1/user
```

POST Body
```multipart/form-data
{
    "name": "John",
    "email": "john@gmail.com",
    "password": "123456",
    "role": "student" // can also be 'admin'
}
```
`id` is optional, it is auto-increased from previous data in the table
#### Get a user

```http
GET localhost:8083/index.php/api/v1/user/{user_id}
```

#### Update a user 
```http
POST localhost:8083/index.php/api/v1/user/update/{user_id}
```

Request Body
```multipart/form-data
{
    "name": "John Doe",
    "email": "john@gmail.com",
    "password": "123456",
}
```

#### Delete a user
```http
DELETE localhost:8083/index.php/api/v1/user/{user_id}
```


#### Total Count of users
```http
GET localhost:8083/index.php/api/v1/user/count_users
```


#### Login a user 
```http
POST localhost:8083/index.php/api/v1/user/login
```

Request Body
```multipart/form-data
{
    "role": "student", //or it can be "admin"
    "email": "student@student.com",
    "password": "123456",
}
```




### Assignment Service
#### Get list of assignments
```http
GET localhost:8084/index.php/api/v1/assignment
```

#### Create a new assignment
```http
POST localhost:8084/index.php/api/v1/assignment
```

POST Body
```multipart/form-data
{
    "title": "Assignment A",
    "description": "We have an assignment A",
    "deadline": "2023-10-10",
}
```
`id` is optional, it is auto-increased from previous data in the table
#### Get a assignment

```http
GET localhost:8084/index.php/api/v1/assignment/{assignment_id}
```

#### Update a assignment 
```http
POST localhost:8084/index.php/api/v1/assignment/update/{assignment_id}
```

Request Body
```multipart/form-data
{
    "title": "Assignment A",
    "description": "We have an assignment A",
    "deadline": "2023-10-10",
}
```

#### Delete a assignment
```http
DELETE localhost:8084/index.php/api/v1/assignment/{assignment_id}
```


#### Total Count of assignments
```http
GET localhost:8084/index.php/api/v1/assignment/count_assignments
```







### Solution Service
#### Get list of solutions
```http
GET localhost:8085/index.php/api/v1/solution
```

#### Create a new solution
```http
POST localhost:8085/index.php/api/v1/solution
```

POST Body
```multipart/form-data
{
    "user_id": "1",
    "assignment_id": "1",
    "description": "lorem ipsum dolor",
}
```
`id` is optional, it is auto-increased from previous data in the table
#### Get a solution

```http
GET localhost:8085/index.php/api/v1/solution/{solution_id}
```


#### Delete a solution
```http
DELETE localhost:8085/index.php/api/v1/solution/{solution_id}
```

#### Get a solution by assignment id
```http
GET localhost:8085/index.php/api/v1/solution/user-assignment-solution/{assignment_id}
```

#### Total Count of solutions
```http
GET localhost:8085/index.php/api/v1/solution/count_solutions
```






### Result Service
#### Get list of results
```http
GET localhost:8086/index.php/api/v1/result
```

#### Create a new result
```http
POST localhost:8086/index.php/api/v1/result
```

POST Body
```multipart/form-data
{
    "solution_id": "1",
    "percentage": "100",
    "remarks": "Good Job"
}
```
`id` is optional, it is auto-increased from previous data in the table
#### Get a result

```http
GET localhost:8086/index.php/api/v1/result/{result_id}
```

#### Get a result by solution id
```http
GET localhost:8086/index.php/api/v1/result/solution-result/{solution_id}
```

#### Delete a result
```http
DELETE localhost:8086/index.php/api/v1/result/{result_id}
```