<div class="container-fluid">
    <div class="container">
        <div class="row">
        	<?php get_template_part('menu','footer') ?> <!-- this function calls the template menu-footer.php, if menu-footer.php not available it falls back to menu.php. ('menu','footer')=,menu.php,menu-footer.php respectively -->
        </div>
    </div>
</div>
<?php wp_footer(); ?>								
</body>
</html>