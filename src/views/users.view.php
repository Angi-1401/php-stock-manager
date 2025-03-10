<?php include __DIR__ . '/partials/header.php'; ?>

<header>
  <nav>
    <a href="./profile.php">Profile</a>
    <a href="./signout.php">Logout</a>
  </nav>
</header>
<main>
  <aside>
    <nav>
      <a href="./dashboard.php">Dashboard</a>
      <a href="./stocks.php">Stocks</a>
      <a href="./users.php">Users</a>
    </nav>
  </aside>
  <section>
    <h1>Users</h1>
    <div>
      <a href="./create-user.php">Create new user</a>
    </div>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user) : ?>
          <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['first_name'] ?></td>
            <td><?= $user['last_name'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['role'] ?></td>
            <td>
              <a href="./update-user.php?id=<?= $user['id'] ?>">Edit</a>
              <a href="./delete-user.php?id=<?= $user['id'] ?>">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </section>
  <section>
    <?php if (isset($_GET['success']) && $_GET['success'] === '1') : ?>
      <div>
        <p>Changes saved.</p>
      </div>
    <?php endif; ?>
  </section>
</main>
<footer></footer>

<?php include __DIR__ . '/partials/footer.php'; ?>