<div class="form-group">
        <label for="{{ fieldName }}">{{ formFieldName }}:</label>
        <input type="text" class="form-control <?php echo isValid("{{ validationTAG }}","{{ fieldName }}")?"":"is-invalid";?>" name="{{ fieldName }}" placeholder="Enter the {{ fieldName }}" value="<?php echo ${{ singleObjectVariableName }}->{{ fieldName }}; ?>" <?php echo {{ className }}::getHTMLValidationRule("{{ fieldName }}"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("{{ validationTAG }}","{{ fieldName }}"); ?>
        </div>
</div>