<?php
$sql = "SELECT r.*,u.fullname as author FROM crops_list r inner join user_list u on r.user_id = u.user_id where r.crops_id = '{$_GET['rid']}'";
$qry = $conn->query($sql);
foreach ($qry->fetchArray() as $k => $v) {
    $$k = $v;
}
?>
<div class="bg-light">
    <div class="container py-5 mt-4">
        <h2 class="text-center wow fadeIn"><?php echo $title ?></h2>
        <hr class="m-0">

        <!-- All About section -->
        <div class="my-2 position-relative text-center">
            <div class="section-header d-flex align-items-center justify-content-between">
                <h1 class="strikeBg" style="color: #5cbb82; font-size: 15px; font-family: Arial, sans-serif; font-weight: bold;">All About:</h1>
            </div>
            <div class="my-2" style="color: your-color; font-size: 14px; font-family: Arial, sans-serif; font-weight:; text-align: left;">
                <?php echo html_entity_decode($land_preparation) ?>
            </div>
        </div>
        <hr class="m-0">

        <!-- Soil Type and Soil pH section -->
        <div class="my-2 position-relative text-center">
            <div class="section-header d-flex align-items-center justify-content-between">
                <h2 class="strikeBg" style="color: #5cbb82; font-size: 15px; font-family: Arial, sans-serif; font-weight: bold;">Soil Type and Soil pH:</h2>
            </div>
            <div class="my-2" style="color: your-color; font-size: 14px; font-family: Arial, sans-serif; font-weight:; text-align: left;">
                <?php echo html_entity_decode($planting_stages) ?>
            </div>
        </div>
        <hr class="m-0">

        <!-- Crop Companion section -->
        <div class="my-2 position-relative text-center">
            <div class="section-header d-flex align-items-center justify-content-between">
                <h2 class="strikeBg" style="color: #5cbb82; font-size: 15px; font-family: Arial, sans-serif; font-weight: bold;">Crop Companion</h2>
            </div>
            <div class="my-2" style="color: your-color; font-size: 14px; font-family: Arial, sans-serif; font-weight:; text-align: left;">
                <?php echo html_entity_decode($other_info) ?>
            </div>
        </div>

        <hr class="m-0">
    </div>

    <div class="container text-center">
        <div class="row">
            <div class="col">
                <button class="btn btn-info btn-sm p-1" style="background-color: #5cbb82;" onclick="goBack()">
                    Back
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function goBack() {
        window.history.back();
    }

    $(document).scroll(function() { 
        $('#topNavBar').removeClass('bg-transaparent bg-dark')
        if($(window).scrollTop() === 0) {
            $('#topNavBar').addClass('bg-transaparent')
        } else {
            $('#topNavBar').addClass('bg-dark')
        }
    });
</script>

<script>
    function goBack() {
        window.history.back();
    }
</script>
