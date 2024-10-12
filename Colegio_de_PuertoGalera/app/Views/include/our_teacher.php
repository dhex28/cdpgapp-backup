<div class="teacher-area pb--100">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="section-title-style2 black-title title-tb text-center">
                    <span>Learn from the best</span>
                    <h2 class="primary-color">Our teachers</h2>
                </div>
            </div>
        </div>
        <div class="commn-carousel owl-carousel card-deck">   
            <?php foreach ($teachers as $teacher) { ?>
                <div class="card mb-5"> 
                    <img class="teacher-image" src="<?= base_url('uploads/' . $teacher['image']) ?>" alt="Teacher Image"> 
                    <div class="card-body teacher-content p-25 d-flex flex-column">  
                        <h4 class="card-title mb-4"><a href="teacher-details.html"><?php echo $teacher['name']; ?></a></h4>
                        <span class="primary-color d-block mb-4"><?php echo $teacher['designation']; ?></span>
                        <p class="card-text"><?php echo $teacher['description']; ?></p> 
                        <ul class="list-inline mt-auto">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-deviantart"></i></a></li>
                            <li><a href="#"><i class="fa fa-github"></i></a></li>
                        </ul>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>


<style>

.teacher-image {
    height: 300px; /* Set a fixed height for all teacher images */
    object-fit: cover; /* Maintain aspect ratio and cover container */
}

.teacher-content {
    height: 350px; /* Set a fixed height for the card-body */
}

</style>