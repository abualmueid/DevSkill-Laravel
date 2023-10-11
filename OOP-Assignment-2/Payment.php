<?php 

trait Payment
{
    private array $payments;

    public function addPayment(int $bookId, int|float $amount) : bool
    {
        if($bookId)
        $this->payments[$bookId] = $amount;

        return true;
    }

    public function getPayment(int $bookId) : int|float
    {
        return $this->payments[$bookId];
    }

}