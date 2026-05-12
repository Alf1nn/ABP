<h2>Registration</h2>

@if(session('success'))
<p style="color:green">{{ session('success') }}</p>
@endif

<form action="/register" method="POST">
    @csrf
    Email: <input type="email" name="email"><br>
    Nama: <input type="text" name="nama"><br>
    Password: <input type="password" name="password"><br>
    <button type="submit">Register</button>
</form>

<a href="/login">Sudah punya akun? Login</a>
