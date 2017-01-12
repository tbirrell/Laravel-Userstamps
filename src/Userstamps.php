<?php

namespace Wildside\Userstamps;

trait Userstamps {

    /**
     * Whether we're currently maintaing userstamps.
     *
     * @param bool
     */
    protected $userstamping = true;

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

        if (static::usingSoftDeletes()) {
            static::deleting('Wildside\Userstamps\Listeners\Deleting@handle');
            static::restoring('Wildside\Userstamps\Listeners\Restoring@handle');
        }
    }

    /**
     * Has the model loaded the SoftDeletes trait.
     *
     * @return bool
     */
    public static function usingSoftDeletes()
    {
        static $usingSoftDeletes;

        if (is_null($usingSoftDeletes)) {
            return $usingSoftDeletes = in_array('Illuminate\Database\Eloquent\SoftDeletes', class_uses(get_called_class()));
        }

        return $usingSoftDeletes;
    }

    /**
     * Get the user that created the model.
     */
    public function creator()
    {
        return $this -> belongsTo($this -> getUserClass(), 'created_by');
    }

    /**
     * Get the user that edited the model.
     */
    public function editor()
    {
        return $this -> belongsTo($this -> getUserClass(), 'updated_by');
    }

    /**
     * Get the user that deleted the model.
     */
    public function destroyer()
    {
        return $this -> belongsTo($this -> getUserClass(), 'deleted_by');
    }

    /**
     * Check if we're maintaing Userstamps on the model.
     *
     * @return bool
     */
    public function isUserstamping()
    {
        return $this -> userstamping;
    }

    /**
     * Stop maintaining Userstamps on the model.
     *
     * @return void
     */
    public function stopUserstamping()
    {
        $this -> userstamping = false;
    }

    /**
     * Start maintaining Userstamps on the model.
     *
     * @return void
     */
    public function startUserstamping()
    {
        $this -> userstamping = true;
    }

    /**
     * Get the class being used to provide a User.
     *
     * @return string
     */
    protected function getUserClass()
    {
        return auth() -> guard() -> getProvider() -> getModel();
    }
}
