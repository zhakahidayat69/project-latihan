<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'deadline' => 'datetime',
    ];

    protected $appends = ['creator'];

    public function getDeadlineAttribute($date) {
        return Carbon::parse($date)->format('d-m-Y H:i:s');
    }

    public function getCreatorAttribute() {
        return $this->users->username;
    }

    public static function deleteData(int $id) {
        Vote::where('poll_id', $id)->delete();
        
        Choice::where('poll_id', $id)->delete();

        self::where('id', $id)->delete();
    }

    public function users() {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function choices() {
        return $this->hasMany(Choice::class, 'poll_id', 'id');
    }
}
