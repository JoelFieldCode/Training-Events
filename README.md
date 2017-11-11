# Training-Events

# Documentation and important information

Postman API documentation is here: https://documenter.getpostman.com/view/3121015/training-events/77mY1V2

You don't need to clone this repo and setup the server/db etc as I have it hosted on a cloud dev
environment. The cloud dev environment "should" be alive when you use it though rarely it 
gets rebooted for maintenance. Though if this happens it's a 2 second fix for me to login and 
restart the virtual machine.. so just let me know.

# Steps to use the API:

- Download and install Postman (free version), sign in with your google account. 

- Now you can click the "Run in Postman" button at the top right on the API documentation page I 
linked above. This should open up your Postman App and import the collection (found on the left under "collections").

- You can individually run each request in the collection, see the tests written for each one and 
check out their responses. 

- You can also click "Runner" at the top left of the App to run all the API requests and their 
tests in succession.

# Info about the solution

Available cities to query for: 

- Brisbane
- Sydney
- Perth
- Melbourne
- Canberra

My main logic (ignoring laravel generated code) is in:

- App/Http/Middleware/API.php
- App/Http/Controllers/EventController.php
- App/Http/routes.php
- App/Database/seeds/DatabaseSeeder.php
- App/Database/migrations/create_events_table.php
- App/Event.php

I used https://github.com/namshi/jose for the JWT decoding.
