<?php
echo "Main thread started.\n";

function fetchData($url) {
    $response = file_get_contents($url);
    return $response;
}

$fibers = [];

// Create fibers for multiple asynchronous tasks.
$fibers[] = new Fiber(function() { 
    $response = fetchData("https://jsonplaceholder.typicode.com/todos/1"); 
    $value = Fiber::suspend($response);
    print_r($value . "\n");
});

$fibers[] = new Fiber(function() { 
    $response = fetchData( "https://jsonplaceholder.typicode.com/todos/2",); 
    $value = Fiber::suspend($response);
    print_r($value . "\n");
});

$fibers[] = new Fiber(function() { 
    $response = fetchData( "https://jsonplaceholder.typicode.com/todos/3",); 
    $value = Fiber::suspend($response);
    print_r($value . "\n");
});

$captureResponseOnSuspension = [];

// Start all fibers.
foreach ($fibers as $i => $fiber) {
    echo "Fiber $i started.\n";
    $captureResponseOnSuspension[$i] = $fiber->start();
}

// Resume all fibers.
foreach ($fibers as $i => $fiber) {
    echo "Fiber $i resumed.\n";
    $fiber->resume($captureResponseOnSuspension[$i]);
}

echo "Main thread done.\n";

// Main thread started.
// Fiber 0 started.
// Fiber 1 started.
// Fiber 2 started.

// Fiber 0 resumed.
// {"why":["data1"],"what":"a simple JSON data store"}
// Fiber 1 resumed.
// {"why":["data2"],"what":"a simple JSON data store"}
// Fiber 2 resumed.
// {"why":["data3"],"what":"a simple JSON data store"}
// Main thread done.
