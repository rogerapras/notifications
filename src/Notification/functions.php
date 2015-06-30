<?php

if ( ! function_exists('notifications')) {

    /**
     * Arrange for a flash message.
     *
     * @param  string|null $message
     * @return \Eius\Notifications\Notification
     */
    function notifications($message = null)
    {
        $notifier = app('notifications');

        if ( ! is_null($message)) {
            return $notifier->info($message);
        }

        return $notifier;
    }

}