<div class="container mt-5" style="width: 50%;margin: 0 auto">

    <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col-md-6 order-2 order-md-1">

                <div class="card-body" style="margin-top: -143px;">
                    <h4 class="card-title mb-4">Welcome <span class="fw-bold"><?php echo $res['name'] ?></span> 🎉</h4>

                </div>
            </div>
            <div class="col-md-6 text-center text-md-end order-1 order-md-2">
                <div class="card-body pb-0 px-0 pt-2">
                    <a href="<?= base_url('edit-form/' . $res['id']) ?>"><img src="<?php echo base_url('images/' . $res['image']); ?>" height="186" class="scaleX-n1-rtl" alt="View Profile"></a>
                </div>
            </div>
        </div>
    </div>
</div>