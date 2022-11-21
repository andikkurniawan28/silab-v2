<div class="col-lg-6 mb-4">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Realisasi SD Hari Ini</h6>
        </div>

        <div class="card-body">

            <h4 class="small font-weight-bold">
                Raw Sugar Diolah
                <span class="float-right">
                    {{ $data['realisasi_raw_sugar'] }}%
                </span>
            </h4>
            <div class="progress mb-4">
                <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $data['realisasi_raw_sugar'] }}%" aria-valuenow="{{ $data['realisasi_raw_sugar'] }}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <h4 class="small font-weight-bold">
                Tebu Tergiling
                <span class="float-right">
                    {{ $data['realisasi_tebu_tergiling'] }}%
                </span>
            </h4>
            <div class="progress mb-4">
                <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $data['realisasi_tebu_tergiling'] }}%" aria-valuenow="{{ $data['realisasi_tebu_tergiling'] }}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <h4 class="small font-weight-bold">
                Produksi SHS
                <span class="float-right">
                    {{ $data['realisasi_produksi_shs'] }}%
                </span>
            </h4>
            <div class="progress mb-4">
                <div class="progress-bar" role="progressbar" style="width: {{ $data['realisasi_produksi_shs'] }}%" aria-valuenow="{{ $data['realisasi_produksi_shs'] }}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <h4 class="small font-weight-bold">
                Produksi Tetes
                <span class="float-right">
                    {{ $data['realisasi_produksi_tetes'] }}%
                </span>
            </h4>
            <div class="progress mb-4">
                <div class="progress-bar bg-info" role="progressbar" style="width: {{ $data['realisasi_produksi_tetes'] }}%" aria-valuenow="{{ $data['realisasi_produksi_tetes'] }}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <h4 class="small font-weight-bold">
                Reject SHS
                <span class="float-right">
                    {{ $data['realisasi_reject_shs'] }}%
                </span>
            </h4>
            <div class="progress">
                <div class="progress-bar bg-dark" role="progressbar" style="width: {{ $data['realisasi_reject_shs'] }}%"  aria-valuenow="{{ $data['realisasi_reject_shs'] }}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

        </div>

    </div>

</div>
