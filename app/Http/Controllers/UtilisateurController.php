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
use freeads\User;
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
use freeads\Message;
use View;
/**
 *   Admin blog
 *
 * @category Nothing
 * @package  Nothing
 * @author   daidec_o <ourdia.daideche@epitech.eu>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost:8080/rendu/
 */
class UtilisateurController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('Utilisateurs.inscription');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function indexCo()
    {
        return view('Utilisateurs.connexion');
    }

    /**
     * Show the form for creating a new resource.
     * @param  object $request regle
     * @return Response
     */
    public function create(UtilisateurCreateRequest $request)
    {
        //die(var_dump($_SERVER['HTTP_REFERER']));

        $code = md5(rand(1, 100));
        $username = Input::get('username');
        //$message = "blabla   ". $code;

        $user = new User;
        $user->username = Input::get('username');
        $user->password = Hash::make(Input::get('password'));
        $user->email = Input::get('email');
        $user->code = $code;
        $user->save();


        /* Mail::send('Utilisateurs.mail', ['code' => $code, 'username' $username], function($message) {

            $message->to(Input::get('email'), Input::get('username'))
                ->subject('Verify your email address');
                $message->from('us@example.com', 'Laravel');
        });*/
        $localhost = $_SERVER['HTTP_HOST'];
        $adresse = $_SERVER['HTTP_REFERER'];
        $cle = md5(rand(1, 999999));

            $mail = Input::get('email');
            $sujet = "Activer votre compte" ;
            $entete = "From: Validation@freeAds.com" ;
            $message = 'Bienvenue sur FreeAds,
 
            Pour activer votre compte, veuillez cliquer sur le lien ci dessous
            ou copier/coller dans votre navigateur internet.
            '
 
            .$adresse.'/verif?code=' . $code . '&username=' . $username . '
 
 
            ---------------
            Ceci est un mail automatique, Merci de ne pas y répondre.';
 
        mail($mail, $sujet, $message, $entete);
        return redirect('connexion');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function connexion()
    {
        if (Auth::attempt(['username' => Input::get('username'), 'password' => Input::get('password')])) {
            $id = Auth::user()->getAttributes()['id'];
            $use = Auth::user()->getAttributes()['username'];
            $activ = Auth::user()->getAttributes()['activate'];
            //return redirect()->intended('dashboard');
            if ($activ == 1) {
                Auth::logout();
                return View::make('Utilisateurs.connexion')->with('message', 'Verifier vos mail pour activer votre compte');
            }
            if ($activ == 0) {
                Auth::logout();
                return View::make('Utilisateurs.connexion')->with('message', 'Votre compte a été suprimer');
            }
            if ($activ == 2) {
            Session::put('id_user', $id);
            session(['id_user' => $id]);
            Session::put('username', $use);
            session(['username' => $use]);
            //$_SESSION['id'] = $id;
            //$data = Session::all();
            // $valeur = Session::get('username');
            //echo "sa marche";
            //die(var_dump(Session::has('id_user')));
            }
            return redirect('/');
        } else {
            echo "erreur d'identifient";
        }
    }

    /**
     * Display the specified resource.
     *
     * @return Response
     */
    public function verif()
    {
        //return view('Utilisateurs.verif');
        $code = $_GET['code'];
        $username = $_GET['username'];
        $results = DB::select('select * from users where username = ?', [$username]);
        if ($results[0]->code == $code) {
            DB::update('update users set activate = 2 where username = ?', [$username]);
            echo "activation reussi";
            return redirect('/');
        } else {
            echo "Erreur d'activation";
        }
    }
     /**
     * Display the specified resource.
     *
     * @return Response
     */
    public function deco()
    {
        Auth::logout();
        Session::forget('id_user');
        Session::forget('username');
        return redirect('connexion');
    }

    /**
     * Show the form for editing the specified resource.
     * @param  object $request regle
     * @return Response
     */
    public function edit(UtilisateurEditRequest $request)
    {
        //var_dump(Session::get('id_user'));
        //var_dump(Session::get('username'));
        $id = Session::get('id_user');
        $username = Input::get('username');
        $pass = Input::get('password');
        $mail = Input::get('email');

        if (!empty($username)) {
            DB::update('update users set username = ? where id = ?', [$username, $id]);
            Session::put('username', $username);
            session(['username' => $username]);
        } else if (!empty($pass)) {
            $pass = Hash::make($pass);
            DB::update('update users set password = ? where id = ?', [$pass, $id]);
        } else if (!empty($mail)) {
            DB::update('update users set email = ? where id = ?', [$mail, $id]);
        }
        return View::make('Utilisateurs.profil')->with('message', 'Vos modification on bien été prise en compte.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Response
     */
    public function suppr()
    {
        $id = Session::get('id_user');
        DB::update('update users set activate = 0, email = "" where id = ?', [$id]);
        Auth::logout();
        Session::forget('id_user');
        Session::forget('username');
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Response
     */
    public function envois()
    {
        $id_sender = Session::get('id_user');
        $id = Input::get('id');
        $content = Input::get('content');

        $res = DB::select('select * from annonces where id = ?', [$id]);
        $id_rec = $res[0]->user_id;
        //die(var_dump($res));
        $mess = new Message;
        $mess->id_sender = $id_sender;
        $mess->id_receiver= $id_rec;
        $mess->content = $content;
        $mess->id_annonce = $id;
        $mess->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Response
     */
    public function messages()
    {
        $id = Session::get('id_user');
        /*  DB::update('update messages set date = now() where id_receiver = ?', [$id]);*/
        // $res = DB::select('select * from messages where id_receiver = ?', [$id]);

        $res = DB::table('messages')
            ->select('messages.id', 'username', 'titre', 'messages.created_at', 'date', 'content')
            ->join('users', 'users.id', '=', 'messages.id_sender')
            ->join('annonces', 'annonces.id', '=', 'messages.id_annonce')
            ->where('id_receiver', '=', $id)
            ->orderBy('messages.created_at', 'desc')
            ->paginate(15);
        //die(var_dump($res));
        return View::make('Utilisateurs.messages')->with('res', $res);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Response
     */
    public function message()
    {
        $id = $_GET['id'];
        DB::update('update messages set date = now() where id = ?', [$id]);
        //$res = DB::select('select * from messages where id = ?', [$id]);
        $res = DB::table('messages')
            ->select('messages.id', 'username', 'titre', 'messages.created_at', 'date', 'content')
            ->join('users', 'users.id', '=', 'messages.id_sender')
            ->join('annonces', 'annonces.id', '=', 'messages.id_annonce')
            ->where('messages.id', '=', $id)
            ->orderBy('messages.created_at', 'desc')
            ->get();
        return View::make('Utilisateurs.message')->with('res', $res);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Response
     */
    public function envoyer()
    {
        $id = Session::get('id_user');
        /*  DB::update('update messages set date = now() where id_receiver = ?', [$id]);*/
        //$res = DB::select('select * from messages where id_sender = ?', [$id]);
        $res = DB::table('messages')
            ->select('messages.id', 'username', 'titre', 'messages.created_at', 'date', 'content')
            ->join('users', 'users.id', '=', 'messages.id_receiver')
            ->join('annonces', 'annonces.id', '=', 'messages.id_annonce')
            ->where('id_sender', '=', $id)
            ->orderBy('messages.created_at', 'desc')
            ->paginate(15);
        return View::make('Utilisateurs.messages')->with('res', $res);
    }
    
    public function user($id)
    {
        $res = DB::select('select * from users where id = ?', [$id]);
        return View::make('user')->with('res', $res);
    }
}
