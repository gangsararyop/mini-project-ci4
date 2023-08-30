<table class="table is-narrow" id="tabeluser">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tasks as $key => $task): ?>
            <tr>
                <td>
                    <?= $key + 1 ?>
                </td>
                <td>
                    <strong>
                        <?= $task['judul'] ?>
                    </strong><br>
                </td>
                <td>
                    <input type="checkbox" <?php if ($task['status'] === '1')
                        echo "checked"; ?> onclick="return false;" />
                </td>
                <td>
                    <button id="edittugas"
                        onclick="clickEdit('<?= $task['id'] ?>','<?= $task['judul'] ?>', '<?= $task['status'] ?>')">Edit</button>

                    <button id="deletetugas" onclick="deleteClick('<?= $task['id'] ?>')">Hapus</button>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>