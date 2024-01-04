
            <!-- Footer -->
            <footer class="sticky-footer bg-white mt-4">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; ARETEAJAYA 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

    <!-- My script -->
    <script src="<?= base_url('assets/js/script.js'); ?>"></script>

    <script>
      $('#gambar').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('#label-gambar').addClass("selected").html(fileName);
      })

      $('#bukti_bayar').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('#label-bukti-bayar').addClass("selected").html(fileName);
      })

      $('#jumlah').on('change', function() {
        let jumlah_beli = document.forms['order']['jumlah'].value;
        let harga = document.forms['order']['harga'].value;
        let total = jumlah_beli * harga;
        $("#total_bayar").val(total);
       
      })

      $(function() {
        // fungsi tambah data sayur
        $(".tampilModalTambahData").on("click", function(){
            $("#formModalLabel").html("Formulir Tambah Data Sayur");
        })
        // fungsi edit data sayur
        $(".tampilModalUbahData").on("click", function(){
            $("#formModalLabel").html("Formulir Edit Data Sayur");
            $(".modal-body form").attr(
			"action",
			"http://localhost/areteajaya/admin/editDataSayur"
		);

        const id = $(this).data("id");
        $.ajax({
            url: "http://localhost/areteajaya/admin/getDataSayurById",
            data: { id: id },
			method: "post",
			dataType: "json",
            success: function (data) {
				$("#nama").val(data.nama);
				$("#stok").val(data.stok);
                $("#satuan").val(data.satuan);
                $("#harga").val(data.harga);
                $("#gambar").val(data.gambar);
				$("#id").val(data.id_sayur);
			},
        });
        });
      });
    </script>

</body>

</html>