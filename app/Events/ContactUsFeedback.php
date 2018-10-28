<?php

namespace Zymawy\Ironside\Events;

use Zymawy\Ironside\Events\Event;
use Zymawy\Ironside\Models\FeedbackContactUs;

class ContactUsFeedback extends BaseEvent
{
    /**
     * Create a new event instance.
     *
     * @param FeedbackContactUs $row
     */
    public function __construct(FeedbackContactUs $row)
    {
        $row->type = 'Contact Us';
        $this->eloquent = $row;

        log_activity('Contact Us', "{$row->fullname} submitted a contact us.", $row);
    }
}
