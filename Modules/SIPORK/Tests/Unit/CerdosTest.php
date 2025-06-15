<?php

namespace Modules\SIPORK\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class CerdosTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_pig_with_valid_attributes()
    {
        $data = [
            'birth_date'     => '2024-01-01',
            'initial_weight' => 25.50,
            'gender'         => 'M',
            'breed'          => 'Duroc',
            'status'         => 'Activo',
            'weaning_date'   => '2024-02-01',
            'sale_date'      => null,
            'gender_check'   => 'Macho',
        ];

        $id = DB::table('pigs')->insertGetId($data);

        $this->assertDatabaseHas('pigs', [
            'id_pig'         => $id,
            'birth_date'     => $data['birth_date'],
            'initial_weight' => $data['initial_weight'],
            'gender'         => $data['gender'],
            'breed'          => $data['breed'],
            'status'         => $data['status'],
            'weaning_date'   => $data['weaning_date'],
            'sale_date'      => $data['sale_date'],
            'gender_check'   => $data['gender_check'],
        ]);
    }
}
