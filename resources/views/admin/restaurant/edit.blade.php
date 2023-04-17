@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center mb-4">
            <div class="col">
                <h1>
                    Modifica dati ristorante
                </h1>
            </div>
        </div>

        @include('partials.success')

        @include('partials.errors')

        <div class="row mb-4">
            <div class="col">
                <form action="{{ route('admin.restaurant.update', $restaurant->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @method('PUT')

                    {{-- NOME RISTORANTE  --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">
                            Modifica nome attività<span class="text-danger"> *</span>
                        </label>
                        <input type="text" class="form-control" id="name" name="name" required maxlength="64"
                            value="{{ old('name', $restaurant->name) }}" placeholder="Inserisci nome attività...">
                    </div>

                    {{-- INDIRIZZO RISTORANTE  --}}
                    <div class="mb-3">
                        <label for="address" class="form-label">
                            Modifica indirizzo dell'attività<span class="text-danger"> *</span>
                        </label>
                        <textarea style="height:100px" class="form-control" rows="10" id="address" name="address" required
                            maxlength="500" placeholder="Inserisci indirizzo attività...">{{ old('address', $restaurant->address) }}</textarea>
                    </div>

                    {{-- PARTITA IVA --}}
                    <div class="mb-3">
                        <label for="PIVA" class="form-label">
                            Codice Partita IVA <span class="text-danger"> *</span>
                        </label>
                        <input type="number" class="form-control" rows="10" id="PIVA" name="PIVA" required
                            minlength="11" maxlength="11" placeholder="Inserisci il tuo codice partita IVA..." value="{{ old('PIVA', $restaurant->PIVA) }}">
                            {{-- {{ old('PIVA', $restaurant->PIVA) }} --}}
                    </div>

                    {{-- IMMAGINE RISTORANTE --}}
                    <div class="mb-3">
                        <label for="image" class="form-label">
                            Immagine attività
                        </label>

                        {{-- Se l'immagine nel database è presente: --}}
                        @if ($restaurant->image)
                            <div class="my-2">
                                {{-- Possibilità di rimuovere l'immagine  --}}
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="delete_image" id="delete_image">
                                    <label class="form-check-label" for="delete_image">
                                        Rimuovi immagine
                                    </label>
                                </div>
                                {{-- STAMPA IMMAGINE --}}

                                <img src="{{ asset('storage/' . $restaurant->image) }}" style="height: 400px;" alt="restaurant">
                            </div>
                        @endif

                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>

                    {{-- CAMPI OBBLIGATORI --}}

                    <div>
                        <p>
                            <strong class="text-danger">*</strong> Campi obbligatori!
                        </p>
                    </div>

                    {{-- BOTTONE AGGIORNA PER INVIO FORM  --}}

                    <div>
                        <button type="submit" class="btn btn-warning">
                            Aggiorna
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection