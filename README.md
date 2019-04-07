# IntroToSQL
A short SQL tutorial for people to practice simple SQL commands



# What to install:
1. A text editor.(Brackets,Atom,Sublime, etc)
2. Xampp
    *Windows, Linux and macOS:
        -https://www.apachefriends.org/index.html

# PhMmyAdmin:
1. After Xampp is installed open the application and run Apache and MySQl
2.While step 1 is running, in your prefered browser type in '''http://localhost/phpmyadmin/'''
Should look like: ![PhpMyAdmin](https://www.dummies.com/wp-content/uploads/378050.image0.jpg)
3. Create a new database by clicking on the new button on the left panel.
    -Give your database the name Movie, find and use  utf8_unicode_ci in the dropbox next to the name textbox
4. Create a table
    * Option 1: Use the PhpMyAdmin GUI 
        1. On the Structure tab give your table the name movies, with 3 columns
        2. Column 1: Name: MovieID  Type: INT INDEX: PRIMARY CHECK A_I box 
           Column 2: Name: MovieTitle Type:VARCHAR CHECK 
           Column 3: Name: MovieYear  Type: INT
        3. Save your Table
        
    * Option 2: Import the MovieTable file
        1. Go to the import tab and import the MovieTable.SQL
    
    
5. Practice SQL Commands 
    1. Go to your table name, click on it.
    2. You should be able to see the SQL tab.
    3. Practice inserting, updating and deleting
    Check the commandExamples.SQL file for examples.

6. Checkout how to implement SQL with PHP 
    1. Go to the Student Course Management folder 
    2. Look at code. 
    3. For info to serve the PHP pages https://www.techwalla.com/articles/how-to-run-a-php-file-in-xampp
    