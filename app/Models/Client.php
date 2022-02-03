<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    CONST TYPE_INDIVIDUAL = 'individual';
    const TYPE_LEGAL = 'legal';
    const MARITAL_STATUS = [
        1 => 'Solteiro',
        2 => 'Casado',
        3 => 'Divorciado'
    ];

    protected $fillable = [
        'name',
        'document_number',
        'email',
        'phone',
        'defaulter',
        'date_birth',
        'sex',
        'marital_status',
        'physical_disability',
        'client_type',
        'company_name'
    ];

    public static function getClientType($type){
        return $type == Client::TYPE_LEGAL ? $type: Client::TYPE_INDIVIDUAL;
    }
}
