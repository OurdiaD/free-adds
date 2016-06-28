@include('header')
<?php echo $res->render(); ?>
<?php 
if (Route::currentRouteName() =='messages'): ?>
{!! Html::link('/envoyer', 'Messages envoyer')!!}
 <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Messages reçus</div>
<?php else: ?>
{!! Html::link('/messages', 'Messages recus')!!}
 <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Messages envoyer</div>
<?php endif; ?>   

    <table class="table">
    <tr>
        <th>
            Annonce
        </th>
         <th>
           <?php if (Route::currentRouteName() =='messages'): ?>
            Expediteur
        <?php else :?>
            Destinataire
        <?php endif; ?>
        </th>
        <th>
            Contenu
        </th>
        <th>
            Date
        </th>
    </tr>
@foreach($res as $p)

    <tr <?php if ( ($p->date == '0000-00-00 00:00:00'|| $p->date == null) && Route::currentRouteName() =='messages') {echo 'class="info"';} ?>>
        <td>
            {!! Html::link('/message?id='.$p->id, $p->titre)!!}
        </td>
        <td>
            {!! $p->username !!}
        </td>
        <td>
            {!! substr($p->content, 0, 50).'...' !!}
        </td>
        <td>
            {!! $p->created_at !!}
        </td>
    </tr>

@endforeach
  </table>
</div>
<?php echo $res->render(); ?>
@include('footer')