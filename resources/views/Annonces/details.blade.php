@include('header')

 <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><?php echo $result[0]->titre; ?></div>
<table class="table">

     <tr>
        <th>
            Description
        </th>
        <td>
            <?php echo $result[0]->description; ?>
        </td>
    </tr>
     <tr>
        <th>
            Prix
        </th>
        <td>
            <?php echo $result[0]->prix; ?>
        </td>
    </tr>

     <tr>
        <th>
            Posté le
        </th>
        <td>
            <?php echo $result[0]->created_at; ?>
        </td>
    </tr>
<?php if ($result[0]->created_at != $result[0]->updated_at) : ?>
     <tr>
        <th>
            Modifié le
        </th>
        <td>
            <?php echo $result[0]->updated_at; ?>
        </td>
    </tr>
<?php endif; ?>
    <tr>
        <th>
            Vendeur
        </th>
        <td>
            <?php echo $result[0]->username; ?>
        </td>
    </tr>    
    
</table>
<div class='img'>
<?php  $image = explode(';', $result[0]->images); 
//var_dump($image);
foreach ($image as $key => $value) {
     //var_dump($value);
    if ($value != '')
    {
        ?>
<img src="uploads/<?php echo $value; ?>" alt="<?php echo $result[0]->titre; ?>">
<?php
    }
      } ?>

</div>
</div>
{!! Html::link('/envois?id='. $result[0]->id, 'Envoyer un message')!!}
@include('footer')
