<?php

class Router
{
    // a protected property is only available in a specific class and it's subclasses i.e. classes that extend the parent class
    //by adding it as a property the $routes array can be used anywhere in the Router class 
    protected $routes = [];

    //the docblock below defines what a function does, the parameters it needs and what it returns when it is called i.e. being invoked
    /**
     * Add a new route
     *
     * @param string $method
     * @param string $uri
     * @param string $controller
     * @return void
     */
    public function registerRoute($method, $uri, $controller)
    {
        //the [] brackets shows that values are being added to the end of the routes array
        //each route gets registered using the registerRoute method i.e. the GET, POST, PUT and DELETE routes
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller
        ];
    }

    /* 
    Add a GET route
    @param string $uri
    @param string $controller
    @return void
    */
    public function get($uri, $controller)
    {
        //the GET route to get a specific webpage
        $this->registerRoute('GET', $uri, $controller);
    }

    /* 
    Add a POST route
    @param string $uri
    @param string $controller
    @return void
    */
    public function post($uri, $controller)
    {
        $this->registerRoute('POST', $uri, $controller);
    }

    /* 
    Add a PUT route
    @param string $uri
    @param string $controller
    @return void
    */
    public function put($uri, $controller)
    {
        $this->registerRoute('PUT', $uri, $controller);
    }

    /* 
    Add a DELETE route
    @param string $uri
    @param string $controller
    @return void
    */
    public function delete($uri, $controller)
    {
        $this->registerRoute('DELETE', $uri, $controller);
    }

    /*
    Load the error page when a specific route cannot be found i.e. 404 
    @param int $httpCode

    @return void
    */
    public function error($httpCode = 404)
    {
        //sets the response error code i.e. 404, 403, 500 etc.
        //then the loadView helper function loads the appropriate error page
        http_response_code($httpCode);
        loadView("error/{$httpCode}");
        exit;
    }

    /*
     Route the request according to the uri and the method specified 
     @param string $uri
     @param string $method
     @return void
    */
    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            //if the $route['uri] and $route['method'] matches with $uri and $method of the browser 
            //then the relevant $route['controller'] is rendered in the browser
            if ($route['uri'] === $uri && $route['method'] === $method) {
                require basePath($route['controller']);
                return;
            }
        }
       //if no path and method is matched the error method is called and renders the appropriate error page
        $this->error();
    }
}
