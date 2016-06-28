@include('header')

<div id='recherche'>
    {!! Form::open(['action' => array('IndexController@recherche'), 'url'=>'adds', 'method' => 'GET']) !!}

    {!! Form::text('titre', null, array(
        'class' => 'form-control', 
        'placeholder' => 'recherche')) 
    !!}

    {!! Form::select('localisation', [
        '' => 'Lieux',
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



 {!! Form::submit('Rechercher') !!}

    {!! Form::close() !!}
</div>

<?php echo $annonces->render(); ?>
 <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Dernieres Annonces</div>
  <!-- Table -->
  <table class="table">
    <tr>
        <th>
        </th>
        <th>
            Titre
        </th>
        <th>
            Description
        </th>
        <th>
            Prix
        </th>
        <th>
            Date d'ajout
        </th>
        <th>
            Vendeur
        </th>
        <th>
            Lieu
        </th>
        <th>
            Categorie
        </th>
    </tr>
@foreach($annonces as $p)


    <tr>
        <td>
            <?php $img = explode(';', $p->images); 
            if ($img[0] != ''): ?>
            <img src="uploads/<?php echo $img[0] ; ?>" alt='<?php echo $p->titre; ?>'>
        <?php else: ?>
        <img src="uploads/No_Image_Available.png" alt="Pas d'image disponible">
    <?php endif; ?>
        </td>
        <td>
            {!! Html::link('/details?id='.$p->id, $p->titre)!!}
        </td>
        <td>
            {!! substr($p->description, 0, 50).'...' !!}
        </td>
        <td>
            {!! $p->prix !!}€
        </td>
        <td>
            {!! $p->created_at !!}
        </td>
        <td>
            {!! $p->username !!}
        </td>
        <td>
            {!! $p->lieu !!}
        </td>
        <td>
            {!! $p->categorie !!}
        </td>
    </tr>


@endforeach
  </table>
</div>
<?php echo $annonces->render(); ?>
@include('footer')