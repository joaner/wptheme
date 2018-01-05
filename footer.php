
      <hr/>
      <footer class="text-center">
        <p class="text-muted">
          Proudly powered by <a href="<?php echo esc_url( 'https://wordpress.org/' ); ?>">WordPress</a>,
          Theme by <a href="https://xiaoai.me" rel="nofollow">joaner</a>.
        </p>
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
