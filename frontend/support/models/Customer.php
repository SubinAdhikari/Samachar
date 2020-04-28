<?php
  class Customer {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    public function addDonater($data) {
      // Prepare Query
      $this->db->query('INSERT INTO tbldonaters (id, first_name, last_name, email) VALUES(:id, :first_name, :last_name, :email)');

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':first_name', $data['first_name']);
      $this->db->bind(':last_name', $data['last_name']);
      $this->db->bind(':email', $data['email']);

      // Execute
      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }

    public function getDonaters() {
      $this->db->query('SELECT * FROM tbldonaters ORDER BY created_at DESC');

      $results = $this->db->resultset();

      return $results;
    }
  }