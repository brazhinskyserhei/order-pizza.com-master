<!--Футер-->
<footer class="container-fluid">
    <div class="col-lg-2 col-md-2 col-sm-3">
        <p class="logo" >OrderPizza</p>
        <p>&copy; 2017. Все права защищены.</p>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-9">
        <div class="footer-links">
            <a href="#">Контакты</a>
            <a href="#">О компании</a>
            <a href="#">Разаботчик сайта serjeybr</a>
            <a href="#"><i class="fa fa-facebook-official fa-3x"></i></a>

        </div>
    </div>
</footer>



<script src="/template/libs/jquery/jquery-2.1.4.min.js"></script>
<script src="/template/libs/bootstrap/js/bootstrap.min.js"></script>
<script src="/template/js/common.js"></script>
<script>
    $(document).ready(function(){
        $(".add-to-card").click(function(){
            var id = $(this).attr("data-id");
            $.post("/cart/addAjax/"+id,{},function(data){
                $("#cart-count").html(data);
            });
            return false;
        });
    });
</script>



</body>
</html>