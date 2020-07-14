<div class="container-fluid">
    <!-- Footer -->
    <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
            <div class="col-xl-12">
                <div class="copyright text-center text-xl-center text-muted">
                    &copy; 2020 <a class="font-weight-bold ml-1">Desenvolvido pelo departamento de TI</a> - 
                    <a class="font-weight-bold ml-1"> CIS ELETRÔNICA DA AMAZÔNIA</a><br/>
                    <strong> Último Registro:<span id="lastregisterbio" class="text-dark"></span> </strong>
                </div>
            </div>
        </div>
    </footer>
</div>



<!--   Core   -->
<script src="<?= URL ?>assets/argon/assets/js/plugins/jquery/dist/jquery.min.js"></script>
<script src="<?= URL ?>assets/argon/assets//js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!--   Optional JS   -->
<script src="<?= URL ?>assets/argon/assets/js/plugins/chart.js/dist/Chart.min.js"></script>
<script src="<?= URL ?>assets/argon/assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
<!--   Argon JS   -->
<!--<script src="<?= URL ?>assets/argon/assets/js/argon-dashboard.js"></script>-->
<script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
<script src="<?= URL ?>assets/js/jsChangeDate.js"></script>

<script src="<?=URL?>assets/jquery/jquery-mask.js"></script>
<script>
$(document).ready(function(){
    $('#SREQPTOCAM').mask('SS.00-00000');
    $('#SRCAIXACAM').mask('SS.00-00000');
});

</script>

</body>

</html>