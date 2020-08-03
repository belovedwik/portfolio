

    <footer class="main-footer">
        <span>Copyright &copy; 2014-<?= date("yy")?> <a href="<?php echo base_url(); ?>">Web-Decor</a>.</span>
    </footer>
    
    <script src="<?= base_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>js/adminlte.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>js/jquery.validate.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>js/validation.js" type="text/javascript"></script>
    <script type="text/javascript">
        var windowURL = window.location.href;
        pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'));
        var x= $('a[href="'+pageURL+'"]');
            x.addClass('active');
            x.parent().addClass('active');
        var y= $('a[href="'+windowURL+'"]');
            y.addClass('active');
            y.parent().addClass('active');
    </script>
  </body>
</html>