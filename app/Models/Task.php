<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'detail',
        'day',
        'time',
    ];

    public function toggleCompleted()
    {
        $this->completed = $this->completed ? FALSE : TRUE;

        $this->save();
    }

    public function getDayAttribute( $day )
    {
        return \MyHelper::instance()->convertDay( $day );
    }

    public function getTimeAttribute( $time )
    {
        return date( 'H:i', strtotime( $time ) );
    }
}
