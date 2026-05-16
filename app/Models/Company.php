<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Elequent\Relations\HasMany;



class Company extends Model {

protected $fillable = [
    'name',
];

public function user(): HasMany {

return $this->hasMany(User::class);

}

}


?>
