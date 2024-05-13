<nav aria-label="breadcrumb" role="tablist">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a data-bs-toggle='pill' href="#dashboard">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">CBC REPORT</li>
  </ol>
</nav>
<hr>
<!-- <h3 class="text-center">CBC REPORT</h3> -->
<form method="GET" class="col-9 mt-3 bg-white p-3 rounded">
    <div class="row">
        <?php
            DB->select('usecbc');
            foreach (DB->getResult() as $k => $v):
        ?>
        <div class="row mb-1">
            <label class="form-label col-3"><?php echo $v['hematology']; ?></label>
            <div class="input-group col">
                <input type="number" id="<?php echo $kl; ?>" class="form-control col-3" min="0">
                <span class="input-group-text col-3"><?php echo $v['si_unit']; ?></span>
            </div>
            <label class="form-label col-3"><?php echo $v['normal_value'].$v['si_unit']; ?></label>
        </div>
        <?php endforeach; ?>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<style>
#cbcreport form * {
    font-size: 12px;
    display: flex;
    align-items: center;
}
</style>
