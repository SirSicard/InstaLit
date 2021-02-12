# WCM2020 instaLIT Project
## FEB2021

 HTML/CSS/OOP/SQLi with Bootstrap and Fontawesome CSS and Scripts. The goal was to make a lite version of Instagram to share photos and posts with other users.  

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
 1. Pull the app from Git,
 2. Run composer install
 3. Import the provided SQL file
 4. Update the database credentials on the file ```/libraries/classes/Database.php```  
  
**NOTE:** To fully utilize the instaLIT project, a Virtual Host is highly recommended to resolve possible host conflicts. 

1. Add a VirtualHost to the httpd-vhosts.conf
2. Add info in C:\Windows\System32\drivers\etc\hosts

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

CURRENT FEATURES
----------------

- You can make an account and edit your information.
- You can log in and log out of said account.
- You can compose a post with an image and a caption.
- You can give your image a filter via dropdown menu.
- Your own posts and others' posts can be viewed on the Main Feed.
- You can comment on any post.

---------------------------------------

COMING SOON(tm)
----------------

- Visiting others' profiles.
- Editing/Deleting your own existing posts.
- Reactions: is it LIT or is it $#!7?
- Light Mode, Dark Mode, LIT Mode.
- Image Type Optimization.
- Deleting/Editing own comments.
- Deleting others' comments on your own post.
