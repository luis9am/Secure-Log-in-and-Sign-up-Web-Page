# Secure-Log-in-and-Sign-up-Web-Page
Project implements secure sign up to users through a web page that handles log in sessions and access to a SQL database.

-------

### Secure Web-Based Systems Fall 2017
### CS 4339/5339 Professor L. Longpr´e
### Assignment 3

In this assignment you will implement the authentication part of a generic
web-based system.

### Motivation
Nowadays, almost every web-based system include an authentication module
where users need sign in to access some features of the system. Attackers
attempt to bypass the authentication to get unauthorized access. There are
so many ways an attacker can succeed, and no matter how good our authentication
is, we should be attempting to detect and react to unauthorized
access. Yet, it would be careless not to include some basic design features of
a password based authentication that makes it harder for the attacker and
not more burdensome for the legitimate user. In this assignment, you will
implement such an authentication module that you should be able to import
into future web-based systems.

### Overview
Your web site will have three types of users: visitors, regular users and
administrators. The regular users and administrators information will be
stored in a MySQL database. Access to a page will depend on which type of
user attempts to load the page.
Pages
Your web site should have:
1. a main page named mainpage.php,
2. a sign in page named signin.php
3. a page for signed in users named user.php,
4. a page for administrators named admin.php.

### Access
mainpage.php and signin.php can be accessed by all visitors.
user.php can be only accessed by regular users and administrators.
admin.php can only be accessed by administrators.
Trying to access a page where access is denied should display an appropriate
error message, for example, “you need to be logged in as an administrator to
access this page” instead of displaying the regular contents of the page.

### Page contents
All pages should have a sign in button if the visitor is not signed in, and a
sign out button otherwise.
All pages should have links to the other accessible pages, and no link to not
accessible pages. For example, if an administrator visits the main page, there
should be a link to user.php and to admin.php.
All pages should have some text in it indicating where we are.
user.php should display the user’s information.
admin.php should have a form to add new users. The form should allow
adding either regular users or administrators. It should also have a link or
button to display the list of registered users.

### Users database
You will need a database with a table of registered users. You can choose
to either have separate tables for regular and registered users, or have only
one table with a field indicating if the user is regular or administrator. In
addition to data needed for authentication, the database should include first
name, last name, username, time of account creation and time of last login.
You will use salting and hashing to store the password in the table. For
salting, you should use 2 strings: a constant string of random characters,
and the username, so you will store in the table the hash function applied
to the concatenation of 3 strings: a constant string of random characters,
the userid, and the password. In this way, one would need to have access
to both the database and the php program to mount a password cracking
attack, and the username used as an additional salt will slow down the brute
force attack. Usernames should be unique.
