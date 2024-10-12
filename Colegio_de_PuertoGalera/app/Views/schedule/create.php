<!-- Your existing HTML code -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-table">
            <div class="card-body booking_card">
                <div class="table-responsive">
                    <table class="datatable table table-striped table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Description</th>
                                <th>Image</th>
                                <!-- Add any other columns you need -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($teachers as $teacher) : ?>
                                <tr>
                                    <td><?= $teacher['name'] ?></td>
                                    <td><?= $teacher['designation'] ?></td>
                                    <td><?= $teacher['description'] ?></td>
                                    <td>
                                        <img src="<?= base_url('uploads/' . $teacher['image']) ?>" alt="Teacher Image" style="max-width: 100px; max-height: 100px;">
                                    </td>
                                    <!-- Add any other cells you need -->
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Your existing HTML code -->