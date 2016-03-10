<?php

namespace Wildside\Userstamps\Listeners;

use Illuminate\Auth\Guard;

class Creating {

    /**
     * When the model is being created.
     *
     * @param Illuminate\Database\Eloquent $model
     * @return void
     */
    public function handle($model)
    {
        $model -> created_by = auth() -> id();
    }
}
