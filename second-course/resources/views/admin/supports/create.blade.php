<h1>Nova dúvida</h1>

<form action="{{ route('supports.store') }}" method="post">
    @csrf
    <input type="text" name="subject" placeholder="Assunto">
    <textarea name="body" placeholder="Descrição" cols="30" rows="5"></textarea>
    <button type="submit">Enviar</button>
</form>
