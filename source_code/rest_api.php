<?php
require_once 'connect.php';
function getAllEvents($start, $end)
{
    global $conn; // allow using global (variable is resource that outside this function) variable

    $sql = $conn->query("SELECT tbl_booking.*, tbl_customer.name as customer_name, tbl_rooms.roomname AS rname FROM `tbl_booking` JOIN tbl_rooms ON tbl_rooms.id = tbl_booking.roomname JOIN tbl_customer ON tbl_customer.id = tbl_booking.name WHERE tbl_booking.todate >= '" . $start . "' OR tbl_booking.fromdate <= '" . $end . "'");
    $data = $sql->fetch_all(MYSQLI_ASSOC);

    if (sizeof($data) > 0) {
        $events = []; // create events collections
        $resources = []; // create resources collections
        $i = 0; // init number to increment start from 0 and depends on size of array in foreach loop
        foreach ($data as $item) {
            // adding data to resources collections
            // id is represent resourceId that indentify the resource and match with events soon
            // title is represet resources title that shown in left side of calendar
            array_push($resources, [
                'id' => strtolower($item['rname']) . '-' . $i,
                'title' => $item['rname'],
            ]);
            
            // adding data to events collections
            // resourceId that connect with events (event.resourceId === resource.id)
            // and soon...
            array_push($events, [
                'resourceId' => strtolower($item['rname']) . '-' . $i,
                'title' => $item['customer_name'] . ' -   -' . $item['rname'],
                'start' => $item['fromdate'],
                'end' => $item['todate']
            ]);
            $i++; // increment by 1, so 0 + 1 = 1 and soon
        }
    }
    
    // Returning associative array that contains events and resources collections
    return [
        'events' => $events,
        'resources' => $resources
    ];
}

// Check if the path value is not empty
if (!empty($_GET['path'])) {
    // Get calendar start date query from url if have empty or not defined so use current date
    $start = empty($_GET['start']) ? date('Y-m-d') : date('Y-m-d', strtotime($_GET['start']));
    // Get calendar end date query from url if have empty or not defined so use current date + 7 days
    $end = empty($_GET['end']) ? date('Y-m-d', strtotime("+7 day")) : date('Y-m-d', strtotime($_GET['end']));
    $data = getAllEvents($start, $end);

    // Check if calendar request for events
    if ($_GET['path'] === 'events') {
        // Return only events collections
        echo json_encode($data['events']);
    // Check if calendar request for resources
    } else if ($_GET['path'] === 'resources') {
        // Return only resources collections
        echo json_encode($data['resources']);
    }

} else {
    echo "3 Try: you need to define a path"; // expected
}