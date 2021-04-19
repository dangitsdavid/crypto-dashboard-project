Create your database in phpMyAdmin for the login page:

1. Click "New" on left side
2. Create a database named loginsystem
3. Run a query to create a new table called "users"

```
CREATE TABLE `users` (
  `usersId` int(11) NOT NULL AUTO_INCREMENT,
  `usersName` varchar(50) NOT NULL,
  `usersPhone` varchar(50) NOT NULL,
  `usersUsername` varchar(50) NOT NULL,
  `usersEmail` varchar(50) NOT NULL,
  `usersPwd` text NOT NULL,
  `usersTxtPwd` text DEFAULT NULL,
  PRIMARY KEY (`usersId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
```
