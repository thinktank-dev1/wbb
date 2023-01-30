<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Validator;
use Hash;
use App\Models\User;
use App\Models\Role;

class SystemInitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'system:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->createAdminAccount();
    }

    public function createAdminAccount(){
        $this->line("CREATING ADMIN USER");
        $this->line("----------------------");
        $this->line("");
        
        $first_name = $this->ask("Enter First Name");
        $last_name = $this->ask("Enter Last Name");
        $contact_number = $this->ask("Enter Contact Number");
        $email = $this->ask("Enter Email Address");
        $password = $this->ask("Enter Password");

        $valid = Validator::make(
            [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'contact_number' => $contact_number,
                'email' => $email,
                'password' => $password
            ],
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'contact_number' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required'
            ]
        );
        if($valid->fails()){
            $this->warn("Admin not created. See info below");
            foreach ($valid->errors()->all() as $error) {
                $this->error($error);
            }
            return 1;
        }

        $role = Role::where('name', 'su')->first();
        $admin = User::create([
            'role_id' => $role->id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'contact_primary' => $contact_number,
            'email' => $email,
            'password' => Hash::make($password)
        ]);
        $this->info("Admin User created successfully");
    }
}
