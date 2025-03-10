<?php
require_once __DIR__ . '/../constants.php';
require_once __DIR__ . '/../models/Stock.php';

class StockController
{
  public function index()
  {
    $stock = new stock;
    $stocks = $stock->fetchAll();

    include __DIR__ . '/../views/stocks.view.php';
  }

  public function createStock()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $name = $_POST['name'];
      $description = $_POST['description'];
      $price = $_POST['price'];
      $stock = $_POST['stock'];

      $stock = new stock;
      if ($stock->create($name, $description, $price, $stock)) {
        header('Location:' . BASE_URL . '/stocks.php?success=1');
        exit;
      } else {
        $error = 'Stock already exists.';
        include __DIR__ . '/../views/create-stock.view.php';
      }
    } else {
      include __DIR__ . '/../views/create-stock.view.php';
    }
  }

  public function updateStock()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id = $_POST['id'];
      $name = $_POST['name'];
      $description = $_POST['description'];
      $price = $_POST['price'];
      $stock = $_POST['stock'];

      $stock = new stock;
      if ($stock->update($id, $name, $description, $price, $stock)) {
        header('Location:' . BASE_URL . '/stocks.php?success=1');
        exit;
      } else {
        $error = 'stock does not exists.';
        include __DIR__ . '/../views/update-stock.view.php';
      }
    } else {
      $stock = new stock;
      $stock_data = $stock->fetchOne($_GET['id']);

      include __DIR__ . '/../views/update-stock.view.php';
    }
  }

  public function deleteStock()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id = $_POST['id'];

      $stock = new stock;
      if ($stock->delete($id)) {
        header('Location:' . BASE_URL . '/stocks.php?success=1');
        exit;
      } else {
        $error = 'stock does not exists.';
        include __DIR__ . '/../views/delete-stock.view.php';
      }
    } else {
      $stock = new stock;
      $stock_data = $stock->fetchOne($_GET['id']);

      include __DIR__ . '/../views/delete-stock.view.php';
    }
  }
}
