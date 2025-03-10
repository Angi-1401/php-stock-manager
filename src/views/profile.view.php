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
    <h1>Profile</h1>
    <form action="<?= BASE_URL; ?>/profile.php" method="post" id="profile_form">
      <fieldset>
        <legend>Personal Info.</legend>
        <div>
          <input type="text" id="first_name" name="first_name" placeholder="First name" value="<?= $user_data['first_name']; ?>" required />
          <input type="text" id="last_name" name="last_name" placeholder="Last name" value="<?= $user_data['last_name']; ?>" required />
        </div>
        <input type="email" id="email" name="email" placeholder="Email" value="<?= $user_data['email']; ?>" required />
        <button type="submit" id="submit_profile" name="submit_profile" disabled>Update profile</button>
      </fieldset>
    </form>
    <form action="<?= BASE_URL; ?>/profile.php" method="post" id="change_password_form">
      <fieldset>
        <legend>Password</legend>
        <div>
          <input type="password" id="password" name="password" placeholder="Password" required />
          <button type="button" id="password_toggle">Show password</button>
        </div>
        <input type="password" id="password_new" name="password_new" placeholder="New password" required />
        <button type="submit" id="submit_password" name="submit_password" disabled>Update password</button>
      </fieldset>
    </form>
    <?php if (isset($_GET['success']) && $_GET['success'] === '1') : ?>
      <div>
        <p>Changes saved.</p>
      </div>
    <?php endif; ?>
    <?php if (isset($error)) : ?>
      <div>
        <p><?= $error; ?></p>
      </div>
    <?php endif; ?>
  </section>
  <footer></footer>
</main>


<?php include __DIR__ . '/partials/footer.php'; ?>