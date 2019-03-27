<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title><?php echo $this->uri->segment(2);?></title>
</head>
<body>
    <div class="text-center">
        <h1>Validation</h1>
    </div>
    <?php echo validation_errors(); ?>
    <?php echo form_open('form/aksi'); ?>
    <div class=container>
        <form action="">
            <div class="form-group">
                <label>Nama</label><br/>
                <input type="text" name="nama" class="form-control" require><br/>            
            </div>
            <div class="form-group">
                <label>Email</label><br/>
                <input type="text" name="email" class="form-control" require><br/>
            </div>
            <div>
                <label>Konfirmasi Email</label><br/>
                <input type="text" name="konfir_email" class=form-control require><br/>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </div>
        </form>
    </div>
</body>
</html>