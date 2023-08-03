<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $items = Item::all();
        $users = User::all();
        $invoiceCode = 'NV-DJC-F-KUN';
        foreach ($users as $key => $user) {
            $invoice = $user->invoices()->create(
                [
                    'code'      =>  $invoiceCode . str_pad($key + 1, 4, '0', STR_PAD_LEFT),
                ]
            );
            $tempItems = $items->random(rand(3, 10));
            foreach ($tempItems as $item) {
                $invoice->items()->attach(
                    $item,
                    [
                        'amount'    =>  rand(1, 5),
                        'price'     =>  $item->price - rand((1 * 10000), $item->price / 4)
                    ]
                );
            }
        }
    }
}
