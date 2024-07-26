<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Payment</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Make a Payment</h2>
        <form action="process_payment.php" method="POST">
            <div class="form-group">
                <label for="paymentMethod">Payment Method:</label>
                <select class="form-control" id="paymentMethod" name="paymentMethod" required>
                    <option value="online">Online</option>
                    <option value="manual">Manual</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Pay</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
