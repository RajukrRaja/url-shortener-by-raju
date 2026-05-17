<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Create Short URL</title>

    <style>

        body{
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        form{
            max-width: 500px;
        }

        input{
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 15px;
        }

        button{
            padding: 10px 15px;
            cursor: pointer;
        }

        a{
            text-decoration: none;
        }

    </style>

</head>
<body>

    <h1>Create Short URL</h1>

    <a href="{{ route('short_urls.list') }}">
        Back to List
    </a>

    <br><br>

    {{-- Validation Errors --}}
    @if ($errors->any())

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    @endif

    <form
        action="{{ route('short_urls.store') }}"
        method="POST"
    >

        @csrf

        <label>

            Original URL

        </label>

        <input
            type="url"
            name="original_url"
            placeholder="https://example.com"
            value="{{ old('original_url') }}"
            required
        >

        <button type="submit">

            Create Short URL

        </button>

    </form>

</body>
</html>