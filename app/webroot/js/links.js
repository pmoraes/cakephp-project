<script>
$(document).ready(function() {
    var $nav = $('#nav');
    var $nav2 = $('#nav-2');

    $nav.onePageNav();

    $nav2.on('click', 'a', function(e) {
        var currentPos = $(this).parent().prevAll().length;

        $nav.find('li').eq(currentPos).children('a').trigger('click');

        e.preventDefault();
    });
});
</script>