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
        try {
            $db = $this->conn->connect();

            $sql = "INSERT INTO transactions (from_amount, from_account, to_amount, to_account)
                    VALUES (:famount, :faccount, :tamount, :taccount)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':famount', $this->from_amount);
            $stmt->bindParam(':faccount', $this->from_account);
            $stmt->bindParam(':tamount', $this->to_amount);
            $stmt->bindParam(':taccount', $this->to_account);

            $stmt->execute();
            echo "New records created successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
