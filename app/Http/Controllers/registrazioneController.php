<?php
use Illuminate\Routing\Controller as BaseController;

    class registrazioneController extends BaseController{
        public function registrazione(){
            return view('registrazione')
                ->with('csrf_token', csrf_token())
                ->with('old_nome', request('nome'))
                ->with('old_cognome', request('cognome'))
                ->with('old_username', request('username'))
                ->with('old_password',request('password'))
                ->with('old_email', request('email'));
        }

        public function checkRegistrazione(){
            $errori=array();
            if(request('nome')===null || request('cognome')===null || request('username')===null || request('email')===null || request('password')===null){
                $errori[]='compila tutti i campi!';
                return view('registrazione')
                ->with('csrf_token', csrf_token())
                ->with('old_nome', request('nome'))
                ->with('old_cognome', request('cognome'))
                ->with('old_username', request('username'))
                ->with('old_password',request('password'))
                ->with('old_email', request('email'))
                ->with('errori', $errori);
            }
            //se sono qui impplica che non ho avuto campi nulli. vado avanti!
            if(!ctype_alpha(request('nome'))){
                $errori[]='il nome deve contenere lettere e non altro!';
            }

            if(!ctype_alpha(request('cognome'))) {
                $errori[]="Il cognome deve contenere lettere e non altro!";
            }

            if(request('username')){
                $user=User::where('username',request('username'))->first();
                if(isset($user)){
                    $errori[]="Mi dispiace, username gia in uso";
                }
            }

            if(strlen(request('password'))<7){
                $errori[]="La password deve almeno contenere 8 caratteri!";
            }else{
                $password=request('password');
                $password=password_hash($password,PASSWORD_BCRYPT);
            }

            if(!filter_var(request('email'), FILTER_VALIDATE_EMAIL)){
                $errori[]="email errata";
            }

            if(count($errori)===0){
                $user=new User;
                $user->nome=request('nome');
                $user->cognome=request('cognome');
                $user->username=request('username');
                $user->email=request('email');
                $user->password=$password;
                $user->save();
                return redirect("login");
            }else{
                return view('registrazione')
                    ->with('csrf_token', csrf_token())
                    ->with('old_nome', request('nome'))
                    ->with('old_cognome', request('cognome'))
                    ->with('old_username', request('username'))
                    ->with('old_email', request('email'))
                    ->with('old_password',request('password'))
                    ->with('errori', $errori);
            }
        }

        public function checkUsername($username){
            $user = User::where('username', $username)->first();
            if(isset($user)){
                return 0;
            }else{
                return 1;
            }
        }
    }
?>