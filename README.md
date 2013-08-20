Unleash
=======

**ALPHA STAGE - DEVELOPMENT IN PROGRESS**

CodeIgniter Unleashed.

Application skeleton for rapid development with [CodeIgniter](http://ellislab.com/codeigniter) v2.1.4


This is **NOT** a ready application, and is intended for developers to kickstart new projects
without doing redundant integration of usual classes, libraries and services.


I couldn't find good and properly setup "CodeIgniter Starter Kit", so I created
this. I found myself many times doing the same things over and over when starting a new
project in CI - so I put together this app sceleton with all the customization I usually do on top of CI.

This might now be what you exactly need, or use, or think is good - hence feel free to customize it to your liking, remove stuff or whatever.

**PULL REQUESTS ARE WELCOMED**


## Features

* Production ready folder structure
* Environment specific config files loading
* Global application config file
* [Native autoload of Core classes](http://philsturgeon.co.uk/blog/2010/02/CodeIgniter-Base-Classes-Keeping-it-DRY)
* [Ion_Auth 2](https://github.com/benedmunds/CodeIgniter-Ion-Auth)
* Public, Authorized and Admin Core Controllers
* Public Area (accessible to all)
* Memebers Area (normal users backend)
* Administrators Area (admin backend)
* [Base Model](https://github.com/jamierumbelow/codeigniter-base-model)
* Automatic views loading - [Base Controller](https://github.com/jamierumbelow/codeigniter-base-controller)
* Layouts per access area (Public, Authorized, Admin)
* Boostrap 3.0 Ready - CDN
* jQuery - CDN

## DO NOT USE FOR PRODUCTION (YET)

**I WILL SOVLVE THIS ASAP**. 

Issues when cloned into Linux (404 when accessing the public folder)

## Installation

* Clone the repo into your web server root
* Create Virtual Host pointing to /your/web-server/path/Unleash/public/
* Have mod_rewrite enabled.
* AllowOverride must be set to ALL in Virtual Host config.
* Default ServerName for virtual host is: unleash.local - if different, adjust in Unleash/public/index.php to
properly define environment
* Create database and adjust settings accordingly in database.php (both in development and production folders)
* Import Unleash/sql/ion_auth.sql file into phpMyAdmin
* Use newly created Virtual Host (eg. unleash.local) to access the app
* Member Credentials -> user@user.com password: password
* Admin Credentials -> username: admin@admin.com password: password

****

Copyright (c) 2013 Marko Aleksic.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
