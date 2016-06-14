<?php
/**
*   Fichier Controller Admin
*
*  PHP Version 5.4
*
* @category Nothing
* @package  Nothing
* @author   daidec_o <ourdia.daideche@epitech.eu>
* @license  http://opensource.org/licenses/gpl-license.php GNU Public License
* @link     http://localhost:8080/rendu/
*/
 namespace freeads\Http\Controllers;

use freeads\Http\Requests;
use freeads\Http\Controllers\Controller;
use Illuminate\Http\Request;

use freeads\Annonce;
use Illuminate\Support\Facades\Input;
use DB;
use freeads\Quotation;
use Auth;
use Hash;
use freeads\Http\Requests\UtilisateurCreateRequest;
use Validator;
use Redirect;
use Response;
use Storage;
use freeads\File;
use Session;
use freeads\views\packages\laracasts\flash;
use Mail;
use View;
use freeads\Http\Requests\AnnoncesCreateRequest;
//use Illuminate\Support\Facades\Request;
//use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 *   Admin blog
 *
 * @category Nothing
 * @package  Nothing
 * @author   daidec_o <ourdia.daideche@epitech.eu>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost:8080/rendu/
 */
class AnnoncesController extends Controller
{

    /**
     * Show the form for creating a new resource.
     * @param  object $request regle
     * @return Response
     */
    public function create(AnnoncesCreateRequest $request)
    {   
        $id = Session::get('id_user');
        $titre = Input::get('titre');
        $des = Input::get('description');
        $annonce = new Annonce;
        $annonce->titre = Input::get('titre');
        $annonce->description = Input::get('description');
        $annonce->prix = Input::get('prix');
        $annonce->user_id = $id;
        $annonce->lieu = Input::get('localisation');
        $annonce->categorie = Input::get('categorie');
        

        //$results = DB::select('select id from annonces where titre = ? and description = ? order by created_at desc limit 1', [$titre, $des]);
        if (Input::file('image')[0] == null) {
            $annonce->images = '';
        }

        if (Input::file('image')[0] != null) {
        
            $destinationPath = 'uploads/'; 
            //die(var_dump(Input::file('image')));

            $img = Input::file('image');
            $a = count($img);
            for ($i=0; $i <$a ; $i++) { 
                $extension = $img[$i]->getClientOriginalExtension();
                $fileName = rand(11111, 99999).'.'.$extension; 
                $img[$i]->move($destinationPath, $fileName);
                $annonce->images .= $fileName.';';
            }
        }
        /*$extension = Input::file('image')->getClientOriginalExtension();
        $fileName = rand(11111,99999).'.'.$extension; 
        Input::file('image')->move($destinationPath, $fileName); 
        //Session::flash('success', 'Upload successfully'); 
        $annonce->images = $fileName;*/
        $annonce->save();
        return redirect('perso');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function view()
    {
        if (!Auth::check()) {
            return View::make('connexion');
        }
        $id = Session::get('id_user');
        $results = DB::select('select * from annonces where user_id = ? and activate = 1 order by updated_at desc', [$id]);
        //var_dump($results);
        return View::make('annonces.perso')->with('perso', $results);
    }

    /**
     * Display the specified resource.
     *
     * @return Response
     */
    public function supprA()
    {
        $id = $_GET['id'];
        $res = DB::select('select * from annonces where id = ?', [$id]);
        if ($res[0]->user_id != Session::get('id_user')) {
            return redirect('perso');
        }
        DB::update('update annonces set activate = 0 where id = ?', [$id]);
        return redirect('perso');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit()
    {
        //$id = $_GET['id'];
        $id = Input::get('id');
        $titre = Input::get('titre');
        $description = Input::get('description');
        $prix = Input::get('prix');
        DB::update('update annonces set titre= ?, description = ?, prix = ? where id = ?', [$titre, $description, $prix, $id]);
        return redirect('modifA?id='.$id);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function modifA()
    {
        $id = $_GET['id'];
        $res = DB::select('select * from annonces where id = ?', [$id]);
        if ($res[0]->user_id != Session::get('id_user')) {
            return redirect('perso');
        }
        /*Input::merge(array('titre' => $res[0]->titre));
        Input::merge(array('descrption' => $res[0]->description));
        Input::merge(array('prix' => $res[0]->prix));*/
        //return view('Annonces.modif')
        return View::make('annonces.modif')->with('res', $res);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function details()
    {
        $id = $_GET['id'];
        $res = DB::select('select users.id as vendeur, annonces.id, annonces.titre, annonces.description, annonces.prix, annonces.created_at, annonces.updated_at, users.username, images from annonces join users on users.id = annonces.user_id where annonces.id = ?', [$id]);
        return View::make('annonces.details')->with('result', $res);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Response
     */
    public function archive()
    {
        $id = Session::get('id_user');
        $results = DB::select('select * from annonces where user_id = ? and activate = 0 order by updated_at desc', [$id]);
        //var_dump($results);
        return View::make('annonces.archive')->with('perso', $results);
    }


}
