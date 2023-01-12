<?php
require_once 'connect.php';

// Now we need to wrap this functionality in some function and we can also create more api endpoint in single file in simple way:
// 1. Event Endpoint is rest_api.php?path=events&start=<date>&end=<date>

// You can place this function in somewhere you project directory
// function getAllEvents($start, $end) {
//     global $conn; // allow using global (variable is resource that outside this function) variable

//     $sql = $conn->query("SELECT tbl_booking.*, tbl_rooms.roomname AS rname FROM `tbl_booking` JOIN tbl_rooms ON tbl_rooms.id = tbl_booking.roomname WHERE tbl_booking.fromdate >= '$start' AND tbl_booking.todate <= '$end'");
//     $data = $sql->fetch_all(MYSQLI_ASSOC);

//     $collector = [];
//     if (sizeof($data) > 0) {
//         foreach ($data as $item) {
//             array_push($collector, [
//                 'title' => $item['rname'],
//                 'start' => $item['fromdate'],
//                 'end' => $item['todate']
//             ]);
//         }
//     }
//     @header('Content-Type: application/json; charset=utf-8');
//     echo json_encode($collector);
// }

// This endpoint path works!
// Get All Event from this api rest_api.php?path=events&start=<date>&end=<date>
// - path=events <-- here the route (endpoint) name
// - start=<date> <-- here the start date
// - end=<date> <-- here the end date

// This is the API URL: rest_api.php?path=events&start=<date>&end=<date>
// path query is define the path endpoint
// start query is define the start event
// end query is define the end event

// So... when you doing curl "http://localhost/github/rest_api.php" with this url, what happen? 


/**
 * If we need to tell the client to used our avalible endpoints, so we ask first. How asked the client in some metaphor?
 * - Use statement to ask the client like "if you not define some path then we will warn you, but if you use our path endpoint then we provide you information you need."
 * 
 * if else <-- this is statement
 * swtich case <-- this is statement
 * 
 * If Statement Example:
 * if (empty(path)) {
 *      echo "Woooops! You need to define some path"
 * } else {
 *     .... run something
 * }
 */


// // This API path endpoint that provide client to use our resources use @ symbol is trick to php to ignore the error, but don't doit in production
// $path = @$_GET['path'];
// // The start and end is our optional parameters, coz we provide default values
// $start = empty($_GET['start']) ? date('Y-m-d') : $_GET['start'];
// $end = empty($_GET['end']) ? date('Y-m-d', strtotime("+7 day")) : $_GET['end'];

// here i need to place our statement - no path = warning otherwise continue -> YES!
// First try!
// if (empty($path)) {
//     echo "1 Try: you need to define a path";
//     die(); // Kill the script!
// } else {
//     switch ($path) {
//         case 'events':
//                 getAllEvents($start, $end);
//             break;
//         default:
//                 echo "Error Not Found!";
//             break;
//     }
// }

// or with this

// if (empty($path)) die("2 Try: you need to define a path");

// switch ($path) {
//     case 'events':
//             getAllEvents($start, $end);
//         break;
//     default:
//             echo "Error Not Found!";
//         break;
// }

// or with this

// This try will give us custom error!

// This API path endpoint that provide client to use our resources use @ symbol is trick to php to ignore the error, but don't doit in production

// This http://localhost/github/rest_api.php?path=events&start=2023-01-10T00:00:00Z&end=2023-01-11T00:00:00Z&timeZone=UTC is sent from browser to this file. lets check it out

function getAllEvents($start, $end) {
    global $conn; // allow using global (variable is resource that outside this function) variable

    $sql = $conn->query("SELECT tbl_booking.*, tbl_customer.name as customer_name, tbl_rooms.roomname AS rname FROM `tbl_booking` JOIN tbl_rooms ON tbl_rooms.id = tbl_booking.roomname JOIN tbl_customer ON tbl_customer.id = tbl_booking.name WHERE tbl_booking.todate >= '".$start."' OR tbl_booking.fromdate <= '".$end."'");
    $data = $sql->fetch_all(MYSQLI_ASSOC);

    $collector = [];
    if (sizeof($data) > 0) {
        foreach ($data as $item) {
            array_push($collector, [
                'title' => $item['customer_name'] . ' -   -' . $item['rname'],
                'start' => $item['fromdate'],
                'end' => $item['todate']
            ]);
        }
    }
    @header('Content-Type: application/json');
    echo json_encode($collector);
}

if (!empty($_GET['path'])) {
    $start = empty($_GET['start']) ? date('Y-m-d') : date('Y-m-d', strtotime($_GET['start']));
    $end = empty($_GET['end']) ? date('Y-m-d', strtotime("+7 day")) : date('Y-m-d', strtotime($_GET['end']));
    getAllEvents($start, $end);
} else {
    echo "3 Try: you need to define a path"; // expected
}