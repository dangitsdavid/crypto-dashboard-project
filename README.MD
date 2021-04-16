Create your database in phpMyAdmin for the login page:

1. Click "New" on left side
2. Create a database named loginsystem
3. Run a query to create a new table called "users"

```
CREATE TABLE users (
    usersId int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    usersName VARCHAR(50) NOT NULL,
    usersPhone VARCHAR(50) NOT NULL,
    usersUsername VARCHAR(50) NOT NULL,
    usersEmail VARCHAR(50) NOT NULL,
    usersPwd VARCHAR(50) NOT NULL
);
```
