<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Calculate Total Example</title>
</head>

<body>
    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" name="quantity" min="1" value="1" oninput="calculateTotal()">

    <label for="price">Price:</label>
    <input type="number" id="price" name="price" min="0.01" step="0.01" value="0.01" oninput="calculateTotal()">

    <label for="total">Total:</label>
    <input type="number" id="total" name="total" readonly>

    <script>
        function calculateTotal() {
            const quantity = document.getElementById("quantity").value;
            const price = document.getElementById("price").value;
            const total = quantity * price;
            document.getElementById("total").value = total.toFixed(2);
        }
    </script>
</body>

</html>