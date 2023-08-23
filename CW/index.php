<!DOCTYPE html>
<html lang="en">
<head>
    <title>Promocode Apply Project</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #445069;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #252b48;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 50px auto;
        }

        h2 {
            color: white;
            text-align: center;
            margin-bottom: 20px;
            font-size: 28px;
        }

        label {
            font-weight: bold;
            color: white;
        }

        .form-control {
            border-radius: 5px;
            padding: 12px;
            border: 1px solid #ccc;
        }

        .btn {
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            padding: 12px 20px;
            border: none;
            width: 100%;
            margin-top: 20px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        #message {
            font-weight: bold;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Promocode Application</h2>

    <div class="form-group">
        <label for="total_price">Total Price:</label>
        <input type="text" class="form-control" id="total_price" name="total_price" value="1000.00">
    </div>
    <div class="form-group">
        <label for="coupon_code">Apply Promocode:</label>
        <input type="text" class="form-control" id="coupon_code" placeholder="Enter Promocode" name="coupon_code">
        <b><span id="message"></span></b>
    </div>

    <button id="apply" class="btn">Apply</button>
    <button id="edit" class="btn" style="display:none;">Edit</button>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<script>
    $("#apply").click(function(){
        if($('#coupon_code').val() !== ''){
            $.ajax({
                type: "POST",
                url: "process.php",
                data: {
                    coupon_code: $('#coupon_code').val()
                },
                success: function(dataResult){
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode === 200){
                        var afterApply = parseFloat($('#total_price').val()) - parseFloat(dataResult.value);
                        $('#total_price').val(afterApply.toFixed(2));
                        $('#apply').hide();
                        $('#edit').show();
                        $('#message').html("Promocode applied successfully!");
                    }
                    else if(dataResult.statusCode === 201){
                        $('#message').html("Invalid promocode!");
                    }
                }
            });
        }
        else{
            $('#message').html("Promocode cannot be blank. Enter a valid Promocode!");
        }
    });

    $("#edit").click(function(){
        $('#coupon_code').val("");
        $('#apply').show();
        $('#edit').hide();
        $('#message').html("");
        $('#total_price').val("1000.00");
    });
</script>
</body>
</html>


