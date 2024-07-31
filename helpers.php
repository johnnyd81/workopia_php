<?php

/*  
Get base path for a file
@param string $path
@return string
*/
function basePath($path = '')
{
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
        //extracts data as variables to be used in the specified view
        extract($data);
        require $viewPath;
    } else {
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
Inspect a value(s) and die i.e. kill the script and only show the relevant value

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
 * format salary value
 * 
 * @param string $salary
 * @return string Formatted salary
 */
function formatSalary($salary)
{
    return '$' . number_format(floatval($salary));
}
