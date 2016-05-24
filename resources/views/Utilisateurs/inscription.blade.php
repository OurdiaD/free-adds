@include('header')
<h2>Inscription</h2>
   {!! Form::open() !!}

    {!! Form::text('username', @$username, array(
        'required',
        'class' => 'form-control', 
        'placeholder' => 'Pseudo')) 
    !!}


    <input class="form-control" placeholder="Mot de passe" name="password" type="password">

    
    <input type="email" class="form-control" placeholder="Email" name="email">


 {!! Form::submit('Inscription') !!}

    {!! Form::close() !!}

    @foreach ($errors->all() as $err)
    {{$err}}
    @endforeach


@include('footer')