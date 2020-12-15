<div class="form-group <?php echo $x['divclass']; ?>">
    <?php if ($x['names']) : ?>
        <label class="col-sm col-form-label<?php echo $x['labelclass']; ?>" for="<?php echo $x['name']; ?>">
            <h5><?php echo $x['names']; ?></h5>
        </label>
    <?php endif; ?>
    <input <?php echo $x["checked"] ?> value="<?php echo $x['value']; ?>" class="form-control form-control-lg 
    <?php echo $x['inputclass']; ?>" type=" <?php echo $x['type']; ?>" name="<?php echo $x['name']; ?>" id="<?php echo $x['name']; ?>" placeholder="<?php echo $x['placeholder'] ?>">
</div>