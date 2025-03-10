<?php
require_once __DIR__ . '/../database.php';

class Stock
{
  private $connection;

  public function __construct()
  {
    global $database;
    $this->connection = $database;
  }

  public function create($name, $description, $price, $quantity)
  {
    $query = $this->connection->prepare("SELECT * FROM stocks WHERE name = ?");
    $query->execute([$name]);
    if ($query->rowCount() > 0) {
      return false;
    };

    $query = $this->connection->prepare(
      "INSERT INTO stocks (name, description, price, stock) VALUES (?, ?, ?, ?)"
    );
    return $query->execute([$name, $description, $price, $quantity]);
  }

  public function update($id, $name, $description, $price, $quantity)
  {
    $query = $this->connection->prepare(
      "UPDATE stocks SET name = ?, description = ?, price = ?, stock = ? WHERE id = ?"
    );
    return $query->execute([$name, $description, $price, $quantity, $id]);
  }

  public function delete($id)
  {
    $query = $this->connection->prepare("DELETE FROM stocks WHERE id = ?");
    return $query->execute([$id]);
  }

  public function fetchOne($id)
  {
    $query = $this->connection->prepare("SELECT * FROM stocks WHERE id = ?");
    $query->execute([$id]);
    return $query->fetch(PDO::FETCH_ASSOC);
  }

  public function fetchAll()
  {
    $query = $this->connection->prepare("SELECT * FROM stocks");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }
}
