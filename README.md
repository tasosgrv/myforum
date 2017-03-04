# myforum

19 Dec 2016: 
- Basic Login/Register Completed (No Email Eonfirmation)
- welcome message moved from main_section.php to navbar.php
- Deleted uneeded code
- very basic profile 

20 Dec 2016:
- utils.php added functions check_user_level and check_active_code
- added active cell for future Ban and Email Eonfirmation features
- navbar.php added menu button for smaller screen devices
- profile.php added some user information (future edit avatar feature)
- main_section.php added button for New Subject (No active)
- login.php prevent deactivated accounts to login

21 Dec 2016:
- profile.php completed (change avatar & user data)
- change_data.php new file for changing users data from profile.php
- utils.php added get_user_id funtion for detection user_id from GET values
- Changed how $_SESSION variables set and unset (login.php, register.php, logout.php)
- Changed $_SESSION['login_user'] to $_SESSION['username']
- navbar.php added profile icon on navbar aside username
- .gitignore modified

22 Dec 2016:
- fixed some margins
- fixed col-xs classes

23 Dec 2016
- added members list full feature members.php

27 Dec 2016:
- footer.php completed
- main_section.php completed for normal users   
- subjects.php almost completed for normal users *(print the subject title)
- added class img-responsive
- utils.php added some utility functions

30 Dec 2016
- bug fixes
- basic post.php (not working)

3 Jan 2017
- completed post.php
- moved bootstrap javascript link in body
- some changes to footer

9 Jan 2017
- added pin and lock features for subjects
- added button at the bottom of subject.php
- added background image
- fixed word wrapping in subject.php

10 Jan 2017
- added favicon
- added messages number for each user

11 Jan 2017
- added social media links
- added links and img support on subjects.php'
- added edit post feature

15 Jan 2017
- added post reply feature
- deleted mysqli_close() in line 58 on register.php

17 Jan 2017
- fixed bug for locked subjects

28 Jan 2017
- added footer about text
- added description meta tag 

3 Feb 2017
- added delete button to subjects and posts for admins
- fixed images scale in posts
- fixes admin buttons on members.php

26 Feb 2017
- fixed bug on changed_data.phph
- changed the way login and register form shows (bootstrap modal)
- added email validation check and htmlentities() function
- added CSS for inputs on modals

2 Mar 2017
- fixed issue #1
- changed some css

4 Mar 2017
- fixed some footer css
- fixed bug about edit and reply posts