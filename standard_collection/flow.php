<!--<link rel="stylesheet" type="text/css" href="custom.css">-->
<style>
  .input label {
    display: flex;
    align-items: center;
    cursor: pointer;
  }

  .input label img {
    margin-right: 10px; /* Adjust the margin as needed */
    width: 50px;
    height: 40px;
    padding: 2px;
  }
    .input label:hover {
    background-color: #FFF5E0; /* Change the background color on hover */
  }
</style>

<fieldset style="width: 100%; height: flex;" required>
  <legend>Payment Method</legend>
  <div class="input">
    <div class="input">
      <label>
        <input type="radio" name="paymentMethod" class="value" data-value="UBDD" onclick="displayValue(this)">
        <img src="img/ubpb.png" alt="UnionBank Logo">
        UnionBank
      </label>

      <label>
        <input type="radio" name="paymentMethod" class="value" data-value="BPIA" onclick="displayValue(this)">
        <img src="img/bpi.png" alt="BPI Online Logo">
        BPI Online
      </label>

      <label>
        <input type="radio" name="paymentMethod" class="value" data-value="GCSH" onclick="displayValue(this)">
        <img src="img/gcash.png" alt="Gcash Logo">
        Gcash
      </label>

      <label>
        <input type="radio" name="paymentMethod" class="value" data-value="PYMY" onclick="displayValue(this)">
        <img src="img/maya.jpg" alt="Maya Logo">
        Maya
      </label>

      <label>
        <input type="radio" name="paymentMethod" class="value" data-value="GRPY" onclick="displayValue(this)">
        <img src="img/grab.png" alt="Grabpay Logo">
        Grabpay
      </label>

      <label>
        <input type="radio" name="paymentMethod" class="value" data-value="BOG" onclick="displayValue(this)">
        <img src="https://test.dragonpay.ph/Bank/images/boguslogo.jpg" alt="Test Bank Online Logo">
        Test Bank Online
      </label>

      <label>
        <input type="radio" name="paymentMethod" class="value" data-value="BOGX" onclick="displayValue(this)">
        <img src="https://test.dragonpay.ph/Bank/images/boguslogo.jpg" alt="Test Bank OTC Logo">
        Test Bank OTC
      </label>
    </div>
    <input type="hidden" name="ProcId">
    <br>
    <input type="submit" name="submit2" value="Pay">
    <br>
  </div>
</fieldset>

<script>
  function displayValue(input) {
    var procIdInput = document.getElementsByName("ProcId")[0];
    var inputValue = input.getAttribute("data-value");
    procIdInput.value = inputValue;
  }
</script>
</form>
