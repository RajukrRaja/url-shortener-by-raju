<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Short URLs</title>

</head>
<body>

    <h1>Short URLs</h1>

    <a href="{{ route('short_urls.create') }}">

        Create Short URL

    </a>

    <br><br>

    {{-- Success Message --}}
    @if (session('success'))

        <p>

            {{ session('success') }}

        </p>

    @endif

    <table
        border="1"
        cellpadding="10"
    >

        <tr>

            <th>ID</th>

            <th>Original URL</th>

            <th>Short URL</th>

            <th>Short Code</th>

            <th>User ID</th>

            <th>Created At</th>

        </tr>

        @forelse ($shortUrls as $shortUrl)

            <tr>

                <td>

                    {{ $shortUrl->id }}

                </td>

                <td>

                    <a
                        href="{{ $shortUrl->original_url }}"
                        target="_blank"
                    >

                        {{ $shortUrl->original_url }}

                    </a>

                </td>

                <td>

                    <a
                        href="{{ url($shortUrl->short_code) }}"
                        target="_blank"
                    >

                        {{ url($shortUrl->short_code) }}

                    </a>

                </td>

                <td>

                    {{ $shortUrl->short_code }}

                </td>

                <td>

                    {{ $shortUrl->user_id }}

                </td>

                <td>

                    {{ $shortUrl->created_at }}

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="6">

                    No short URLs found.

                </td>

            </tr>

        @endforelse

    </table>

</body>
</html>