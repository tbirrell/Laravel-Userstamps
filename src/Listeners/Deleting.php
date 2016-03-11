<?php

namespace Wildside\Userstamps\Listeners;

class Deleting {

    /**
     * When the model is being deleted.
     *
     * @param Illuminate\Database\Eloquent $model
     * @return void
     */
    public function handle($model)
    {
        $model -> deleted_by = auth() -> id();

        $model -> flushEventListeners();
        $model -> save();
    }
}
