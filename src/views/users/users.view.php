<?php include ROOT_PATH . '/src/views/header.php'; ?>

<section>
  <h1>Users</h1>
  <div>
    <a href="<?= PAGES_URL; ?>/users/create-user.php">Create new user</a>
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
          <td><?= $user['role'] === 1 ? 'Admin' : 'User' ?></td>
          <td>
            <?php if ($user['id'] !== $_SESSION['id']) : ?>
              <a href="<?= PAGES_URL; ?>/users/update-user.php?id=<?= $user['id'] ?>">Edit</a>
              <a href="<?= PAGES_URL; ?>/users/delete-user.php?id=<?= $user['id'] ?>">Delete</a>
            <?php endif; ?>
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

<?php include ROOT_PATH . '/src/views/footer.php'; ?>