<div class="modal fade" id="profileModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Profile Modal</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="/profil-update/{{ Auth::User()->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ Auth::User()->name }}" class="form-control"
                            placeholder="Input Rounded">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" value="{{ Auth::User()->email }}" class="form-control"
                            placeholder="Input Rounded">
                    </div>
                    <div class="form-group">
                        <label for="">Old Password</label>
                        <input type="password" name="oldpassword" class="form-control" placeholder="Input Rounded">
                    </div>
                    <div class="form-group">
                        <label for="">New Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Input Rounded">
                    </div>
                    <div class="form-group">
                        <label for="">Re New Password</label>
                        <input type="password" name="repassword" class="form-control" placeholder="Input Rounded">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="submit">Save</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
