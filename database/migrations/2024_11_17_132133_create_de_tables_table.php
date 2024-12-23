<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('de_tables', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('supplier_id');
            $table->uuid('prepare_id')->nullable();
            $table->string('title');
            $table->foreignUuid('car_type_id')->references('id')->on('car_types');
            $table->foreignUuid('machine_id')->references('id')->on('machines');
            $table->foreignUuid('line_id')->references('id')->on('lines');
            //Class A
            $table->text('supplier_class_a_section_1_item_a');
            $table->text('toyota_class_a_section_1_item_a')->nullable();
            $table->text('supplier_class_a_section_1_item_b');
            $table->text('toyota_class_a_section_1_item_b')->nullable();
            $table->text('supplier_class_a_section_1_item_c');
            $table->text('toyota_class_a_section_1_item_c')->nullable();
            
            $table->text('supplier_class_a_section_2_item_a');
            $table->text('toyota_class_a_section_2_item_a')->nullable();

            $table->text('supplier_class_a_section_3_item_a');
            $table->text('toyota_class_a_section_3_item_a')->nullable();

            $table->text('supplier_class_a_section_4_item_a');
            $table->text('toyota_class_a_section_4_item_a')->nullable();

            $table->text('supplier_class_a_section_5_item_a');
            $table->text('toyota_class_a_section_5_item_a')->nullable();

            //ClassB
            $table->text('supplier_class_b_section_1_item_a');
            $table->text('toyota_class_b_section_1_item_a')->nullable();
            
            $table->text('supplier_class_b_section_1_item_b');
            $table->text('toyota_class_b_section_1_item_b')->nullable();

            $table->text('supplier_class_b_section_2_item_a');
            $table->text('toyota_class_b_section_2_item_a')->nullable();
            
            $table->text('supplier_class_b_section_3_item_a');
            $table->text('toyota_class_b_section_3_item_a')->nullable();

            $table->text('supplier_class_b_section_4_item_a');
            $table->text('toyota_class_b_section_4_item_a')->nullable();

            $table->text('supplier_class_b_section_5_item_a');
            $table->text('toyota_class_b_section_5_item_a')->nullable();

            $table->text('supplier_class_b_section_5_item_b');
            $table->text('toyota_class_b_section_5_item_b')->nullable();

            $table->text('supplier_class_b_section_5_item_c');
            $table->text('toyota_class_b_section_5_item_c')->nullable();

            $table->text('supplier_class_b_section_5_item_d');
            $table->text('toyota_class_b_section_5_item_d')->nullable();

            $table->text('supplier_class_b_section_5_item_e');
            $table->text('toyota_class_b_section_5_item_e')->nullable();

            $table->text('supplier_class_b_section_6_item_a');
            $table->text('toyota_class_b_section_6_item_a')->nullable();

            $table->text('supplier_class_b_section_7_item_a');
            $table->text('toyota_class_b_section_7_item_a')->nullable();

            $table->text('supplier_class_b_section_8_item_a');
            $table->text('toyota_class_b_section_8_item_a')->nullable();

            $table->text('supplier_class_b_section_9_item_a');
            $table->text('toyota_class_b_section_9_item_a')->nullable();

            $table->text('supplier_class_b_section_10_item_a');
            $table->text('toyota_class_b_section_10_item_a')->nullable();

            //Class C
            $table->text('supplier_class_c_section_1_item_a');
            $table->text('toyota_class_c_section_1_item_a')->nullable();

            $table->text('supplier_class_c_section_1_item_b');
            $table->text('toyota_class_c_section_1_item_b')->nullable();

            $table->text('supplier_class_c_section_2_item_a');
            $table->text('toyota_class_c_section_2_item_a')->nullable();
            
            $table->text('supplier_class_c_section_2_item_b');
            $table->text('toyota_class_c_section_2_item_b')->nullable();
            
            $table->text('supplier_class_c_section_3_item_a');
            $table->text('toyota_class_c_section_3_item_a')->nullable();
            
            $table->text('supplier_class_c_section_3_item_b');
            $table->text('toyota_class_c_section_3_item_b')->nullable();

            $table->text('supplier_class_c_section_3_item_c');
            $table->text('toyota_class_c_section_3_item_c')->nullable();
            $table->text('supplier_class_c_section_4_item_a');
            $table->text('toyota_class_c_section_4_item_a')->nullable();

            $table->text('supplier_class_c_section_5_item_a');
            $table->text('toyota_class_c_section_5_item_a')->nullable();
            
            $table->text('supplier_class_c_section_5_item_b');
            $table->text('toyota_class_c_section_5_item_b')->nullable();

            $table->text('supplier_class_c_section_6_item_a');
            $table->text('toyota_class_c_section_6_item_a')->nullable();
            
            $table->text('supplier_class_c_section_6_item_b');
            $table->text('toyota_class_c_section_6_item_b')->nullable();

            $table->text('supplier_class_c_section_7_item_a');
            $table->text('toyota_class_c_section_7_item_a')->nullable();

            $table->text('supplier_class_c_section_8_item_a');
            $table->text('toyota_class_c_section_8_item_a')->nullable();

            $table->text('supplier_class_d_section_1_item_a');
            $table->text('toyota_class_d_section_1_item_a')->nullable();

            $table->text('supplier_class_d_section_2_item_a');
            $table->text('toyota_class_d_section_2_item_a')->nullable();
            
            $table->text('supplier_class_d_section_2_item_b');
            $table->text('toyota_class_d_section_2_item_b')->nullable();

            $table->text('supplier_class_d_section_3_item_a');
            $table->text('toyota_class_d_section_3_item_a')->nullable();

            $table->text('supplier_class_d_section_4_item_a');
            $table->text('toyota_class_d_section_4_item_a')->nullable();
            
            $table->text('supplier_class_d_section_4_item_b');
            $table->text('toyota_class_d_section_4_item_b')->nullable();
            
            $table->text('supplier_class_d_section_4_item_c');
            $table->text('toyota_class_d_section_4_item_c')->nullable();
            
            $table->text('supplier_class_d_section_2_item_d');
            $table->text('toyota_class_d_section_2_item_d')->nullable();

            $table->text('supplier_class_d_section_5_item_a');
            $table->text('toyota_class_d_section_5_item_a')->nullable();

            $table->text('supplier_class_d_section_6_item_a');
            $table->text('toyota_class_d_section_6_item_a')->nullable();

            $table->text('supplier_class_d_section_7_item_a');
            $table->text('toyota_class_d_section_7_item_a')->nullable();

            $table->text('supplier_class_d_section_8_item_a');
            $table->text('toyota_class_d_section_8_item_a')->nullable();
            
            $table->text('supplier_class_d_section_8_item_b');
            $table->text('toyota_class_d_section_8_item_b')->nullable();

            $table->text('supplier_class_d_section_9_item_a');
            $table->text('toyota_class_d_section_9_item_a')->nullable();

            $table->text('supplier_class_d_section_10_item_a');
            $table->text('toyota_class_d_section_10_item_a')->nullable();

            $table->text('supplier_class_d_section_11_item_a');
            $table->text('toyota_class_d_section_11_item_a')->nullable();
            
            $table->text('supplier_class_d_section_11_item_b');
            $table->text('toyota_class_d_section_11_item_b')->nullable();

            $table->text('supplier_class_e_section_1_item_a');
            $table->text('toyota_class_e_section_1_item_a')->nullable();
            
            $table->text('supplier_class_e_section_1_item_b');
            $table->text('toyota_class_e_section_1_item_b')->nullable();

            $table->text('supplier_class_e_section_2_item_a');
            $table->text('toyota_class_e_section_2_item_a')->nullable();
            
            $table->text('supplier_class_e_section_2_item_b');
            $table->text('toyota_class_e_section_2_item_b')->nullable();

            $table->text('supplier_class_e_section_2_item_c');
            $table->text('toyota_class_e_section_2_item_c')->nullable();

            $table->text('supplier_class_e_section_2_item_d');
            $table->text('toyota_class_e_section_2_item_d')->nullable();
            
            $table->text('supplier_class_e_section_2_item_e');
            $table->text('toyota_class_e_section_2_item_e')->nullable();

            $table->text('supplier_class_e_section_2_item_f');
            $table->text('toyota_class_e_section_2_item_f')->nullable();
            
            $table->text('supplier_class_e_section_2_item_g');
            $table->text('toyota_class_e_section_2_item_g')->nullable();

            $table->text('supplier_class_e_section_3_item_a');
            $table->text('toyota_class_e_section_3_item_a')->nullable();
            
            $table->text('supplier_class_e_section_3_item_b');
            $table->text('toyota_class_e_section_3_item_b')->nullable();

            $table->text('supplier_class_e_section_3_item_c');
            $table->text('toyota_class_e_section_3_item_c')->nullable();

            $table->text('supplier_class_e_section_4_item_a');
            $table->text('toyota_class_e_section_4_item_a')->nullable();
            
            $table->text('supplier_class_e_section_4_item_b');
            $table->text('toyota_class_e_section_4_item_b')->nullable();

            $table->text('supplier_class_e_section_5_item_a');
            $table->text('toyota_class_e_section_5_item_a')->nullable();
            
            $table->text('supplier_class_e_section_5_item_b');
            $table->text('toyota_class_e_section_5_item_b')->nullable();

            $table->text('supplier_class_e_section_6_item_a');
            $table->text('toyota_class_e_section_6_item_a')->nullable();
            
            $table->text('supplier_class_e_section_6_item_b');
            $table->text('toyota_class_e_section_6_item_b')->nullable();

            $table->text('supplier_class_e_section_7_item_a');
            $table->text('toyota_class_e_section_7_item_a')->nullable();

            $table->text('supplier_class_f_section_1_item_a');
            $table->text('toyota_class_f_section_1_item_a')->nullable();
            
            $table->text('supplier_class_f_section_1_item_b');
            $table->text('toyota_class_f_section_1_item_b')->nullable();

            $table->text('supplier_class_f_section_1_item_c');
            $table->text('toyota_class_f_section_1_item_c')->nullable();

            $table->text('supplier_class_f_section_2_item_a');
            $table->text('toyota_class_f_section_2_item_a')->nullable();
            
            $table->text('supplier_class_f_section_2_item_b');
            $table->text('toyota_class_f_section_2_item_b')->nullable();

            $table->text('supplier_class_f_section_3_item_a');
            $table->text('toyota_class_f_section_3_item_a')->nullable();
            
            $table->text('supplier_class_f_section_3_item_b');
            $table->text('toyota_class_f_section_3_item_b')->nullable();
            $table->text('supplier_class_f_section_3_item_c');
            $table->text('toyota_class_f_section_3_item_c')->nullable();
            
            $table->text('supplier_class_f_section_3_item_d');
            $table->text('toyota_class_f_section_3_item_d')->nullable();
            $table->text('supplier_class_f_section_3_item_e');
            $table->text('toyota_class_f_section_3_item_e')->nullable();

            $table->text('supplier_class_g_section_1_item_a');
            $table->text('toyota_class_g_section_1_item_a')->nullable();

            $table->text('supplier_class_g_section_2_item_a');
            $table->text('toyota_class_g_section_2_item_a')->nullable();
            $table->text('supplier_class_g_section_2_item_b');
            $table->text('toyota_class_g_section_2_item_b')->nullable();
            $table->text('supplier_class_g_section_2_item_c');
            $table->text('toyota_class_g_section_2_item_c')->nullable();

            $table->text('supplier_class_g_section_3_item_a');
            $table->text('toyota_class_g_section_3_item_a')->nullable();
            $table->text('supplier_class_g_section_3_item_b');
            $table->text('toyota_class_g_section_3_item_b')->nullable();

            $table->text('supplier_class_g_section_4_item_a');
            $table->text('toyota_class_g_section_4_item_a')->nullable();

            $table->integer('supplier_ng');
            $table->integer('supplier_good');
            $table->integer('supplier_nc');
            $table->integer('supplier_na');
            $table->integer('toyota_ng');
            $table->integer('toyota_good');
            $table->integer('toyota_nc');
            $table->integer('toyota_na');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('de_tables');
    }
};
