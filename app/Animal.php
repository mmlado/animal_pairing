<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $dob
 * @property boolean $female
 * @property boolean $active
 * @property boolean $own
 * @property string $created_at
 * @property string $updated_at
 * @property Animal $father
 * @property Animal $mother
 */
class Animal extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'animal';

    /**
     * @var array
     */
    protected $fillable = ['father', 'mother', 'name', 'dob', 'female', 'active', 'own', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function father()
    {
        return $this->belongsTo('App\Animal', 'father');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mother()
    {
        return $this->belongsTo('App\Animal', 'mother');
    }
}
