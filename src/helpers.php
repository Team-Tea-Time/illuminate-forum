<?php

if (!function_exists('is_group_mode')) {
    /**
     * Check if the group mode equals what was specified.
     *
     * @param string $mode
     *
     * @return bool
     */
    function is_group_mode(string $mode)
    {
        return config('forum.group_mode') === $mode;
    }
}
