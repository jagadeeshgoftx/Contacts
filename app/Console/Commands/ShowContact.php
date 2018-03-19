<?php namespace App\Console\Commands;

/**
 * Class ShowContact
 *
 * Class to show contacts
 *
 * @author jagadeesh battula jagadeesh@goftx.com
 * @package App\Console\Commands
 */

use App\Models\Contact;
use Illuminate\Console\Command;

class ShowContact extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contact:show 
                                {type : Select type from all/name/email/phone/} 
                                {--name=default : Show by name} 
                                {--email=default : Show by email}
                                {--phone=default : Show by phone}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show all contacts or by using name or phone or email';

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
        $type   = $this->argument('type');
        $name   = $this->option('name');
        $phone  = $this->option('phone');
        $email  = $this->option('email');

        switch ($type)
        {
            case 'all':

                    $contacts   = Contact::all(['name', 'email', 'phone', 'address']);
                    $headers    = ['name', 'email', 'phone', 'address'];

                    $this->table($headers, $contacts);

                    break;

            case 'name':

                    if($name == 'default')
                    {
                        $contacts   = Contact::all('name');
                        $headers    = ['name'];

                        $this->table($headers, $contacts);
                    }
                    else
                    {
                        $contacts   = Contact::where(['name'=> $name])->get(['name', 'email', 'phone', 'address']);
                        $headers    = ['name', 'email', 'phone', 'address'];

                        $this->table($headers, $contacts);
                    }

                    break;

            case 'phone':

                    if($phone == 'default')
                    {
                        $contacts   = Contact::all('phone');
                        $headers    = ['phone'];

                        $this->table($headers, $contacts);
                    }
                    else
                    {
                        $contacts   = Contact::where(['phone'=> $phone])->get(['name', 'email', 'phone', 'address']);
                        $headers    = ['name', 'email', 'phone', 'address'];

                        $this->table($headers, $contacts);
                    }

                    break;

            case 'email':

                    if($email == 'default')
                    {
                        $contacts   = Contact::all('email');
                        $headers    = ['email'];

                        $this->table($headers, $contacts);
                    }
                    else
                    {
                        $contacts   = Contact::where(['email'=> $email])->get(['name', 'email', 'phone', 'address']);
                        $headers    = ['name', 'email', 'phone', 'address'];

                        $this->table($headers, $contacts);
                    }

                    break;

            default:

                    break;

        }
    }
}
