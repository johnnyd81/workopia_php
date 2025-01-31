<?php

/*  
Get the base path for a specific file
@param string $path
@return string
*/
function basePath($path = '')
{
    //return the path as a string that can be required into a file
    return __DIR__ . '/' . $path;
}

/*
Load a page view i.e. homepage, listings etc.

@param string $name
$param array $data
@return void

*/
function loadView($name, $data = [])
{
    $viewPath = basePath("views/{$name}.view.php");
//conditional to check if path exists
    if (file_exists($viewPath)) {
        //extracts data as variables to be used in the specified view in the form of an associative array i.e. $listings['title']
        extract($data);
        require $viewPath;
    } else {
        //print a message if a view cannot be found
        echo "View {$viewPath} not found!";
    }
}

/*
Load a partial i.e. a ui component like a navbar, footer etc.

@param string $name
@return void

*/
function loadPartial($name)
{
    $partialPath = basePath("views/partials/{$name}.php");
    //check if the file exists and then require it
    if (file_exists($partialPath)) {
        require $partialPath;
    } else {
        echo "Partial {$partialPath} not found!!";
    }
}

/* 
Inspect a value(s) to check it's contents

@param mixed $value
@return void

  */
function inspect($value)
{
    echo '<pre>'; // make the output more readable using the '<pre>' tag
    var_dump($value);
    echo '</pre>';
}

/* 
Inspect a value(s) and die i.e. kill the script 

@param mixed $value
@return void

  */
function inspectAndDie($value)
{
    echo '<pre>';
    die(var_dump($value));
    echo '</pre>';
}

/**
 * format salary amount to be more readable
 * 
 * @param string $salary
 * @return string Formatted salary
 */
function formatSalary($salary)
{
    //the number_format() takes the $salary as a float value
     return '$' . number_format(floatval($salary));
}
