<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/DataTables/dataTables.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/DataTables/js/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/DataTables/js/dataTables.bootstrap4.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/sweetalert2/dist/sweetalert2.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/chart.js/Chart.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/sb-admin.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/typeahead/typeahead.bundle.min.js') ?>"></script>
<script type="text/javascript">
    $('input.typeahead').typeahead({
        source: function(query, process){
            return $.ajax({
                url: "<?php echo base_url('public/Obat/ajax_search'); ?>",
                type: 'get',
                data: {query: query},
                dataType: 'json',
                success: function(data) {
                    return process(data);
                }
            });
        }
    });
</script>