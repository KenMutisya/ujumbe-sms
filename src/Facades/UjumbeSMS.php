<?php

namespace Kenmush\UjumbeSMS\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Kenmush\UjumbeSMS\UjumbeSMS
 */
class UjumbeSMS extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ujumbesms';
    }
}
