<?php

class Session
{
    public static function get(string $key): mixed
    {
        self::mbStart();
        return $_SESSION[$key];
    }

    public static function set(string $key, string $value): void
    {
        self::mbStart();
        $_SESSION[$key] = $value;
    }

    public static function clear(): void
    {
        self::mbStart();
        $_SESSION = [];
    }

    public static function has(string $key): bool
    {
        self::mbStart();
        return isset($_SESSION[$key]);
    }

    private static function mbStart() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
}