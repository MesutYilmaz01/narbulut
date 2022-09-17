<?php

namespace App\Jobs;

use App\Events\NewUserWelcomeEvent;
use App\Http\Contracts\IOrganizationService;
use App\Http\Contracts\IUserService;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Hash;
use Log;

class SaveToDatabaseFromCSV implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var array
     */
    private array $data;

    /**
     * @var IUserService
     */
    private IUserService $userService;

    /**
     * @var IOrganizationService
     */
    private IOrganizationService $organizationService;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->userService = app(IUserService::class);
        $this->organizationService = app(IOrganizationService::class);
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //Save user if its not saved before.
        if (!$this->userService->isExist($this->data[1])) {
            $user = new User();
            $user->name = explode("@",$this->data[1])[0];
            $user->email = $this->data[1];
            $pass = substr(str_shuffle(
                str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
                    mt_rand(1,10))), 1, 10);
            $user->password = Hash::make($pass);
            $this->userService->store($user);
            NewUserWelcomeEvent::dispatch($user, $pass);
        }

        //Save organization
        $organization = new Organization();
        $organization->name = $this->data[0];
        $organization->email = $this->data[1];
        $organization->phone = $this->data[2];
        $organization->address = $this->data[3];

        $this->organizationService->store($organization);
    }
}
