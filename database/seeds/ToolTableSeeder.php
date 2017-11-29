<?php

use Illuminate\Database\Seeder;

class ToolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //  Schema::create('tbl_tool', function (Blueprint $table) {
    //      $table->smallIncrements('tool_id');
    //      $table->string('tool_name', 100);
    //      $table->text('tool_desc')->nullable();
    //      $table->string('tool_location', 255)->nullable();
    //      $table->boolean('tool_active');
    //      $table->timestamps();
    //  });
    public function run()
    {
      $tools = [
        [
        'tool_name' => 'Hammer',
        'tool_desc' => 'A tool consisting of a solid head, usually of metal, set crosswise on a handle, used for beating metals, driving nails, etc.',
        'tool_location' => 'Top left shelf',
        'tool_active' => 1,
        'created_at' => date('Y-m-d h:i:s', time()),
        'updated_at' => date('Y-m-d h:i:s', time()),
        ],
        [
        'tool_name' => 'Screwdriver',
        'tool_desc' => 'A hand tool for turning a screw, consisting of a handle attached to a long, narrow shank, usually of metal, which tapers and flattens out to a tip that fits into the slotted head of a screw.',
        'tool_location' => 'Bottom right shelf',
        'tool_active' => 1,
        'created_at' => date('Y-m-d h:i:s', time()),
        'updated_at' => date('Y-m-d h:i:s', time()),
        ],
        [
        'tool_name' => 'Saw',
        'tool_desc' => 'A tool consisting of a tough blade, wire, or chain with a hard toothed edge. It is used to cut through material, very often wood.',
        'tool_location' => 'On blue wall',
        'tool_active' => 1,
        'created_at' => date('Y-m-d h:i:s', time()),
        'updated_at' => date('Y-m-d h:i:s', time()),
        ]
      ];

      DB::table('tbl_tool')->insert($tools);
    }
}
