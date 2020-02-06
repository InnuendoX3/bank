<?php

class Account
{
    private $user_id;
    private $account_nr;
    private $balance;
    private $currency;

    public function __construct(User $user)
    {
        $this->user_id = $user->getUserId();
        $this->account_nr = $user->getAccountId();
        $this->balance = $user->getBalance();
        $this->currency = $user->getCurrency();

        // echo "$this->account_nr $this->user_id $this->balance $this->currency";
    }

    public function getAccountId()
    {
        return $this->account_nr;
    }

    public function getUserId()
    {
        return $this->user_id;
    }
    
    public function getBalance()
    {
        return $this->balance;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

}