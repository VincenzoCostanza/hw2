<?php

use Illuminate\Routing\Controller as BaseController;

    class LoginController extends BaseController{
    
        public function login(){
            //verifichiamo se l'utente ha gia fatto il login
            if(session('utente')!=null){
                return redirect('home');
            }else{
                if(Request::old('username')!==null && Request::old('password')!==null){
                    $old_username=Request::old('username');
                    return view('login')
                        ->with('csrf_token', csrf_token())
                        ->with('error', "Credenziali non valide.")
                        ->with('old_username', $old_username);
                }else{//giustamente se i dati non sono stati inseriti e la sessione non esiste allora vuol dire che sto entrando per la prima volta in login
                    return view('login')
                    ->with('csrf_token', csrf_token())
                    ->with('old_username', "");
                }
            }
            
        }

        public function checkLoginjs(){
            $user = User::where('username', request('username'))->first();
            if(isset($user)) {
                $password= $user->password;
                if(password_verify(request('password'),$password)){
                    Session::put('utente',$user->username);
                }else{ //password non corretta
                return 1;
                }
            }else{
                //username non valida
                return 1;
            }
        }    
        
        


        public function checkLogin(){
            // se ho mandato dati post nulli (anche uno solo dei 2) torno la vista con errore
            if(request('username')===null || request('password')===null){
                return view('login')
                    ->with('csrf_token', csrf_token())
                    ->with('old_username', request('username'))
                    ->with('error', "Compila tutti i campi.");
            }
            //se non ho fatto return allora ho mandato dei dati post non nulli, verifico se esiste l'utente
            $user = User::where('username', request('username'))->first();
            if(isset($user)) { //verifichiamo che la password sia corretta
                $password= $user->password;
                if(password_verify(request('password'),$password)){
                    Session::put('utente',$user->username);
                    return redirect('home');
                } else { //password non corretta
                    return redirect('login')
                    ->withInput();
                }
                
            }
            else {
                // username non valida
                return redirect('login')
                ->withInput();
            }
        }    
    
        public function logout(){
            Session::flush();
            return redirect('login');
        }
    }
?>