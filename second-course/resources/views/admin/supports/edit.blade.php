<h1>Editar dúvida - {{ $support->id }}</h1>

<form action="{{ route('supports.update', $support->id) }}" method="post">
    @method('put')
    @csrf
    <input type="text" name="subject" placeholder="Assunto" value="{{ $support->subject }}">
    <textarea name="body" placeholder="Descrição" cols="30" rows="5">{{ $support->body }}</textarea>
    <button type="submit">Enviar</button>
</form>
