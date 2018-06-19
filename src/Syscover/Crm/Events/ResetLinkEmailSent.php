<?php namespace Syscover\Crm\Events;

use Syscover\Crm\Models\Customer;

class ResetLinkEmailSent
{
    public $customer;
    public $token;

    /**
     * Create a new event instance.
     */
    public function __construct(Customer $customer, string $token)
    {
        $this->customer = $customer;
        $this->token = $token;
    }
}