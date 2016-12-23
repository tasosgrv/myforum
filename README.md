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