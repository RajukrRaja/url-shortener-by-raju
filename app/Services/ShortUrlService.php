<?php

namespace App\Services;

use App\Models\ShortUrl;
use Illuminate\Support\Str;


class ShortUrlServices {

public function create(array $data): ShortUrl{

return ShortUrl::create([

'user_id' => $data['user_id'],
'original_url' => $data['original_url'],
'short_code' => this->generateUniqueCode()


]);

}


private function generateUniqueCode():string
{
    do {
        $shortCode = Str::random(6);
    }
 while (

ShortUrl::where('short_code', $shortcode)->exists()

);
    
   

return $shortCode;

}

}
