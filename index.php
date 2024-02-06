
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BARCODE GENERATOR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-xl-8 text-center"><h4>BARCODE GENERATOR by COSGN.</h4></div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-6 col-xl-8 p-4">
            <form action="index.php" method="get">
                <div class="mb-3">
                    <label for="barcode_number" class="form-label">Barcode No / Text</label>
                    <input type="text"  class="form-control" id="barcode_number" value="<?=@$_GET['barcode_number']?>" name="barcode_number">
                    <div id="emailHelp" class="form-text">(FOR EAN-13 12 digits number will be accepted)</div>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Barcode Type</label>
                    <select class="form-control" name="type" id="type">
                        <option value="ean13" <?php if(@$_GET['type'] == 'ean13'): echo 'selected';  endif; ?>>EAN-13</option>
                        <option value="ean5" <?php if(@$_GET['type'] == 'ean5'): echo 'selected';  endif; ?>>EAN-5</option>
                        <option value="ean2" <?php if(@$_GET['type'] == 'ean2'): echo 'selected';  endif; ?>>EAN-2</option>
                        <option value="ean8" <?php if(@$_GET['type'] == 'ean8'): echo 'selected';  endif; ?>>EAN-8</option>
                        <option value="code39" <?php if(@$_GET['type'] == 'code39'): echo 'selected';  endif; ?>>CODE-39</option>
                        <option value="code128" <?php if(@$_GET['type'] == 'code128'): echo 'selected';  endif; ?>>CODE-128</option>
                        <option value="code25" <?php if(@$_GET['type'] == 'code25'): echo 'selected';  endif; ?>>CODE-25</option>
                    </select>
                </div>
                <button  type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8 col-xl-8 text-center">
            <img src="barcode.php?barcode_number=<?=@$_GET['barcode_number']?>&type=<?=@$_GET['type']?>" alt="">
        </div>
        <div class="col-md-6 col-xl-8 text-center mt-5">
            <button id="downloadButton" class="btn btn-secondary">Download Image</button>
        </div>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    // Function to trigger image download
    function downloadImage(url, filename) {
        var anchor = document.createElement('a');
        anchor.href = url;
        anchor.download = filename;
        document.body.appendChild(anchor);
        anchor.click();
        document.body.removeChild(anchor);
    }
    document.getElementById('downloadButton').addEventListener('click', function() {
        var imageUrl = 'barcode.php?barcode_number=<?=@$_GET['barcode_number']?>&type=<?=@$_GET['type']?>';
        var filename = '<?=@$_GET['barcode_number']?><?=uniqid('1')?>'+".png";
        downloadImage(imageUrl, filename);
    });
</script>
</body>
</html>