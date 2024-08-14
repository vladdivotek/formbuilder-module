<?php

namespace Modules\FormBuilder\Models;

use App\Traits\HasStatus;
use App\Traits\HasTimestamps;
use App\Traits\HasTranslate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormBuilder extends Model
{
    use HasFactory;
    use HasStatus;
    use HasTimestamps;
    use HasTranslate;

    public const TYPES = [
        'text' => 'Text',
        'email' => 'Email',
        'tel' => 'Phone',
        'checkbox' => 'Checkbox',
        'radio' => 'Radio'
    ];

    protected $fillable = ['name', 'listener', 'is_modal', 'status', 'data', 'button'];

    protected $casts = ['data' => 'array'];

    public static function getDb(): string
    {
        return 'form_builders';
    }
}
