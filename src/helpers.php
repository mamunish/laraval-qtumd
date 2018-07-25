<?php

if (! function_exists('qtumd')) {
    /**
     * Get bitcoind client instance.
     *
     * @return \Munish\Qtum\Client
     */
    function qtumd()
    {
        return app('qtumd');
    }
}
