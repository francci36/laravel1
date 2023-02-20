@extends('layout')

@section('content')
    <div class="container">
        <h1>Créer un nouveau produit</h1>
        <form method="POST" action="/product/save" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nom">Nom du produit</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{old('nom','')}}" >
            </div>
                @error('nom') <div class="error">{{$message}}</div> @enderror
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description">{{old('description','')}}</textarea>
            </div>
                @error('description') <div class="error">{{$message}}</div> @enderror
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" class="form-control" id="photo" name="photo"  >
            </div>
            <div class="form-group">
                <label for="prix">Prix</label>
                <input type="number" class="form-control" id="prix" name="prix" value="{{old('prix','')}}"  >
            </div>
            @error('prix') <div class="error">{{$message}}</div> @enderror
            <div class="form-group">
                <label for="taux">Taux de TVA</label>
                <select name="tva" id="tva">
                  <option value=""></option>
                  <option value="2.1"></option>
                  <option value="5"></option>
                  <option value="10"></option>
                  <option value="20" @if(old("tva")==20") selected @endif>20%></option>
                </select>
            </div>
            @error('tva') <div class="error">{{$message}}</div> @enderror

            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
@endsection