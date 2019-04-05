# Some basic Node.js functions

## Introduction
* Node.js® is a JavaScript runtime built on **Chrome's V8** JavaScript engine.
* Node.js is **not** a programming language.
* Node.js is **not** a framework.

## Uses asynchronous programming! 
A common task for a web server can be to open a file on the server and return the content to the client.

*Here is how PHP or ASP handles a file request:*

* Sends the task to the computer's file system.
* Waits while the file system opens and reads the file.
* Returns the content to the client.
* Ready to handle the next request.

*Here is how Node.js handles a file request:*

* Sends the task to the computer's file system
* Ready to handle the next request
* When the file system has opened and read the file, the server returns the content to the client.

## Why Node.js?

* Node.js **eliminates** **the** **waiting**, and simply continues with the next request.
* Node.js runs **single-threaded**, **non-blocking**, asynchronously programming, which is **very** memory **efficient**.

## What can Node.js do?

* generate dynamic page content
* create, open, read, write, delete, and close files on the server
* collect form data
* add, delete, modify data in your database

## Where Not to Use Node.js?

It is **not advisable** to use Node.js for **CPU intensive** applications. This is primarily because Node.js is single threaded.