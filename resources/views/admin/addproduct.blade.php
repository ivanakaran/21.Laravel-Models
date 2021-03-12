<div class="tab-pane fade show active" id="home">
    <h4 class="mt-2">Додај нов производ</h4>


    <div class="container col-md-8 py-3">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @if ($errors->has('email'))
                @endif
            </div>
        @endif
        <form action="{{ route('addcard') }}" method="post">
            @if (Session::get('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif

            @if (Session::get('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                </div>
            @endif
            @csrf
            <div class="form-group">
                <label for="title">Име</label>
                <input type="text" name='title' class="form-control" id="title" value={{ old('title') }}>
            </div>

            <div class="form-group">
                <label for="subtitle">Поднаслов</label>
                <input type="text" name='subtitle' class="form-control" id="subtitle" value={{ old('subtitle') }}>
            </div>

            <div class="form-group">
                <label for="image">Слика</label>
                <input type="text" class="form-control" id="image" name="image" placeholder="http://"
                    value={{ old('image') }}>
            </div>

            <div class="form-group">
                <label for="url">URL</label>
                <input type="text" class="form-control" id="url" name='url' placeholder="http://"
                    value={{ old('url') }}>
            </div>
            <div class="form-group">
                <label for="description">Опис</label>
                <textarea class="form-control" id="description" name="description" rows="3"
                    value={{ old('description') }}></textarea>
            </div>

            <button type="submit" class="btn btn-block mb-5" id="addBtn">Додај</button>
        </form>


    </div>

</div>
