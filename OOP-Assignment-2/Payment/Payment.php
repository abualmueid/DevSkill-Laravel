<?php 

trait Payment
{
    private array $payments;

    public function addPayment(int $bookId, int|float $amount, object $book) : bool
    {
        if($book->getBook($bookId)['price'] !== $amount)
        {
            echo "Payment Unsuccessful!";

            return false;
        }
        
        if($book->getBook($bookId)['price'] === $amount)
        {
            $this->payments[$bookId] = $amount;
            echo "Payment Successful!";

            return true;
        }
    }

    public function getPayment(int $bookId) : int|float
    {
        return $this->payments[$bookId] ?? 0;
    }

}