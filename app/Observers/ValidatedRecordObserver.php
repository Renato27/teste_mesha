<?php

namespace App\Observers;

use App\Models\ValidatedRecord;

class ValidatedRecordObserver
{
    /**
     * Handle the ValidatedRecord "created" event.
     *
     * @param  \App\Models\ValidatedRecord  $validatedRecord
     * @return void
     */
    public function created(ValidatedRecord $validatedRecord)
    {
        $validatedRecord->eletronicPoint->validated = 1;
        $validatedRecord->eletronicPoint->save();
    }

    /**
     * Handle the ValidatedRecord "updated" event.
     *
     * @param  \App\Models\ValidatedRecord  $validatedRecord
     * @return void
     */
    public function updated(ValidatedRecord $validatedRecord)
    {
        //
    }

    /**
     * Handle the ValidatedRecord "deleted" event.
     *
     * @param  \App\Models\ValidatedRecord  $validatedRecord
     * @return void
     */
    public function deleted(ValidatedRecord $validatedRecord)
    {
        //
    }

    /**
     * Handle the ValidatedRecord "restored" event.
     *
     * @param  \App\Models\ValidatedRecord  $validatedRecord
     * @return void
     */
    public function restored(ValidatedRecord $validatedRecord)
    {
        //
    }

    /**
     * Handle the ValidatedRecord "force deleted" event.
     *
     * @param  \App\Models\ValidatedRecord  $validatedRecord
     * @return void
     */
    public function forceDeleted(ValidatedRecord $validatedRecord)
    {
        //
    }
}
