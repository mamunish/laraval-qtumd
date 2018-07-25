<?php

if (! function_exists('qtumd')) {
    /**
     * Get bitcoind client instance.
     *
     * @return \Denpa\Bitcoin\Client
     */
    function qtumd()
    {
        return app('qtumd');
    }
}
