<?php

    namespace App\Events;

    use Illuminate\Broadcasting\Channel;
    use Illuminate\Broadcasting\InteractsWithSockets;
    use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
    use Illuminate\Foundation\Events\Dispatchable;
    use Illuminate\Queue\SerializesModels;

    class SearchVendorEvent implements ShouldBroadcastNow
    {
        use Dispatchable, InteractsWithSockets, SerializesModels;

        /**
         * Create a new event instance.
         *
         * @return void
         */

        public $vendors ;

        public function __construct($vendors)
        {
            //
            $this->vendors = $vendors;

        }

        /**
         * Get the channels the event should broadcast on.
         *
         * @return \Illuminate\Broadcasting\Channel|array
         */

        /**
         * @return string
         */
        public function broadcastAs()
        {
            return 'searchVendorResults';
        }

        public function broadcastOn()
        {
            return new Channel('searchvendor');
        }
    }
