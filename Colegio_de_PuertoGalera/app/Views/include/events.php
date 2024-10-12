<div class="event-area pt--120 pb--80">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="section-title-style2 black-title text-center">
                    <span>Join with us</span>
                    <h2>Upcoming Events</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($events as $event): ?>
                <div class="col-md-6">
                    <div class="media align-items-center mb-5">
                    <div class="media-head primary-bg">
                        <span><?= date('M d', strtotime($event['event_date'])) ?></span>
                        <p><?= date('Y', strtotime($event['event_date'])) ?></p>
                    </div>
                    <div class="media-body">
                        <h4><a href="/events"><?= $event['event_name'] ?></a></h4>
                        <p><?= $event['event_description'] ?></p>
                        <p>
                            <i class="fa fa-clock-o"></i>
                            <?= date('h:i A', strtotime($event['event_start_time'])) ?> - <?= date('h:i A', strtotime($event['event_end_time'])) ?>
                        </p>
                    </div>

                    </div> <!-- media -->
                </div><!-- col-md-6 -->
            <?php endforeach; ?>
        </div><!-- row -->
    </div><!-- container -->
</div>
