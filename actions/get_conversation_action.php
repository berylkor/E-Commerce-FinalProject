<?php
include_once("../controllers/conversation_controller.php");

// Enable debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure customer_id and shopper_id are received
    if (!isset($_POST["customer_id"]) || !isset($_POST["shopper_id"])) {
        echo json_encode(["error" => "Missing customer_id or shopper_id"]);
        exit();
    }

    $customerid = $_POST["customer_id"];
    $shopperid = $_POST["shopper_id"];

    // Fetch conversations from the database
    $getconvos = get_convo_ctr($customerid, $shopperid);

    if (!$getconvos) {
        echo json_encode([]);
        exit();
    }

    // Prepare messages array
    $messages = [];
    foreach ($getconvos as $getconvo) {
        $messages[] = [
            "message_id" => $getconvo["message_id"],
            "customer_id" => $getconvo["customer_id"],
            "shopper_id" => $getconvo["shopper_id"],
            "sender" => $getconvo["sender"],
            "message" => $getconvo["message"],
            "sent_at" => $getconvo["sent_at"],
        ];
    }

    // Return messages as JSON
    header('Content-Type: application/json');
    echo json_encode($messages, JSON_PRETTY_PRINT);
}
?>
