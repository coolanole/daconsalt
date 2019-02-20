<?php

namespace App\Jobs;

use App\Links;
use App\Redirects;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;

class ProcessLinkStatistics implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Links
     */
    protected $link;

    /**
     * @var Request
     */
    protected $request;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 3;

    /**
     * Create a new job instance.
     *
     * @param Links $link
     * @param array $request
     */
    public function __construct(Links $link, array $request = [])
    {
        $this->link = $link;
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        /*
         * Just saving redirect info to the database.
         * But we also can handle this data. For example,
         * get user's location data from his ip.
         */

        Redirects::create([
            'link_id' => $this->link->id,
            'ip' => $this->request['ip'] ?: null,
            'useragent' => $this->request['useragent'] ?: null,
        ]);
    }
}
