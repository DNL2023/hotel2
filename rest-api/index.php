<?php
require_once 'db.php';

$user = $conn->query("SELECT * FROM `tbl_booking`");
$sources = $user->fetch_assoc();

$sql = $conn->query("SELECT
tbl_booking.*,
tbl_rooms.roomname AS rname
FROM
`tbl_booking`
JOIN tbl_rooms ON tbl_rooms.id = tbl_booking.roomname
WHERE
tbl_booking.created_date BETWEEN tbl_booking.fromdate AND tbl_booking.todate");
$data = $sql->fetch_all(MYSQLI_ASSOC);

$collector = [];
if (sizeof($data) > 0) {
    foreach ($data as $item) {
        array_push($collector, [
            'title' => $item['rname'],
            'start' => $item['fromdate'],
            'end' => $item['todate']
        ]);
    }
}
header('Content-Type: application/json; charset=utf-8');
echo json_encode($collector);