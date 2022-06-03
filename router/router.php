<?php
$routes = [];

route("/", function() {
    include dirname(__FILE__) . "/../pages/homepage.php" ;
});

route("/employees", function() {
    include dirname(__FILE__) . "/../pages/employees.php" ;
});

route("/edit", function() {
    include dirname(__FILE__) . "/../pages/edit.php" ;
});


function route(string $path, callable $callback){
    global $routes;
    $routes[$path] = $callback;
}

run();

function run(){
    global $routes;
    $uri = $_SERVER["REQUEST_URI"];
    echo $uri;
    foreach($routes as $path => $callback){
        if($path !== $uri) continue;

        $callback();
    }
}

?>