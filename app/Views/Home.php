<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
    <script type="text/javascript">

    </script>
</head>


<body>
    <section class="section">
        <div class="container">
            <div style="margin-bottom:16px;">
                <form method="post" id="form">
                    <div style="display:flex; flex-direction:row; gap:16px;">
                        <div class="form-group" style="display:flex; flex-direction:column; gap:8px;">
                            <label for="email">Judul</label>
                            <label for="status">Status</label>
                        </div>
                        <div class="form-group"
                            style="display:flex; flex-direction:column; justify-content:space-between;">
                            <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul">
                            <input type="checkbox" name="status" style='width:16px; height:16px;' />
                        </div>
                    </div>

                    <button id="tambahuser" type="button" style='margin-top:8px;'>Tambah</button>
                    <button id="bataledit" type="button" style='margin-top:8px; display:none;'
                        onclick="clickCancelEdit()">Cancel</button>
                </form>
            </div>

            <div id="tampil">
            </div>
        </div>
    </section>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    let editId = null

    $('#tabeluser').ready(function () {
        $('#tabeluser').DataTable();
    })

    $(document).ready(function () {


        $("#tambahuser").click(function () {
            const isChecked = $('[name=status]')[0].checked
            const judul = $('[name=judul]')[0].value

            const data = { judul, status: isChecked ? 1 : 0, id: editId }

            if (!editId) {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url(); ?>home/tambah-tugas",
                    data: data,
                    cache: false,
                    success: function (data) {
                        $('#tampil').load("<?php echo base_url(); ?>/home/tampil-tugas", function () {
                            $('#tabeluser').DataTable();
                        });
                    }
                });
            } else {
                $('[name=judul]').val('');
                $('[name=status]').prop('checked', false);
                $('#tambahuser').text('Tambah');
                $('#bataledit').css('display', 'none');

                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url(); ?>home/edit-tugas",
                    data: data,
                    cache: false,
                    success: function (data) {
                        $('#tampil').load("<?php echo base_url(); ?>/home/tampil-tugas", function () {
                            $('#tabeluser').DataTable();
                        });
                    }
                });


            }

        });

        $.ajax({
            type: 'POST',
            url: "<?php echo base_url(); ?>home/tampil-tugas",
            cache: false,
            success: function (data) {
                $("#tampil").html(data);
                $('#tabeluser').DataTable();
            }
        });
    });

    function deleteClick(id) {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url(); ?>home/delete-tugas",
            data: { id },
            cache: false,
            success: function (data) {
                $('#tampil').load("<?php echo base_url(); ?>/home/tampil-tugas", function () {
                    $('#tabeluser').DataTable();
                });
            }
        });
    }

    function clickEdit(id, judul, status) {
        $('[name=judul]').val(judul);
        $('[name=status]').prop('checked', status === '1');
        $('#bataledit').css('display', 'block');
        $('#tambahuser').text('Edit');

        editId = id
    }

    function clickCancelEdit() {
        $('[name=judul]').val('');
        $('[name=status]').prop('checked', false);
        $('#tambahuser').text('Tambah');
        $('#bataledit').css('display', 'none');

        editId = null
    }

</script>

</html>