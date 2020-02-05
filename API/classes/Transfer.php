<?php

class Transfer
{
    private $from_amount;
    private $from_account;
    private $from_currency;
    private $from_balance;
    private $to_amount;
    private $to_account;
    private $to_currency;
    private $conn;


    public function __construct(Account $accFrom, Account $accTo, $amount, Database $db) {
        $this->from_amount = $amount;
        $this->from_account = $accFrom->getAccountId();
        $this->from_currency = $accFrom->getCurrency();
        $this->from_balance = $accFrom->getBalance();
        $this->to_amount = $amount;
        $this->to_account = $accTo->getAccountId();
        $this->to_currency = $accTo->getCurrency();
        $this->conn = $db;
    }

    /**
     * Check if Account balance is
     * not less than the amount.
     * Because the balance should not be less than 0
     */
    public function isSaldoEnough()
    {
        return ($this->from_balance >= $this->from_amount);
    }

    /**
     * Make the transfer into the database
     */
    public function makeTransfer()
    {
        // Hacer transferencia en DB
    }

}