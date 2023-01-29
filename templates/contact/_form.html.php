<?php
/** @var $contact ?\App\Model\Contact */
?>

<div class="form-group">
    <label for="first_name">First Name</label>
    <input type="text" id="first_name" name="contact[first_name]" value="<?= $contact ? $contact->getFirstName() : '' ?>">
</div>

<div class="form-group">
    <label for="last_name">Last Name</label>
    <input type="text" id="last_name" name="contact[last_name]" value="<?= $contact ? $contact->getLastName() : '' ?>">
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="email" id="email" name="contact[email]" value="<?= $contact ? $contact->getEmail() : '' ?>">
</div>

<div class="form-group">
    <label for="phone">Phone</label>
    <input type="tel" id="phone" name="contact[phone]" value="<?= $contact ? $contact->getPhone() : '' ?>">
</div>

<div class="form-group">
    <label></label>
    <input type="submit" value="Submit">
</div>
