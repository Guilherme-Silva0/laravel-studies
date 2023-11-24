@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }} <br>
    @endforeach
@endif

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    Nome: <br><input type="text" name="first_name" required><br>
    Sobrenome: <br><input type="text" name="last_name" required><br>
    Email: <br><input type="email" name="email" required><br>
    Senha: <br><input type="password" name="password" required><br>
    <button type="submit">Cadastrar</button>
</form>
