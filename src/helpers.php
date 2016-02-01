<?php

$app = new \Recca0120\PackagePhpunit\Application();

if (function_exists('bcrypt') === false) {
    /**
     * Hash the given value.
     *
     * @param string $value
     * @param array  $options
     *
     * @return string
     */
    function bcrypt($value, $options = [])
    {
        return (new \Illuminate\Hashing\BcryptHasher())->make($value, $options);
    }
}

if (function_exists('app') === false) {
    function app()
    {
        return \Recca0120\PackagePhpunit\Application::getInstance();
    }
}
