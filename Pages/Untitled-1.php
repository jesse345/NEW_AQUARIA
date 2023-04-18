<?php while ($img = mysqli_fetch_assoc($images)) { ?>
    <div class="form-element">
        <input type="file" id="file-<?php echo $i; ?>" name="image[]" accept="image/*" required>
        <label for="file-<?php echo $i; ?>" id="file-<?php echo $i ?>-preview">
            <img src="https://bit.ly/3ubuq5o" alt="">
            <div>
                <span>+</span>
            </div>
        </label>
    </div>
<?php $i++;
} ?>