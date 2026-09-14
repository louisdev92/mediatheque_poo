<?php

class FlashMessage {
    public static function set($message) {
        $_SESSION['flash'] = $message;
    }

    public static function get() {
        if (isset($_SESSION['flash'])) {
            $message = $_SESSION['flash'];
            unset($_SESSION['flash']);
            return $message;
        }
        return null;
    }
}