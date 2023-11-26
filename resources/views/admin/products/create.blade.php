<!-- Modal Structure -->
<div id="create" class="modal">
    <div class="modal-content">
        <h4><i class="material-icons">playlist_add_circle</i> Novo produto</h4>
        <form class="col s12" action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="input-field col s6">
                    <input name="name" id="name" type="text" class="validate">
                    <label for="name">Nome do produto</label>
                </div>

                <div class="input-field col s6">
                    <input name="price" id="price" type="number" min="0" class="validate">
                    <label for="price">Preço</label>
                </div>

                <div class="input-field col s12">
                    <input name="description" id="description" type="text" class="validate">
                    <label for="description">Descrição</label>
                </div>

                <div class="input-field col s12">
                    <select name="category">
                        <option value="" disabled selected>Escolha uma categoria</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <label>Categoria</label>
                </div>

                <div class="file-field input-field col s12">
                    <div class="btn">
                        <span>Imagem</span>
                        <input type="file" name="image">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>

            </div>

            <button type="submit" href="#!" class="waves-effect waves-green btn green right">
                Cadastrar
            </button><br>
    </div>

    </form>
</div>
