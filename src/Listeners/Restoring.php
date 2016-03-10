<?php

namespace Wildside\Userstamps\Listeners;

use Illuminate\Auth\Guard;

class Restoring {

    /**
     * When the model is being restored.
     *
     * @param Illuminate\Database\Eloquent $model
     * @return void
     */
    public function handle($model)
    {
        $model -> deleted_by = null;
    }
}
