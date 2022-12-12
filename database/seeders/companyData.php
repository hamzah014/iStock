<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

class companyData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name'=> '3M Company', 'sector'=> 'Industrials', 'symbol'=> 'MMM'],
            ['name'=> 'A.O. Smith Corp', 'sector'=> 'Industrials', 'symbol'=> 'AOS'],
            ['name'=> 'Abbott Laboratories', 'sector'=> 'Health Care', 'symbol'=> 'ABT'],
            ['name'=> 'AbbVie Inc.', 'sector'=> 'Health Care', 'symbol'=> 'ABBV'],
            ['name'=> 'Accenture plc', 'sector'=> 'Information Technology', 'symbol'=> 'ACN'],
            ['name'=> 'Activision Blizzard', 'sector'=> 'Information Technology', 'symbol'=> 'ATVI'],
            ['name'=> 'Acuity Brands Inc', 'sector'=> 'Industrials', 'symbol'=> 'AYI'],
            ['name'=> 'Adobe Systems Inc', 'sector'=> 'Information Technology', 'symbol'=> 'ADBE'],
            ['name'=> 'Advance Auto Parts', 'sector'=> 'Consumer Discretionary', 'symbol'=> 'AAP'],
            ['name'=> 'Advanced Micro Devices Inc', 'sector'=> 'Information Technology', 'symbol'=> 'AMD'],
            ['name'=> 'AES Corp', 'sector'=> 'Utilities', 'symbol'=> 'AES'],
            ['name'=> 'Aetna Inc', 'sector'=> 'Health Care', 'symbol'=> 'AET'],
            ['name'=> 'Affiliated Managers Group Inc', 'sector'=> 'Financials', 'symbol'=> 'AMG'],
            ['name'=> 'AFLAC Inc', 'sector'=> 'Financials', 'symbol'=> 'AFL'],
            ['name'=> 'Agilent Technologies Inc', 'sector'=> 'Health Care', 'symbol'=> 'A'],
            ['name'=> 'Air Products & Chemicals Inc', 'sector'=> 'Materials', 'symbol'=> 'APD'],
            ['name'=> 'Akamai Technologies Inc', 'sector'=> 'Information Technology', 'symbol'=> 'AKAM'],
            ['name'=> 'Alaska Air Group Inc', 'sector'=> 'Industrials', 'symbol'=> 'ALK'],
            ['name'=> 'Albemarle Corp', 'sector'=> 'Materials', 'symbol'=> 'ALB'],
            ['name'=> 'Alexandria Real Estate Equities Inc', 'sector'=> 'Real Estate', 'symbol'=> 'ARE'],
            ['name'=> 'Alexion Pharmaceuticals', 'sector'=> 'Health Care', 'symbol'=> 'ALXN'],
            ['name'=> 'Align Technology', 'sector'=> 'Health Care', 'symbol'=> 'ALGN'],
            ['name'=> 'Allegion', 'sector'=> 'Industrials', 'symbol'=> 'ALLE'],
            ['name'=> 'Allergan, Plc', 'sector'=> 'Health Care', 'symbol'=> 'AGN'],
            ['name'=> 'Alliance Data Systems', 'sector'=> 'Information Technology', 'symbol'=> 'ADS'],
            ['name'=> 'Alliant Energy Corp', 'sector'=> 'Utilities', 'symbol'=> 'LNT'],
            ['name'=> 'Allstate Corp', 'sector'=> 'Financials', 'symbol'=> 'ALL'],
            ['name'=> 'Alphabet Inc Class A', 'sector'=> 'Information Technology', 'symbol'=> 'GOOGL'],
            ['name'=> 'Alphabet Inc Class C', 'sector'=> 'Information Technology', 'symbol'=> 'GOOG'],
            ['name'=> 'Altria Group Inc', 'sector'=> 'Consumer Staples', 'symbol'=> 'MO'],
            ['name'=> 'Amazon.com Inc', 'sector'=> 'Consumer Discretionary', 'symbol'=> 'AMZN'],
            ['name'=> 'Ameren Corp', 'sector'=> 'Utilities', 'symbol'=> 'AEE'],
            ['name'=> 'American Airlines Group', 'sector'=> 'Industrials', 'symbol'=> 'AAL'],
            ['name'=> 'American Electric Power', 'sector'=> 'Utilities', 'symbol'=> 'AEP'],
            ['name'=> 'American Express Co', 'sector'=> 'Financials', 'symbol'=> 'AXP'],
            ['name'=> 'American International Group, Inc.', 'sector'=> 'Financials', 'symbol'=> 'AIG'],
            ['name'=> 'American Tower Corp A', 'sector'=> 'Real Estate', 'symbol'=> 'AMT'],
            ['name'=> 'American Water Works Company Inc', 'sector'=> 'Utilities', 'symbol'=> 'AWK'],
            ['name'=> 'Ameriprise Financial', 'sector'=> 'Financials', 'symbol'=> 'AMP']
        ];

        
        foreach ($data as $key => $value) {
            Company::create($value);
        }



    }
}
