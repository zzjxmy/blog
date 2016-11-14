<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Model\User;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendReminderEmail extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $user;
    //设置队列名字
    public $queue = 'emails';
    /**
     * Create a new job instance.
     * @param \App\Model\User $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     * @param \Illuminate\Contracts\Mail\Mailer $mailer
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $mailer->raw('Hello World', function($mailer){
            $mailer->from('13061986002@sina.cn','Hello World');
            $mailer->to('137512638@qq.com','Mz');
        });
    }
}
