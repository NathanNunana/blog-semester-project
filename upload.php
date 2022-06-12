<?php
include './database/connect.php';



$msg = "";

if (isset($_POST["upload"])) {
    $userID = $_SESSION["user_id"];
    $category = $_POST["category"];
    $title = addslashes($_POST["title"]);
    $description = addslashes($_POST["description"]);
    $date =  date("F j, Y");
    $featured = (isset($_POST["featured"])) ? 1 : 0;

    $media = basename($_FILES["image"]["name"]);
    $tempname = $_FILES["image"]["tmp_name"];
    // Change file path before running
    $filepath = __DIR__."/uploads/" . $media;
    $filetype = pathinfo($filepath, PATHINFO_EXTENSION);

    // Allowed file types
    $allowedtypes = array('jpg', 'png', 'jpeg');


    // SQL statement to post the product to the database
    $sql = "INSERT INTO `posts` (`user_id`, `category`, `title`, `description`, `date`, `image`, `featured`) 
    VALUES ('" . $userID . "','" . $category . "', '" . $title . "', '" . $description . "','" . $date . "', '" . $media . "', '" . $featured . "')";

    if (empty($title) || empty($description) || empty($media)) {
        $msg = "Enter all fields";
    } else {
        if (in_array($filetype, $allowedtypes)) {
            // Executing the query && checking if it executes successfuly
            // echo !move_uploaded_file($tempname, $filepath);
            if (!move_uploaded_file($tempname, $filepath)) {
                $msg = "File upload unsuccessful";
            } else {
                if ($conn->query($sql)) {
                    $msg = "Successfully uploaded the blog";
                } else {
                    $msg = "Error: " . $sql;
                }
            }
        } else {
            $msg = "Allowed file types are png, jpg and jpeg";
        }
    }
}
?>

<?php include './includes/header.php'; ?>
<title>Upload Blog</title>
<?php include './includes/navbar.php' ?>
<!-- Upload Form -->
<div class="container form-container">
    <form action="" class="p-5 bg-white" method="post" enctype="multipart/form-data">
        <!-- <h2>Upload Blog</h2> -->
        <div class="row form-group">

            <div class="col-md-12">
                <label class="text-black" for="title">Category</label>
                <select name="category">
                    <option value="Coding">Coding</option>
                    <option value="Design">Design</option>
                    <option value="Hosting">Hosting</option>
                </select>
            </div>
        </div>

        <div class="row form-group">

            <div class="col-md-12">
                <label class="text-black" for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control">
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-12">
                <label class="text-black" for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="7" class="form-control" placeholder="Type description here..."></textarea>
            </div>
        </div>

        <div class="row form-group">

            <div class="col-md-12">
                <label class="text-black" for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>
        </div>

        <div style="display: flex; justify-content: flex-start;">
            <label for="true">Featured</label>
            <input type="checkbox" id="true" name="featured" value="true"><br>
        </div>
        <div class="row">
            <div class="text-small form-alert"><?php echo $msg; ?></div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <input type="submit" name="upload" value="Upload Post" class="btn btn-primary py-2 px-4 text-white">
            </div>
        </div>
    </form>
</div>
</body>

</html>
<?php
// include './includes/footer.php';
?>