@include('header')

 <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><?php echo $res[0]->titre; ?></div>
<table class="table">

     <tr>
        <th>
            Contenu
        </th>
        <td>
            <?php echo $res[0]->content; ?>
        </td>
    </tr>
     <tr>
        <th>
            Envoyeur
        </th>
        <td>
            <?php echo $res[0]->username; ?>
        </td>
    </tr>

     <tr>
        <th>
            Envoyer le
        </th>
        <td>
            <?php echo $res[0]->created_at; ?>
        </td>
    </tr>

     <tr>
        <th>
            Lu le
        </th>
        <td>
            <?php echo $res[0]->date; ?>
        </td>
    </tr>

</table>
</div>
@include('footer')