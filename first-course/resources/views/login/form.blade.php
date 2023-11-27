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
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
    <label for="password">Senha:</label><br>
    <input type="password" id="password" name="password" required><br>
    <input type="checkbox" name="remember" id="remember">
    <label for="remember"> Lembre de mim </label><br>
    <button type="submit">Entrar</button>
</form>
