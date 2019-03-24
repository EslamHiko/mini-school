# mini-school

mini school is a very simple e-learning project where you can parse youtube playlists and add questions to each video 

## what i learned 

  - Laravel relations ex: every course **hasMany** videos & every video **hasMany** questions
  - CRUD Operations
  - Laravel Packages : I used socialite to implement social login / alaouy/yotube
  - How To Integrate With External APIs ex: Youtube API  
  - How to search a table

## what you can do
  - add/edit/remove courses by their playlist link
  - add/edit/remove questions for every video on the playlist
  - add/edit/remove the website users
  - search for courses
  - login/register with social media accounts
## how to install

  - clone the project
  - set your environment variables in .env file
  - migrate & seed

 **Important Note** : I worked on this project on Novembre 2016. My main goal was to learn more about laravel.
All api keys are expired to make it work make sure to change youtube key in \alaouy\youtube\src\config\config.php & \config\youtube.php
and social media keys in \config\app.php
