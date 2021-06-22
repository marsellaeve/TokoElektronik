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
            <!-- <th>Status</th> -->
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
            <!-- <td> -->
            <!-- if($o->status == 0):?> -->
                <!-- "Menunggu Pembayaran"; ?> -->
            <!-- endif; ?> -->
            <!-- </td> -->
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>
</div>