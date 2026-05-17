<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Invite User</title>
</head>
<body>

    <h1>Invite User</h1>

    @if(session('success'))

        <p>

            {{ session('success') }}

        </p>

    @endif

    @if($errors->any())

        <ul>

            @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    @endif

    <form
        action="{{ route('invite.store') }}"
        method="POST"
    >

        @csrf

        <input
            type="text"
            name="name"
            placeholder="Name"
            required
        >

        <br><br>

        <input
            type="email"
            name="email"
            placeholder="Email"
            required
        >

        <br><br>

        <input
            type="password"
            name="password"
            placeholder="Password"
            required
        >

        <br><br>

        <select name="role">

            @if(auth()->user()->role === 'superadmin')

                <option value="admin">

                    Admin

                </option>

            @endif

            @if(auth()->user()->role === 'admin')

                <option value="admin">

                    Admin

                </option>

                <option value="member">

                    Member

                </option>

            @endif

        </select>

        <br><br>

        @if(auth()->user()->role === 'superadmin')

            <input
                type="text"
                name="company_name"
                placeholder="Company Name"
                required
            >

            <br><br>

        @endif

        <button type="submit">

            Invite User

        </button>

    </form>

</body>
</html>