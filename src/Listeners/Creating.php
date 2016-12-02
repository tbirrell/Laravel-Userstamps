<?php

namespace Wildside\Userstamps\Listeners;

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
        $model -> updated_by = auth() -> id();
    }
}
