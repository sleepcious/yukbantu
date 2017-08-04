<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\User;
use App\Donasi;
use App\Isisaku;
use App\Campaign;
use Carbon\Carbon;
use App\Notifications\DonasiFail;
use App\Notifications\DepositFail;
use App\Notifications\CampaignDead;
use App\Notifications\CampaignEnd;

class DonasiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'donasi:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $donations = Donasi::where([['created_at', '>=', Carbon::now()->subDays(3)->toDateTimeString()], ['status', 1]])->get();
        $donations1 = Donasi::where([['created_at', '>=', Carbon::now()->subDays(3)->toDateTimeString()], ['status', 1]])->update(['status' => 3]);
		foreach($donations as $donasi){
			$donasi->notify(new DonasiFail($donasi->name, $donasi->kampanye->judul));
		}
		$deposits = Isisaku::where([['created_at', '>=', Carbon::now()->subDays(3)->toDateTimeString()], ['status', 1]])->get();
		$deposits1 = Isisaku::where([['created_at', '>=', Carbon::now()->subDays(3)->toDateTimeString()], ['status', 1]])->update(['status' => 3]);
		foreach($deposits as $deposit){
			$user = User::find($deposit->user_id);
			$user->notify(new DepositFail($user->name));
		}
		$campaigns = Campaign::where('deadline', '>=', Carbon::now()->addDays(3)->toDateTimeString())->get();
		foreach($campaigns as $campaign){
			$user = User::find($campaign->user_id);
			$user->notify(new CampaignDead($user->name, $campaign->judul));
		}
		$ubahs = Campaign::where([['deadline', '<=', Carbon::now()->toDateTimeString()], ['status', 1]])->get();
		$ubahs1 = Campaign::where([['deadline', '<=', Carbon::now()->toDateTimeString()], ['status', 1]])->update(['status' => 3]);
		foreach($ubahs as $ubah){
			$user = User::find($ubah->user_id);
			$user->notify(new CampaignEnd($user->name, $ubah->judul));
		}
    }
}
