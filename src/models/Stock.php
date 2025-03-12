<?php
require_once __DIR__ . '/../database.php';

class Stock
{
  private $connection;

  /**
   * Stock constructor.
   * 
   * Initializes the Stock object by setting up a connection to the database.
   */
  public function __construct()
  {
    global $database;
    $this->connection = $database;
  }

  /**
   * Creates a new stock.
   *
   * @param string $name The stock name.
   * @param string $description The stock description.
   * @param float $price The stock price.
   * @param int $quantity The stock quantity.
   *
   * @return bool True if the stock was created, false if a stock with the
   *   same name already exists.
   */
  public function create($name, $description, $price, $quantity)
  {
    $query = $this->connection->prepare("SELECT * FROM stocks WHERE name = ?");
    $query->execute([$name]);
    if ($query->rowCount() > 0) {
      return false;
    };

    $query = $this->connection->prepare(
      "INSERT INTO stocks (name, description, price, quantity) VALUES (?, ?, ?, ?)"
    );
    return $query->execute([$name, $description, $price, $quantity]);
  }

  /**
   * Updates a stock with the given parameters.
   * 
   * @param int $id The ID of the stock to update.
   * @param string $name The new name of the stock.
   * @param string $description The new description of the stock.
   * @param float $price The new price of the stock.
   * @param int $quantity The new quantity of the stock.
   * 
   * @return bool True if the stock was updated successfully, false if the ID does not exist.
   */
  public function update($id, $name, $description, $price, $quantity)
  {
    $query = $this->connection->prepare(
      "UPDATE stocks SET name = ?, description = ?, price = ?, quantity = ? WHERE id = ?"
    );
    return $query->execute([$name, $description, $price, $quantity, $id]);
  }

  /**
   * Deletes a stock with the given ID.
   * 
   * @param int $id The ID of the stock to delete.
   * 
   * @return bool True if the stock was deleted successfully, false if the ID does not exist.
   */
  public function delete($id)
  {
    $query = $this->connection->prepare("DELETE FROM stocks WHERE id = ?");
    return $query->execute([$id]);
  }

  /**
   * Fetches a stock by its ID.
   * 
   * Executes a query to retrieve a stock record from the database based on the given ID.
   * 
   * @param int $id The ID of the stock to fetch.
   * 
   * @return array|false An associative array of the stock data if found, false otherwise.
   */
  public function fetchOne($id)
  {
    $query = $this->connection->prepare("SELECT * FROM stocks WHERE id = ?");
    $query->execute([$id]);
    return $query->fetch(PDO::FETCH_ASSOC);
  }

  /**
   * Fetches all stocks.
   * 
   * Executes a query to retrieve all stock records from the database.
   * 
   * @return array An associative array of all stock data.
   */
  public function fetchAll()
  {
    $query = $this->connection->prepare("SELECT * FROM stocks");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }
}
