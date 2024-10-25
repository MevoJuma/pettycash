<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PettyCash extends Model
{
    use HasFactory;

    protected $fillable = [
        "requester_name",
        "amount",
        "reason",
        "status",
        'head_of_department_approval',
        'branch_manager_approval',
        'general_manager_approval',
    ];
}
