@include('header')
{!! Html::link('/archive', "Vos annonces supprimer" )!!}
 <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Vos Annonces</div>
    <table class="table">
    <tr>
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
            Modifié le 
        </th>
        <th>
            Action
        </th>
    </tr>
@foreach($perso as $p)

    <tr>
        <td>
            {!! Html::link('/details?id='.$p->id, $p->titre)!!}
        </td>
        <td>
           {!! substr($p->description, 0, 50).'...' !!}
        </td>
        <td>
            {!! $p->prix !!}
        </td>
        <td>
        <?php if($p->created_at == $p->updated_at): ?>
            {!! $p->created_at !!}
        <?php else: ?>
            {!! $p->updated_at !!}
        <?php endif; ?>
        </td>
        <td>
            {!! Html::link('/supprA?id='.$p->id, "Supprimer", array('id' => $p->id))!!}
            {!! Html::link('/modifA?id='.$p->id, "Modifier", array('id' => $p->id))!!}
        </td>
    </tr>

@endforeach
  </table>
</div>
@include('footer')
