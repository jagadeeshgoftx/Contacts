<?php namespace App\Console\Commands;

/**
 * Class CreateContact
 *
 * Class to create a new contact into database
 *
 * @author Jagadeesh Battula jagadeesh@goftx.com
 * @package App\Console\Commands
 */

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CreateContact extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contact:create 
                                {name       : Enter Name}
                                {email      : Enter Email}
                                {phone      : Enter Phone Number}
                                {address    : Enter address}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Contact';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $contact                = $this->argument();
        $contact['created_at']  = Carbon::now();
        $contact['updated_at']  = Carbon::now();
        $success                = Contact::create($contact);

        if(!$success)
        {
            $this->error('Contact creation failed');
        }

        $this->info('Contact created successfully');
    }
}
