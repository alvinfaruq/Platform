                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-fluid rounded-start">
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <div class="w-100">
                                    <div class="row">
                                        <div class="col-3">
                                            Nama
                                        </div>
                                        <div class="col">
                                            : <?= $user['name']; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            Email
                                        </div>
                                        <div class="col">
                                            : <?= $user['email']; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            Kelas
                                        </div>
                                        <div class="col">
                                            : <?= $user['kelas']['namakelas']; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            Member Since
                                        </div>
                                        <div class="col">
                                            : <?= $user['date_created']; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->