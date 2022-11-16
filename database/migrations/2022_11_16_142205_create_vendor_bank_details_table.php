<?php

use App\Models\Vendor;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_bank_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Vendor::class)->constrained();
            $table->string('account_holder_name');
            $table->string('bank_name');
            $table->string('account_number');
            $table->timestamps();
        });
        // Schema::connection(config('database.mysql'))->table('vendor_bank_details', function (Blueprint $table) {
        //     $table->foreign('vendor_id')->references('id')->on(config('database.connections.mysql.database') . '.vendors');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor_bank_details');
    }
};
