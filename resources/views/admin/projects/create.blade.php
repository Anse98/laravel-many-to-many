@extends('layouts.app')

@section('content')
    <section>
        <div class="container py-4">
            <h1 class="my-4 text-light">Crea il tuo progetto</h1>
            <form action="{{ route('admin.projects.store') }}" method="POST">
                
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label color-grey">Titolo</label>
                    <input type="text" required class="form-control text-bg-dark" name="title" id="title" placeholder="Titolo" value="{{old('title')}}">
                </div>

                <div class="mb-3">
                    <label for="thumb" class="form-label color-grey">Url immagine</label>
                    <input type="text" required class="form-control text-bg-dark" name="thumb" id="thumb" placeholder="Url Immagine" value="{{old('thumb')}}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label color-grey">Descrizione</label>
                    <textarea class="form-control text-bg-dark" name="description" id="description" rows="4" placeholder="Descrizione del progetto">{{old('description')}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label color-grey">Tipo di Progetto</label>
                    <select name="type_id" id="type_id" class="form-control text-bg-dark">
                        <option value="">Scegli il tipo di progetto</option>
                        @foreach ($types as $type)
                            <option @selected( old('type_id') == $type->id ) value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <input type="submit" class="btn main-button-background text-light btn-sm p-2" value="Aggiungi">
                </div>

            </form>

            @if($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </section>
@endsection