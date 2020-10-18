<?php

namespace App\Jobs;

use App\Entities\Item;
use App\Entities\ItemIn;
use App\Entities\Period;
use App\Entities\Role;
use App\Entities\User;
use App\Utils\RoleUtil;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreateItem
{
    use Dispatchable;

    protected $request;

    public $newItem;

    /**
     * Create a new job instance.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->rules($request)->validate();

        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

    }

    protected function rules(Request $request)
    {
        return Validator::make($request->all(), [
            //
        ]);
    }

}
