<x-admin-master>
    @section('content')
    <div class="row">
        <div class="col-sm-3">
            <form action="" method="post">
                <label for="">Name</label>
                <input type="text" class="form-control" id="text">
            </form>
        </div>
        <div class="col-sm-9">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Title</th>
                          <th>Image</th>
                          <th>Author</th>
                          <th>Created at</th>
                          <th>Updated at</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Id</th>
                          <th>Title</th>
                          <th>Image</th>
                          <th>Author</th>
                          <th>Created at</th>
                          <th>Updated at</th>
                          <th>Delete</th>
                        </tr>
                      </tfoot>
                      <tbody>

                      </tbody>
                    </table>
                  </div>
                </div>
        </div>
    </div>
    @endsection
</x-admin-master>
