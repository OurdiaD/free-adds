<?php $id = Session::get('id_user');
       /* $res = DB::select('select count(id) from messages where date like %0000% and id_receiver = ?', [$id]); */
        $date = DB::table('messages')
        ->where('id_receiver', '=', $id)
        ->where(function($query){
            $query->where('date', '=', '0000-00-00 00:00:00')
                ->orWhere('date', '=', null);
        })
        ->count();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <link href="<?php echo e(asset('/css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/css/myStyle.css')); ?>" rel="stylesheet">
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

 <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          {!! Html::link('/', 'FreeAds', array('class' => 'navbar-brand'))!!}
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <?php if(!Auth::check()): ?>
            <li>
                {!! Html::link('/connexion', 'Connexion')!!}
            </li>
            <li>
                {!! Html::link('/inscription', "Inscription")!!}
            </li>
            <?php endif ; ?>
            <?php if(Auth::check()): ?>
            <li>
                {!! Html::link('/deconnexion', "Deconnexion")!!}
            </li>
            <li>
                {!! Html::link('/profil', "Profil")!!}
            </li>
            <li>
                {!! Html::link('/ajout', "Ajouter une annonce")!!}
            </li>
            <li>
                {!! Html::link('/perso', "Voir vos annonces")!!}
            </li>
            <li>       
                 <a href="messages">Messagerie <span class="badge"><?php echo $date; ?></span></a>
            </li>
            <?php endif ; ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


