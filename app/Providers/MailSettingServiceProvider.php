<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Config;
use App\EmailSetting;


class MailSettingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $email_setting = EmailSetting::first();
                $config = array(
                    'driver'     => $email_setting->protocol,
                    'stream' => [
                        'ssl' => [
                            'allow_self_signed' => true,
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                        ],
                        ],
                    'host'       => $email_setting->host,
                    'port'       => $email_setting->port,
                    'from'       => array('address' => $email_setting->email, 'name' => 'Admin'),
                    'encryption' => 'tls',
                    'username'   => $email_setting->email,
                    'password'   => $email_setting->password,
                    'sendmail'   => '/usr/sbin/sendmail -bs',
                    'pretend'    => false,
                );
               Config::set('mail', $config);
    }
}
