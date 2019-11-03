<div class="footer" >
    <div class="float-right">
        Pemprov Babel
    </div>
    <div>
        <strong>Copyright</strong> Pemerintah Provinsi Bangka Belitung &copy; 2019
    </div>
</div>

</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#tmtdate .input-group.date').datepicker({                
	        todayBtn: "linked",
	        keyboardNavigation: false,
	        forceParse: false,
	        autoclose: true,
	        calendarWeeks : true,
	        format: "yyyy-mm-dd"
	    });
	    $('#tmtdate2 .input-group.date').datepicker({                
	        todayBtn: "linked",
	        keyboardNavigation: false,
	        forceParse: false,
	        autoclose: true,
	        calendarWeeks : true,
	        format: "yyyy-mm-dd"
	    });
	});
</script>


<!-- Mainly scripts -->
<script src="<?=base_url('assets/')?>js/popper.min.js"></script>
<script src="<?=base_url('assets/')?>js/bootstrap.js"></script>
<script src="<?=base_url('assets/')?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?=base_url('assets/')?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Date Picker-->
<script src="<?php echo base_url('assets');?>/js/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?=base_url('assets/')?>js/inspinia.js"></script>
<script src="<?=base_url('assets/')?>js/plugins/pace/pace.min.js"></script>

<script src="<?=base_url('assets/')?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="<?php echo base_url('assets');?>/js/plugins/jquery-autocomplete.js"></script>

<script>
    <?= $this->session->flashdata('msg') ?>
</script>
</body>

</html>
