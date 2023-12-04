@if ($errors->any())
    <div class="bg-orange-300 border-l-4 border-orange-500 text-orange-700 p-4 my-4" role="alert">
        @foreach ($errors->all() as $error)
            <P>{{ $error }}</P>
        @endforeach
    </div>
@endif
