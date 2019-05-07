<script src="assets/js/jquery.min.js"></script>
<script src="dist/coreNavigation-1.1.3.min.js"></script>
<script src="dist/jquery.bpopup.min.js"></script>
<script>
    $('nav').coreNavigation({
        menuPosition: "right",
        container: true,
        responsideSlide: true
    });

    $('#login').click(function(){
        $('#element_to_pup_up').bPopup();
    });

    $('#upload').click(function(){
        $('#upload_to_pup_up').bPopup();
    });
</script>