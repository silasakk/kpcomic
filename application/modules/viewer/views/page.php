<style>
    .bar-header{
        text-align: center;
        color: #fff;;
    }
</style>

<?php $page = unserialize($data[0]->page); ?>
<div class="bar-header">
    <div class="dropdown pull-left">
        <a class="btn btn-link dropdown-toggle"  id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Language : English
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <?php

            $sql = "select * from language";
            $qry = $this->db->query($sql);
            $result = $qry->result();

            foreach($result as $value):
                ?>
                <li><a href="<?php echo current_url()."/".$value->code ?>"><?php echo $value->lang ?></a></li>
            <?php endforeach;?>


        </ul>
    </div>

    <?php echo $data[0]->chapter_name?>

    <div class="dropdown pull-right">
        <a class="btn btn-link dropdown-toggle full-screen"  >
            <i class="fa fa-arrows-alt"></i>

        </a>

        <!--<a class="btn btn-link dropdown-toggle"  id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <i class="fa fa-share-alt"></i>

        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="#">Facebook</a></li>
            <li><a href="#">COPY URL</a></li>

        </ul>-->
    </div>


</div>

<div class="bar-footer">
    <a id="back" onclick='$(".magazine").turn("previous")' class="prev-btn">
        <i class="glyphicon glyphicon-circle-arrow-left"></i> Previous
    </a>
    <div class="range-input">
        <div class="paging">
            <span class="ch">1</span>/<?php echo count($page) ?>
        </div>
        <input
            type="range"
            min="1"
            max="<?php echo count($page) ?>"
            step="1"
            value="1"
            id="range-slider"
            data-orientation="vertical">
    </div>



    <a id="next" onclick='$(".magazine").turn("next")' class="next-btn">
        Next <i class="glyphicon glyphicon-circle-arrow-right"></i>
    </a>

</div>

<div class="magazine-viewport">

    <div class="magazine" dir="<?php echo strtolower($data[0]->reading_mode) ?>">
        <?php

        foreach($page as $value):
            ?>


            <div style="background-image:url('uploads/<?php echo $value ?>')"></div>





        <?php endforeach;?>
    </div>


</div>

<script type="text/javascript">

    function loadApp() {



        $('.magazine').turn({
            // Width

            width:$(window).height() * 3 /4,

            // Height

            height: $(window).height(),

            // Elevation

            autoCenter: true,

            elevation: 50,

            // Enable gradients

            gradients: true,

            duration : 300,
            // Auto center this flipbook

            displays : 'single'



        });


        //Initialize the zoom viewport
        $('.magazine-viewport').zoom({
            flipbook: $('.magazine')
        });

        //Binds the single tap event to the zoom function
        $('.magazine-viewport').bind('zoom.doubleTap', zoomTo);

        //set a flag for the click event to check
        var isClick = false;


        $('.magazine , .full-screen , .magazine-viewport').on('mousedown', function (event) {
            isClick = true;

        //bind to `mousemove` event to set the `isClick` flag to false (since it's not a drag
        }).on('mousemove', function () {
            isClick = false;


        }).on('click', function () {
            if (isClick) {
                togg()
            }
        })

        //Binds the single tap event to the zoom function
       //$('.magazine').on('click', togg);

        //Optional, calls the resize function when the window changes, useful when viewing on tablet or mobile phones
        $(window).resize(function() {
            resizeViewport();
        }).bind('orientationchange', function() {
            resizeViewport();
        });

        //Must be called initially to setup the size
        resizeViewport();

        function togg(event) {
            console.log(event);
            setTimeout(function() {
                $('.bar-header,.bar-footer').fadeToggle()
            }, 1);
        }

        function zoomTo(event) {
            setTimeout(function() {
                if ($('.magazine-viewport').data().regionClicked) {
                    $('.magazine-viewport').data().regionClicked = false;
                } else {
                    if ($('.magazine-viewport').zoom('value')==1) {
                        $('.magazine-viewport').zoom('zoomIn', event);
                    } else {
                        $('.magazine-viewport').zoom('zoomOut');
                    }
                }
            }, 1);
        }

        function resizeViewport() {
            var width = $(window).width(),
                height = $(window).height(),
                options = $('.magazine').turn('options');

            $('.magazine-viewport').css({
                width: width,
                height: height
            }).zoom('resize');
        }


    }

    // Load the HTML4 version if there's not CSS transform

    yepnope({
        test : Modernizr.csstransforms,
        yep: ['themes/viewer/assets/lib/turn.js'],
        nope: ['themes/viewer/assets/lib/turn.html4.min.js'],
        complete: loadApp
    });


    $(function(){
        $('.magazine').bind("turning", function(event, page, view) {
            $('#range-slider').val(page);
            $('.ch').text(page);

        });
        $('#range-slider').on('change',function(){
            var value = parseInt($('#range-slider').val());

            $('.ch').text(value);
            $(".magazine").turn("page", value);
        })
    })

</script>
