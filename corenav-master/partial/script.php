<script src="assets/js/jquery.min.js"></script>
<script src="dist/coreNavigation-1.1.3.min.js"></script>
<script src="dist/jquery.bpopup.min.js"></script>
<script>
    $('nav').coreNavigation({
        menuPosition: "right",
        container: true,
        responsideSlide: true
    });

    $('#about').click(function() {
        alert("u chose about");
    });

    $('#login').click(function(){
        $('#element_to_pup_up').bPopup();
    });
</script>