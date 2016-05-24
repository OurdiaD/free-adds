@include('header')
    <h1>Ajouter une annonce</h1>

   {!! Form::open(['files' => true, 'enctype' => 'multipart/form-data']) !!}

    {!! Form::text('titre', @$titre, array(
        'class' => 'form-control', 
        'placeholder' => 'Titre')) 
    !!}

    {!! Form::textarea('description', @$description, array(
        'class' => 'form-control', 
        'placeholder' => 'Description')) 
    !!}

    {!! Form::input('number', 'prix', @$prix, array(
        'class' => 'form-control', 
        'placeholder' => 'Prix',
        'step' => "0.01" )) 
    !!}
    <input name="image[]" type="file" class='form-control' multiple="multiple">

    {!! Form::select('localisation', [
       '' => 'Lieu',
       'Paris' => 'Paris',
       'Lyon' => 'Lyon',
       'Bordeaux' => 'Bordeaux']
    ) !!}

    {!! Form::select('categorie', [
      '' => 'Categorie',
       'Animaux' => 'Animaux',
       'Automobile' => 'Automobile',
       'Informatique' => 'Informatique']
    ) !!}

 {!! Form::submit('Ajout') !!}

    {!! Form::close() !!}

    @foreach ($errors->all() as $err)
    {{$err}}
    @endforeach

@include('footer')