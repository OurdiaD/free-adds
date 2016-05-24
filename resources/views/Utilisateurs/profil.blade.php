@include('header')
    <h1>Modifer votre profil</h1>
<?php if (isset($message)) { echo '<p>'.$message.'</p>'; }?>
   {!! Form::open() !!}

    {!! Form::text('username', @$username, array(
        'class' => 'form-control', 
        'placeholder' => 'Pseudo')) 
    !!}


    <input class="form-control" placeholder="Mot de passe" name="password" type="password">

    {!! Form::email('email', @$email, array(
        'class' => 'form-control', 
        'placeholder' => 'Email')) 
    !!}

 {!! Form::submit('Modifier') !!}

    {!! Form::close() !!}

    @foreach ($errors->all() as $err)
    {{$err}}
    @endforeach


<p>{!! Html::link('/suppr', "Supprimer le compte")!!}</p>


@include('footer')