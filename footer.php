
      <footer class="mdl-mini-footer">
        <div class="mdl-mini-footer__left-section">
          <ul class="mdl-mini-footer__link-list">
            <li>Proudly powered by <a href="<?php echo esc_url( 'https://wordpress.org/' ); ?>">WordPress</a></li>
            <li>Theme by <a href="https://github.com/joaner/wptheme" rel="nofollow">joaner</a></li>
          </ul>
        </div>
      </footer>
    </div>
  </main>
</div>

<?php wp_footer(); ?>
<?php if (is_single()): ?>
<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/post.js"></script>
<?php endif; ?>
</body>
</html>
