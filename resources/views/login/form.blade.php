@if ($message = Session::get('error'))
    {{ $message }}
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }} <br>
    @endforeach
@endif

<form action="{{ route('login.auth') }}" method="POST">
    @csrf
    Email: <br><input type="email" name="email" required><br>
    Senha: <br><input type="password" name="password" required><br>
    <button type="submit">Entrar</button>
</form>
