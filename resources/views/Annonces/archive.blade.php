@include('header')

 <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Vos Archives</div>
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
    </tr>

@endforeach
  </table>
</div>
@include('footer')