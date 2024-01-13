<?php
$sql = "SELECT * FROM category_list WHERE category_id = '{$_GET['cid']}'";
$qry = $conn->query($sql);
foreach($qry->fetchArray() as $k=>$v){
    $$k=$v;
}
?>

</style>
<div class="container py-5 mt-4">
    <div class="bg-light">
        <div class="my-5 pt-4">
            <div class="container">
                <div class="col-12">
                    <div class="row mx-0 d-flex justify-content-cente mb-2">
                        <div class="col-12">
                            <!-- Modified search input with datalist -->
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="search" placeholder="Search..." list="suggestions">
                                <datalist id="suggestions">
                                    <?php
                                    $suggestionSql = "SELECT DISTINCT title FROM crops_list WHERE category_id = '{$_GET['cid']}'";
                                    $suggestionQry = $conn->query($suggestionSql);
                                    while ($suggestion = $suggestionQry->fetchArray()) {
                                        echo "<option value=\"" . htmlspecialchars($suggestion['title']) . "\">";
                                    }
                                    ?>
                                </datalist>
                                <button class="btn btn-primary" id="searchButton">Search</button>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-0 row-cols-1 row-cols-sm-1 row-cols-xl-3 gx-5 gy-3" id="crops_list">
                        <?php
                        $sql = "SELECT r.*,u.fullname as author FROM crops_list r INNER JOIN user_list u ON r.user_id = u.user_id WHERE r.status = 1 AND r.category_id = '{$_GET['cid']}' ORDER BY strftime('%s',r.date_created) DESC";
                        $qry = $conn->query($sql);
                        $i = 0;
                        while($row = $qry->fetchArray()):
                            $row['planning'] = strip_tags(stripslashes(html_entity_decode($row['planning'])));
                        ?>
                            <div class="item col wow bounceInUp">
                                <div class="card shadow-sm ">
                                    <div class="card-body ">
                                        <h5 class="card-title mb-1"><?php echo $row['title'] ?></h5>
                                        <hr class="bg-primary" style="opacity: 1;">
                                        <p class="truncate-3 fw-light fst-italic lh-1" title="<?php echo $row['planning'] ?>" style="color: your-color;"><small><?php echo $row['planning'] ?></small></p>
                                        <div class="w-100 d-flex justify-content-end" style="color: your-color; font-size: your-font-size; font-family: Arial, sans-serif;">
                                            <!-- Content in the div goes here -->
                                        </div>
                                        <div class="col-auto flex-grow-1">
                                            <div class="col-auto">
                                                <a href="./?page=view_crops&rid=<?php echo $row['crops_id'] ?>" style="background: rgb(21, 122, 80); color: white;" class="btn btn-sm btn-primary rounded-0 py-0">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <?php if(!$qry->fetchArray()): ?>
                        <center><i><small class="text-muted">No data listed yet.</small></i></center>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(function(){
        function filterItems() {
            var _search = $('#search').val().toLowerCase();
            // Check if there is any input in the search box
            if (_search.trim() !== '') {
                $('#crops_list .item').each(function(){
                    var _text = $(this).text().toLowerCase();
                    if(_text.includes(_search) == true){
                        $(this).toggle(true);
                    } else {
                        $(this).toggle(false);
                    }
                });
            } else {
                // If no input, show all items
                $('#crops_list .item').toggle(true);
            }
        }

        // Trigger filtering on input change
        $('#search').on('input', filterItems);

        // Trigger filtering on button click
        $('#searchButton').on('click', filterItems);
    });
</script>
<script>
    $(document).scroll(function() { 
        $('#topNavBar').removeClass('bg-transaparent bg-dark')
        if($(window).scrollTop() === 0) {
            $('#topNavBar').addClass('bg-transaparent')
        }else{
            $('#topNavBar').addClass('bg-dark')
        }
    });
    $(function(){
        $(document).trigger('scroll')
     $(function () {
        // Initially hide the information
        $('#vacancy_list .item').hide();

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
    })
</script>
