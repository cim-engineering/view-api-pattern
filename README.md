# PHP View-Api Pattern
An architectural pattern that uses a router, view, and API, but does not have a controller component

The client sends a request to the router (a dedicated routing component). The router then forwards the request to the appropriate view, which generates a response. The view may also retrieve data from an API as part of generating the response. The response is then sent back to the router, which sends it back to the client.

This approach offers many (NOT ALL) of the same benefits as a the general MVC pattern (the separation of concerns and the ability to more easily develop and maintain the application over time... etc) but most importantly allows the client and server to be more easily separated and scaled independently.


## STARTING YOUR PROJECT
1. Use Composer or clone the repo.
1. Run **composer update** to install the project dependencies.
1. The web root is the root of the repository.
1. Enter your database configuration using the .env file.
1. Create more routes, views and api as you see fit depending on your application.

## ROUTING
The router handles the entire URL routing for your project. Checkout [Steampixel's Simple Router](https://github.com/steampixel/simplePHPRouter) to learn more on how to use this fast routing system.

Otherwise you can simply add a new route (to render a view) like this:
```php
Route::add('/auth/signup', function () {
  include 'views/register.html';
});

```
A sample route is included in the `/routes` folder


## API
In this pattern, data/the business logic is accessed through sets of API (Application Programming Interface), which provide a set of functions that the view can use to expose the data. The view communicates with the API using standardized interfaces like HTTP and JSON.

A sample api is included in the `/routes` folder. Here is an example of how it works :
1. The user interacts with the view, such asa button click or form input 
1. The view handles this input and prepares an HTTP request to the appropriate API endpoint. The endpoint is defined in `/routes/Api.php` as a route. For example
```php
Route::add('/v1/user/login', function () {
    header('Content-Type: application/json');
    return login_user();
}, 'POST');
```
3. The view sends the HTTP request to the API (using JavaScript). The API receives the request and processes it, using the underlying business logic to perform the requested action or retrieve the requested data. The API generates a response in the form of JSON or XML data and sends it back to the view.
4. The view then receives the response and processes it, using the data to update the user interface or perform some other action.


## VIEWS

In the context of the view-API pattern, a view is a component of a software application that is responsible for rendering the user interface and handling user input.

The view is typically implemented using a combination of HTML, CSS, and JavaScript, and it is responsible for displaying the user interface to the user and allowing the user to interact with it. 

The view is typically separated from the underlying business logic of the application, which is implemented in the API. This separation allows the view and the API to be developed and tested independently of each other. It also allows the view to be implemented in different ways, as long as it can communicate with the API.

View files go in the `/views` folder. Views can either be in PHP or HTML, but with just enough PHP to show the data. No database access or anything like that should occur in a view file.  You can render a standard PHP view in the router, optionally passing in variables, like this:

```php
Route::add('/user/(.*)', function ($username) {
  include 'views/account.php';
});

```

## SERVER CONFIG

In a view-API pattern implementation where the view is a client-side web application and the API is a PHP application, Apache or Nginx would be responsible for serving the client-side view to the user's web browser and handling requests to the server-side API. An [.htaccess] file is included at the root of the project so you will have to configure your web server for URL rewrites.