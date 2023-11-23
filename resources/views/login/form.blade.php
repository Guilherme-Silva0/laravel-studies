@if ($message = Session::get('erro'))
    <div class="card orange">
        <div class="card-content white-text">
            <span class="card-title">Opa!</span>
            <p>{{ $message }}</p>
        </div>
    </div>
@endif

<form action="{{ route('login.auth') }}" method="POST">
    @csrf
    Email: <br><input type="email" name="email"><br>
    Senha: <br><input type="password" name="password"><br>
    <button type="submit">Entrar</button>
</form>
