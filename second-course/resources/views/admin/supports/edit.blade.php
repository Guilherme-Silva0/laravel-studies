<h1>Editar dúvida - {{ $support->id }}</h1>

<x-alert />

<form action="{{ route('supports.update', $support->id) }}" method="post">
    @method('put')
    @include('admin.supports.partials.form', [
        'buttonText' => 'Editar',
        'support' => $support,
    ])
</form>
