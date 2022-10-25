<div class="col-lg-3 mb-4">
    <div class="card bg-danger text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                COA Kapur
            </div>
            <hr>
            <form action="{{ route('kapur_certificate') }}" method="POST" target="_blank">
                @csrf
                @method('POST')
                <div class="form-group">
                    <div class="input-group">
                        <input id="text1" name="date" type="date" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" name="handling" value="print" class="btn btn-warning text-dark">Print Screen <i class='fas fa-print'></i></button>
                    <button type="submit" name="handling" value="export" class="btn btn-warning text-dark">Export <i class='fas fa-download'></i></button>
                </div>
            </form>
        </div>
    </div>
</div>