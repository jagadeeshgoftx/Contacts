<?php namespace App\Console\Commands;

/**
 * Class DeleteContact
 *
 * Class for deleting contact from database
 *
 * @author jagadeesh Battula jagadeesh@goftx.com
 * @package App\Console\Commands
 */

use App\Models\Contact;
use Illuminate\Console\Command;

class DeleteContact extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contact:delete
                                {type               : Select option type all/name/email/phone/} 
                                {--name=default     : Show by name} 
                                {--email=default    : Show by email}
                                {--phone=default    : Show by phone}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all contacts or by name or email or phone';

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

                    if($this->confirm('Are you sure you want to delete all contacts?'))
                    {
                        $contacts = Contact::truncate();

                        if(!$contacts)
                        {
                            $this->info('Failed to delete contacts');
                        }

                        $this->info('Contacts deleted');
                    }

                    break;

            case 'name':

                    if($name == 'default')
                    {
                        $this->error('Provide a name along with option to delete');
                    }
                    else
                    {
                        $contacts = Contact::where(['name'=> $name])->delete();

                        if(!$contacts)
                        {
                            $this->error('failed to delete the contact');
                        }

                        $this->info('Contact deleted successfully');
                    }

                    break;

            case 'phone':

                    if($phone == 'default')
                    {
                        $this->error('Provide a phone number along with option to delete');
                    }
                    else
                    {
                        $contacts = Contact::where(['phone'=> $phone])->delete();

                        if(!$contacts)
                        {
                            $this->error('failed to delete the contact');
                        }

                        $this->info('Contact deleted successfully');
                    }

                    break;

            case 'email':

                    if($email == 'default')
                    {
                        $this->error('Provide a email along with option to delete');
                    }
                    else
                    {
                        $contacts = Contact::where(['email'=> $email])->delete();

                        if(!$contacts)
                        {
                            $this->error('failed to delete the contact');
                        }

                        $this->info('Contact deleted successfully');
                    }

                    break;

            default:
                {
                    break;
                }
        }
    }
}
