<?php
require_once __DIR__ . '/../constants.php';
require_once __DIR__ . '/../models/Stock.php';

class StockController
{
  /**
   * Index action.
   * 
   * Fetches all stocks and renders the stocks view.
   * 
   * @return void
   */
  public function index()
  {
    $stock = new stock;
    $stocks = $stock->fetchAll();

    include ROOT_PATH . '/src/views/stocks/stocks.view.php';
  }

  /**
   * Create stock action.
   * 
   * Handles the create stock form submission. If the stock does not already exist,
   * it is created and the user is redirected to the stocks page with a success
   * message. If the stock already exists, the user is shown an error message on
   * the create stock page.
   * 
   * @return void
   */
  public function createStock()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $name = $_POST['name'];
      $description = $_POST['description'];
      $price = $_POST['price'];
      $quantity = $_POST['quantity'];

      $stock = new stock;
      if ($stock->create($name, $description, $price, $quantity)) {
        header('Location:' . PAGES_URL . '/stocks/stocks.php?success=1');
        exit;
      } else {
        $error = 'Stock already exists.';
        include ROOT_PATH . '/src/views/stocks/create-stock.view.php';
      }
    } else {
      include ROOT_PATH . '/src/views/stocks/create-stock.view.php';
    }
  }

  /**
   * Update stock action.
   *
   * Handles the update stock form submission. If the stock exists, it is updated
   * and the user is redirected to the stocks page with a success message. If the
   * stock does not exist, the user is shown an error message on the update stock
   * page.
   *
   * @return void
   */
  public function updateStock()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id = $_POST['id'];
      $name = $_POST['name'];
      $description = $_POST['description'];
      $price = $_POST['price'];
      $quantity = $_POST['quantity'];

      $stock = new stock;
      if ($stock->update($id, $name, $description, $price, $quantity)) {
        header('Location:' . PAGES_URL . '/stocks/stocks.php?success=1');
        exit;
      } else {
        $error = 'stock does not exists.';
        include ROOT_PATH . '/src/views/stocks/update-stock.view.php';
      }
    } else {
      $stock = new stock;
      $stock_data = $stock->fetchOne($_GET['id']);

      include ROOT_PATH . '/src/views/stocks/update-stock.view.php';
    }
  }

  /**
   * Delete stock action.
   * 
   * Handles the delete stock form submission. If the stock exists, it is deleted
   * and the user is redirected to the stocks page with a success message. If the
   * stock does not exist, the user is shown an error message on the delete stock
   * page.
   * 
   * @return void
   */
  public function deleteStock()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id = $_POST['id'];

      $stock = new stock;
      if ($stock->delete($id)) {
        header('Location:' . PAGES_URL . '/stocks/stocks.php?success=1');
        exit;
      } else {
        $error = 'stock does not exists.';
        include ROOT_PATH . '/src/views/stocks/delete-stock.view.php';
      }
    } else {
      $stock = new stock;
      $stock_data = $stock->fetchOne($_GET['id']);

      include ROOT_PATH . '/src/views/stocks/delete-stock.view.php';
    }
  }
}
