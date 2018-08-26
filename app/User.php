<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
	
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = ['firstname','lastname','email','phone','password'];

	
    /**
     * This is to send password reset email, it overrides the default laravel password reset notification
	 * please refer to https://laravel.com/docs/5.3/passwords/#password-customization for proper documentation
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
	public function sendPasswordResetNotification($token){
		$this->notify(new \App\Notifications\sendUserPasswordResetNotification($token));
	}  


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	

}
