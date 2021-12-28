<div class="card">
    <div class="card-header pb-0 px-3">
        <h6 class="mb-0">Uplpoaded course</h6>
    </div>
    <div class="card-body pt-4 p-3">
        <ul class="list-group">
            <li class="list-group-item border-0 d-flex  flex-column p-4 mb-2 bg-gray-100 border-radius-lg">
            <div class="d-flex">
                <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm">Course Name</h6>
                    <span class="mb-2 text-xs">User Name: <span
                            class="text-dark font-weight-bold ms-2">Viking Burrito</span></span>
                    <span class="mb-2 text-xs">Email Address: <span
                            class="text-dark ms-2 font-weight-bold">oliver@burrito.com</span></span>
                    <span class="mb-2 text-xs">Univercity: <span
                            class="text-dark ms-2 font-weight-bold">Oxford</span></span>
                    <!-- <span class="text-xs">File: <span
                            class="text-dark ms-2 font-weight-bold">zip 12.3K  uploaded date : 2021-12-5 12:32</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#">download</a></span> -->
                </div>
                <div class="ms-auto">
                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i
                            class="far fa-trash-alt me-2"></i>Delete</a>
                    <a class="btn btn-link text-dark px-3 mb-0" wire:click.prevent="$emit('showModal', 'SomeData')"><i
                            class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                </div>
                </div>
                <div class="d-flex align-items-center">
                <div class="d-flex">
                    <span class="mb-2 text-xs">File: <span
                            class="text-dark font-weight-bold me-3">zip</span></span>
                    <span class="mb-2 text-xs">size: <span
                            class="text-dark me-3 font-weight-bold">13.2K</span></span>
                    <span class="mb-2 text-xs">uploaded date: <span
                            class="text-dark me-3 font-weight-bold"> 2021-12-5 12:32 </span></span>
                </div>
                <div class="ms-auto">
                    <a class="btn btn-link text-secondary px-3 mb-0" href="javascript:;"><i
                            class="fa fa-download"></i></a>
                </div>
            </div>
            </li>
        </ul>
    </div>
</div>
