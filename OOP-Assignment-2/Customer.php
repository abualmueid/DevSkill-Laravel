<?php 

trait Customer
{
    private array $customers;

    public function addCustomer(int $bookId, array $customer) : bool
    {
        $this->customers[$bookId] = $customer;

        return true;
    }

    public function getCustomers() : array
    {
        return $this->customers;
    }

    public function getCustomer(int $bookId) : array
    {
        return $this->customers[$bookId];
    }
}