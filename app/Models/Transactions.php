<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;
    protected $fillable = [
        'properties_id',
        'client_id',
        'agent_id',
        'transaction_date',
        'transaction_type',
        'amount',
    ];

    public function properties()
    {
        return $this->belongsTo(properties::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
