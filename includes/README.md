# includes

implements the page behavior through login, logout, signup and viewing current users through a table.

## login
Creates a session, escapes the user input (to avoid injection) then verifies user credentials based on input. Entered password is hashed then used to verify credentials within the database.

## logout
Ends session.

## signup
Allows the insertion of new users into a SQL database table while verifying input data. Also implements secure hashing/salting of user passwords using a custom salt for each user to increase security.

## viewtable
Simply prints out list of current users
