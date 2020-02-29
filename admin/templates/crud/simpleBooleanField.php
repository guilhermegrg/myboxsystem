    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="{{ fieldName }}" <?php  echo ${{ singleObjectVariableName }}->{{ fieldName }}? "checked":"";?>>
        <label for="{{ fieldName }}" class="form-check-label" >{{ tableFieldName }}:</label>
    </div>