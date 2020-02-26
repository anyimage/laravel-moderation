<?php

namespace AnyImage\Moderation;

use Illuminate\Support\Facades\Facade;

/**
 * @see ModerationClass::class
 */
class ModerationFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'moderation';
    }

}
