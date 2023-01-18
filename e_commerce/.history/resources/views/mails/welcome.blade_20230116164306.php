<h1>Email Verification</h1>

Email: {{ $user->email }}
Name: {{ $name }}

Verification Link
<a href="{{ url('login11', $email) }}">Verify</a>