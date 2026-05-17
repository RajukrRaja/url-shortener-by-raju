<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;
use App\Services\ShortUrlService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ShortUrlController extends Controller
{
    use AuthorizesRequests;

    
    public function list(ShortUrlService $shortUrlService)
    {
        $this->authorize('viewAny', ShortUrl::class);

        $shortUrls = $shortUrlService
            ->getAccessibleShortUrls(auth()->user());

        return view('short_urls.list', compact('shortUrls'));
    }



    public function create()
    {
        $this->authorize('create', ShortUrl::class);

        return view('short_urls.create');
    }



    public function store(Request $request,ShortUrlService $shortUrlService)
    
    {

        $this->authorize('create', ShortUrl::class);

        $validatedData = $request->validate([
            'original_url' => 'required|url',
        ]);

        $shortUrlService->create([
            'user_id' => auth()->id(),
            'original_url' => $validatedData['original_url'],
        ]);

        return redirect()
            ->route('short_urls.list')
            ->with(
                'success',
                'Short Url created successfully'
            );
    }

public function redirect($code)
{
    $shortUrl = ShortUrl::where(
        'short_code',
        $code
    )->firstOrFail();

    return redirect($shortUrl->original_url);
}

}