<?php

$path_follow_up_log = storage_path('app/follow_up_log.log');
$path_follow_up_error_log = storage_path('app/follow_up_error_log.log');

return [
    "follow_up_log_file" => $path_follow_up_log, // Payments follow up log file storage/app/
    "follow_up_error_log_file" => $path_follow_up_error_log, // Payments follow up log file storage/app/

];