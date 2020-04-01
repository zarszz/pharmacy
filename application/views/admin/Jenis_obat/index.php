<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->load->view('template/header', $title); ?>
</head>
<body>
    <?php $this->load->view('template/navbar', $jenis_obat); ?>
    <div class="container">
        <a href="<?php echo base_url() . 'index.php/admin/jenis_obat/create'; ?>" class="btn btn-primary" style="margin-bottom: 30px;">
            Tambah Jenis Obat
        </a>
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="table_contents">
                <thead>
                    <tr>
                        <th>ID JENIS</th>
                        <th>JENIS OBAT</th>
                        <th>DESKRIPSI</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <?php $this->load->view('template/js'); ?>
    <script type="text/javascript">
        var table = null;

        $(document).ready(function(){
            table = $('#table_contents').DataTable({
                "ajax": {
                    "url": "<?php echo base_url('index.php/admin/jenis_obat/fetch_ajax'); ?>",
                    "type": "POST"
                },
                "columns": [
                    { "data": "id_jenis"},
                    { "data": "jenis_obat"},
                    { "data": "deskripsi"},
                    { "render": function(data, type, row){
                        update_link = `http://localhost/tugas-besar-pemrograman-web/index.php/admin/jenis_obat/edit/${row.id_jenis}`
                                    html = `<a href = ${update_link} class="btn btn-primary btn-sm">EDIT</a> | `;
                                    html += `<button type="submit" class="btn btn-danger btn-sm" id="remove" value=${row.id_jenis}>DELETE</input>`;
                                    return html
                                }
                    }
                ]
            })
        })

        $(document).on('click', '#remove', function(){
            var id = $(this).val();
            Swal.fire({
                title: 'Apa Anda yakin ?',
                text: "Anda tidak dapat mengembalikan data tersebut",
                icon: 'warning',
                showCancelButton: true,
                customClass: {
                    confirmButtonClass: "btn btn-danger"
                },
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak",
            }).then((result) => {
                if(result.value){
                    $.ajax({
                        url: 'http://localhost/tugas-besar-pemrograman-web/index.php/admin/jenis_obat/delete_ajax/' + id,
                        type: "GET",
                        success: function (){
                            table.ajax.reload();
                            Swal.fire({
                            icon: 'success',
                            title: 'Berhasil.',
                            text: 'Data tersebut berhasil di hapus'
                            });
                        },
                        error: function (){
                            Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                            });
                        }
                    })
                }
            })
        })
    </script>
</body>
</html>