  </main>
  <?php if (isset($_SESSION['user'])) : ?>
    <footer>
      <p>&copy; 2025 PHP Stock Manager</p>
    </footer>
  <?php endif; ?>
  </body>
  <?php
  $scriptPath = $_SERVER['SCRIPT_NAME'];
  $depth = substr_count($scriptPath, '/') - substr_count('/public/pages/', '/');
  $jsPath = str_repeat('../', $depth) . 'js/script.js';
  ?>
  <script src="<?php echo $jsPath; ?>"></script>

  </html>