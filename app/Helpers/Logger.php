<?php
/**
 * Created by PhpStorm.
 * User: ken
 * Date: 7/6/18
 * Time: 1:25 PM
 */

namespace App\Helpers;


class Logger
{
    static $followup_log_file;

    function __construct()
    {
        self::$followup_log_file = config('custom_logs.follow_up_log_file');
    }

    public static function followUpLog($msg)
    {
        // open file
        $fd = fopen(config('custom_logs.follow_up_log_file'), "a");
        // append date/time to message
        $str = "[" . date("Y/m/d h:i:s", time()) . "] " . $msg;
        // write string
        fwrite($fd, $str . "\n");
        // close file
        fclose($fd);
    }

    public static function followUpErrorLog($msg)
    {
        // open file
        $fd = fopen(config('custom_logs.follow_up_error_log_file'), "a");
        // append date/time to message
        $str = "[" . date("Y/m/d h:i:s", time()) . "] " . $msg;
        // write string
        fwrite($fd, $str . "\n");
        // close file
        fclose($fd);
    }
}