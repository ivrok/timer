<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 16.03.2017
 * Time: 15:01
 */
class Timer {
    private $timeBegin = null;
    private $timer = array();
    private static $instant = null;
    public function __construct()
    {
        $this->timeBegin = microtime(true);
    }
    public static function getInstant()
    {
        if (!self::$instant) self::$instant = new Timer();
        return self::$instant;
    }
    public function set($name = false)
    {
        if ($name) $this->timer[$name] = microtime(true) - $this->timeBegin;
        else $this->timer[] = microtime(true) - $this->timeBegin;
    }
    public function get()
    {
        return $this->timer;
    }
    public function getPrepared($floatAccur = 2)
    {
        $timerPrepared = array();
        $timeBefore = 0;
        $fullTime = 0;
        $curTime = null;
        $this->timer['_endpoint'] = number_format(microtime(true) - $this->timeBegin, $floatAccur, '.', '');
        foreach ($this->timer as $tName => $time) {
            $curTime = number_format($time, $floatAccur, '.', '');
            $timerPrepared[$tName] = $curTime - $timeBefore;
            $timeBefore = $curTime;
        }
        $timerPrepared['full time'] = $curTime;
        return $timerPrepared;
    }
}