<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'company@gmail.com')->first();

        $company = new Company();
        $company->company_name = 'Company Shop';
        $company->phone = '12321312';
        $company->email = 'company@gmail.com';
        $company->address = 'Usa';
        $company->description = 'company description';
        $company->user_id = $user->id;
        $company->save();
    }
}
