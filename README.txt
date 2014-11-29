IT2805 project

Group members:

Tom Glover
Hans Melby
Luan Tran

URL:

http://folk.ntnu.no/tuonglua/Project/IT2805-project/index.php

Short site description:

Our site is based on movies and movie reviews, where movies are organized
by genres and accessed and displayed using the various technologies described
below

Technologies used:

HTML       - For site structuring (self-explanatory)

CSS        - For styling (again, self-explanatory)

JavaScript - Used for form validation such as setting allowed characters 
(to avoid database injections) and making sure each form field is filled out 
before submission

phpMyAdmin - Used for database administration to create a database with
tables for storing information about movies and reviews (relevant information 
includes movie titles, genres, descriptions, directors, ratings, user reviews, 
etc..) 

SQL        - Used to interface with the phpMyAdmin database to extract movie and
review information as well as write new reviews to the database

PHP       - Used with SQL to extract and generate HTML and CSS code dynamically
based on databse content

XML       - XML code is generated dynamically with PHP (with a framework
called SimpleXML) when each movie is accessed. This XML site can be accessed
by simply clicking on the "Get as XML" link on each movie site. The idea was that by having the option of accessing the XML code gives a platform-independent API 
to access the title, description, director, and genre for each movie.

HTTP      - We have used the HTTP methods GET and POST. GET is used to send
movie titles to the URL to then be accessed by a PHP script to then be used
with SQL for database communication and code generation. POST is used in the 
review form to link to another PHP script that uses SQL to write a new review
to the database

Multimedia - We have included multimedia on the home page (index.php) to embed
various multimedia (more specifically, the new Star Wars movie trailer)
