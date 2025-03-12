<?php include ROOT_PATH . '/src/views/header.php'; ?>

<section class="flex flex-col items-center md:items-start p-4 w-full">
  <div class="flex items-center justify-between w-full">
    <h1 class="text-4xl font-bold text-gray-800 dark:text-white">Profile</h1>
  </div>
  <div class="self-center w-2/3">
    <form
      action="<?= PAGES_URL; ?>/auth/profile.php"
      method="post"
      id="profile_form"
      class="flex flex-col gap-4 w-full">
      <fieldset class="flex flex-col gap-2">
        <legend class="text-lg text-gray-600 dark:text-gray-400">Personal Info.</legend>
        <div id="name_container" class="flex items-center gap-2">
          <input
            type="text"
            id="first_name"
            name="first_name"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="First name"
            value="<?= $user_data['first_name']; ?>"
            required />
          <input
            type="text"
            id="last_name"
            name="last_name"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Last name"
            value="<?= $user_data['last_name']; ?>"
            required />
        </div>
        <input
          type="email"
          id="email"
          name="email"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Email"
          value="<?= $user_data['email']; ?>"
          required />
        <button
          type="submit"
          class="text-white bg-blue-700 self-center hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center disabled:bg-blue-400"
          disabled>
          Update profile
        </button>
      </fieldset>
    </form>
    <form
      action="<?= PAGES_URL; ?>/profile.php"
      method="post"
      id="change_password_form"
      class="flex flex-col gap-4 w-full">
      <fieldset class="flex flex-col gap-2">
        <legend class="text-lg text-gray-600 dark:text-gray-400">Password</legend>
        <div id="password_container" class="flex intems-center gap-2">
          <input
            type="password"
            id="password"
            name="password"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Password"
            required />
          <button
            type="button"
            id="password_toggle"
            class="text-white bg-blue-700 self-center hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center disabled:bg-blue-400">
            <i class="fa-regular fa-eye"></i>
          </button>
        </div>
        <input
          type="password"
          id="password_new"
          name="password_new"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="New password"
          required />
        <button
          type="submit"
          class="text-white bg-blue-700 self-center hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center disabled:bg-blue-400"
          disabled>
          Update password
        </button>
      </fieldset>
    </form>
    <?php if (isset($_GET['success']) && $_GET['success'] === '1') : ?>
      <div
        class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-red-400"
        role="alert">
        <p>Changes saved.</p>
      </div>
    <?php endif; ?>
    <?php if (isset($error)) : ?>
      <div
        class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
        role="alert">
        <p><?= $error; ?></p>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php include ROOT_PATH . '/src/views/footer.php'; ?>