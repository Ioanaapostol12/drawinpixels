<?php
include "../../src/includes.php";

$currentUser = $userRepository->findOneById(isLoggedIn());

if(!$currentUser || !$currentUser->isAdmin())
{
    header("Location: /user/login.php");
    die();
}

if (isset($_SESSION['response'])){
    $response = $_SESSION['response'];
}

if(isset($_GET['id']) && $_GET['id'] != ''){
    $courseId = $_GET['id'];
    $course = $courseRepository->findOneById($courseId);
    if($course){
        /** @var User $response['userData'] */
        $response['userData'] = $course;
    }else{
        header("Location: /admin/content/cursuri.php");
        die();
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<?php include __BASEDIR__."/admin/template/head.php" ?>
<body>
    <div id="wrapper">
        <?php include __BASEDIR__."/admin/template/navigation.php"?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Cursuri / Adauga|Editeaza Curs</h1>

                        <?php
                        if (isset($response['success']) && $response['success'] == false){
                            foreach ($response['error'] as $error){
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <span class="sr-only">Error:</span>
                                    <?php echo $error ?>
                                </div>
                        <?php
                            }
                        }
                        ?>

                        <form action="cursuri_save_action.php" method="post">
                            <input type="hidden" name="id" value="<?php echo isset($response['userData'])?$response['userData']->getId():''?>">
                            <div class="form-group">
                                <label for="name">Nume:</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($response['userData'])?$response['userData']->getName():''?>">
                            </div>

                            <div class="form-group">
                                <label for="name">Locatie:</label>
                                <input type="text" class="form-control" id="slug" name="slug" value="<?php echo isset($response['userData'])?$response['userData']->getSlug():''?>">
                            </div>

                            <div class="form-group">
                                <label for="content">Content:</label>
                                <textarea class="form-control" rows="5" id="content" name="content"><?php echo isset($response['userData'])?$response['userData']->getContent():''?></textarea>
                            </div>


                            <button type="submit" class="btn btn-default pull-right">Salveaza</button>
                        </form>


                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="/assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/assets/dist/js/sb-admin-2.js"></script>

    <script src="/assets/vendor/tinymce-dist/tinymce.min.js"></script>
    <script src="/assets/vendor/tinymce-dist/jquery.tinymce.min.js"></script>

    <script>
        $('#content').tinymce(
            {
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor textcolor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code help wordcount'
                ],
                toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
            }
        );
    </script>

</body>

</html>
