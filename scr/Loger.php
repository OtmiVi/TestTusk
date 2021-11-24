<?php

class Loger{

    private static $updateCount = 0;
    private static $deleteCount = 0;
    private static $addCount = 0;

    /**
     * Count user updates
     */
    public static function Update(){
        self::$updateCount++;
    }

    /**
     * Count user deletes
     */
    public static function Delete(){
        self::$deleteCount++;
    }

    /**
     * Count new users 
     */
    public static function Add(){
        self::$addCount++;
    }

    /**
     * Get update count
     * @return int
     */
    public static function GetUpdateCount(){
        return self::$updateCount;
    }

    /**
     * Get delete count
     * @return int
     */
    public static function GetDeleteCount(){
        return self::$deleteCount;
    }

    /**
     * Get new users count
     * @return int
     */
    public static function GetAddCount(){
        return self::$addCount;
    }
}

    