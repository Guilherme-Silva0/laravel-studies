@if ($message = Session::get('success'))
    <div class="card green">
        <div class="card-content white-text">
            <span class="card-title">Tudo certo!</span>
            <p>{{ $message }}</p>
        </div>
    </div>
@endif
