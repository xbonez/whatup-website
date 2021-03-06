<?php

// log file
$log_file = "deploy.log";

// stores the result of the deployment
$deploy_result = date("m/d/Y H:i:s") . ': ';
$deploy_success = false;

// incoming request server's IP
$request_from = $_SERVER['REMOTE_ADDR'];

// sends emails on failure to the following recipients
$report_to = array(
                'ayushsobti@gmail.com',
                'anthony.hurst@gmail.com'
        );

// only honor requests when they come from one of these ips
$github_pub_ips = array(
        '207.97.227.253',
        '50.57.128.197',
        '108.171.174.178'
);

$branch =  "arena";
if (in_array($request_from, $github_pub_ips)) {
        if ($_POST['payload']) {
                // do a git pull
                if (shell_exec("git pull origin $branch") !== NULL) {
                        $deploy_result .= "Deployed $branch successfully.\n";
                        $deploy_success = true;
                } else {
                        $deploy_result .= "Shell exec failed.\n";
                }
        } else {
                $deploy_result .= "Request from {$request_from} not carrying POST payload.\n";
        }
} else {
        $deploy_result .= "Unauthorized request from {$request_from}.\n";
}

// store the result to the log file. Log file wii be
// created if it does not exist, or appended to if it
// does

file_put_contents($log_file, $deploy_result, FILE_APPEND);

// if there was a failure, send email
if (!$deploy_success) {
        $to = implode(',', $report_to);
       // mail($to, "ProjectWhatUp Deployment Failure", $deploy_result);
}

?>
