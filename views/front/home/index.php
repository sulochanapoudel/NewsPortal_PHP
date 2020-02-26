
        
        <?php 

            view('front/includes/header.php');
            view('front/includes/nav.php');
        ?>

        <main class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 breaking-heading text-center my-3 font-weight-bold">
                        This is a breaking news headline at top.
                    </div>
                    <div class="col-6">
                        <img src="<?php echo url("assets/images/img_0.24055900 1582534787_1666.jpg"); ?>" class="img-fluid">
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-12">
                                <small class="text-muted font-italic">
                                    <i class="fas-clock mr-2"></i> 31 jan 2020 04:30 PM
                                </small>
                            </div>
                            <div class="col-12 text-justify">
                                कोरोना भाइरसको संक्रमण फैलिँदै गएपछि जापानमा हुने ओलम्पिक प्रतियोगिता रोकिने सम्भावना बढ्दै गएको छ । आउँदो जुलाई २४ बाट जापानको टोकियोमा हुन लागेको ओलम्पिक २०२० रोक्नुपर्ने अन्तराष्ट्रिय ओलम्पिक समितिका सदस्य डिक पाउन्डले बताएका छन् ।
                            </div>
                            <div class="col-12">
                                <a href="#" class="btn btn-outline-primary btn-sm">Read More </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <hr>
                    </div>
                </div>
                <div class="row">
                <?php for($i = 1; $i <= 8; $i++): ?>
                    <div class="col-3 mb-3">
                        <div class="row">
                            <div class="col-12">
                                <img src="<?php echo url("assets/images/img_0.55540700 1582531126_3177.jpg"); ?>" class="img-fluid">
                            </div>
                            <div class="col-12 text-center font-weight-bold my-2">
                            <a href="#"> THis is a demo Title of an article</a>
                            </div>
                        </div>
                    </div>
                    <?php endfor; ?>
                </div>
            </div>
        </main>
        
        <?php 
        view('front/includes/footer.php');
        ?>