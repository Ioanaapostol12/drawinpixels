<?php
include "../../src/includes.php";

$currentUser = $userRepository->findOneById(isLoggedIn());
if(!$currentUser || !$currentUser->isAdmin())
{
    header("Location: /user/login.php");
    die();
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
                        <h1 class="page-header">Content / Cursuri</h1>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#id</th>
                                <th>Nume</th>
                                <th>Ruta</th>
                                <th>Data Adaugarii</th>
                                <th>Data Modificarii</th>
                                <th>Actiune</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $courses = $courseRepository->findAll();
                            /** @var Course $course */
                            foreach ($courses as $course) {
                                ?>
                                <tr>
                                    <th><?php echo $course->getId() ?></th>
                                    <th><?php echo $course->getName() ?></th>
                                    <th><?php echo $course->getSlug() ?></th>
                                    <th><?php echo $course->getDateAdded() ?></th>
                                    <th><?php echo $course->getDateModified() ?></th>
                                    <th>
                                        <a href="/admin/content/cursuri_save.php?id=<?php echo $course->getId()?>" class="btn btn-info">Editeaza</a>
                                        <a href="/admin/content/cursuri_delete_action.php?id=<?php echo $course->getId() ?>" class="btn btn-danger">Sterge</a>
                                    </th>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                        </table>


                        <a href="/admin/content/cursuri_save.php" class="btn btn-success pull-right">Adauga Curs</a>


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




</body>

</html>
