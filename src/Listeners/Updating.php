<?php

namespace Wildside\Userstamps\Listeners;

use Illuminate\Auth\Guard;

class Updating {

    /**
     * When the model is being updated.
     *
     * @param Illuminate\Database\Eloquent $model
     * @return void
     */
    public function handle($model)
    {
        $model -> updated_by = auth() -> id();
    }
}
