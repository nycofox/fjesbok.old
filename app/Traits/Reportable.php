<?php

namespace App\Traits;

use App\Models\Report;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait Reportable
{

    /**
     * Get all of the reports.
     */
    public function replies(): MorphMany
    {
        return $this->morphMany(Report::class, 'reportable');
    }

    public function isReported(): bool
    {
        return false;
    }

}
