        <?php wp_footer(); ?>

        <footer class="footer">
            <?php
                wp_nav_menu([
                    'theme_location' => 'footer-menu',
                    'container' => 'ul',
                    'menu_class' => 'footer__menu',
                    ]);
            ?>
            <p class="footer__copyright">©16 Caractères · 2024</p>
        </footer>

    </body>
</html>