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
use Illuminate\Support\Facades\Paginator;

/**
 *   Admin blog
 *
 * @category Nothing
 * @package  Nothing
 * @author   daidec_o <ourdia.daideche@epitech.eu>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost:8080/rendu/
 */
class IndexController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function showIndex()
    {
        /*$results = DB::select('select annonces.images, annonces.id, annonces.titre, annonces.description, annonces.prix, annonces.created_at, users.username from annonces join users on users.id = annonces.user_id where annonces.activate = 1 order by annonces.updated_at desc');*/
        //$results = Paginator::make($results, count($results), '20');
        //var_dump($results);

        $results = DB::table('annonces')
            ->join('users', 'users.id', '=', 'annonces.user_id')
            ->select('annonces.images', 'annonces.id', 'annonces.titre', 'annonces.description', 'annonces.prix', 'annonces.created_at', 'users.username')
            ->where('annonces.activate', '=', 1)
            ->orderBy('annonces.updated_at', 'desc')
            ->paginate(10);
            //->get();
            //die(var_dump($results));
        return View::make('index')->with('annonces', $results);
        //return view('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function nombre()
    {
        $id = Session::get('id_user');
        $res = DB::select('select count(id) from messages where date like %0000% and id_receiver = ?', [$id]);
        return $res;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function recherche()
    {
       

        $results = DB::table('annonces')
            ->join('users', 'users.id', '=', 'annonces.user_id')
            ->select('annonces.images', 'annonces.id', 'annonces.titre', 'annonces.description', 'annonces.prix', 'annonces.created_at', 'users.username')
            ->where('annonces.activate', '=', 1)
            ->where(function ($q) {
                $nom = \Request::get('titre');
                $lieu = \Request::get('localisation');
                $categorie = \Request::get('categorie');
                if (Input::has('titre') || $nom!='') {
                    $q->where('annonces.titre', 'like', '%'.$nom.'%');
                }
                if (Input::has('lieu') || $lieu!='') {
                    $q->where('annonces.lieu', '=', $lieu);
                }

                if (Input::has('categorie') || $categorie!='') {
                    $q->where('annonces.categorie', '=', $categorie);
                }
            })


            ->orderBy('annonces.updated_at', 'desc')
            ->paginate(10);
            
            

        return View::make('index')->with('annonces', $results);
    }
}
