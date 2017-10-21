<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $male
 * @property int $female
 * @property float $compatibility
 * @property string $created_at
 * @property string $updated_at
 * @property Animal $maleAnimal
 * @property Animal $femaleAnimal
 */
class Pairing extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'pairing';

    /**
     * @var array
     */
    protected $fillable = ['male', 'female', 'compatibility', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function maleAnimal()
    {
        return $this->belongsTo('App\Animal', 'female');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function femaleAnimal()
    {
        return $this->belongsTo('App\Animal', 'male');
    }
}
