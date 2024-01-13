<div class="my-5 pt-4">
    <div class="container">
        <div class="col-12">
            <div class="row mx-0 d-flex justify-content-center mb-2">
                <div class="col-12">
                    <div class="input-group mb-3">
                    </div>
                </div>
            </div>
            <div class="row mx-0 row-cols-1 row-cols-sm-1 row-cols-xl-3 gx-5 gy-3" id="vacancy_list">
                <?php
                $sql = "SELECT * FROM category_list order by `name` asc";
                $qry = $conn->query($sql);
                $i = 0;
                while ($row = $qry->fetchArray()):
                    ?>
                    <div class="item col wow bounceInUp" data-wow-delay="<?php echo ($i > 0) ? $i : ''; $i += .5; ?>s">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title mb-1"><?php echo $row['name'] ?></h5>
                                <hr class="bg-primary opacity-100">
                                <p class="truncate-3 fw-light fst-italic lh-1" title="<?php echo $row['description'] ?>"><small><?php echo $row['description'] ?></small></p>
                                <div class="w-100 d-flex justify-content-end">
                                    <div class="col-auto">
                                    <a href="./?page=crops&cid=<?php echo $row['category_id'] ?>"
                                        class="btn btn-sm btn-primary bg-gradient rounded-0 py-0"
                                        style="background: rgb(21, 122, 80); color: white;">Crops</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        // Removed the line to initially hide the information
        // $('#vacancy_list .item').hide();

        $('#search').on('input', function () {
            var _search = $(this).val().toLowerCase();
            $('#vacancy_list .item').each(function () {
                var _categoryName = $(this).find('.card-title').text().toLowerCase();
                if (_categoryName.includes(_search) === true) {
                    $(this).show(); // Show matching items
                } else {
                    $(this).hide(); // Hide non-matching items
                }
            });
        });
    });
</script>
