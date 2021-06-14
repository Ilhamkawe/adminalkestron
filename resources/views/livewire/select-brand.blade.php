<div class="table-responsive">
    <!-- Projects table -->
    <table class="table align-items-center table-flush">
      <thead class="thead-light">
        <tr>
          <th>#</th>
          <th>Nama</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $a = 1 ?>
       @foreach ($brand as $b)
        <tr>
            <td><?= $a ?></td>
            <td>{{ $b->nama }}</td>
            <td>
                <button id="tombolselectbrand" onclick="pilih('{{ $b->nama }}')" data-dismiss="modal" class="btn btn-success btn-icon"><span class="ni ni-check-bold"></span></button>
            </td>
        </tr>
        <?php $a++ ?>
       @endforeach
        
      </tbody>
    </table>
  </div>