<?php 

trait Customer
{
    private array $customers;

    public function addCustomer(int $bookId, array $customer) : bool
    {
        if(strlen($customer['mobileNo']) !== 11)
        {
            echo "Invalid Mobile No!";

            return false;
        }

        if(strlen($customer['mobileNo']) === 11)
        {
            echo "Valid Mobile No!";
            $this->customers[$bookId] = $customer;

            return true;
        }
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