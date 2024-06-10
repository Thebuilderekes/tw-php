## Remember to change the password to root in the env file on your macbook

## Code architecture

- As far as functionality and extendibility, don't be afraid to create as many files as need to extend your code. Make magic numbers into constants to promote reusability. Make it work and then branch out for refactor to make code more maintainable and efficient

- Public folder should be added to the root and index.php file put in there

## Conventions

- Using Classname::CONSTANT will point the class to the CONSTANT declared inside the file that has the class. You can use this across files by requiring the file that has the class into the file where you want to use it.
- Using `static` keyword on a method indicated that the method is a pure function and it does not reference any code outside of itself. To use such a static method of that class in , you use `className::method()`


- Refactor tricks 
Whenever you have a duplication of a functionality, tink about ta way to make tat into a function so you can have it reusable accross the app.



## Useful functions to study

- extract function
- array_exists
- abort function

## How the database works

We have the `user-id` of the notes table as the foreign key to the id in the users table. If we delete the user, we delete the note with the matching `id`(double check this)

## Important checks to run when working with displaying database items on screen

- Always check that you are calling the key from the column in the database table when trying to display data from a database table.
- Always echo credentials to see if env is grabbing the credentials correctly.
- always echo a success message after each database query method call or any kind of method call to check if the call is successful.
- ECHO EVERYTHING

## Using mariadb terminal

- in mariadb syntax, Column fields does not require quotation marks around field names like mysql queries.

Make Database class flexible with how different env credentials can be selected so that one can switch between .env file credentials depending on the selected database name


### Form validation

- Server side validation made on form to check if any of the inputs are empty on form submit and show an error message if this is the case.

## SESSIONS

A session is a way to store information (like user preferences, shopping cart contents, etc.) across multiple pages on a website.
It simulates a "conversation" between the user and the server during a website visit.
Without sessions, the server wouldn't remember any information about a user between page requests.


#### Session Variables:
Session variables are used to store and access data specific to a particular user session.
They are stored on the server, but unlike cookies (which can be stored on the client-side), they are not directly accessible by the user's browser.

### NOTE ON SESSIONS
- Session storage is a Javascript API, to get access to seeions that concerns PHP you look into the cookies
- When you write to a session, the session is stored on a file on the server.
To set a session you have to sart the session with `session_start()`

#### How it works:
When a user visits a website for the first time, the server can start a new session. This typically involves creating a unique session identifier (session ID).
The session ID is often stored in a cookie sent to the user's browser. This cookie allows the server to identify the user's session on subsequent page requests.
Session data is typically stored on the server in a temporary location (e.g., database, files) and is linked to the session ID.

#### Benefits of using Sessions:

Maintain user state across multiple pages: Users can log in, add items to a shopping cart, or personalize their experience without losing data between page reloads.
Improved user experience: Users don't have to re-enter information they have already provided on previous pages.
Secure storage: Sensitive data like usernames or cart contents are not directly stored on the user's browser, reducing security risks.

##### Using Sessions in PHP:
Starting a Session: Use the session_start() function at the beginning of your PHP scripts to start a session (if it hasn't already been started).

Creating Session Variables: Assign values to session variables using the global ``$_SESSION`` superglobal array.

```php
$_SESSION['username'] = 'john_doe';
$_SESSION['cart'] = array('item1', 'item2');
```

Accessing Session Variables: Use the ``$_SESSION`` array to access previously set session variables within your scripts.

```php
$username = $_SESSION['username'];
$cartItems = $_SESSION['cart'];
```

####  Destroying Sessions: 
Use the session_destroy() function to destroy a session and remove all associated data.

#### Important Considerations:

Sessions rely on cookies: If a user has disabled cookies in their browser, sessions won't work as expected.

Security: Implement proper session management techniques like setting expiration times and using secure connections (HTTPS) for sensitive data.

Alternatives: Consider using cookies for simpler scenarios or token-based authentication for more complex applications.
By understanding sessions and session variables, you can create dynamic and user-friendly web applications in PHP that remember information and provide a personalized experience across multiple pages.

 
