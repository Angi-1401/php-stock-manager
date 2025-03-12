    </main>
    <?php if (isset($_SESSION['user'])) : ?>
      <footer class="w-full bg-gray-200 dark:bg-gray-800">
        <div class="flex items-center justify-start space-x-2 p-4">
          <p class="text-gray-800 dark:text-gray-200">&copy; 2025 PHP Stock Manager</p>
        </div>
      </footer>
    <?php endif; ?>
  </div>
</body>
<?php
$scriptPath = $_SERVER['SCRIPT_NAME'];
$depth = substr_count($scriptPath, '/') - substr_count('/public/pages/', '/');
$jsPath = str_repeat('../', $depth) . 'js/script.js';
?>
<script src="<?php echo $jsPath; ?>"></script>

<?php
$flowbitePath = dirname(__DIR__, 3) . '/node_modules/flowbite/dist/flowbite.min.js';
?>
<script src="<?php echo $flowitePath; ?>"></script>

</html>