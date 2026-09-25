<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"] ?? "");
    $question = trim($_POST["question"] ?? "");

    if ($email === "" || $question === "") {
        echo "Please enter both your email and your message.";
        exit;
    }

    $line = date("Y-m-d H:i:s") . " | " . $email . " | " . $question . PHP_EOL;

    $file = fopen("messages.txt", "a");
    if ($file === false) {
        echo "There was a problem saving your request.";
        exit;
    }

    fwrite($file, $line);
    fclose($file);

    echo "Your request was saved successfully.";
} else {
    echo "Invalid request method.";
}
?>