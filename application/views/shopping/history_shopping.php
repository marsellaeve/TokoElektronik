<h2>Daftar Transaksi</h2>
<div class="kotak2">
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Invoice</th>
            <th>Nama Tujuan</th>
            <th>Alamat Tujuan</th>
            <th>Telepon Tujuan</th>
            <th>Daftar Barang</th>
            <th>Total Harga</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($order as $o){
        ?>
        <tr>
            <td><?= $o->invoice ?></td>
            <td><?= $o->nama_tujuan ?></td>
            <td><?= $o->alamat_tujuan ?></td>
            <td><?= $o->telepon_tujuan ?></td>
            <td><!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detail-<?= $o->id ?>">
                Detail
                </button>
                <div class="modal fade" id="detail-<?= $o->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Daftar Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tr>
                                <td>Nama Produk</td>
                                <td>Harga Satuan</td>
                                <td>Jumlah Beli</td>
                                <td>Total Harga</td>
                            </tr>
                            <?php
                                foreach($detail_order as $row){
                                    if($row->order_id === $o->id){
                            ?>
                                <tr>
                                    <td><?= $row->nama_produk ?></td>
                                    <td><?= $row->harga ?></td>
                                    <td><?= $row->qty ?></td>
                                    <td><?= intval($row->harga) * intval($row->qty) ?></td>
                                </tr>
                            <?php
                                    }
                                }
                            ?>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
                </div>
            </td>
            <td><?= $o->total ?></td>
            <td>
            <?php if($o->status == 0)
            {
                echo "Menunggu Pembayaran Anda";
            }
            elseif($o->status == 1)
            {
                echo "Barang sedang dikemas";
            }
            elseif($o->status == 2)
            {
                echo "Barang sedang dikirim";
            }
            elseif($o->status == 3)
            {
                echo "Barang sudah sampai";
            }
            else
            {
                echo "Pesanan Selesai";
            }
            ?>
            </td>
            <td>
            <?php if($o->status == 3)
            {?>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#statusorder0modal-<?= $o->id ?>">Pesanan Selesai</button>
                <!-- Modal -->
                <div class="modal fade" id="statusorder0modal-<?= $o->id ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <form action="<?= base_url('user/invoice/update') ?>" method="POST">
                            <input hidden id="status" name="status" value="4">
                            <input hidden id="id_order" name="id_order" value="<?= $o->id ?>">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi ganti status</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin untuk barang yang anda terima sudah lengkap dan ingin mengganti status invoice menjadi sudah selesai?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                                    <button type="button submit" class="btn btn-success">Yakin</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php
            }
            ?>
            </td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>
</div>