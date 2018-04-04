    <?php
    use App\Model\Products;

        $products = new Products();
        $products->limit(0, 3)->where('deleted', 0)->get();
        $product = $products->items;
    ?>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.4.0/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
    var nav = $("nav").offset();
    var footer = $(".background-container").offset();
    var needlehide = $('header').offset();
    var needle = $('nav').offset();

    $(window).scroll(function() {   // bind an eventhandler, if user scrolls
        // implement some form of offset.top() instead of set 350px and 150px #ref::
        if(window.scrollY >= needle.top + 450) {
            $('.boost-bottom').css('visibility', 'hidden');
            $('.boost').css('visibility', 'hidden');
        } 
        else if (window.scrollY >= needle.top + 0) {
            $('.boost').css('visibility', 'visible');
            $('.boost-bottom').css('visibility', 'hidden');
        }
        else if(window.scrollY <= needle.top + 0) {
            $('.boost-bottom').css('visibility', 'hidden');
            $('.boost').css('visibility', 'visible');
        } 
        else if(window.scrollY <= needle.top - 450) {
            $('.boost-bottom').css('visibility', 'visible');
            $('.boost').css('visibility', 'visible');
        }

        if(window.scrollY > nav.top) {  // get amount of pixels - verticalScroll and check whether its higher 500
            /* ...*/
            $("nav").css("position", "fixed").css('top', '0').css('max-width', '65em').css('border-radius', '1em');
        } else if(window.scrollY <= nav.top) {
        	$("nav").css("position", "absolute").css('bottom', '20px').removeAttr("style", "bottom");
        }

        if(window.scrollY > footer.top) {
        	$("body").css("background-image", "url('/assets/images/footer.png')");
        } else if(window.scrollY < footer.top) {
        	$("body").css("background-image", "url('http://noriyaro.com/wp-content/uploads/2012/02/noriyaro_painted_lines_18by10.jpg')");
        }
    });

    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        if (n > x.length) {slideIndex = 1}
        if (n < 1) {slideIndex = x.length}
        for (i = 0; i < x.length; i++) {
           x[i].style.display = "none";
        }
            x[slideIndex-1].style.display = "block";
        }
    </script>
</body>
</html>