@include('app.user.app.header')
<div class="jumbotron mb-0 img-fluid w-100 d-block bg1">
    <div class="container">
        <div class="card mb-0 bb" width="100%">
            <div class="text-center img-center mt-3 ml-3 mr-3">
                <hr>
                <strong> 1. Pilih Product Yang Anda Inginkan dan Tekan Order.</strong><hr>
                <img src="{{ URL::asset('/style/front/img/step1.PNG') }}" class="img-fluid w-100 d-block"><hr>
                <strong> 2. Masukkan Jumlah / Quantity Barang yang Akan Dibeli,
                Untuk Pembelian Spray Paint Diharapkan Memberikan Note Untuk Warna Yang Dipilih. Add To Cart. </strong>
                <hr>
                <img src="{{ URL::asset('/style/front/img/step2.PNG') }}" class="img-fluid w-100 d-block">
                <div class="text-center mt-3">
                    <strong>List Warna : </strong>
                    <a href="{{ route('spray300ml') }}" class="btn btn-outline-dark"><span>Ukuran 300ML</span></a>
                    <a href="{{ route('spray400ml') }}" class="btn btn-outline-dark"><span>Ukuran 400ML</span></a>
                </div>
                <hr>
                <strong> 3. Lakukan Checkout, Sebelumnya Pembeli Diharapkan Mengisi Semua Identitas Keperluan Untuk Pengiriman</strong><hr>
                <img src="{{ URL::asset('/style/front/img/step3.PNG') }}" class="img-fluid w-100 d-block"><br>
                <hr>
                <strong> 4. Jika Sudah Pembeli Akan Diberikan Form Pembayaran Dengan Kode Unik Masing-Masing Untuk Mempermudah Pengecekan Dana Pembelian Yang Masuk</strong><hr>
                <img src="{{ URL::asset('/style/front/img/step4.PNG') }}" class="img-fluid w-100 d-block"><br>
                <hr>
                <strong> 5. Pembeli Dapat Memeriksa Riwayat Pembelian Sekaligus Memeriksa Status Pemesanan</strong><hr>
                <img src="{{ URL::asset('/style/front/img/step5.PNG') }}" class="img-fluid w-100 d-block"><br>
            </div>
        </div>
    </div>
</div>
@include('app.user.app.footer')
