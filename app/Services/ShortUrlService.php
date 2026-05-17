<?php

namespace App\Services;

use App\Models\User;
use App\Models\ShortUrl;
use Illuminate\Support\Str;

class ShortUrlService
{
    public function create(array $data): ShortUrl
    {
        return ShortUrl::create([

            'user_id' => $data['user_id'],

            'original_url' => $data['original_url'],

            'short_code' => $this->generateUniqueCode(),

        ]);
    }

    private function generateUniqueCode(): string
    {
        do {

            $shortCode = Str::random(6);

        } while (

            ShortUrl::where('short_code', $shortCode)->exists()

        );

        return $shortCode;
    }

    public function getAccessibleShortUrls(User $user)
    {
        if ($user->can('viewAll', ShortUrl::class)) {

            return ShortUrl::latest()->get();
        }

        if ($user->can('viewCompany', ShortUrl::class)) {

            return ShortUrl::whereHas('user', function ($query) use ($user) {

                $query->where('company_id', $user->company_id);

            })->latest()->get();
        }

        if ($user->can('viewOwn', ShortUrl::class)) {

            return ShortUrl::where('user_id', $user->id)
                ->latest()
                ->get();
        }

        return collect();
    }
}