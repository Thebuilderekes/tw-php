## Important checks to run when working with displaying database items on screen

-  Always check that you are calling the key from the column in the database table when trying to display data from a database table. 
-  Always echo credentials to see if env is grabbing the credentials correctly. 
- always echo a success  message after each database query method call or any kind of method call to check if the call is successful.


## Using mariadb terminal
- Column field do not require quotation marks like mysql queries.


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