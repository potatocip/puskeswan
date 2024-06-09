<!-- Footer -->
<footer class="sticky-footer bg-white">
        <div class="copyright text-center my-auto py-2">
            <span class="text-black">Puskeswan Laladon &copy; Web Programming III Kelompok 5 <?= date('Y'); ?></span>
        </div>
</footer>
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin
                    mau keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Logout" di bawah jika kamu yakin sudah selesai.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                <a class="btn btn-primary" href="<?= base_url('autentifikasi/logout'); ?>">Logout</a>

            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>asset/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('asset/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('asset/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?= base_url('asset/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="<?= base_url('asset/'); ?>js/sb-admin-2.min.js"></script>
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    $(document).ready(function() {
        $("#table-datatable").dataTable();
    });
    $('.alert-message').alert().delay(3500).slideUp('slow');
</script>
<!-- swiper js -->
<script src="<?php echo base_url(); ?>asset/js/swiper-bundle.min.js"></script>
<script src="<?php echo base_url(); ?>asset/js/script.js"></script>
</body>

</html>