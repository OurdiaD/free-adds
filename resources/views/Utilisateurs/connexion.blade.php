@include('header')
<h2>Connexion</h2>

<?php if (isset($message)) { echo '<p>'.$message.'</p>'; }?>
   {!! Form::open() !!}

    {!! Form::text('username', @$username, array(
        'required',
        'class' => 'form-control', 
        'placeholder' => 'Pseudo')) 
    !!}


    <input required="required" class="form-control" placeholder="Mot de passe" name="password" type="password">


 {!! Form::submit('Connexion') !!}

    {!! Form::close() !!}

    @foreach ($errors->all() as $err)
    {{$err}}
    @endforeach

@include('footer')