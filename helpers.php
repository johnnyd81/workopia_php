<?php

/*  
Get base path
@param string $path
@return string
*/
function basePath($path = '')
{
    return __DIR__ . '/' . $path;
}

/*
Load a page view

@param string $name
@return void

*/
function loadView($name, $data = [])
{
    $viewPath = basePath("views/{$name}.view.php");
//conditional to check if path exists
    if (file_exists($viewPath)) {
        //extracts data as variables to be used
        extract($data);
        require $viewPath;
    } else {
        echo "View {$viewPath} not found!";
    }
}

/*
Load a partial

@param string $name
@return void

*/
function loadPartial($name)
{
    $partialPath = basePath("views/partials/{$name}.php");

    if (file_exists($partialPath)) {
        require $partialPath;
    } else {
        echo "Partial {$partialPath} not found!!";
    }
}

/* 
Inspect a value(s)

@param mixed $value
@return void

  */
function inspect($value)
{
    echo '<pre>';
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
 * format salary
 * 
 * @param string $salary
 * @return string Formatted salary
 */
function formatSalary($salary)
{
    return '$' . number_format(floatval($salary));
}
