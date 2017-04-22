# File upload handler class for PHP

Makes it easy to upload files of certain types, limit the upload size, extension, etc.

## Usage:


```php
// include the file:
if ( !class_exists('\FileUpload') ) {
    include '/path/to/FileUpload.php';
}

// instantiate
$FileUpload = \FileUpload::instance();

// set a file to upload (from `$_FILES`):
$FileUpload->setFile($_FILES['avatar']); // or from constructor (new \FileUpload($_FILES['avatar']))

// set target directory
$FileUpload->setUploadDir('/home/samuel/tests/FileUpload-PHP/avatars');

// set a maximum size to be uploaded (in bytes)
$FileUpload->setMaxSize(5000000); // 5 MB

// set extensions to allow
$FileUpload->setExtensions(array('png', 'jpg', 'jpeg')); // or just 'gif' to allow only GIFs

// always set a unique name for the uploaded file
$FileUpload->setNewFileName('avatar'); // the extension will be adopted from file extension

// upload
$response = $FileUpload->upload();

// debug response
print_r( $response ); // array('success' => true ...)

if ( $response['success'] ) {
    printf('File uploaded to %s', $FileUpload->path);
} else {
    print $response['message'];
}
```