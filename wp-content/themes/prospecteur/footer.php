<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="visible-lg-block">
                    <img class="img-responsive bg-footer" src="<?php bloginfo('template_directory'); ?>/images/bg-bottom-2.png" alt="" title="">
                    <div class="contenu-footer hidden-sm">
                        <p><?php echo ( ICL_LANGUAGE_CODE == 'en' ) ? 'All rights reserved' : 'Tous droits réservés'; ?> &copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?> - 
                        <a href="mailto:info@seigneurieiledorleans.com" title="info@seigneurieiledorleans.com">info@seigneurieiledorleans.com</a> - 
                        <?php echo ( ICL_LANGUAGE_CODE == 'en' ) ? 'Tel' : 'Tél'; ?>. : 418 829-0476</p>
                    </div>
                </div>
                <div class="visible-md-block">
                    <img class="center-block img-responsive" style="margin-top: -3em;" src="<?php bloginfo('template_directory'); ?>/images/sio-logo-footer.png" alt="" title="">
                    <div class="text-center">
                        <p>Tous droits réservés &copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?> - 
                        <a style="color: #fff;" href="mailto:info@seigneurieiledorleans.com" title="info@seigneurieiledorleans.com">info@seigneurieiledorleans.com</a> - 
                        Tél. : <a style="color: #fff !important;" tabIndex="-1" href="tel:14188290476">418 829-0476</a></p>
                    </div>
                </div>
                <div class="visible-sm-block">
                    <div class="text-center">
                        <p style="color: #fff; padding-top: .5em;"><?php bloginfo( 'name' ); ?>
                       <br />
                            <?php echo ( ICL_LANGUAGE_CODE == 'en' ) ? 'All rights reserved' : 'Tous droits réservés'; ?> &copy; <?php echo date('Y'); ?> 
                        <br />
                            <a style="color: #fff;" href="mailto:info@seigneurieiledorleans.com" title="info@seigneurieiledorleans.com">info@seigneurieiledorleans.com</a>
                        <br />
                            <a style="color: #fff !important;" tabIndex="-1" href="tel:14188290476">418 829-0476</a>
                        </p>
                    </div>
                </div>
                 <div class="visible-xs-block">
                    <div class="text-center">
                        <p style="color: #fff; padding-top: .5em;"><?php bloginfo( 'name' ); ?>
                       <br />
                            <?php echo ( ICL_LANGUAGE_CODE == 'en' ) ? 'All rights reserved' : 'Tous droits réservés'; ?> &copy; <?php echo date('Y'); ?> 
                        <br />
                            <a style="color: #fff;" href="mailto:info@seigneurieiledorleans.com" title="info@seigneurieiledorleans.com">info@seigneurieiledorleans.com</a>
                        <br />
                            <a style="color: #fff !important;" tabIndex="-1" href="tel:14188290476">418 829-0476</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> 
<!-- script src="<?php bloginfo('template_directory'); ?>/js/formvalidation/dist/js/formValidation.min.js"></script -->
<!-- script src="<?php bloginfo('template_directory'); ?>/js/formvalidation/dist/js/framework/bootstrap.min.js"></script -->
<script>
$( window ).load( function() 
{
    $( "body" ).removeClass("preload");
});
</script>
<?php wp_footer(); ?> 
</body>
</html>