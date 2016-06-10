<?php namespace TeamTeaTime\Forum\Support;

class Factory
{
    /**
     * Instantiate and return a class from the forum.integration config.
     *
     * @param  string  $key
     * @return object
     */
    public static function make($key)
    {
        $className = config("forum.integration.{$key}");
        return new $className;
    }
}
