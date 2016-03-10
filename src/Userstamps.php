<?php

namespace Wildside\Userstamps;

trait Userstamps {

    /**
     * Boot the userstamps trait for a model.
     *
     * @return void
     */
    public static function bootUserstamps()
    {
        static::registerListeners();
    }

    /**
     * Register events we need to listen for.
     *
     * @return void
     */
    public static function registerListeners()
    {
        static::creating('Wildside\Userstamps\Listeners\Creating@handle');
        static::updating('Wildside\Userstamps\Listeners\Updating@handle');

        if( method_exists(get_called_class(), 'deleting') )
        {
            static::deleting('Wildside\Userstamps\Listeners\Deleting@handle');
        }

        if( method_exists(get_called_class(), 'restoring') )
        {
            static::restoring('Wildside\Userstamps\Listeners\Restoring@handle');
        }
    }
}
