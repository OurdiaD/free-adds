@include('header')
{!! Form::open() !!}

    <input type='hidden' name='id' value="<?php echo $_GET['id'] ; ?>">

    {!! Form::textarea('content', @$content, array(
        'class' => 'form-control', 
        'placeholder' => 'Message')) 
    !!}

    {!! Form::submit('Envoyer') !!}

    {!! Form::close() !!}

    @include('footer')