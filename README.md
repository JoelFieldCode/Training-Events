# Training-Events

Postman API documentation is here: https://documenter.getpostman.com/view/3121015/training-events/77mY1V2

Steps to use the API (you don't need to clone this repo as I have the API hosted on a cloud dev
environment):

Download and install Postman (free version), sign in with your google account. Now you can click 
the "Run in Postman" button at the top right on the API documentation page I linked before. This 
should open up your Postman App and import the collection. Now you should see the"Training Events"
collection on the left. You can individually run each request in the collection, see the tests 
written for it and check out the response. You can also click "Runner" at the top left of the App 
to run all 5 API requests and their tests in succession.

My main logic (ignoring laravel generated code) is in:

- App/Http/Middleware/API.php
- App/Http/Controllers/EventController.php
- App/Http/routes.php
- App/Database/seeds/DatabaseSeeder.php
- App/Database/migrations/create_events_table.php
- App/Event.php

I used https://github.com/namshi/jose for the JWT decoding.
