<?php

namespace App\Models;

use visits;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VisitorCounter extends Model
{
    protected $table = 'visits';
    //
    public function visitsCounter()
    {
        return visits($this);
    }

    /**
     * Get the visits relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     */
    public function visits()
    {
        return visits($this)->relation();
    }
}
