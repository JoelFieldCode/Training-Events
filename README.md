# Training-Events

Postman API documentation is here: "api doc link here".
I used Postman instead of Swagger.

Steps to use the API:

Download and install Postman (free version), click import collection and paste this link in: "link here"
After that you should see the "Training Events" collection on the left. You can individually run
each request in the collection, see the tests written for it and check out the response. You can also click "Runner"
at the top of the App to run all 5 API requests and their tests in succession.

My main logic (ignoring laravel generated code) is in:

App/Http/Middleware/API.php
App/Http/Controllers/EventController.php
App/Http/routes.php
App/Database/seeds/DatabaseSeeder.php
App/Database/migrations/create_events_table.php
App/Event.php

I used https://github.com/namshi/jose for the JWT decoding.
