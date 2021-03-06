<?php
include "../src/includes.php";

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
                        <h1 class="page-header">Users</h1>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#Id</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Sign Up</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            /** @var User $currentUser */
                            foreach ($userRepository->findAll() as $currentUser) {
                                ?>
                                <tr>
                                    <th><?php echo $currentUser->getId()?></th>
                                    <th><?php echo $currentUser->getUsername()?></th>
                                    <th><?php echo $currentUser->getEmail()?></th>
                                    <th><?php echo $currentUser->getRole()?></th>
                                    <th><?php echo $currentUser->getDataSignUp()?></th>
                                </tr>
                            <?php
                            }
                            ?>

                            </tbody>
                        </table>

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
