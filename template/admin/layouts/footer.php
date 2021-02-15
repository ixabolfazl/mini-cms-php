<!--main content end-->

<!--footer start-->
<footer class="site-footer">
    <div class="text-center">
        Copyright &copy;<script>document.write(new Date().getFullYear());</script>
        All rights reserved | This Website is made with <i class="fa fa-heart-o" aria-hidden="true"></i>

    </div>
</footer>
<!--footer end-->
</section>
<script src="<? asset("admin/layouts/js/jquery-ui-1.9.2.custom.min.js") ?>"></script>
<script src="<? asset("admin/layouts/js/bootstrap.bundle.min.js") ?>"></script>
<script class="include" type="text/javascript"
        src="<? asset("admin/layouts/js/jquery.dcjqaccordion.2.7.js") ?>"></script>
<script src="<? asset("admin/layouts/js/jquery.scrollTo.min.js") ?>"></script>
<script src="<? asset("admin/layouts/js/jquery.nicescroll.js") ?>" type="text/javascript"></script>
<script src="<? asset("admin/layouts/js/jquery.sparkline.js") ?>" type="text/javascript"></script>
<script src="<? asset("admin/layouts/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js") ?>"></script>
<script src="<? asset("admin/layouts/js/owl.carousel.js") ?>"></script>
<script src="<? asset("admin/layouts/js/jquery.customSelect.min.js") ?>"></script>
<script src="<? asset("admin/layouts/js/respond.min.js") ?>"></script>
<script src="<? asset("admin/layouts/js/common-scripts.js") ?>"></script>
<script type="text/javascript" language="javascript"
        src="<? asset("admin/layouts/assets/advanced-datatable/media/js/jquery.dataTables.js") ?>"></script>
<script type="text/javascript" src="<? asset("admin/layouts/assets/data-tables/DT_bootstrap.js") ?>"></script>
<script src="<? asset("admin/layouts/js/dynamic_table_init.js") ?>"></script>
<script type="text/javascript"
        src="<? asset("admin/layouts/assets/bootstrap-fileupload/bootstrap-fileupload.js") ?>"></script>
<script src="<? asset("admin/layouts/assets/bootstrap-switch/static/js/bootstrap-switch.js") ?>"></script>
<script src="<? asset("admin/layouts/assets/switchery/switchery.js") ?>"></script>
<script src="<? asset("admin/layouts/js/tinymce.min.js") ?>" referrerpolicy="origin"></script>

<script>var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
    tinymce.init({
        selector: 'textarea#tiny',
        plugins: 'print preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker imagetools textpattern noneditable help formatpainter permanentpen pageembed charmap  mentions quickbars linkchecker emoticons advtable',


        menubar: 'file edit view insert format tools table tc help',
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | forecolor backcolor casechange   removeformat  | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | pagebreak | charmap emoticons | fullscreen  preview   |  image media   link  codesample a11ycheck ltr rtl |   ',

    });</script>
<script>
    $(document).ready(function () {
        $("#owl-demo").owlCarousel({
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true,
            autoPlay: true
        });
    });
    $(function () {
        $('select.styled').customSelect();
    });

    $(window).on("resize", function () {
        var owl = $("#owl-demo").data("owlCarousel");
        owl.reinit();
    });
</script>
</body>
</html>


