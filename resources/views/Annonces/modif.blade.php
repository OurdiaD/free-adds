@include('header')

   {!! Form::open() !!}
   <h2>Modier votre article</h2>
   <input type='hidden' name ='id' value='<?php echo $res[0]->id ?>'>
    <input class="form-control" name="titre" type="text" value='<?php echo $res[0]->titre ?>'>

    <textarea class="form-control" name="description" cols="50" rows="10"><?php echo $res[0]->description ?></textarea>

    <input step="0.01" class="form-control" name="prix" type="number" value='<?php echo $res[0]->prix ?>'>


 {!! Form::submit('Modifs') !!}

    {!! Form::close() !!}

@include('footer')