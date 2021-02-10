# WCM2020 instaLIT Project
## FEB2021

 HTML/CSS/OOP/SQLi with Bootstrap and Fontawesome CSS and Scripts
 The goal was to make a lite version of Instagram to share photos and posts with other users.


---------------------------------------


INSTALIT TEAM:
----------------
 **Mattias Herzig** - Git Rogue - UI/UX/QA/Fullstack
 **Ashish Aryal** - Resident Wizard - Database/QA/Fullstack
 **Nikola Tomasovic** - Assuring Fighter - UI/UX/QA/Fullstack
 **Kimberly Karlsson** - Loud Bard - UI/UX/Assets/QA/Scrum Master


---------------------------------------

RESOURCES
----------------
ASSIGNMENT
 [nodehill](https://wcm20.lms.nodehill.se/article/projektarbete-projekt-metodik-och-verktyg): in swedish.

TRELLO
 [trello](https://trello.com/b/asHlJEdX/instalit): in english.


---------------------------------------


INSTALLING THE INSTALIT PROJECT
----------------
 1. pull the app from git,
 2. run composer install
 3. import the provided sql file
 4. update the database credentials on the file /libraries/classes/Database.php

To fully utilize the instaLIT project, a Virtual Host is highly recommended to resolve possible host conflicts. 

 add a VirtualHost to the httpd-vhosts.conf
 add info in C:\Windows\System32\drivers\etc\hosts

 FOR EXAMPLE:
 ```
 <VirtualHost *:80>
    ServerAdmin webmaster@instalit.local
    DocumentRoot "C:\(insert path to the project here)"
    ServerName instalit.local
    ErrorLog "logs/instalit.local.log"
    CustomLog "logs/instalit.local.log" common
 </VirtualHost>
 ```


---------------------------------------

FEATURES
