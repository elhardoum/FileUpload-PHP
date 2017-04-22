<?php

include '../FileUpload.php';

$FileUpload = new FileUpload;

if ( isset($_FILES['avatar']) ) {

    $FileUpload->setFile($_FILES['avatar'])
        ->setUploadDir(__DIR__)
        ->setExtensions(array('png', 'jpg', 'jpeg', 'gif', 'bmp'))
        ->setMaxSize(5000000) // 5 MB
        // ->setNewFileName('avatar')
        ->upload();

    if ( !$FileUpload->upload_success ) {
        print '<pre>';
        print_r($FileUpload);
        print '</pre>';
    }

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Avatar upload</title>
</head>
<body>

<?php if ( $FileUpload->upload_success ) : ?>

    <h2><font color="green">Your avatar was uploaded successfully</font></h2>

    <img src="<?php echo $FileUpload->name; ?>" />

    <?php print '<pre>'; print_r($FileUpload); print '</pre>'; ?>

<?php else : ?>

    <form method="post" enctype="multipart/form-data">

        <p>
            <label>Pick a Profile Picture<br/>
                <input type="file" name="avatar" />
            </label>
        </p>

        <p>
            <input type="submit" value="Upload" />
        </p>

    </form>

<?php endif; ?>

</body>
</html>