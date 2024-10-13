<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Leave extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_users',
        'id_employees',
        'start_date',
        'end_date',
        'description',
        'responsible_person',
        'status_admin',
        'status_owner',
        'reason',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class,'id_employees', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'id_users', 'id');
    }

    public static function countActiveL()
    {
        $data = Leave::where('status_admin', 'requested')->count();
        return $data;
        
    }

    public static function countActiveO()
    {
        $data = Leave::where('status_admin', 'accepted')
        ->where('status_owner', 'Requested')
        ->count();
        return $data;
        
    }

    public static function countL()
    {
        $data = Leave::where('status_owner', 'accepted')->count();
        return $data;
        
    }

    public static function countLE()
{
    $userId = Auth::guard('emp')->user()->id;
    $data = Leave::where('id_employees', $userId)
                 ->where('status_admin', 'Requested')
                 ->where('status_owner', 'Requested')
                 ->count();
    return $data;
}

}