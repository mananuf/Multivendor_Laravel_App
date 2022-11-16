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
        Schema::create('vendors_business_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Vendor::class)->constrained();
            $table->string('shop_name');
            $table->string('shop_address');
            $table->string('shop_city');
            $table->string('shop_state');
            $table->string('shop_country');
            $table->string('shop_contact');
            $table->string('shop_email');
            $table->string('shop_website')->nullable();
            $table->string('address_proof');
            $table->string('address_image');
            $table->string('business_license_number');
            $table->timestamps();
        });


        // Schema::connection(config('database.mysql'))->table('vendors_business_details', function (Blueprint $table) {
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
        Schema::dropIfExists('vendors_business_details');
    }
};
