<?php

include '../vendor/autoload.php';
if (isset($_POST['mobile']) && isset($_POST['msg'])) {
    // Your Account Sid and Auth Token get from twilio.com/user/account
    $sid = 'ACaa39bd3b2ba3839b8a9145cd1d450220';
    $token = '4ade6638027e6c48f296b8f1ce392a0b';
    // A Twilio number you own with SMS capabilities (you need to buy from twilio.com while signup)
    $twilio_number = "+12028901837";  // replace +000000000 to yours
    $client = new Twilio\Rest\Client($sid, $token);
    $message = $client->message->create(
            $_POST['mobile'], array(
        'from' => $twilio_number,
        'body' => $_POST['msg']
            )
    );
    if ($message->sid) {
        echo "Message sent!";
    }
}

?>

<form action="index.php" method="post">
            <h2>HTML Form to Send SMS with Twillio</h2>
            Enter Mobile:<br>
            <input type="text" placeholder="Mobile Number" name="mobile"><br><br>
            Message<br>
            <textarea placeholder="Message" name="msg"></textarea><br><br>

            <input type="submit" value="Send">
        </form>

