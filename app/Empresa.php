<?php
// use Illuminate\Auth\UserInterface;
// use Illuminate\Auth\Reminders\RemindableInterface;

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'empresa';
	public $timestamps = false;

	public function usuario(){
		return $this->belongsTo('\App\Usuario', 'usuario_id');
	}
}