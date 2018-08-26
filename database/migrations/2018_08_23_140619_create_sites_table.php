<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{

	protected $fillable = ['vendor_id','name','address','email','phone1','phone2','slug','coverphoto','profilephoto'];
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->increments('id');
			$table->string('vendor_id');
			$table->string('name');
			$table->string('address');
			$table->string('email');
			$table->bigInteger('phone1');
			$table->bigInteger('phone2');
			$table->string('slug');
			$table->string('coverphoto')->nullable();
			$table->string('profilephoto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sites');
    }
}
