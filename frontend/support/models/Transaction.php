<?php
  class Transaction {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    public function addDonation($data) {
      // Prepare Query
      $this->db->query('INSERT INTO tbldonations (id, donater_id, cause, amount, currency, status) VALUES(:id, :donater_id, :cause, :amount, :currency, :status)');

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':donater_id', $data['donater_id']);
      $this->db->bind(':cause', $data['cause']);
      $this->db->bind(':amount', $data['amount']);
      $this->db->bind(':currency', $data['currency']);
      $this->db->bind(':status', $data['status']);

      // Execute
      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }

    public function getDonations() {
      $this->db->query('SELECT * FROM tbldonations ORDER BY created_at DESC');

      $results = $this->db->resultset();

      return $results;
    }
  }