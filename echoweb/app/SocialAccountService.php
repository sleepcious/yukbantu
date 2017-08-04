<?php

namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\User;
use App\Settings;
use App\Notifications\Register;

class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {
				$jmlUser = User::all();
				$role = 2;
				$status = 1;
				if(count($jmlUser) < 1){
					$role = 1;
					$status = 3;
				}
				$pass = str_random(6);
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'gambar' => $providerUser->getAvatar(),
					'role' => $role,
					'password' => bcrypt($pass),
					'status' => $status
                ]);
				
				$user->notify(new Register($user->name, $pass));
            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
	
	public function createOrGetUserGoogle(ProviderUser $providerUser)
    {
        $account = SocialAccount::whereProvider('google')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'google'
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {
				$jmlUser = User::all();
				$role = 2;
				$status = 1;
				if(count($jmlUser) < 1){
					$role = 1;
					$status = 3;
				}
				$pass = str_random(6);
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'gambar' => $providerUser->getAvatar(),
					'role' => $role,
					'password' => bcrypt($pass),
					'status' => $status
                ]);
				
				//setting email
				$mailhost = Settings::where('meta_name', '=', 'mailhost')->first();
				$mailport = Settings::where('meta_name', '=', 'mailport')->first();
				$mailtype = Settings::where('meta_name', '=', 'mailtype')->first();
				$mailaddress = Settings::where('meta_name', '=', 'mailaddress')->first();
				$mailpass = Settings::where('meta_name', '=', 'mailpass')->first();
				$logo = Settings::where('meta_name', '=', 'logo')->first();
				$websitename = Settings::where('meta_name', '=', 'websitename')->first();
				
				if(count($mailhost) != 0 && count($mailport) != 0 && count($mailtype) != 0 && count($mailaddress) != 0 && count($mailpass) != 0):
				//verifikasi email - kirim password
				$view = View::make('mail.register', [
					'logo' => $logo->konten,
					'nama' => $request->name,
					'password' => $pass,
					'websitename' => $websitename->konten
				]);
				$html = $view->render();
				$transport = \Swift_SmtpTransport::newInstance($mailhost->konten, $mailport->konten, $mailtype->konten)
						->setUsername($mailaddress->konten)
						->setPassword($mailpass->konten);
				$mailer = \Swift_Mailer::newInstance($transport);
				$message = \Swift_Message::newInstance();
				$message->setSubject($websitename->konten.' - Registrasi');
				$message->setFrom([$mailaddress->konten => $websitename->konten]);
				$message->setTo($providerUser->getEmail());
				$message->setBody($html, 'text/html');
				$mailer->send($message);
				endif;
            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
}