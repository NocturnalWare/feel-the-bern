<?php

use Illuminate\Database\Seeder;
use App\StateList as State;

class StateListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		State::create(['state_name' => 'Alabama', 'state_abbr' => 'AL']);
		State::create(['state_name' => 'Alaska', 'state_abbr' => 'AK']);
		State::create(['state_name' => 'Arizona', 'state_abbr' => 'AZ']);
		State::create(['state_name' => 'Arkansas', 'state_abbr' => 'AR']);
		State::create(['state_name' => 'California', 'state_abbr' => 'CA']);
		State::create(['state_name' => 'Colorado', 'state_abbr' => 'CO']);
		State::create(['state_name' => 'Connecticut', 'state_abbr' => 'CT']);
		State::create(['state_name' => 'Delaware', 'state_abbr' => 'DE']);
		State::create(['state_name' => 'Florida', 'state_abbr' => 'FL']);
		State::create(['state_name' => 'Georgia', 'state_abbr' => 'GA']);
		State::create(['state_name' => 'Hawaii', 'state_abbr' => 'HI']);
		State::create(['state_name' => 'Idaho', 'state_abbr' => 'ID']);
		State::create(['state_name' => 'Illinois', 'state_abbr' => 'IL']);
		State::create(['state_name' => 'Indiana', 'state_abbr' => 'IN']);
		State::create(['state_name' => 'Iowa', 'state_abbr' => 'IA']);
		State::create(['state_name' => 'Kansas', 'state_abbr' => 'KS']);
		State::create(['state_name' => 'Kentucky', 'state_abbr' => 'KY']);
		State::create(['state_name' => 'Louisiana', 'state_abbr' => 'LA']);
		State::create(['state_name' => 'Maine', 'state_abbr' => 'ME']);
		State::create(['state_name' => 'Maryland', 'state_abbr' => 'MD']);
		State::create(['state_name' => 'Massachusetts', 'state_abbr' => 'MA']);
		State::create(['state_name' => 'Michigan', 'state_abbr' => 'MI']);
		State::create(['state_name' => 'Minnesota', 'state_abbr' => 'MN']);
		State::create(['state_name' => 'Mississippi', 'state_abbr' => 'MS']);
		State::create(['state_name' => 'Missouri', 'state_abbr' => 'MO']);
		State::create(['state_name' => 'Montana', 'state_abbr' => 'MT']);
		State::create(['state_name' => 'Nebraska', 'state_abbr' => 'NE']);
		State::create(['state_name' => 'Nevada', 'state_abbr' => 'NV']);
		State::create(['state_name' => 'New Hampshire', 'state_abbr' => 'NH']);
		State::create(['state_name' => 'New Jersey', 'state_abbr' => 'NJ']);
		State::create(['state_name' => 'New Mexico', 'state_abbr' => 'NM']);
		State::create(['state_name' => 'New York', 'state_abbr' => 'NY']);
		State::create(['state_name' => 'North Carolina', 'state_abbr' => 'NC']);
		State::create(['state_name' => 'North Dakota', 'state_abbr' => 'ND']);
		State::create(['state_name' => 'Ohio', 'state_abbr' => 'OH']);
		State::create(['state_name' => 'Oklahoma', 'state_abbr' => 'OK']);
		State::create(['state_name' => 'Oregon', 'state_abbr' => 'OR']);
		State::create(['state_name' => 'Pennsylvania', 'state_abbr' => 'PA']);
		State::create(['state_name' => 'Rhode Island', 'state_abbr' => 'RI']);
		State::create(['state_name' => 'South Carolina', 'state_abbr' => 'SC']);
		State::create(['state_name' => 'South Dakota', 'state_abbr' => 'SD']);
		State::create(['state_name' => 'Tennessee', 'state_abbr' => 'TN']);
		State::create(['state_name' => 'Texas', 'state_abbr' => 'TX']);
		State::create(['state_name' => 'Utah', 'state_abbr' => 'UT']);
		State::create(['state_name' => 'Vermont', 'state_abbr' => 'VT']);
		State::create(['state_name' => 'Virginia', 'state_abbr' => 'VA']);
		State::create(['state_name' => 'Washington', 'state_abbr' => 'WA']);
		State::create(['state_name' => 'West Virginia', 'state_abbr' => 'WV']);
		State::create(['state_name' => 'Wisconsin', 'state_abbr' => 'WI']);
		State::create(['state_name' => 'Wyoming', 'state_abbr' => 'WY']);
    }
}
