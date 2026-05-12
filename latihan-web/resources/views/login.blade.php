<h2>Login</h2>

@if(session('error'))
<p style="color:red">{{ session('error') }}</p>
@endif

<form action="/auth" method="POST">
    @csrf
    Email: <input type="email" name="email"><br>
    Password: <input type="password" name="password"><br>
    <button type="submit">Login</button>
</form>

<a href="/registration">Belum punya akun? Register</a>
