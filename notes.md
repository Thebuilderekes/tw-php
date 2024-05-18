## Remember to change the password to root in the env file on your macbook

## Code architecture

- As far as functionality and extendibility, don't be afraid to create as many files as need to extend your code. Make magic numbers into constants to promote reuseability. Make it work and then branch out for refactor to make code more maintainable and efficient

## Conventions

- Using Classname::CONSTANT will point the class to the CONSTANT declared inside the file that has the class. You can use this across files by requiring the file that has the class into the file where you want to use it.

## How the database works

We have the `user-id` of the notes table as the foreign key to the id in the users table. If we delete the user, we delete the note with the matching `id`(double check this)

## Important checks to run when working with displaying database items on screen

- Always check that you are calling the key from the column in the database table when trying to display data from a database table.
- Always echo credentials to see if env is grabbing the credentials correctly.
- always echo a success message after each database query method call or any kind of method call to check if the call is successful.

## Using mariadb terminal

- in mariadb syntax, Column fields does not require quotation marks around field names like mysql queries.

Make Database class flexible with how different env credentials can be selected so that one can switch between .env file credentials depending on the selected database name

```php

public function __construct() {
 $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
 $dotenv->load();

 $selectedDatabase = getenv('SELECTED_DATABASE');
 if (!$selectedDatabase) {
   throw new Exception("SELECTED_DATABASE environment variable not set");
 }

 // Define credentials based on the selected database name (modify as needed)
 switch ($selectedDatabase) {
   case 'database1':
     $this->hostname = getenv('HOSTNAME_DB1');
     $this->username = getenv('USERNAME_DB1');
     $this->password = getenv('PASSWORD_DB1');
     $this->dbname = getenv('DBNAME_DB1');
     break;
   case 'database2':
     $this->hostname = getenv('HOSTNAME2');
     $this->username = getenv('USERNAME2');
     $this->password = getenv('PASSWORD2');
     $this->dbname = getenv('DBNAME2');
     break;
   default:
     throw new Exception("Invalid database selection");
 }

 // Connect to the database (rest of the logic remains the same)
 // ...
}
```

### Form validation

- Server side validation made on form to check if any of the inputs are empty on form submit and show an error message if this is the case.
