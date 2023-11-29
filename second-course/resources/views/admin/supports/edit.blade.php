<h1>Editar dúvida - {{ $support->id }}</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('supports.update', $support->id) }}" method="post">
    @method('put')
    @csrf
    <input type="text" name="subject" placeholder="Assunto" value="{{ $support->subject }}">
    <textarea name="body" placeholder="Descrição" cols="30" rows="5">{{ $support->body }}</textarea>
    <button type="submit">Enviar</button>
</form>
